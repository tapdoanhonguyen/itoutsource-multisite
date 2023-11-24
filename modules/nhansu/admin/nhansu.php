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

$mod = $nv_Request->get_string( 'mod', 'get,post', '' );
$array_gioitinh = array();
$array_gioitinh[0] = 'Nam';
$array_gioitinh[1] = 'Nữ';

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
if($mod=='is_download'){
    $page_title = 'DANH SÁCH NHÂN SỰ';
    $Excel_Cell_Begin = 1; 
    require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';
    $spreadsheet = PHPExcel_IOFactory::load(NV_ROOTDIR . '/modules/' . $module_file . '/template_excel/nhansu.xlsx');
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setTitle( $page_title );
    $worksheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
    $worksheet->getPageSetup()->setPaperSize( PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4 );
    $worksheet->getPageSetup()->setHorizontalCentered( true );
    $spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd( 1, $Excel_Cell_Begin );
    $pRow = $Excel_Cell_Begin;
    $dataContent = array();



    $where = '';
    $base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    $q = $nv_Request->get_title( 'q', 'post,get' );
    $sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
    $ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
    $ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
    $status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
    $chucvu_id = $nv_Request->get_title( 'chucvu_id', 'post,get', 0);
    $phongban_id = $nv_Request->get_title( 'phongban_id', 'post,get', 0);
    $tongiao_id = $nv_Request->get_title( 'tongiao_id', 'post,get', 0);
    $chucdanh_id = $nv_Request->get_title( 'chucdanh_id', 'post,get', 0);
    $maso_id = $nv_Request->get_title( 'maso_id', 'post,get', 0);
    $bacluong_id = $nv_Request->get_title( 'bacluong_id', 'post,get', 0);
    $heso_id = $nv_Request->get_title( 'heso_id', 'post,get', 0);
    $chuyenmon_id = $nv_Request->get_title( 'chuyenmon_id', 'post,get', 0);
    $chinhtri_id = $nv_Request->get_title( 'chinhtri_id', 'post,get', 0);
    $quanlygiaoduc_id = $nv_Request->get_title( 'quanlygiaoduc_id', 'post,get', 0);
    $ngoaingu_id = $nv_Request->get_title( 'ngoaingu_id', 'post,get', 0);
    $chungchi_ngoaingu = $nv_Request->get_title( 'chungchi_ngoaingu', 'post,get', 0);
    $tinhoc_id = $nv_Request->get_title( 'tinhoc_id', 'post,get', 0);
    $bienche_id = $nv_Request->get_title( 'bienche_id', 'post,get', 0);
    $static = $nv_Request->get_title( 'static', 'post,get', 0);
    $year = $nv_Request->get_title( 'year', 'post,get', 0);


    if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
    {
        $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
        $_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
        $ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
    } else {
        $ngay_tu = 0;
    }

    if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
    {
        $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
        $_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
        $ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
    } else {
        $ngay_den = 0;
    }

    if ( $sea_flast != 9 ) {
        if ( $ngay_tu > 0 and $ngay_den > 0 )
        {

            $where .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
            $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
        } else if ( $ngay_tu > 0 )
        {
            $where .= ' AND time_add >= '. $ngay_tu;
            $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
        } else if ( $ngay_den > 0 )
        {
            $where .= ' AND time_add <= '. $ngay_den;
            $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
        }

    }
    if ( $status_ft>-1 ) {
        $where .= ' AND status ='.$status_ft;
        $base_url .= '&status_search=' . $status_ft;
    }
    if ( !empty( $q ) ) {
        $where .= ' AND (hotenlot LIKE "%" "'.$q. '" "%" OR ten LIKE "%" "'.$q. '" "%" OR code LIKE "%" "'.$q. '" "%")';
        $base_url .= '&q=' . $q;
    }

    if($chucvu_id>0){
        $where .= ' AND chucvu_id ='.$chucvu_id;
        $base_url .= '&chucvu_id=' . $chucvu_id;
    }

    if($phongban_id>0){
        $where .= ' AND phongban_id ='.$phongban_id;
        $base_url .= '&phongban_id=' . $phongban_id;
    }

    if($tongiao_id>0){
        $where .= ' AND tongiao_id ='.$tongiao_id;
        $base_url .= '&tongiao_id=' . $tongiao_id;
    }

    if($chucdanh_id>0){
        $where .= ' AND chucdanh_id ='.$chucdanh_id;
        $base_url .= '&chucdanh_id=' . $chucdanh_id;
    }

    if($maso_id>0){
        $where .= ' AND maso_id ='.$maso_id;
        $base_url .= '&maso_id=' . $maso_id;
    }
    if($bacluong_id>0){
        $where .= ' AND bacluong_id ='.$bacluong_id;
        $base_url .= '&bacluong_id=' . $bacluong_id;
    }
    if($heso_id>0){
        $where .= ' AND heso_id ='.$heso_id;
        $base_url .= '&heso_id=' . $heso_id;
    }
    if($chuyenmon_id>0){
        $where .= ' AND chuyenmon_id ='.$chuyenmon_id;
        $base_url .= '&chuyenmon_id=' . $chuyenmon_id;
    }
    if($chinhtri_id>0){
        $where .= ' AND chinhtri_id ='.$chinhtri_id;
        $base_url .= '&chinhtri_id=' . $chinhtri_id;
    }
    if($quanlygiaoduc_id>0){
        $where .= ' AND quanlygiaoduc_id ='.$quanlygiaoduc_id;
        $base_url .= '&quanlygiaoduc_id=' . $quanlygiaoduc_id;
    }
    if($ngoaingu_id>0){
        $where .= ' AND ngoaingu_id ='.$ngoaingu_id;
        $base_url .= '&ngoaingu_id=' . $ngoaingu_id;
    }
    if($chungchi_ngoaingu>0){
        $where .= ' AND chungchi_ngoaingu ='.$chungchi_ngoaingu;
        $base_url .= '&chungchi_ngoaingu=' . $chungchi_ngoaingu;
    }
    if($tinhoc_id>0){
        $where .= ' AND tinhoc_id ='.$tinhoc_id;
        $base_url .= '&tinhoc_id=' . $tinhoc_id;
    }
    if($bienche_id>0){
        $where .= ' AND bienche_id ='.$bienche_id;
        $base_url .= '&bienche_id=' . $bienche_id;
    }
    if($static==1){
        $day_now = strtotime(date('d-m-Y',NV_CURRENTTIME ));
        $day_now_before=strtotime('-5 days',$day_now);
        $day=($year-1)*31536000;
        $where .= ' AND (ngayhuong+'.$day.') BETWEEN '.$day_now_before.' AND '.$day_now;
        $base_url .= '&static=' . $static.'&year='.$year;
    }
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
    ->select('COUNT(*)')
    ->from('' . $db_config['prefix'] .'_' . $module_data . '_nhansu')
    ->where('1=1'.$where);
    $sth = $db->prepare($db->sql());

    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
    ->order('id DESC');
    $sth = $db->prepare($db->sql());

    $sth->execute();

    $stt = 1;
    while ($view = $sth->fetch()) {
        $data_aray['stt']=$stt;
        $stt++;
        $data_aray['code']=$view['code'];
        $data_aray['hoten_lot']=$view['hoten_lot'];
        $data_aray['ten']=$view['ten'];
        $data_aray['gioitinh'] = $array_gioitinh[$view['gioitinh']];
        $data_aray['ngaysinh'] = (empty($view['ngaysinh'])) ? '' : nv_date('d/m/Y', $view['ngaysinh']);
        $data_aray['chucvu_id']=get_info_chucvu($view['chucvu_id'])['name_chucvu'];
        $data_aray['phongban_id']=get_info_phongban($view['phongban_id'])['name_phongban'];
        $data_aray['noisinh']=$view['noisinh'];
        $data_aray['quequan']=$view['quequan'];
        $data_aray['tongiao_id']=get_info_tongiao($view['tongiao_id'])['name_tongiao'];
        $data_aray['diachihiennay']=$view['diachihiennay'];
        $data_aray['ngaytuyendung'] = (empty($view['ngaytuyendung'])) ? '' : nv_date('d/m/Y', $view['ngaytuyendung']);
        $data_aray['chucdanhkiemnhiem']=$view['chucdanhkiemnhiem'];
        $data_aray['chucdanh_id']=get_info_chucdanh($view['chucdanh_id'])['name_chucdanh'];
        $data_aray['maso_id']=get_info_maso($view['maso_id'])['name_maso'];
        $data_aray['bacluong_id']=get_info_bacluong($view['bacluong_id'])['name_bacluong'];
        $data_aray['heso_id']=get_info_heso($view['heso_id'])['name_heso'];
        $data_aray['ngayhuong'] = (empty($view['ngayhuong'])) ? '' : nv_date('d/m/Y', $view['ngayhuong']);
        $data_aray['phucapchucvu']=$view['phucapchucvu'];
        $data_aray['phucapkhac']=$view['phucapkhac'];
        $data_aray['chuyenmon_id']=get_info_chuyenmon($view['chuyenmon_id'])['name_chuyenmon'];
        $data_aray['chinhtri_id']=get_info_chinhtri($view['chinhtri_id'])['name_chinhtri'];
        $data_aray['quanlygiaoduc_id']=get_info_quanlygiaoduc($view['quanlygiaoduc_id'])['name_quanlygiaoduc'];
        $data_aray['chungchi_ngoaingu']=get_info_ngoaingu($view['chungchi_ngoaingu'])['name_ngoaingu'];
        $data_aray['tinhoc_id']=get_info_tinhoc($view['tinhoc_id'])['name_tinhoc'];
        $data_aray['chungchi_khac']=$view['chungchi_khac'];
        $data_aray['ngayvaodang'] = (empty($view['ngayvaodang'])) ? '' : nv_date('d/m/Y', $view['ngayvaodang']);
        $data_aray['ngayvaochinhthuc'] = (empty($view['ngayvaochinhthuc'])) ? '' : nv_date('d/m/Y', $view['ngayvaochinhthuc']);
        $data_aray['cmnd']=$view['cmnd'];
        $data_aray['ngaycap'] = (empty($view['ngaycap'])) ? '' : nv_date('d/m/Y', $view['ngaycap']);
        $data_aray['noicap']=$view['noicap'];
        $data_aray['bhxh']=$view['bhxh'];
        $data_aray['bhyt']=$view['bhyt'];
        $data_aray['didong']=$view['didong'];
        $data_aray['dienthoai_nha']=$view['dienthoai_nha'];
        $data_aray['dienthoai_coquan']=$view['dienthoai_coquan'];
        $data_aray['bienche_id']=get_info_bienche($view['bienche_id'])['name_bienche'];
        $data_aray['ngayvao_bienche'] = (empty($view['ngayvao_bienche'])) ? '' : nv_date('d/m/Y', $view['ngayvao_bienche']);
        $view['quytrinhcongtac'] = nv_htmlspecialchars(nv_editor_br2nl($view['quytrinhcongtac']));
        $data_aray['quytrinhcongtac']=$view['quytrinhcongtac'];
        $data_aray['ngaynhanviec'] = (empty($view['ngaynhanviec'])) ? '' : nv_date('d/m/Y', $view['ngaynhanviec']);
        $data_aray['ngaythoiviec'] = (empty($view['ngaythoiviec'])) ? '' : nv_date('d/m/Y', $view['ngaythoiviec']);
        $data_aray['thoigiancongtac']=$view['thoigiancongtac'];
        $data_aray['huutri']=$view['huutri'];
        $data_aray['thucnghi']=$view['thucnghi'];
        if($view['lylich']==1){
            $data_aray['lylich']='x';
        }else{
            $data_aray['lylich']='';
        }
        $dataContent[]=$data_aray;
    }

    if(count($dataContent)>0){
        $worksheet->fromArray($dataContent, null, 'A4');
        $file_name = 'danh_sach_nhan_su.xlsx';
        $file_path = NV_ROOTDIR . '/' . NV_TEMP_DIR . '/' . $file_name;
        header( 'Content-Type: application/vnd.ms-excel' );
        header( 'Content-Disposition: attachment;filename="'. $file_name .'"' );
        header( 'Cache-Control: max-age=0' );

        $writer = PHPExcel_IOFactory::createWriter($spreadsheet, 'Excel2007');
        $writer->save($file_path);
        $link = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '='.$op.'&mod=download&file_name=' . $file_name;  

        nv_jsonOutput( array('link'=> $link) );     
    }else{
        nv_jsonOutput( array('error'=> 'Không tồn tại dữ liệu nào theo dữ liệu bạn chọn') );     
    }
}



// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT status FROM ' . $db_config['prefix'] . '_' . $module_data . '_nhansu WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['status']))     {
        $status = ($row['status']) ? 0 : 1;
        $query = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_nhansu SET status=' . intval($status) . ' WHERE id=' . $id;
        $db->query($query);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}

if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $db->query('DELETE FROM ' . $db_config['prefix'] . '_' . $module_data . '_nhansu  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Nhansu', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}


$where = '';
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$q = $nv_Request->get_title( 'q', 'post,get' );
$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );
$chucvu_id = $nv_Request->get_title( 'chucvu_id', 'post,get', 0);
$phongban_id = $nv_Request->get_title( 'phongban_id', 'post,get', 0);
$tongiao_id = $nv_Request->get_title( 'tongiao_id', 'post,get', 0);
$chucdanh_id = $nv_Request->get_title( 'chucdanh_id', 'post,get', 0);
$maso_id = $nv_Request->get_title( 'maso_id', 'post,get', 0);
$bacluong_id = $nv_Request->get_title( 'bacluong_id', 'post,get', 0);
$heso_id = $nv_Request->get_title( 'heso_id', 'post,get', 0);
$chuyenmon_id = $nv_Request->get_title( 'chuyenmon_id', 'post,get', 0);
$chinhtri_id = $nv_Request->get_title( 'chinhtri_id', 'post,get', 0);
$quanlygiaoduc_id = $nv_Request->get_title( 'quanlygiaoduc_id', 'post,get', 0);
$ngoaingu_id = $nv_Request->get_title( 'ngoaingu_id', 'post,get', 0);
$chungchi_ngoaingu = $nv_Request->get_title( 'chungchi_ngoaingu', 'post,get', 0);
$tinhoc_id = $nv_Request->get_title( 'tinhoc_id', 'post,get', 0);
$bienche_id = $nv_Request->get_title( 'bienche_id', 'post,get', 0);
$static = $nv_Request->get_title( 'static', 'post,get', 0);
$year = $nv_Request->get_title( 'year', 'post,get', 0);


if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
{
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
    $ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_tu = 0;
}

if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
{
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
    $ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_den = 0;
}

if ( $sea_flast != 9 ) {
    if ( $ngay_tu > 0 and $ngay_den > 0 )
    {

        $where .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_tu > 0 )
    {
        $where .= ' AND time_add >= '. $ngay_tu;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_den > 0 )
    {
        $where .= ' AND time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    }

}
if ( $status_ft>-1 ) {
    $where .= ' AND status ='.$status_ft;
    $base_url .= '&status_search=' . $status_ft;
}
if ( !empty( $q ) ) {
    $where .= ' AND (hotenlot LIKE "%" "'.$q. '" "%" OR ten LIKE "%" "'.$q. '" "%" OR code LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}

if($chucvu_id>0){
    $where .= ' AND chucvu_id ='.$chucvu_id;
    $base_url .= '&chucvu_id=' . $chucvu_id;
}

if($phongban_id>0){
    $where .= ' AND phongban_id ='.$phongban_id;
    $base_url .= '&phongban_id=' . $phongban_id;
}

if($tongiao_id>0){
    $where .= ' AND tongiao_id ='.$tongiao_id;
    $base_url .= '&tongiao_id=' . $tongiao_id;
}

if($chucdanh_id>0){
    $where .= ' AND chucdanh_id ='.$chucdanh_id;
    $base_url .= '&chucdanh_id=' . $chucdanh_id;
}

if($maso_id>0){
    $where .= ' AND maso_id ='.$maso_id;
    $base_url .= '&maso_id=' . $maso_id;
}
if($bacluong_id>0){
    $where .= ' AND bacluong_id ='.$bacluong_id;
    $base_url .= '&bacluong_id=' . $bacluong_id;
}
if($heso_id>0){
    $where .= ' AND heso_id ='.$heso_id;
    $base_url .= '&heso_id=' . $heso_id;
}
if($chuyenmon_id>0){
    $where .= ' AND chuyenmon_id ='.$chuyenmon_id;
    $base_url .= '&chuyenmon_id=' . $chuyenmon_id;
}
if($chinhtri_id>0){
    $where .= ' AND chinhtri_id ='.$chinhtri_id;
    $base_url .= '&chinhtri_id=' . $chinhtri_id;
}
if($quanlygiaoduc_id>0){
    $where .= ' AND quanlygiaoduc_id ='.$quanlygiaoduc_id;
    $base_url .= '&quanlygiaoduc_id=' . $quanlygiaoduc_id;
}
if($ngoaingu_id>0){
    $where .= ' AND ngoaingu_id ='.$ngoaingu_id;
    $base_url .= '&ngoaingu_id=' . $ngoaingu_id;
}
if($chungchi_ngoaingu>0){
    $where .= ' AND chungchi_ngoaingu ='.$chungchi_ngoaingu;
    $base_url .= '&chungchi_ngoaingu=' . $chungchi_ngoaingu;
}
if($tinhoc_id>0){
    $where .= ' AND tinhoc_id ='.$tinhoc_id;
    $base_url .= '&tinhoc_id=' . $tinhoc_id;
}
if($bienche_id>0){
    $where .= ' AND bienche_id ='.$bienche_id;
    $base_url .= '&bienche_id=' . $bienche_id;
}
if($static==1){
    $day_now = strtotime(date('d-m-Y',NV_CURRENTTIME ));
    $day_now_before=strtotime('-5 days',$day_now);
    $day=($year-1)*31536000;
    $where .= ' AND (ngayhuong+'.$day.') BETWEEN '.$day_now_before.' AND '.$day_now;
    $base_url .= '&static=' . $static.'&year='.$year;
}
$per_page = 20;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_nhansu')
->where('1=1'.$where);
$sth = $db->prepare($db->sql());


$sth->execute();
$num_items = $sth->fetchColumn();

$db->select('*')
->order('id DESC')
->limit($per_page)
->offset(($page - 1) * $per_page);
$sth = $db->prepare($db->sql());


$sth->execute();


$xtpl = new XTemplate('nhansu.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$xtpl->assign('Q', $q);
$xtpl->assign('static', $static);
$xtpl->assign('year', $year);

$xtpl->assign( 'nhansu_add', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=nhansu_add');
if ( $ngay_tu > 0 )
    $xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
if ( $ngay_den > 0 )
    $xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );
$xtpl->assign('chucvu_id', $chucvu_id);
if($chucvu_id>0){
    $xtpl->assign('chucvu_name', get_info_chucvu($chucvu_id)['name_chucvu']);
}else{
    $xtpl->assign('chucvu_name', 'Tất cả chức vụ');
}
$xtpl->assign('phongban_id', $phongban_id);
if($phongban_id>0){
    $xtpl->assign('phongban_name', get_info_phongban($phongban_id)['name_phongban']);
}else{
    $xtpl->assign('phongban_name', 'Tất cả phòng ban');
}
$xtpl->assign('tongiao_id', $tongiao_id);
if($tongiao_id>0){
    $xtpl->assign('tongiao_name', get_info_tongiao($tongiao_id)['name_tongiao']);
}else{
    $xtpl->assign('tongiao_name', 'Tất cả tôn giáo');
}
$xtpl->assign('chucdanh_id', $chucdanh_id);
if($chucdanh_id>0){
    $xtpl->assign('chucdanh_name', get_info_chucdanh($chucdanh_id)['name_chucdanh']);
}else{
    $xtpl->assign('chucdanh_name', 'Tất cả chức danh');
}
$xtpl->assign('maso_id', $maso_id);

if($maso_id>0){
    $xtpl->assign('maso_name', get_info_maso($maso_id)['name_maso']);
}else{
    $xtpl->assign('maso_name', 'Tất cả mã số');
}

$xtpl->assign('bacluong_id', $bacluong_id);

if($bacluong_id>0){
    $xtpl->assign('bacluong_name', get_info_bacluong($bacluong_id)['name_bacluong']);
}else{
    $xtpl->assign('bacluong_name', 'Tất cả bậc lương');
}

$xtpl->assign('heso_id', $heso_id);

if($heso_id>0){
    $xtpl->assign('heso_name', get_info_heso($heso_id)['name_heso']);
}else{
    $xtpl->assign('heso_name', 'Tất cả hệ số');
}

$xtpl->assign('chuyenmon_id', $chuyenmon_id);

if($chuyenmon_id>0){
    $xtpl->assign('chuyenmon_name', get_info_chuyenmon($chuyenmon_id)['name_chuyenmon']);
}else{
    $xtpl->assign('chuyenmon_name', 'Tất cả chuyên môn');
}

$xtpl->assign('chinhtri_id', $chinhtri_id);

if($chinhtri_id>0){
    $xtpl->assign('chinhtri_name', get_info_chinhtri($chinhtri_id)['name_chinhtri']);
}else{
    $xtpl->assign('chinhtri_name', 'Tất cả chính trị');
}

$xtpl->assign('quanlygiaoduc_id', $quanlygiaoduc_id);

if($quanlygiaoduc_id>0){
    $xtpl->assign('quanlygiaoduc_name', get_info_quanlygiaoduc($quanlygiaoduc_id)['name_quanlygiaoduc']);
}else{
    $xtpl->assign('quanlygiaoduc_name', 'Tất cả');
}

$xtpl->assign('ngoaingu_id', $ngoaingu_id);

if($ngoaingu_id>0){
    $xtpl->assign('ngoaingu_name', get_info_ngoaingu($ngoaingu_id)['name_ngoaingu']);
}else{
    $xtpl->assign('ngoaingu_name', 'Tất cả');
}

$xtpl->assign('chungchi_ngoaingu', $chungchi_ngoaingu);

if($chungchi_ngoaingu>0){
    $xtpl->assign('chungchi_ngoaingu_name', get_info_ngoaingu($chungchi_ngoaingu)['name_ngoaingu']);
}else{
    $xtpl->assign('chungchi_ngoaingu_name', 'Tất cả');
}

$xtpl->assign('tinhoc_id', $tinhoc_id);

if($tinhoc_id>0){
    $xtpl->assign('tinhoc_name', get_info_tinhoc($tinhoc_id)['name_tinhoc']);
}else{
    $xtpl->assign('tinhoc_name', 'Tất cả');
}
$xtpl->assign('bienche_id', $bienche_id);

if($bienche_id>0){
    $xtpl->assign('bienche_name', get_info_bienche($bienche_id)['name_bienche']);
}else{
    $xtpl->assign('bienche_name', 'Tất cả');
}


$generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
if (!empty($generate_page)) {
    $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
    $xtpl->parse('main.generate_page');
}
$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
$real_week = nv_get_week_from_time( NV_CURRENTTIME );
$week = $real_week[0];
$year = $real_week[1];
$this_year = $real_week[1];
$time_per_week = 86400 * 7;
$time_start_year = mktime( 0, 0, 0, 1, 1, $year );
$time_first_week = $time_start_year - ( 86400 * ( date( 'N', $time_start_year ) - 1 ) );

$tuannay = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week + $time_per_week - 1 ),
);
$tuantruoc = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week + $time_per_week - 2 ),
);
$tuankia = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week + $time_per_week - 3 ),
);

$thangnay = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of this month' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of this month' ) ),
);
$thangtruoc = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of last month' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of last month' ) ),
);
$namnay = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of january this year' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of december this year' ) ),
);
$namtruoc = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of january last year' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of december last year' ) ),
);
$xtpl->assign( 'TUANNAY', $tuannay );

$xtpl->assign( 'TUANTRUOC', $tuantruoc );

$xtpl->assign( 'TUANKIA', $tuankia );

$xtpl->assign( 'HOMNAY', date( 'd-m-Y', NV_CURRENTTIME ) );
$xtpl->assign( 'HOMQUA', date( 'd-m-Y', strtotime( 'yesterday' ) ) );
$xtpl->assign( 'THANGNAY', $thangnay );

$xtpl->assign( 'THANGTRUOC', $thangtruoc );

$xtpl->assign( 'NAMNAY', $namnay );

$xtpl->assign( 'NAMTRUOC', $namtruoc );

if ( $sea_flast == '1' ) {
    $xtpl->assign( 'SELECT1', 'selected="selected"' );
}
if ( $sea_flast == '2' ) {
    $xtpl->assign( 'SELECT2', 'selected="selected"' );
}
if ( $sea_flast == '3' ) {
    $xtpl->assign( 'SELECT3', 'selected="selected"' );
}
if ( $sea_flast == '4' ) {
    $xtpl->assign( 'SELECT4', 'selected="selected"' );
}
if ( $sea_flast == '5' ) {
    $xtpl->assign( 'SELECT5', 'selected="selected"' );
}
if ( $sea_flast == '6' ) {
    $xtpl->assign( 'SELECT6', 'selected="selected"' );
}
if ( $sea_flast == '7' ) {
    $xtpl->assign( 'SELECT7', 'selected="selected"' );
}
if ( $sea_flast == '8' ) {
    $xtpl->assign( 'SELECT8', 'selected="selected"' );
}
if ( $sea_flast == '9' ) {
    $xtpl->assign( 'SELECT9', 'selected="selected"' );
}
$status_filt = array();
$status_filt[] = array( 'id'=>-1, 'text'=>$lang_module['status_1']);
$status_filt[] = array( 'id'=>0, 'text'=>$lang_module['status_2']);
$status_filt[] = array( 'id'=>1, 'text'=>$lang_module['status_3']);
$status_filt[] = array( 'id'=>2, 'text'=>'Đã xóa');

foreach ( $status_filt as $filt_stt ) {
    if ( $filt_stt['id'] == $status_ft ) {
        $filt_stt['selected'] = 'selected';
    }
    $xtpl->assign( 'status_filt', $filt_stt );
    $xtpl->parse( 'main.status_filt' );
}
while ($view = $sth->fetch()) {
    $view['number'] = $number++;
    $xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
    $view['ngaysinh'] = (empty($view['ngaysinh'])) ? '' : nv_date('d/m/Y', $view['ngaysinh']);
    $view['ngaytuyendung'] = (empty($view['ngaytuyendung'])) ? '' : nv_date('d/m/Y', $view['ngaytuyendung']);
    $view['ngayhuong'] = (empty($view['ngayhuong'])) ? '' : nv_date('d/m/Y', $view['ngayhuong']);
    $view['ngayvaodang'] = (empty($view['ngayvaodang'])) ? '' : nv_date('d/m/Y', $view['ngayvaodang']);
    $view['ngayvaochinhthuc'] = (empty($view['ngayvaochinhthuc'])) ? '' : nv_date('d/m/Y', $view['ngayvaochinhthuc']);
    $view['ngaycap'] = (empty($view['ngaycap'])) ? '' : nv_date('d/m/Y', $view['ngaycap']);
    $view['ngayvao_bienche'] = (empty($view['ngayvao_bienche'])) ? '' : nv_date('d/m/Y', $view['ngayvao_bienche']);
    $view['ngaynhanviec'] = (empty($view['ngaynhanviec'])) ? '' : nv_date('d/m/Y', $view['ngaynhanviec']);
    $view['ngaythoiviec'] = (empty($view['ngaythoiviec'])) ? '' : nv_date('d/m/Y', $view['ngaythoiviec']);
    $view['gioitinh'] = $array_gioitinh[$view['gioitinh']];
    $view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=nhansu_add&amp;id=' . $view['id'];
    $view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
    $view['time_add']=date('d-m-Y H:i',$view['time_add']);
    $view['user_add']=get_info_user($view['user_add'])['username'];
    if($view['user_edit']!=''){
        $view['user_edit']=get_info_user($view['user_edit'])['username'];
        $view['time_edit']=date('d-m-Y H:i',$view['time_edit']);
    }else{
        $view['time_edit']=$lang_module['not_update'];
        $view['user_edit']=$lang_module['not_update'];
    }
    $view['chucvu_id']=get_info_chucvu($view['chucvu_id'])['name_chucvu'];
    $view['phongban_id']=get_info_phongban($view['phongban_id'])['name_phongban'];
    $view['tongiao_id']=get_info_tongiao($view['tongiao_id'])['name_tongiao'];
    $view['bienche_id']=get_info_bienche($view['bienche_id'])['name_bienche'];
    $view['chucdanh_id']=get_info_chucdanh($view['chucdanh_id'])['name_chucdanh'];
    $view['maso_id']=get_info_maso($view['maso_id'])['name_maso'];
    $view['bacluong_id']=get_info_bacluong($view['bacluong_id'])['name_bacluong'];
    $view['heso_id']=get_info_heso($view['heso_id'])['name_heso'];
    $view['chuyenmon_id']=get_info_chuyenmon($view['chuyenmon_id'])['name_chuyenmon'];
    $view['chinhtri_id']=get_info_chinhtri($view['chinhtri_id'])['name_chinhtri'];
    $view['quanlygiaoduc_id']=get_info_quanlygiaoduc($view['quanlygiaoduc_id'])['name_quanlygiaoduc'];
    $view['chungchi_ngoaingu']=get_info_ngoaingu($view['chungchi_ngoaingu'])['name_ngoaingu'];
    $view['tinhoc_id']=get_info_tinhoc($view['tinhoc_id'])['name_tinhoc'];
    $xtpl->assign('VIEW', $view);
    if($view['lylich']==1){
        $xtpl->parse('main.loop.checked');
    }
    $xtpl->parse('main.loop');
}



$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['nhansu'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
