<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 04 Jan 2018 08:24:14 GMT
 */
if( ! defined( 'NV_IS_MOD_CUSTOMER' ) ) die( 'Stop!!!' );

if( ! defined( 'NV_IS_ADMIN' ) )
{
	$customer_info_fnc = nv_crm_customer_info_by_userid( $user_info['userid'] );
}
$not_allow = false;

if( ! empty( $customer_info_fnc ) )
{
	$not_allow = false;
}
elseif( ( ! nv_user_in_groups( $array_config['groups_permission']['allow_view'] ) and ! nv_user_in_groups( $array_config['groups_permission']['allow_view_by_project'] ) ) )
{ // TH2
	// if((nv_user_in_groups($array_config['groups_permission']['allow_view']) or nv_user_in_groups($array_config['groups_permission']['allow_view_by_project'])) ){ // TH1
	// Xét nhóm được xem và xem theo được phân dự án, chưa xét là khách hàng
	// Nhóm khách hàng phải KHÔNG ĐƯỢC CHECK 2 nhóm trên == TH1
	// Nhóm khách hàng phải phải ĐƯỢC CHECK 2 nhóm trên == TH2

	// -- TH2 phải so với khách hàng trước ngược lại TH1
	$not_allow = true;
}

if( $not_allow )
{
	nv_redirect_location( nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name, true ) );
}

 
if( $nv_Request->isset_request( 'id_delete', 'post' ) )
{

	$id = $nv_Request->get_int( 'id_delete', 'post' );

	if( $id )
	{

		$db->query( 'DELETE FROM ' . NV_PREFIXLANG . '_invoice_service WHERE id =' . $id );
	}

}

if( $nv_Request->isset_request( 'id_service_old', 'post' ) )
{

	$id = $nv_Request->get_int( 'id_service_old', 'post' );
	$row['customerid'] = $nv_Request->get_int( 'new_id', 'post' );

	$row['detail'] = array();
	$detail = $nv_Request->get_array( 'detail', 'post' );
	$i = 1;
	$grand_total = 0;

	foreach( $detail as $index => $value )
	{
		if( $value['itemid'] > 0 && ! empty( $value['module'] ) )
		{
			$value['weight'] = $i;
			$value['price'] = nv_price_format( $value['price'] );
			$value['unit_price'] = nv_price_format( $value['unit_price'] );
			$grand_total += nv_caculate_total( $value['unit_price'], $value['quantity'], $value['vat'] );

			if( preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $value['createtime'], $m ) )
			{
				$value['createtime'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
			}

			if( preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $value['duetime'], $m ) )
			{
				$value['duetime'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
			}

			$row['detail'][$i . '_' . $value['itemid'] . '_' . $value['module']] = $value;
			$i++;
		}
	}

	foreach( $row['detail'] as $service )
	{

		$sth = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_invoice_service SET idcustomer = :idcustomer, module = :module, itemid = :itemid, unit_price = :unit_price, quantity = :quantity, price = :price, vat = :vat, total = :total, note = :note, createtime = :createtime, cycle = :cycle, duetime = :duetime, partner = :partner WHERE id =' . $id );

		$service['note'] = ! empty( $service['note'] ) ? $service['note'] : '';
		$total = $service['unit_price'] * $service['quantity'];
		$total = $total + ( ( $total * $service['vat'] ) / 100 );
		$sth->bindParam( ':idcustomer', $row['customerid'], PDO::PARAM_INT );
		$sth->bindParam( ':module', $service['module'], PDO::PARAM_STR );
		$sth->bindParam( ':itemid', $service['itemid'], PDO::PARAM_INT );
		$sth->bindParam( ':unit_price', $service['unit_price'], PDO::PARAM_STR );
		$sth->bindParam( ':quantity', $service['quantity'], PDO::PARAM_INT );
		$sth->bindParam( ':price', $service['price'], PDO::PARAM_STR );
		$sth->bindParam( ':vat', $service['vat'], PDO::PARAM_STR );
		$sth->bindParam( ':total', $total, PDO::PARAM_STR );
		$sth->bindParam( ':note', $service['note'], PDO::PARAM_STR );
		$sth->bindParam( ':createtime', $service['createtime'], PDO::PARAM_INT );
		$sth->bindParam( ':cycle', $service['cycle'], PDO::PARAM_INT );
		$sth->bindParam( ':duetime', $service['duetime'], PDO::PARAM_INT );
		$sth->bindParam( ':partner', $service['partner'], PDO::PARAM_STR );

		try
		{
			$exc = $sth->execute();
		}
		catch ( PDOException $e )
		{
			die( $e->getMessage() );
		}

	}

	
	nv_redirect_location( nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail', true ) . '?id=' . $row['customerid'] . '&is_contacts=0#tab2success' );
 
	die();

}

// edit service ajax
if( $nv_Request->isset_request( 'id_edit', 'post' ) )
{

	$id = $nv_Request->get_int( 'id_edit', 'post' );

	$info = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_invoice_service WHERE id=' . $id )->fetch();

	$info['unit_price'] = nv_price_format( $info['unit_price'] );
	$info['price'] = $info['unit_price'] * $info['quantity'];
	$info['vat_price'] = ( $info['price'] * $info['vat'] ) / 100;
	$info['total'] = nv_caculate_total( $info['unit_price'], $info['quantity'], $info['vat'] );
	$grand_total += $info['total'];
	$item_total += ( $info['price'] * $info['quantity'] );
	$vat_total += $info['vat_price'];
	$info['vat_price'] = nv_number_format( $info['vat_price'] );
	$info['total'] = nv_number_format( $info['total'] );
	$info['price'] = nv_number_format( $info['price'] );
	$info['unit_price'] = nv_number_format( $info['unit_price'] );

	$info['createtime'] = ( ! empty( $info['createtime'] ) ) ? date( 'd/m/Y', $info['createtime'] ) : '';

	$info['duetime'] = ( ! empty( $info['duetime'] ) ) ? date( 'd/m/Y', $info['duetime'] ) : '';

	$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_services WHERE active=1 ORDER BY weight';
	$array_services = $nv_Cache->db( $_sql, 'id', 'services' );

	$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_services_price_unit WHERE active=1 ORDER BY weight';
	$array_price_unit = $nv_Cache->db( $_sql, 'id', 'services' );

	$contents = nv_theme_edit_service( $info, $array_services );

	echo $contents;
	die();

}

if( $nv_Request->isset_request( 'change_contacts', 'post' ) )
{
	$id = $nv_Request->get_int( 'id', 'post', 0 );
	$query = 'SELECT is_contacts FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $id;
	$row = $db->query( $query )->fetch();
	if( empty( $id ) )
	{
		die( 'NO_' . $lang_module['error_no_id'] );
	}

	$query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET is_contacts=0 WHERE id=' . $id;
	$db->query( $query );

	$nv_Cache->delMod( $module_name );
	die( 'OK_' . $lang_module['queue_success'] );
}

$id = $nv_Request->get_int( 'id', 'post,get', 0 );

 
$array_page = explode('-', $array_op[1]);
$id  = intval(end($array_page));
$number = strlen($row['id']) + 1;
$token = substr($array_op[1], 0, -$number);
 
if( $token !=  md5( $nv_Request->session_id . $global_config['sitekey'] . $id ) && $id  > 0 ) 
{
	nv_redirect_location( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name, true );
}


// CHÚ Ý: Nếu không vào được chi tiết, hãy kiểm tra tài khoản đang có gán trong của khách hàng nào không, nếu có thì sẽ không vào của người khác, chỉ vào được của mình

if( ! empty( $customer_info_fnc ) )
{
	$sql_customer = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' t1 INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_share_acc t2 ON t1.id=t2.customerid WHERE id=' . $id . ' AND t1.userid_link=' . $customer_info_fnc['id'];
}
else
{
	$sql_customer = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' t1 INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_share_acc t2 ON t1.id=t2.customerid WHERE id=' . $id . nv_customer_premission( $module_name, 't2.' ); // Cũ
	// $sql_customer = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' t1 INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_share_acc t2 ON t1.id=t2.customerid WHERE id=' . $id;
}

$customer_info = $db->query( $sql_customer )->fetch();

// if(nv_user_in_groups($array_config['groups_permission']['allow_view_by_project']) and (!nv_user_in_groups($array_config['groups_permission']['allow_view']) or empty($customer_info_fnc))){ // Cũ
// print_r(nv_user_in_groups($array_config['groups_permission']['allow_view']));die();
if( nv_user_in_groups( $array_config['groups_permission']['allow_view_by_project'] ) and ! nv_user_in_groups( $array_config['groups_permission']['allow_view'] ) and empty( $customer_info_fnc ) )
{
	// Xét nhóm được xem dựa vào dự án của khách hàng này

	$sql_project = 'SELECT COUNT(id) FROM ' . NV_PREFIXLANG . '_projects WHERE (FIND_IN_SET(' . $user_info['userid'] . ', workforceid) OR useradd = ' . $user_info['userid'] . ') AND customerid=' . $customer_info['id'];
	$num_duan = $db->query( $sql_project )->fetchColumn();
	if( $num_duan < 1 or empty( $num_duan ) )
	{
		die( 'redirect' );
		nv_redirect_location( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name );
	}
}
if( ! $customer_info )
{

	nv_redirect_location( nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name, true ) );

	die();
}

$customer_info['fullname'] = nv_show_name_user( $customer_info['first_name'], $customer_info['last_name'] );
$customer_info['gender'] = $array_gender[$customer_info['gender']];
$customer_info['addtime'] = nv_date( 'H:i d/m/Y', $customer_info['addtime'] );
$customer_info['edittime'] = ! empty( $customer_info['edittime'] ) ? nv_date( 'H:i d/m/Y', $customer_info['edittime'] ) : '';
$customer_info['care_staff'] = ! empty( $customer_info['care_staff'] ) ? $workforce_list[$customer_info['care_staff']]['fullname'] : '';
$customer_info['type_id'] = ! empty( $customer_info['type_id'] ) ? $array_customer_type_id[$customer_info['type_id']]['title'] : '';
$customer_info['birthday'] = ! empty( $customer_info['birthday'] ) ? nv_date( 'd/m/Y', $customer_info['birthday'] ) : '';
$customer_info['share_groups'] = ! empty( $customer_info['share_groups'] ) ? $array_part_list[$customer_info['share_groups']]['title'] : '';
$customer_info['website_str'] = '';
if( ! empty( $customer_info['website'] ) )
{
	$customer_info['website_str'] = array();
	$customer_info['website'] = explode( ',', $customer_info['website'] );
	foreach( $customer_info['website'] as $url )
	{
		$customer_info['website_str'][] = '<a target="_blank" href="' . $url . '">' . $url . '</a>';
	}
	$customer_info['website_str'] = implode( ', ', $customer_info['website_str'] );
}

$array_customer_service = array();
$array_customer_products = array();
$array_customer_projects = array();
$array_email_list = array();
$current_link = nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail/' . md5( $nv_Request->session_id . $global_config['sitekey'] . $id ) . '-' . $id , true);
//print_r($site_mods);die;
if( isset( $site_mods['services'] ) )
{
	define( 'NV_SERVICES', true );

	$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_services WHERE active=1 ORDER BY weight';
	$array_services = $nv_Cache->db( $_sql, 'id', 'services' );

	$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_services_price_unit WHERE active=1 ORDER BY weight';
	$array_price_unit = $nv_Cache->db( $_sql, 'id', 'services' );

	// nghĩa khóa
	//$result = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_services_customer WHERE customerid=' . $id . ' ORDER BY id DESC');

	/*
	$result = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_invoice
	t1, ' . NV_PREFIXLANG . '_invoice_detail t2
	WHERE t1.id = t2.idinvoice  AND t2.idcustomer=' . $id . ' ORDER BY t1.id DESC');
	*/

	$result = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_invoice_service t2
 WHERE t2.idcustomer=' . $id . ' ORDER BY t2.id DESC' );

	while( $row = $result->fetch() )
	{

		$price_unit = $array_services[$row['itemid']]['price_unit'];
		$row['unit_service'] = $array_price_unit[$price_unit]['title'];

		$row['itemid'] = $array_services[$row['itemid']]['title'];

		$array_customer_service[] = $row;
	}

	// print_r($array_customer_service);die;
	$customer_info['count_services'] = sizeof( $array_customer_service );
}

if( isset( $site_mods['projects'] ) )
{
	define( 'NV_PROJECTS', true );

	$result = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_projects WHERE customerid=' . $id . ' ORDER BY id DESC' );
	while( $row = $result->fetch() )
	{
		$row['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=projects&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $row['id'];
		$array_customer_projects[] = $row;
	}
	$customer_info['count_projects'] = sizeof( $array_customer_projects );
}

if( isset( $site_mods['email'] ) )
{
	define( 'NV_EMAIL', true );

	$result = $db->query( 'SELECT t1.id, t1.title, t1.addtime, t1.useradd FROM ' . NV_PREFIXLANG . '_email t1 INNER JOIN ' . NV_PREFIXLANG . '_email_sendto t2 ON t1.id=t2.email_id WHERE t2.customer_id=' . $id . ' ORDER BY id DESC' );
	while( $row = $result->fetch() )
	{
		$row['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=email&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $row['id'];
		$row['addtime'] = nv_date( 'H:i d/m/Y', $row['addtime'] );

		if( isset( $workforce_list[$row['useradd']]['fullname'] ) )
		{
			$row['useradd'] = ! empty( $row['useradd'] ) ? $workforce_list[$row['useradd']]['fullname'] : $lang_module['system'];
		}

		$array_email_list[] = $row;
	}
	$customer_info['count_emails'] = sizeof( $array_email_list );
}

if( isset( $site_mods['invoice'] ) )
{
	define( 'NV_INVOICE', true );
	$array_invoice = array();
	require_once NV_ROOTDIR . '/modules/invoice/language/' . NV_LANG_INTERFACE . '.php';
	require_once NV_ROOTDIR . '/modules/invoice/site.functions.php';
	$result = $db->query( 'SELECT id, title, code, addtime, createtime, duetime, grand_total, status FROM ' . NV_PREFIXLANG . '_invoice WHERE customerid=' . $id . ' ORDER BY id DESC' );
	while( $row = $result->fetch() )
	{
		$row['createtime'] = ! empty( $row['createtime'] ) ? nv_date( 'H:i d/m/Y', $row['createtime'] ) : '';
		$row['duetime'] = ! empty( $row['duetime'] ) ? nv_date( 'H:i d/m/Y', $row['duetime'] ) : '';
		$row['addtime'] = nv_date( 'H:i d/m/Y', $row['addtime'] );
		$row['grand_total'] = number_format( $row['grand_total'] );
		$row['status'] = $array_invoice_status[$row['status']];
		$row['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=invoice&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $row['id'];
		$array_invoice[] = $row;
	}
	$customer_info['count_invoices'] = sizeof( $array_invoice );
}

$customer_info['share_accs'] = array();
if( ! empty( $customer_info['share_acc'] ) )
{
	$customer_info['share_acc'] = explode( ',', $customer_info['share_acc'] );
	foreach( $customer_info['share_acc'] as $share_acc )
	{
		$customer_info['share_accs'][] = $workforce_list[$share_acc]['fullname'];
	}
}

$customer_info['tags'] = array();
if( ! empty( $customer_info['tag_id'] ) )
{
	$customer_info['tag_id'] = explode( ',', $customer_info['tag_id'] );
	foreach( $customer_info['tag_id'] as $tag_id )
	{
		$customer_info['tags'][] = $array_customer_tags[$tag_id]['title'];
	}
}

$customer_info['units'] = array();
if( ! empty( $customer_info['unit'] ) )
{
	$customer_info['unit'] = explode( ',', $customer_info['unit'] );
	foreach( $customer_info['unit'] as $units )
	{
		$customer_info['units'][] = $array_customer_units[$units]['title'];
	}
}

$other_phone = ! empty( $customer_info['other_phone'] ) ? explode( '|', $customer_info['other_phone'] ) : array();
$customer_info['other_phone'] = nv_theme_crm_label( $other_phone );

$other_email = ! empty( $customer_info['other_email'] ) ? explode( '|', $customer_info['other_email'] ) : array();
$customer_info['other_email'] = nv_theme_crm_label( $other_email );

if( $customer_info['userid_link'] > 0 )
{
	$user = $db->query( 'SELECT userid, first_name, last_name, username FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid=' . $customer_info['userid_link'] )->fetch();
	$customer_info['userid_link'] = nv_show_name_user( $user['first_name'], $user['last_name'], $user['username'] );
}
else
{
	$customer_info['userid_link'] = $lang_module['userid_link_empty'];
}

$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'CUSTOMER', $customer_info );
$xtpl->assign( 'URL_EDIT', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=content&amp;id=' . $id . '&redirect=' . nv_redirect_encrypt( $client_info['selfurl'] ) );
$xtpl->assign( 'URL_ADD', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=content' );
$xtpl->assign( 'URL_DELETE', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;delete_id=' . $id . '&amp;delete_checkss=' . md5( $id . NV_CACHE_PREFIX . $client_info['session_id'] ) );
$xtpl->assign( 'URL_ADD_EMAIL', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=email&amp;' . NV_OP_VARIABLE . '=content&amp;customerid=' . $id . '&amp;redirect=' . nv_redirect_encrypt( $client_info['selfurl'] ) );
$xtpl->assign( 'CURRENT_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&id=' . $id );

if( defined( 'NV_EMAIL' ) )
{
	if( ! empty( $array_email_list ) )
	{
		$i = 1;
		foreach( $array_email_list as $email )
		{
			$email['number'] = $i++;
			$xtpl->assign( 'EMAIL', $email );
			$xtpl->parse( 'main.email_tab_content.loop' );
		}
	}
	$xtpl->parse( 'main.email_tab_content' );
	$xtpl->parse( 'main.email_tab_title' );
}

$_sql = 'SELECT t1.*,t2.title as title_unit FROM ' . NV_PREFIXLANG . '_services t1 LEFT JOIN  ' . NV_PREFIXLANG . '_services_price_unit t2 ON t1.price_unit = t2.id WHERE t1.active=1';
$array_services = $nv_Cache->db( $_sql, 'id', 'services' );

$_sql = 'SELECT t1.*,t2.title as title_unit FROM ' . NV_PREFIXLANG . '_products t1 INNER JOIN  ' . NV_PREFIXLANG . '_products_price_unit t2 ON t1.price_unit = t2.id WHERE t1.active=1';
$array_products = $nv_Cache->db( $_sql, 'id', 'products' );

$_sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_projects';
$array_projects = $nv_Cache->db( $_sql, 'id', 'projects' );

if( defined( 'NV_INVOICE' ) )
{
	if( ! empty( $array_invoice ) )
	{
		$i = 1;
		foreach( $array_invoice as $invoice )
		{
			$invoice['number'] = $i++;
			$xtpl->assign( 'INVOICE', $invoice );
			$xtpl->parse( 'main.invoice_tab_content.loop' );
		}
	}
	$xtpl->parse( 'main.invoice_tab_content' );
	$xtpl->parse( 'main.iscontacts.invoice_tab_title' );
}

if( $customer_info['is_contacts'] == 0 )
{
	if( defined( 'NV_SERVICES' ) )
	{
		if( ! empty( $array_customer_service ) )
		{
			$i = 1;

			foreach( $array_customer_service as $service )
			{
				$service['number'] = $i++;
				$service['addtime'] = ( empty( $service['addtime'] ) ) ? '' : nv_date( 'H:i d/m/Y', $service['addtime'] );

				$service['total'] = 0;

				$xtpl->assign( 'SERVICE', $service );
				$xtpl->parse( 'main.service_tab_content.loop' );
			}
		}
		$xtpl->parse( 'main.service_tab_content' );
		$xtpl->parse( 'main.iscontacts.service_tab_title' );
	}
}

$array_field_config = array();
$result_field = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_field WHERE show_profile=1 ORDER BY weight ASC' );
while( $row_field = $result_field->fetch() )
{
	$language = unserialize( $row_field['language'] );
	$row_field['title'] = ( isset( $language[NV_LANG_DATA] ) ) ? $language[NV_LANG_DATA][0] : $row['field'];
	$row_field['description'] = ( isset( $language[NV_LANG_DATA] ) ) ? nv_htmlspecialchars( $language[NV_LANG_DATA][1] ) : '';
	if( ! empty( $row_field['field_choices'] ) )
	{
		$row_field['field_choices'] = unserialize( $row_field['field_choices'] );
	}
	elseif( ! empty( $row_field['sql_choices'] ) )
	{
		$row_field['sql_choices'] = explode( '|', $row_field['sql_choices'] );
		$query = 'SELECT ' . $row_field['sql_choices'][2] . ', ' . $row_field['sql_choices'][3] . ' FROM ' . $row_field['sql_choices'][1];
		$result = $db->query( $query );
		$weight = 0;
		while( list( $key, $val ) = $result->fetch( 3 ) )
		{
			$row_field['field_choices'][$key] = $val;
		}
	}
	$array_field_config[] = $row_field;
}

$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_info WHERE rows_id=' . $id;
$result_field = $db->query( $sql );
$custom_fields = $result_field->fetch();

$contents = nv_theme_customer_detail( $customer_info, $id, $array_services, $array_products, $array_projects );

$page_title = $customer_info['fullname'];
$array_mod_title[] = array( 'title' => $page_title );

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
