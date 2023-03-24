<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$error = array();
if(empty($array_config['cpaneltype'])){
	$array_config['cpaneltype']='vestacp';
}
if ( $nv_Request->isset_request( 'submit', 'post' ) )
{
	$alow_multi_old = $array_config['alow_multi'];
	$array_config['alow_multi'] = $nv_Request->get_int( 'alow_multi', 'post', 0 );
	$array_config['my_domains'] = $nv_Request->get_title( 'my_domains', 'post', '' );
	$array_config['cpanel_ip'] = $nv_Request->get_title( 'cpanel_ip', 'post', '' );
	$array_config['cpaneltype'] = $nv_Request->get_title( 'cpaneltype', 'post', '' );
	$array_config['cpanel_port'] = $nv_Request->get_title( 'cpanel_port', 'post', '' );
	$array_config['cpanel_pre_host'] = $nv_Request->get_title( 'cpanel_pre_host', 'post', '' );
	$array_config['cpanel_ftp_user_name'] = $nv_Request->get_title( 'cpanel_ftp_user_name', 'post', '' );
	$array_config['cpanel_ftp_user_pass'] = $nv_Request->get_title( 'cpanel_ftp_user_pass', 'post', '' );
	$array_config['da_ip'] = $nv_Request->get_title( 'da_ip', 'post', '' );
	$array_config['da_port'] = $nv_Request->get_title( 'da_port', 'post', '' );
	$array_config['da_pre_host'] = $nv_Request->get_title( 'da_pre_host', 'post', '' );
	$array_config['da_ftp_user_name'] = $nv_Request->get_title( 'da_ftp_user_name', 'post', '' );
	$array_config['da_ftp_user_pass'] = $nv_Request->get_title( 'da_ftp_user_pass', 'post', '' );
	$array_config['vesta_host'] = $nv_Request->get_title( 'vesta_host', 'post', '' );
	$array_config['vesta_port'] = $nv_Request->get_title( 'vesta_port', 'post', '' );
	$array_config['vesta_pre_host'] = $nv_Request->get_title( 'vesta_pre_host', 'post', '' );
	$array_config['vesta_user'] = $nv_Request->get_title( 'vesta_user', 'post', '' );
	$array_config['vesta_pass'] = $nv_Request->get_title( 'vesta_pass', 'post', '' );
	if($array_config['alow_multi']==1 ){
		$db->select('config_value')->from($db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_config')->where('config_name = "alow_multi"');
		$config_multi=$db->query($db->sql())->fetch();
		if($config_multi['config_value']!="1"){
			$db->query('UPDATE ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_users_groups SET siteus = 1 WHERE group_id=6');
			 $system_config = @file_get_contents(NV_ROOTDIR . '/includes/constants.php');
			if(strpos($system_config, "define('NV_CONFIG_DIR', '\".NV_ASSETS_DIR.\"/domain');" ) != true){
				$system_config.="\ndefine('NV_CONFIG_DIR', '\".NV_ASSETS_DIR.\"/domain');";
			}
			/*if(strpos($system_config, "define('SYSTEM_CACHEDIR', 'data/cache');" ) != true){
				$system_config.="\ndefine('SYSTEM_CACHEDIR', 'data/cache');";
			}
			if(strpos($system_config, "define('SYSTEM_UPLOADS_DIR', 'uploads');" ) != true){
				$system_config.="\ndefine('SYSTEM_UPLOADS_DIR', 'uploads');";
			} */
			$system_config=str_replace("NV_UPLOADS_DIR", "SYSTEM_UPLOADS_DIR", $system_config);
			//$system_config=str_replace("\ndefine('NV_CACHEDIR', 'data/cache');", "\n/*define('NV_CACHEDIR', 'data/cache');*/", $system_config);
			 $filename = NV_ROOTDIR . '/includes/constants.php';
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
			/* $admin_access = @file_get_contents(NV_ROOTDIR . '/includes/core/admin_access.php');
			$admin_access=str_replace("    if (strcasecmp(\$array_admin['checknum'], \$admin_info['check_num']) != 0 or    //check_num
        ! isset(\$array_admin['current_agent']) or empty(\$array_admin['current_agent']) or strcasecmp(\$array_admin['current_agent'], \$admin_info['current_agent']) != 0 or    //user_agent
        ! isset(\$array_admin['current_ip']) or empty(\$array_admin['current_ip']) or strcasecmp(\$array_admin['current_ip'], \$admin_info['current_ip']) != 0 or    //IP
        ! isset(\$array_admin['current_login']) or empty(\$array_admin['current_login']) or strcasecmp(\$array_admin['current_login'], intval(\$admin_info['current_login'])) != 0) {    //current_login
        return array();
    }", "", $admin_access);
			$filename = NV_ROOTDIR . '/includes/core/admin_access.php';
			if (! empty($filename) and ! empty($admin_access)) {
				try {
					$filesize = file_put_contents($filename, $admin_access, LOCK_EX);
					if (empty($filesize)) {
						$return = false;
					}
				} catch (exception $e) {
					$return = false;
				}
			} */
			if ( defined('NV_MY_DOMAIN')) {
				$domainroot=NV_MY_DOMAIN;
				$domainroot = preg_replace('/^(http|https)\:\/\//', '', $domainroot);
				$domainroot = preg_replace('/^([^\/]+)\/*(.*)$/', '\\1', $domainroot );
				$_p  = '';
				if (preg_match('/(.*)\:([0-9]+)$/', $domainroot, $m)) {
					$domainroot = $m[1];
					$_p  = ':' . $m[2];
				}
				$domainroot = nv_check_domain(nv_strtolower($domainroot));
			}
			$array_info_site=array(
				'idsite' => 0,
				'site_dir' => $domainroot,
				'site_domain' => $domainroot,
				'dbsite' => $db_config['dbsystem'],
				'allowuserreg' => '1',
				'domain' => $domainroot,
				'domainold' => $domainroot
			);
			define('NV_CONFIG_DIR', NV_ASSETS_DIR.'/domain');
					nv_mkdir( NV_ROOTDIR . '/'.NV_ASSETS_DIR, 'domain');
					nv_mkdir( NV_ROOTDIR . '/'.NV_ASSETS_DIR, 'site');
			first_site_install($array_info_site);
		}
	}else{
		$db->select('config_value')->from($db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_config')->where('config_name = "alow_multi"');
		$config_multi=$db->query($db->sql())->fetch();
		if($config_multi['config_value']!="0"){
			$db->query('UPDATE ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_users_groups SET siteus = 0 WHERE group_id=6');
			if ( defined('NV_MY_DOMAIN')) {
				$domainroot=NV_MY_DOMAIN;
				$domainroot = preg_replace('/^(http|https)\:\/\//', '', $domainroot);
				$domainroot = preg_replace('/^([^\/]+)\/*(.*)$/', '\\1', $domainroot );
				$_p  = '';
				if (preg_match('/(.*)\:([0-9]+)$/', $domainroot, $m)) {
					$domainroot = $m[1];
					$_p  = ':' . $m[2];
				}
				$domainroot = nv_check_domain(nv_strtolower($domainroot));
			}
			$system_config = @file_get_contents(NV_ROOTDIR . '/includes/constants.php');
					$system_config=str_replace("\ndefine('NV_CONFIG_DIR', '".NV_ASSETS_DIR."/domain');", '', $system_config);
					//$system_config=str_replace("\ndefine('SYSTEM_CACHEDIR', 'data/cache');", '', $system_config);
			$system_config=str_replace("SYSTEM_UPLOADS_DIR", "NV_UPLOADS_DIR", $system_config);
			if(strpos($system_config, "define('NV_UPLOADS_DIR', 'uploads');" ) != true){
				$system_config.="\ndefine('NV_UPLOADS_DIR', 'uploads');";
			}
			if(strpos($system_config, "define('NV_CACHEDIR', 'data/cache');" ) != true){
				$system_config.="\ndefine('NV_CACHEDIR', 'data/cache');";
			}
					$filename = NV_ROOTDIR . '/includes/constants.php';
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
	}
	$sth = $db->prepare('UPDATE ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_config SET config_value = :config_value WHERE config_name = :config_name');
	foreach ($array_config as $config_name => $config_value) {
		$sth->bindParam(':config_name', $config_name, PDO::PARAM_STR);
		$sth->bindParam(':config_value', $config_value, PDO::PARAM_STR);
		$sth->execute();
	}
	
    $nv_Cache->delMod($module_name);
}
if(intval($array_config['alow_multi'])==1){
	$array_config['alow_multi'] = 'checked=checked';
}else{
	$array_config['alow_multi'] = '';
}
$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );
foreach( $array_cpaneltype as $key => $value )
	{
		$xtpl->assign( 'CPANEL', array(
			'key' => $key,
			'title' => $value,
			'selected' => ($key == $array_config['cpaneltype']) ? ' selected="selected"' : ''
		) );
		$xtpl->parse( 'main.permission.select_ctype' );
	}
$xtpl->assign( 'ROW', $array_config);
if ( ! defined( 'NV_IS_GODADMIN' ) ) {
	$xtpl->parse( 'main.no_permission' );
}else{
	
	$xtpl->parse( 'main.permission' );
}


$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['config'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';