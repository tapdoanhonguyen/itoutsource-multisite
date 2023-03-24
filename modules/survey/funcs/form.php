<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2022 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_MOD_SURVEY'))
    die('Stop!!!');

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
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
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_row WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['usercomp'] = 1;
    $row['desktop'] = 1;
    $row['laptop'] = 1;
    $row['print'] = 0;
    $row['scan'] = 0;
    $row['window'] = '';
    $row['server'] = 0;
    $row['servernum'] = 0;
    $row['serverwindow'] = '';
    $row['telecom'] = 0;
    $row['tel_model'] = '';
    $row['tel_mobile'] = 0;
    $row['tel_ext'] = 0;
    $row['camera'] = 0;
    $row['camnum'] = 0;
    $row['itos'] = 0;
    $row['itosname'] = '';
    $row['problem'] = '';
    $row['email'] = 0;
    $row['fullname'] = '';
    $row['infoemail'] = '';
    $row['infomobile'] = '';
    $row['infocomname'] = '';
    $row['infoaddress'] = '';
}

$array_window = array();
$array_window[1] = 'Window 7/8';
$array_window[2] = 'Window 10';
$array_window[3] = 'Mac OS';
$array_window[4] = 'Other OS';
$array_window[5] = 'MS Office';

$array_server = array();
$array_server['1'] = 'Có';
$array_server['0'] = 'Không';

$array_telecom = array();
$array_telecom[1] = 'Có';

$array_camera = array();
$array_camera['1'] = 'Có';
$array_camera['0'] = 'Có';

$array_itos = array();
$array_itos['1'] = 'Có';
$array_itos['0'] = 'Có';

$array_problem = array();
$array_problem[1] = 'Hệ thống mạng không ổn định';
$array_problem[2] = 'Dữ liệu rời rạc, tìm kiếm khó khăn';
$array_problem[3] = 'Dữ liệu quan trọng chưa được bảo vệ';
$array_problem[4] = 'Khác';

$array_email = array();
$array_email['1'] = 'Có';
$array_email['0'] = 'Có';
$xtpl = new XTemplate('form.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
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


foreach ($array_window as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['window']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.checkbox_window');
}

foreach ($array_server as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['server']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_server');
}

foreach ($array_telecom as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['telecom']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_telecom');
}

foreach ($array_camera as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['camera']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_camera');
}

foreach ($array_itos as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['itos']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_itos');
}

foreach ($array_problem as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['problem']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.checkbox_problem');
}

foreach ($array_email as $key => $title) {
    $xtpl->assign('OPTION', array(
        'key' => $key,
        'title' => $title,
        'checked' => ($key == $row['email']) ? ' checked="checked"' : ''
    ));
    $xtpl->parse('main.radio_email');
}

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['form'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
