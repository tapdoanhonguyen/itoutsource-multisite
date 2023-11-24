<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2023 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 13 Mar 2023 06:42:35 GMT
 */


if(defined('NV_IS_USER')){

}else{
    $page_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login';
    echo '<script language="javascript">';
    echo 'alert("Bạn có không có quyền truy cập chức năng này!");window.location = "'.nv_url_rewrite($page_url,true).'"';
    echo '</script>';

    die;
}
$page_title = 'Thống kê';


$current_month = date('m', NV_CURRENTTIME);
$current_day = date('d', NV_CURRENTTIME);
$current_year = date('Y', NV_CURRENTTIME);


$mod = $nv_Request->get_string('mod', 'post,get', '');



if($mod == 'download')
{
    $file_name = $nv_Request->get_string( 'file_name', 'get', '' );

    $file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;

    if( file_exists( $file_path ) )
    {
        header( 'Content-Description: File Transfer' );
        header( 'Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
        header( 'Content-Disposition: attachment; filename=' . $file_name );
        header( 'Content-Transfer-Encoding: binary' );
        header( 'Expires: 0' );
        header( 'Cache-Control: must-revalidate' );
        header( 'Pragma: public' );
        header( 'Content-Length: ' . filesize( $file_path ) );
        readfile( $file_path );
        // ob_clean();
        flush();
        nv_deletefile( $file_path );

        exit();
    }else
    {
        die('File not exists !');
    }
}
if($mod=='xuat_danh_sach_sinh_nhat'){
    $page_title = 'DANH SÁCH SINH NHẬT';
    $Excel_Cell_Begin = 1; 
    require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';
    $spreadsheet = PHPExcel_IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/sinhnhat.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setTitle( $page_title );
    $worksheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
    $worksheet->getPageSetup()->setPaperSize( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
    $worksheet->getPageSetup()->setHorizontalCentered( true );
    $spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd( 1, $Excel_Cell_Begin );
    $pRow = $Excel_Cell_Begin;
    $dataContent = array();


    $where = '';

    $quy_sinhnhat1 = $nv_Request->get_title( 'quy_sinhnhat', 'post,get' );

    $quy_sinhnhat = so_ngay_trong_quy($current_year, $quy_sinhnhat1);

    $sth = $db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where status = 1');

    $xtpl = new XTemplate('show_statistical_sinhnhat.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('MODULE_UPLOAD', $module_upload);
    $xtpl->assign('OP', $op);
    $dataContent = [];
    $a = 0;
    while ($view = $sth->fetch()) {

        $view['sinhnhat'] = strtotime(date('d-m-', $view['ngaysinh']).$current_year);

        if($view['sinhnhat'] > $quy_sinhnhat[0] && $view['sinhnhat'] < $quy_sinhnhat[1]) {

            $date_birhday_nhansu = date('d', $view['ngaysinh']);
            $month_birhday_nhansu = date('m', $view['ngaysinh']);

            $a++;
            
            $view['chucdanh'] = get_info_chucdanh($view['chucdanh_id'])['name_chucdanh'];
            $view['phongban'] = get_info_phongban($view['phongban_id'])['name_phongban'];

            if($date_birhday_nhansu == $current_day && $month_birhday_nhansu == $current_month) {
                $view['birthday_today'] = '<img src="https://phuyen.moha.gov.vn/assets/images/icons/icon-banh-sinh-nhat-40x40.png">';
            }
            else if (($month_birhday_nhansu == $current_month && $date_birhday_nhansu > $current_day) || 
                $month_birhday_nhansu > $current_month){
                $datetime1 = date_create(date('Y-m-d', NV_CURRENTTIME));
            $datetime2 = date_create(date($current_year.'-m-d', $view['ngaysinh']));

            $interval = date_diff($datetime1, $datetime2);

            $view['birthday_today'] = $interval->format('Còn %m tháng %d ngày');
        }
        else {
            $view['birthday_today'] = 'Đã diễn ra';
        }

        $view['ngaysinh'] = date('d/m/Y', $view['ngaysinh']);
        $data_aray['stt']=$a;
        $data_aray['ho_va_ten']=$view['ten'];
        $data_aray['phong_ban']=$view['phongban'];
        $data_aray['ngay_sinh']=$view['ngaysinh'];
        $dataContent[]=$data_aray;
    }
}
if(count($dataContent)>0){
    $worksheet->fromArray($dataContent, null, 'A2');
    $file_name = 'sinh_nhat_quy' . $quy_sinhnhat1 . '.xlsx';
    $file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
    header( 'Content-Type: application/vnd.ms-excel' );
    header( 'Content-Disposition: attachment;filename="'. $file_name .'"' );
    header( 'Cache-Control: max-age=0' );

    $writer = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel2007');
    $writer->save($file_path);
    $link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op.'&mod=download&file_name=' . $file_name;  

    nv_jsonOutput( array('link'=> $link) );     
}else{
    nv_jsonOutput( array('error'=> 'Không tồn tại dữ liệu nào theo dữ liệu bạn chọn') );     
}
}




















if($mod=='xuat_luong'){
    $page_title = 'DANH SÁCH TĂNG LƯƠNG';
    $Excel_Cell_Begin = 1; 
    require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';
    $spreadsheet = PHPExcel_IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/tangluong.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setTitle( $page_title );
    $worksheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
    $worksheet->getPageSetup()->setPaperSize( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
    $worksheet->getPageSetup()->setHorizontalCentered( true );
    $spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd( 1, $Excel_Cell_Begin );
    $pRow = $Excel_Cell_Begin;
    $dataContent = array();

    $dataContent = [];
    $all_nhansu=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where status=1')->fetchAll();
    $day_now = strtotime(date('d-m-Y',NV_CURRENTTIME ));
    $day_now_before=strtotime('-5 days',$day_now);
    for($i=3;$i<=18;$i=$i+3) {
        $day=($i-1)*31536000;
        $bb = 1;
        foreach($all_nhansu as $luong_nhansu) {

            if($luong_nhansu['ngayhuong'] + $day >= $day_now_before && $luong_nhansu['ngayhuong'] + $day <= $day_now) {




                $luong_nhansu['chucdanh'] = get_info_chucdanh($luong_nhansu['chucdanh_id'])['name_chucdanh'];
                $luong_nhansu['phongban'] = get_info_phongban($luong_nhansu['phongban_id'])['name_phongban'];

                $luong_nhansu['bacluong'] = get_info_bacluong($luong_nhansu['bacluong_id'])['name_bacluong'];
                $luong_nhansu['hesotang'] = get_info_heso($luong_nhansu['heso_id'])['name_heso'];

                $luong_nhansu['gioitinh'] = $luong_nhansu['gioitinh'] == 1 ? "Nữ" : "Nam";

                $luong_nhansu['ngaysinh'] = date('d/m/Y', $luong_nhansu['ngaysinh']);
                $luong_nhansu['ngaydukien'] = date('d/m/Y', $luong_nhansu['ngayhuong'] + $day);

                
                
                $data_aray['stt']=$bb;
                $bb++;
                $data_aray['ho_va_ten']=$luong_nhansu['hoten_lot'] . ' ' . $luong_nhansu['ten'];
                $data_aray['gioi_tinh']=$luong_nhansu['gioitinh'];
                $data_aray['phong_ban']=$luong_nhansu['phongban'];
                $data_aray['bac_luong']=$luong_nhansu['bacluong'];
                $data_aray['he_so']=$luong_nhansu['hesotang'];
                $data_aray['ngay_du_kien']=$luong_nhansu['ngaydukien'];
                $dataContent[]=$data_aray;
            }
        }
    }



    
    
    if(count($dataContent)>0){
        $worksheet->fromArray($dataContent, null, 'A2');
        $file_name = 'Danhsachtangluong.xlsx';
        $file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
        header( 'Content-Type: application/vnd.ms-excel' );
        header( 'Content-Disposition: attachment;filename="'. $file_name .'"' );
        header( 'Cache-Control: max-age=0' );

        $writer = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel2007');
        $writer->save($file_path);
        $link = NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op.'&mod=download&file_name=' . $file_name;  

        nv_jsonOutput( array('link'=> $link) );     
    }else{
        nv_jsonOutput( array('error'=> 'Không tồn tại dữ liệu nào theo dữ liệu bạn chọn') );     
    }
}













if($mod=='get_statistical') {
    $table_detail = $nv_Request->get_string('table_detail', 'post', '');

    $query = 'SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where status = 1';

    if($table_detail == 'show_count_full') {
        $query .= '';
    }
    else if ($table_detail == 'show_count_woman') {
        $query .= ' AND gioitinh = 1';
    }
    else if ($table_detail == 'show_count_man') {
        $query .= ' AND gioitinh = 0';
    }
    else if ($table_detail == 'show_count_bien_che_3') {
        $query .= ' AND bienche_id= 3';
    }
    else if ($table_detail == 'show_count_bien_che_4') {
        $query .= ' AND bienche_id= 4';
    }
    else if ($table_detail == 'show_count_bien_che_5') {
        $query .= ' AND bienche_id= 5';
    }

    $sth = $db->query($query);

    $xtpl = new XTemplate('show_count_full.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
    $xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
    $xtpl->assign('NV_BASE_ADMINURL', NV_BASE_SITEURL);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('MODULE_UPLOAD', $module_upload);
    $xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
    $xtpl->assign('OP', $op);

    $a = 0;
    while ($view = $sth->fetch()) {

        $a++;
        $view['stt'] = $a;

        $view['ngaytuyendung']= date('d/m/Y', $view['ngaytuyendung']);        

        $view['gioitinh'] = $view['gioitinh'] == 1 ? "Nữ" : "Nam";

        $view['chucvu'] = get_info_chucvu($view['chucvu_id'])['name_chucvu'];
        $view['chucdanh'] = get_info_chucdanh($view['chucdanh_id'])['name_chucdanh'];
        $view['phongban'] = get_info_phongban($view['phongban_id'])['name_phongban'];

        $view['chuyenmon'] = get_info_chuyenmon($view['chuyenmon_id'])['name_chuyenmon'];

        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
    }

    $xtpl->parse('main');
    $contents = $xtpl->text('main');

    echo $contents;die;
}
else if ($mod == 'get_statistical_huutri') {
    $thang_huutri = $nv_Request->get_string('thang_huutri', 'post', '');

    $sth = $db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where status = 1');

    $xtpl = new XTemplate('show_statistical_huutri.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('MODULE_UPLOAD', $module_upload);
    $xtpl->assign('OP', $op);

    $a = 0;
    while ($view = $sth->fetch()) {

        if($view['gioitinh'] == 0) {
            $view['ngaydukien'] = strtotime("+6 month +64 year", $view['ngaysinh']);
        }
        else {
            $view['ngaydukien'] = strtotime("+6 month +59 year", $view['ngaysinh']);
        }

        if(date('Y', $view['ngaydukien']) == $current_year && date('m', $view['ngaydukien']) == $thang_huutri) {
            $a++;
            $view['stt'] = $a;

            $view['ngaytuyendung']= date('d/m/Y', $view['ngaytuyendung']);

            $view['gioitinh'] = $view['gioitinh'] == 1 ? "Nữ" : "Nam";
            $view['ngaysinh'] = date('d/m/Y', $view['ngaysinh']);
            $view['ngaydukien'] = date('d/m/Y', $view['ngaydukien']);

            $view['chucdanh'] = get_info_chucdanh($view['chucdanh_id'])['name_chucdanh'];
            $view['phongban'] = get_info_phongban($view['phongban_id'])['name_phongban'];

            $xtpl->assign('VIEW', $view);
            $xtpl->parse('main.loop');
        }
    }

    $xtpl->parse('main');
    $contents = $xtpl->text('main');

    echo $contents;die;
}
else if ($mod == 'get_statistical_sinhnhat') {
    $quy_sinhnhat = $nv_Request->get_string('quy_sinhnhat', 'post', '');
    $quy_sinhnhat = so_ngay_trong_quy($current_year, $quy_sinhnhat);

    $sth = $db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where status = 1');

    $xtpl = new XTemplate('show_statistical_sinhnhat.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('MODULE_UPLOAD', $module_upload);
    $xtpl->assign('OP', $op);

    $a = 0;
    while ($view = $sth->fetch()) {

        $view['sinhnhat'] = strtotime(date('d-m-', $view['ngaysinh']).$current_year);

        if($view['sinhnhat'] > $quy_sinhnhat[0] && $view['sinhnhat'] < $quy_sinhnhat[1]) {

            $date_birhday_nhansu = date('d', $view['ngaysinh']);
            $month_birhday_nhansu = date('m', $view['ngaysinh']);

            $a++;
            $view['stt'] = $a;

            $view['chucdanh'] = get_info_chucdanh($view['chucdanh_id'])['name_chucdanh'];
            $view['phongban'] = get_info_phongban($view['phongban_id'])['name_phongban'];

            if($date_birhday_nhansu == $current_day && $month_birhday_nhansu == $current_month) {
                $view['birthday_today'] = '<img src="https://phuyen.moha.gov.vn/assets/images/icons/icon-banh-sinh-nhat-40x40.png">';
            }
            else if (($month_birhday_nhansu == $current_month && $date_birhday_nhansu > $current_day) || 
                $month_birhday_nhansu > $current_month){
                $datetime1 = date_create(date('Y-m-d', NV_CURRENTTIME));
            $datetime2 = date_create(date($current_year.'-m-d', $view['ngaysinh']));

            $interval = date_diff($datetime1, $datetime2);

            $view['birthday_today'] = $interval->format('Còn %m tháng %d ngày');
        }
        else {
            $view['birthday_today'] = 'Đã diễn ra';
        }

        $view['ngaysinh'] = date('d/m/Y', $view['ngaysinh']);

        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
    }
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

echo $contents;die;
}

$all_nhansu=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where status=1')->fetchAll();

$all_phongban = $db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_phongban")->fetchAll();

$all_chucdanh = $db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chucdanh")->fetchAll();

$all_trinhdodaotao = $db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chucvu")->fetchAll();

$all_chuyenmon = $db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chuyenmon")->fetchAll();

$all_tinhoc = $db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_tinhoc")->fetchAll();
$all_ngoaingu = $db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_ngoaingu")->fetchAll();

// print_r($all_nhansu);die;


$count_full=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where status=1')->fetchColumn();
$count_nu=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where gioitinh=1 and status=1')->fetchColumn();
$count_nam=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where gioitinh=0 and status=1')->fetchColumn();
$loai_bien_che=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_bienche where status=1')->fetchAll();

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_SITEURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('count_full', number_format($count_full));
$xtpl->assign('count_nu', number_format($count_nu));
$xtpl->assign('count_nam', number_format($count_nam));
$xtpl->assign('CURRENT_MONTH', $current_month);

$day_now = strtotime(date('d-m-Y',NV_CURRENTTIME ));
$day_now_before=strtotime('-5 days',$day_now);

foreach($all_phongban as $key => $phongban ) {

    $count_nhansu_phongban = $db->query("SELECT Count(*) as 'so_nhan_su' FROM " .$db_config['prefix'] . "_" . $module_data . "_nhansu WHERE phongban_id = ". $phongban['id'])->fetch();

    $phongban['so_nhan_su'] = $count_nhansu_phongban['so_nhan_su'];

    $xtpl->assign('PHONGBAN', $phongban);
    $xtpl->parse('main.phongban');
}

foreach($all_chucdanh as $key => $chucdanh ) {

    $count_nhansu_chucdanh = $db->query("SELECT Count(*) as 'so_nhan_su' FROM " .$db_config['prefix'] . "_" . $module_data . "_nhansu WHERE chucdanh_id = ". $chucdanh['id'])->fetch();

    $chucdanh['so_nhan_su_theo_chucdanh'] = $count_nhansu_chucdanh['so_nhan_su'];

    $xtpl->assign('CHUCDANH', $chucdanh);
    $xtpl->parse('main.chucdanh');
}

//Biểu đồ nhân sự theo trình độ đào tạo và chuyên môn - START
foreach($all_chuyenmon as $key => $chuyenmon ) {

    $xtpl->assign('CHUYENMON', $chuyenmon);
    $xtpl->parse('main.chuyenmon');
}

foreach($all_trinhdodaotao as $key => $trinhdodaotao ) {

    foreach($all_chuyenmon as $key2 => $trinhdo_chuyenmon ) {

        $count_nhansu_trinhdo_chuyenmon = $db->query("SELECT Count(*) as 'so_nhan_su' FROM " .$db_config['prefix'] . "_" . $module_data . "_nhansu WHERE chucvu_id = ". $trinhdodaotao['id'] . " AND chuyenmon_id = " . $trinhdo_chuyenmon['id'])->fetch();

        $trinhdo_chuyenmon['so_nhan_su'] = $count_nhansu_trinhdo_chuyenmon['so_nhan_su'];

        $xtpl->assign('TRINHDOCHUYENMON', $trinhdo_chuyenmon);
        $xtpl->parse('main.trinhdodaotao.chuyenmon');       
    }
    $xtpl->assign('TRINHDODAOTAO', $trinhdodaotao);
    $xtpl->parse('main.trinhdodaotao');
}
//Biểu đồ nhân sự theo trình độ đào tạo và chuyên môn - END


//Biểu đồ nhân sự theo tin học và ngoại ngữ - START
foreach($all_tinhoc as $key => $tinhoc ) {

    $xtpl->assign('TINHOC', $tinhoc);
    $xtpl->parse('main.tinhoc');
}

foreach($all_ngoaingu as $key => $ngoaingu ) {

    foreach($all_tinhoc as $key2 => $tinhoc_ngoaingu ) {

        $count_nhansu_tinhoc_ngoaingu = $db->query("SELECT Count(*) as 'so_nhan_su' FROM " .$db_config['prefix'] . "_" . $module_data . "_nhansu WHERE chungchi_ngoaingu = ". $ngoaingu['id'] . " AND tinhoc_id = " . $tinhoc_ngoaingu['id'])->fetch();

        $xtpl->assign('nhansu_tinhoc_ngoai_ngu', $count_nhansu_tinhoc_ngoaingu['so_nhan_su']);
        $xtpl->parse('main.ngoaingu.tinhoc');
    }
    $xtpl->assign('NGOAINGU', $ngoaingu);
    $xtpl->parse('main.ngoaingu');
}

//Biểu đồ nhân sự theo tin học và ngoại ngữ - END

$all_month = [
    1 => 'Tháng 1',
    2 => 'Tháng 2',
    3 => 'Tháng 3',
    4 => 'Tháng 4',
    5 => 'Tháng 5',
    6 => 'Tháng 6',
    7 => 'Tháng 7',
    8 => 'Tháng 8',
    9 => 'Tháng 9',
    10 => 'Tháng 10',
    11 => 'Tháng 11',
    12 => 'Tháng 12'
];

$all_quy = [
    1 => 'Quý 1 (Tháng 1 - 3)',
    2 => 'Quý 2 (Tháng 4 - 6)',
    3 => 'Quý 3 (Tháng 7 - 9)',
    4 => 'Quý 4 (Tháng 10 - 12)',
];

foreach($all_month as $key => $month) {
    $xtpl -> assign('LISTMONTH', array(
        'key' => $key,
        'title' => $month,
    ));
    $xtpl->parse('main.list_month');
}

foreach($all_quy as $key => $quy) {
    $xtpl -> assign('LISTQUY', array(
        'key' => $key,
        'title' => $quy,
    ));
    $xtpl->parse('main.list_quy');
}

$key_huutri = $key_luong = $key_sinhnhat = 0;

foreach($all_nhansu as $huutri_nhansu) {

    if($huutri_nhansu['gioitinh'] == 0) {
        $huutri_nhansu['ngaydukien'] = strtotime("+6 month +64 year", $huutri_nhansu['ngaysinh']);
    }
    else {
        $huutri_nhansu['ngaydukien'] = strtotime("+6 month +59 year", $huutri_nhansu['ngaysinh']);
    }

    if(date('Y', $huutri_nhansu['ngaydukien']) == $current_year) {

        $key_huutri++;
        $xtpl->assign('STT', $key_huutri);

        $huutri_nhansu['chucdanh'] = get_info_chucdanh($huutri_nhansu['chucdanh_id'])['name_chucdanh'];
        $huutri_nhansu['phongban'] = get_info_phongban($huutri_nhansu['phongban_id'])['name_phongban'];

        
        $huutri_nhansu['gioitinh'] = $huutri_nhansu['gioitinh'] == 1 ? "Nữ" : "Nam";
        $huutri_nhansu['ngaysinh'] = date('d/m/Y', $huutri_nhansu['ngaysinh']);
        $huutri_nhansu['ngaydukien'] = date('d/m/Y', $huutri_nhansu['ngaydukien']);

        $xtpl->assign('LOOP_HUUTRI', $huutri_nhansu);
        $xtpl->parse('main.huutri_nhansu');
    }

}


for($i=3;$i<=18;$i=$i+3) {
    $day=($i-1)*31536000;
    foreach($all_nhansu as $luong_nhansu) {
        if($luong_nhansu['ngayhuong'] + $day >= $day_now_before && $luong_nhansu['ngayhuong'] + $day <= $day_now) {

            $key_luong++;
            $xtpl->assign('STT', $key_luong);

            $luong_nhansu['chucdanh'] = get_info_chucdanh($luong_nhansu['chucdanh_id'])['name_chucdanh'];
            $luong_nhansu['phongban'] = get_info_phongban($luong_nhansu['phongban_id'])['name_phongban'];

            $luong_nhansu['bacluong'] = get_info_bacluong($luong_nhansu['bacluong_id'])['name_bacluong'];
            $luong_nhansu['hesotang'] = get_info_heso($luong_nhansu['heso_id'])['name_heso'];
            
            $luong_nhansu['gioitinh'] = $luong_nhansu['gioitinh'] == 1 ? "Nữ" : "Nam";

            $luong_nhansu['ngaysinh'] = date('d/m/Y', $luong_nhansu['ngaysinh']);
            $luong_nhansu['ngaydukien'] = date('d/m/Y', $luong_nhansu['ngayhuong'] + $day);

            $xtpl->assign('LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=nhansu&static=1&year='.$i );
            $xtpl->assign('LOOP_LUONG', $luong_nhansu);
            $xtpl->parse('main.luong_nhansu');
        }
    }
}


foreach($all_nhansu as $birthday_nhansu) {
    if(date('m', $birthday_nhansu['ngaysinh']) == $current_month && date('d', $birthday_nhansu['ngaysinh']) > $current_day) {

        $date_birhday_nhansu = date('d', $birthday_nhansu['ngaysinh']);
        $month_birhday_nhansu = date('m', $birthday_nhansu['ngaysinh']);

        $key_sinhnhat++;
        $xtpl->assign('STT', $key_sinhnhat);

        $birthday_nhansu['chucdanh'] = get_info_chucdanh($birthday_nhansu['chucdanh_id'])['name_chucdanh'];
        $birthday_nhansu['phongban'] = get_info_phongban($birthday_nhansu['phongban_id'])['name_phongban'];
        $birthday_nhansu['ngaysinh'] = date('d/m/Y', $birthday_nhansu['ngaysinh']);

        if($date_birhday_nhansu == $current_day && $month_birhday_nhansu == $current_month) {
            $birthday_nhansu['birthday_today'] = '<img src="https://phuyen.moha.gov.vn/assets/images/icons/icon-banh-sinh-nhat-40x40.png">';
        }
        else {
            $countdown_day = $date_birhday_nhansu - $current_day;
            $birthday_nhansu['birthday_today'] = 'Còn '.$countdown_day.' ngày';
        }

        $xtpl->assign('LOOP_BIRTHDAY', $birthday_nhansu);
        $xtpl->parse('main.birthday_nhansu');

    }
}

$xtpl->assign('count_nhansu_sinhnhat', $key_sinhnhat);
$xtpl->assign('count_nhansu_huutri', $key_huutri);
$xtpl->assign('count_nhansu_luong', $key_luong);


for($i=3;$i<=18;$i=$i+3) {
    $day=($i-1)*31536000;
    $number=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where (ngayhuong+'.$day.') BETWEEN '.$day_now_before.' AND '.$day_now.' and status=1')->fetchColumn();
    if($number>0){
        $xtpl->assign('number_nhansu', number_format($number));
        $xtpl->assign('key', $i);
        $xtpl->assign('LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=nhansu&static=1&year='.$i );
        $xtpl->parse('main.loop');
    }
}
foreach ($loai_bien_che as $key => $value) {
    $value['number']=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_nhansu where bienche_id='.$value['id'].' and status=1')->fetchColumn();
    $value['number']=number_format($value['number']);

    $loaibienche = 'show_count_bien_che_'.$value['id'];

    $xtpl->assign('loaibienche', $loaibienche);
    $xtpl->assign('LOOP', $value);
    $xtpl->parse('main.loai_bien_che');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
