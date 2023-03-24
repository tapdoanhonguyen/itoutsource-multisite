<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2018 TDFOSS.,LTD. All rights reserved
 * @Createdate Sat, 13 Jan 2018 13:35:09 GMT
 */
if (!defined('NV_SYSTEM')) die('Stop!!!');

define('NV_IS_MOD_TASK', true);

if (!defined('NV_IS_USER')) {
    Header('Location: ' . NV_BASE_SITEURL . 'index.php?' . NV_NAME_VARIABLE . '=users&' . NV_OP_VARIABLE . '=login&nv_redirect=' . nv_redirect_encrypt($client_info['selfurl']));
    die();
}
	
	

$array_config = $module_config[$module_name];
require_once NV_ROOTDIR . '/modules/task/site.functions.php';

if (!isset($site_mods['workforce'])) {
    $workforce_list = array();
    $where = '';

    $where .= !empty($array_config['groups_use']) ? ' AND userid IN (SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_groups_users WHERE group_id IN (' . $array_config['groups_use'] . '))' : '';
    $result = $db->query('SELECT userid, first_name, last_name, username, email FROM ' . NV_USERS_GLOBALTABLE . ' WHERE active=1' . $where);

    while ($row = $result->fetch()) {
        $row['fullname'] = nv_show_name_user($row['first_name'], $row['last_name'], $row['username']);
        $workforce_list[$row['userid']] = $row;
    }
}


if (empty($workforce_list)) {
    $contents = nv_theme_alert($lang_module['workforce_empty_title'], $lang_module['workforce_empty_content'], 'danger');
    include NV_ROOTDIR . '/includes/header.php';
    echo nv_site_theme($contents);
    include NV_ROOTDIR . '/includes/footer.php';
}

$array_leader = $workforce_assign = array();
$array_userid = $array_userid_allow = nv_task_premission($module_name, 'array_userid');

$count = $db->query('SELECT COUNT(*) FROM ' . NV_USERS_GLOBALTABLE . '_groups_users WHERE is_leader=1 AND approved=1 AND userid=' . $user_info['userid'])->fetchColumn();
if ($count > 0) {
    // nếu là trưởng nhóm bất kỳ thì có thể giao việc cho các trưởng nhóm khác
    $_query = $db->query('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_groups_users where is_leader=1');
    while (list ($userid) = $_query->fetch(3)) {
        $array_leader[] = $userid;
    }
    $array_userid_allow = $array_userid_allow + $array_leader;
} else {
    // lấy danh sách userid thuộc các nhóm người này tham gia
    $result = $db->query('SELECT userid FROM ' . NV_USERS_GLOBALTABLE . '_groups_users WHERE approved=1 AND group_id IN (SELECT group_id FROM ' . NV_USERS_GLOBALTABLE . '_groups_users WHERE approved=1 AND userid=' . $user_info['userid'] . ')');
    while (list ($userid) = $result->fetch(3)) {
        $array_userid[] = $userid;
    }
    $array_userid_allow = $array_userid_allow + $array_userid;
}
$array_userid_allow = !empty($array_userid_allow) ? array_unique($array_userid_allow) : array();

foreach (array_keys($workforce_list) as $userid) {
    if (in_array($userid, $array_userid_allow)) {
        $workforce_assign[$userid] = $workforce_list[$userid];
    }
}

function nv_task_delete($id)
{
    global $db, $module_data, $module_upload;

    $rows = $db->query('SELECT title, files FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id=' . $id)->fetch();
    if ($rows) {

        if(!nv_user_in_groups('1,2,3')){
            // Nếu user không những nhóm này (quản trị(1,2,3), ban điều hành(10), kỹ thuật(13))
            return false;
            die();
        }
        
        $count = $db->exec('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . ' WHERE id = ' . $id);
        if ($count) {
            $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_follow WHERE taskid = ' . $id);
            if (defined('NV_TASK')) {
                $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_task WHERE projectid=' . $id);
            }

            // xóa custom field
            $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_info WHERE rows_id=' . $id);

            // xóa file đính kèm
            if (!empty($rows['files'])) {
                $rows['files'] = explode(',', $rows['files']);
                foreach ($rows['files'] as $path) {
                    if (file_exists(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $path)) {
                        nv_deletefile(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $path);
                    }
                }
            }
        }
        return $rows['title'];
    }
    return '';
}

function nv_category_delete($id)
{
    global $db, $module_data, $module_upload;

    $rows = $db->query('SELECT title, files FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat WHERE id=' . $id)->fetch();
    if ($rows) {
        if(!nv_user_in_groups('1,2,3')){
            // Nếu user không những nhóm này (quản trị(1,2,3), ban điều hành(10), kỹ thuật(13))
            return false;
            die();
        }
        $count = $db->exec('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat WHERE id = ' . $id);
        if ($count) {
            $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_cat_follow WHERE taskid = ' . $id);
            // if (defined('NV_TASK')) {
            //     $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_task WHERE projectid=' . $id);
            // }

            // xóa custom field
            // $db->query('DELETE FROM ' . NV_PREFIXLANG . '_' . $module_data . '_info WHERE rows_id=' . $id);

            // xóa file đính kèm
            if (!empty($rows['files'])) {
                $rows['files'] = explode(',', $rows['files']);
                foreach ($rows['files'] as $path) {
                    if (file_exists(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $path)) {
                        nv_deletefile(NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $path);
                    }
                }
            }
        }
        return $rows['title'];
    }
    return '';
}

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

/**
 * nv_task_download()
 *
 * @param mixed $array_data
 * @param mixed $type
 * @return
 *
 */
function nv_task_download($title, $array_data, $type = 'xlsx')
{
    global $module_name, $admin_info, $lang_module, $workforce_list, $user_info, $array_field_config;

    if (empty($array_data)) {
        die('Nothing download!');
    }
    $array = array(
        'objType' => '',
        'objExt' => ''
    );
    switch ($type) {
        case 'xlsx':
            $array['objType'] = 'Excel2007';
            $array['objExt'] = 'xlsx';
            break;
        case 'ods':
            $array['objType'] = 'OpenDocument';
            $array['objExt'] = 'ods';
            break;
        default:
            $array['objType'] = 'CSV';
            $array['objExt'] = 'csv';
    }
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    // Set properties
    $objPHPExcel->getProperties()
        ->setCreator($admin_info['username'])
        ->setLastModifiedBy($admin_info['username'])
        ->setTitle($title)
        ->setSubject($title)
        ->setDescription($title)
        ->setCategory($module_name);
    $columnIndex = 0; // Cot bat dau ghi du lieu
    $rowIndex = 3; // Dong bat dau ghi du lieu
    // thông tin thành viên
    $objPHPExcel->getActiveSheet()
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex) . $rowIndex, $lang_module['number'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 1) . $rowIndex, $lang_module['title'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 2) . $rowIndex, $lang_module['useradd'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 3) . $rowIndex, $lang_module['performer'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 4) . $rowIndex, $lang_module['begintime'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 5) . $rowIndex, $lang_module['exptime'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 6) . $rowIndex, $lang_module['description'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 7) . $rowIndex, $lang_module['status'])
        ->setCellValue(PHPExcel_Cell::stringFromColumnIndex($columnIndex + 8) . $rowIndex, $lang_module['priority']);
    $i = $columnIndex + 9;

    if (!empty($array_field_config)) {
        foreach ($array_field_config as $field) {
            $objPHPExcel->getActiveSheet()->setCellValue(PHPExcel_Cell::stringFromColumnIndex($i) . $rowIndex, $field['title']);
            $i++;
        }
    }

    // Hiển thị thông tin câu trả lời
    $i = $rowIndex + 1;
    $number = 1;
    foreach ($array_data as $data) {
        // số thứ tự
        $col = PHPExcel_Cell::stringFromColumnIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $number);
        // thông tin thành viên
        $col = PHPExcel_Cell::stringFromColumnIndex(1);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['title']);
        $col = PHPExcel_Cell::stringFromColumnIndex(2);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['useradd_str']);
        $col = PHPExcel_Cell::stringFromColumnIndex(3);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['performer']);
        $col = PHPExcel_Cell::stringFromColumnIndex(4);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['begintime']);
        $col = PHPExcel_Cell::stringFromColumnIndex(5);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['exptime']);
        $col = PHPExcel_Cell::stringFromColumnIndex(6);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['description']);
        $col = PHPExcel_Cell::stringFromColumnIndex(7);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['status']);
        $col = PHPExcel_Cell::stringFromColumnIndex(8);
        $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $data['priority_title']);

        // thông tin tùy biến
        $j = $columnIndex + 9;
        if (!empty($array_field_config)) {
            foreach ($array_field_config as $field) {
                $value = isset($data['custom_field'][$field['field']]) ? $data['custom_field'][$field['field']] : '';
                $col = PHPExcel_Cell::stringFromColumnIndex($j++);
                $objPHPExcel->getActiveSheet()->setCellValue($col . $i, $value);
            }
        }

        $i++;
        $number++;
    }
    $highestRow = $i - 1;
    $highestColumn = PHPExcel_Cell::stringFromColumnIndex($j - 1);
    // Rename sheet
    $objPHPExcel->getActiveSheet()->setTitle('Sheet 1');
    // Set page orientation and size
    $objPHPExcel->getActiveSheet()
        ->getPageSetup()
        ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    $objPHPExcel->getActiveSheet()
        ->getPageSetup()
        ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    // Excel title
    $objPHPExcel->getActiveSheet()->mergeCells('A2:' . $highestColumn . '2');
    $objPHPExcel->getActiveSheet()->setCellValue('A2', $title);
    $objPHPExcel->getActiveSheet()
        ->getStyle('A2')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()
        ->getStyle('A2')
        ->getAlignment()
        ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    // Cấu hình hiển thị trong excel
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array(
                    'argb' => 'FF000000'
                )
            )
        )
    );
    $objPHPExcel->getActiveSheet()
        ->getStyle('A3' . ':' . $highestColumn . $highestRow)
        ->applyFromArray($styleArray);

    // Set font size
    $objPHPExcel->getActiveSheet()
        ->getStyle("A1:" . $highestColumn . $highestRow)
        ->getFont()
        ->setSize(13);

    $styleArray = array(
        'font' => array(
            'bold' => true
        )
    );
    $objPHPExcel->getActiveSheet()
        ->getStyle('A2')
        ->applyFromArray($styleArray);

    // Set font size
    $objPHPExcel->getActiveSheet()
        ->getStyle("A2")
        ->getFont()
        ->setSize(16);

    $objPHPExcel->getActiveSheet()
        ->getStyle("A3:" . $highestColumn . 3)
        ->getFont()
        ->setBold(true);

    // Set auto column width
    foreach (range('A', $highestColumn) as $columnID) {
        $objPHPExcel->getActiveSheet()
            ->getColumnDimension($columnID)
            ->setAutoSize(true);
    }

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $array['objType']);
    $file_src = NV_ROOTDIR . NV_BASE_SITEURL . NV_TEMP_DIR . '/' . change_alias($lang_module['post_list'] . '-' . nv_date('d/m/Y', NV_CURRENTTIME)) . '.' . $array['objExt'];
    $objWriter->save($file_src);

    $download = new NukeViet\Files\Download($file_src, NV_ROOTDIR . NV_BASE_SITEURL . NV_TEMP_DIR);
    $download->download_file();
    die();
}

function nv_check_task_admin($useradd)
{
    global $user_info, $array_config;

    $group_manage = !empty($array_config['groups_manage']) ? explode(',', $array_config['groups_manage']) : array();
    $group_manage = array_map('intval', $group_manage);

    if (!empty(array_intersect($group_manage, $user_info['in_groups'])) || $user_info['userid'] == $useradd || defined('NV_TASK_LEADER')) {
        return true;
    }
    return false;
}

function nv_task_makeLinks($value, $protocols = array('http', 'mail'), array $attributes = array())
{
    // Link attributes
    $attr = '';
    foreach ($attributes as $key => $val) {
        $attr = ' ' . $key . '="' . htmlentities($val) . '"';
    }

    $links = array();

    // Extract existing links and tags
    $value = preg_replace_callback('~(<a .*?>.*?</a>|<.*?>)~i', function ($match) use (&$links) {
        return '<' . array_push($links, $match[1]) . '>';
    }, $value);

    // Extract text links for each protocol
    foreach ((array) $protocols as $protocol) {
        switch ($protocol) {
            case 'http':
            case 'https':
                $value = preg_replace_callback('~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) {
                    if ($match[1]) $protocol = $match[1];
                    $link = $match[2] ?: $match[3];
                    return '<' . array_push($links, "<a $attr href=\"$protocol://$link\">$link</a>") . '>';
                }, $value);
                break;
            case 'mail':
                $value = preg_replace_callback('~([^\s<]+?@[^\s<]+?\.[^\s<]+)(?<![\.,:])~', function ($match) use (&$links, $attr) {
                    return '<' . array_push($links, "<a $attr href=\"mailto:{$match[1]}\">{$match[1]}</a>") . '>';
                }, $value);
                break;
            case 'twitter':
                $value = preg_replace_callback('~(?<!\w)[@#](\w++)~', function ($match) use (&$links, $attr) {
                    return '<' . array_push($links, "<a $attr href=\"https://twitter.com/" . ($match[0][0] == '@' ? '' : 'search/%23') . $match[1] . "\">{$match[0]}</a>") . '>';
                }, $value);
                break;
            default:
                $value = preg_replace_callback('~' . preg_quote($protocol, '~') . '://([^\s<]+?)(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attr) {
                    return '<' . array_push($links, "<a $attr href=\"$protocol://{$match[1]}\">{$match[1]}</a>") . '>';
                }, $value);
                break;
        }
    }

    // Insert all link
    return preg_replace_callback('/<(\d+)>/', function ($match) use (&$links) {
        return $links[$match[1] - 1];
    }, $value);
}

/**
 * nv_task_groups_list()
 *
 * @return
 */
function nv_task_groups_list($mod_data = 'users')
{
    global $nv_Cache;
    $cache_file = NV_LANG_DATA . '_groups_list_' . NV_CACHE_PREFIX . '.cache';
    if (($cache = $nv_Cache->getItem($mod_data, $cache_file)) != false) {
        return unserialize($cache);
    } else {
        global $db, $db_config, $global_config, $lang_global;

        $groups = array();
        $_mod_table = ($mod_data == 'users') ? NV_USERS_GLOBALTABLE : $db_config['prefix'] . '_' . $mod_data;
        $result = $db->query('SELECT ug.group_id, ugd.title, ug.idsite FROM ' . $_mod_table . '_groups ug LEFT JOIN ' . $_mod_table . '_groups_detail ugd ON ug.group_id = ugd.group_id WHERE ug.group_id NOT IN (4,7,5,6) AND (ug.idsite = ' . $global_config['idsite'] . ' OR (ug.idsite =0 AND ug.siteus = 1)) ORDER BY ug.idsite, ug.weight');
        while ($row = $result->fetch()) {
            if ($row['group_id'] < 9) {
                $row['title'] = $lang_global['level' . $row['group_id']];
            }
            $groups[$row['group_id']] = ($global_config['idsite'] > 0 and empty($row['idsite'])) ? '<strong>' . $row['title'] . '</strong>' : $row['title'];
        }
        $nv_Cache->setItem($mod_data, $cache_file, serialize($groups));

        return $groups;
    }
}

function normalizeFiles(&$files)
{
    $_files = [];
    $_files_count = count($files['name']);
    $_files_keys = array_keys($files);

    for ($i = 0; $i < $_files_count; $i++)
        foreach ($_files_keys as $key)
            $_files[$i][$key] = $files[$key][$i];

    return $_files;
}
// $workforce_assign[$userid]['email']
//print_r($workforce_assign[18]['email']);die;