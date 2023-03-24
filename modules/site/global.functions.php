<?php
/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */
// Categories
require realpath(NV_ROOTDIR . '/' . NV_CONFIG_FILENAME);
$array_domaintype=array('domain'=>'domain','subdomain'=>'subdomain');
$array_cpaneltype=array('direcadmin'=>'Direcadmin','cpanel'=>'Cpanel','vestacp'=>'vestacp');
$array_config=array();
$sql = 'SELECT config_name, config_value FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_config';
$result = $db->query($sql);
while (list($c_config_name, $c_config_value) = $result->fetch(3)) {
    $array_config[$c_config_name] = $c_config_value;
}
$array_samples_data = nv_scandir(NV_ROOTDIR . '/data/site', '/^data\_([a-z0-9]+)\.php$/');
function hqc_trim($str){
        $str=mb_ereg_replace('(^\s+)|(\s+$)',"", mb_ereg_replace('\s\s+'," ", $str));
        return $str;
}
function splitHoten($hoten){
    $hoten=" ".hqc_trim($hoten);

    $index=mb_strripos ($hoten," ",0,"utf-8");

    $ten=mb_substr($hoten,$index+1,mb_strlen($hoten)-$index-1,"utf-8");

    $ho=hqc_trim(mb_substr($hoten,1,$index));

    return array("ho"=>$ho,"ten"=>$ten);

}
function nv_del_folder($dir){
    global $global_config,$array_config;
    preg_match('/public_html.*/', NV_ROOTDIR, $matches);
    $root_dir=$matches[0].'/';
    $ftp_server = nv_unhtmlspecialchars($global_config['ftp_server']);
    $ftp_port = intval($global_config['ftp_port']);
    $ftp_user_name = nv_unhtmlspecialchars($array_config['cpanel_ftp_user_name']);
    $ftp_user_pass = nv_unhtmlspecialchars($array_config['cpanel_ftp_user_pass']);
    $ftp_path = nv_unhtmlspecialchars($global_config['ftp_path']);
    // Ket noi, dang nhap
    $ftp = new NukeViet\Ftp\Ftp($ftp_server, $ftp_user_name, $ftp_user_pass, array( 'timeout' => 10 ), $ftp_port);
    $check = nv_ftp_del_dir($ftp, $root_dir.$dir, true);
    return $check;
}
/*
   nv_copy_folder(NV_ROOTDIR . '/themes/default/',NV_ROOTDIR . '/themes/abc/');
 */
function nv_copy_folder($source,$destination){
    $files=nv_scandir($source,'//');
    foreach($files as $name){
        if(is_file($source.$name)){
            nv_copyfile($source.$name,$destination.$name);
        }
        else if(is_dir($source.$name)){
            nv_mkdir($destination,$name);
            nv_copy_folder($source.$name.'/',$destination.$name.'/');
            
        }
    }
    return true;
}
function nv_check_exist_domain($domain){
    global $db,$db_config,$lang_module,$module_data;
    $num=$db->query("SELECT COUNT(*) FROM " .$db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data." WHERE domain='".$domain."'")->fetchColumn();
    return (intval($num)===0)?'':$lang_module['exist_domain'];
}
function nv_check_exist_dbsite($dbsite){
    global $db,$db_config,$lang_module,$module_data;
    $num=$db->query("SELECT COUNT(*) FROM " .$db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data." WHERE dbsite='".$dbsite."'")->fetchColumn();
    return (intval($num)===0)?'':$lang_module['exist_csdl'];
}
function nv_check_username_reg($login)
{
    global $db, $lang_module, $global_users_config, $global_config;

    $error = nv_check_valid_login($login, $global_config['nv_unickmax'], $global_config['nv_unickmin']);
    if ($error != '') {
        return preg_replace('/\&(l|r)dquo\;/', '', strip_tags($error));
    }
    if ("'" . $login . "'" != $db->quote($login)) {
        return sprintf($lang_module['account_deny_name'], $login);
    }

    if (! empty($global_users_config['deny_name']) and preg_match('/' . $global_users_config['deny_name'] . '/i', $login)) {
        return sprintf($lang_module['account_deny_name'], $login);
    }
    $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . ' WHERE md5username= :md5username');
    $stmt->bindValue(':md5username', nv_md5safe($login), PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetchColumn()) {
        return sprintf($lang_module['account_registered_name'], $login);
    }
    $stmt = $db->prepare('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_reg WHERE md5username= :md5username');
    $stmt->bindValue(':md5username', nv_md5safe($login), PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetchColumn()) {
        return sprintf($lang_module['account_registered_name'], $login);
    }

    return '';
}

function create_sub_website($row){
    global $nv_Request,$lang_module,$db,$nv_Cache,$global_config,$db_config,$module_data,$array_config,$admin_info;
    $error = array();
    if (! empty($row['domain'])) {
            $row['domain'] = preg_replace('/^(http|https)\:\/\//', '', $row['domain']);
            $row['domain'] = preg_replace('/^([^\/]+)\/*(.*)$/', '\\1', $row['domain']);
            $_p  = '';
            if (preg_match('/(.*)\:([0-9]+)$/', $row['domain'], $m)) {
                    $row['domain'] = $m[1];
                    $_p  = ':' . $m[2];
            }
			$host = explode('.',nv_strtolower($row['domain']));
            $row['dbsite'] = str_replace('-', '_', $host[0]);
			//$row['domain'] = implode('.',$host);
            $row['domain'] = nv_check_domain(nv_strtolower($row['domain']));
    }
    
    if( empty( $row['cid'] ) )
    {
            $error[] = $lang_module['error_required_cid'];
    }
    elseif( empty( $row['domain'] ) && $row['idsite']==0)
    {
            $error[] = $lang_module['error_required_domain'];
    }elseif( $row['domaintype'] == "subdomain" and $row['subdomain'] != "")
    {
		$row['subdomain'] = nv_check_domain(nv_strtolower($row['subdomain']));
		if(empty( $row['subdomain']))
		{
            $error[] = $lang_module['error_required_subdomain'];
		}
    }elseif( empty( $row['sample'] ) ){
			$error[] = $lang_module['error_required_sample'];
	}elseif( $row['password']!==$row['repassword'])
    {
        $error[] = $lang_module['error_pass'];
    }else if ((($check_login = nv_check_username_reg($row['username']))) != '' && $row['idsite']==0) {
        $error[] = $check_login;
    }else if (($check_pass = nv_check_valid_pass($row['password'], $global_config['nv_upassmax'], $global_config['nv_upassmin'])) != '' && $row['idsite']==0 ) {
        $error[] = $check_pass;
    }else if((($check_domain = nv_check_exist_domain($row['domain']))) != '' && $row['idsite']==0){
        $error[] = $check_domain;
    }else if((($check_dbsite = nv_check_exist_dbsite($row['dbsite']))) != '' && $row['idsite']==0){
        $error[] = $check_dbsite;
    }else if((($email = nv_check_valid_email($row['email']))) != '' && $row['idsite']==0){
        $error[] = $email;
    }
    if( empty( $error ) )
    {
            try
            {
                if( empty( $row['idsite'] ) )
                {
						$row['domainold']=$row['domain'];
						$array_info_site=$row;
						$array_info_site['prefix']=$db_config['prefix'];
						$array_info_site['lang']=NV_LANG_DATA;
						$array_info_site['userid']=(!empty($admin_info['userid']))?$admin_info['userid']:1;
						$array_info_site['username']=$row['username'];
						$array_info_site['password']=$row['password'];
						$array_info_site['StoreName']=$row['StoreName'];
						$array_info_site['businesstypeid']=$row['businesstypeid'];
						$array_info_site['hovaten']=$row['hovaten'];
						$array_info_site['email']=$row['email'];
						$array_info_site['sample']=$row['sample'];
						if($array_config['cpaneltype'] == 'vestacp'){
							site_install_create_hostting_vestacp($array_info_site);
						}
                        $sql =  'INSERT INTO ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' (cid, domain, subdomain, domaintype, dbsite, sample, businesstypeid, allowuserreg, admin_id) VALUES (:cid, :domain, :subdomain, :domaintype,  :dbsite, :sample, :businesstypeid, :allowuserreg, 1)' ;
                        $data_insert['cid']= $row['cid'];
                        $data_insert['domain']= $row['domain'];
                        $data_insert['subdomain']= $row['subdomain'];
                        $data_insert['domaintype']= $row['domaintype'];
                        $data_insert['sample']= $row['sample'];
                        $data_insert['businesstypeid']= $row['businesstypeid'];
                        $data_insert['dbsite']= $array_config['cpanel_pre_host'].'_'.$row['dbsite'];
                        $data_insert['allowuserreg']= $row['allowuserreg'];
                        $idsite= $db->insert_id($sql, 'idsite', $data_insert);
                        if( $idsite )
                        {
								
                                if(defined('NV_CONFIG_DIR')){
										$array_info_site['idsite']=$idsite;
                                        site_install($array_info_site);
                                        site_install_create_sql($array_info_site);
										$_full_name = $array_info_site['StoreName'];
										$subject = $lang_module['add_site']. ' ' .  $array_info_site['StoreName'] . ' ' . $lang_module['success_at'] . ' ' . $global_config['site_name'];
										$content_email = $lang_module['hello'] . ' ' . $array_info_site['username'] . '!<br>';
										$content_email .= $lang_module['your_added_site'] . ' ' . $array_info_site['StoreName'] . ' ' . $lang_module['success_at'] . ' ' . $global_config['site_name'] . '.<br><br>';
										$content_email .= $lang_module['your_go_to_site'] . ' <a href="' . $row['domain'] . '/admin" > ' . $row['domain'] . '/admin </a>' . $lang_module['use_manager_site'] . '.<br><br>';
										$content_email .= $lang_module['thanks']  . '<br>';
										$message = sprintf($content_email, $_full_name, $global_config['site_name'], $row['domain'], $array_info_site['username'], $array_info_site['email'], nv_date('H:i d/m/Y', NV_CURRENTTIME ));
										$send = nv_sendmail($global_config['site_email'], $array_info_site['email'], $subject, $message);
                                        die();
                                }
                        }
                }
                else
                {
						
                        $stmt = $db->prepare('UPDATE ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' SET cid = :cid, subdomain = :subdomain, allowuserreg = :allowuserreg WHERE idsite=' . $row['idsite']);
                        $stmt->bindParam( ':cid', $row['cid'], PDO::PARAM_INT );
                        $stmt->bindParam( ':subdomain', $row['subdomain'], PDO::PARAM_STR );
                        $stmt->bindParam(':allowuserreg', $row['allowuserreg'], PDO::PARAM_INT);
                        $stmt->execute();
                        if( $stmt->rowCount() )
                        {
                                if(defined('NV_CONFIG_DIR')){
										$row = $db->query('SELECT * FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' where idsite=' . $row['idsite'])->fetch();
                                        $array_info_site=$row;
                                        $array_info_site['prefix']=$db_config['prefix'];
                                        $array_info_site['lang']=NV_LANG_DATA;
                                        $array_info_site['userid']=$admin_info['userid'];
										
                                        $array_info_site['dbsite']=$row['dbsite'];
										update_sub_website($array_info_site);
                                        $nv_Cache->delMod( $module_name );
                                        Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=site'   );
                                        die();
                                }
                        }
                }
            }
            catch( PDOException $e )
            {
                    trigger_error( $e->getMessage() );
                    die( $e->getMessage() ); //Remove this line after checks finished
            }
    }
    return $error;
}
function first_site_install($array_info_site){
    //copy asset
    nv_mkdir( NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/site/','site_default');
    $scandir = nv_scandir(NV_ROOTDIR.'/'.NV_ASSETS_DIR,'//');
    foreach ($scandir as $dir) {
        if(!in_array($dir,array('css','editors','fonts','images','js','tpl','domain','site'))){
            nv_mkdir( NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/site/site_default/',$dir);
            nv_copy_folder(NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/'.$dir.'/',NV_ROOTDIR.'/'.NV_ASSETS_DIR.'/site/site_default/'.$dir.'/');
        }
    }
    //copy upload
    nv_mkdir( NV_ROOTDIR . '/uploads', 'site_default' );
    $scandir = nv_scandir(NV_ROOTDIR.'/uploads','//');
    foreach ($scandir as $dir) {
        if(!in_array($dir,array('site_default'))){
            nv_mkdir( NV_ROOTDIR.'/uploads/site_default/',$dir);
            nv_copy_folder(NV_ROOTDIR.'/uploads/'.$dir.'/',NV_ROOTDIR.'/uploads/site_default/'.$dir.'/');
        }
    }
    site_install($array_info_site);
}
function site_install($array_info_site)
{
    global $array_config;
	
    nv_deletefile ( NV_ROOTDIR . '/' .  NV_CONFIG_DIR . '/config_ini.'.$array_info_site['domainold'].'.php', $delsub = false );
    nv_deletefile ( NV_ROOTDIR . '/' .  NV_CONFIG_DIR . '/config_ini.'.$array_info_site['domain'].'.php', $delsub = false );
    if($array_config['cpaneltype'] == 'cpanel'){
		$dbsite = (!empty($array_info_site['idsite'])?$array_config['cpanel_pre_host']."_":'').$array_info_site['dbsite'];
	}elseif ($array_config['cpaneltype'] == 'directadmin'){
		$dbsite = (!empty($array_info_site['idsite'])?$array_config['da_pre_host']."_":'').$array_info_site['dbsite'];
	}else{
		$dbsite = (!empty($array_info_site['idsite'])?$array_config['vesta_pre_host']."_":'').$array_info_site['dbsite'];
	}
	$system_config = "<?php";
    $system_config .=   "\n\$db_config['dbsite'] = '". $dbsite ."';
                        \n\$global_config['site_dir']= '" . $array_info_site['domain'] . "';
                        \n\$global_config['site_domain'] = '" . $array_info_site['domain'] . "';
                        \n\$global_config['name_show'] = 0;
                        \n\$global_config['sitetimestamp'] = '1';
                        \n\$global_config['allowuserreg'] = '" . $array_info_site['allowuserreg'] . "';
                        \n\$global_config['idsite'] = " . $array_info_site['idsite'] . ";
                        ";
    nv_mkdir( NV_ROOTDIR . '/'.NV_ASSETS_DIR.'/site/', $array_info_site['domain']);
    nv_mkdir( NV_ROOTDIR . '/uploads', $array_info_site['domain'] );
    nv_mkdir( NV_ROOTDIR . '/data/cache', $array_info_site['domain'] );
    nv_mkdir( NV_ROOTDIR . '/data/logs/dump_backup', $array_info_site['domain'] );
	
    nv_copy_folder(NV_ROOTDIR . '/assets/site/site_default/',NV_ROOTDIR . '/assets/site/'.$array_info_site['domain'].'/');
    nv_copy_folder(NV_ROOTDIR . '/uploads/site_default/',NV_ROOTDIR . '/uploads/'.$array_info_site['domain'].'/');
    $filename = NV_ROOTDIR . '/' . NV_CONFIG_DIR . '/config_ini.'.$array_info_site['domain'].'.php';
	
    if (! empty($filename) and ! empty($system_config)) {
            try {
                    $filesize = file_put_contents($filename, $system_config, LOCK_EX);
                    if (empty($filesize)) {
                            $return = false;
                    }
            } catch (exception $e) {
                    $return = false;
            }
    }
	
}
function create_database($array_info_site){
    global $array_config,$db_config;
	$dbsite = $array_info_site['dbsite'];
	if($array_config['cpaneltype'] == 'cpanel'){
		include NV_ROOTDIR.'/includes/xmlapi.php';
		$opts = [
			 "cpanelUserName" => $array_config['cpanel_ftp_user_name'],   //Cpanel UserUserName
			 "cpanelPassword" => $array_config['cpanel_ftp_user_pass'],  //Cpanel UserPassword
			 "dbusername"     => $db_config['dbuname'],     //DatabaseUsername
			 "dbPassword"     => $db_config['dbpass'],     //DatabasePassword
		];

		$xmlapi = new xmlapi($array_config['cpanel_ip']); //Host name(domain or IP)  

		$xmlapi->set_port( $array_config['cpanel_port'] );   

		$xmlapi->password_auth($opts['cpanelUserName'],$opts['cpanelPassword']);    

		// database Name

		$TARGET_DB_NAME = $dbsite;

		// database creation 

		$createdb = $xmlapi->api1_query($opts['cpanelUserName'], "Mysql", "adddb",  array($TARGET_DB_NAME));   

		// adds user to database
		
		$addusr = $xmlapi->api1_query($opts['cpanelUserName'], "Mysql", "adduserdb",  array($TARGET_DB_NAME, $opts['dbusername'], 'all'));
		if($array_info_site['domaintype']=="domain")
		{
			$xmlapi->park($opts['cpanelUserName'],$array_info_site['domain'],'');  
		}elseif($array_info_site['domaintype']=="subdomain" and $array_info_site['subdomain'] != ""){
			$xmlapi->park($opts['cpanelUserName'],$array_info_site['subdomain'],'');  
		}
    }elseif ($array_config['cpaneltype'] == 'directadmin'){
		include NV_ROOTDIR.'/includes/httpsocket.php';
		$sock = new HTTPSocket;
		$sock->connect(NV_SERVER_NAME,5555);
		$sock->set_login($array_config['ftp_user_name'],$array_config['ftp_user_pass']);
		$sock->set_method('POST');
		$sock->query('/CMD_API_DATABASES',
				array(
						'action' => 'create',
						'name' => $dbsite,
						'userlist' => "admin",//lay user da ton tai
						'passwd' => $array_config['ftp_user_pass'],
						'passwd2' => $array_config['ftp_user_pass'],
			));
		$result = $sock->fetch_body();
    }else{
		site_install_create_database_hostting_vestacp($array_info_site);
	}	
}
function insert_database($array_info_site,$userid,$author){
    global $array_config,$db_config,$lang_module,$db_slave,$module_data,$global_config, $array_samples_data;
	if($array_config['cpaneltype'] == 'cpanel'){
		$db_config['dbname']=$array_config['cpanel_pre_host']."_".$array_info_site['dbsite'];
	}elseif ($array_config['cpaneltype'] == 'directadmin'){
		$db_config['dbname']=$array_config['da_pre_host']."_".$array_info_site['dbsite'];
	}else{
		$db_config['dbname']=$array_config['vesta_pre_host']."_".$array_info_site['dbsite'];
	}
    $db = new NukeViet\Core\Database($db_config);
	$db_config['error']="";
	// Cai dat du lieu cho he thong
	if (empty($db_config['error'])) {
		if (in_array('data_' . $array_info_site['sample'] . '.php', $array_samples_data)) {
            require NV_ROOTDIR . '/data/site/data_' . $array_info_site['sample'] . '.php';
			foreach ($sql_create_table as $_sql) {
				$db->query($_sql);
			}
			unset($sql_create_table);
			
			
			$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('sys', 'global', 'my_domains',  '" . $array_config['my_domains'] . "')");
			if(!empty($array_info_site['StoreName'])){
				$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . "(lang, module, config_name, config_value) VALUES ('vi', 'global', 'site_name',  '" . $array_info_site['StoreName'] . "')");
			}
			//$db->query($sql="UPDATE " . NV_CONFIG_GLOBALTABLE . " SET config_value = '" . $global_config['site_email'] . "' WHERE lang = 'sys' AND module = 'site' AND config_name = 'site_email'");
			$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('vi', 'global', 'preview_theme', '')");
			$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'site', 'site_email', '" . $array_info_site['email'] . "')");
			$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'cookie_prefix', '" . $global_config['cookie_prefix'] . "')");
			$db->query($sql="INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('sys', 'global', 'session_prefix', '" . $global_config['session_prefix'] . "')");
			if($array_info_site['userid'] != "1")
			{
				$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(admin_id, editor, lev, files_level, position, main_module, addtime, edittime, is_suspend, susp_reason, check_num, last_login, last_ip, last_agent) VALUES (1, 'ckeditor', 1, 'adobe,archives,audio,documents,flash,images,real,video|1|1|1', 'Administrator', 'siteinfo', 0, 0, 0, '', '', 0, '', '')");
				$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(admin_id, editor, lev, files_level, position, main_module, addtime, edittime, is_suspend, susp_reason, check_num, last_login, last_ip, last_agent) VALUES (" . $array_info_site['userid'] . ", 'ckeditor', 2, '', 'admin', 'siteinfo', 0, 0, 0, '', '', 0, '', '')");
			}else{
				$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(admin_id, editor, lev, files_level, position, main_module, addtime, edittime, is_suspend, susp_reason, check_num, last_login, last_ip, last_agent) VALUES (1, 'ckeditor', 1, 'adobe,archives,audio,documents,flash,images,real,video|1|1|1', 'Administrator', 'siteinfo', 0, 0, 0, '', '', 0, '', '')");
			}
			$author['admin_id']=$userid;
			$author['lev']=2;
			$author['position']=$lang_module['dieu_hanh_chung'];
			$db->query($sql="INSERT INTO " . NV_AUTHORS_GLOBALTABLE ."(".implode(",",array_keys($author)).") VALUES ('".implode("','",array_values($author))."')");
		}
	}
    
    return true;
}
function site_install_create_sql($array_info_site)
{
    global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	$password = $crypt->hash_password($array_info_site['password'], $global_config['hashprefix']);
	$array_info_site['userid']=(!empty($array_info_site['userid']))?$array_info_site['userid']:1;
	$your_question = '1+1';
	$hovaten=(!empty($array_info_site['hovaten']))? splitHoten($array_info_site['hovaten']):array();
	$sql = "INSERT INTO " . NV_USERS_GLOBALTABLE . "
		(group_id, username, md5username, password, email, first_name, last_name, gender, photo, birthday, sig, regdate,
		question, answer, passlostkey, view_mail, remember, in_groups,
		active, checknum, last_login, last_ip, last_agent, last_openid, idsite) VALUES (
		4,
		:username,
		:md5username,
		:password,
		:email,
		:first_name,
		:last_name,
		:gender
		, '',
		:birthday,
		:sig,
		 " . NV_CURRENTTIME . ",
		:question,
		:answer,
		'', 0, 1,
		'4',
		1, '', 0, '', '', '', " . $array_info_site['idsite'] . ")";
	$data_insert = array();
	$data_insert['username'] = $array_info_site['username'];
	$data_insert['md5username'] = nv_md5safe($array_info_site['username']);
	$data_insert['password'] = $password;
	$data_insert['email'] = $array_info_site['email'];

	$data_insert['first_name'] = (!empty($hovaten['ho']))?$hovaten['ho']:$lang_module['authors'];
	$data_insert['last_name'] = (!empty($hovaten['ten']))?$hovaten['ten']:'Chung';


	$data_insert['question'] = $your_question;
	$data_insert['answer'] = 2;
	$data_insert['gender'] = 2;
	$data_insert['birthday'] = intval(NV_CURRENTTIME);
	$data_insert['sig'] = '';
	$userid = $db->insert_id($sql, 'userid', $data_insert);
    $db->query($sql="UPDATE " . $db_config['dbsystem'] . "." .$db_config['prefix'] . "_" . $module_data . " SET admin_id = '" . $userid . "' WHERE idsite = " . $array_info_site['idsite'] . "");
    $db->select("*")->from(NV_AUTHORS_GLOBALTABLE)->where('admin_id = '.$array_info_site['userid'] . '');
    $author=$db->query($db->sql())->fetch();
    create_database($array_info_site);
    insert_database($array_info_site,$userid,$author);
    Header('Location: http://' . $array_info_site['domain'] . '/admin/index.php');
}
function delete_sub_website($array_info_site)
{
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	
	delete_database($array_info_site);
}

function delete_database($array_info_site){
    global $array_config,$db_config;
	$dbsite = $array_info_site['dbsite'];
	if($array_config['cpaneltype'] == 'cpanel'){
		include NV_ROOTDIR.'/includes/xmlapi.php';
		$opts = [
			 "cpanelUserName" => $array_config['cpanel_ftp_user_name'],   //Cpanel UserUserName
			 "cpanelPassword" => $array_config['cpanel_ftp_user_pass'],  //Cpanel UserPassword
			 "dbusername"     => $db_config['dbuname'],     //DatabaseUsername
			 "dbPassword"     => $db_config['dbpass'],     //DatabasePassword
		];

		$xmlapi = new xmlapi($array_config['cpanel_ip']); //Host name(domain or IP)  

		$xmlapi->set_port( $array_config['cpanel_port'] );   

		$xmlapi->password_auth($opts['cpanelUserName'],$opts['cpanelPassword']);    

		// database Name

		$TARGET_DB_NAME = $dbsite;

		// database delete 
		$createdb = $xmlapi->api1_query($opts['cpanelUserName'], "Mysql", "deldb",  array($TARGET_DB_NAME));   

		// adds user to database

		if($array_info_site['domaintype']=="domain")
		{
			$xmlapi->unpark($opts['cpanelUserName'],$array_info_site['domain'],'');  
		}elseif($array_info_site['domaintype']=="subdomain" and $array_info_site['subdomain'] != ""){
			$xmlapi->unpark($opts['cpanelUserName'],$array_info_site['subdomain'],'');  
		}
	}elseif ($array_config['cpaneltype'] == 'directadmin'){
		include NV_ROOTDIR.'/includes/httpsocket.php';
		$sock = new HTTPSocket;
		$sock->connect(NV_SERVER_NAME,5555);
		$sock->set_login($array_config['ftp_user_name'],$array_config['ftp_user_pass']);
		$sock->set_method('POST');
		$sock->query('/CMD_API_DATABASES',
				array(
						'action' => 'create',
						'name' => $dbsite,
						'userlist' => "admin",//lay user da ton tai
						'passwd' => $array_config['ftp_user_pass'],
						'passwd2' => $array_config['ftp_user_pass'],
			));
		$result = $sock->fetch_body();
    }else{
		site_install_delete_database_hostting_vestacp($array_info_site);
	}	
}
function update_sub_website($array_info_site)
{
	global $db_config,$global_config,$db,$db_slave,$crypt,$lang_module,$array_config,$module_data;
	$array_info_site['dbsite']=$array_info_site['domain'];
	$array_info_site['domain']=$array_info_site['subdomain'];
	site_install($array_info_site);
	include NV_ROOTDIR.'/includes/xmlapi.php';
    $opts = [
         "cpanelUserName" => $array_config['cpanel_ftp_user_name'],   //Cpanel UserUserName
         "cpanelPassword" => $array_config['cpanel_ftp_user_pass'],  //Cpanel UserPassword
         "dbusername"     => $db_config['dbuname'],     //DatabaseUsername
         "dbPassword"     => $db_config['dbpass'],     //DatabasePassword
    ];

    $xmlapi = new xmlapi($array_config['cpanel_ip']); //Host name(domain or IP)  

    $xmlapi->set_port( $array_config['cpanel_port'] );   

    $xmlapi->password_auth($opts['cpanelUserName'],$opts['cpanelPassword']);    

	$xmlapi->park($opts['cpanelUserName'],$array_info_site['subdomain'],'');  
}

function vesta_curl_query( $url, $postdata, $authstr )
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        // Return contents of transfer on curl_exec
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // Allow self-signed certs
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // Set the URL
        curl_setopt($curl, CURLOPT_URL, $url);
        // Increase buffer size to avoid "funny output" exception
        curl_setopt($curl, CURLOPT_BUFFERSIZE, 131072);

        // Pass authentication header
        $header[0] =$authstr .
            "Content-Type: application/x-www-form-urlencoded\r\n" .
            "Content-Length: " . strlen($postdata) . "\r\n" . "\r\n" . $postdata;

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        curl_setopt($curl, CURLOPT_POST, 1);

        $result = curl_exec($curl);
        if ($result == false) {
            throw new Exception("curl_exec threw error \"" . curl_error($curl) . "\" for " . $url . "?" . $postdata );
        }
        curl_close($curl);

        return $result;
    }
//vesta hosting
function site_install_create_hostting_vestacp($array_info_site)
{
	global $array_config;
	// Server credentials
	
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_port = $array_config['vesta_port'];
	$vst_returncode = 'yes';
	$vst_command = 'v-add-web-domain-alias';

	// New Domain
	$username = $array_config['vesta_user'];
	$domain = $array_config['my_domains'];
	$alias = $array_info_site['domain'];
	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $domain,
		'arg3' => $alias,
		'arg4' => 'yes'
	);
	// Send POST query via cURL
	$postdata = http_build_query($postvars);
	/* $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'. $vst_port .'/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	return curl_exec($curl); */
	$url = 'https://' . $vst_hostname . ':'. $vst_port .'/api/';
	return vesta_curl_query($url, $postdata,'');
}

function site_delete_hostting_vestacp($array_info_site)
{
	global $array_config;
	// Server credentials
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_returncode = 'yes';
	$vst_command = 'v-delete-web-domain-alias';

	// New Domain
	$username = $array_config['vesta_user'];
	$domain = $array_config['my_domains'];
	$alias = $array_info_site['domain'];
	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $domain,
		'arg3' => $alias
	);

	// Send POST query via cURL
	$postdata = http_build_query($postvars);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':8083/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	$answer = curl_exec($curl);
	curl_close($curl);
	return $answer;
}
// vesta database
function site_install_create_database_hostting_vestacp($array_info_site)
{
	global $array_config;
	include NV_ROOTDIR . '/'. 'config.php';
	// Server credentials
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_port = $array_config['vesta_port'];
	$vst_returncode = 'yes';
	$vst_command = 'v-add-database';

	// New Database
	
	$username = $array_config['vesta_user'];
	$db_name = $array_info_site['dbsite'];
	$db_user = str_replace($username."_",'', $db_config['dbuname']);
	$db_pass = $db_config['dbpass'];

	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $db_name,
		'arg3' => $db_user,
		'arg4' => $db_pass
	);
	$postdata = http_build_query($postvars);

	// Send POST query via cURL
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'. $vst_port .'/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	return curl_exec($curl);
	
}
function site_install_delete_database_hostting_vestacp($array_info_site)
{
	global $array_config;
	include NV_ROOTDIR . '/'. 'config.php';
	// Server credentials
	$vst_hostname = $array_config['vesta_host'];
	$vst_username = $array_config['vesta_user'];
	$vst_password = $array_config['vesta_pass'];
	$vst_returncode = 'no';
	$vst_command = 'v-delete-database';

	// New Database
	$username = $array_config['vesta_user'];
	$db_name = $array_config['vesta_user'] . '_' . $array_info_site['dbsite'];

	// Prepare POST query
	$postvars = array(
		'user' => $vst_username,
		'password' => $vst_password,
		'returncode' => $vst_returncode,
		'cmd' => $vst_command,
		'arg1' => $username,
		'arg2' => $db_name
	);
	$postdata = http_build_query($postvars);

	// Send POST query via cURL
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':8083/api/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	$answer = curl_exec($curl);
	return $answer;
}
function site_delete_sql($array_info_site)
{
    global $global_config,$db,$admin_info;
	include NV_ROOTDIR . '/'. 'config.php';
    $dbname_tam=$db_config['dbname'];
	$dbsystem_tam=$db_config['dbsystem'];
    $db_config['dbname']=$array_config['vesta_user'] . '_' . $array_info_site['dbsite'];
    $db_config['dbsystem']=$array_config['vesta_user'] . '_' . $array_info_site['dbsite'];
    $db = new NukeViet\Core\Database($db_config);
    $db_config['error']="";
    if(!empty($db_config['dbname'])){
        $tables = array();
        // xoa du lieu cho he thong
        $sql_create_table = array();
        $sql_drop_table = array();
        require_once NV_ROOTDIR . '/install/action_' . $db_config['dbtype'] . '.php';
        $num_table = sizeof($sql_drop_table);
        if ($num_table > 0) {
			foreach ($sql_drop_table as $_sql) {
				try {
					$db->query($_sql);
				} catch (PDOException $e) {
					break;
				}
			}
        }
    }
    $db_config['dbname']=$dbname_tam;
	$db_config['dbsystem']=$dbsystem_tam;
    $db = new NukeViet\Core\Database($db_config);
}
