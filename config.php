<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2022 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}


if (file_exists(NV_ROOTDIR . '/domain/' . NV_SERVER_NAME . '/' . NV_CONFIG_FILENAME)) {
    require realpath(NV_ROOTDIR . '/domain/' . NV_SERVER_NAME . '/' . NV_CONFIG_FILENAME);
}else{
	$db_config['dbhost'] = '127.0.0.1';
	$db_config['dbport'] = '';
	$db_config['dbname'] = 'sml_home';
	$db_config['dbsystem'] = 'sml_home';
	$db_config['dbuname'] = 'sml_home';
	$db_config['dbpass'] = 'fP7k39kT';
	$db_config['dbtype'] = 'mysql';
	$db_config['collation'] = 'utf8mb4_unicode_ci';
	$db_config['charset'] = 'utf8mb4';
	$db_config['persistent'] = false;
	$db_config['prefix'] = 'nv4';

	$global_config['site_domain'] = '';
	$global_config['name_show'] = 0;
	$global_config['idsite'] = 0;
	$global_config['sitekey'] = '04a7bce7b3d6d9cb6566229d3b191c76';// Do not change sitekey!
	$global_config['hashprefix'] = '{SSHA512}';
	$global_config['cached'] = 'files';
	$global_config['session_handler'] = 'files';
	$global_config['extension_setup'] = 3; // 0: No, 1: Upload, 2: NukeViet Store, 3: Upload + NukeViet Store
	// Readmore: https://wiki.nukeviet.vn/nukeviet4:advanced_setting:file_config

}

//define('NV_CONFIG_DIR', '/domain');