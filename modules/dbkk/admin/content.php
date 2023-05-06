<?php

/**
 * @Project NUKEVIET 4.x
 * @Author DACLOI.,JSC <saka.dacloi@gmail.com>
 * @Copyright (C) 2023 DACLOI.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 28 Apr 2023 13:15:07 GMT
 */

 if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$id = $nv_Request->get_int('id', 'post,get', 0);
$copy = $nv_Request->get_int('copy', 'get,post', 0);


if ($id) {
    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $id;
    $row = $db->query($sql)->fetch();

    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }

    $page_title = $lang_module['edit'];
    $action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $id;
} else {
    $page_title = $lang_module['add'];
    $action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
}

$selectthemes = (!empty($site_mods[$module_name]['theme'])) ? $site_mods[$module_name]['theme'] : $global_config['site_theme'];
$layout_array = nv_scandir(NV_ROOTDIR . '/themes/' . $selectthemes . '/layout', $global_config['check_op_layout']);
$error = '';
$groups_list = nv_groups_list();


if ($nv_Request->get_int('save', 'post') == '1') {
    $row['title'] = nv_substr($nv_Request->get_title('title', 'post', ''), 0, 250);
    $row['ma_dbkk'] = $nv_Request->get_string('mabkk', 'post',  '');

    //var_dump($row['ma_dbkk']);die;
    $row['keywords'] = nv_strtolower($nv_Request->get_title('keywords', 'post', '', 0));
    $row['socialbutton'] = $nv_Request->get_int('socialbutton', 'post', 0);
    $row['layout_func'] = $nv_Request->get_title('layout_func', 'post', '');

    if (!empty($row['layout_func']) and !in_array('layout.' . $row['layout_func'] . '.tpl', $layout_array, true)) {
        $row['layout_func'] = '';
    }

    if (empty($row['title'])) {
        $error = $lang_module['empty_title'];
    }  else {
        
        if ($id) {
            $_sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET
                title = :title, ma_dbkk = :ma_dbkk, keywords = :keywords, layout_func = :layout_func,
                edit_time = ' . NV_CURRENTTIME . '
            WHERE id =' . $id;
        } else {
           
            if ($page_config['news_first']) {
                $weight = 1;
            } else {
                $weight = $db->query('SELECT MAX(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data)->fetchColumn();
                $weight = (int) $weight + 1;
            }
            
            $_sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . ' (
                title, ma_dbkk, keywords, layout_func, weight, admin_id, add_time, edit_time, status
            ) VALUES (
                :title, :ma_dbkk, :keywords, :layout_func, ' . $weight . ',
                ' . $admin_info['admin_id'] . ', ' . NV_CURRENTTIME . ', ' . NV_CURRENTTIME . ', 1
            )';
        }

        try {
            $sth = $db->prepare($_sql);
            $sth->bindParam(':title', $row['title'], PDO::PARAM_STR);
            $sth->bindParam(':ma_dbkk', $row['ma_dbkk']);
            $sth->bindParam(':keywords', $row['keywords'], PDO::PARAM_STR);
            $sth->bindParam(':layout_func', $row['layout_func'], PDO::PARAM_STR);
            $sth->execute();
            if ($sth->rowCount()) {
                if ($id and !$copy) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit', 'ID: ' . $id, $admin_info['userid']);
                } else {
                    if ($page_config['news_first']) {
                        $id = $db->lastInsertId();
                        $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET weight=weight+1 WHERE id!=' . $id);
                    }
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add', ' ', $admin_info['userid']);
                }

                $nv_Cache->delMod($module_name);
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
            } else {
                $error = $lang_module['errorsave'];
            }
        } catch (PDOException $e) {
            trigger_error(print_r($e, true));
            $error = $lang_module['errorsave'];
        }
    }
} elseif (empty($id)) {
    $row['layout_func'] = '';
}

$lang_global['title_suggest_max'] = sprintf($lang_global['length_suggest_max'], 65);
$lang_global['description_suggest_max'] = sprintf($lang_global['length_suggest_max'], 160);

$xtpl = new XTemplate('content.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);
$xtpl->assign('FORM_ACTION', $action);
$xtpl->assign('UPLOADS_DIR_USER', NV_UPLOADS_DIR . '/' . $module_upload);
$xtpl->assign('DATA', $row);
$xtpl->assign('ISCOPY', $copy);

foreach ($layout_array as $value) {
    $value = preg_replace($global_config['check_op_layout'], '\\1', $value);
    $xtpl->assign('LAYOUT_FUNC', [
        'key' => $value,
        'selected' => ($row['layout_func'] == $value) ? ' selected="selected"' : ''
    ]);
    $xtpl->parse('main.layout_func');
}


if ($error) {
    $xtpl->assign('ERROR', $error);
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
