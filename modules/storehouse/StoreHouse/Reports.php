<?php
/**
 * @Project NUKEVIET 4.x
 * @Author NV SYSTEMS (hoangnt@nguyenvan.vn)
 * @Copyright (C) 2013 NV SYSTEMS. All rights reserved
 * @Blog http://nguyenvan.vn
 * @Developers http://nukeviet.systems
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Mon, 20 Oct 2014 14:00:59 GMT
 */
namespace NukeViet\StoreHouse;
use PDO;
use PDOException;class Reports extends MY_Controller{

    public function __construct($purchaesRegistry = array())
    {
		global $db_config, $db, $nv_Request;
		parent::__construct($purchaesRegistry);
		$this->reports_model = &load_class('Reports_model');		$this->load->library('form_validation');
    }
	public function Products()
    {
    	
        //$this->sma->checkPermissions();
        //$this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['categories'] = $this->site->getAllCategories();
        $this->data['brands'] = $this->site->getAllBrands();
        $this->data['warehouses'] = $this->site->getAllWarehouses();
        /*
        if (!empty($this->input['start_date'])) {
                    $dt = "From " . $this->input['start_date'] . " to " . $this->input['end_date'];
                } else {
                    $dt = "Till " . $this->input['end_date'];
                }*/
        
        //$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('reports'), 'page' => lang('reports')), array('link' => '#', 'page' => lang('products_report')));
        //$meta = array('page_title' => lang('products_report'), 'bc' => $bc);
        //$this->page_construct('reports/products', $meta, $this->data);
        /*
        $rpproduct="SELECT products.code, products.name,COALESCE( PCosts.purchasedQty, 0 ) as PurchasedQty, COALESCE( PSales.soldQty, 0 ) as SoldQty,COALESCE( PCosts.balacneQty, 0 ) as BalacneQty, COALESCE( PCosts.totalPurchase, 0 ) as TotalPurchase, COALESCE( PCosts.balacneValue, 0 ) as TotalBalance, COALESCE( PSales.totalSale, 0 ) as TotalSales,  (COALESCE( PSales.totalSale, 0 ) - COALESCE( PCosts.totalPurchase, 0 )) as Profit FROM sma_products products 
        left Join ( SELECT si.product_id, SUM( si.quantity ) soldQty, SUM( si.subtotal ) totalSale from sma_sales s JOIN sma_sale_items si on s.id = si.sale_id GROUP BY si.product_id) PSales ON products.id = PSales.product_id 
        LEFT JOIN (SELECT product_id, SUM(CASE WHEN pi.purchase_id IS NOT NULL THEN quantity ELSE 0 END) as purchasedQty, SUM(quantity_balance) as balacneQty, SUM( unit_cost * quantity_balance ) balacneValue, SUM( (CASE WHEN pi.purchase_id IS NOT NULL THEN (pi.subtotal) ELSE 0 END) ) totalPurchase from sma_purchase_items pi LEFT JOIN sma_purchases p on p.id = pi.purchase_id WHERE p.status != 'pending' AND p.status != 'ordered' GROUP BY pi.product_id ) PCosts ON products.id = PCosts.product_id GROUP BY products.code, PSales.soldQty, PSales.totalSale, PCosts.purchasedQty, PCosts.totalPurchase, PCosts.balacneQty, PCosts.balacneValue";*/
        
    	return $this->getProductsReport();
		
    }
    public function getProductsReport()
    { 
    	$rpproduct=$this->db->sqlreset()->select ('products.id,products.code, products.name,COALESCE( PCosts.purchasedQty, 0 ) as PurchasedQty, COALESCE( PSales.soldQty, 0 ) as SoldQty,COALESCE( PCosts.balacneQty, 0 ) as BalacneQty, COALESCE( PCosts.totalPurchase, 0 ) as TotalPurchase, COALESCE( PCosts.balacneValue, 0 ) as TotalBalance, COALESCE( PSales.totalSale, 0 ) as TotalSales,  (COALESCE( PSales.totalSale, 0 ) - COALESCE( PCosts.totalPurchase, 0 )) as Profit')
    	->from($this->db_prefix . '_' . $this->mod_data . '_products products')
    	->join('left Join ( SELECT si.product_id, SUM( si.quantity ) soldQty, SUM( si.subtotal ) totalSale FROM ' . $this->db_prefix . '_' . $this->mod_data . '_sales s JOIN ' . $this->db_prefix . '_' . $this->mod_data . '_sale_items si on s.id = si.sale_id GROUP BY si.product_id) PSales ON products.id = PSales.product_id 
				LEFT JOIN (SELECT product_id, SUM(CASE WHEN pi.purchase_id IS NOT NULL THEN quantity ELSE 0 END) as purchasedQty, SUM(quantity_balance) as balacneQty, SUM( unit_cost * quantity_balance ) balacneValue, SUM( (CASE WHEN pi.purchase_id IS NOT NULL THEN (pi.subtotal) ELSE 0 END) ) totalPurchase FROM ' . $this->db_prefix . '_' . $this->mod_data . '_purchase_items pi LEFT JOIN ' . $this->db_prefix . '_' . $this->mod_data . '_purchases p on p.id = pi.purchase_id WHERE p.status != 2 AND p.status != 3 GROUP BY pi.product_id ) PCosts ON products.id = PCosts.product_id') 
 		->group('products.code, PSales.soldQty, PSales.totalSale, PCosts.purchasedQty, PCosts.totalPurchase, PCosts.balacneQty, PCosts.balacneValue');
		//die($this->db->sql());
		$q = $this->db->query($this->db->sql());
		if ($q->rowCount() > 0) {
            return $q->fetchAll();
        }
		return FALSE;
    }	public function Products_period($start_date, $end_date, $type = 0)
    {
    	return $this->reports_model->getInventory($start_date, $end_date,$type);
    }
	
	private function numofday($month,$year)
	{
		switch($month){
			case 1 :
			case 3 : 
			case 5 : 
			case 7 : 
			case 8 : 
			case 10 : 
			case 12 : 
				$day = 31;
				break;	
			case 4 : 
			case 6 : 
			case 9 : 
			case 11 : 
				$day = 30;
				break;
			default :
				if($year%4 == 0)
					$day = 29;
				else
					$day = 28;
				break;
		}
		return $day;
	}
	function getPurchasesReport($pdf = NULL, $xls = NULL)
    {
    	$product = $this->input->get_int('id','get' , NULL);
    	$pi = '( SELECT purchase_id, product_id, (GROUP_CONCAT(CONCAT(purchase_items.product_name, "__", purchase_items.quantity) SEPARATOR "___")) as item_nane from ' . $this->db_prefix . '_' . $this->mod_data . '_purchase_items as purchase_items';
		if ($product) {
            $pi .= ' WHERE purchase_items.product_id = ' . $product ;
        }
        $pi .= " GROUP BY purchase_items.purchase_id ) FPI";
		if ($product) {
                $where = ' FPI.product_id = ' . $product;
            }else{
            	$where="";
            }
    	$rpproduct=$this->db->sqlreset()->select ('DATE_FORMAT(FROM_UNIXTIME(purchases.date),"%Y-%m-%d %T") as date, reference_no, purchases.warehouse_id, supplier_id, (FPI.item_nane) as iname, grand_total, paid, (grand_total-paid) as balance, purchases.status, purchases.id as id')
		->from($this->db_prefix . '_' . $this->mod_data . '_purchases as purchases')
		->join('LEFT JOIN ' . $pi .' ON FPI.purchase_id=purchases.id')
		->where($where);
		//die($this->db->sql());
		$q = $this->db->query($this->db->sql());
		if ($q->rowCount() > 0) {
            return $q->fetchAll();
        }
		return FALSE;
    }
	function getSalesReport($pdf = NULL, $xls = NULL)
    {
    	$product = $this->input->get_int('id','get' , NULL);
		$list_pro=$product;
		$this->db->sqlreset()->select ('product_id')
				->from($this->db_prefix . '_' . $this->mod_data . '_material_items')
				->where('item_id=' . $product);
			$products_material=$this->db->query($this->db->sql())->fetchAll(5);
			foreach($products_material as $pro_m){
				$list_pro .= ','.$pro_m->product_id;
			}
    	$si = '( SELECT sale_id, product_id, (GROUP_CONCAT(CONCAT(sale_items.product_name, "__", sale_items.quantity) SEPARATOR "___")) as item_nane from ' . $this->db_prefix . '_' . $this->mod_data . '_sale_items as sale_items';
		if ($product) {
            $si .= ' WHERE sale_items.product_id IN( ' . $list_pro .')';
        }
        $si .= " GROUP BY sale_items.sale_id ) FSI";
		if ($product) {
                $where = ' FSI.product_id  IN( ' . $list_pro .' )';
            }else{
            	$where="";
            }
    	$rpproduct=$this->db->sqlreset()->select ('DATE_FORMAT(FROM_UNIXTIME(sales.date),"%Y-%m-%d %T") as date, reference_no, biller_id, customer_id, sales.warehouse_id, FSI.item_nane as iname, grand_total, paid, (grand_total-paid) as balance, payment_status, sales.id as id')
		->from($this->db_prefix . '_' . $this->mod_data . '_sales as sales')
		->join('LEFT JOIN ' . $si .' ON FSI.sale_id=sales.id ')
		->where($where);
		//die($this->db->sql());
		$q = $this->db->query($this->db->sql());
		if ($q->rowCount() > 0) {
            return $q->fetchAll();
        }
		return FALSE;
    }
	function getTransfersReport($pdf = NULL, $xls = NULL)
    {
    	$product = $this->input->get_int('id','get' , NULL);
		if ($product) {
            $where = ' purchase_items.product_id = ' . $product . ' OR transfer_items.product_id = ' . $product;
        }else{
        	$where="";
        }
    	$rpproduct=$this->db->sqlreset()->select ('DATE_FORMAT(FROM_UNIXTIME(transfers.date),"%Y-%m-%d %T") as date, transfer_no, (CASE WHEN transfers.status = 4 THEN GROUP_CONCAT(CONCAT(purchase_items.product_name, "__", purchase_items. quantity) SEPARATOR "___") ELSE GROUP_CONCAT(CONCAT(transfer_items.product_name, "__", transfer_items.quantity) SEPARATOR "___") END) as iname, from_warehouse_id as fw_id, from_warehouse_code as fcode, to_warehouse_id as tw_id,to_warehouse_code as tcode, grand_total, transfers.status, transfers.id as id')
		->from($this->db_prefix . '_' . $this->mod_data . '_transfers as transfers')
		->join('LEFT JOIN ' . $this->db_prefix . '_' . $this->mod_data .'_transfer_items as transfer_items ON transfer_items.transfer_id=transfers.id ' . ' 
				LEFT JOIN ' . $this->db_prefix . '_' . $this->mod_data . '_purchase_items as purchase_items ON purchase_items.transfer_id=transfers.id
			')
			->group('transfers.id')
		->where();
		$q = $this->db->query($this->db->sql());
		if ($q->rowCount() > 0) {
            return $q->fetchAll();
        }
		return FALSE;
    }
	function warehouse_stock($store_id= NULL, $warehouse = NULL)
    {
    	$data = array();
    	$data['stock'] = $warehouse ? $this->reports_model->getWarehouseStockValue($warehouse) : $this->reports_model->getStockValue($store_id);
    	$data['totals'] =  $this->reports_model->getWarehouseTotals($store_id);
    	return (object) $data;
    }
	 public function best_sellers($store_id = NULL, $warehouse_id = NULL)
   	{
   		$data = array();
   		$y1 = date('Y', strtotime('-1 month'));
        $m1 = date('m', strtotime('-1 month'));
        $m1sdate = $y1.'-'.$m1.'-01 00:00:00';
		$m1sdate=strtotime($m1sdate);
        $m1edate = $y1.'-'.$m1.'-'. days_in_month($m1, $y1) . ' 23:59:59';
		$m1edate=strtotime($m1edate);
        $data['m1'] = date('M Y', strtotime($y1.'-'.$m1));
        $data['m1bs'] = $this->reports_model->getBestSeller($m1sdate, $m1edate, $store_id, $warehouse_id);
        $y2 = date('Y', strtotime('-2 months'));
        $m2 = date('m', strtotime('-2 months'));
        $m2sdate = $y2.'-'.$m2.'-01 00:00:00';
		$m2sdate=strtotime($m2sdate);
        $m2edate = $y2.'-'.$m2.'-'. days_in_month($m2, $y2) . ' 23:59:59';
		$m2edate=strtotime($m2edate);
        $data['m2'] = date('M Y', strtotime($y2.'-'.$m2));
        $data['m2bs'] = $this->reports_model->getBestSeller($m2sdate, $m2edate, $store_id, $warehouse_id);
        $y3 = date('Y', strtotime('-3 months'));
        $m3 = date('m', strtotime('-3 months'));
        $m3sdate = $y3.'-'.$m3.'-01 23:59:59';
		$m3sdate=strtotime($m3sdate);
        $data['m3'] = date('M Y', strtotime($y3.'-'.$m3)).' - '.$data['m1'];
        $data['m3bs'] = $this->reports_model->getBestSeller($m3sdate, $m1edate, $store_id, $warehouse_id);
        $y4 = date('Y', strtotime('-12 months'));
        $m4 = date('m', strtotime('-12 months'));
        $m4sdate = $y4.'-'.$m4.'-01 23:59:59';
		$m4sdate=strtotime($m4sdate);
        $data['m4'] = date('M Y', strtotime($y4.'-'.$m4)).' - '.$data['m1'];
        $data['m4bs'] = $this->reports_model->getBestSeller($m4sdate, $m1edate, $store_id, $warehouse_id);
		return (object) $data;
	}
	function daily_sales($store_id = NULL, $warehouse_id = NULL, $year = NULL, $month = NULL, $pdf = NULL, $user_id = NULL)
    {
    	if( $store_id > 0 && $warehouse_id > 0){
    		$list_wh_id = $warehouse_id;
    	}else{
    		$all_warehouse=array();
	    	if($store_id > 0) {
	    		$all_warehouse = $this->site->getAllWarehouses($store_id);
				
				if($all_warehouse != FALSE){
		    		foreach ( $all_warehouse as $key => $value) {
						$list_warehouse_store[]=$value->id;
					};
				}else{
					$list_warehouse_store[]=0;
				}
	    		
	    	}else{
	    		foreach ($this->site->getAllWarehouses(0) as $key => $value) {
					$list_warehouse_store[]=$value->id;
				};
	    	}
			$list_wh_id = implode(',',$list_warehouse_store);
    	}
    	
    	if (!$year) {
            $year = date('Y');
        }
        if (!$month) {
            $month = date('m');
        }
        $user_id = $this->session->userdata('user_id');
        //$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $config = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => '/admin/index.php?language=vi&nv=storehouse&op=reports_daily_sales&q=',
            'month_type' => 'long',
            'day_type' => 'long'
        );

        $config['template'] = '{table_open}<div class="table-responsive"><table border="0" cellpadding="0" cellspacing="0" class="table table-bordered dfTable">{/table_open}
        {heading_row_start}<tr>{/heading_row_start}
        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}" id="month_year">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
        {heading_row_end}</tr>{/heading_row_end}
        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td class="cl_wday">{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}
        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td class="day">{/cal_cell_start}
        {cal_cell_content}
        <div class="day_num">{day}</div>
        <div class="content">{content}</div>
        {/cal_cell_content}
        {cal_cell_content_today}
        <div class="day_num highlight">{day}</div>
        <div class="content">{content}</div>
        {/cal_cell_content_today}
        {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}
        {cal_cell_blank}&nbsp;{/cal_cell_blank}
        {cal_cell_end}</td>{/cal_cell_end}
        {cal_row_end}</tr>{/cal_row_end}
        {table_close}</table></div>{/table_close}';

        $this->calendar = &load_class('Calendars','',$config);
        $sales = $user_id ? $this->reports_model->getStaffDailySales($user_id, $year, $month, $list_wh_id) : $this->reports_model->getDailySales($year, $month, $list_wh_id);
		
        if (!empty($sales)) {
            foreach ($sales as $sale) {
                $daily_sale[$sale->date] = "<table class='table table-bordered table-hover table-striped table-condensed data' style='margin:0;'><tr><td>" . "discount" . "</td><td>" . $sale->discount . "</td></tr><tr><td>" . "shipping" . "</td><td>" . $sale->shipping . "</td></tr><tr><td>" . "product_tax" . "</td><td>" . $sale->tax1 . "</td></tr><tr><td>" . "order_tax" . "</td><td>" . $sale->tax2 . "</td></tr><tr><td>" . "total" . "</td><td>" . $sale->total . "</td></tr></table>";
            }
        } else {
            $daily_sale = array();
        }
		//print_r($daily_sale);die;
        $data['calender'] = $this->calendar->generate($year, $month, $daily_sale);
        $data['year'] = $year;
        $data['month'] = $month;
		return  (object) $data;
	}
	function monthly_sales($store_id = NULL, $warehouse_id = NULL, $year = NULL, $pdf = NULL, $user_id = NULL)
    {
    	if( $store_id > 0 && $warehouse_id > 0){
    		$list_wh_id = $warehouse_id;
    	}else{
    		$all_warehouse=array();
	    	if($store_id > 0) {
	    		$all_warehouse = $this->site->getAllWarehouses($store_id);
				
				if($all_warehouse != FALSE){
		    		foreach ( $all_warehouse as $key => $value) {
						$list_warehouse_store[]=$value->id;
					};
				}else{
					$list_warehouse_store[]=0;
				}
	    		
	    	}else{
	    		foreach ($this->site->getAllWarehouses(0) as $key => $value) {
					$list_warehouse_store[]=$value->id;
				};
	    	}
			$list_wh_id = implode(',',$list_warehouse_store);
    	}
    	
    	if (!$year) {
            $year = date('Y');
        }
		$user_id = $this->session->userdata('user_id');
		$this->calendar = &load_class('Calendars');
		$data['year'] = $year;
        $data['sales'] = $user_id ? $this->reports_model->getStaffMonthlySales($user_id, $year, $list_wh_id) : $this->reports_model->getMonthlySales($year, $list_wh_id);
		return  (object) $data;
	}
}

