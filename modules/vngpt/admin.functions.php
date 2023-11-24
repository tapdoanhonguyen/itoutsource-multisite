<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 13 May 2023 09:14:43 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN'))
    die('Stop!!!');

define('NV_IS_FILE_ADMIN', true);

$allow_func = array('main', 'ajax' ,'run','config');
// Kiểm tra xem đang sửa có bị cướp quyền hay không, cập nhật thêm thời gian chỉnh sửa
$sql = 'SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config';
$list = $nv_Cache->db($sql, '', $module_name);
$page_config = [];
foreach ($list as $values) {
    $page_config[$values['config_name']] = $values['config_value'];
}
$sql = 'SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config';
$list = $nv_Cache->db($sql, '', $module_name);
$page_config = [];
foreach ($list as $values) {
    $page_config[$values['config_name']] = $values['config_value'];
}

$global_config['config_module_name'] =  $page_config["module_setting"];
//$uploads_dir_user = NV_UPLOADS_DIR . '/' . $page_config["module_setting"];

function delete_file($path) {
    if (file_exists($path)) {
        unlink($path);
        return true;
    } else {
        return false;
    }
}

function line_count($filename) {
    $lines = file($filename);
    return count($lines);
}

function check_o($data_o, $num_headings){
	$o = array();
	if (!empty($data_o) && $data_o['content'] != ''){
		$o = explode("\n\n", $data_o['content']);
		if (count($o) >= $num_headings) {
			if (count(explode("\n", end($o))) == 1) {
				array_pop($o);
			}
			if (count(explode("\n", $o[0])) == 1) {
				array_shift($o); 
				$o = array_values($o);
			}
			if (count(explode("\n", $o[0])) == 1) {
				array_shift($o); 
				$o = array_values($o);
			}
		}
		if (count($o) != $num_headings) {
			$o = array();
		}
	}
	return $o;
}
function gpt_cmd($in, $api_key) {
	ini_set('max_execution_time', 300);
	$data              = array();
	$model             = 'gpt-3.5-turbo';
	$temperature       = 0.7;
	$top_p             = 1;
	$frequency_penalty = 0;
	$presence_penalty  = 0;
	$params = array(
		'model'             => $model,
		'messages'          => $in,
		'temperature'       => floatval($temperature),
		'top_p'             => floatval($top_p),
		'frequency_penalty' => floatval($frequency_penalty),
		'presence_penalty'  => floatval($presence_penalty)
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json',
		'Authorization: Bearer ' . trim($api_key),
	]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	// if ($response === false) {
	// 	$this->vngpt_log('curl_error(cmd): ' . curl_error($ch));
	// }else{
	// 	$result = json_decode($response, true);
		
	// 	$data = [
	// 	'role' => $result['choices'][0]['message']['role'],
	// 	'content' => $result['choices'][0]['message']['content']
	// 	];
	// }
	$result = json_decode($response, true);
		
		$data = [
		'role' => $result['choices'][0]['message']['role'],
		'content' => $result['choices'][0]['message']['content']
		];
	curl_close($ch);
	return $data;
 }

function gpt_img($in, $api_key, $set_thumb = false){
	global $module_name, $lang_global, $lang_module, $page_title, $global_config;
	    $img_size = '512x512';
	// ini_set('max_execution_time', 300);
        $img_str     = '';
        $img_size    = $img_size;
        $post_author = 'user';
        $prompt      =  $in['prompt'];
        $caption     =  $in['caption'];
        $slug        =  $in['slug'];
        $params = array(
            'prompt' => $prompt,
            'n'      => 1,
            'size'   => $img_size,
            'response_format' => 'b64_json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/images/generations');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . trim($api_key),
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
		$result = json_decode($response, true);
		if(isset($result['error'])) {
			//$this->vngpt_log('Response error(img): ' . serialize($result['error']));
		}else {
            
			if (isset($result['data'][0]['b64_json']) && $result['data'][0]['b64_json'] != '') {
                $data = base64_decode($result['data'][0]['b64_json']);
                
                $img = imagecreatefromstring($data);
                if (function_exists('imagecreatefromstring')) {
                    $img = imagecreatefromstring($data);
                    if ($img){
						//string(31) "E:/laragon/www/nukeviet/uploads"
                        $path = NV_UPLOADS_REAL_DIR . '/' . $global_config['config_module_name']  . '/' . date('Y_m').'/' . $slug . '.jpg';
                        
						imagejpeg($img, $path);
                        imagedestroy($img);


                        $src =  NV_UPLOADS_REAL_DIR . '/'. $global_config['config_module_name']  . '/' . date('Y_m').'/' . $slug . '.jpg';
                        $attachment = array(
                            'guid'           => $src, 
                            'post_mime_type' => 'image/jpeg',
                            'post_title'     => $caption,
                            'post_content'   => $caption,
                            'post_excerpt'   => $caption,
                            'post_status'    => 'inherit',
                            'post_author'    => 'user'
                        );

                        if ($set_thumb !== false) {
                            $img_str = $slug . '.jpg';
                        }else {
                            $img_size_arr =  explode('x', $img_size);
                            $img_str = '<img class="wp-image-post size-full" src="' . $src . '" alt="' . $caption . '" />';
                        }
                       
                    }else{
                       
                        var_dump('Lỗi khi đang tạo ảnh');die;
                    }
                }else{
                    var_dump('Module GD chưa kích hoạt. Vui lòng kiểm tra lại cấu hình PHP');die;
                }
            }
		}
	curl_close($ch);
	return $img_str;
}

/**
 * nv_set_status_module()
 *
 * @throws PDOException
 */

function nv_get_gpt_user($in_vngpt){
	ini_set('max_execution_time', 300);
	$data = array();
	$home_arr = parse_url('https://ajkim.in');
	$domain = $home_arr['host'];
	$sv = 'https://vngpt.pro/?page=api';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $sv);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_REFERER, $domain);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $in_vngpt);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	
	$response = curl_exec($ch);
	if ($response === false) {
		vngpt_log('curl_sv_error: ' . curl_error($ch));
	}else{
		$data = json_decode($response, true);
	}
	curl_close($ch);
	return $data;
}

