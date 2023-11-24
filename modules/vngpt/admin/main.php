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

// Kiểm tra xem đang sửa có bị cướp quyền hay không, cập nhật thêm thời gian chỉnh sửa
if ($nv_Request->isset_request('id', 'post') and $nv_Request->isset_request('check_edit', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $return = 'OK_';

    $_query = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_tmp WHERE id =' . $id);
    if ($row_tmp = $_query->fetch()) {
        if ($row_tmp['admin_id'] == $admin_info['admin_id']) {
            $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_tmp SET  time_late=' . NV_CURRENTTIME . ', ip=' . $db->quote($client_info['ip']) . ' WHERE id=' . $id);
            $return = 'OK_' . $id;
        } else {
            $_username = $db->query('SELECT username FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid =' . $row_tmp['admin_id'])->fetchColumn();
            $return = 'ERROR_' . sprintf($lang_module['dulicate_edit_takeover'], $_username, date('H:i d/m/Y', $row_tmp['time_edit']));
        }
    }
    nv_htmlOutput($return);
}

if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

// Lựa chọn Layout
$selectthemes = (!empty($site_mods[$module_name]['theme'])) ? $site_mods[$module_name]['theme'] : $global_config['site_theme'];
$layout_array = nv_scandir(NV_ROOTDIR . '/themes/' . $selectthemes . '/layout', $global_config['check_op_layout']);

// Xác định và tạo các thư mục upload
$username_alias = change_alias($admin_info['username']);
$array_structure_image = [];
$array_structure_image[''] = $module_upload;
$array_structure_image['Y'] = $module_upload . '/' . date('Y');
$array_structure_image['Ym'] = $module_upload . '/' . date('Y_m');
$array_structure_image['Y_m'] = $module_upload . '/' . date('Y/m');
$array_structure_image['Ym_d'] = $module_upload . '/' . date('Y_m/d');
$array_structure_image['Y_m_d'] = $module_upload . '/' . date('Y/m/d');
$array_structure_image['username'] = $module_upload . '/' . $username_alias;

$array_structure_image['username_Y'] = $module_upload . '/' . $username_alias . '/' . date('Y');
$array_structure_image['username_Ym'] = $module_upload . '/' . $username_alias . '/' . date('Y_m');
$array_structure_image['username_Y_m'] = $module_upload . '/' . $username_alias . '/' . date('Y/m');
$array_structure_image['username_Ym_d'] = $module_upload . '/' . $username_alias . '/' . date('Y_m/d');
$array_structure_image['username_Y_m_d'] = $module_upload . '/' . $username_alias . '/' . date('Y/m/d');

$structure_upload = isset($module_config[$module_name]['structure_upload']) ? $module_config[$module_name]['structure_upload'] : 'Ym';
$currentpath = isset($array_structure_image[$structure_upload]) ? $array_structure_image[$structure_upload] : '';

if (file_exists(NV_UPLOADS_REAL_DIR . '/' . $currentpath)) {
    $upload_real_dir_page = NV_UPLOADS_REAL_DIR . '/' . $currentpath;
} else {
    $upload_real_dir_page = NV_UPLOADS_REAL_DIR . '/' . $module_upload;
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
$uploads_dir_user = NV_UPLOADS_DIR . '/' . $module_upload;
if (!defined('NV_IS_SPADMIN') and str_contains($structure_upload, 'username')) {
    $array_currentpath = explode('/', $currentpath);
    if ($array_currentpath[2] == $username_alias) {
        $uploads_dir_user = NV_UPLOADS_DIR . '/' . $module_upload . '/' . $username_alias;
    }
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

$sql = 'SELECT config_name, config_value FROM ' . NV_PREFIXLANG . '_' . $module_data . '_config';
$list = $nv_Cache->db($sql, '', $module_name);

$page_config = [];
foreach ($list as $values) {
    $page_config[$values['config_name']] = $values['config_value'];
}

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

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('FORM_AJAX', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=ajax');
$xtpl->assign('FORM_SUBMIT', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=run');
$xtpl->assign('OP', $op);

if(!empty($global_array_cat)) {
    $check_show = 1;
    foreach ($global_array_cat as $catid_i => $array_value) {
            $space = (int) ($array_value['lev']) * 30;
            $catiddisplay = '';
            $temp = [
                'catid' => $catid_i,
                'space' => $space,
                'title' => $array_value['title'],
                'disabled' => '',
                'checked' => '',
                'catidchecked' => ($catid_i == $rowcontent['catid']) ? ' checked="checked"' : '',
                'catiddisplay' => $catiddisplay
            ];
            $xtpl->assign('CATS', $temp);
            $xtpl->parse('main.catid');
    }
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
