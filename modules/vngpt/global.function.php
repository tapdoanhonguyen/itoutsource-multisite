<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 13 May 2023 09:14:43 GMT
 */

 if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

// Get Config Module
function getconfig() {
    global $module_name, $lang_global, $lang_module, $page_title, $global_config;
    $query = $db->query('SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config')->fetch();
    // $sql = 'SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config';
    // $list = $nv_Cache->db($sql, '', $module_name);
    var_dump($query);die;
    $page_config = [];
    foreach ($query as $values) {
        $page_config[$values['config_name']] = $values['config_value'];
    }

    return $page_config;
}

$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;


