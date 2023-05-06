<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Tập Đoàn Họ Nguyễn <tgd@tapdoanhonguyen.com>
 * @Copyright (C) 2023 Tập Đoàn Họ Nguyễn. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 29 Apr 2023 12:49:32 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');
$savesetting = $nv_Request->get_int('submit', 'post', 0);
if (!empty($savesetting)) {
	$array_config = [];
    $array_config['employer_group'] = $nv_Request->get_int('employer_group', 'post', '', 1);
    $array_config['appapi'] = $nv_Request->get_title('appapi', 'post', '');
    $timelinein1_hour = $nv_Request->get_int('timelinein1_hour', 'post', '', 7);
    $timelinein1_miniture = $nv_Request->get_int('timelinein1_miniture', 'post', '', 30);
	$array_config['timelinein1'] = $timelinein1_hour . ':' . $timelinein1_miniture;
    $timelineout1_hour = $nv_Request->get_int('timelineout1_hour', 'post', '', 12);
    $timelineout1_miniture = $nv_Request->get_int('timelineout1_miniture', 'post', '', 0);
	$array_config['timelineout1'] = $timelineout1_hour . ':' . $timelineout1_miniture;
    $timelinein2_hour = $nv_Request->get_int('timelinein2_hour', 'post', '', 13);
    $timelinein2_miniture = $nv_Request->get_int('timelinein2_miniture', 'post', '', 30);
	$array_config['timelinein2'] = $timelinein2_hour . ':' . $timelinein2_miniture;
    $timelineout2_hour = $nv_Request->get_int('timelineout2_hour', 'post', '', 17);
    $timelineout2_miniture = $nv_Request->get_int('timelineout2_miniture', 'post', '', 30);
	$array_config['timelineout2'] = $timelineout2_hour . ':' . $timelineout2_miniture;
	if (empty($error)) {
        $sth = $db->prepare('UPDATE ' . NV_CONFIG_GLOBALTABLE . " SET config_value = :config_value WHERE lang = '" . NV_LANG_DATA . "' AND module = :module_name AND config_name = :config_name");
        $sth->bindParam(':module_name', $module_name, PDO::PARAM_STR);
        foreach ($array_config as $config_name => $config_value) {
            $sth->bindParam(':config_name', $config_name, PDO::PARAM_STR);
            $sth->bindParam(':config_value', $config_value, PDO::PARAM_STR);
            $sth->execute();
        }

        $nv_Cache->delMod('settings');
        $nv_Cache->delMod($module_name);
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&rand=' . nv_genpass());
    }
}
$page_title = $lang_module['config'];


$groups_list = nv_groups_list();
unset($groups_list[1], $groups_list[2], $groups_list[3], $groups_list[4], $groups_list[5], $groups_list[6], $groups_list[7]);
$employer_group = $groups_list;
//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('config.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('DATA', $module_config[$module_name]);
foreach ($employer_group as $group_id => $group_title) {
	$xtpl->assign('GROUP', [
		'group_id' => $group_id,
		'group_title' => $group_title,
		'selected' => $group_id == $module_config[$module_name]['employer_group'] ? ' selected="selected"' : ''
	]);
	$xtpl->parse('main.employer_group');
}
//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
