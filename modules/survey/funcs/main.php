<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Tập Đoàn Họ Nguyễn <honguyentapdoan@gmail.com>
 * @Copyright (C) 2022 Tập Đoàn Họ Nguyễn. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Mon, 19 Dec 2022 19:21:32 GMT
 */

if (!defined('NV_IS_MOD_SURVEY'))
    die('Stop!!!');

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];
if ($nv_Request->isset_request('save', 'post')) {
    $row['usercomp'] = $nv_Request->get_int('usercomp', 'post', 0);
    $row['desktop'] = $nv_Request->get_int('desktop', 'post', 0);
    $row['laptop'] = $nv_Request->get_int('laptop', 'post', 0);
    $row['print'] = $nv_Request->get_int('print', 'post', 0);
    $row['scan'] = $nv_Request->get_int('scan', 'post', 0);

    $_window = $nv_Request->get_array('window', 'post');
    $row['window'] = !empty($_window) ? implode(',', $_window) : '';
    $row['server'] = $nv_Request->get_int('server', 'post', 0);
    $row['servernum'] = $nv_Request->get_int('servernum', 'post', 0);
    $row['serverwindow'] = $nv_Request->get_title('serverwindow', 'post', '');
    $row['telecom'] = $nv_Request->get_int('telecom', 'post', 0);
    $row['tel_model'] = $nv_Request->get_title('tel_model', 'post', '');
    $row['tel_mobile'] = $nv_Request->get_int('tel_mobile', 'post', 0);
    $row['tel_ext'] = $nv_Request->get_int('tel_ext', 'post', 0);
    $row['camera'] = $nv_Request->get_int('camera', 'post', 0);
    $row['camnum'] = $nv_Request->get_int('camnum', 'post', 0);
    $row['itos'] = $nv_Request->get_int('itos', 'post', 0);
    $row['itosname'] = $nv_Request->get_title('itosname', 'post', '');

    $_problem = $nv_Request->get_array('problem', 'post');
    $row['problem'] = !empty($_problem) ? implode(',', $_problem) : '';
    $row['email'] = $nv_Request->get_int('email', 'post', 0);
    $row['fullname'] = $nv_Request->get_title('fullname', 'post', '');
    $row['infoemail'] = $nv_Request->get_title('infoemail', 'post', '');
    $row['infomobile'] = $nv_Request->get_title('infomobile', 'post', '');
    $row['infocomname'] = $nv_Request->get_title('infocomname', 'post', '');
    $row['infoaddress'] = $nv_Request->get_title('infoaddress', 'post', '');

    if (!empty($row['infoemail']) and ($error_email = nv_check_valid_email($row['infoemail'])) != '') {
        $error[] = $error_email;
    }

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_row (usercomp, desktop, laptop, print, scan, window, server, servernum, serverwindow, telecom, tel_model, tel_mobile, tel_ext, camera, camnum, itos, itosname, problem, email, fullname, infoemail, infomobile, infocomname, infoaddress) VALUES (:usercomp, :desktop, :laptop, :print, :scan, :window, :server, :servernum, :serverwindow, :telecom, :tel_model, :tel_mobile, :tel_ext, :camera, :camnum, :itos, :itosname, :problem, :email, :fullname, :infoemail, :infomobile, :infocomname, :infoaddress)');
            } else {
                $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_row SET usercomp = :usercomp, desktop = :desktop, laptop = :laptop, print = :print, scan = :scan, window = :window, server = :server, servernum = :servernum, serverwindow = :serverwindow, telecom = :telecom, tel_model = :tel_model, tel_mobile = :tel_mobile, tel_ext = :tel_ext, camera = :camera, camnum = :camnum, itos = :itos, itosname = :itosname, problem = :problem, email = :email, fullname = :fullname, infoemail = :infoemail, infomobile = :infomobile, infocomname = :infocomname, infoaddress = :infoaddress WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':usercomp', $row['usercomp'], PDO::PARAM_INT);
            $stmt->bindParam(':desktop', $row['desktop'], PDO::PARAM_INT);
            $stmt->bindParam(':laptop', $row['laptop'], PDO::PARAM_INT);
            $stmt->bindParam(':print', $row['print'], PDO::PARAM_INT);
            $stmt->bindParam(':scan', $row['scan'], PDO::PARAM_INT);
            $stmt->bindParam(':window', $row['window'], PDO::PARAM_STR);
            $stmt->bindParam(':server', $row['server'], PDO::PARAM_INT);
            $stmt->bindParam(':servernum', $row['servernum'], PDO::PARAM_INT);
            $stmt->bindParam(':serverwindow', $row['serverwindow'], PDO::PARAM_STR);
            $stmt->bindParam(':telecom', $row['telecom'], PDO::PARAM_INT);
            $stmt->bindParam(':tel_model', $row['tel_model'], PDO::PARAM_STR);
            $stmt->bindParam(':tel_mobile', $row['tel_mobile'], PDO::PARAM_INT);
            $stmt->bindParam(':tel_ext', $row['tel_ext'], PDO::PARAM_INT);
            $stmt->bindParam(':camera', $row['camera'], PDO::PARAM_INT);
            $stmt->bindParam(':camnum', $row['camnum'], PDO::PARAM_INT);
            $stmt->bindParam(':itos', $row['itos'], PDO::PARAM_INT);
            $stmt->bindParam(':itosname', $row['itosname'], PDO::PARAM_STR);
            $stmt->bindParam(':problem', $row['problem'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $row['email'], PDO::PARAM_INT);
            $stmt->bindParam(':fullname', $row['fullname'], PDO::PARAM_STR);
            $stmt->bindParam(':infoemail', $row['infoemail'], PDO::PARAM_STR);
            $stmt->bindParam(':infomobile', $row['infomobile'], PDO::PARAM_STR);
            $stmt->bindParam(':infocomname', $row['infocomname'], PDO::PARAM_STR);
            $stmt->bindParam(':infoaddress', $row['infoaddress'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Form', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Form', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
	die; 
}
$array_data = array();

//------------------
// Viết code vào đây
//------------------

$contents = nv_theme_survey_main($array_data);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
