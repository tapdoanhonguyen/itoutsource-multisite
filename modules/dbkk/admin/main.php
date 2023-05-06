<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 28 Apr 2023 13:15:07 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');



    $page_title = $lang_module['list'];
    $array = [];

    $page = $nv_Request->get_int('page', 'get', 1);
    $per_page = 50;


    $db->sqlreset()
    ->select('COUNT(*)')->from(NV_PREFIXLANG . '_' . $module_data);

    $num_items = $db->query($db->sql())
        ->fetchColumn();
    if (empty($num_items)) {
        exit('Wrong URL');
    }

    //LIMIT '.$per_page.' OFFSET ' ($page - 1) * $per_page

    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' ORDER BY weight ASC LIMIT '.$per_page . ' OFFSET ' .($page - 1)  * $per_page;
  
    $_rows = $db->query($sql)->fetchAll();
   
    $num = sizeof($_rows);
    
    if ($num < 1) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=content');
    }
    
    $array_status = [
        $lang_module['inactive'],
        $lang_module['active']
    ];

    $base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;per_page=' . $per_page;
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

$i = 0;
foreach ($_rows as $row) {
    $row['url_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=content&amp;id=' . $row['id'];
    $row['checkss'] = md5($row['id'] . NV_CHECK_SESSION);
   
    for ($i = 1; $i <= $num_items; ++$i) {
        $xtpl->assign('WEIGHT', [
            'w' => $i,
            'selected' => ($i == $row['weight']) ? ' selected="selected"' : ''
        ]);

        $xtpl->parse('main.row.weight');
    }

    foreach ($array_status as $key => $val) {
        $xtpl->assign('STATUS', [
            'key' => $key,
            'val' => $val,
            'selected' => ($key == $row['status']) ? ' selected="selected"' : ''
        ]);

        $xtpl->parse('main.row.status');
    }

    $row['edit_time'] = nv_date('H:i d/m/y', $row['edit_time']);
    $row['add_time'] = nv_date('H:i d/m/y', $row['add_time']);

    $xtpl->assign('ROW', $row);

    $xtpl->parse('main.row');
}

if (!empty($generate_page)) {
    $xtpl->assign('GENERATE_PAGE', $generate_page);
    $xtpl->parse('main.generate_page');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
