<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2023 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT status FROM ' . $db_config['prefix'] . '_' . $module_data . '_purchases WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['status']))     {
        $status = ($row['status']) ? 0 : 1;
        $query = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_purchases SET status=' . intval($status) . ' WHERE id=' . $id;
        $db->query($query);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}



if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $purchase_id=0;
        $sql = 'SELECT purchase_id FROM ' . $db_config['prefix'] . '_' . $module_data . '_purchases WHERE id =' . $db->quote($id);
        $result = $db->query($sql);
        list($purchase_id) = $result->fetch(3);
        
        $db->query('DELETE FROM ' . $db_config['prefix'] . '_' . $module_data . '_purchases  WHERE id = ' . $db->quote($id));
        if ($purchase_id > 0)         {
            $sql = 'SELECT id, purchase_id FROM ' . $db_config['prefix'] . '_' . $module_data . '_purchases WHERE purchase_id >' . $purchase_id;
            $result = $db->query($sql);
            while (list($id, $purchase_id) = $result->fetch(3))
            {
                $purchase_id--;
                $db->query('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_purchases SET purchase_id=' . $purchase_id . ' WHERE id=' . intval($id));
            }
        }
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Purchases_list', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$row = array();
$error = array();
$array_supplier_id_shops = array();
$_sql = 'SELECT id,vi_title FROM nv4_shops_supply';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_supplier_id_shops[$_row['id']] = $_row;
}

$array_warehouse_id_shops = array();
$_sql = 'SELECT id,name FROM nv4_shops_warehouses';
$_query = $db->query($_sql);
while ($_row = $_query->fetch()) {
    $array_warehouse_id_shops[$_row['id']] = $_row;
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
        ->from('' . $db_config['prefix'] . '_' . $module_data . '_purchases');

    if (!empty($q)) {
        $db->where('reference_no LIKE :q_reference_no OR date LIKE :q_date OR supplier_id LIKE :q_supplier_id OR warehouse_id LIKE :q_warehouse_id OR grand_total LIKE :q_grand_total OR payment_status LIKE :q_payment_status');
    }
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_reference_no', '%' . $q . '%');
        $sth->bindValue(':q_date', '%' . $q . '%');
        $sth->bindValue(':q_supplier_id', '%' . $q . '%');
        $sth->bindValue(':q_warehouse_id', '%' . $q . '%');
        $sth->bindValue(':q_grand_total', '%' . $q . '%');
        $sth->bindValue(':q_payment_status', '%' . $q . '%');
    }
    $sth->execute();
    $num_items = $sth->fetchColumn();

    $db->select('*')
        ->order('purchase_id ASC')
        ->limit($per_page)
        ->offset(($page - 1) * $per_page);
    $sth = $db->prepare($db->sql());

    if (!empty($q)) {
        $sth->bindValue(':q_reference_no', '%' . $q . '%');
        $sth->bindValue(':q_date', '%' . $q . '%');
        $sth->bindValue(':q_supplier_id', '%' . $q . '%');
        $sth->bindValue(':q_warehouse_id', '%' . $q . '%');
        $sth->bindValue(':q_grand_total', '%' . $q . '%');
        $sth->bindValue(':q_payment_status', '%' . $q . '%');
    }
    $sth->execute();
}

$xtpl = new XTemplate('purchases_list.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);

$xtpl->assign('Q', $q);

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
        for($i = 1; $i <= $num_items; ++$i) {
            $xtpl->assign('WEIGHT', array(
                'key' => $i,
                'title' => $i,
                'selected' => ($i == $view['purchase_id']) ? ' selected="selected"' : ''));
            $xtpl->parse('main.view.loop.purchase_id_loop');
        }
        $xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
        $view['supplier_id'] = $array_supplier_id_shops[$view['supplier_id']]['vi_title'];
        $view['warehouse_id'] = $array_warehouse_id_shops[$view['warehouse_id']]['name'];
        $view['link_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
        $view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.view.loop');
    }
    $xtpl->parse('main.view');
}


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['purchases_list'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
