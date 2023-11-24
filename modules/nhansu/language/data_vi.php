<?php

/**
 * @Project TMS HOLDINGS
 * @Author TMS HOLDINGS <contact@tms.vn>
 * @Copyright (C) 2023 TMS HOLDINGS. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 15 Apr 2023 01:14:57 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('1', 'Bậc 1', '1678693988', '3', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('2', 'Bậc 2', '1678693993', '3', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Bậc 3', '1678693997', '3', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'Bậc 4', '1678783667', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'Bậc 5', '1678783675', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('6', 'Bậc 6', '1678783680', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('7', 'Bậc 7', '1678783685', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('8', 'Bậc 8', '1678783690', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bacluong (id, name_bacluong, time_add, user_add, time_edit, user_edit, status) VALUES('9', 'Bậc 9', '1678783695', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bienche (id, name_bienche, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Biên chế', '1678784141', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bienche (id, name_bienche, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'HĐ không xác định thời hạn', '1678784144', '18', '1678784152', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_bienche (id, name_bienche, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'HĐ thời hạn', '1678784161', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chinhtri (id, name_chinhtri, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Cao cấp', '1678784004', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chinhtri (id, name_chinhtri, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'Trung cấp', '1678784010', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chinhtri (id, name_chinhtri, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'Sơ cấp', '1678784015', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('1', 'Giáo viên', '1678692998', '3', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('2', 'Giám đốc', '1678782645', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Phó Giám đốc', '1678782653', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'Hiệu trưởng', '1678782665', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'Phó Hiệu trưởng', '1678782675', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('6', 'Kế toán trưởng', '1678782685', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('7', 'Thủ quỹ', '1678782699', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('8', 'Bảo vệ', '1678782709', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucdanh (id, name_chucdanh, time_add, user_add, time_edit, user_edit, status) VALUES('9', 'Nhân viên', '1678783411', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucvu (id, name_chucvu, time_add, user_add, time_edit, user_edit, status) VALUES('1', 'Trung cấp', '1678692373', '3', '1678950834', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chucvu (id, name_chucvu, time_add, user_add, time_edit, user_edit, status) VALUES('2', 'Đại học', '1678692379', '3', '1678950830', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chuyenmon (id, name_chuyenmon, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'Thạc sĩ', '1678783907', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chuyenmon (id, name_chuyenmon, time_add, user_add, time_edit, user_edit, status) VALUES('6', 'Đại học', '1678783915', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chuyenmon (id, name_chuyenmon, time_add, user_add, time_edit, user_edit, status) VALUES('7', 'Cao đẳng', '1678783975', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_chuyenmon (id, name_chuyenmon, time_add, user_add, time_edit, user_edit, status) VALUES('8', 'THPT', '1678783980', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('1', '2.34', '1678701195', '3', '1678783716', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('2', '2.67', '1678701199', '3', '1678783731', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('3', '3.0', '1678783744', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('4', '3.33', '1678783750', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('5', '3.66', '1678783759', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('6', '3.99', '1678783765', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('7', '4.32', '1678783772', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('8', '4.65', '1678783792', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_heso (id, name_heso, time_add, user_add, time_edit, user_edit, status) VALUES('9', '4.98', '1678783800', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_maso (id, name_maso, time_add, user_add, time_edit, user_edit, status) VALUES('1', 'A2', '1678693810', '3', '1678783826', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_maso (id, name_maso, time_add, user_add, time_edit, user_edit, status) VALUES('2', 'A0', '1678693814', '3', '1678783822', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_maso (id, name_maso, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'A1', '1678693818', '3', '1678783817', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_ngoaingu (id, name_ngoaingu, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Trình độ A', '1678784056', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_ngoaingu (id, name_ngoaingu, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'Trình độ B', '1678784063', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_ngoaingu (id, name_ngoaingu, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'Trình độ C', '1678784068', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_nhansu (id, code, hoten_lot, ten, gioitinh, ngaysinh, chucvu_id, phongban_id, noisinh, quequan, tongiao_id, diachihiennay, ngaytuyendung, chucdanhkiemnhiem, chucdanh_id, maso_id, bacluong_id, heso_id, ngayhuong, phucapchucvu, phucapkhac, chuyenmon_id, chinhtri_id, quanlygiaoduc_id, ngoaingu_id, chungchi_ngoaingu, tinhoc_id, chungchi_khac, ngayvaodang, ngayvaochinhthuc, cannang, chieucao, cmnd, ngaycap, noicap, bhxh, bhyt, didong, dienthoai_nha, dienthoai_coquan, bienche_id, ngayvao_bienche, quytrinhcongtac, ngaynhanviec, ngaythoiviec, thoigiancongtac, huutri, thucnghi, lylich, time_add, user_add, time_edit, user_edit, status) VALUES('3', '90116', 'Nguyễn Vũ Lan', 'Anh', '1', '563475600', '1', '2', 'Phú Yên', 'Mỹ Hòa, Hòa Thắng, Phú Hòa', '3', '35/1 Lương Thế Vinh, Phường 8, TP. Tuy Hòa, Phú Yên', '1280682000', '', '2', '1', '1', '1', '0', '', '', '5', '3', '3', '0', '3', '4', '', '1364230800', '1395766800', '', '', '', '0', '', '', '', '', '', '', '3', '0', '', '0', '0', '0', '', '', '1', '1678783172', '18', '1678950823', '3', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_nhansu (id, code, hoten_lot, ten, gioitinh, ngaysinh, chucvu_id, phongban_id, noisinh, quequan, tongiao_id, diachihiennay, ngaytuyendung, chucdanhkiemnhiem, chucdanh_id, maso_id, bacluong_id, heso_id, ngayhuong, phucapchucvu, phucapkhac, chuyenmon_id, chinhtri_id, quanlygiaoduc_id, ngoaingu_id, chungchi_ngoaingu, tinhoc_id, chungchi_khac, ngayvaodang, ngayvaochinhthuc, cannang, chieucao, cmnd, ngaycap, noicap, bhxh, bhyt, didong, dienthoai_nha, dienthoai_coquan, bienche_id, ngayvao_bienche, quytrinhcongtac, ngaynhanviec, ngaythoiviec, thoigiancongtac, huutri, thucnghi, lylich, time_add, user_add, time_edit, user_edit, status) VALUES('4', '125135', 'Nhân sự', 'Anh', '0', '1050166800', '1', '1', 'ssss', 'sss', '1', 'ssss', '1678381200', 'ssss', '1', '1', '1', '1', '1520787600', '222222', '22222', '7', '1', '1', '0', '1', '1', '2222', '1520787600', '1520787600', '', '', '21515151521', '1678208400', '2222', 'ssss', 'ssss', '2222151251', '215125215', '21512521', '1', '1678208400', 'ssssss', '1677603600', '1520787600', '20', 'sss', 'sss', '1', '1678951497', '1', '1681472063', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_nhansu (id, code, hoten_lot, ten, gioitinh, ngaysinh, chucvu_id, phongban_id, noisinh, quequan, tongiao_id, diachihiennay, ngaytuyendung, chucdanhkiemnhiem, chucdanh_id, maso_id, bacluong_id, heso_id, ngayhuong, phucapchucvu, phucapkhac, chuyenmon_id, chinhtri_id, quanlygiaoduc_id, ngoaingu_id, chungchi_ngoaingu, tinhoc_id, chungchi_khac, ngayvaodang, ngayvaochinhthuc, cannang, chieucao, cmnd, ngaycap, noicap, bhxh, bhyt, didong, dienthoai_nha, dienthoai_coquan, bienche_id, ngayvao_bienche, quytrinhcongtac, ngaynhanviec, ngaythoiviec, thoigiancongtac, huutri, thucnghi, lylich, time_add, user_add, time_edit, user_edit, status) VALUES('5', '14124869', 'Nguyễn Huy', 'Hoàng', '0', '-369644400', '2', '2', 'Tuy Hòa, Phú Yên', 'Thái Bình', '3', 'HCM', '1681059600', 'Giáo viên', '9', '2', '4', '7', '1681837200', '', '', '6', '3', '3', '0', '3', '7', '', '1567875600', '1578416400', '', '', '221510440', '1515430800', 'Phú Yên', '1911547630', '15243697523', '0378338464', '', '', '4', '1681232400', '', '0', '0', '0', '', '', '0', '1681466582', '1', '1681519634', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_phongban (id, name_phongban, time_add, user_add, time_edit, user_edit, status) VALUES('1', 'Phòng Tổ chức - Hành chính - Tài vụ', '1678693274', '3', '1678782587', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_phongban (id, name_phongban, time_add, user_add, time_edit, user_edit, status) VALUES('2', 'Phòng Đào tạo và Bồi dưỡng', '1678693279', '3', '1678782569', '18', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_phongban (id, name_phongban, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Trung tâm Ngoại ngữ CEC', '1678782606', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_phongban (id, name_phongban, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'Trường Tiểu học Bán trú Phù Đổng', '1678782626', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_phongban (id, name_phongban, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'Ban Giám đốc', '1678782634', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_quanlygiaoduc (id, name_quanlygiaoduc, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Đại học', '1678784034', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_quanlygiaoduc (id, name_quanlygiaoduc, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'Chứng chỉ', '1678784040', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tinhoc (id, name_tinhoc, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'Tin học A', '1678784082', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tinhoc (id, name_tinhoc, time_add, user_add, time_edit, user_edit, status) VALUES('5', 'Tin học B', '1678784087', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tinhoc (id, name_tinhoc, time_add, user_add, time_edit, user_edit, status) VALUES('6', 'Ứng dụng CNTT Cơ bản', '1678784107', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tinhoc (id, name_tinhoc, time_add, user_add, time_edit, user_edit, status) VALUES('7', 'Ứng dụng CNTT Nâng cao', '1678784113', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tongiao (id, name_tongiao, time_add, user_add, time_edit, user_edit, status) VALUES('3', 'Không', '1678782733', '18', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
