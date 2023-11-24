<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

global $module_name, $site_mods, $global_config, $lang_global;
$content = '';
$array_window = array();
//$array_window[1] = 'Window 7/8';
$array_window[2] = 'Window';
$array_window[3] = 'Mac OS';
$array_window[4] = 'Other OS';
$array_window[5] = 'MS Office';

$array_server = array();
$array_server['1'] = 'Có';
$array_server['0'] = 'Không';

$array_telecom = array();
$array_telecom[1] = 'Có';
$array_telecom[0] = 'Không';

$array_camera = array();
$array_camera['1'] = 'Có';
$array_camera['0'] = 'Không';

$array_itos = array();
$array_itos['1'] = 'Có';
$array_itos['0'] = 'Không';

$array_problem = array();
$array_problem[1] = 'Hệ thống mạng không ổn định';
$array_problem[2] = 'Dữ liệu rời rạc, tìm kiếm khó khăn';
$array_problem[3] = 'Dữ liệu quan trọng chưa được bảo vệ';
$array_problem[4] = 'Khác';

$array_email = array();
$array_email['1'] = 'Có';
$array_email['0'] = 'Không';
if ($module_name != $block_config['module'] and defined('NV_SYSTEM')) {
    if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/'.$site_mods[$block_config['module']]['module_file'].'/block.contact_form.tpl')) {
        $block_theme = $global_config['module_theme'];
    } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/'.$site_mods[$block_config['module']]['module_file'].'/block.contact_form.tpl')) {
        $block_theme = $global_config['site_theme'];
    } else {
        $block_theme = 'default';
    }
	//print_r(NV_ROOTDIR.'/modules/' . $site_mods[$block_config['module']]['module_file'] . '/language/'. NV_LANG_DATA.'.php');
	include(NV_ROOTDIR.'/modules/' . $site_mods[$block_config['module']]['module_file'] . '/language/'. NV_LANG_DATA.'.php');
    $blockJs = file_exists(NV_ROOTDIR . '/themes/' . $block_theme . '/js/'.$site_mods[$block_config['module']]['module_file'].'.js') ? $block_theme : 'default';
    $blockCss = file_exists(NV_ROOTDIR . '/themes/' . $block_theme . '/css/'.$site_mods[$block_config['module']]['module_file'].'.css') ? $block_theme : 'default';

    $xtpl = new XTemplate('block.contact_form.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $site_mods[$block_config['module']]['module_file']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('JS', NV_STATIC_URL . 'themes/' . $blockJs . '/js/'.$site_mods[$block_config['module']]['module_file'].'.js');
    $xtpl->assign('CSS', NV_STATIC_URL . 'themes/' . $blockJs . '/css/'.$site_mods[$block_config['module']]['module_file'].'.css');
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
    $xtpl->assign('TEMPLATE', $block_theme);
    $xtpl->assign('MODULE', $block_config['module']);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $block_config['module']);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', $op);
	$xtpl->assign('ROW', $row);
	foreach ($array_window as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['window']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.checkbox_window');
}

foreach ($array_server as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['server']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_server');
}

foreach ($array_telecom as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['telecom']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_telecom');
}

foreach ($array_camera as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['camera']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_camera');
}

foreach ($array_itos as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['itos']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_itos');
}

foreach ($array_problem as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['problem']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.checkbox_problem');
}

foreach ($array_email as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['email']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_email');
}
    $xtpl->parse('main');
    $content = $xtpl->text('main');
}
 