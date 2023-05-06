<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2023 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_MOD_TIMEKEEPER'))
    die('Stop!!!');

$row = array();
$error = array();
$row['id'] = 1;

$array_userid_users = array();
$array_userid = array();
$_sql = 'SELECT * FROM nv4_users as u  left join nv4_users_groups_users as gu on u.userid = gu.userid where gu.group_id = ' . $module_config[$module_name]['employer_group'];
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_userid_users[$_row['userid']] = $_row;
	$array_userid[] = $_row['userid']; 
}

$array_type_login[0] = 'Đăng Nhập';
$array_type_login[1] = 'Đăng Xuất';

$q = $nv_Request->get_title('q', 'post,get');

// Fetch Limit
$show_view = false;

    $show_view = true;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('*')
        ->from('' . NV_PREFIXLANG . '_' . $module_data . '')
		->order('userid ASC');

        $db->where('userid IN ( :q_userid )');

            
    $sth = $db->prepare($db->sql());

        $sth->bindValue(':q_userid', implode(",", $array_userid));
    $sth->execute();


$xtpl = new XTemplate('detail.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);

$xtpl->assign('Q', $q);

if ($show_view) {
    $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    if (!empty($q)) {
        $base_url .= '&q=' . $q;
    }
		$array_view = array();
        while ($view = $sth->fetch()) {
			$date = date("d-m-Y",$view['date_login']);
			$array_view[$view['userid']][$date][] = $view;
		}
		foreach($array_view as $uname => $array_uname_day){
			$xtpl->assign('USERNAME', $array_userid_users[$uname]['username']);
			foreach($array_uname_day as $udate => $views){
				$array_timekeeper = array();
				foreach($views as $key => $view){
					$array_timekeeper['date'] = $udate;
					$array_timekeeper['time_login_1'] = $views[0]['time_login'];
					$array_timekeeper['time_logout_1'] = $views[1]['time_login'];
					$array_timekeeper['time_login_2'] = $views[2]['time_login'];
					$array_timekeeper['time_logout_2'] = $views[3]['time_login'];
					$date_array = explode("-", $udate);
					
					$date1 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $module_config[$module_name]['timelinein1']. ":00";
					$date2 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $views[0]['time_login'];
					$diff = abs(strtotime($date2) - strtotime($date1));
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
					$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
					$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
					$time_late_1 = $hours." giờ, ".$minutes." phút";
					
					$date1 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $module_config[$module_name]['timelinein2']. ":00";
					$date2 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $views[2]['time_login'];
					$diff = abs(strtotime($date2) - strtotime($date1));
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
					$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
					$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
					$time_late_2 = $hours." giờ, ".$minutes." phút";
					
					$date1 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $views[1]['time_login'];
					$date2 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $module_config[$module_name]['timelineout1'] . ":00";
					$diff = abs(strtotime($date2) - strtotime($date1));
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
					$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));	
					$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
					$time_soon_1 = $hours." giờ, ".$minutes." phút";
					
					$date1 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $views[3]['time_login'];
					$date2 = $date_array[2] . "-" . $date_array[1] . "-" . $date_array[0] ." " .  $module_config[$module_name]['timelineout2'] . ":00";
					$diff = abs(strtotime($date2) - strtotime($date1));
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
					$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
					$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
					$time_soon_2 = $hours." giờ, " . $minutes." phút";
					
					$array_timekeeper['time_late_1'] = $time_late_1;
					$array_timekeeper['time_late_2'] = $time_late_2;
					$array_timekeeper['time_soon_1'] = $time_soon_1;
					$array_timekeeper['time_soon_2'] = $time_soon_2;
				}
				$xtpl->assign('DATE', $udate);
				$xtpl->assign('TIME', $array_timekeeper);
				$xtpl->parse('main.view.loop.date');
			}
			$xtpl->parse('main.view.loop');
		}
			
    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['timekeeper'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
