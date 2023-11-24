<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2018 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 04 Jan 2018 08:24:14 GMT
 */
if (!defined('NV_IS_MOD_CUSTOMER')) die('Stop!!!');



if ($nv_Request->isset_request('submit', 'post,get')) {
	$row['detail'] = array();
    $detail = $nv_Request->get_array('detail', 'post');
    $i = 1;
    $grand_total = 0;
    foreach ($detail as $index => $value) {
        if ($value['itemid'] > 0 && !empty($value['module'])) {
            $value['weight'] = $i;
            $value['price'] = nv_price_format($value['price']);
            $value['unit_price'] = nv_price_format($value['unit_price']);
            $grand_total += nv_caculate_total($value['unit_price'], $value['quantity'], $value['vat']);
			
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $value['createtime'], $m)) {
				$value['createtime'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
			}
			
			if (preg_match('/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $value['duetime'], $m)) {
				$value['duetime'] = mktime(0, 0, 0, $m[2], $m[1], $m[3]);
			}
			
            $row['detail'][$i .'_'. $value['itemid'] . '_' . $value['module']] = $value;
            $i++;
        }
    }
	
	//print_r($row['detail']);die;
	
	$row['customerid'] = $nv_Request->get_int('new_id', 'post');
	$new_id = 0;
	
	//$module_data = 'invoice';
	
	 foreach ($row['detail'] as $service) {
                        
						$sth = $db->prepare('INSERT INTO ' . NV_PREFIXLANG . '_invoice_service (idinvoice, idcustomer, module, itemid, unit_price, quantity, price, vat, total, note, createtime, cycle, duetime, addtime, partner, weight) VALUES(:idinvoice, :idcustomer, :module, :itemid, :unit_price, :quantity, :price, :vat, :total, :note, :createtime, :cycle, :duetime, :addtime, :partner, :weight)');
						
							$service['addtime'] = NV_CURRENTTIME;
						
                            $service['note'] = !empty($service['note']) ? $service['note'] : '';
                            $total = $service['unit_price'] * $service['quantity'];
                            $total = $total + (($total * $service['vat']) / 100);
                            $sth->bindParam(':idinvoice', $new_id, PDO::PARAM_INT);
                            $sth->bindParam(':idcustomer', $row['customerid'], PDO::PARAM_INT);
                            $sth->bindParam(':module', $service['module'], PDO::PARAM_STR);
                            $sth->bindParam(':itemid', $service['itemid'], PDO::PARAM_INT);
                            $sth->bindParam(':unit_price', $service['unit_price'], PDO::PARAM_STR);
                            $sth->bindParam(':quantity', $service['quantity'], PDO::PARAM_INT);
                            $sth->bindParam(':price', $service['price'], PDO::PARAM_STR);
                            $sth->bindParam(':vat', $service['vat'], PDO::PARAM_STR);
                            $sth->bindParam(':total', $total, PDO::PARAM_STR);
                            $sth->bindParam(':note', $service['note'], PDO::PARAM_STR);
                            $sth->bindParam(':createtime', $service['createtime'], PDO::PARAM_INT);
                            $sth->bindParam(':cycle', $service['cycle'], PDO::PARAM_INT);
                            $sth->bindParam(':duetime', $service['duetime'], PDO::PARAM_INT);
                            $sth->bindParam(':addtime', $service['addtime'], PDO::PARAM_INT);
                            $sth->bindParam(':partner', $service['partner'], PDO::PARAM_STR);
                            $sth->bindParam(':weight', $service['weight'], PDO::PARAM_INT);
                           
							 
							try
							{
							   $exc = $sth->execute();
							}
							catch( PDOException $e )
							{
							  die( $e->getMessage() );
							}
							
							
                       
				 }
				 
	Header('Location: ' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail&id='. $row['customerid'] .'&is_contacts=0#tab2success');
	die();
	
}
