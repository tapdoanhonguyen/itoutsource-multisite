<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (!defined('NV_ADMIN')) {
    die('Stop!!!');
}

/**
 * Note:
 * 	- Module var is: $lang, $module_file, $module_data, $module_upload, $module_theme, $module_name
 * 	- Accept global var: $db, $db_config, $global_config
 */

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (id, bid, title, link_href, link_target, image, addtime, edittime, status) VALUES (1, 1, 'Image 1', 'http://vietnho.com/', '0', 'slide_1.jpg', " . NV_CURRENTTIME . ", 0, 1)");
$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (id, bid, title, link_href, link_target, image, addtime, edittime, status) VALUES (2, 1, 'Image 2', 'http://vietnho.com', '0', 'slide_2.jpg', " . NV_CURRENTTIME . ", 0, 1)");
$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (id, bid, title, link_href, link_target, image, addtime, edittime, status) VALUES (3, 1, 'Image 3', 'http://vietnho.com', '0', 'slide_3.jpg', " . NV_CURRENTTIME . ", 0, 1)");