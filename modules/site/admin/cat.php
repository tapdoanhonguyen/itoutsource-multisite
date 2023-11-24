<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2016 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 14 Nov 2016 07:27:28 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$contents='';
$theme_setup_default=array('default','mobile_default');
$module_setup_default=array('users','statistics','banners','seek','news','contact','about','siteterms','voting','feeds','menu','page','comment','freecontent','two-step-verification');
if ( defined( 'NV_IS_ADMIN' ) ) {
	if ( $nv_Request->isset_request( 'delete_cid', 'get' ) and $nv_Request->isset_request( 'delete_checkss', 'get' ))
	{
		$cid = $nv_Request->get_int( 'delete_cid', 'get' );
		$delete_checkss = $nv_Request->get_string( 'delete_checkss', 'get' );
		if( $cid > 0 and $delete_checkss == md5( $cid . NV_CACHE_PREFIX . $client_info['session_id'] ) )
		{
			$db->query('DELETE FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat  WHERE cid = ' . $db->quote( $cid ) );
			$nv_Cache->delMod( $module_name );
			Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op );
			die();
		}
	}

	$row = array();
	$error = array();
	$row['cid'] = $nv_Request->get_int( 'cid', 'post,get', 0 );
	if ( $nv_Request->isset_request( 'submit', 'post' ) )
	{
		$row['title'] = $nv_Request->get_title( 'title', 'post', '' );
		$_theme = $nv_Request->get_array( 'theme', 'post' );
		$row['theme'] = !empty( $_theme) ? implode( ',', $_theme ).",".implode(',',$theme_setup_default) : implode(',',$theme_setup_default);
		$_module = $nv_Request->get_array( 'module', 'post' );
		$row['module'] = !empty( $_module) ? implode( ',', $_module ).",".implode(',',$module_setup_default) : implode(',',$module_setup_default);
		if( empty( $row['title'] ) )
		{
			$error[] = $lang_module['error_required_title'];
		}
		if( empty( $error ) )
		{
			try
			{
				if( empty( $row['cid'] ) )
				{
					$stmt = $db->prepare( 'INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_cat (title, theme, module) VALUES (:title, :theme, :module)' );
				}
				else
				{
					$stmt = $db->prepare( 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_cat SET title = :title, theme = :theme, module = :module WHERE cid=' . $row['cid'] );
				}
				$stmt->bindParam( ':title', $row['title'], PDO::PARAM_STR );
				$stmt->bindParam( ':theme', $row['theme'], PDO::PARAM_STR );
				$stmt->bindParam( ':module', $row['module'], PDO::PARAM_STR );
				$exc = $stmt->execute();
				if( $exc )
				{
					$nv_Cache->delMod( $module_name );
					Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op );
					die();
				}
			}
			catch( PDOException $e )
			{
				trigger_error( $e->getMessage() );
				die( $e->getMessage() ); //Remove this line after checks finished
			}
		}
	}
	elseif( $row['cid'] > 0 )
	{
		$row = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE cid=' . $row['cid'] )->fetch();
		if( empty( $row ) )
		{
			Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op );
			die();
		}
	}
	else
	{
		$row['cid'] = 0;
		$row['title'] = '';
		$row['theme'] = '';
		$row['module'] = '';
	}

	$q = $nv_Request->get_title( 'q', 'post,get' );

	// Fetch Limit
	$show_view = false;
	if ( ! $nv_Request->isset_request( 'id', 'post,get' ) )
	{
		$show_view = true;
		$per_page = 20;
		$page = $nv_Request->get_int( 'page', 'post,get', 1 );
		$db->sqlreset()
			->select( 'COUNT(*)' )
			->from( '' . $db_config['prefix'] . '_' . $module_data . '_cat' );

		if( ! empty( $q ) )
		{
			$db->where( 'title LIKE :q_title OR theme LIKE :q_theme OR module LIKE :q_module' );
		}
		$sth = $db->prepare( $db->sql() );

		if( ! empty( $q ) )
		{
			$sth->bindValue( ':q_title', '%' . $q . '%' );
			$sth->bindValue( ':q_theme', '%' . $q . '%' );
			$sth->bindValue( ':q_module', '%' . $q . '%' );
		}
		$sth->execute();
		$num_items = $sth->fetchColumn();

		$db->select( '*' )
			->order( 'cid DESC' )
			->limit( $per_page )
			->offset( ( $page - 1 ) * $per_page );
		$sth = $db->prepare( $db->sql() );

		if( ! empty( $q ) )
		{
			$sth->bindValue( ':q_title', '%' . $q . '%' );
			$sth->bindValue( ':q_theme', '%' . $q . '%' );
			$sth->bindValue( ':q_module', '%' . $q . '%' );
		}
		$sth->execute();
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
	$xtpl->assign( 'OP', $op );
	$xtpl->assign( 'ROW', $row );
	$list_theme_site = nv_scandir(NV_ROOTDIR . '/themes/', $global_config['check_theme']);
	$list_theme_site_mobile = nv_scandir(NV_ROOTDIR . '/themes/', $global_config['check_theme_mobile']);
	$list_theme_all = array_merge($list_theme_site, $list_theme_site_mobile);
	$theme = explode( ',',$row['theme']);
	foreach ($list_theme_all as $themename ) {
		$xtpl->assign( 'THEME', array(
			'key' => $themename,
			'title' => $themename,
			'checked' => (in_array($themename, $theme) or in_array($themename, $theme_setup_default)) ? ' checked="checked"' : '',
			'disabled' => (in_array($themename, $theme_setup_default)) ? ' disabled="disabled"' : ''
		) );
		$xtpl->parse( 'main.theme' );
	}
	$module = explode( ',',$row['module']);
	$modules_site = nv_scandir(NV_ROOTDIR . '/modules', $global_config['check_module']);
	foreach ($modules_site as $modname ) {
		$xtpl->assign( 'MODULE', array(
			'key' => $modname,
			'title' => $modname,
			'checked' => (in_array($modname, $module) or in_array($modname, $module_setup_default)) ? ' checked="checked"' : '',
			'disabled' => (in_array($modname, $module_setup_default)) ? ' disabled="disabled"' : ''
		) );
		$xtpl->parse( 'main.module' );
	}
	$xtpl->assign( 'Q', $q );

	if( $show_view )
	{
		$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
		if( ! empty( $q ) )
		{
			$base_url .= '&q=' . $q;
		}
		$generate_page = nv_generate_page( $base_url, $num_items, $per_page, $page );
		if( !empty( $generate_page ) )
		{
			$xtpl->assign( 'NV_GENERATE_PAGE', $generate_page );
			$xtpl->parse( 'main.view.generate_page' );
		}
		$number = $page > 1 ? ($per_page * ( $page - 1 ) ) + 1 : 1;
		while( $view = $sth->fetch() )
		{
			$view['number'] = $number++;
			$view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;cid=' . $view['cid'];
			$view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_cid=' . $view['cid'] . '&amp;delete_checkss=' . md5( $view['cid'] . NV_CACHE_PREFIX . $client_info['session_id'] );
			$xtpl->assign( 'VIEW', $view );
			$themes = explode(',',$view['theme']);
			foreach($themes as $theme){
				$xtpl->assign( 'theme', $theme );
				$xtpl->parse( 'main.view.loop.theme' );
			}
			$modules = explode(',',$view['module']);
			foreach($modules as $module){
				$xtpl->assign( 'module', $module );
				$xtpl->parse( 'main.view.loop.module' );
			}
			$xtpl->parse( 'main.view.loop' );
		}
		$xtpl->parse( 'main.view' );
	}


	if( ! empty( $error ) )
	{
		$xtpl->assign( 'ERROR', implode( '<br />', $error ) );
		$xtpl->parse( 'main.error' );
	}

	$xtpl->parse( 'main' );
	$contents = $xtpl->text( 'main' );

	$page_title = $lang_module['cat'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';