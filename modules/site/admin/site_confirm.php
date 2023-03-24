<?php

/**
 * @Project NUKEVIET 4.x
 * @Author CLB NUKEVIET HCMC (adminwmt@gmail.com)
 * @Copyright (C) 2016 CLB NUKEVIET HCMC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 14 Nov 2016 03:54:03 GMT
 */
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
if ( ! defined( 'NV_IS_ADMIN' ) ) die( 'Stop!!!' );
if ( $nv_Request->get_string('save', 'post') == '1' )
{
	$array_info_site = array();
	$row = array();
	$row['cid'] = $nv_Request->get_int( 'cid', 'post', 0 );
	$row['domain'] = $nv_Request->get_title( 'domain', 'post', '' );
	$row['dbsite'] = $nv_Request->get_title( 'dbsite', 'post', '' );
	$row['allowuserreg'] = $nv_Request->get_int( 'allowuserreg', 'post', 0 );

	if (! empty($row['domain'])) {
		$row['domain'] = preg_replace('/^(http|https)\:\/\//', '', $row['domain']);
		$row['domain'] = preg_replace('/^([^\/]+)\/*(.*)$/', '\\1', $row['domain']);
		$_p  = '';
		if (preg_match('/(.*)\:([0-9]+)$/', $row['domain'], $m)) {
			$row['domain'] = $m[1];
			$_p  = ':' . $m[2];
		}
		$row['domain'] = nv_check_domain(nv_strtolower($row['domain']));
	}
	if( empty( $row['cid'] ) )
	{
		$error[] = $lang_module['error_required_cid'];
	}
	elseif( empty( $row['domain'] ) && $row['idsite']==0)
	{
		$error[] = $lang_module['error_required_domain'];
	}
	elseif( empty( $row['dbsite'] ) && $row['idsite']==0)
	{
		$error[] = $lang_module['error_required_dbsite'];
	}elseif((($check_domain = nv_check_exist_domain($row['domain']))) != ''){
				$error[] = $check_domain;
	}elseif((($check_dbsite = nv_check_exist_dbsite($row['dbsite']))) != ''){
				$error[] = $check_dbsite;
	}
	
	if( empty( $error ) )
	{
		$data_insert = array();
		$sql =  'INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . ' (cid, domain, dbsite, allowuserreg) VALUES (:cid, :domain, :dbsite, :allowuserreg)';
		$data_insert['cid']= $row['cid'];
		$data_insert['domain']= $row['domain'];
		$data_insert['dbsite']= $row['dbsite'];
		$data_insert['allowuserreg']= $row['allowuserreg'];
		$idsite = $db->insert_id($sql, '', $data_insert);	
	}
	$sql = 'SELECT sample FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE cid = '.$row['cid'];
	$sample = $db->query($sql)->fetch();
	$sql = 'SELECT idsite FROM ' . $db_config['prefix'] . '_' . $module_data . ' WHERE domain = ' . $db->quote($row['domain']);
	$ids = $db->query($sql)->fetch();
	$array_info_site['cid']=$row['cid'];
	$array_info_site['idsite']=intval($ids['idsite']);
	$array_info_site['sample']=$sample['sample'];
	$array_info_site['domainold']=$row['domain'];
	$array_info_site['domain']=$row['domain'];
	$array_info_site['dbsite']=$row['dbsite'];
	$array_info_site['allowuserreg']=$row['allowuserreg'];
	$array_info_site['prefix']=$db_config['prefix'];
	$array_info_site['lang']=NV_LANG_DATA;
	$array_info_site['userid']=$admin_info['userid'];
	$contents=site_sub_install($array_info_site);	
}
nv_insert_logs(NV_LANG_DATA, $module_name, $lang_module['add_site'] , $row['domain'] . '|' . $row['dbsite'] , $admin_info['userid']);
nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);