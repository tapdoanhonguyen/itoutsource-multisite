<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 13 May 2023 09:14:43 GMT
 */

 if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$page_title = $lang_module['config'];

$array_config = [];
if ($nv_Request->isset_request('save', 'post')) {

    $array_config['module_setting'] = $nv_Request->get_string('module_setting', 'post', '');
    $array_config['apichatgpt'] = $nv_Request->get_string('apichatgpt', 'post', '');
    // $array_config['viewtype'] = $nv_Request->get_int('viewtype', 'post', 0);
    // $array_config['facebookapi'] = $nv_Request->get_string('facebookapi', 'post', '');
    // $array_config['per_page'] = $nv_Request->get_int('per_page', 'post', '0');
    // $array_config['related_articles'] = $nv_Request->get_int('related_articles', 'post', '0');
    // $array_config['news_first'] = $nv_Request->get_int('news_first', 'post', 0);
    // $array_config['copy_page'] = $nv_Request->get_int('copy_page', 'post', 0);
    // $array_config['alias_lower'] = $nv_Request->get_int('alias_lower', 'post', 0);
    // $array_config['socialbutton'] = $nv_Request->get_typed_array('socialbutton', 'post', 'title', []);
    // $array_config['socialbutton'] = array_intersect($array_config['socialbutton'], $socialbuttons);

    // if (in_array('zalo', $array_config['socialbutton'], true) and empty($global_config['zaloOfficialAccountID'])) {
    //     $array_config['socialbutton'] = array_diff($array_config['socialbutton'], ['zalo']);
    // }
    // $array_config['socialbutton'] = !empty($array_config['socialbutton']) ? implode(',', $array_config['socialbutton']) : '';

    $sth = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_config SET config_value = :config_value WHERE config_name = :config_name');
    foreach ($array_config as $config_name => $config_value) {
        $sth->bindParam(':config_name', $config_name, PDO::PARAM_STR);
        $sth->bindParam(':config_value', $config_value, PDO::PARAM_STR);
        $sth->execute();
    }

    $nv_Cache->delMod($module_name);
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
}


$array_config['module_setting'] = '';
$array_config['apichatgpt'] = '';

$sql = 'SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config';
$result = $db->query($sql);
while (list($c_config_name, $c_config_value) = $result->fetch(3)) {
    $array_config[$c_config_name] = $c_config_value;
}
$xtpl = new XTemplate('config.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('DATA', $array_config);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
