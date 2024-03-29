<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sat, 10 Feb 2018 09:55:47 GMT
 */
if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

//change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT active FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['active'])) {
        $active = ($row['active']) ? 0 : 1;
        $query = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_types SET active=' . intval($active) . ' WHERE id=' . $id;
        $db->query($query);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
    exit();
}

if ($nv_Request->isset_request('ajax_action', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_vid = $nv_Request->get_int('new_vid', 'post', 0);
    $content = 'NO_' . $id;
    if ($new_vid > 0) {
        $sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types WHERE id!=' . $id . ' ORDER BY weight ASC';
        $result = $db->query($sql);
        $weight = 0;
        while ($row = $result->fetch()) {
            ++$weight;
            if ($weight == $new_vid) ++$weight;
            $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_types SET weight=' . $weight . ' WHERE id=' . $row['id'];
            $db->query($sql);
        }
        $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_types SET weight=' . $new_vid . ' WHERE id=' . $id;
        $db->query($sql);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
    exit();
}
if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $weight = 0;
        $sql = 'SELECT weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types WHERE id =' . $db->quote($id);
        $result = $db->query($sql);
        list ($weight) = $result->fetch(3);

        $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types  WHERE id = ' . $db->quote($id));
        if ($weight > 0) {
            $sql = 'SELECT id, weight FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types WHERE weight >' . $weight;
            $result = $db->query($sql);
            while (list ($id, $weight) = $result->fetch(3)) {
                $weight--;
                $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_types SET weight=' . $weight . ' WHERE id=' . intval($id));
            }
        }
        $nv_Cache->delMod($module_name);
        Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
        die();
    }
} elseif ($nv_Request->isset_request('delete_list', 'post')) {
    $listall = $nv_Request->get_title('listall', 'post', '');
    $array_id = explode(',', $listall);

    if (!empty($array_id)) {
        foreach ($array_id as $id) {
            $sql = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_types WHERE id=" . $id;
            $db->query($sql);
        }
        $nv_Cache->delMod($module_name);
        die('OK');
    }
    die('NO');
}

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['note'] = $nv_Request->get_string('note', 'post', '');
    $row['title_mail'] = $nv_Request->get_title('title_mail', 'post', '');
    $row['content'] = $nv_Request->get_editor('content', '', NV_ALLOWED_HTML_TAGS);
    $row['birthday_title'] = $nv_Request->get_title('birthday_title', 'post', '');
    $row['birthday_content'] = $nv_Request->get_editor('birthday_content', '', NV_ALLOWED_HTML_TAGS);
	
	$row['accumulated_points_title'] = $nv_Request->get_title('accumulated_points_title', 'post', '');
    $row['accumulated_points_content'] = $nv_Request->get_editor('accumulated_points_content', '', NV_ALLOWED_HTML_TAGS);

    if (empty($row['title'])) {
        nv_jsonOutput(array(
            'error' => 1,
            'msg' => $lang_module['error_required_title'],
            'input' => 'title'
        ));
    }

    if (!empty($row['content']) && empty($row['title_mail'])) {
        nv_jsonOutput(array(
            'error' => 1,
            'msg' => $lang_module['error_required_title'],
            'input' => 'welcome_title'
        ));
    }

    if (!empty($row['birthday_content']) && empty($row['birthday_title'])) {
        nv_jsonOutput(array(
            'error' => 1,
            'msg' => $lang_module['error_required_title'],
            'input' => 'birthday_title'
        ));
    }

    try {
        if (empty($row['id'])) {
            $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_types (title, note, content, title_mail, birthday_title, birthday_content,accumulated_points_title, accumulated_points_content, weight) VALUES (:title, :note, :content, :title_mail, :birthday_title, :birthday_content, :accumulated_points_title, :accumulated_points_content, :weight)');

            $weight = $db->query('SELECT max(weight) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types')->fetchColumn();
            $weight = intval($weight) + 1;
            $stmt->bindParam(':weight', $weight, PDO::PARAM_INT);
        } else {
            $stmt = $db->prepare('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_types SET title = :title, note = :note, content = :content, title_mail = :title_mail, birthday_title = :birthday_title, birthday_content = :birthday_content , accumulated_points_title = :accumulated_points_title, accumulated_points_content = :accumulated_points_content WHERE id=' . $row['id']);
        }
        $stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
        $stmt->bindParam(':title_mail', $row['title_mail'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $row['content'], PDO::PARAM_STR);
        $stmt->bindParam(':birthday_title', $row['birthday_title'], PDO::PARAM_STR);
        $stmt->bindParam(':birthday_content', $row['birthday_content'], PDO::PARAM_STR);
		
		$stmt->bindParam(':accumulated_points_title', $row['accumulated_points_title'], PDO::PARAM_STR);
        $stmt->bindParam(':accumulated_points_content', $row['accumulated_points_content'], PDO::PARAM_STR);
		
        $stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
        $exc = $stmt->execute();
        if ($exc) {
            $nv_Cache->delMod($module_name);
            nv_jsonOutput(array(
                'error' => 0,
                'redirect' => NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op
            ));
        }
    } catch (PDOException $e) {
        trigger_error($e->getMessage());
        nv_jsonOutput(array(
            'error' => 1,
            'msg' => $lang_module['error_unknow']
        ));
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_types WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        Header('Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
        die();
    }
} else {
    $row['id'] = 0;
    $row['title'] = '';
    $row['title_mail'] = '';
    $row['note'] = '';
    $row['content'] = '';
    $row['birthday_content'] = '';
    $row['birthday_title'] = '';
	$row['accumulated_points_title'] = '';
    $row['accumulated_points_content'] = '';
    $row['active'] = 1;
}

$q = $nv_Request->get_title('q', 'post,get');

// Fetch Limit
$show_view = false;
if (!$nv_Request->isset_request('id', 'post,get')) {
    $show_view = true;
    $per_page = 20;
    $page = $nv_Request->get_int('page', 'post,get', 1);
    $db->sqlreset()
        ->select('COUNT(*)')
        ->from('' . NV_PREFIXLANG . '_' . $module_data . '_types');

    if (!empty($q)) {
        $db->where('title LIKE :q_title OR note LIKE :q_note OR active LIKE :q_active');
    }
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_title', '%' . $q . '%');
        $sth->bindValue(':q_note', '%' . $q . '%');
        $sth->bindValue(':q_active', '%' . $q . '%');
    }
    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('weight ASC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_title', '%' . $q . '%');
        $sth->bindValue(':q_note', '%' . $q . '%');
        $sth->bindValue(':q_active', '%' . $q . '%');
    }
    $sth->execute();
}

$array_replace = array(
    'FIRSTNAME' => $lang_module['firstname'],
    'LASTNAME' => $lang_module['lastname'],
    'FULLNAME' => $lang_module['fullname'],
    'TIME_PROMOTION' => $lang_module['time_promotion']
);

if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

$row['content'] = htmlspecialchars(nv_editor_br2nl($row['content']));
if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $row['content'] = nv_aleditor('content', '100%', '300px', $row['content'], 'Basic');
} else {
    $row['content'] = '<textarea style="width:100%;height:300px" name="content">' . $row['content'] . '</textarea>';
}

$row['birthday_content'] = htmlspecialchars(nv_editor_br2nl($row['birthday_content']));
if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $row['birthday_content'] = nv_aleditor('birthday_content', '100%', '300px', $row['birthday_content'], 'Basic');
} else {
    $row['birthday_content'] = '<textarea style="width:100%;height:300px" name="birthday_content">' . $row['birthday_content'] . '</textarea>';
}


$row['accumulated_points_content'] = htmlspecialchars(nv_editor_br2nl($row['accumulated_points_content']));
if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $row['accumulated_points_content'] = nv_aleditor('accumulated_points_content', '100%', '300px', $row['accumulated_points_content'], 'Basic');
} else {
    $row['accumulated_points_content'] = '<textarea style="width:100%;height:300px" name="accumulated_points_content">' . $row['accumulated_points_content'] . '</textarea>';
}


$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);

$xtpl->assign('Q', $q);

$array_action = array(
    'delete_list_id' => $lang_global['delete']
);
foreach ($array_action as $key => $value) {
    $xtpl->assign('ACTION', array(
        'key' => $key,
        'value' => $value
    ));
    $xtpl->parse('main.view.action_top');
    $xtpl->parse('main.view.action_bottom');
}

if ($show_view) {
    $base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
    if (!empty($q)) {
        $base_url .= '&q=' . $q;
    }
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.view.generate_page');
    }
    $number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
    while ($view = $sth->fetch()) {
        for ($i = 1; $i <= $num_items; ++$i) {
            $xtpl->assign('WEIGHT', array(
                'key' => $i,
                'title' => $i,
                'selected' => ($i == $view['weight']) ? ' selected="selected"' : ''
            ));
            $xtpl->parse('main.view.loop.weight_loop');
        }
        $xtpl->assign('CHECK', $view['active'] == 1 ? 'checked' : '');
        $view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
        $view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.view.loop');
    }
    $xtpl->parse('main.view');
}

foreach ($array_replace as $index => $value) {
    $xtpl->assign('NOTE', array(
        'index' => $index,
        'value' => $value
    ));
    $xtpl->parse('main.note');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['types'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
