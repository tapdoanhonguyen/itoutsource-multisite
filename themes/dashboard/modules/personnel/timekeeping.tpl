<!-- BEGIN: main -->

    <div class="col-12">       
		<div class="card">
            <div class="card-header">
                <h3 class="float-left card-title d62f2f">{DATA.header_title}</h3>
                <div class="float-right toolaction">
                    <a href="#" data-toggle="tooltip" title="Import nhân sự Excel"><i class="fas fa-file-upload"> </i><span>Nhập<span></a>
                    <a href="#" data-toggle="tooltip" title="Cài đặt"><i class="fas fa-cog"> </i><span>Cài đặt<span></a>
                </div>
            </div>
		
            <div id="nav-tab" class="nav nav-tabs" role="tablist">
                <a class="nav-item nav-link active" href="#tab-table1" data-tab="1" data-toggle="tab">Thông tin chung</a>
                <a class="nav-item nav-link" href="#tab-table2" data-tab="2" data-toggle="tab">Chấm công</a>
                <a class="nav-item nav-link" href="#tab-table3" data-tab="3" data-toggle="tab">Nghĩ phép</a>
                <a class="nav-item nav-link" href="#tab-table4" data-tab="4" data-toggle="tab">Báo cáo</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-table1">
                    <div class="card-body">
                        <div class="row">
                              
                            
                        </div>
						
                    </div>	
                </div>
                <div class="tab-pane fade" id="tab-table2">
                    <div class="card-body">
                        <div class="row">
							<div class="oxd-layout-context" data-v-130c27f5="">
								<div class="oxd-table-filter" data-v-b4b62742="" data-v-50a2ff8a="">
									<div class="oxd-table-filter-header" data-v-b4b62742="">
										<div class="oxd-table-filter-header-title" data-v-b4b62742="">
											<h5 class="oxd-text oxd-text--h5 oxd-table-filter-title" data-v-7b563373="" data-v-b4b62742="">Bảng chấm công của tôi</h5>
										</div>
										<div class="oxd-table-filter-header-options" data-v-b4b62742="">
											<div class="--toggle" data-v-b4b62742="">
											</div>
											<div class="--export" data-v-b4b62742="">
											</div>
											<div class="--toggle" data-v-b4b62742="">
												<button class="oxd-icon-button" type="button" data-v-f5c763eb="" data-v-b4b62742="">
												<i class="oxd-icon bi-caret-up-fill" data-v-bddebfba="" data-v-f5c763eb=""></i>
												</button>
											</div>
										</div>
									</div>
									<hr class="oxd-divider" role="separator" aria-orientation="horizontal" data-v-9f847659="" data-v-b4b62742="" style="">
									<div class="oxd-table-filter-area" data-v-b4b62742="" style="">
										<form class="oxd-form" novalidate="" data-v-d5bfe35b="" data-v-50a2ff8a="" id="timekeeping">
											<div class="oxd-form-row" data-v-2130bd2a="" data-v-50a2ff8a="">
												<div class="oxd-grid-4 orangehrm-full-width-grid" data-v-d7b71de4="" data-v-50a2ff8a="">
													<div class="oxd-grid-item oxd-grid-item--gutters" data-v-c93bdbf3="" data-v-50a2ff8a="">
														<div class="oxd-input-group oxd-input-field-bottom-space" data-v-957b4417="" data-v-50a2ff8a="">
															<div class="oxd-input-group__label-wrapper" data-v-957b4417="">
																<label class="oxd-label oxd-input-field-required" data-v-30ff22b1="" data-v-957b4417="">Ngày</label>
															</div>
															<div class="" data-v-957b4417="">
																<div class="oxd-date-wrapper" data-v-4a95a2e0="">
																	<div class="oxd-date-input" data-v-4a95a2e0="">
																		<input id="date_timekeeping" name="date_timekeeping" class="oxd-input oxd-input--active datepicker" placeholder="{DATE_TIMEKEEPING}" data-v-1f99f73c="" data-v-4a95a2e0="">
																			
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr class="oxd-divider" role="separator" aria-orientation="horizontal" data-v-9f847659="" data-v-50a2ff8a="">
											<div class="oxd-form-actions" data-v-19c2496b="" data-v-50a2ff8a="">
												<p class="oxd-text oxd-text--p orangehrm-form-hint" data-v-7b563373="" data-v-319fc346="" data-v-50a2ff8a=""> * Yêu cầu</p>
												<button type="submit" class="oxd-button oxd-button--medium oxd-button--secondary" data-v-10d463b7="" data-v-50a2ff8a=""> Xem </button>
											</div>
										</form>
									</div>
								</div>
								<br data-v-50a2ff8a="">
								<div class="orangehrm-paper-container" data-v-50a2ff8a="">
									<div class="orangehrm-header-container" data-v-50a2ff8a="">
										<span class="oxd-text oxd-text--span orangehrm-header-total" data-v-7b563373="" data-v-50a2ff8a="">Total Duration (Hours): <span class="total_duration" > </span></span>
									</div>
									<div data-v-0dea79bd="" data-v-50a2ff8a="">
										<hr class="oxd-divider orangehrm-horizontal-margin" role="separator" aria-orientation="horizontal" data-v-9f847659="" data-v-0dea79bd="">
										<div class="orangehrm-horizontal-padding orangehrm-vertical-padding" data-v-0dea79bd="">
											<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-0dea79bd=""> (<span class="records"> </span>) Records Found</span>
										</div>
									</div>
									<div class="orangehrm-container" data-v-50a2ff8a="">
										<div class="oxd-table orangehrm-my-attendance" role="table" row-decorator="oxd-table-decorator-card" data-v-50a2ff8a="">
											<div class="oxd-table-header" role="rowgroup" data-v-f9688068="" data-v-2f1b665b="">
												<div class="oxd-table-row oxd-table-row--with-border" role="row" data-v-0d5ef602="" data-v-2f1b665b="">
													<div class="oxd-table-header-cell oxd-padding-cell oxd-table-th" role="columnheader" data-v-ff19d791="" data-v-2f1b665b="" style="flex: 1 1 0%;">Đăng nhập
													</div>
													<div class="oxd-table-header-cell oxd-padding-cell oxd-table-th" role="columnheader" data-v-ff19d791="" data-v-2f1b665b="" style="flex: 1 1 0%;">Ghi chú khi đăng nhập
													</div>
													<div class="oxd-table-header-cell oxd-padding-cell oxd-table-th" role="columnheader" data-v-ff19d791="" data-v-2f1b665b="" style="flex: 1 1 0%;">Đăng xuất
													</div>
													<div class="oxd-table-header-cell oxd-padding-cell oxd-table-th" role="columnheader" data-v-ff19d791="" data-v-2f1b665b="" style="flex: 1 1 0%;">Ghi chú khi đăng xuất
													</div>
													<div class="oxd-table-header-cell oxd-padding-cell oxd-table-th" role="columnheader" data-v-ff19d791="" data-v-2f1b665b="" style="flex: 1 1 0%;">Thời gian (giờ)
													</div>
													<div class="oxd-table-header-cell oxd-padding-cell oxd-table-th" role="columnheader" data-v-ff19d791="" data-v-2f1b665b="">
												</div>
											</div>
										</div>
										<div class="oxd-table-body" role="rowgroup" data-v-8bca8bf7="" data-v-f2168256="">
											<div class="oxd-table-card" data-v-f2168256="">
												<div class="oxd-table-row oxd-table-row--with-border" role="row" data-v-0d5ef602="" data-v-f2168256="">
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="">
															<div class="header" data-v-8f3074ce="" style="display: none;">Đăng nhập
															</div>
															<div class="data" data-v-8f3074ce="">
															<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce="">
															2023-05-05 11:32 AM 
															<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT +07:00</span>
															</p>
															</div>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">
															<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="" style="display: none;">
															<div class="header" data-v-8f3074ce="" style="display: none;">Đăng xuất</div>
															<div class="data" data-v-8f3074ce="">
																<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce="">
																	<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT -00:00</span>
																</p>
															</div>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">
															<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div data-v-6c07a142="">0.00</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell">
														<div data-v-6c07a142=""></div>
													</div>
												</div>
											</div>
											<div class="oxd-table-card" data-v-f2168256="">
												<div class="oxd-table-row oxd-table-row--with-border" role="row" data-v-0d5ef602="" data-v-f2168256="">
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="">
															<div class="header" data-v-8f3074ce="" style="display: none;">Đăng nhập</div>
															<div class="data" data-v-8f3074ce="">
																<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce="">2023-05-05 09:46 AM 
																<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT +07:00</span>
																</p>
															</div>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">
															<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="">
															<div class="header" data-v-8f3074ce="" style="display: none;">Đăng xuất</div>
															<div class="data" data-v-8f3074ce="">
																<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce="">2023-05-05 09:46 AM 
																	<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT +07:00</span>
																</p>
															</div>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">
															<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>
														</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div data-v-6c07a142="">0.00</div>
													</div>
													<div class="oxd-table-cell oxd-padding-cell" role="cell">
														<div data-v-6c07a142=""></div>
													</div>
												</div>
											</div>
											<div class="oxd-table-card" data-v-f2168256="">
												<div class="oxd-table-row oxd-table-row--with-border" role="row" data-v-0d5ef602="" data-v-f2168256="">
													<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
														<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="">
															<div class="header" data-v-8f3074ce="" style="display: none;">Đăng nhập</div>
																<div class="data" data-v-8f3074ce="">
																	<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce="">2023-05-05 09:45 AM 
																		<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT +07:00</span>
																	</p>
																</div>
															</div>
														</div>
														<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
															<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">
																<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>
															</div>
														</div>
														<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
															<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="">
																<div class="header" data-v-8f3074ce="" style="display: none;">Đăng xuất</div>
																<div class="data" data-v-8f3074ce="">
																	<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce="">2023-05-05 09:46 AM 
																	<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT +07:00</span>
																	</p>
																</div>
															</div>
														</div>
														<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
															<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">
																<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>
															</div>
														</div>
														<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">
															<div data-v-6c07a142="">0.02</div>
														</div>
														<div class="oxd-table-cell oxd-padding-cell" role="cell">
															<div data-v-6c07a142=""></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="orangehrm-bottom-container" data-v-50a2ff8a="">
									</div>
								</div>
							</div>
								 
                             
                            
                        </div>
						
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-table3">
                    <div class="card-body">
                        <div class="row"> 
                            
                        </div>
						<div class="row"> 
							
						</div>
						<div class="row"> 
							
						</div>
						
						<div class="row">
							
						</div>
						<div class="row">
							
						</div>
							
                    </div>
                </div>
 
                <div class="tab-pane fade" id="tab-table4">
                    <div class="card-body">
						
					 </div>
                </div>

 
            
				
			</div>
		</div>
	</div>
<!-- Daterange picker -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/plugins/select2/js/select2.full.min.js"></script>


<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>


<script type="text/javascript">
 
                         
                               
function AddDatepicker(selector){
	$(selector).datepicker({   
		showOn : "both",       
		dateFormat : "dd/mm/yy",
		changeMonth : true,    
		changeYear : true,     
		showOtherMonths : true,
		buttonText: '',
		buttonImage : "",      
		buttonImageOnly : false,
		yearRange: "-100:+0",  
	});                        
}                              
                               
function AddDatepicker2(selector){
	$(selector).datepicker({   
		viewMode: 'year',      
		format: 'mm-yyyy',     
		showOn : "both",       
		dateFormat : "mm/yy",  
		changeMonth : true,    
		changeYear : true,     
		showOtherMonths : true,
		buttonText: '',
		buttonImage : "",      
		buttonImageOnly : false
	});                        
}                              
                          

$(function () {                
	               AddDatepicker('.datepicker');            

	              
                 
	setTimeout(function(){     
	                           
	                           
		function formatResult(node) {
                               
			$xt = '';          
			if (node.element !== undefined) {
				lev = node.element.getAttribute("lev");
				if( lev > 0 )  
				{              
					$xt+= '<span style="opacity:0.3;font-weight:bolder">';
					$xt+= '&nbsp;';
					for( $i = 1; $i <= lev; $i++ )
					{          
						$xt+= '-';
					}          
					$xt+= '</span>';
					$xt+= '&nbsp;';
				}              
				               
			}                  
			$xt+= node.text;   
			return $('<span>' + $xt + '</span>');
		};                     
		function formatSelect(node) {
			return node.text;  
		};                     
                  
		                
                               
	$(document).on('focusout', '.money', function(){
		price = $(this).val().replace(/[^0-9.]/g, '');
		id = $(this).attr('data');
		console.log(price);    
		$('.salaryc'+ id).val( ( price * globalData['salaryPremiumBase']['c'] )/100 ).price_format();
		$('.salaryp'+ id).val( ( price * globalData['salaryPremiumBase']['p'] )/100 ).price_format();
	})                         
	                           
	$('.select2').select2({    
		searchInputPlaceholder: 'Tìm kiếm...', 
		language : '{NV_LANG_DATA}'
	}).on('select2:open', function(e){
		$('.select2-search__field').attr('placeholder', 'Tìm kiếm...');
	});                        
	                       
	                           
	$('input[type="text"]').on('keyup', function(){
		if( $(this).val().length > 3 )
		{                      
			$(this).next('.text-danger').remove();
			$(this).parent().removeClass('has-error');
			$(this).tooltip('dispose');
		}                      
	                           
	})                         
	                           
	function has_error( obj )  
	{                          
		var element = obj.parent();				
		if (element.hasClass('form-group')) { element.addClass('has-error') }
		obj.addClass('tooltip-current');
		$('.tooltip-current').tooltip({'title': obj.attr('data-error')});
		$('.tooltip-current').tooltip('show');
	}                          
                               
                               
	$( 'body' ).on('focus', '#timekeeping input, #timekeeping select', function() {
		obj = $(this);         
		setTimeout(function(){ 
			obj.tooltip('hide');
		}, 500);	           
	})                         
	                           
	$("#timekeeping").on('submit', function(e) {
		e.preventDefault();    
		$.ajax({               
			type: "POST",      
			dataType: 'json',  
			url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=timekeeping&action=timekeeping&second=' + new Date().getTime(),
			data: $('#timekeeping').serialize(),
			beforeSend: function() {
				<!-- $('#registerForm').css('opacity', '0.7'); -->
				$('#submitreg').prop('disabled', true);
				$('.message').remove();
				$('.text-danger').remove();
				$('.has-error').removeClass('has-error');
				$('.tab-content').after('<div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>');
			},	               
			complete: function() {
				<!-- $('#registerForm').css('opacity', 1); -->
				$('#submitreg').prop('disabled', false);
				$('div[class="tooltip fade top in"]').remove();
				 $('.overlay').remove();
			},                 
			success: function(json) {
				if( json['success'] )
				{     
					var mess = '';
				$('.oxd-table-body').html('');
				console.log(mess);				
				    $.each(json['data'],function(key,data){
					
						mess += '<div class="oxd-table-card" data-v-f2168256="">'+
												'<div class="oxd-table-row oxd-table-row--with-border" role="row" data-v-0d5ef602="" data-v-f2168256="">'+
													'<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">'+
														'<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="">'+
															'<div class="header" data-v-8f3074ce="" style="display: none;">Check in</div>'+
															'<div class="data" data-v-8f3074ce="">'+
															'<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce=""> '+
															data['time_login'] +
															'<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT +07:00</span>'+
															'</p>'+
															'</div>'+
														'</div>'+
													'</div>'+
													'<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">'+
														'<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">'+
															'<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>'+
														'</div>'+
													'</div>'+
													'<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">'+
														'<div class="oxd-table-card-cell" item="[object Object]" rowitem="[object Object]" data-v-8f3074ce="">'+
															'<div class="header" data-v-8f3074ce="" style="display: none;">Đăng xuất</div>'+
															'<div class="data" data-v-8f3074ce="">'+
																'<p class="oxd-text oxd-text--p" data-v-7b563373="" data-v-8f3074ce="">'+
																data['time_checkout'] +
																'<span class="oxd-text oxd-text--span timezone" data-v-7b563373="" data-v-8f3074ce=""> GMT +07:00</span>'+
																'</p>'+
															'</div>'+
														'</div>'+
													'</div>'+
													'<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">'+
														'<div class="oxd-table-card-cell" data-v-ed6b0c3f="" style="display: none;">'+
															'<span class="oxd-text oxd-text--span" data-v-7b563373="" data-v-ed6b0c3f=""></span>'+
														'</div>'+
													'</div>'+
													'<div class="oxd-table-cell oxd-padding-cell" role="cell" style="flex: 1 1 0%;">'+
														'<div data-v-6c07a142="">0.00</div>'+
													'</div>'+
													'<div class="oxd-table-cell oxd-padding-cell" role="cell">'+
														'<div data-v-6c07a142=""></div>'+
													'</div>'+
												'</div>'+
											'</div>';
											
					
					});           
					$('.oxd-table-body').html(mess);
					$('.total_duration').html(json['total_duration']);
					$('.records').html(json['records_found']);
					
					
					
				}              
				else if( json['error'] )
				{              
					           
					var mess = ''+
					'<div class="modal-headerx">'+
					'<h5 class="modal-title" >Thông báo</h5>'+
					'</div>';  
					 $(json['error']).each(function(i, item){
						       
						var obj = $('#' + item.input);
						obj.attr('data-error', item.mess);
						obj.parent().addClass('has-error');
						obj.addClass('tooltip-current');
						$('.tooltip-current').tooltip({'title': obj.attr('data-error')});
						mess+= '<div class="alert-danger"><i class="fa fa-exclamation-circle"></i> ' + item.mess + '</div>';
					});        
					$('#sitemodal').find('.modal-dialog').addClass('h-100 my-0 mx-auto d-flex flex-column justify-content-center');
					$('#sitemodal').modal().find('.modal-body').html(mess);
				}              
				setTimeout(function(){$('.message').slideUp(1000).remove()}, 1000)	
			},                 
			error: function(xhr, ajaxOptions, thrownError) {
				 $('.overlay').remove();
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}                  
		});                    
	});                        
});  
});                           
</script>                      
          
                               




    <link href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/chunk-vendors.css" rel="stylesheet">
  <link href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/app.css" rel="stylesheet">
 <style>
    :root {
            --oxd-primary-one-color:#FF7B1D;
            --oxd-primary-font-color:#FFFFFF;
            --oxd-secondary-four-color:#76BC21;
            --oxd-secondary-font-color:#FFFFFF;
            --oxd-primary-gradient-start-color:#FF920B;
            --oxd-primary-gradient-end-color:#F35C17;
            --oxd-secondary-gradient-start-color:#FF920B;
            --oxd-secondary-gradient-end-color:#F35C17;
            --oxd-primary-one-lighten-5-color:#ff8a37;
            --oxd-primary-one-lighten-30-color:#ffd4b6;
            --oxd-primary-one-darken-5-color:#ff6c03;
            --oxd-primary-one-alpha-10-color:rgba(255, 123, 29, 0.1);
            --oxd-primary-one-alpha-15-color:rgba(255, 123, 29, 0.15);
            --oxd-primary-one-alpha-20-color:rgba(255, 123, 29, 0.2);
            --oxd-primary-one-alpha-50-color:rgba(255, 123, 29, 0.5);
            --oxd-secondary-four-lighten-5-color:#84d225;
            --oxd-secondary-four-darken-5-color:#68a61d;
            --oxd-secondary-four-alpha-10-color:rgba(118, 188, 33, 0.1);
            --oxd-secondary-four-alpha-15-color:rgba(118, 188, 33, 0.15);
            --oxd-secondary-four-alpha-20-color:rgba(118, 188, 33, 0.2);
            --oxd-secondary-four-alpha-50-color:rgba(118, 188, 33, 0.5);
        }
  </style>


<!-- END: main -->




					'<div class="modal-headerx">'+
					'<h5 class="modal-title" >Thông báo</h5>'+
					'</div>';  
					mess+= '<div class="alert-success alert"><i class="fa fa-exclamation-circle"></i> ' + json['success'] + '</div>';
					<!-- BEGIN:add -->
					mess+= '<a class="btn btn-block btn-info btn-flat" href="javascript:location.reload();">Nhập tiếp</a>';
					<!-- END:add -->
					mess+= '<a class="btn btn-block btn-info btn-flat" href="{LIST_PERSOLNEL}">Tới danh sách</a>';
					           
					$('#sitemodal').find('.modal-dialog').addClass('h-100 my-0 mx-auto d-flex flex-column justify-content-center');
					$('#sitemodal').modal().find('.modal-body').html(mess);
				               
					<!-- $('#submitreg').after('<span class="message success">'+ json['success'] +'</span>').slideDown(1000); -->
