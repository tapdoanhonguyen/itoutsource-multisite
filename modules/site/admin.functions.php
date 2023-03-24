<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */
if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );
define( 'NV_IS_FILE_ADMIN', true );
define( 'NV_IS_FILE_MODULES', true );
require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';
$allow_func = array( 'main', 'config', 'cat', 'site', 'reinstall');

