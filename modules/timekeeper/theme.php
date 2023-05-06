<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Tập Đoàn Họ Nguyễn <tgd@tapdoanhonguyen.com>
 * @Copyright (C) 2023 Tập Đoàn Họ Nguyễn. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 29 Apr 2023 12:49:32 GMT
 */

if (!defined('NV_IS_MOD_TIMEKEEPER'))
    die('Stop!!!');

/**
 * nv_theme_timekeeper_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_timekeeper_main($array_data, $array_locationid)
{
    global $module_info, $lang_module, $lang_global, $op, $module_config, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
	$xtpl->assign('GOGGLEMAP_API', $module_config[$module_name]['appapi']);
	foreach ($array_locationid as $group_id => $group_title) {
		$xtpl->assign('LOCATION', [
			'key' => $group_id,
			'title' => $group_title['title'],
			'selected' => $group_id == $array_data['locationid'] ? ' selected="selected"' : ''
		]);
		$xtpl->parse('main.location');
	}
    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_timekeeper_timekeeper()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_timekeeper_timekeeper($array_data, $array_locationid, $module_config, $module_name)
{
    global $module_info, $lang_module, $lang_global, $op, $module_config, $module_name;
	print_r($module_config);
    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
	$xtpl->assign('GOGGLEMAP_API', $module_config[$module_name]['appapi']);
    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_timekeeper_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_timekeeper_search($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}


function nv_theme_timekeeper_shift($array_data, $array_locationid)
{
    global $module_info, $lang_module, $lang_global, $op, $module_config, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
	$xtpl->assign('GOGGLEMAP_API', $module_config[$module_name]['appapi']);
	foreach ($array_locationid as $group_id => $group_title) {
		$xtpl->assign('LOCATION', [
			'key' => $group_id,
			'title' => $group_title['title'],
			'selected' => $group_id == $array_data['locationid'] ? ' selected="selected"' : ''
		]);
		$xtpl->parse('main.location');
	}
	 print_r($array_data['cout_time_check']);
	if($array_data['cout_time_check'] == 0){
		$xtpl->parse('main.checkin1');
		$xtpl->parse('main.jvcheckin1');
	}elseif($array_data['cout_time_check'] == 1){
		$xtpl->parse('main.checkout1');
		$xtpl->parse('main.jvcheckout1');
	}elseif($array_data['cout_time_check'] == 2){
		$xtpl->parse('main.checkin2');
		$xtpl->parse('main.jvcheckin2');
	}elseif($array_data['cout_time_check'] == 3){
		$xtpl->parse('main.checkout2');
		$xtpl->parse('main.jvcheckout2');
	}
	
    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}