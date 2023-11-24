<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_MODULES')) {
    exit('Stop!!!');
}

$sql_drop_module = [];

// $sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . ';';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_config;';

$sql_create_module = $sql_drop_module;

// $sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . " (

// ) ENGINE=MyISAM";

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_config (
 config_name varchar(30) NOT NULL,
 config_value varchar(255) NOT NULL,
 UNIQUE KEY config_name (config_name)
)ENGINE=MyISAM';

$sql_create_module[] = 'INSERT INTO ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_config VALUES
('module_setting', ''),
('apichatgpt', '')
";