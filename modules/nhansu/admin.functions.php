<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2023 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 13 Mar 2023 06:42:35 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN'))
    die('Stop!!!');

define('NV_IS_FILE_ADMIN', true);

$allow_func = array('main', 'config','chucvu','chucvu_add','chucdanh','chucdanh_add','phongban','phongban_add','tongiao','tongiao_add','maso','maso_add','bacluong','bacluong_add','chuyenmon','chuyenmon_add','chinhtri','chinhtri_add','quanlygiaoduc','quanlygiaoduc_add','ngoaingu','ngoaingu_add','tinhoc','tinhoc_add','bienche','bienche_add','nhansu','nhansu_add','ajax','heso','heso_add','import');
require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';
