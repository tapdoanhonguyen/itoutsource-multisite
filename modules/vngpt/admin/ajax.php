<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 13 May 2023 09:14:43 GMT
 */

 $action_save_key = $nv_Request->get_int('action_save_key', 'post' , 0);
 $act_load_key = $nv_Request->get_int('act_load_key', 'post' , 0);

if( $action_save_key > 0) {
    $keyword_arr = array();
    $keyword_active_arr   = array();
    $keyword_miss_arr     = array();
    $keyword_miss_img_arr = array();

    $cate_id = $nv_Request->get_int('cate_id', 'post' , 0);
    $input_keyword        =  $nv_Request->get_string('input_keyword', 'post' , '');
    $input_keyword_active   = $nv_Request->get_string('input_keyword_active', 'post' , '');

    $keyword          = 'keyword_' . $cate_id;
    $keyword_active   = 'keyword_active_' . $cate_id;
    $keyword_miss     = 'keyword_miss_' . $cate_id;
    $keyword_miss_img = 'keyword_miss_img_' . $cate_id;
    // NV_UPLOADS_REAL_DIR .'/' . $module_upload.'/;
    $keyword_txt          = NV_UPLOADS_REAL_DIR .'/' . $module_upload.'/' . $keyword . '.txt';
    $keyword_active_txt   = NV_UPLOADS_REAL_DIR .'/' . $module_upload.'/' . $keyword_active . '.txt';
    
    $keyword_arr          = array_unique(array_map('trim', explode("\n", preg_replace('/^\s*$\n|\\\/m', '', $input_keyword))));
    $keyword_active_arr   = array_unique(array_map('trim', explode("\n", preg_replace('/^\s*$\n|\\\/m', '', $input_keyword_active))));

    $keyword_arr = array_diff($keyword_arr, $keyword_active_arr, $keyword_miss_arr);

    $new_input_keyword          = implode("\n", $keyword_arr);
    $new_input_keyword_active   = implode("\n", $keyword_active_arr);
    
   
    if ($new_input_keyword != '') {
        file_put_contents($keyword_txt, $new_input_keyword);
       
    }else{
        delete_file($keyword_txt);
    }

    if ($new_input_keyword_active != '') {
        file_put_contents($keyword_active_txt, $new_input_keyword_active);
    }else{
        delete_file($keyword_active_txt);
    }

    if($new_input_keyword != null) {
        $count_key =  line_count($keyword_txt);
    }else {
        $count_key =  '0';
    }

    if($new_input_keyword_active != null) {
        $count_key_active =  line_count($keyword_active_txt);
    }else {
        $count_key_active =  '0';
    }
   
    echo '<div class="accordion-body">
            <div class="text-end">
                <button class="save-key-url btn btn-sm btn-secondary" type="button" data-cate-id="'.$cate_id.'" onclick="click_save">Save</button>
            </div>
            <div class="row">
                <div class="col-xs-24 col-sm-12">
                    <div class="mb-3 flex-column">
                        <label for=' . $keyword . ' class="form-label green-text">Chưa tạo bài (' . $count_key . ')</label>
                        <textarea wrap="off" name=' . $keyword . ' id=' . $keyword . ' rows="5" class="large-text">' . $new_input_keyword . '</textarea>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-12">
                    <div class="mb-3 flex-column">
                        <label for="' . $keyword_active . '" class="form-label green-text">Tạo được bài (' . $count_key_active . ')</label>
                        <textarea wrap="off" name="' . $keyword_active . '" id="' . $keyword_active . '" rows="5" class="large-text">' . $new_input_keyword_active . '</textarea>
                    </div>
                </div>
            </div>
        </div>';
    exit();
}

if( $act_load_key > 0 ) {
    
    $cate_id  = $nv_Request->get_string('cate_id', 'post' , '');
    
    $keyword          = 'keyword_' . $cate_id;
    $keyword_active   = 'keyword_active_' . $cate_id;

    $keyword_txt          =  NV_UPLOADS_REAL_DIR .'/' . $module_upload.'/' . $keyword . '.txt';
    $keyword_active_txt   =  NV_UPLOADS_REAL_DIR .'/' . $module_upload.'/' . $keyword_active . '.txt';
   
    $keyword_value          = file_exists($keyword_txt)?file_get_contents($keyword_txt):'';
    $keyword_active_value   = file_exists($keyword_active_txt)?file_get_contents($keyword_active_txt):'';

    if($keyword_value != null) {
        $count_key =  line_count($keyword_txt);
    }else {
        $count_key =  '0';
    }

    if($keyword_active_value != null) {
        $count_key_active =  line_count($keyword_active_txt);
    }else {
        $count_key_active =  '0';
    }

    echo  '<div class="accordion-body">
                <div class="text-end">
                    <button class="save-key-url btn btn-sm btn-secondary" type="button" data-cate-id="'.$cate_id.'">Save</button>
                </div>
                <div class="row">
                    <div class="col-xs-24 col-sm-12">
                        <div class="mb-3 flex-column">
                            <label for=' . $keyword . ' class="form-label green-text">Chưa tạo bài (' .$count_key . ')</label>
                            <textarea wrap="off" name=' . $keyword . ' id=' . $keyword . ' rows="5" class="large-text">' . $keyword_value . '</textarea>
                        </div>
                    </div>
                    <div class="col-xs-24 col-sm-12">
                        <div class="mb-3 flex-column">
                            <label for="' . $keyword_active . '" class="form-label green-text">Tạo được bài (' . $count_key_active . ')</label>
                            <textarea wrap="off" name="' . $keyword_active . '" id="' . $keyword_active . '" rows="5" class="large-text">' . $keyword_active_value . '</textarea>
                        </div>
                    </div>
                </div>
            </div>';
	exit();
}