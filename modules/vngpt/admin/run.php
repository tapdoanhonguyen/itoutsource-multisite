<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 13 May 2023 09:14:43 GMT
 */
if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

require_once NV_ROOTDIR . '/modules/' . $module_data . '/lib/Parsedown.php';
if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}


$sql = 'SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config';
$list = $nv_Cache->db($sql, '', $module_name);
$page_config = [];
foreach ($list as $values) {
    $page_config[$values['config_name']] = $values['config_value'];
}


$api_key_arr = explode('|', $page_config["apichatgpt"]);
$img_num  = 3;
 

if(empty($page_config["module_setting"])) {
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=config');
}else {
    $global_array_cat = [];
    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $page_config["module_setting"] . '_cat ORDER BY sort ASC';
    $result = $db_slave->query($sql);
    while ($row = $result->fetch()) {
        $global_array_cat[$row['catid']] = $row;
    }  
    
}

// Lựa chọn Layout
$selectthemes = (!empty($site_mods[$page_config["module_setting"]]['theme'])) ? $site_mods[$page_config["module_setting"]]['theme'] : $global_config['site_theme'];
$layout_array = nv_scandir(NV_ROOTDIR . '/themes/' . $selectthemes . '/layout', $global_config['check_op_layout']);
// Xác định và tạo các thư mục upload
$username_alias = change_alias($admin_info['username']);
$array_structure_image = [];
$array_structure_image[''] = $page_config["module_setting"];
$array_structure_image['Y'] = $page_config["module_setting"] . '/' . date('Y');
$array_structure_image['Ym'] = $page_config["module_setting"] . '/' . date('Y_m');
$array_structure_image['Y_m'] = $page_config["module_setting"] . '/' . date('Y/m');
$array_structure_image['Ym_d'] = $page_config["module_setting"] . '/' . date('Y_m/d');
$array_structure_image['Y_m_d'] = $page_config["module_setting"] . '/' . date('Y/m/d');
$array_structure_image['username'] = $page_config["module_setting"] . '/' . $username_alias;
$array_structure_image['username_Y'] = $page_config["module_setting"] . '/' . $username_alias . '/' . date('Y');
$array_structure_image['username_Ym'] = $page_config["module_setting"] . '/' . $username_alias . '/' . date('Y_m');
$array_structure_image['username_Y_m'] = $page_config["module_setting"]. '/' . $username_alias . '/' . date('Y/m');
$array_structure_image['username_Ym_d'] = $page_config["module_setting"] . '/' . $username_alias . '/' . date('Y_m/d');
$array_structure_image['username_Y_m_d'] = $page_config["module_setting"] . '/' . $username_alias . '/' . date('Y/m/d');
$structure_upload = isset($module_config[$page_config["module_setting"]]['structure_upload']) ? $module_config[$page_config["module_setting"]]['structure_upload'] : 'Ym';
$currentpath = isset($array_structure_image[$structure_upload]) ? $array_structure_image[$structure_upload] : '';
if (file_exists(NV_UPLOADS_REAL_DIR . '/' . $currentpath)) {
    $upload_real_dir_page = NV_UPLOADS_REAL_DIR . '/' . $currentpath;
} else {
    $upload_real_dir_page = NV_UPLOADS_REAL_DIR . '/' .$page_config["module_setting"];
    $e = explode('/', $currentpath);
    if (!empty($e)) {
        $cp = '';
        foreach ($e as $p) {
            if (!empty($p) and !is_dir(NV_UPLOADS_REAL_DIR . '/' . $cp . $p)) {
                $mk = nv_mkdir(NV_UPLOADS_REAL_DIR . '/' . $cp, $p);
                if ($mk[0] > 0) {
                    $upload_real_dir_page = $mk[2];
                    try {
                        $db->query('INSERT INTO ' . NV_UPLOAD_GLOBALTABLE . "_dir (dirname, time) VALUES ('" . NV_UPLOADS_DIR . '/' . $cp . $p . "', 0)");
                    } catch (PDOException $e) {
                        trigger_error($e->getMessage());
                    }
                }
            } elseif (!empty($p)) {
                $upload_real_dir_page = NV_UPLOADS_REAL_DIR . '/' . $cp . $p;
            }
            $cp .= $p . '/';
        }
    }
    $upload_real_dir_page = str_replace('\\', '/', $upload_real_dir_page);
}
$currentpath = str_replace(NV_ROOTDIR . '/', '', $upload_real_dir_page);
$uploads_dir_user = NV_UPLOADS_DIR . '/' . $page_config["module_setting"];
if (!defined('NV_IS_SPADMIN') and str_contains($structure_upload, 'username')) {
    $array_currentpath = explode('/', $currentpath);
    if ($array_currentpath[2] == $username_alias) {
        $uploads_dir_user = NV_UPLOADS_DIR . '/' .$page_config["module_setting"] . '/' . $username_alias;
    }
}


$cate_id_arr = array();
foreach ($global_array_cat as $cate) {
    
    $file_path = NV_UPLOADS_REAL_DIR . '/' . $module_upload. '/keyword_' . $cate["catid"] . '.txt';
   
    if (file_exists($file_path) && filesize($file_path) > 1) {
        $cate_id_arr[] =  $cate["catid"];
    }
}


if (!empty($cate_id_arr)) {
    $rand_cate_id         = $cate_id_arr[rand(0, count($cate_id_arr) - 1)];
    $keyword_txt          = NV_UPLOADS_REAL_DIR . '/' . $module_upload. '/keyword_' . $rand_cate_id . '.txt';
    //$keyword_txt          = NV_ROOTDIR . '/' . $module_upload. '/keyword_70.txt';
    $keyword_value        = file_exists($keyword_txt)?file_get_contents($keyword_txt):'';
    $keyword_arr          = explode("\n", wordwrap($keyword_value));
    $html = [];
    
    if (!empty($keyword_arr)) {
        //lấy ra từ khóa
        $keyword = trim($keyword_arr[rand(0, count($keyword_arr) - 1)]);
        $options['use_brand_cate'] = 1;
        //hiển thị mô tả danh mục
        $cate_des             = '';
        if (isset($options['use_brand_cate']) && $cate_des != '') {
            $brand_info = $cate_des;
        }
        //$num_headings = intval($this->options['num_headings']); cấu hình số tiêu đề cần hiển thị
        $num_headings = intval(6);
        if ($keyword != '') {
           
        //    $global_array_cat = [];
       
            $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $page_config["module_setting"] . '_rows WHERE alias ='. '"' . nv_strtolower(change_alias($keyword)).'"';
            $post_dup = $db->query($sql)->fetch();

            if (empty($post_dup)){
                $in_vngpt = array(
                    'token' => '7b4b5d73b8bf8ce93d77b0ecdf72240f',
                    'lang' => 'vi',
                    'keyword' => $keyword,
                    'num_headings' => 6,
                    'brand' => $cate_des,
                    'brand_info' => $cate_des,
                    'create_excerpt' => 1,
                    'img_num' => 1
                );
                $out = nv_get_gpt_user($in_vngpt);
                
                if (isset($out['cmds']) && !empty($out['cmds'])) {
                    $cmds = $out['cmds'];
                    $options['create_excerpt'] = 1;
                    $options['img_on'] = 1;
                    if (isset($cmds['o']) && $cmds['o'] != '') {
                        $num_api_key = count($api_key_arr);
                        $total_stt = $num_headings + 1 + 3;
                        if (isset($options['create_excerpt'])) {
                            $total_stt++;
                        }
                        if (isset($options['img_on'])) {
                            $total_stt++;
                            $total_stt += $img_num;
                        }
                        while(count($api_key_arr) < $total_stt) {
                            $api_key_arr[] = $api_key_arr[count($api_key_arr)%$num_api_key];
                        }
                    
                        //$cmd['o'] = "string(321) "Act as an SEO expert and high-quality copywriter fluent in Vietnamese. Your task is to create an outline for the article in Vietnamese with the main keyword "thành phố hải phòng thuộc tỉnh nào" including 6 main headings. Note: Adhere to the E-A-T (Expertise, Authoritativeness, and Trustworthiness) principles.""
                        $in = array(array('role' => 'user', 'content' => $cmds['o']));
                        $stt_api_key = 0;
                        $data_o = gpt_cmd($in, $api_key_arr[$stt_api_key]);
                        $o = check_o($data_o, $num_headings);
                        
                        $i = 1;
                        while (empty($o)) {
                            if($i > 3){
                                break;
                            }
                            $stt_api_key++;
                            
                            $data_o = gpt_cmd($in, $api_key_arr[$stt_api_key]);
                            
                            $o = check_o($data_o, $num_headings);
                            
                            $i++;
                            sleep(10);
                        }
                        
                        if (!empty($o)) {
                            array_push($in, $data_o);

                            if (isset($cmds['a']) && !empty($cmds['a'])) {
                                $i = 2;
                                foreach ($cmds['a'] as $key => $cmd) {
                                    if ($key == 0){
                                        array_push($in, array('role' => 'user', 'content' => $cmd . ":\n\n" . $o[$key]));
                                    }else{
                                        if ($i < count($o)) {
                                            array_push($in, array('role' => 'user', 'content' => $cmd . ":\n\n" . $o[$key]));
                                        }else{
                                            array_push($in, array('role' => 'user', 'content' => $cmd));
                                        }
                                        $i++;
                                    }
                                    
                                    $stt_api_key++;
                                    $data = gpt_cmd($in, $api_key_arr[$stt_api_key]);
                                    
                                    if (!empty($data) && $data['content'] != ''){
                                        
                                        if ($key == 0) {
                                            preg_match_all('/^#([^#].*)$/m', $data['content'], $matches);
                                            $text = array_map(function($match) {
                                                return trim(substr($match, 1));
                                            }, $matches[0]);

                                            if ($text[0] != '') {
                                                $title = preg_replace('/^tiêu đề( bài viết)?:\s|^(\*+)?(\")?|(\")?(\*+)?$/i','', $text[0]);
                                                $content .= preg_replace('/^(#[^#].*)$/m', '', $data['content']);
                                                array_push($in, $data);
                                            }else{
                                                $content = '';
                                                break;
                                            }
                                        }else{
                                            $content_new = $data['content'];
                                            if (preg_match('/^#[^#]/', $content_new)) {
                                                if (preg_match('/^###[^###]/', $content_new)) {
                                                    $content_new = preg_replace('/^###(.*)/m', '####$1', $content_new);
                                                }
                                                if (preg_match('/^##[^##]/', $content_new)) {
                                                    $content_new = preg_replace('/^##(.*)/m', '###$1', $content_new);
                                                }
                                                $content_new = preg_replace('/^#(.*)/m', '##$1', $content_new);
                                            }
                                            $content .= "\n\n" . $content_new;
                                            array_pop($in);
                                        }
                                    }

                                    if ($content != ''){
                                        if (isset($cmds['d']) && $cmds['d'] != '') {
                                            array_push($in, array('role' => 'user', 'content' => $cmds['d']));
                                            $stt_api_key++;
                                            $data_d = gpt_cmd($in, $api_key_arr[$stt_api_key]);
                                            $des = '';
                                            if (!empty($data_d) && $data_d['content'] != '') {
                                                $des = trim($data_d['content'], '"');
                                                $des = preg_replace('/#.*$/u', '', $des);
                                            }
                                            array_pop($in);
                                        }

                                        $content = preg_replace($out['pattern_content'],'', $content);
                                        $parser = new Parsedown();
                                        $html = $parser->text($content);
                                        
                                       // tạo alias
                                        if (preg_match('/^[\p{Latin}\s\d]+$/u', $keyword) === 0) {
                                            $post_name = preg_replace('/\s+/', '-', $keyword);
                                            $post_name = trim($post_name, '-');
                                        }else{
                                            $post_name =  nv_strtolower(change_alias($keyword));
                                        }
                                        
                                             
                                      
                                        $catid = $nv_Request->get_int('catid', 'get', 0);
                                        $parentid = $nv_Request->get_int('parentid', 'get', 0);

                                        $rowcontent = [
                                            'id' => '',
                                            'catid' => $catid,
                                            'listcatid' => $catid . ',' . $parentid,
                                            'topicid' => '',
                                            'admin_id' => 1,
                                            'author' => '',
                                            'internal_authors' => [],
                                            'internal_authors_old' => [],
                                            'sourceid' => 0,
                                            'addtime' => NV_CURRENTTIME,
                                            'edittime' => NV_CURRENTTIME,
                                            'status' => 0,
                                            'publtime' => NV_CURRENTTIME,
                                            'exptime' => 0,
                                            'archive' => 1,
                                            'title' => '',
                                            'alias' => '',
                                            'hometext' => '',
                                            'sourcetext' => '',
                                            'files' => [],
                                            'homeimgfile' => '',
                                            'homeimgalt' => '',
                                            'homeimgthumb' => '',
                                            'imgposition' => 1,
                                            'titlesite' => '',
                                            'description' => '',
                                            'bodyhtml' => '',
                                            'copyright' => 0,
                                            'inhome' => 1,
                                            'allowed_comm' => 1,
                                            'allowed_rating' => 1,
                                            'external_link' => 0,
                                            'allowed_send' => 1,
                                            'allowed_print' => 1,
                                            'allowed_save' => 1,
                                            'hitstotal' => 0,
                                            'hitscm' => 0,
                                            'total_rating' => 0,
                                            'click_rating' => 0,
                                            'layout_func' => '',
                                            'tags' => '',
                                            'tags_old' => '',
                                            'keywords' => '',
                                            'instant_active' => 0,
                                            'instant_template' => '',
                                            'instant_creatauto' => 0,
                                            'mode' => 'add'
                                        ];
                                        
                                        array_pop($in);
                                        array_pop($in);
                                        array_push($in, array('role' => 'user', 'content' => $cmds['i']));
                                        $stt_api_key++;
                                        $data_i = gpt_cmd($in, $api_key_arr[$stt_api_key]);
                                       
                                         if (!empty($data_i) && $data_i['content'] != '') {
                                             $in_img_arr = json_decode($data_i['content'], true);
                                            
                                            if (is_array($in_img_arr)) {
                                                $upload_dir = $currentpath;
                                                
                                                $img = array();
                                               
                                                foreach ($in_img_arr as $key => $in_img){
                                                    $stt_api_key++;
                                                  
                                                    if ($key === 0) {
                                                        $in_img['caption'] = ucwords($keyword);
                                                        $in_img['slug'] = $post_name;
                                                        $image_thumb = gpt_img( $in_img, $api_key_arr[$stt_api_key], true);
                                                       
                                                    }else{
                                                        $out_img = gpt_img($in_img, $api_key_arr[$stt_api_key], false);
                                                        if ($out_img != '') {
                                                            $img[$key] = $out_img;
                                                        }
                                                    }
                                                }
                                                
                                                if (count($img) > 0) {
                                                    $html = preg_replace_callback('/(<h2>.*?<\/h2>)/', function ($matches) use ($img) {
                                                        static $i = 1;
                                                        return $matches[0] . "\n" . (isset($img[$i])?$img[$i++]:'');
                                                    }, $html);
                                                }

                                            }
                                         }else{
                                             $mess_img = '<span class="orange-text">Không tạo được ảnh cho bài viết này!</span>';
                                         }
                                       
                                        $_weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $page_config["module_setting"] . '_rows')->fetchColumn();
                                        $_weight = (int) $_weight + 1;
                                        
                                       
                                        $sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $page_config["module_setting"] . '_rows (
                                            catid, listcatid, topicid, admin_id, author, sourceid, addtime, edittime, status, weight, publtime, exptime, archive, title, alias, hometext,
                                            homeimgfile, homeimgalt, homeimgthumb, inhome, allowed_comm, allowed_rating, external_link, hitstotal, hitscm, total_rating, click_rating, instant_active, instant_template,
                                            instant_creatauto
                                        ) VALUES (
                                             ' . (int) ($rand_cate_id) . ',
                                             :listcatid,
                                             0,
                                             1,
                                             :author,
                                             0,
                                             ' . (int) ($rowcontent['addtime']) . ',
                                             ' . (int) ($rowcontent['edittime']) . ',
                                             1,
                                             ' . $_weight . ',
                                             ' . (int) ($rowcontent['publtime']) . ',
                                             ' . (int) ($rowcontent['exptime']) . ',
                                            2,
                                            :title,
                                            :alias,
                                             :hometext,
                                             :homeimgfile,
                                             :homeimgalt,
                                             :homeimgthumb,
                                             1,
                                             :allowed_comm,
                                             1,
                                             0,
                                             0,
                                             0,
                                             0,
                                             0,
                                             0,
                                             :instant_template,
                                             0)';
                                        // $rand_cate_id, $html , $keyword, $post_name
                                        $data_insert = [];
                                        $data_insert['listcatid'] = $rand_cate_id;
                                        $data_insert['author'] = ' ';
                                        $data_insert['title'] = $keyword;
                                        $data_insert['alias'] = $post_name;
                                        $data_insert['hometext'] = ' ';
                                        $data_insert['homeimgfile'] = $image_thumb;
                                        $data_insert['homeimgalt'] = ' ';
                                        $data_insert['homeimgthumb'] = 1;
                                        $data_insert['allowed_comm'] = '4';
                                        $data_insert['instant_template'] = ' ';
                                        $rowcontent['id'] = $db->insert_id($sql, 'id', $data_insert);
                                       
                                        if ($rowcontent['id'] > 0) {
                                            nv_insert_logs(NV_LANG_DATA, $page_config["module_setting"], $lang_module['content_add'], $keyword, $admin_info['userid']);
                                            $ct_query = [];
                                            $rowcontent['files'] = "";
                                            $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $page_config["module_setting"] . '_detail (id, titlesite, description, bodyhtml, keywords, sourcetext, files, imgposition, layout_func, copyright, allowed_send, allowed_print, allowed_save) VALUES (
                                                ' . $rowcontent['id'] . ',
                                                :titlesite,
                                                :description,
                                                :bodyhtml,
                                                :keywords,
                                                :sourcetext,
                                                :files,
                                                ' . $rowcontent['imgposition'] . ',
                                                :layout_func,
                                                ' . $rowcontent['copyright'] . ',
                                                ' . $rowcontent['allowed_send'] . ',
                                                ' . $rowcontent['allowed_print'] . ',
                                                ' . $rowcontent['allowed_save'] . '
                                            )');
                                            $stmt->bindParam(':files', $rowcontent['files'], PDO::PARAM_STR);
                                            $stmt->bindParam(':titlesite', $rowcontent['titlesite'], PDO::PARAM_STR);
                                            $stmt->bindParam(':layout_func', $rowcontent['layout_func'], PDO::PARAM_STR);
                                            $stmt->bindParam(':description', $rowcontent['description'], PDO::PARAM_STR, strlen($rowcontent['description']));
                                            $stmt->bindParam(':bodyhtml',  $html , PDO::PARAM_STR, strlen($rowcontent['bodyhtml']));
                                            $stmt->bindParam(':keywords', $rowcontent['keywords'], PDO::PARAM_STR, strlen($rowcontent['keywords']));
                                            $stmt->bindParam(':sourcetext', $rowcontent['sourcetext'], PDO::PARAM_STR, strlen($rowcontent['sourcetext']));
                                            $ct_query[] = (int) $stmt->execute();
                            
                                          
                                            $ct_query[] = (int) $db->exec('INSERT INTO ' . NV_PREFIXLANG . '_' . $page_config["module_setting"] . '_' . $rand_cate_id . ' SELECT * FROM ' . NV_PREFIXLANG . '_' . $page_config["module_setting"] . '_rows WHERE id=' . $rowcontent['id']);
                                            
                            
                                            if (array_sum($ct_query) != sizeof($ct_query)) {
                                                $error[] = $lang_module['errorsave'];
                                            }
                                            unset($ct_query);
                                            $keyword_active_txt   = NV_UPLOADS_REAL_DIR .'/' . $module_upload.'/' . 'keyword_active_' . $rand_cate_id . '.txt';
                                            $keyword_active_value = file_exists($keyword_active_txt)?file_get_contents($keyword_active_txt):'';
                                            $keyword_active_arr   = explode("\n", wordwrap($keyword_active_value));

                                            array_push($keyword_active_arr, $keyword);
                                            $keyword_arr = array_diff($keyword_arr, $keyword_active_arr);
                                            file_put_contents($keyword_txt, implode("\n", $keyword_arr));
                                            file_put_contents($keyword_active_txt, implode("\n", $keyword_active_arr));
                                            $mess = '<span class="green-text">Thành công! Tạo được bài viết với keyword: '.$keyword.'</span>';
                                           var_dump($mess);die;
                                        } else {
                                            $mess = '<span class="red-text">Thất bại! (3) Không tạo được  bài viết với Keyword "' . $keyword . '"!</span>';
                                            var_dump($mess);die;
                                        }
                                    }
                                }
                            }
                        }else {
                            $miss = true;
                            if (isset($data_o['check_api_key'])) {
                                $check_api_key = $data_o['check_api_key'];
                            }
                            $mess = '<span class="red-text">Thất bại! (3) Không tạo được outline cho bài viết với Keyword "' . $keyword . '"! ' . $check_api_key . '</span>';
                            var_dump($mess);die;
                        }
                        
                    }
                    
                }
            }else {
                $miss = true;
                $mess = '<span class="red-text">Thất bại! (4) Keyword "' . $keyword . '" đã có bài viết rồi!</span>';
                var_dump($mess);die;
            }
        }
    }

}
