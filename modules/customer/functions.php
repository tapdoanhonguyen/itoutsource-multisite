<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2018 TDFOSS.,LTD. All rights reserved
 * @Createdate Sat, 05 May 2018 12:26:59 GMT
 */
if (!defined('NV_SYSTEM')) die('Stop!!!');

define('NV_IS_MOD_CUSTOMER', true);
require_once NV_ROOTDIR . '/modules/customer/site.functions.php';

if (isset($workforce_list[$user_info['userid']])) {
    define('CRM_WORKFORCE', true);
} else {
    define('CRM_CUSTOMER', true);
}

$array_config = $module_config[$module_name];
$array_config['groups_permission'] = unserialize($array_config['groups_permission']);
// foreach($groups_permission as $type_permission => $group_permission){
	// $xtpl->assign($type_permission . '_ck', in_array($group_id, explode(',', $group_permission)) ? 'checked="checked"' : '');
	// $array_config['groups_permission'][$type_permission] = explode(',', $group_permission)
// }

$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types WHERE active=1 ORDER BY weight';
$array_customer_type_id = $nv_Cache->db($_sql, 'id', $module_name);

$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_tags ORDER BY tid DESC';
$array_customer_tags = $nv_Cache->db($_sql, 'tid', $module_name);


$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_units ORDER BY tid DESC';
$array_customer_units = $nv_Cache->db($_sql, 'tid', $module_name);

$array_gender = array(
    2 => $lang_module['unknow'],
    1 => $lang_module['male'],
    0 => $lang_module['female']
);

function nv_customer_export_csv($array_data, $filename = 'customer.csv', $array_heading = array())
{
    $path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $filename;

    // create a file pointer connected to the output stream
    $output = fopen($path, 'w');

    // output the column headings
    if (!empty($array_heading)) {
        fputcsv($output, $array_heading);
    }

    if (!empty($array_data)) {
        foreach ($array_data as $data) {
            fputcsv($output, array_values($data));
        }
    }

    // output headers so that the file is downloaded rather than displayed
    header("Content-type: text/csv");
    header("Content-disposition: attachment; filename=" . $filename);
    readfile($path);

    fclose($output);
}

function nv_users_add($username, $password, $email, $first_name, $last_name, $gender, $birthday = 0, $adduser_email = 1)
{
    global $db, $global_config, $user_info, $nv_Cache, $crypt, $lang_module;

    // chế độ import dữ liệu
    $groups_list = nv_groups_list();

    $_user = array();
    $_user['view_mail'] = 0;
    $_user['in_groups'] = array(
        4 // thành viên chính thức
    );
    $_user['in_groups_default'] = 0;
    $_user['is_official'] = 1;

    // xác định nhóm thành viên
    $in_groups = array();
    foreach ($_user['in_groups'] as $_group_id) {
        if ($_group_id > 9) {
            $in_groups[] = $_group_id;
        }
    }
    $_user['in_groups'] = array_intersect($in_groups, array_keys($groups_list));

    if (empty($_user['is_official'])) {
        $_user['in_groups'][] = 7;
        $_user['in_groups_default'] = 7;
    } elseif (empty($_user['in_groups_default']) or !in_array($_user['in_groups_default'], $_user['in_groups'])) {
        $_user['in_groups_default'] = 4;
    }

    if (empty($_user['in_groups_default']) and sizeof($_user['in_groups'])) {
        trigger_error($lang_module['edit_error_group_default']);
        return 0;
    }
	
    $sql = "INSERT INTO " . NV_USERS_GLOBALTABLE . " (
                    group_id, username, md5username, password, email, first_name, last_name, gender, birthday, sig, regdate,
                    question, answer, passlostkey, view_mail,
                    remember, in_groups, active, checknum, last_login, last_ip, last_agent, last_openid, idsite)
                VALUES (
                    " . $_user['in_groups_default'] . ",
                    :username,
                    :md5_username,
                    :password,
                    :email,
                    :first_name,
                    :last_name,
                    :gender,
                    " . $birthday . ",
                    :sig,
                    " . NV_CURRENTTIME . ",
                    :question,
                    :answer,
                    '',
                     " . $_user['view_mail'] . ",
                     1,
                     '" . implode(',', $_user['in_groups']) . "', 1, '', 0, '', '', '', " . $global_config['idsite'] . "
                )";
    $data_insert = array();
    $data_insert['username'] = $username;
    $data_insert['md5_username'] = nv_md5safe($username);
    $data_insert['password'] = $crypt->hash_password($password, $global_config['hashprefix']);
    $data_insert['email'] = $email;
    $data_insert['first_name'] = $first_name;
    $data_insert['last_name'] = $last_name;
    $data_insert['gender'] = $gender;
    $data_insert['sig'] = '';
    $data_insert['question'] = '';
    $data_insert['answer'] = '';
    $userid = $db->insert_id($sql, 'userid', $data_insert);

    if (!$userid) {
        trigger_error($lang_module['error_unknow']);
        return 0;
    }

    nv_insert_logs(NV_LANG_DATA, 'users', 'log_add_user', 'userid ' . $userid, $user_info['userid']);

    if (!empty($_user['in_groups'])) {
        foreach ($_user['in_groups'] as $group_id) {
            if ($group_id != 7) {
                nv_groups_add_user($group_id, $userid, 1, $module_data);
            }
        }
    }
    $db->query('UPDATE ' . NV_USERS_GLOBALTABLE . '_groups SET numbers = numbers+1 WHERE group_id=' . ($_user['is_official'] ? 4 : 7));
    $nv_Cache->delMod('users');

    // Gửi mail thông báo
    if (!empty($adduser_email)) {
        $full_name = nv_show_name_user($first_name, $last_name, $username);
        $subject = $lang_module['adduser_register'];
        $_url = NV_MY_DOMAIN . nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users', true);
        $message = sprintf($lang_module['adduser_register_info1'], $full_name, $global_config['site_name'], $_url, $username, $password);
        @nv_sendmail($global_config['site_email'], $email, $subject, $message);
    }

    return $userid;
}

/**
 * nv_groups_list()
 *
 * @return
 */
function nv_groups_list($mod_data = 'users')
{
    global $nv_Cache;
    $cache_file = NV_LANG_DATA . '_groups_list_' . NV_CACHE_PREFIX . '.cache';
    if (($cache = $nv_Cache->getItem($mod_data, $cache_file)) != false) {
        return unserialize($cache);
    } else {
        global $db, $db_config, $global_config, $lang_global;

        $groups = array();
        $_mod_table = ($mod_data == 'users') ? NV_USERS_GLOBALTABLE : $db_config['prefix'] . '_' . $mod_data;
        $result = $db->query('SELECT group_id, title, idsite FROM ' . $_mod_table . '_groups WHERE (idsite = ' . $global_config['idsite'] . ' OR (idsite =0 AND siteus = 1)) ORDER BY idsite, weight');
        while ($row = $result->fetch()) {
            if ($row['group_id'] < 9) {
                $row['title'] = $lang_global['level' . $row['group_id']];
            }
            $groups[$row['group_id']] = ($global_config['idsite'] > 0 and empty($row['idsite'])) ? '<strong>' . $row['title'] . '</strong>' : $row['title'];
        }
        $nv_Cache->setItem($mod_data, $cache_file, serialize($groups));

        return $groups;
    }
}

function nv_caculate_total($price, $quantity, $vat = 0)
{
    $total = $price * $quantity;
    $total = $total + (($total * $vat) / 100);
    return $total;
}


function add_customer($row)
{	
	global $module_data, $db, $user_info;
	
			if (isset($row['birthday']) and preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $row['birthday'], $m)) {
                $birthday = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
            } else {
                $birthday = 0;
            }
			
	
            $gender = ($row['gender'] == 'Nam') ? 1 : 0;
			
			$row['type_id'] = 3;
			
			/*
			 if (!empty($row['unit'])) {
				if (!is_numeric($row['unit'])) {
					$_sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_units(title) VALUES (:title)';
					$data_insert = array(
						'title' => $row['unit']
					);
					$row['unit'] = $db->insert_id($_sql, 'id', $data_insert);
				}
			}
		
			
			
			// tạo mã code
			// lấy id lớn nhất ra
			$id_max = $db->query('SELECT max(id) max FROM ' . NV_PREFIXLANG . '_' . $module_data)->fetchColumn();
						
						
			$row['code'] = sprintf("VIDOCO-%3s\n", ($id_max+1));
			
			*/
			
            $_sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . ' (type_id, code, first_name, last_name, main_phone, other_phone, main_email, other_email, birthday, facebook, skype, zalo, website, note, address, gender, unit, care_staff, addtime, userid, tochu_canhan, supplier) VALUES (:type_id, :code, :first_name, :last_name, :main_phone, :other_phone, :main_email, :other_email, :birthday, :facebook, :skype, :zalo, :website, :note, :address, :gender, :unit, :care_staff, :addtime, :userid, :tochu_canhan, :supplier)';
            $data_insert = array();
            $data_insert['type_id'] = $row['type_id'];
            $data_insert['code'] = $row['C'];
            $data_insert['first_name'] = $row['D'];
            $data_insert['last_name'] = '';
            $data_insert['main_phone'] = $row['H'];
            $data_insert['other_phone'] = !empty($row['G']) ? $row['G'] : '';
            $data_insert['main_email'] = $row['J'];
            $data_insert['other_email'] = !empty($row['other_email']) ? $row['other_email'] : '';
            $data_insert['birthday'] = $birthday;
            $data_insert['gender'] = $gender;
            $data_insert['address'] = !empty($row['E']) ? $row['E'] : '';
            $data_insert['unit'] = !empty($row['unit']) ? $row['unit'] : '';
            $data_insert['facebook'] = !empty($row['facebook']) ? $row['facebook'] : '';
            $data_insert['skype'] = !empty($row['skype']) ? $row['skype'] : '';
            $data_insert['zalo'] = !empty($row['zalo']) ? $row['zalo'] : '';
            $data_insert['website'] = !empty($row['K']) ? $row['K'] : '';
            $data_insert['care_staff'] = 6; // nhân viên chăm soc 6 id của lê thúc vinh
            $data_insert['note'] = !empty($row['note']) ? $row['note'] : '';
            $data_insert['addtime'] = NV_CURRENTTIME;
            $data_insert['userid'] = $user_info['userid'];
            $data_insert['tochu_canhan'] = !empty($row['A']) ? $row['A'] : 0;
            $data_insert['supplier'] = !empty($row['B']) ? $row['B'] : 0;

            $new_id = $db->insert_id($_sql, 'id', $data_insert);
			
			// liên kết tài khoản, tạo tài khoản mới
            if ($new_id) {
					if (empty($row['password'])) {
						$_len = round(($global_config['nv_upassmin'] + $global_config['nv_upassmax']) / 2);
						$row['password'] = nv_genpass($_len, $global_config['nv_upass_type']);
					}
					
                    $row['gender'] = $row['gender'] ? 'M' : 'F';
					
					$row['adduser_email'] = 1; // gửi thông tin về email
					$row['first_name'] = $row['D'];
					//print_r($row['birthday']);die;
					$userid = nv_users_add($row['C'], $row['password'], $row['J'], $row['first_name'], $row['last_name'], $row['gender'], $birthday, $row['adduser_email']);
					
                    if ($userid > 0) {
						
						// chia sẻ tài khoản khác được xem khách hàng 
						$array_userid = array(
							$user_info['userid']
						);

						if (empty($row['id'])) {
							$array_userid = array_unique($array_userid);
							$sth = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_share_acc (userid, customerid, permisson) VALUES(:userid, :customerid, 1)');
							foreach ($array_userid as $userid) {
								$sth->bindParam(':userid', $userid, PDO::PARAM_INT);
								$sth->bindParam(':customerid', $new_id, PDO::PARAM_INT);
								$sth->execute();
							}
						}
						// kết thúc chia sẻ
						
                        $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET userid_link=' . $userid . ' WHERE id=' . $new_id);
                    }
            }
	
	return $userid;
	
}

function add_service($row)
{
	global $module_data, $db;
	
	// lấy id khách hàng
	$id_cus = $db->query('SELECT id FROM '. NV_PREFIXLANG .'_customer WHERE code ="'. $row['K'] .'"')->fetchColumn();
	
	$service['weight'] = $db->query('SELECT COUNT(*) as count FROM '. NV_PREFIXLANG .'_invoice_service WHERE idcustomer ='. $id_cus )->fetchColumn();
	
	$service['weight'] = $service['weight'] + 1;
	
	
	// loại dịch vụ
	if($row['B'])
	{	
		$service['itemid'] = $db->query('SELECT id FROM '. NV_PREFIXLANG .'_services WHERE title ="'. $row['B'] .'"')->fetchColumn();
	}
	
	$service['vat'] = ($row['G']/$row['F']) * 100;
	
	// thêm dịch vụ cho id khách hàng này
	
	$sth = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_invoice_service (idinvoice, idcustomer, module, itemid, unit_price, quantity, price, vat, total, note, createtime, cycle, duetime, addtime, partner, weight) VALUES(:idinvoice, :idcustomer, :module, :itemid, :unit_price, :quantity, :price, :vat, :total, :note, :createtime, :cycle, :duetime, :addtime, :partner, :weight)');
						
	$service['addtime'] = NV_CURRENTTIME;
	$service['createtime'] = $row['I'];
	$service['services'] = 'services';
	$service['quantity'] = 1;
	$service['duetime'] = $row['J'];
						
    $service['note'] = !empty($row['C']) ? $row['C'] : '';
    $total = $row['H'];
    $sth->bindParam(':idinvoice', $id_cus, PDO::PARAM_INT);
    $sth->bindParam(':idcustomer', $id_cus, PDO::PARAM_INT);
    $sth->bindParam(':module', $service['services'], PDO::PARAM_STR);
    $sth->bindParam(':itemid', $service['itemid'], PDO::PARAM_INT);
    $sth->bindParam(':unit_price', $row['F'], PDO::PARAM_STR);
    $sth->bindParam(':quantity', $service['quantity'], PDO::PARAM_INT);
    $sth->bindParam(':price', $row['F'], PDO::PARAM_STR);
    $sth->bindParam(':vat', $service['vat'], PDO::PARAM_STR);
    $sth->bindParam(':total', $row['H'], PDO::PARAM_STR);
    $sth->bindParam(':note', $service['note'], PDO::PARAM_STR);
    $sth->bindParam(':createtime', $service['createtime'], PDO::PARAM_INT);
    $sth->bindParam(':cycle', $row['cycle'], PDO::PARAM_INT);
    $sth->bindParam(':duetime', $service['duetime'], PDO::PARAM_INT);
    $sth->bindParam(':addtime', $service['addtime'], PDO::PARAM_INT);
    $sth->bindParam(':partner', $row['E'], PDO::PARAM_STR);
    $sth->bindParam(':weight', $service['weight'], PDO::PARAM_INT);
                           
							 
	$exc = $sth->execute();
	
}




function nv_customer_excel_download($array_data, $array_services, $type = 'xlsx')
{
    global $module_name, $admin_info, $lang_module;

    $array = array(
        'objType' => '',
        'objExt' => ''
    );
    switch ($type) {
        case 'xlsx':
            $array['objType'] = 'Excel2007';
            $array['objExt'] = 'xlsx';
            break;
        case 'ods':
            $array['objType'] = 'OpenDocument';
            $array['objExt'] = 'ods';
            break;
        default:
            $array['objType'] = 'CSV';
            $array['objExt'] = 'csv';
    }

    $objPHPExcel = PHPExcel_IOFactory::load(NV_ROOTDIR . '/modules/customer/customer.xls');
	
	
	// dịch vụ khách hàng
	
	$objPHPExcel->setActiveSheetIndex(1);

    // Set properties
    $objPHPExcel->getProperties()
    ->setCreator($admin_info['username'])
    ->setLastModifiedBy($admin_info['username'])
    ->setCategory($module_name);

    $columnIndex = 0;
    $rowIndex = 1;

    // Hien thi du lieu
    $i = $rowIndex + 1;
    $number = 1;
	
    foreach ($array_services as $data) {
        $j = $columnIndex;
        foreach ($data as $field => $value) {
			
            $col = PHPExcel_Cell::stringFromColumnIndex($j);
            $CellValue = $value;
            $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $CellValue);
            $j++;
        }
        $i++;
    }
	
	// danh sách khách hàng
    $objPHPExcel->setActiveSheetIndex(0);

    // Set properties
    $objPHPExcel->getProperties()
    ->setCreator($admin_info['username'])
    ->setLastModifiedBy($admin_info['username'])
    ->setCategory($module_name);

    $columnIndex = 0;
    $rowIndex = 1;

    // Hien thi du lieu
    $i = $rowIndex + 1;
    $number = 1;
	//print_r($array_data);die;
    foreach ($array_data as $data) {
        $j = $columnIndex;
        foreach ($data as $field => $value) {
            $col = PHPExcel_Cell::stringFromColumnIndex($j);
            $CellValue = $value;
            $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $CellValue);
            $j++;
        }
        $i++;
    }
	
	
	
	
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $array['objType']);
	
	
    $file_src = NV_ROOTDIR . NV_BASE_SITEURL . NV_TEMP_DIR . '/' . change_alias($lang_module['post_list'] . '-' . nv_date('d/m/Y', NV_CURRENTTIME)) . '.' . $array['objExt'];
    $objWriter->save($file_src);

    $download = new NukeViet\Files\Download($file_src, NV_ROOTDIR . NV_BASE_SITEURL . NV_TEMP_DIR);
    $download->download_file();
	
    Header('Location: ' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
	die();
}


function services_customer($item)
{
	global $module_data, $db;
	
	// lấy id khách hàng
	$list_service = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_invoice_service WHERE idcustomer ='. $item['id'])->fetchAll();
	
	$stt = 1;
	$data = array();
	foreach($list_service as $service)
	{
		$row = array();
		
		if($service['itemid'])
		$service['itemid'] = $db->query('SELECT title FROM '. NV_PREFIXLANG .'_services WHERE id ='. $service['itemid'])->fetchColumn();
	
		$row['stt'] = $stt;
		$row['itemid'] = $service['itemid'];
		$row['note'] = $service['note'];
		$row['cycle'] = $service['cycle'] .' tháng' ;
		$row['partner'] = $service['partner'];
		$row['price_format'] = number_format($service['price'],0,',',',');
		$vat = $service['price']*($service['vat']/100);
		$row['vat'] = number_format($vat,0,',',',');
		$row['quantity'] = $service['quantity'];
		$row['total'] = number_format($service['total'],0,',',',');
		$row['total'] = number_format($service['total'],0,',',',');
		
		$row['createtime'] = ($service['createtime'])? date('d/m/Y', $service['createtime']) : '';
		$row['duetime'] = ($service['duetime']) ? date('d/m/Y', $service['duetime']) : '';
		$row['code'] = $item['code'];
		$row['first_name'] = $item['first_name'] . ' ' . $row['last_name'];
		$row['main_email'] = $item['main_email'];
		$row['main_phone'] = $item['main_phone'];
		
		$data[] = $row;
		$stt++;
	}
	
	return $data ;
	

}

function loc_services($array_services)
{
	$data = array();
	$stt = 1;
	foreach($array_services as $service)
	{
		foreach($service as $s)
		{
			$s['stt'] = $stt;
			$data[] = $s;
			$stt++;
		}
	}
		
	return $data;
}


$array_tochuc_canha = array(
	'1' => 'Tổ chức',
	'2' => 'Cá nhân'
);