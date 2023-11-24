<?php
$mod = $nv_Request->get_string('mod', 'post,get', '');

if ( $mod == 'get_chucvu' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chucvu_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chucvu']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_chucvu_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chucvu_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả chức vụ'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chucvu']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_phongban' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_phongban_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_phongban']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_phongban_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_phongban_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả phòng ban'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_phongban']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}



if ( $mod == 'get_tongiao' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_tongiao_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_tongiao']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_tongiao_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_tongiao_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả tôn giáo'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_tongiao']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}


if ( $mod == 'get_chucdanh' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chucdanh_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chucdanh']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_chucdanh_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chucdanh_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả chức danh'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chucdanh']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_maso' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_maso_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_maso']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}


if ( $mod == 'get_maso_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_maso_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả mã số'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_maso']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}



if ( $mod == 'get_bacluong' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_bacluong_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_bacluong']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_bacluong_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_bacluong_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả bậc lương'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_bacluong']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}


if ( $mod == 'get_heso' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_heso_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_heso']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_heso_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_heso_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả hệ số'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_heso']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_chuyenmon' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chuyenmon_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chuyenmon']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_chuyenmon_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chuyenmon_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả chuyên môn'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chuyenmon']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_chinhtri' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chinhtri_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chinhtri']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_chinhtri_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_chinhtri_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả chính trị'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_chinhtri']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_quanlygiaoduc' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_quanlygiaoduc_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_quanlygiaoduc']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_quanlygiaoduc_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_quanlygiaoduc_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_quanlygiaoduc']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_ngoaingu' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_ngoaingu_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_ngoaingu']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_ngoaingu_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_ngoaingu_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_ngoaingu']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_tinhoc' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_tinhoc_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_tinhoc']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_tinhoc_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_tinhoc_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_tinhoc']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}



if ( $mod == 'get_bienche' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_bienche_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_bienche']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}



if ( $mod == 'get_bienche_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_bienche_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_bienche']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
