<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2018 TDFOSS.,LTD. All rights reserved
 * @Createdate Tue, 02 Jan 2018 08:34:29 GMT
 */
if( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

if( ! isset( $site_mods['workforce'] ) )
{
	$workforce_list = array();
	$where = '';

	//$where .= ! empty( $array_config['groups_manage'] ) ? ' AND userid IN (SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_groups_managers WHERE group_id IN (' . $array_config['groups_manage'] . '))' : '';
	$result = $db->query( 'SELECT userid, first_name, last_name, username, email FROM ' . NV_USERS_GLOBALTABLE . ' WHERE active=1' . $where );
	while( $row = $result->fetch() )
	{
		$row['fullname'] = nv_show_name_user( $row['first_name'], $row['last_name'], $row['username'] );
		$workforce_list[$row['userid']] = $row;
	}
}

function send_mail_customer( $diem, $id_customer )
{
	global $db, $array_config, $user_info, $module_name, $module_config, $module_data;

	// lấy thông tin khách hàng
	$info_cus = $db->query( 'SELECT first_name, last_name FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $id_customer )->fetch();

	// lấy thông tin điểm tích lũy khách hàng
	$info_point = $db->query( 'SELECT score FROM ' . NV_PREFIXLANG . '_invoice_score WHERE customerid=' . $id_customer )->fetchColumn();

	// lấy nội dung gửi mail cho khách hàng
	$info_cus = $db->query( 'SELECT accumulated_points_title, accumulated_points_content FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types WHERE accumulated_points_content IS NULL' )->fetch();

	// gửi mail

}

function insert_tichluy( $id_khachhang, $id_khachhang_gioithieu )
{
	global $db, $array_config, $user_info, $module_name, $module_config, $module_data;

	if( $id_khachhang_gioithieu )
	{
		$diem_new = 10;

		// kiểm tra id_khach đã tồn tại trong bảng _score
		$tontai = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_invoice_score WHERE customerid=' . $id_khachhang_gioithieu )->fetchColumn();

		if( $tontai )
		{
			// update
			$stmt = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_invoice_score SET score = score + ' . $diem_new . ' WHERE customerid=' . $id_khachhang_gioithieu );

			$stmt->execute();
		}
		else
		{
			// insert
			$sth = $db->prepare( 'INSERT INTO ' . NV_PREFIXLANG . '_invoice_score (customerid, score) VALUES(:customerid, :score)' );

			$sth->bindParam( ':customerid', $id_khachhang_gioithieu, PDO::PARAM_INT );
			$sth->bindParam( ':score', $diem_new, PDO::PARAM_INT );
			$sth->execute();
		}

	}

}

function update_tichluy( $id_khachhang, $id_khachhang_gioithieu )
{
	global $db, $array_config, $user_info, $module_name, $module_config, $module_data;

	// kiểm tra khách hàng giới thiệu khách hàng này
	$share_customer = $db->query( 'SELECT share_customer FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $id_khachhang )->fetchColumn();

	//print_r($diem_new);die;

	if( true )
	{

		// khach hàng giới thiệu thay đổi
		if( $id_khachhang_gioithieu != $share_customer and $id_khachhang_gioithieu > 0 and $share_customer > 0 )
		{
			// là khách hàng giới thiệu mới
			// kiểm tra id_khach đã tồn tại trong bảng _score
			$tontai = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_invoice_score WHERE customerid=' . $id_khachhang_gioithieu )->fetchColumn();

			$diem_new = 10;

			if( $tontai )
			{
				// update
				$stmt = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_invoice_score SET score = score + ' . $diem_new . ' WHERE customerid=' . $id_khachhang_gioithieu );

				$stmt->execute();
			}
			elseif( $id_khachhang_gioithieu )
			{
				// insert
				$sth = $db->prepare( 'INSERT INTO ' . NV_PREFIXLANG . '_invoice_score (customerid, score) VALUES(:customerid, :score)' );

				$sth->bindParam( ':customerid', $id_khachhang_gioithieu, PDO::PARAM_INT );
				$sth->bindParam( ':score', $diem_new, PDO::PARAM_INT );
				$sth->execute();
			}

			// cập nhật khách hàng cũ giới thiệu
			if( $share_customer )
			{
				$diem_new = -10;

				// update khách hàng giới thiệu cũ
				$stmt = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_invoice_score SET score = score + ' . $diem_new . ' WHERE customerid=' . $share_customer );

				$stmt->execute();
			}

		}
		elseif( $id_khachhang_gioithieu > 0 and ! $share_customer )
		{
			// là khách hàng giới thiệu cũ

			$diem_new = 10;

			// kiểm tra id_khach đã tồn tại trong bảng _score
			$tontai = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_invoice_score WHERE customerid=' . $id_khachhang_gioithieu )->fetchColumn();

			if( $tontai )
			{
				// update
				$stmt = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_invoice_score SET score = score + ' . $diem_new . ' WHERE customerid=' . $id_khachhang_gioithieu );

				$stmt->execute();
			}
			elseif( $id_khachhang_gioithieu )
			{
				// insert
				$sth = $db->prepare( 'INSERT INTO ' . NV_PREFIXLANG . '_invoice_score (customerid, score) VALUES(:customerid, :score)' );

				$sth->bindParam( ':customerid', $id_khachhang_gioithieu, PDO::PARAM_INT );
				$sth->bindParam( ':score', $diem_new, PDO::PARAM_INT );
				$sth->execute();
			}

		}
		elseif( $id_khachhang_gioithieu == 0 and $share_customer )
		{
			// update
			$diem_new = -10;
			$stmt = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_invoice_score SET score = score + ' . $diem_new . ' WHERE customerid=' . $share_customer );

			$stmt->execute();
		}

	}

}

function nv_customer_premission( $module, $prefix = '', $type = 'where' )
{
	global $db_slave, $array_config, $user_info, $module_name, $module_config;

	if( $module_name != $module )
	{
		$array_config = $module_config[$module];
	}

	if( in_array( 18, $user_info['in_groups'] ) ) return '';

	$array_userid = array(); // mảng chứa userid mà người này được quản lý
	$groups_admin = explode( ',', $array_config['groups_admin'] );
	if( ! empty( array_intersect( $groups_admin, $user_info['in_groups'] ) ) )
	{
		return '';
	}

	// nhóm quản lý thấy tất cả
	$group_manage = ! empty( $array_config['groups_manage'] ) ? explode( ',', $array_config['groups_manage'] ) : array();
	$group_manage = array_map( 'intval', $group_manage );

	if( ! empty( array_intersect( $group_manage, $user_info['in_groups'] ) ) )
	{
		// kiểm tra tư cách trong nhóm (trưởng nhóm / thành viên nhóm)
		$result = $db_slave->query( 'SELECT * FROM ' . NV_USERS_GLOBALTABLE . '_groups_users WHERE is_leader=1 AND approved=1 AND userid=' . $user_info['userid'] );
		while( $row = $result->fetch() )
		{
			// lấy danh sách userid thuộc nhóm do người này quản lý
			$_result = $db_slave->query( 'SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_groups_users WHERE approved=1 AND group_id=' . $row['group_id'] );
			while( list( $userid ) = $_result->fetch( 3 ) )
			{
				$array_userid[] = $userid;
			}
		}
		$array_userid = array_unique( $array_userid );

		if( $type == 'where' )
		{
			if( ! empty( $array_userid ) )
			{
				// nếu là trưởng nhóm, thấy nhân viên do mình quản lý
				$array_userid = implode( ',', $array_userid );
				return '(' . $prefix . 'userid IN (' . $array_userid . ') OR care_staff=' . $user_info['userid'] . ')';
			}
			else
			{
				// thành viên nhóm nhìn thấy ticket cho mình thực hiện, do mình tạo ra
				return '(' . $prefix . 'userid=' . $user_info['userid'] . ' OR care_staff=' . $user_info['userid'] . ')';
			}
		}
		elseif( $type == 'array_userid' )
		{
			return $array_userid;
		}
	}
	else
	{
		return '';
	}
}

function nv_crm_customer_info( $customerid )
{
	global $db;

	$customer_info = $db->query( 'SELECT * FROM ' . NV_PREFIXLANG . '_customer WHERE id=' . $customerid )->fetch();
	if( $customer_info )
	{
		$customer_info['fullname'] = nv_show_name_user( $customer_info['first_name'], $customer_info['last_name'] );
		$customer_info['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=customer&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $customerid;

		if( ! empty( $customer_info['photo'] ) && file_exists( NV_ROOTDIR . '/' . $customer_info['photo'] ) )
		{
			$customer_info['photo'] = NV_BASE_SITEURL . $customer_info['photo'];
		}
		else
		{
			$customer_info['photo'] = NV_BASE_SITEURL . 'themes/default/images/users/no_avatar.png';
		}
	}
	return $customer_info;
}

function nv_crm_customer_info_by_userid( $userid )
{
	global $db;

	$customer_info = $db->query( 'SELECT t1.*, t1.id customer_id, t2.userid id FROM ' . NV_PREFIXLANG . '_customer t1 INNER JOIN ' . NV_USERS_GLOBALTABLE . ' t2 ON t1.userid_link=t2.userid WHERE t2.userid=' . $userid )->fetch();
	if( $customer_info )
	{
		$customer_info['fullname'] = nv_show_name_user( $customer_info['first_name'], $customer_info['last_name'] );
		$customer_info['link_view'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=customer&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $customer_info['customer_id'];

		if( ! empty( $customer_info['photo'] ) && file_exists( NV_ROOTDIR . '/' . $customer_info['photo'] ) )
		{
			$customer_info['photo'] = NV_BASE_SITEURL . $customer_info['photo'];
		}
		else
		{
			$customer_info['photo'] = NV_BASE_SITEURL . 'themes/default/images/users/no_avatar.png';
		}
	}
	return $customer_info;
}

function nv_customer_delete( $customerid )
{
	global $db, $module_data, $user_info;

	$rows = $db->query( 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . ' t1 INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_share_acc t2 ON t1.id=t2.customerid WHERE id=' . $customerid . ' AND t2.userid=' . $user_info['userid'] . ' AND permisson=1' )->fetch();
	if( $rows )
	{
		$count = $db->exec( 'DELETE FROM ' . NV_PREFIXLANG . '_customer WHERE id = ' . $customerid );
		if( $count )
		{
			// xóa dữ liệu bảng khách hàng - dịch vụ
			//$db->exec('DELETE FROM ' . NV_PREFIXLANG . '_customer_products WHERE id_customer = ' . $customerid);

			// xóa dữ liệu bảng khách hàng - sản phẩm
			//$db->exec('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_customer_services WHERE id_customer = ' . $customerid);

			// xóa dữ liệu điểm tích lũy

			$db->query( 'DELETE FROM ' . NV_PREFIXLANG . '_invoice_score WHERE customerid=' . $customerid );

			// xóa custom field
			$db->query( 'DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_info WHERE rows_id=' . $customerid );

			$db->query( 'DELETE FROM ' . NV_PREFIXLANG . '_customer_share_acc WHERE customerid = ' . $customerid );
		}
		return $count;
	}
}
