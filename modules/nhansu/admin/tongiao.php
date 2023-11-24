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

// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT status FROM ' . $db_config['prefix'] . '_' . $module_data . '_tongiao WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['status']))     {
        $status = ($row['status']) ? 0 : 1;
        $query = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_tongiao SET status=' . intval($status) . ' WHERE id=' . $id;
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
        $db->query('DELETE FROM ' . $db_config['prefix'] . '_' . $module_data . '_tongiao  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete tongiao', 'ID: ' . $id, $admin_info['userid']);
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
$parent_id = $nv_Request->get_title( 'parent_id', 'post,get', 0);

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
    $where .= ' AND (name_tongiao LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}

$per_page = 20;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_tongiao')
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


$xtpl = new XTemplate('tongiao.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$xtpl->assign( 'tongiao_add', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=tongiao_add');
if ( $ngay_tu > 0 )
    $xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
if ( $ngay_den > 0 )
    $xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );

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
    $view['time_add']=date('d-m-Y H:i',$view['time_add']);
    $view['user_add']=get_info_user($view['user_add'])['username'];
    if($view['user_edit']!=''){
        $view['user_edit']=get_info_user($view['user_edit'])['username'];
        $view['time_edit']=date('d-m-Y H:i',$view['time_edit']);
    }else{
        $view['time_edit']=$lang_module['not_update'];
        $view['user_edit']=$lang_module['not_update'];
    }
    $view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=tongiao_add&amp;id=' . $view['id'];
    $view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
    $xtpl->assign('VIEW', $view);
    $xtpl->parse('main.loop');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['tongiao'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
