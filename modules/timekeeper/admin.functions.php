<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Tập Đoàn Họ Nguyễn <tgd@tapdoanhonguyen.com>
 * @Copyright (C) 2023 Tập Đoàn Họ Nguyễn. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 29 Apr 2023 12:49:32 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN'))
    die('Stop!!!');

define('NV_IS_FILE_ADMIN', true);
define( 'ACTION_METHOD', $nv_Request->get_string( 'action', 'get,post', '' ) ); 
define( 'TABLE_TIMEKEEPING_NAME', NV_PREFIXLANG . '_' . $module_data );  
$allow_func = array('main', 'config', 'work_place');
$array_status = array( '0' => $lang_module['disabled'], '1' => $lang_module['enable'] );
