<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Tập Đoàn Họ Nguyễn <tgd@tapdoanhonguyen.com>
 * @Copyright (C) 2023 Tập Đoàn Họ Nguyễn. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 29 Apr 2023 12:49:32 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$module_version = array(
    'name' => 'Timekeeper',
    'modfuncs' => 'main,timekeeper,search,detail,users,shift',
    'change_alias' => 'main,timekeeper,search',
    'submenu' => 'main,timekeeper,search,detail,shift',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.5.03',
    'date' => 'Sat, 29 Apr 2023 12:49:33 GMT',
    'author' => 'Tập Đoàn Họ Nguyễn (tgd@tapdoanhonguyen.com)',
    'uploads_dir' => array($module_name,$module_name.'/capture'),
    'files_dir' => array($module_name,$module_name.'/capture'),
    'note' => ''
);
