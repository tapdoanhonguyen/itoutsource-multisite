<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS HOLDINGS <contact@tms.vn>
 * @Copyright (C) 2023 TMS HOLDINGS. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 15 Apr 2023 01:14:57 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_bacluong";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_bienche";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_chinhtri";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_chucdanh";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_chucvu";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_chuyenmon";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_heso";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_maso";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_ngoaingu";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_nhansu";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_phongban";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_quanlygiaoduc";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tinhoc";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tongiao";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_bacluong(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_bacluong varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_bienche(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_bienche varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_chinhtri(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_chinhtri varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_chucdanh(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_chucdanh varchar(255) NOT NULL COMMENT 'Tên chức danh',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_chucvu(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_chucvu varchar(255) NOT NULL COMMENT 'Tên chức vụ',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_chuyenmon(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_chuyenmon varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_heso(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_heso varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_maso(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_maso varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_ngoaingu(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_ngoaingu varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_nhansu(
  id int(11) NOT NULL AUTO_INCREMENT,
  code varchar(255) NOT NULL COMMENT 'Mã CB Mã HS',
  hoten_lot varchar(255) NOT NULL COMMENT 'Họ tên lót',
  ten varchar(255) NOT NULL COMMENT 'Tên',
  gioitinh int(11) NOT NULL COMMENT 'Giới tính',
  ngaysinh int(11) NOT NULL COMMENT 'Ngày sinh',
  chucvu_id int(11) DEFAULT NULL COMMENT 'Chức vụ',
  phongban_id int(11) NOT NULL COMMENT 'Phòng ban',
  noisinh varchar(255) NOT NULL COMMENT 'Nơi sinh',
  quequan varchar(255) NOT NULL COMMENT 'Quê quán',
  tongiao_id int(11) NOT NULL COMMENT 'Tôn giáo',
  diachihiennay varchar(255) NOT NULL COMMENT 'Địa chỉ hiện nay',
  ngaytuyendung int(11) NOT NULL COMMENT 'Ngày tuyển dụng/ chuyển công tác đến',
  chucdanhkiemnhiem varchar(255) NOT NULL COMMENT 'Chức danh kiêm nhiệm',
  chucdanh_id int(11) NOT NULL COMMENT 'Chức danh',
  maso_id int(11) NOT NULL COMMENT 'Mã số',
  bacluong_id int(11) NOT NULL COMMENT 'Bậc lương',
  heso_id int(11) NOT NULL COMMENT 'Hệ số',
  ngayhuong int(11) NOT NULL COMMENT 'Ngày hưởng',
  phucapchucvu varchar(255) NOT NULL COMMENT 'Phụ cấp chức vụ',
  phucapkhac varchar(255) NOT NULL COMMENT 'Phụ cấp khác',
  chuyenmon_id int(11) NOT NULL COMMENT 'Chuyên môn',
  chinhtri_id int(11) NOT NULL COMMENT 'LL CHÍNH TRỊ',
  quanlygiaoduc_id int(11) NOT NULL COMMENT 'QL GIÁO DỤC',
  ngoaingu_id int(11) DEFAULT NULL COMMENT 'Ngoại ngữ',
  chungchi_ngoaingu int(11) NOT NULL COMMENT 'Ngoại ngữ',
  tinhoc_id int(11) NOT NULL COMMENT 'Tin học',
  chungchi_khac varchar(255) NOT NULL COMMENT 'Khác',
  ngayvaodang int(11) NOT NULL COMMENT 'Ngày vào đảng',
  ngayvaochinhthuc int(11) NOT NULL COMMENT 'Ngày vào Đảng chính thức',
  cannang varchar(255) DEFAULT NULL COMMENT 'Cân nặng',
  chieucao varchar(255) DEFAULT NULL COMMENT 'Chiều cao',
  cmnd varchar(255) NOT NULL COMMENT 'Số CMND',
  ngaycap int(11) NOT NULL COMMENT 'Ngày cấp',
  noicap varchar(255) NOT NULL COMMENT 'Nơi cấp',
  bhxh varchar(255) NOT NULL COMMENT 'Số BHXH',
  bhyt varchar(255) NOT NULL COMMENT 'Số BHYT',
  didong varchar(255) NOT NULL COMMENT 'DI ĐỘNG',
  dienthoai_nha varchar(255) NOT NULL COMMENT 'Nhà',
  dienthoai_coquan varchar(255) NOT NULL COMMENT 'Cơ quan',
  bienche_id int(11) NOT NULL COMMENT 'LOẠI HÌNH  BIÊN CHẾ',
  ngayvao_bienche int(11) NOT NULL COMMENT 'NGÀY VÀO  BIÊN CHẾ',
  quytrinhcongtac text NOT NULL COMMENT 'Quy trình công tác',
  ngaynhanviec int(11) NOT NULL COMMENT 'NGÀY NHẬN CTÁC TẠI TT',
  ngaythoiviec int(11) NOT NULL COMMENT 'NGÀY THÔI VIỆC TẠI TT',
  thoigiancongtac int(11) NOT NULL COMMENT 'Thời gian công tác',
  huutri varchar(255) NOT NULL COMMENT 'Hưu trí',
  thucnghi varchar(255) NOT NULL COMMENT 'Thực nghỉ',
  lylich int(11) NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_phongban(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_phongban varchar(255) NOT NULL COMMENT 'Tên phòng ban',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_quanlygiaoduc(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_quanlygiaoduc varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_tinhoc(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_tinhoc varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_tongiao(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_tongiao varchar(255) NOT NULL COMMENT 'Tên tôn giáo',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";
