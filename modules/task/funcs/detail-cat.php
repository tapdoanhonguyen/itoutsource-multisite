<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2018 TDFOSS.,LTD. All rights reserved
 * @Createdate Sat, 13 Jan 2018 13:35:09 GMT
 */
if (!defined('NV_IS_MOD_TASK')) die('Stop!!!');

if ($nv_Request->isset_request('change_status', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);

    list ($id, $title, $performer, $useradd, $begintime, $exptime, $realtime, $status, $description) = $db->query('SELECT id, title, performer, useradd, begintime, exptime, realtime, status, description FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat WHERE id=' . $id)->fetch(3);

    if (empty($id)) {
        nv_jsonOutput(array(
            'error' => 1
        ));
    }

    $new_status = $nv_Request->get_int('new_status', 'post');

    $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_cat SET status=' . $new_status . ', edittime=' . NV_CURRENTTIME . ' ' . ($new_status == 2 ? ', realtime=' . NV_CURRENTTIME : '') . ' WHERE id=' . $id;
    $db->query($sql);

    $array_userid = nv_task_cat_get_follow($id, $module_name);

    if (!empty($array_userid) && isset($site_mods['notification']) && file_exists(NV_ROOTDIR . '/modules/notification/site.functions.php')) {
        require_once NV_ROOTDIR . '/modules/notification/site.functions.php';
        $name = $workforce_list[$user_info['userid']]['fullname'];
        $content = sprintf($lang_module['change_status'], $name, $title, $lang_module['task_status_' . $new_status]);
        $url = NV_MY_DOMAIN . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail-cat&id=' . $id;
        nv_send_notification($array_userid, $content, 'change_status', $module_name, $url);
    }

    if ($new_status == 2) {
        // gui mail thong bao
        $message = $db->query('SELECT econtent FROM ' . NV_PREFIXLANG . '_' . $module_data . '_econtent WHERE action="cpltask"')->fetchColumn();
        if (!empty($message)) {
            $useradd_email = $db->query('SELECT username, first_name, last_name, email FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid=' . $useradd)->fetch();
            $performer_email = $db->query('SELECT username, first_name, last_name, email FROM ' . NV_USERS_GLOBALTABLE . ' WHERE userid IN (' . $performer . ')')->fetch();

            $useradd_email['fullname'] = nv_show_name_user($useradd_email['first_name'], $useradd_email['last_name'], $useradd_email['username']);
            $performer_email['fullname'] = nv_show_name_user($performer_email['first_name'], $performer_email['last_name'], $performer_email['username']);

            $user_working = array();
            foreach ($row['performer'] as $userid) {
                $user_working[] = $workforce_list[$userid]['fullname'];
            }
            $user_working = !empty($user_working) ? implode(', ', $user_working) : '';
            $array_replace = array(
                'SITE_NAME' => $global_config['site_name'],
                'TITLE' => $title,
                'USER_ADD' => $useradd_email['fullname'],
                'USER_WORKING' => $performer_email['fullname'],
                'TIME_START' => !empty($begintime) ? nv_date('H:i d/m/Y', $begintime) : '',
                'TIME_END' => !empty($exptime) ? nv_date('H:i d/m/Y', $exptime) : '',
                'TIME_REAL' => !empty($realtime) ? nv_date('H:i d/m/Y', $realtime) : '',
                'CONTENT' => $description,
                'STATUS' => nv_task_get_status($status, $exptime),
                'TASK_URL' => NV_MY_DOMAIN . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail-cat&amp;id=' . $id
            );
            $message = nv_unhtmlspecialchars($message);
            foreach ($array_replace as $index => $value) {
                $message = str_replace('[' . $index . ']', $value, $message);
            }

            $mail = new NukeViet\Core\Sendmail($global_config, NV_LANG_INTERFACE);
            $mail->addReplyTo($workforce_list[$user_info['userid']]['email'], $workforce_list[$user_info['userid']]['fullname']);
            $mail->Content($message);
            $mail->Subject($row['title']);

            $performer = explode(',', $performer);
            foreach ($performer as $userid) {
                $mail->To($useradd_email['email'], $workforce_list[$userid]['fullname']);
                if (!$mail->Send()) {
                    trigger_error($lang_module['error_send_mail']);
                }
            }
        } else {
            //
        }
    }

    $url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $id;
    $content = sprintf($lang_module['logs_change_status_note'], $title, $lang_module['task_status_' . $status], $lang_module['task_status_' . $new_status]);
    nv_insert_logs(NV_LANG_DATA, $module_name, $lang_module['logs_change_status'], $content, $user_info['userid'], $url);
    $nv_Cache->delMod($module_name);

    die('OK_' . $id);
}

if ($nv_Request->isset_request('change_priority', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_priority = $nv_Request->get_int('new_priority', 'post');

    if (empty($id)) {
        die('NO_' . $id);
    }

    $rows = $db->query('SELECT title, status FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat WHERE id=' . $id)->fetch();
    if ($rows) {
        $sql = 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_cat SET priority=' . $new_priority . ' WHERE id=' . $id;
        $db->query($sql);

        $url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $id;
        $content = sprintf($lang_module['logs_change_priority_note'], $rows['title'], $lang_module['priority' . $rows['status']], $lang_module['priority' . $new_priority]);
        nv_insert_logs(NV_LANG_DATA, $module_name, $lang_module['logs_change_priority'], $content, $user_info['userid']);

        $nv_Cache->delMod($module_name);
        die('OK_' . $id);
    }
    die('NO_' . $id);
}

$id = $nv_Request->get_int('id', 'get', 0);

$customer_info2 = nv_crm_customer_info_by_userid($user_info['userid']);
if(!empty($customer_info2) and !nv_user_in_groups('1,2,3,10,11,12,13,17,18')){
    $list_projectid = $db->query('SELECT id FROM ' . NV_PREFIXLANG . '_projects WHERE customerid = ' . $customer_info2['customer_id'])->fetchAll();

    foreach ($list_projectid as $key => $value) {
        $array_list_projectid[] = $value['id'];
    }
    $list_projectid = implode(',', $array_list_projectid);

    $rows = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat t1 INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_cat_follow t2 ON t1.id=t2.catid WHERE t1.id=' . $id . ' AND projectid IN ('.$list_projectid.')')->fetch();
}
else{
    $rows = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat t1 INNER JOIN ' . NV_PREFIXLANG . '_' . $module_data . '_cat_follow t2 ON t1.id=t2.catid WHERE id=' . $id . nv_task_premission($module_name))->fetch();
}


if (!$rows) {
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
}

$rows['useradd_str'] = !empty($workforce_list[$rows['useradd']]['fullname']) ? $workforce_list[$rows['useradd']]['fullname'] : '';
$rows['begintime'] = !empty($rows['begintime']) ? nv_date('H:i d/m/Y', $rows['begintime']) : '-';
$rows['exptime'] = !empty($rows['exptime']) ? nv_date('H:i d/m/Y', $rows['exptime']) : '-';
$rows['realtime'] = !empty($rows['realtime']) ? nv_date('H:i d/m/Y', $rows['realtime']) : '-';
$rows['description'] = nv_nl2br($rows['description']);
$rows['description'] = nv_task_makeLinks($rows['description']);

if ($nv_Request->isset_request('download', 'get')) {
    $fileid = $nv_Request->get_int('fileid', 'get', 0);
    $rows['files'] = explode(',', $rows['files']);

    if (!isset($rows['files'][$fileid])) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name, true);
    }

    if (!file_exists(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $rows['files'][$fileid])) {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name, true);
    }

    $file_info = pathinfo(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $rows['files'][$fileid]);

    $download = new NukeViet\Files\Download(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $rows['files'][$fileid], $file_info['dirname'], $file_info['basename'], true);
    $download->download_file();
    exit();
}

if ($nv_Request->isset_request('pdf', 'get')) {
    $fileid = $nv_Request->get_int('fileid', 'get', 0);
    $rows['files'] = explode(',', $rows['files']);

    if (!isset($rows['files'][$fileid])) {
        nv_info_die($lang_global['error_404_title'], $lang_global['error_404_title'], $lang_global['error_404_content'], 404);
    }

    if (!file_exists(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $rows['files'][$fileid])) {
        nv_info_die($lang_global['error_404_title'], $lang_global['error_404_title'], $lang_global['error_404_content'], 404);
    }

    $file_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail&download=1&id=' . $id . '&fileid=' . $fileid;
    $contents = nv_theme_viewpdf($file_url);
    nv_htmlOutput($contents);
}

$array_groups = nv_task_groups_list();
$rows['performer_str'] = array();
$performer = !empty($rows['performer']) ? explode(',', $rows['performer']) : array();
$groups_made = !empty($rows['groups_made']) ? explode(',', $rows['groups_made']) : array();
if (!empty($performer)) {
    foreach ($performer as $userid) {
        $rows['performer_str'][] = $workforce_list[$userid]['fullname'];
    }
}
if (!empty($groups_made)) {
    foreach ($groups_made as $groupid) {
        $rows['performer_str'][] = $array_groups[$groupid];
    }
}
$rows['performer_str'] = !empty($rows['performer_str']) ? implode(', ', $rows['performer_str']) : '';

$array_field_config = array();
$result_field = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_field WHERE show_profile=1 ORDER BY weight ASC');
while ($row_field = $result_field->fetch()) {
    $language = unserialize($row_field['language']);
    $row_field['title'] = (isset($language[NV_LANG_DATA])) ? $language[NV_LANG_DATA][0] : $row['field'];
    $row_field['description'] = (isset($language[NV_LANG_DATA])) ? nv_htmlspecialchars($language[NV_LANG_DATA][1]) : '';
    if (!empty($row_field['field_choices'])) {
        $row_field['field_choices'] = unserialize($row_field['field_choices']);
    } elseif (!empty($row_field['sql_choices'])) {
        $row_field['sql_choices'] = explode('|', $row_field['sql_choices']);
        $query = 'SELECT ' . $row_field['sql_choices'][2] . ', ' . $row_field['sql_choices'][3] . ' FROM ' . $row_field['sql_choices'][1];
        $result = $db->query($query);
        $weight = 0;
        while (list ($key, $val) = $result->fetch(3)) {
            $row_field['field_choices'][$key] = $val;
        }
    }
    $array_field_config[] = $row_field;
}
// $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_info WHERE rows_id=' . $id;
// $result = $db->query($sql);
// $custom_fields = $result->fetch();

if ($nv_Request->isset_request('print', 'get')) {
    $message = $db->query('SELECT econtent FROM ' . NV_PREFIXLANG . '_' . $module_data . '_econtent WHERE action="print"')->fetchColumn();
    if (!empty($message)) {
        $array_replace = array(
            'SITE_NAME' => $global_config['site_name'],
            'TITLE' => $rows['title'],
            'USER_ADD' => $rows['useradd_str'],
            'USER_WORKING' => $rows['performer_str'],
            'TIME_START' => $rows['begintime'],
            'TIME_END' => $rows['exptime'],
            'TIME_REAL' => $rows['realtime'],
            'CONTENT' => $rows['description'],
            'STATUS' => nv_task_get_status($rows['status'], $rows['exptime']),
            'TASK_URL' => NV_MY_DOMAIN . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $id
        );
        $message = nv_unhtmlspecialchars($message);
        foreach ($array_replace as $index => $value) {
            $message = str_replace('[' . $index . ']', $value, $message);
        }
    }
    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file);
    $xtpl->assign('CONTENT', $message);

    $xtpl->parse('print');
    $contents = $xtpl->text('print');

    include NV_ROOTDIR . '/includes/header.php';
    echo nv_site_theme($contents, false);
    include NV_ROOTDIR . '/includes/footer.php';
}

// comment
if (isset($site_mods['comment']) and isset($module_config[$module_name]['activecomm'])) {
    define('NV_COMM_ID', $id);
    define('NV_COMM_AREA', $module_info['funcs'][$op]['func_id']);
    $allowed = $module_config[$module_name]['allowed_comm'];
    if ($allowed == '-1') {
        $allowed = $news_contents['allowed_comm'];
    }

    define('NV_PER_PAGE_COMMENT', 5);

    require_once NV_ROOTDIR . '/modules/comment/comment.php';
    $area = (defined('NV_COMM_AREA')) ? NV_COMM_AREA : 0;
    $checkss = md5($module_name . '-' . $area . '-' . NV_COMM_ID . '-' . $allowed . '-' . NV_CACHE_PREFIX);

    $url_info = parse_url($client_info['selfurl']);
    $content_comment = nv_comment_module($module_name, $checkss, $area, NV_COMM_ID, $allowed, 1);
} else {
    $content_comment = '';
}

if (!empty($rows['files'])) {
    $files = explode(',', $rows['files']);
    $rows['files'] = array();
    foreach ($files as $file_id => $file) {
        $file_title = (!preg_match("/^http*/", $file)) ? basename($file) : $lang_module['click_to_download'];
        $rows['files'][] = array(
            'title' => $file_title,
            'key' => md5($file_id . $file_title),
            'ext' => nv_getextension($file_title),
            'titledown' => $lang_module['download'] . ' ' . (count($files) > 1 ? $file_id + 1 : ''),
            'src' => NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $file,
            'url' => (!preg_match("/^http*/", $file)) ? NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=download&id=' . $rows['id'] . '&index=' . $file_id : $file,
            'urlpdf' => $client_info['selfurl'] . '&amp;pdf=1&amp;fileid=' . $file_id,
            'urldoc' => (preg_match("/^http*/", $file)) ? $file : 'https://docs.google.com/viewer?embedded=true&url=' . NV_MY_DOMAIN . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $file
        );
    }
}

if (empty($rows['readed'])) {
    $count = $db->exec('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_cat_follow SET readed=1 WHERE catid=' . $rows['id'] . ' AND userid=' . $user_info['userid']);
    if (empty($count)) {
        try {
            $stmt = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . '_cat_follow(taskid, userid, readed) VALUES(:taskid, :userid, 1)');
            $stmt->bindParam(':taskid', $rows['id'], PDO::PARAM_INT);
            $stmt->bindParam(':userid', $user_info['userid'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            // có rồi khỏi insert
        }
    }
}

if ($rows['projectid']) {
    $rows['project'] = $db->query('SELECT id, title FROM ' . NV_PREFIXLANG . '_projects WHERE id=' . $rows['projectid'])->fetch();
    $rows['project']['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=projects&amp;' . NV_OP_VARIABLE . '=detail&id=' . $rows['projectid'];
}

$array_control = array(
    'url_change_read' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;change_read=' . $rows['id'],
    'url_add' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=cat',
    'url_edit' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=cat&amp;id=' . $rows['id'] . '&amp;redirect=' . nv_redirect_encrypt($client_info['selfurl']),
    'url_delete' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;delete_id=' . $rows['id'] . '&amp;delete_checkss=' . md5($rows['id'] . NV_CACHE_PREFIX . $client_info['session_id']),
    'url_print' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $rows['id'] . '&amp;print=1'
);

$rows_cong_viec = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE catid = ' . $rows['id'])->fetchAll();

$array_congviec = array();
$allProgress = 0;
if(!empty($rows_cong_viec)){
	$countAll = count($rows_cong_viec);
	foreach ($rows_cong_viec as $congviec) {
		$allProgress += $congviec['progress'];
		
		$congviec['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=task&amp;' . NV_OP_VARIABLE . '=detail&amp;id=' . $congviec['id'];
		
		$array_performer_name = array();
		if(!empty($congviec['performer'])){
			$array_performer = explode(',', $congviec['performer']);
			foreach($array_performer as $cv_performer_id){
				$array_performer_name[] = $workforce_list[$cv_performer_id]['fullname'];
			}
			unset($array_performer);
		}
		$congviec['str_performer'] = implode(', ', $array_performer_name);
		if($congviec['exptime']){
			$congviec['exptime'] = nv_date('H:i d/m/Y', $congviec['exptime']);
		}
		if($congviec['realtime']){
			$congviec['realtime'] = nv_date('H:i d/m/Y', $congviec['realtime']);
		}
		$congviec['priority_str'] = $lang_module['priority' . $congviec['priority']];
		$congviec['status_str'] = $lang_module['task_status_' . $congviec['status']];
		
		$congviec['addtime'] = nv_date('H:i d/m/Y', $congviec['addtime']);
		$congviec['begintime'] = nv_date('H:i d/m/Y', $congviec['begintime']);
		$array_congviec[$congviec['id']] = $congviec;
	}
	$rows['progress'] = round($allProgress / $countAll); 
}
else{
	$countAll = 0;
	$rows['progress'] = 0;
}

$contents = nv_theme_task_detail($rows, $content_comment, $array_control, $array_congviec);

$page_title = $rows['title'];
$array_mod_title[] = array(
    'title' => $page_title,
    'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op
);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
