<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 22 Mar 2020 07:19:57 GMT
 */
 

// Dang nhap thanh vien thi khong duoc truy cap
if (!defined('NV_IS_USER')) {
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users');
}

// print_r($array_config['groups_permission']['allow_import']);die();
if(!nv_user_in_groups($array_config['groups_permission']['allow_import'])){
	nv_redirect_location( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
}


// đọc dữ liệu file excel


ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
define( 'ACTION_METHOD', $nv_Request->get_string( 'import_excel', 'get,post', '' ) );

$add_product = array();
$update_product = array();
$product_error = array();
$dataContent = array();
$error = array();

if( ACTION_METHOD == 'Import file excel' )
{

	if( isset( $_FILES["file_excel"] ) && ! empty( $_FILES["file_excel"]['name'] ) )
	{
		
		// Khong cho phep cache
		header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . " GMT" );
		header( "Cache-Control: no-store, no-cache, must-revalidate" );
		header( "Cache-Control: post-check=0, pre-check=0", false );
		header( "Pragma: no-cache" );

		// Cross domain
		// header("Access-Control-Allow-Origin: *");

		$allowed_file_ext = array( 'xls', 'xlsx' );
		$allowed_file_type = array( 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );

		// Kiem tra phien lam viec
		$token = $nv_Request->get_title( 'token', 'post', '' );
		$fileName = $_FILES["file_excel"]['name'];
		$chunk = $nv_Request->get_int( 'chunk', 'post', 0 );
		$chunks = $nv_Request->get_int( 'chunks', 'post', 0 );
		$cleanupTargetDir = true; // Remove old files

		$fileExt = nv_getextension( $fileName );
		$fileOldName = nv_string_to_filename( $fileName );

		if( $token != md5( session_id() . $global_config['sitekey'] ) )
		{
			$error[] = $lang_module['uploadErrorSess'];
		}

		if( ! in_array( $fileExt, $allowed_file_ext ) )
		{

			$error[] = 'Tệp tin tải lên phải có đuôi' . implode( ', ', $allowed_file_ext );
		}

		$file_type = nv_get_mime_type( $_FILES["file_excel"]["tmp_name"] );

		if( ! in_array( $file_type, $allowed_file_type ) )
		{

			$error[] = 'Kiểu tệp tin này không được phép tải lên';
		}

		// Tang thoi luong phien lam viec
		if( $sys_info['allowed_set_time_limit'] )
		{
			set_time_limit( 5 * 3600 );
		}

		$fileTemp = NV_ROOTDIR . '/' . NV_TEMP_DIR;
		$filePath = $fileTemp . '/' . md5( $fileName ) . '.' . $fileExt;

		$file_size = $_FILES["file_excel"]['size'];

		// Open temp file
		if( ! $out = @fopen( "{$fileTemp}.part", $chunks ? "ab" : "wb" ) )
		{
			$error[] = 'Failed to open output stream.';
		}

		if( ! empty( $_FILES ) )
		{
			if( $_FILES["file_excel"]["error"] || ! is_uploaded_file( $_FILES["file_excel"]["tmp_name"] ) )
			{

				$error[] = 'Failed to move uploaded file.';

			}

			// Read binary input stream and append it to temp file
			if( ! $in = @fopen( $_FILES["file_excel"]["tmp_name"], "rb" ) )
			{
				$error[] = 'Failed to open input stream.';

			}
		}
		else
		{
			if( ! $in = @fopen( "php://input", "rb" ) )
			{

				$error[] = 'Failed to open input stream.';
			}
		}

		while( $buff = fread( $in, 4096 ) )
		{
			fwrite( $out, $buff );
		}

		@fclose( $out );
		@fclose( $in );

		clearstatcache();

		// Check if file has been uploaded
		if( ! $chunks || $chunk == $chunks - 1 )
		{
			// Strip the temp .part suffix off
			$check = @rename( "{$fileTemp}.part", $filePath );

			if( empty( $check ) )
			{

				$error[] = 'Đổi tên file bị lỗi';

			}

			function get_string_between( $string, $start, $end )
			{
				$string = ' ' . $string;
				$ini = strpos( $string, $start );
				if( $ini == 0 ) return '';
				$ini += strlen( $start );
				$len = strpos( $string, $end, $ini ) - $ini;
				return substr( $string, $ini, $len );
			}

			require_once ( NV_ROOTDIR . '/includes/Classes2/PHPExcel/IOFactory.php' );

			$objPHPExcel = PHPExcel_IOFactory::load( $filePath );
			$sheetData = $objPHPExcel->getSheet(0)->toArray( null, true, true, true );
			
			// xu ly thong tin  
			 
			$stt = 1;
			$update = 0;
			$insert = 0;
			
			foreach( $sheetData as $key => $item )
			{
				
				if($stt > 1)
				{
					
					if($item['C'])
					{
						$userid = add_customer($item);
						if($userid)
						{
							$insert++;
						}
					}
				}
				
				$stt++;	
				
			}
			
			// dịch vụ
			
			$sheetData = $objPHPExcel->getSheet(1)->toArray( null, true, true, true );
			
			$stt = 1;
			
			foreach( $sheetData as $key => $item )
			{
				
				if($stt > 1)
				{
					
					if($item['B'] and $item['K'])
					{
						// format item
						// chi phí
						$item['F'] = floatval(preg_replace('/[^0-9\.]/', '', $item['F']));
						
						// vat
						$item['G'] = floatval(preg_replace('/[^0-9\.]/', '', $item['G']));
						
						// tổng tiền
						$item['H'] = floatval(preg_replace('/[^0-9\.]/', '', $item['H']));
						
						
						// ngày bắt đầu
						if (empty($item['I'])) {
						$item['I'] = 0;
						} else {
							$ehour = $nv_Request->get_int('ehour', 'post', 0);
							$emin = $nv_Request->get_int('emin', 'post', 0);
							unset($m);
							preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $item['I'], $m);
							$item['I'] = mktime($ehour, $emin, 0, $m[2], $m[1], $m[3]);
						}
						
						// ngày ngày gia hạn
						if (empty($item['J'])) {
						$item['I'] = 0;
						} else {
							$ehour = $nv_Request->get_int('ehour', 'post', 0);
							$emin = $nv_Request->get_int('emin', 'post', 0);
							unset($m);
							preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $item['J'], $m);
							$item['J'] = mktime($ehour, $emin, 0, $m[2], $m[1], $m[3]);
						}
						
						if($item['I'] and $item['J'])
						{
							$item['cycle'] = ($item['J'] - $item['I'])/86400/30;
							$item['cycle'] = round($item['cycle']);
						}
						
					
						
						add_service($item);
					
						die(ok);
					}
				}
				
				$stt++;	
				
			}
			
			
			$error[] = 'THÊM '. $insert .' DÒNG DỮ LIỆU THÀNH CÔNG';
			$error[] = 'CẬP NHẬT '. $update .' DÒNG DỮ LIỆU THÀNH CÔNG';
			nv_deletefile( $filePath );

		}
		else
		{

			unlink( $filePath );

			$error[] = 'Đổi tên file bị lỗi';

		}
	}
	else
	{
		$error[] = 'Upload file lỗi';

	}
}


$xtpl = new XTemplate($op .'.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);



if( ACTION_METHOD == 'Import file excel' )
{
	$xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error_import_excel');
}


$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['import_customer'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
