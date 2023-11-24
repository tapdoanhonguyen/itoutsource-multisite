<?php

function get_phongban_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_phongban where (name_phongban like '%".$q."%')")->fetchAll();
	return $list;
}
function get_tongiao_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_tongiao where (name_tongiao like '%".$q."%')")->fetchAll();
	return $list;
}
function get_chucdanh_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chucdanh where (name_chucdanh like '%".$q."%')")->fetchAll();
	return $list;
}
function get_maso_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_maso where (name_maso like '%".$q."%')")->fetchAll();
	return $list;
}
function get_bacluong_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_bacluong where (name_bacluong like '%".$q."%')")->fetchAll();
	return $list;
}
function get_heso_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_heso where (name_heso like '%".$q."%')")->fetchAll();
	return $list;
}
function get_chuyenmon_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chuyenmon where (name_chuyenmon like '%".$q."%')")->fetchAll();
	return $list;
}
function get_chinhtri_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chinhtri where (name_chinhtri like '%".$q."%')")->fetchAll();
	return $list;
}
function get_quanlygiaoduc_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_quanlygiaoduc where (name_quanlygiaoduc like '%".$q."%')")->fetchAll();
	return $list;
}
function get_ngoaingu_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_ngoaingu where (name_ngoaingu like '%".$q."%')")->fetchAll();
	return $list;
}
function get_tinhoc_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_tinhoc where (name_tinhoc like '%".$q."%')")->fetchAll();
	return $list;
}
function get_bienche_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_bienche where (name_bienche like '%".$q."%')")->fetchAll();
	return $list;
}

function get_chucvu_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chucvu where (name_chucvu like '%".$q."%')")->fetchAll();
	return $list;
}


function get_info_chucvu($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chucvu where id=".$q)->fetch();
	return $list;
}
function get_info_phongban($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_phongban where id=".$q)->fetch();
	return $list;
}

function get_info_tongiao($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_tongiao where id=".$q)->fetch();
	return $list;
}
function get_info_bienche($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_bienche where id=".$q)->fetch();
	return $list;
}
function get_info_chucdanh($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chucdanh where id=".$q)->fetch();
	return $list;
}
function get_info_maso($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_maso where id=".$q)->fetch();
	return $list;
}
function get_info_bacluong($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_bacluong where id=".$q)->fetch();
	return $list;
}
function get_info_heso($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_heso where id=".$q)->fetch();
	return $list;
}
function get_info_chuyenmon($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chuyenmon where id=".$q)->fetch();
	return $list;
}
function get_info_chinhtri($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_chinhtri where id=".$q)->fetch();
	return $list;
}
function get_info_quanlygiaoduc($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_quanlygiaoduc where id=".$q)->fetch();
	return $list;
}
function get_info_ngoaingu($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_ngoaingu where id=".$q)->fetch();
	return $list;
}
function get_info_tinhoc($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_tinhoc where id=".$q)->fetch();
	return $list;
}




function get_info_user($userid){
	global $db;
	$list=$db->query("SELECT * FROM " .NV_USERS_GLOBALTABLE . " where userid=".$userid)->fetch();
	return $list;
}
function ag_weekday($agtoday) {
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$weekday = date('l', $agtoday);

	$weekday = strtolower($weekday);
	switch($weekday) {
		case 'monday':
		$weekday = 2;
		break;
		case 'tuesday':
		$weekday = 3;
		break;
		case 'wednesday':
		$weekday = 4;
		break;
		case 'thursday':
		$weekday = 5;
		
		break;
		case 'friday':
		$weekday = 6;

		break;
		case 'saturday':
		$weekday = 7;

		break;
		default:
		$weekday = 8;

		break;
	}

	return $weekday;
}
$agtoday=	ag_weekday(NV_CURRENTTIME);

function nv_get_week_from_time($time)
{
	$week = 1;
	$year = date('Y', $time);
	$real_week = array($week, $year);
	$time_per_week = 86400 * 7;
	$time_start_year = mktime(0, 0, 0, 1, 1, $year);
	$time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));
	
	$addYear = true;
	$num_week_loop = nv_get_max_week_of_year($year) - 1;
	
	for ($i = 0; $i <= $num_week_loop; $i++) {
		$week_begin = $time_first_week + $i * $time_per_week;
		$week_next = $week_begin + $time_per_week;
		
		if ($week_begin <= $time and $week_next > $time) {
			$real_week[0] = $i + 1;
			$addYear = false;
			break;
		}
	}
	if ($addYear) {
		$real_week[1] = $real_week[1] + 1;
	}
	
	return $real_week;
}

/**
 * nv_get_max_week_of_year()
 * 
 * @param mixed $year
 * @return
 */
function nv_get_max_week_of_year($year)
{
	$time_per_week = 86400 * 7;
	$time_start_year = mktime(0, 0, 0, 1, 1, $year);
	$time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));
	
	if (date('Y', $time_first_week + ($time_per_week * 53) - 1) == $year) {
		return 53;
	} else {
		return 52;
	}
}

function so_ngay_trong_quy($year, $quarter)
{
	if($quarter == 1) {
		$time_start_quarter = '1-1-'.$year;
		$time_end_quarter = '31-3-'.$year;
	}
	if($quarter == 2) {
		$time_start_quarter = '1-4-'.$year;
		$time_end_quarter = '30-6-'.$year;
	}
	if($quarter == 3) {
		$time_start_quarter = '1-7-'.$year;
		$time_end_quarter = '30-9-'.$year;
	}
	if($quarter == 4) {
		$time_start_quarter = '1-10-'.$year;
		$time_end_quarter = '31-12-'.$year;
	}

	$distance_quarter = array(strtotime($time_start_quarter), strtotime($time_end_quarter));

	return $distance_quarter;
}
