<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2016 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 14 Nov 2016 07:52:12 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$contents='NO';
$row['reinstall'] = $nv_Request->get_int( 'reinstall', 'post,get', 0 );
if ( defined( 'NV_IS_GODADMIN' ) &&  !empty($row['reinstall'])) {
	$row['domain'] = $nv_Request->get_string( 'domain', 'post,get', '' );
	if (! empty($row['domain'])) {
		$row['domain'] = preg_replace('/^(http|https)\:\/\//', '', $row['domain']);
		$row['domain'] = preg_replace('/^([^\/]+)\/*(.*)$/', '\\1', $row['domain']);
		$_p  = '';
		if (preg_match('/(.*)\:([0-9]+)$/', $row['domain'], $m)) {
			$row['domain'] = $m[1];
			$_p  = ':' . $m[2];
		}
		$row['domain'] = nv_check_domain(nv_strtolower($row['domain']));
		
		$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;
	
		$row = $db->query( 'SELECT * FROM ' . $db_config['dbsystem'] . '.' .$db_config['prefix'] . '_' . $module_data . ' WHERE domain="' .$row['domain'] .'"' )->fetch();
		$array_info_site=$row;
		$array_info_site['domainold']=$row['domain'];
		$array_info_site['prefix']=$db_config['prefix'];
		$array_info_site['lang']=NV_LANG_DATA;
		$array_info_site['userid']=$admin_info['userid'];

		site_install($array_info_site);
		site_install_create_sql($array_info_site);
		//die( "INSERT INTO " . $array_info_site['dbsite'] . "." . NV_AUTHORS_GLOBALTABLE . "_module (mid, module, lang_key, weight, act_1, act_2, act_3, checksum) VALUES (1, 'siteinfo', 'mod_siteinfo', 1, 1, 1, 1, '')");
		$contents='OK';
	}
	else
	{
		$contents='NO';
	}
}
include NV_ROOTDIR . '/includes/header.php';
echo  $contents;
include NV_ROOTDIR . '/includes/footer.php';