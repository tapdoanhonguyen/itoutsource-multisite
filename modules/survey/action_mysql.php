<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Tập Đoàn Họ Nguyễn <honguyentapdoan@gmail.com>
 * @Copyright (C) 2022 Tập Đoàn Họ Nguyễn. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 19 Dec 2022 19:21:32 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_row (
id int(11) NOT NULL AUTO_INCREMENT,
  usercomp int(11) NOT NULL DEFAULT '0',
  desktop int(11) NOT NULL DEFAULT '0',
  laptop int(11) NOT NULL DEFAULT '0',
  print int(11) NOT NULL DEFAULT '0',
  scan int(11) NOT NULL DEFAULT '0',
  window varchar(250) NOT NULL DEFAULT '',
  server smallint(4) NOT NULL DEFAULT '0',
  servernum int(11) NOT NULL DEFAULT '0',
  serverwindow varchar(250) NOT NULL DEFAULT '',
  telecom smallint(4) NOT NULL DEFAULT '0',
  tel_model varchar(250) NOT NULL DEFAULT '',
  tel_mobile int(11) NOT NULL DEFAULT '0',
  tel_ext int(11) NOT NULL DEFAULT '0',
  camera int(11) NOT NULL DEFAULT '0',
  camnum int(11) NOT NULL DEFAULT '0',
  itos smallint(4) NOT NULL DEFAULT '0',
  itosname varchar(250) NOT NULL DEFAULT '',
  problem varchar(250) NOT NULL DEFAULT '',
  email smallint(4) NOT NULL DEFAULT '0',
  fullname varchar(250) NOT NULL DEFAULT '',
  infoemail varchar(250) NOT NULL DEFAULT '',
  infomobile varchar(250) NOT NULL DEFAULT '',
  infocomname varchar(250) NOT NULL DEFAULT '',
  infoaddress varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) ENGINE=MyISAM;";
