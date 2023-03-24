<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$array_table = array('blocks','rows');
$table = $db_config['prefix'] . '_' . $lang . '_' . $module_data;
$result = $db->query('SHOW TABLE STATUS LIKE ' . $db->quote($table . '_%'));
while ($item = $result->fetch()) {
    $name = substr($item['name'], strlen($table) + 1);
    if (preg_match('/^' . $db_config['prefix'] . '\_' . $lang . '\_' . $module_data . '\_/', $item['name']) and (preg_match('/^([0-9]+)$/', $name) or in_array($name, $array_table) or preg_match('/^bodyhtml\_([0-9]+)$/', $name))) {
        $sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $item['name'];
    }
}

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_blocks (
  bid mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL DEFAULT '',
  description mediumtext NOT NULL,
  PRIMARY KEY (bid)
) ENGINE=MyISAM";
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (
 id int(11) unsigned NOT NULL auto_increment,
 bid int(11) unsigned NOT NULL DEFAULT '0',
 title varchar(250) NOT NULL DEFAULT '' COMMENT 'Tên slide',
 title1 varchar(250) NOT NULL DEFAULT '',
 title2 varchar(250) NOT NULL DEFAULT '',
 more varchar(250) NOT NULL DEFAULT '',
 link_href varchar(255) NOT NULL DEFAULT '' COMMENT 'Liên kết',
 link_target tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '0: Trang hiện tại, 1: Cửa sổ mới',
 image varchar(255) NOT NULL DEFAULT '' COMMENT 'Đường dẫn ảnh',
 addtime int(11) unsigned NOT NULL DEFAULT '0',
 edittime int(11) unsigned NOT NULL DEFAULT '0',
 weight smallint(5) unsigned NOT NULL DEFAULT '0',
 status tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '0: Dừng, 1: Hoạt động',
 PRIMARY KEY (id),
 KEY status (status)
) ENGINE=MyISAM";


$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_blocks (bid, title, description) VALUES(1, 'Home slider', 'Silder trang chủ')";
