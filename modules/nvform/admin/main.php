<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 24-06-2011 10:35
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['form_list'];
$array = array();

// Del form
if( $nv_Request->isset_request( 'del', 'post' ) )
{
	if( ! defined( 'NV_IS_AJAX' ) ) die( 'Wrong URL' );

	$fid = $nv_Request->get_int( 'fid', 'post', 0 );

	$sql = 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_answer WHERE fid = ' . $fid;
	$db->exec( $sql );

	$sql = 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_question WHERE fid = ' . $fid;
	$db->exec( $sql );

	$sql = 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id = ' . $fid;
	$db->exec( $sql );

	$sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . ' ORDER BY weight ASC';
	$result = $db->query( $sql );
	$weight = 0;
	while( $row = $result->fetch() )
	{
		++$weight;
		$sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET weight=' . $weight . ' WHERE id = ' . $row['id'];
		$db->query( $sql );
	}
	nv_del_moduleCache( $module_name );
	die('OK');
}

$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' ORDER BY weight ASC';
$_rows = $db->query( $sql )->fetchAll();
$num = sizeof( $_rows );

if( $num < 1 )
{
	Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=form_content' );
	die();
}

$array_status = array( $lang_module['form_deactive'], $lang_module['form_active'] );

$xtpl = new XTemplate( 'main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );

$i = 0;
foreach ( $_rows as $row )
{
	$row['qlist'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=question&amp;fid=' . $row['id'];
	$row['url_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $row['id'] . '-' . $row['alias'] . $global_config['rewrite_exturl'];
	$row['url_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=form_content&amp;id=' . $row['id'];
	$row['url_report'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=report&amp;fid=' . $row['id'];

	for( $i = 1; $i <= $num; ++$i )
	{
		$xtpl->assign( 'WEIGHT', array(
			'w' => $i,
			'selected' => ( $i == $row['weight'] ) ? ' selected="selected"' : ''
		) );

		$xtpl->parse( 'main.row.weight' );
	}

	foreach( $array_status as $key => $val )
	{
		$xtpl->assign( 'STATUS', array(
			'key' => $key,
			'val' => $val,
			'selected' => ( $key == $row['status'] ) ? ' selected="selected"' : ''
		) );

		$xtpl->parse( 'main.row.status' );
	}

	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.row' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';