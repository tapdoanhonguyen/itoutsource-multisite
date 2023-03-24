<?php
if (! defined('NV_IS_MOD_SITE')) {
    die('Stop!!!');
}
$page_title = $module_info['custom_title'];
$popup=$nv_Request->get_int( 'popup', 'post,get', 0 );
$row=array();
$row['domain'] = '';
$row['domaintype'] = '';
$row['subdomain'] = '';
$row['cid'] = 1;
$row['username'] = '';
$row['password'] = '';
$row['repassword'] = '';
$row['StoreName'] = '';
$row['hovaten'] = '';
$row['email'] = '';
$row['sample'] = 'default';
if ( $nv_Request->isset_request( 'submit', 'post' ) )
{
    $row['cid'] = $nv_Request->get_int( 'cid', 'post', 1 );
    
    $row['domaintype'] = $nv_Request->get_title( 'domaintype', 'post', 'subdomain' );
    $row['subdomain'] = $nv_Request->get_title( 'domainsub', 'post', '' );
    $row['allowuserreg'] = $nv_Request->get_int( 'allowuserreg', 'post', 0 );
    $row['username'] = $nv_Request->get_title( 'username', 'post', '' );
    $row['password'] = $nv_Request->get_title( 'password', 'post', '' );
    $row['repassword'] = $nv_Request->get_title( 'repassword', 'post', '' );
    $row['StoreName'] = $nv_Request->get_title( 'StoreName', 'post', '' );
	$row['domain'] = change_alias($row['StoreName']);
	$row['domain'] .= '.'.$array_config['my_domains'];
    $row['hovaten'] = $nv_Request->get_title( 'hovaten', 'post', '' );
    $row['email'] = $nv_Request->get_title( 'email', 'post', '' );
    $row['sample'] = $nv_Request->get_title( 'sample', 'post', 'default' );
	$row['businesstypeid']=$nv_Request->get_int( 'businesstypeid', 'post', 0 );
	$row['idsite']=$nv_Request->get_int( 'idsite', 'post,get', 0 );
    $error=create_sub_website($row);
}
$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('ROW', $row);
$xtpl->assign('ACTION_URL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op);
if( ! empty( $error ) )
{
        $xtpl->assign( 'ERROR', implode( '<br />', $error ) );
        $xtpl->parse( 'main.error' );
}
if($row['domaintype']=="subdomain" )
{
	$xtpl->parse( 'main.subdomain' );
}
foreach( $array_domaintype as $key => $value )
{
	$xtpl->assign( 'DOMAINTYPE', array(
		'key' => $key,
		'title' => $value,
		'selected' => ($key == $row['domaintype']) ? ' selected="selected"' : ''
	) );
	$xtpl->parse( 'main.domaintype' );
}
foreach( $array_samples_data as $key => $value  )
{
	$value = substr(substr($value, 0, -4), 5);
	$xtpl->assign( 'SAMPLE', array(
		'key' => $value,
		'title' => $value,
		'selected' => ($value == $row['sample']) ? ' selected="selected"' : ''
	) );
	$xtpl->parse( 'main.select_sample' );
}
$_sql = 'SELECT cid,title FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_cat';
$_query = $db->query( $_sql );
while( $_row = $_query->fetch() )
{
    $xtpl->assign('cid',$_row['cid']);
    $xtpl->assign('title',$_row['title']);
    $xtpl->parse( 'main.cid' );
}

$xtpl->parse('main');
$contents=$xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo ($popup)?$contents:nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

