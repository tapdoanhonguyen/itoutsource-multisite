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


$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['reference_no'] = $nv_Request->get_title('reference_no', 'post', '');
    $row['date'] = $nv_Request->get_int('date', 'post', 0);
    $row['supplier_id'] = $nv_Request->get_int('supplier_id', 'post', 0);
    $row['warehouse_id'] = $nv_Request->get_int('warehouse_id', 'post', 0);
    $row['note'] = $nv_Request->get_textarea('note', '', NV_ALLOWED_HTML_TAGS);
    $row['total'] = $nv_Request->get_title('total', 'post', '');
    $row['product_discount'] = $nv_Request->get_title('product_discount', 'post', '');
    $row['order_discount_id'] = $nv_Request->get_title('order_discount_id', 'post', '');
    $row['order_discount'] = $nv_Request->get_title('order_discount', 'post', '');
    $row['total_discount'] = $nv_Request->get_title('total_discount', 'post', '');
    $row['product_tax'] = $nv_Request->get_title('product_tax', 'post', '');
    $row['order_tax'] = $nv_Request->get_title('order_tax', 'post', '');
    $row['total_tax'] = $nv_Request->get_title('total_tax', 'post', '');
    $row['shipping'] = $nv_Request->get_title('shipping', 'post', '');
    $row['grand_total'] = $nv_Request->get_title('grand_total', 'post', '');
    $row['payment_status'] = $nv_Request->get_int('payment_status', 'post', 0);
    $row['attachment'] = $nv_Request->get_title('attachment', 'post', '');
    if (is_file(NV_DOCUMENT_ROOT . $row['attachment']))     {
        $row['attachment'] = substr($row['attachment'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/'));
    } else {
        $row['attachment'] = '';
    }
    $row['due_date'] = $nv_Request->get_title('due_date', 'post', '');

    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['order_tax_id'] = 0;
                $row['paid'] = '0.0000';
                $row['created_by'] = 0;
                $row['updated_by'] = 0;
                $row['updated_at'] = 'NULL';
                $row['payment_term'] = 0;
                $row['return_id'] = 0;
                $row['surcharge'] = '0.0000';
                $row['return_purchase_ref'] = 'NULL';
                $row['return_purchase_total'] = '0.0000';
                $row['cgst'] = 'NULL';
                $row['sgst'] = 'NULL';
                $row['igst'] = 'NULL';
                $row['puidsite'] = 0;
                $row['puparentid'] = 0;

                $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_purchases (reference_no, date, supplier_id, warehouse_id, note, total, product_discount, order_discount_id, order_discount, total_discount, product_tax, order_tax_id, order_tax, total_tax, shipping, grand_total, paid, status, payment_status, created_by, updated_by, updated_at, attachment, payment_term, due_date, return_id, surcharge, return_purchase_ref, purchase_id, return_purchase_total, cgst, sgst, igst, puidsite, puparentid) VALUES (:reference_no, :date, :supplier_id, :warehouse_id, :note, :total, :product_discount, :order_discount_id, :order_discount, :total_discount, :product_tax, :order_tax_id, :order_tax, :total_tax, :shipping, :grand_total, :paid, :status, :payment_status, :created_by, :updated_by, :updated_at, :attachment, :payment_term, :due_date, :return_id, :surcharge, :return_purchase_ref, :purchase_id, :return_purchase_total, :cgst, :sgst, :igst, :puidsite, :puparentid)');

                $stmt->bindParam(':order_tax_id', $row['order_tax_id'], PDO::PARAM_INT);
                $stmt->bindParam(':paid', $row['paid'], PDO::PARAM_STR);
                $stmt->bindValue(':status', 1, PDO::PARAM_INT);

                $stmt->bindParam(':created_by', $row['created_by'], PDO::PARAM_INT);
                $stmt->bindParam(':updated_by', $row['updated_by'], PDO::PARAM_INT);
                $stmt->bindParam(':updated_at', $row['updated_at'], PDO::PARAM_STR);
                $stmt->bindParam(':payment_term', $row['payment_term'], PDO::PARAM_INT);
                $stmt->bindParam(':return_id', $row['return_id'], PDO::PARAM_INT);
                $stmt->bindParam(':surcharge', $row['surcharge'], PDO::PARAM_STR);
                $stmt->bindParam(':return_purchase_ref', $row['return_purchase_ref'], PDO::PARAM_STR);
                $weight = $db->query('SELECT max(purchase_id) FROM ' . $db_config['prefix'] . '_' . $module_data . '_purchases')->fetchColumn();
                $weight = intval($weight) + 1;
                $stmt->bindParam(':purchase_id', $weight, PDO::PARAM_INT);

                $stmt->bindParam(':return_purchase_total', $row['return_purchase_total'], PDO::PARAM_STR);
                $stmt->bindParam(':cgst', $row['cgst'], PDO::PARAM_STR);
                $stmt->bindParam(':sgst', $row['sgst'], PDO::PARAM_STR);
                $stmt->bindParam(':igst', $row['igst'], PDO::PARAM_STR);
                $stmt->bindParam(':puidsite', $row['puidsite'], PDO::PARAM_INT);
                $stmt->bindParam(':puparentid', $row['puparentid'], PDO::PARAM_INT);

            } else {
                $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_purchases SET reference_no = :reference_no, date = :date, supplier_id = :supplier_id, warehouse_id = :warehouse_id, note = :note, total = :total, product_discount = :product_discount, order_discount_id = :order_discount_id, order_discount = :order_discount, total_discount = :total_discount, product_tax = :product_tax, order_tax = :order_tax, total_tax = :total_tax, shipping = :shipping, grand_total = :grand_total, payment_status = :payment_status, attachment = :attachment, due_date = :due_date WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':reference_no', $row['reference_no'], PDO::PARAM_STR);
            $stmt->bindParam(':date', $row['date'], PDO::PARAM_INT);
            $stmt->bindParam(':supplier_id', $row['supplier_id'], PDO::PARAM_INT);
            $stmt->bindParam(':warehouse_id', $row['warehouse_id'], PDO::PARAM_INT);
            $stmt->bindParam(':note', $row['note'], PDO::PARAM_STR, strlen($row['note']));
            $stmt->bindParam(':total', $row['total'], PDO::PARAM_STR);
            $stmt->bindParam(':product_discount', $row['product_discount'], PDO::PARAM_STR);
            $stmt->bindParam(':order_discount_id', $row['order_discount_id'], PDO::PARAM_STR);
            $stmt->bindParam(':order_discount', $row['order_discount'], PDO::PARAM_STR);
            $stmt->bindParam(':total_discount', $row['total_discount'], PDO::PARAM_STR);
            $stmt->bindParam(':product_tax', $row['product_tax'], PDO::PARAM_STR);
            $stmt->bindParam(':order_tax', $row['order_tax'], PDO::PARAM_STR);
            $stmt->bindParam(':total_tax', $row['total_tax'], PDO::PARAM_STR);
            $stmt->bindParam(':shipping', $row['shipping'], PDO::PARAM_STR);
            $stmt->bindParam(':grand_total', $row['grand_total'], PDO::PARAM_STR);
            $stmt->bindParam(':payment_status', $row['payment_status'], PDO::PARAM_INT);
            $stmt->bindParam(':attachment', $row['attachment'], PDO::PARAM_STR);
            $stmt->bindParam(':due_date', $row['due_date'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Purchases', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Purchases', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_purchases WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
} else {
    $row['id'] = 0;
    $row['reference_no'] = '';
    $row['date'] = date('d/m/Y', NV_CURRENTTIME);
    $row['supplier_id'] = 0;
    $row['warehouse_id'] = 0;
    $row['note'] = '';
    $row['total'] = '0';
    $row['product_discount'] = '0';
    $row['order_discount_id'] = '0';
    $row['order_discount'] = '0';
    $row['total_discount'] = '0';
    $row['product_tax'] = '0';
    $row['order_tax'] = '0';
    $row['total_tax'] = '0.0000';
    $row['shipping'] = '0.0000';
    $row['grand_total'] = '';
    $row['payment_status'] = 0;
    $row['attachment'] = '';
    $row['due_date'] = '';
}
if (!empty($row['attachment']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $row['attachment'])) {
    $row['attachment'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['attachment'];
}
 
$row['note'] = nv_htmlspecialchars(nv_br2nl($row['note']));
$from = $db_config['prefix'] . '_' . $module_data . '_rows AS a LEFT JOIN ' . NV_USERS_GLOBALTABLE . ' AS b ON a.user_id=b.userid';
$order = 'asc';
$ord_sql = NV_LANG_DATA . '_title' . ' ' . $order;
$db->sqlreset()->select('id, listcatid, user_id, homeimgfile, homeimgthumb, ' . NV_LANG_DATA . '_title, ' . NV_LANG_DATA . '_alias, hitstotal, status, edittime, publtime, exptime, product_number, product_price, money_unit, product_unit, num_sell, username')->from($from)->order($ord_sql);

$result = $db->query($db->sql());
$array_data = $result->fetch();

$xtpl = new XTemplate('purchases.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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


if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}
foreach ($array_supplier_id_shops as $data) {
	if($data['id'] == $row['supplier_id'])
		$data['selected'] = 'selected="selected"';
	else
		$data['selected'] = '';
	$xtpl->assign('OPTION', $data);
	$xtpl->parse('main.select_supplier_id');
}
foreach ($array_warehouse_id_shops as $data) {
	if($data['id'] == $row['warehouse_id'])
		$data['selected'] = 'selected="selected"';
	else
		$data['selected'] = '';
	$xtpl->assign('OPTION', $data);
	$xtpl->parse('main.select_warehouse_id');
}
$i=1;
$array_datas[] = 1;
foreach ($array_datas as $data) {
	$data['no'] = $i;
	$data['product_unit'] = $array_unit[$data['product_unit']]['title'];
	$data['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $global_array_shops_cat[$data['listcatid']]['alias'] . '/' . $data['alias'] . $global_config['rewrite_exturl'];
	$xtpl->assign('DATA', $data);
	
	$xtpl->parse('main.loop.itemsjs.loop');
	$xtpl->parse('main.loop.itemsjs');
	$j=0;
	$xtpl->assign('J', $j);

	if (!empty($money_config)) {
		foreach ($money_config as $code => $info) {
			$info['selected'] = ($data['money_unit'] == $code) ? "selected=\"selected\"" : "";
			$xtpl->assign('MON', $info);
			$xtpl->parse('main.loop.money_unit');
			$xtpl->parse('main.loop.money_unit_js');
		}
	}
	$xtpl->parse('main.loop.items');
	$xtpl->parse('main.loop.product_number');
	
	$i++;
}
$xtpl->parse('main.loop');
$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['purchases'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
