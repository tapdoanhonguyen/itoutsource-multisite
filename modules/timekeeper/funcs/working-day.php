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

$row = array();
$error = array();
$row['id'] = 1;

$array_userid_users = array();
$array_userid = array();
$_sql = 'SELECT * FROM nv4_users as u  left join nv4_users_groups_users as gu on u.userid = gu.userid where gu.group_id = 13 ';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_userid_users[$_row['userid']] = $_row;
	$array_userid[] = $_row['userid']; 
}

$array_type_login[0] = 'Đăng Nhập';
$array_type_login[1] = 'Đăng Xuất';

$q = $nv_Request->get_title('q', 'post,get');

// Fetch Limit
$show_view = false;

    $show_view = true;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('*')
        ->from('' . NV_PREFIXLANG . '_' . $module_data . '')
		->order('userid ASC');

        $db->where('userid IN ( :q_userid )');

            
    $sth = $db->prepare($db->sql());

        $sth->bindValue(':q_userid', implode(",", $array_userid));
    $sth->execute();


$xtpl = new XTemplate('detail.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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

$xtpl->assign('Q', $q);

if ($show_view) {
    $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    if (!empty($q)) {
        $base_url .= '&q=' . $q;
    }
        while ($view = $sth->fetch()) {
        
        $view['userid'] = $array_userid_users[$view['userid']]['username'];
        $view['type_login'] = $array_type_login[$view['type_login']];
        $view['date_login'] = date("d-m-Y",$view['date_login']);
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.view.loop');
    }
    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['timekeeper'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
