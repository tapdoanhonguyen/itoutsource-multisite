<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Fri, 14 Nov 2014 10:13:40 GMT
 */
if (!defined('NV_IS_MOD_CUSTOMER')) die('Stop!!!');


$not_allow = false;
if(!nv_user_in_groups($array_config['groups_permission']['allow_export'])){
	$not_allow = true;
}

$filename = 'customer.csv';

if ($nv_Request->isset_request('option', 'post') and !$not_allow) {
    $data = array(
        'page' => $nv_Request->get_int('page', 'post', 1),
        'per_page' => $nv_Request->get_int('per_page', 'post', 20),
        'selected_id' => $nv_Request->get_string('selected_id', 'post', ''),
        'where' => $nv_Request->get_string('where_string', 'post', ''),
        'join' => $nv_Request->get_string('join_string', 'post', ''),
        'checkssum' => $nv_Request->get_string('where_md5', 'post', ''),
        'ordername' => $nv_Request->get_string('ordername', 'post', ''),
        'ordertype' => $nv_Request->get_string('ordertype', 'post', '')
    );

    $array_type = array(
        1 => $lang_module['export_type_1'],
        2 => $lang_module['export_type_2'],
        3 => $lang_module['export_type_3']
    );

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=export');

    foreach ($data as $index => $value) {
        $xtpl->assign('DATA', array(
            'index' => $index,
            'value' => $value
        ));
        $xtpl->parse('option.data');
    }

    foreach ($array_type as $index => $value) {
        $xtpl->assign('TYPE', array(
            'index' => $index,
            'value' => $value,
            'checked' => $index == 3 ? 'checked="checked"' : ''
        ));
        $xtpl->parse('option.type');
    }

    $xtpl->parse('option');
    $contents = $xtpl->text('option');
	if($not_allow){
		$contents = '';
	}

    nv_htmlOutput($contents);
}

if ($nv_Request->isset_request('submit', 'post') and !$not_allow) {
	
	
    $type = $nv_Request->get_int('type', 'post', 3);
    $data = $nv_Request->get_array('data', 'post');
    $data['where'] = base64_decode($data['where']);
    $data['join'] = base64_decode($data['join']);

    if (md5($data['where'] . $global_config['sitekey']) != $data['checkssum']) {
        nv_jsonOutput(array(
            'error' => 1,
            'msg' => $lang_module['error_unknow']
        ));
    }


    if ($type == 1) {
        $data['where'] .= ' AND id IN (' . ((!empty($data['selected_id'])) ? $data['selected_id'] : 0) . ')';
    }

    $db->select('t1.*')
        ->from(NV_PREFIXLANG . '_' . $module_data . ' t1')
        ->join($data['join'])
        ->where('1=1' . $data['where'])
        ->order($data['ordername'] . ' ' . $data['ordertype']);

    if ($type == 2) {
        $db->limit($data['per_page'])->offset(($data['page'] - 1) * $data['per_page']);
    }

    $sth = $db->prepare($db->sql());
    $sth->execute();

    $array_data = array();
    $array_services = array();
    while ($row = $sth->fetch()) {
        $row['birthday'] = !empty($row['birthday']) ? nv_date('d/m/Y', $row['birthday']) : '';
        $row['gender'] = $array_gender[$row['gender']];
        $row['type_id'] = !empty($row['type_id']) ? $array_customer_type_id[$row['type_id']]['title'] : '';
        $row['is_contacts'] = !empty($row['is_contacts']) ? $lang_module['is_contacts'] : $lang_module['is_customer'];
        $array_data[] = $row;
		
		// danh sách dịch vụ của khách hàng này
		 $array_services[$row['id']] = services_customer($row);
    }
	
	
	
	// xuất thông tin ra file excel
	/** Error reporting */
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');

		require NV_ROOTDIR . "/includes/Classes2/PHPExcel.php";
		
		
		$array_data_excel = array();
		
		$stt = 1;
		
		foreach($array_data as $row)
		{
			$arr = array();
			
			$arr['stt'] = $stt;
			$arr['tochu_canhan'] = $array_tochuc_canha[$row['tochu_canhan']];
			if($row['supplier'])
			$arr['supplier'] = $lang_module['supplier'];
			else
			$arr['supplier'] = '';
			
			$arr['code'] = $row['code'];
			$arr['first_name'] = $row['first_name'] . ' ' . $row['last_name'];
			$arr['address'] = $row['address'];
			$arr['masothu'] = '';
			$arr['other_phone'] = $row['other_phone'];
			$arr['main_phone'] = $row['main_phone'];
			$arr['fax'] = $row['fax'];
			$arr['main_email'] = $row['main_email'];
			$arr['website'] = $row['website'];
			
			
			
		//	print_r($row);die;
			$array_data_excel[] = $arr;
			$stt++;
		}
		
		 // Download
        if (!empty($array_data_excel)) {
			ini_set('memory_limit', '3500M');

			//print_r($array_data);die; 
			// lọc lại service 
			$array_services_new = loc_services($array_services);
            nv_customer_excel_download($array_data_excel, $array_services_new);
            die();
        }

   // nv_customer_export_csv($array_data, $filename, $array_heading);
}

/*
if ($nv_Request->isset_request('download', 'get')) {
    $file_src = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $filename;
    $download = new NukeViet\Files\Download($file_src, NV_ROOTDIR . '/' . NV_TEMP_DIR, $filename);
    $download->download_file();
    exit();
}
*/