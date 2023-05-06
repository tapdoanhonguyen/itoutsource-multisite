<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2023 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_MOD_TIMEKEEPER'))
    die('Stop!!!');

if (empty($array_op[1])) {
	nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail');
}

$row = array();
$error = array();
$row = array();
$error = array();
$row['id'] = $array_op[1];
if ($nv_Request->isset_request('submit', 'post')) {

  
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
}
$array_userid_users = array();
$_sql = 'SELECT userid,username FROM nv4_users';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_userid_users[$_row['userid']] = $_row;
}
$array_locationid = array();
	$_sql = 'SELECT * FROM nv4_vi_timekeeper_data where group_name="work_place"';
	$_query = $db->query($_sql);
	while ($_row = $_query->fetch()) {
		$array_locationid[$_row['data_id']] = $_row;
	}
$array_type_login[0] = 'Check in';
$array_type_login[1] = 'Check out';
$row['date_login'] = date("d/m/Y", $row['date_login']);
$row['type_login_title'] = $array_type_login[$row['type_login']];
$row['locationid_title'] = $array_locationid[$row['locationid']]['title'];
$xtpl = new XTemplate('users.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);
$xtpl->assign('GOGGLEMAP_API', $module_config[$module_name]['appapi']);

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

if($row['type_login'] == 0){
	$xtpl->parse('main.checkin');
}else{
	$xtpl->parse('main.checkout');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['timekeeper'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';