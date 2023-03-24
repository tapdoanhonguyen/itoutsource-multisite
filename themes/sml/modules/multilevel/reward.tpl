<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css">
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<div class="page-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
				<div class="breadcrumb-title pr-3">Quản lý hoa hồng</div>
				<div class="pl-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Hoa hồng</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Hoa hồng</h4>
					<hr/>
					<form action="{NV_BASE_ADMINURL}index.php" method="GET" role="form">
						<input type="hidden" name ="{NV_NAME_VARIABLE}"value="{MODULE_NAME}" />
						<input type="hidden" name ="{NV_OP_VARIABLE}"value="{OP}" />
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>{LANG.date_from}</label>
								<div class="input-group">
									<input type="text" name="from" id="from" value="{SEARCH.date_from}" class="form-control" placeholder="{LANG.date_from}" readonly="readonly">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
							<div class="form-group col-md-3">
								<label>{LANG.date_to}</label>
								<div class="input-group">
									<input type="text" name="to" id="to" value="{SEARCH.date_to}" class="form-control" placeholder="{LANG.date_to}" readonly="readonly">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
							<div class="form-group col-md-3">
								<label>Tìm theo nhân viên</label>
								<div class="input-group">
									<select name="order_nhanvien" id="" class="form-control">
										<option value="0">Tìm theo nhân viên</option>
										<!-- BEGIN: user-->
										<option value="{LISTUSER.userid}"{LISTUSER.sl}>{LISTUSER.username}</option>
										<!-- END: user-->
									</select>
									<div class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="lni lni-calendar"></i></button>
									</div>
								</div>
							</div>
							<div class="form-group col-md-3">
								<label>&nbsp;</label>
								<div class="input-group">
									<input type="hidden" name ="checkss" value="{CHECKSESS}" />
									<button type="submit" class="btn btn-primary" name="search">
										<i class="lni lni-search-alt mr-1"></i>{LANG.search}
									</button>
									<span id="loading_bar"></span>
								</div>
							</div>
						</div>
					</form>
					<!-- BEGIN: data -->
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead class="thead-dark">
								<tr>
									<td>{LANG.saler_name}</td>
									<td>{LANG.donhang}</td>
									<td>{LANG.time_payment}</td>
									<td>{LANG.mobile}</td>
									<td>{LANG.total_price}</td>
									<td>{LANG.doanhthu}</td>
								</tr>
							</thead>
							<tbody>
								<!-- BEGIN: row -->
								<tr >
									<td>{DATA.saller_name}</td>
									<td><a href="{DATA.detail_order}">{DATA.order_code} - {DATA.order_quotation} - {DATA.full_name}</a></td>
									<td>{DATA.time_payment}</td>
									<td>{DATA.mobile}</td>
									<td>{DATA.order_total}</td>
									<td>{DATA.hoahong}</td>
								</tr>
								<!-- END: row -->
							</tbody>
						</table>
					</div>
					<!-- END: data -->
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    function nv_export_excel()
    {
    	$('.exportexcel').attr('disabled', 'disabled');
    	$('#loading_bar').html('<center><img src="'+ nv_base_siteurl + 'assets/images/load_bar.gif" alt="" />&nbsp;{LANG.waiting}...</center>');
    	$.post(script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=exportorderseller&nocache=' + new Date().getTime(), 'order_id={order_id}', function(res) {
    		var r_split = res.split('_');
    		if(r_split[0] == 'OK'){
    			$("#loading_bar").hide();
    			alert(r_split[1]);
    			$('.exportexcel').removeAttr('disabled');
    			window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=exportorderseller&step=2';
    		}else{
    			$("#loading_bar").hide();
    			alert(r_split[1]);
    			$('.exportexcel').removeAttr('disabled');
    		}
    	});	
    }
	$(document).ready(function() {
		$("#from,#to").datepicker({
			showOn : "both",
			dateFormat : "dd/mm/yy",
			changeMonth : true,
			changeYear : true,
			showOtherMonths : true,
			buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
			buttonImageOnly : true
		});
	});
</script>
<!-- END: main -->