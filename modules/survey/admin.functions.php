<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Tập Đoàn Họ Nguyễn <honguyentapdoan@gmail.com>
 * @Copyright (C) 2022 Tập Đoàn Họ Nguyễn. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 19 Dec 2022 19:21:32 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN'))
    die('Stop!!!');

define('NV_IS_FILE_ADMIN', true);

$allow_func = array('main', 'config', 'content');
