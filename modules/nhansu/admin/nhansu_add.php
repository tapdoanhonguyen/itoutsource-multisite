<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2023 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['code'] = $nv_Request->get_title('code', 'post', '');
    $row['hoten_lot'] = $nv_Request->get_title('hoten_lot', 'post', '');
    $row['ten'] = $nv_Request->get_title('ten', 'post', '');
    $row['gioitinh'] = $nv_Request->get_int('gioitinh', 'post', 0);
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngaysinh', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngaysinh'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngaysinh'] = 0;
    }
    $row['chucvu_id'] = $nv_Request->get_int('chucvu_id', 'post', 0);
    $row['phongban_id'] = $nv_Request->get_int('phongban_id', 'post', 0);
    $row['noisinh'] = $nv_Request->get_title('noisinh', 'post', '');
    $row['quequan'] = $nv_Request->get_title('quequan', 'post', '');
    $row['tongiao_id'] = $nv_Request->get_int('tongiao_id', 'post', 0);
    $row['diachihiennay'] = $nv_Request->get_title('diachihiennay', 'post', '');
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngaytuyendung', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngaytuyendung'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngaytuyendung'] = 0;
    }
    $row['chucdanhkiemnhiem'] = $nv_Request->get_title('chucdanhkiemnhiem', 'post', '');
    $row['chucdanh_id'] = $nv_Request->get_int('chucdanh_id', 'post', 0);
    $row['maso_id'] = $nv_Request->get_int('maso_id', 'post', 0);
    $row['bacluong_id'] = $nv_Request->get_int('bacluong_id', 'post', 0);
    $row['heso_id'] = $nv_Request->get_int('heso_id', 'post', 0);
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngayhuong', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngayhuong'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngayhuong'] = 0;
    }
    $row['phucapchucvu'] = $nv_Request->get_title('phucapchucvu', 'post', '');
    $row['phucapkhac'] = $nv_Request->get_title('phucapkhac', 'post', '');
    $row['chuyenmon_id'] = $nv_Request->get_int('chuyenmon_id', 'post', 0);
    $row['chinhtri_id'] = $nv_Request->get_int('chinhtri_id', 'post', 0);
    $row['quanlygiaoduc_id'] = $nv_Request->get_int('quanlygiaoduc_id', 'post', 0);
    $row['ngoaingu_id'] = $nv_Request->get_int('ngoaingu_id', 'post', 0);
    $row['chungchi_ngoaingu'] = $nv_Request->get_int('chungchi_ngoaingu', 'post', 0);
    $row['tinhoc_id'] = $nv_Request->get_int('tinhoc_id', 'post', 0);
    $row['chungchi_khac'] = $nv_Request->get_title('chungchi_khac', 'post', '');
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngayvaodang', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngayvaodang'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngayvaodang'] = 0;
    }
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngayvaochinhthuc', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngayvaochinhthuc'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngayvaochinhthuc'] = 0;
    }
    $row['cannang'] = $nv_Request->get_title('cannang', 'post', '');
    $row['chieucao'] = $nv_Request->get_title('chieucao', 'post', '');
    $row['cmnd'] = $nv_Request->get_title('cmnd', 'post', '');
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngaycap', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngaycap'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngaycap'] = 0;
    }
    $row['noicap'] = $nv_Request->get_title('noicap', 'post', '');
    $row['bhxh'] = $nv_Request->get_title('bhxh', 'post', '');
    $row['bhyt'] = $nv_Request->get_title('bhyt', 'post', '');
    $row['didong'] = $nv_Request->get_title('didong', 'post', '');
    $row['dienthoai_nha'] = $nv_Request->get_title('dienthoai_nha', 'post', '');
    $row['dienthoai_coquan'] = $nv_Request->get_title('dienthoai_coquan', 'post', '');
    $row['bienche_id'] = $nv_Request->get_int('bienche_id', 'post', 0);
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngayvao_bienche', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngayvao_bienche'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngayvao_bienche'] = 0;
    }
    $row['quytrinhcongtac'] = $nv_Request->get_editor('quytrinhcongtac', '', NV_ALLOWED_HTML_TAGS);
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngaynhanviec', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngaynhanviec'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngaynhanviec'] = 0;
    }
    if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $nv_Request->get_string('ngaythoiviec', 'post'), $m))     {
        $_hour = 0;
        $_min = 0;
        $row['ngaythoiviec'] = mktime($_hour, $_min, 0, $m[2], $m[1], $m[3]);
    }
    else
    {
        $row['ngaythoiviec'] = 0;
    }
    $row['thoigiancongtac'] = $nv_Request->get_int('thoigiancongtac', 'post', 0);
    $row['huutri'] = $nv_Request->get_title('huutri', 'post', '');
    $row['thucnghi'] = $nv_Request->get_title('thucnghi', 'post', '');
    $row['lylich'] = $nv_Request->get_int('lylich', 'post', 0);

    if (empty($row['hoten_lot'])) {
        $error[] = $lang_module['error_required_hoten_lot'];
    } elseif (empty($row['ten'])) {
        $error[] = $lang_module['error_required_ten'];
    } elseif (empty($row['ngaysinh'])) {
        $error[] = $lang_module['error_required_ngaysinh'];
    } elseif (empty($row['chucvu_id'])) {
        $error[] = $lang_module['error_required_chucvu_id'];
    } elseif (empty($row['phongban_id'])) {
        $error[] = $lang_module['error_required_phongban_id'];
    } elseif (empty($row['chucdanh_id'])) {
        $error[] = $lang_module['error_required_chucdanh_id'];
    } elseif (empty($row['bacluong_id'])) {
        $error[] = $lang_module['error_required_bacluong_id'];
    } elseif (empty($row['heso_id'])) {
        $error[] = $lang_module['error_required_heso_id'];
    } elseif (empty($row['chuyenmon_id'])) {
        $error[] = $lang_module['error_required_chuyenmon_id'];
    } elseif (empty($row['bienche_id'])) {
        $error[] = $lang_module['error_required_bienche_id'];
    }

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['time_add'] = NV_CURRENTTIME;
                $row['user_add'] = $admin_info['userid'];

                $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_nhansu (code, hoten_lot, ten, gioitinh, ngaysinh, chucvu_id, phongban_id, noisinh, quequan, tongiao_id, diachihiennay, ngaytuyendung, chucdanhkiemnhiem, chucdanh_id, maso_id, bacluong_id, heso_id, ngayhuong, phucapchucvu, phucapkhac, chuyenmon_id, chinhtri_id, quanlygiaoduc_id, ngoaingu_id, chungchi_ngoaingu, tinhoc_id, chungchi_khac, ngayvaodang, ngayvaochinhthuc, cannang, chieucao, cmnd, ngaycap, noicap, bhxh, bhyt, didong, dienthoai_nha, dienthoai_coquan, bienche_id, ngayvao_bienche, quytrinhcongtac, ngaynhanviec, ngaythoiviec, thoigiancongtac, huutri, thucnghi, lylich, time_add, user_add, status) VALUES (:code, :hoten_lot, :ten, :gioitinh, :ngaysinh, :chucvu_id, :phongban_id, :noisinh, :quequan, :tongiao_id, :diachihiennay, :ngaytuyendung, :chucdanhkiemnhiem, :chucdanh_id, :maso_id, :bacluong_id, :heso_id, :ngayhuong, :phucapchucvu, :phucapkhac, :chuyenmon_id, :chinhtri_id, :quanlygiaoduc_id, :ngoaingu_id, :chungchi_ngoaingu, :tinhoc_id, :chungchi_khac, :ngayvaodang, :ngayvaochinhthuc, :cannang, :chieucao, :cmnd, :ngaycap, :noicap, :bhxh, :bhyt, :didong, :dienthoai_nha, :dienthoai_coquan, :bienche_id, :ngayvao_bienche, :quytrinhcongtac, :ngaynhanviec, :ngaythoiviec, :thoigiancongtac, :huutri, :thucnghi, :lylich, :time_add, :user_add, :status)');

                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
                $stmt->bindValue(':status', 1, PDO::PARAM_INT);


            } else {
                $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_nhansu SET code = :code, hoten_lot = :hoten_lot, ten = :ten, gioitinh = :gioitinh, ngaysinh = :ngaysinh, chucvu_id = :chucvu_id, phongban_id = :phongban_id, noisinh = :noisinh, quequan = :quequan, tongiao_id = :tongiao_id, diachihiennay = :diachihiennay, ngaytuyendung = :ngaytuyendung, chucdanhkiemnhiem = :chucdanhkiemnhiem, chucdanh_id = :chucdanh_id, maso_id = :maso_id, bacluong_id = :bacluong_id, heso_id = :heso_id, ngayhuong = :ngayhuong, phucapchucvu = :phucapchucvu, phucapkhac = :phucapkhac, chuyenmon_id = :chuyenmon_id, chinhtri_id = :chinhtri_id, quanlygiaoduc_id = :quanlygiaoduc_id, ngoaingu_id = :ngoaingu_id, chungchi_ngoaingu = :chungchi_ngoaingu, tinhoc_id = :tinhoc_id, chungchi_khac = :chungchi_khac, ngayvaodang = :ngayvaodang, ngayvaochinhthuc = :ngayvaochinhthuc, cannang = :cannang, chieucao = :chieucao, cmnd = :cmnd, ngaycap = :ngaycap, noicap = :noicap, bhxh = :bhxh, bhyt = :bhyt, didong = :didong, dienthoai_nha = :dienthoai_nha, dienthoai_coquan = :dienthoai_coquan, bienche_id = :bienche_id, ngayvao_bienche = :ngayvao_bienche, quytrinhcongtac = :quytrinhcongtac, ngaynhanviec = :ngaynhanviec, ngaythoiviec = :ngaythoiviec, thoigiancongtac = :thoigiancongtac, huutri = :huutri, thucnghi = :thucnghi, lylich = :lylich, time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].' WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':code', $row['code'], PDO::PARAM_STR);
            $stmt->bindParam(':hoten_lot', $row['hoten_lot'], PDO::PARAM_STR);
            $stmt->bindParam(':ten', $row['ten'], PDO::PARAM_STR);
            $stmt->bindParam(':gioitinh', $row['gioitinh'], PDO::PARAM_INT);
            $stmt->bindParam(':ngaysinh', $row['ngaysinh'], PDO::PARAM_INT);
            $stmt->bindParam(':chucvu_id', $row['chucvu_id'], PDO::PARAM_INT);
            $stmt->bindParam(':phongban_id', $row['phongban_id'], PDO::PARAM_INT);
            $stmt->bindParam(':noisinh', $row['noisinh'], PDO::PARAM_STR);
            $stmt->bindParam(':quequan', $row['quequan'], PDO::PARAM_STR);
            $stmt->bindParam(':tongiao_id', $row['tongiao_id'], PDO::PARAM_INT);
            $stmt->bindParam(':diachihiennay', $row['diachihiennay'], PDO::PARAM_STR);
            $stmt->bindParam(':ngaytuyendung', $row['ngaytuyendung'], PDO::PARAM_INT);
            $stmt->bindParam(':chucdanhkiemnhiem', $row['chucdanhkiemnhiem'], PDO::PARAM_STR);
            $stmt->bindParam(':chucdanh_id', $row['chucdanh_id'], PDO::PARAM_INT);
            $stmt->bindParam(':maso_id', $row['maso_id'], PDO::PARAM_INT);
            $stmt->bindParam(':bacluong_id', $row['bacluong_id'], PDO::PARAM_INT);
            $stmt->bindParam(':heso_id', $row['heso_id'], PDO::PARAM_INT);
            $stmt->bindParam(':ngayhuong', $row['ngayhuong'], PDO::PARAM_INT);
            $stmt->bindParam(':phucapchucvu', $row['phucapchucvu'], PDO::PARAM_STR);
            $stmt->bindParam(':phucapkhac', $row['phucapkhac'], PDO::PARAM_STR);
            $stmt->bindParam(':chuyenmon_id', $row['chuyenmon_id'], PDO::PARAM_INT);
            $stmt->bindParam(':chinhtri_id', $row['chinhtri_id'], PDO::PARAM_INT);
            $stmt->bindParam(':quanlygiaoduc_id', $row['quanlygiaoduc_id'], PDO::PARAM_INT);
            $stmt->bindParam(':ngoaingu_id', $row['ngoaingu_id'], PDO::PARAM_INT);
            $stmt->bindParam(':chungchi_ngoaingu', $row['chungchi_ngoaingu'], PDO::PARAM_INT);
            $stmt->bindParam(':tinhoc_id', $row['tinhoc_id'], PDO::PARAM_INT);
            $stmt->bindParam(':chungchi_khac', $row['chungchi_khac'], PDO::PARAM_STR);
            $stmt->bindParam(':ngayvaodang', $row['ngayvaodang'], PDO::PARAM_INT);
            $stmt->bindParam(':ngayvaochinhthuc', $row['ngayvaochinhthuc'], PDO::PARAM_INT);
            $stmt->bindParam(':cannang', $row['cannang'], PDO::PARAM_STR);
            $stmt->bindParam(':chieucao', $row['chieucao'], PDO::PARAM_STR);
            $stmt->bindParam(':cmnd', $row['cmnd'], PDO::PARAM_STR);
            $stmt->bindParam(':ngaycap', $row['ngaycap'], PDO::PARAM_INT);
            $stmt->bindParam(':noicap', $row['noicap'], PDO::PARAM_STR);
            $stmt->bindParam(':bhxh', $row['bhxh'], PDO::PARAM_STR);
            $stmt->bindParam(':bhyt', $row['bhyt'], PDO::PARAM_STR);
            $stmt->bindParam(':didong', $row['didong'], PDO::PARAM_STR);
            $stmt->bindParam(':dienthoai_nha', $row['dienthoai_nha'], PDO::PARAM_STR);
            $stmt->bindParam(':dienthoai_coquan', $row['dienthoai_coquan'], PDO::PARAM_STR);
            $stmt->bindParam(':bienche_id', $row['bienche_id'], PDO::PARAM_INT);
            $stmt->bindParam(':ngayvao_bienche', $row['ngayvao_bienche'], PDO::PARAM_INT);
            $stmt->bindParam(':ngaynhanviec', $row['ngaynhanviec'], PDO::PARAM_INT);
            $stmt->bindParam(':ngaythoiviec', $row['ngaythoiviec'], PDO::PARAM_INT);
            $stmt->bindParam(':thoigiancongtac', $row['thoigiancongtac'], PDO::PARAM_INT);
            $stmt->bindParam(':huutri', $row['huutri'], PDO::PARAM_STR);
            $stmt->bindParam(':thucnghi', $row['thucnghi'], PDO::PARAM_STR);
            $stmt->bindParam(':lylich', $row['lylich'], PDO::PARAM_INT);
            $stmt->bindParam(':quytrinhcongtac', $row['quytrinhcongtac'], PDO::PARAM_STR, strlen($row['quytrinhcongtac']));

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Nhansu', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Nhansu', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=nhansu');
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_nhansu WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=nhansu');
    }
} else {
    $row['id'] = 0;
    $row['code'] = '';
    $row['hoten_lot'] = '';
    $row['ten'] = '';
    $row['gioitinh'] = 0;
    $row['ngaysinh'] = 0;
    $row['chucvu_id'] = 0;
    $row['phongban_id'] = 0;
    $row['noisinh'] = '';
    $row['quequan'] = '';
    $row['tongiao_id'] = 0;
    $row['diachihiennay'] = '';
    $row['ngaytuyendung'] = 0;
    $row['chucdanhkiemnhiem'] = '';
    $row['chucdanh_id'] = 0;
    $row['maso_id'] = 0;
    $row['bacluong_id'] = 0;
    $row['heso_id'] = 0;
    $row['ngayhuong'] = 0;
    $row['phucapchucvu'] = '';
    $row['phucapkhac'] = '';
    $row['chuyenmon_id'] = 0;
    $row['chinhtri_id'] = 0;
    $row['quanlygiaoduc_id'] = 0;
    $row['ngoaingu_id'] = 0;
    $row['chungchi_ngoaingu'] = 0;
    $row['tinhoc_id'] = 0;
    $row['chungchi_khac'] = '';
    $row['ngayvaodang'] = 0;
    $row['ngayvaochinhthuc'] = 0;
    $row['cannang'] = '';
    $row['chieucao'] = '';
    $row['cmnd'] = '';
    $row['ngaycap'] = 0;
    $row['noicap'] = '';
    $row['bhxh'] = '';
    $row['bhyt'] = '';
    $row['didong'] = '';
    $row['dienthoai_nha'] = '';
    $row['dienthoai_coquan'] = '';
    $row['bienche_id'] = 0;
    $row['ngayvao_bienche'] = 0;
    $row['quytrinhcongtac'] = '';
    $row['ngaynhanviec'] = 0;
    $row['ngaythoiviec'] = 0;
    $row['thoigiancongtac'] = '';
    $row['huutri'] = '';
    $row['thucnghi'] = '';
    $row['lylich'] = 0;
}

if($row['chucvu_id']>0){
    $row['chucvu_name']=get_info_chucvu($row['chucvu_id'])['name_chucvu'];
}else{
    $row['chucvu_id']='';
}
if($row['phongban_id']>0){
    $row['phongban_name']=get_info_phongban($row['phongban_id'])['name_phongban'];
}else{
    $row['phongban_id']='';
}
if($row['tongiao_id']>0){
    $row['tongiao_name']=get_info_tongiao($row['tongiao_id'])['name_tongiao'];
}else{
    $row['tongiao_id']='';
}
if($row['bienche_id']>0){
    $row['bienche_name']=get_info_bienche($row['bienche_id'])['name_bienche'];
}else{
    $row['bienche_id']='';
}
if($row['chucdanh_id']>0){
    $row['chucdanh_name']=get_info_chucdanh($row['chucdanh_id'])['name_chucdanh'];
}else{
    $row['chucdanh_id']='';
}
if($row['maso_id']>0){
    $row['maso_name']=get_info_maso($row['maso_id'])['name_maso'];
}else{
    $row['maso_id']='';
}
if($row['bacluong_id']>0){
    $row['bacluong_name']=get_info_bacluong($row['bacluong_id'])['name_bacluong'];
}else{
    $row['bacluong_id']='';
}
if($row['heso_id']>0){
    $row['heso_name']=get_info_heso($row['heso_id'])['name_heso'];
}else{
    $row['heso_id']='';
}
if($row['chuyenmon_id']>0){
    $row['chuyenmon_name']=get_info_chuyenmon($row['chuyenmon_id'])['name_chuyenmon'];
}else{
    $row['chuyenmon_id']='';
}
if($row['chinhtri_id']>0){
    $row['chinhtri_name']=get_info_chinhtri($row['chinhtri_id'])['name_chinhtri'];
}else{
    $row['chinhtri_id']='';
}
if($row['quanlygiaoduc_id']>0){
    $row['quanlygiaoduc_name']=get_info_quanlygiaoduc($row['quanlygiaoduc_id'])['name_quanlygiaoduc'];
}else{
    $row['quanlygiaoduc_id']='';
}
if($row['ngoaingu_id']>0){
    $row['ngoaingu_name']=get_info_ngoaingu($row['ngoaingu_id'])['name_ngoaingu'];
}else{
    $row['ngoaingu_id']='';
}
if($row['chungchi_ngoaingu']>0){
    $row['chungchi_ngoaingu_name']=get_info_ngoaingu($row['chungchi_ngoaingu'])['name_ngoaingu'];
}else{
    $row['chungchi_ngoaingu']='';
}
if($row['tinhoc_id']>0){
    $row['tinhoc_name']=get_info_tinhoc($row['tinhoc_id'])['name_tinhoc'];
}else{
    $row['tinhoc_id']='';
}




if($row['lylich']==1){
    $row['lylich_checked']='checked';
}else{
    $row['lylich_checked']='';
}
if (empty($row['ngaysinh'])) {
    $row['ngaysinh'] = '';
}
else
{
    $row['ngaysinh'] = date('d/m/Y', $row['ngaysinh']);
}

if (empty($row['ngaytuyendung'])) {
    $row['ngaytuyendung'] = '';
}
else
{
    $row['ngaytuyendung'] = date('d/m/Y', $row['ngaytuyendung']);
}

if (empty($row['ngayhuong'])) {
    $row['ngayhuong'] = '';
}
else
{
    $row['ngayhuong'] = date('d/m/Y', $row['ngayhuong']);
}

if (empty($row['ngayvaodang'])) {
    $row['ngayvaodang'] = '';
}
else
{
    $row['ngayvaodang'] = date('d/m/Y', $row['ngayvaodang']);
}

if (empty($row['ngayvaochinhthuc'])) {
    $row['ngayvaochinhthuc'] = '';
}
else
{
    $row['ngayvaochinhthuc'] = date('d/m/Y', $row['ngayvaochinhthuc']);
}

if (empty($row['ngaycap'])) {
    $row['ngaycap'] = '';
}
else
{
    $row['ngaycap'] = date('d/m/Y', $row['ngaycap']);
}

if (empty($row['ngayvao_bienche'])) {
    $row['ngayvao_bienche'] = '';
}
else
{
    $row['ngayvao_bienche'] = date('d/m/Y', $row['ngayvao_bienche']);
}

if (empty($row['ngaynhanviec'])) {
    $row['ngaynhanviec'] = '';
}
else
{
    $row['ngaynhanviec'] = date('d/m/Y', $row['ngaynhanviec']);
}

if (empty($row['ngaythoiviec'])) {
    $row['ngaythoiviec'] = '';
}
else
{
    $row['ngaythoiviec'] = date('d/m/Y', $row['ngaythoiviec']);
}
if (defined('NV_EDITOR'))
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';

$row['quytrinhcongtac'] = nv_htmlspecialchars(nv_editor_br2nl($row['quytrinhcongtac']));

if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $row['quytrinhcongtac'] = nv_aleditor('quytrinhcongtac', '100%', '300px', $row['quytrinhcongtac']);
} else {
    $row['quytrinhcongtac'] = '<textarea style="width:100%;height:300px" name="quytrinhcongtac">' . $row['quytrinhcongtac'] . '</textarea>';
}

$array_gioitinh = array();
$array_gioitinh[0] = 'Nam';
$array_gioitinh[1] = 'Nữ';


$xtpl = new XTemplate('nhansu_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);

foreach ($array_gioitinh as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'selected' => ($key == $row['gioitinh']) ? ' selected="selected"' : ''
        ));
    $xtpl->parse('main.select_gioitinh');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
if($row['id']==0){
    $page_title = $lang_module['nhansu_add'];
}else{
    $page_title = $lang_module['nhansu_edit'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
