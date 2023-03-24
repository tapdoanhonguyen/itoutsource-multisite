<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2016 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 14 Nov 2016 07:52:12 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$contents='';
if ( defined( 'NV_IS_ADMIN' ) ) {
	$error = array();
        $row=array();
        $row['cid'] = $nv_Request->get_int( 'cid', 'post', 1 );
        $row['domain'] = $nv_Request->get_title( 'domain', 'post', '' );
        $row['allowuserreg'] = $nv_Request->get_int( 'allowuserreg', 'post', 0 );
        $row['username'] = $nv_Request->get_title( 'username', 'post', '' );
        $row['password'] = $nv_Request->get_title( 'password', 'post', '' );
        $row['repassword'] = $nv_Request->get_title( 'repassword', 'post', '' );
        $row['StoreName'] = $nv_Request->get_title( 'domain', 'post', '' );
        $row['hovaten'] = $nv_Request->get_title( 'hovaten', 'post', '' );
        $row['email'] = $nv_Request->get_title( 'email', 'post', '' );
        $row['idsite']=$nv_Request->get_int( 'idsite', 'post,get', 0 );
        $row['businesstypeid']=$nv_Request->get_int( 'businesstypeid', 'post', 0 );
        $row['sample']=$nv_Request->get_title( 'sample', 'post', 'default' );
        $row['domaintype']=$nv_Request->get_title( 'domaintype', 'post', 'subdomain' );
        $row['subdomain']=$nv_Request->get_title( 'subdomain', 'post', '' );
	if ( $nv_Request->isset_request( 'submit', 'post' ) )
	{
            $error=create_sub_website($row);
		
	}
	elseif( $row['idsite'] > 0 )
	{
		$row = $db->query( 'SELECT * FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' WHERE idsite=' . $row['idsite'] )->fetch();
		$row['domainold']=$row['domain'];
		$msite_user = $db->query( 'SELECT * FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid=' . $row['admin_id'] )->fetch();
		$row['username']=$msite_user['username'];
		$row['email']=$msite_user['email'];
		if( empty( $row ) )
		{
			Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op );
			die();
		}
	}
	else
	{
		$row['idsite'] = 0;
		$row['cid'] = 0;
		$row['domain'] = '';
		$row['subdomain'] = '';
		$row['domaintype'] = '';
		$row['email'] = '';
		$row['domainold']='';
		$row['dbsite']='';
		$row['allowuserreg']=0;
		$row['sample']='default';
		
		
	}
	$array_cid_site = array();
	$_sql = 'SELECT cid,title FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . '_cat';
	$_query = $db->query( $_sql );
	while( $_row = $_query->fetch() )
	{
		$array_cid_site[$_row['cid']] = $_row;
	}


	$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
	$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
	$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
	$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
	$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
	$xtpl->assign( 'MODULE_NAME', $module_name );
	$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
	$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
	$xtpl->assign( 'NV_SERVER_NAME', NV_SERVER_NAME );
	$xtpl->assign( 'OP', $op );
	if( $row['idsite'] == 0 )
	{
		$xtpl->parse( 'main.password' );
	}
	
	if($row['domaintype']=="subdomain" )
	{
		$xtpl->parse( 'main.subdomain' );
	}
        $row['checked']=($row['allowuserreg']===1)?"checked":'';
	$xtpl->assign( 'ROW', $row );
	if( $row['idsite'] > 0 )
	{
		$xtpl->assign( 'DISABLE', '  disabled' );
		$xtpl->parse( 'main.domainold' );
	}else{
		$xtpl->assign( 'DISABLE', '' );
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
	foreach( $array_cid_site as $value )
	{
		$xtpl->assign( 'OPTION', array(
			'key' => $value['cid'],
			'title' => $value['title'],
			'selected' => ($value['cid'] == $row['cid']) ? ' selected="selected"' : ''
		) );
		$xtpl->parse( 'main.select_cid' );
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
	if( ! empty( $error ) )
	{
		$xtpl->assign( 'ERROR', implode( '<br />', $error ) );
		$xtpl->parse( 'main.error' );
	}

	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );
	$page_title = $lang_module['add'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';