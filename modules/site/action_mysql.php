<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_cat";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_config";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "";
$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_config(
  config_name varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  config_value varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (config_name)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_cat (
cid int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  theme varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  module varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (cid)
) ENGINE=MyISAM;";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . " (
idsite int(11) NOT NULL AUTO_INCREMENT,
  cid int(11) NOT NULL,
  domain varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  subdomain varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  domaintype varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  dbsite varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  sample varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  businesstypeid int(11),
  allowuserreg TINYINT(2) NOT NULL DEFAULT '0',
  admin_id int(1) NOT NULL DEFAULT '1',

  PRIMARY KEY (idsite),
  UNIQUE KEY domain (domain), 
  UNIQUE KEY dbsite (dbsite) 
) ENGINE=MyISAM;";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('alow_multi', '0')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('my_domains', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('cpaneltype', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('cpanel_ip', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('cpanel_port', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('cpanel_pre_host', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('cpanel_ftp_user_name', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('cpanel_ftp_user_pass', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('da_ip', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('da_port', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('da_pre_host', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('da_ftp_user_name', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('da_ftp_user_pass', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('vesta_host', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('vesta_port', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('vesta_pre_host', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('vesta_user', '')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (config_name, config_value) VALUES('vesta_pass', '')";