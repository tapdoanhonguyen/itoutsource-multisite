<?php

/**
 * TMS Content Management System
 * @version 4.x
 * @author TMS Holdings <contact@tms.vn>
 * @copyright (C) 2009-2021 TMS Holdings. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://thuongmaiso.vn
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');
$mod = $nv_Request->get_title('mod', 'post,get', '');

if(isset($_POST['import']))
{
    $lab_id = $nv_Request->get_title('nhom', 'post,get', '');

    $allowedExts = array("xlsx");
    $temp = explode(".", $_FILES["excel"]["name"]);
    $extension = end($temp);
    if (($_FILES["excel"]["size"] < 200000000000) && in_array($extension, $allowedExts)) {
        if ($_FILES["excel"]["error"] > 0)
            echo "Return Code: " . $_FILES["excel"]["error"] . "<br>";
        else{
            $filename = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/';

            if  (!file_exists($filename)) {
                mkdir(NV_UPLOADS_DIR . '/' . $module_upload .  '/', 0777);
            } 


            if (file_exists($filename . '/' . $_FILES["excel"]["name"]))
                unlink($filename .'/'. $_FILES["excel"]["name"]);


            move_uploaded_file($_FILES["excel"]["tmp_name"],$filename .'/'. $_FILES["excel"]["name"]); 
            $file = $filename .'/'. $_FILES["excel"]["name"]; // file du  
            require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';
            $objFile = PHPExcel_IOFactory::identify($file);
            $objData = PHPExcel_IOFactory::createReader($objFile);
            $objData->setReadDataOnly(true);
            $objPHPExcel = $objData->load($file);
            $sheet  = $objPHPExcel->setActiveSheetIndex(0);
            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            $data = [];


            
            

            $row = array();
            for ($i = 2; $i <= $Totalrow; $i++)
            {
                $data[$i]=array(
                    "code"=> $sheet->getCellByColumnAndRow(1, $i)->getValue(),
                    "hoten_lot"=>$sheet->getCellByColumnAndRow(2, $i)->getValue(),
                    
                    "ten"=>$sheet->getCellByColumnAndRow(3, $i)->getValue(),
                    "gioitinh"=>$sheet->getCellByColumnAndRow(4, $i)->getValue(),
                    "ngaysinh"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(5, $i)->getValue())->format('m-d-Y'))),
                    "chucvu_id"=>$sheet->getCellByColumnAndRow(6, $i)->getValue(),
                    "phongban_id"=>$sheet->getCellByColumnAndRow(7, $i)->getValue(),
                    "noisinh"=>$sheet->getCellByColumnAndRow(8, $i)->getValue(),
                    "quequan"=>$sheet->getCellByColumnAndRow(9, $i)->getValue(),
                    "tongiao_id"=>$sheet->getCellByColumnAndRow(10, $i)->getValue(),
                    "diachihiennay"=>$sheet->getCellByColumnAndRow(11, $i)->getValue(),
                    "ngaytuyendung"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(12, $i)->getValue())->format('m-d-Y'))),
                    "chucdanhkiemnhiem"=>$sheet->getCellByColumnAndRow(13, $i)->getValue(),

                    "chucdanh_id"=>$sheet->getCellByColumnAndRow(14, $i)->getValue(),
                    "maso_id"=>$sheet->getCellByColumnAndRow(15, $i)->getValue(),
                    "bacluong_id"=>$sheet->getCellByColumnAndRow(16, $i)->getValue(),
                    "heso_id"=>$sheet->getCellByColumnAndRow(17, $i)->getValue(),
                    "ngayhuong"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(18, $i)->getValue())->format('m-d-Y'))),
                    "phucapchucvu"=>$sheet->getCellByColumnAndRow(19, $i)->getValue(),
                    "phucapkhac"=>$sheet->getCellByColumnAndRow(20, $i)->getValue(),

                    "chuyenmon_id"=>$sheet->getCellByColumnAndRow(21, $i)->getValue(),
                    "chinhtri_id"=>$sheet->getCellByColumnAndRow(22, $i)->getValue(),
                    "quanlygiaoduc_id"=>$sheet->getCellByColumnAndRow(23, $i)->getValue(),
                    // "ngoaingu_id"=>$sheet->getCellByColumnAndRow(24, $i)->getValue(),
                    "chungchi_ngoaingu"=>$sheet->getCellByColumnAndRow(24, $i)->getValue(),
                    "tinhoc_id"=>$sheet->getCellByColumnAndRow(25, $i)->getValue(),
                    "chungchi_khac"=>$sheet->getCellByColumnAndRow(26, $i)->getValue(),

                    "ngayvaodang"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(27, $i)->getValue())->format('m-d-Y'))),
                    "ngayvaochinhthuc"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(28, $i)->getValue())->format('m-d-Y'))),
                    // "cannang"=>$sheet->getCellByColumnAndRow(29, $i)->getValue(),
                    // "chieucao"=>$sheet->getCellByColumnAndRow(30, $i)->getValue(),
                    "cmnd"=>$sheet->getCellByColumnAndRow(29, $i)->getValue(),
                    "ngaycap"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(30, $i)->getValue())->format('m-d-Y'))),
                    "noicap"=>$sheet->getCellByColumnAndRow(31, $i)->getValue(),

                    "bhxh"=>$sheet->getCellByColumnAndRow(32, $i)->getValue(),
                    "bhyt"=>$sheet->getCellByColumnAndRow(33, $i)->getValue(),
                    "didong"=>$sheet->getCellByColumnAndRow(34, $i)->getValue(),
                    "dienthoai_nha"=>$sheet->getCellByColumnAndRow(35, $i)->getValue(),
                    "dienthoai_coquan"=>$sheet->getCellByColumnAndRow(36, $i)->getValue(),
                    "bienche_id"=>$sheet->getCellByColumnAndRow(37, $i)->getValue(),
                    "ngayvao_bienche"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(38, $i)->getValue())->format('m-d-Y'))),

                    "quytrinhcongtac"=>$sheet->getCellByColumnAndRow(39, $i)->getValue(),
                    "ngaynhanviec"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(40, $i)->getValue())->format('m-d-Y'))),
                    "ngaythoiviec"=>strtotime(str_replace('/', '-',PHPExcel_Shared_Date::ExcelToPHPObject($sheet->getCellByColumnAndRow(41, $i)->getValue())->format('m-d-Y'))),
                    "thoigiancongtac"=>$sheet->getCellByColumnAndRow(42, $i)->getValue(),
                    "huutri"=>$sheet->getCellByColumnAndRow(43, $i)->getValue(),
                    "thucnghi"=>$sheet->getCellByColumnAndRow(44, $i)->getValue(),
                    "lylich"=>$sheet->getCellByColumnAndRow(45, $i)->getValue(),


                );
}

function super_unique($array,$key)
{
    $temp_array = [];
    foreach ($array as $key2 => &$v) {
        $temp_array[$v[$key]][$key2] =& $v;
    }
    $data_loi=array();
    foreach( $temp_array as $value){
        if(count($value)>1){
            $data_loi=$value;
        }
    }

    return $data_loi;
}
$error_log=0;
if($error_log==0){

    foreach ($data as $key => $row) {
        $check = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_nhansu WHERE code = "' . $row['code'] . '"')->fetchColumn();

        if($check == 0){


            $row['time_add'] = NV_CURRENTTIME;
            $row['user_add'] = $admin_info['userid'];

            $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_nhansu (code, hoten_lot, ten, gioitinh, ngaysinh, chucvu_id, phongban_id, noisinh, quequan, tongiao_id, diachihiennay, ngaytuyendung, chucdanhkiemnhiem, chucdanh_id, maso_id, bacluong_id, heso_id, ngayhuong, phucapchucvu, phucapkhac, chuyenmon_id, chinhtri_id, quanlygiaoduc_id, ngoaingu_id, chungchi_ngoaingu, tinhoc_id, chungchi_khac, ngayvaodang, ngayvaochinhthuc, cannang, chieucao, cmnd, ngaycap, noicap, bhxh, bhyt, didong, dienthoai_nha, dienthoai_coquan, bienche_id, ngayvao_bienche, quytrinhcongtac, ngaynhanviec, ngaythoiviec, thoigiancongtac, huutri, thucnghi, lylich, time_add, user_add, status) VALUES (:code, :hoten_lot, :ten, :gioitinh, :ngaysinh, :chucvu_id, :phongban_id, :noisinh, :quequan, :tongiao_id, :diachihiennay, :ngaytuyendung, :chucdanhkiemnhiem, :chucdanh_id, :maso_id, :bacluong_id, :heso_id, :ngayhuong, :phucapchucvu, :phucapkhac, :chuyenmon_id, :chinhtri_id, :quanlygiaoduc_id, :ngoaingu_id, :chungchi_ngoaingu, :tinhoc_id, :chungchi_khac, :ngayvaodang, :ngayvaochinhthuc, :cannang, :chieucao, :cmnd, :ngaycap, :noicap, :bhxh, :bhyt, :didong, :dienthoai_nha, :dienthoai_coquan, :bienche_id, :ngayvao_bienche, :quytrinhcongtac, :ngaynhanviec, :ngaythoiviec, :thoigiancongtac, :huutri, :thucnghi, :lylich, :time_add, :user_add, :status)');

            $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
            $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
            $stmt->bindValue(':status', 1, PDO::PARAM_INT);
            $stmt->bindParam(':code', $row['code'], PDO::PARAM_STR);

        }else{
            $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_nhansu SET  hoten_lot = :hoten_lot, ten = :ten, gioitinh = :gioitinh, ngaysinh = :ngaysinh, chucvu_id = :chucvu_id, phongban_id = :phongban_id, noisinh = :noisinh, quequan = :quequan, tongiao_id = :tongiao_id, diachihiennay = :diachihiennay, ngaytuyendung = :ngaytuyendung, chucdanhkiemnhiem = :chucdanhkiemnhiem, chucdanh_id = :chucdanh_id, maso_id = :maso_id, bacluong_id = :bacluong_id, heso_id = :heso_id, ngayhuong = :ngayhuong, phucapchucvu = :phucapchucvu, phucapkhac = :phucapkhac, chuyenmon_id = :chuyenmon_id, chinhtri_id = :chinhtri_id, quanlygiaoduc_id = :quanlygiaoduc_id, ngoaingu_id = :ngoaingu_id, chungchi_ngoaingu = :chungchi_ngoaingu, tinhoc_id = :tinhoc_id, chungchi_khac = :chungchi_khac, ngayvaodang = :ngayvaodang, ngayvaochinhthuc = :ngayvaochinhthuc, cannang = :cannang, chieucao = :chieucao, cmnd = :cmnd, ngaycap = :ngaycap, noicap = :noicap, bhxh = :bhxh, bhyt = :bhyt, didong = :didong, dienthoai_nha = :dienthoai_nha, dienthoai_coquan = :dienthoai_coquan, bienche_id = :bienche_id, ngayvao_bienche = :ngayvao_bienche, quytrinhcongtac = :quytrinhcongtac, ngaynhanviec = :ngaynhanviec, ngaythoiviec = :ngaythoiviec, thoigiancongtac = :thoigiancongtac, huutri = :huutri, thucnghi = :thucnghi, lylich = :lylich, time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].' WHERE code="' . $row['code'] . '"');
        }

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


    }

    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=nhansu');
}

}
}
}



$xtpl = new XTemplate('import.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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



$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['import'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
