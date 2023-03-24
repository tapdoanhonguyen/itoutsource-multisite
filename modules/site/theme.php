<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */

if (! defined('NV_IS_MOD_SITE')) {
    die('Stop!!!');
}

/**
 * main_theme()
 *
 * @param mixed $site_content
 * @param mixed $array_cid_site
 * @param mixed $array_keyword
 * @return
 */
 
function main_theme($array_cid_site,$site_content)
{
    global $global_config, $module_info, $lang_module, $module_name, $module_upload, $module_config, $lang_global, $admin_info, $client_info;
	$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
	$xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'NV_LANG_VARIABLE', NV_LANG_VARIABLE );
	$xtpl->assign( 'NV_LANG_DATA', NV_LANG_DATA );
	$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
	$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
	$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
	$xtpl->assign( 'MODULE_NAME', $module_name );
	$xtpl->assign( 'MODULE_UPLOAD', $module_upload );
	$xtpl->assign( 'NV_ASSETS_DIR', NV_ASSETS_DIR );
	$xtpl->assign( 'OP', 'install' );
	$xtpl->assign( 'ROW', $site_content );
	if( $site_content['idsite'] > 0 )
	{
		$xtpl->assign( 'DISABLE', '  disabled' );
		$xtpl->parse( 'main.domainold' );
	}else{
		$xtpl->assign( 'DISABLE', ' ' );
	}
	foreach( $array_cid_site as $value )
	{
		$xtpl->assign( 'OPTION', array(
			'key' => $value['cid'],
			'title' => $value['title'],
			'selected' => ($value['cid'] == $site_content['cid']) ? ' selected="selected"' : ''
		) );
		$xtpl->parse( 'main.select_cid' );
	}

    $xtpl->parse('main');
    return $xtpl->text('main');
}
