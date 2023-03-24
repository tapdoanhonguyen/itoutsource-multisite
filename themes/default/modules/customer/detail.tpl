<!-- BEGIN: main -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://customer.vidoco.info/themes/default/js/invoice.js"></script>

<link rel="stylesheet" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" />
<link rel="stylesheet" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2-bootstrap.min.css" />
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />


<ul class="list-inline pull-right">
    <!-- BEGIN: iscontacts_change -->
    <li><button class="btn btn-primary btn-xs" onclick="nv_change_contacts(); return  false;">
            <em class="fa fa-exchange">&nbsp;</em>{LANG.changecontacts}
        </button></li>
    <!-- END: iscontacts_change -->
    <!-- BEGIN: customer_add -->
    <li><a href="{URL_ADD}" class="btn btn-primary btn-xs"><em class="fa fa-plus">&nbsp;</em> {LANG.customer_add}</a></li>
    <!-- END: customer_add -->
    <!-- BEGIN: contact_add -->
    <li><a href="{URL_ADD_CONTACT}" class="btn btn-primary btn-xs"><em class="fa fa-plus">&nbsp;</em> {LANG.contact_add}</a></li>
    <!-- END: contact_add -->
    <li><a href="{URL_ADD_EMAIL}" class="btn btn-primary btn-xs"><em class="fa fa-plus">&nbsp;</em>{LANG.email_add}</a></li>
    <!-- BEGIN: support -->
    <li><a href="{URL_ADD_SUPPORT}" class="btn btn-primary btn-xs"><em class="fa fa-user">&nbsp;</em>{LANG.add_support}</a></li>
    <!-- END: support -->
    <!-- BEGIN: admin -->
    <li><a href="{URL_EDIT}" class="btn btn-default btn-xs"><em class="fa fa-edit">&nbsp;</em><!-- BEGIN: customer_edit -->{LANG.customer_edit}<!-- END: customer_edit --><!-- BEGIN: contact_edit -->{LANG.contact_edit}<!-- END: contact_edit --></a></li>
    <li><a href="{URL_DELETE}" class="btn btn-danger btn-xs" onclick="return confirm(nv_is_del_confirm[0]);"><em class="fa fa-trash-o">&nbsp;</em>{LANG.delete}</a></li>
    <!-- END: admin -->
</ul>
<div class="clearfix"></div>
<div class="panel with-nav-tabs panel-success">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1success" data-toggle="tab">{LANG.customer_detail}</a></li>
            <!-- BEGIN: iscontacts -->
            <!-- BEGIN: service_tab_title -->
            <li><a href="#tab2success" data-toggle="tab">{LANG.service_detail} <span class="red">({CUSTOMER.count_services})</span></a></li>
            <!-- END: service_tab_title -->
            <!-- BEGIN: products_tab_title -->
            <li><a href="#tab3success" data-toggle="tab">{LANG.products_detail} <span class="red">({CUSTOMER.count_products})</span></a></li>
            <!-- END: products_tab_title -->
            <!-- BEGIN: invoice_tab_title -->
            <li><a href="#tab4success" data-toggle="tab">{LANG.invoice_detail} <span class="red">({CUSTOMER.count_invoices})</span></a></li>
            <!-- END: invoice_tab_title -->
            <!-- BEGIN: projects_tab_title -->
            <li><a href="#tab5success" data-toggle="tab">{LANG.project_detail} <span class="red">({CUSTOMER.count_projects})</span></a></li>
            <!-- END: projects_tab_title -->
            <!-- END: iscontacts -->
            <!-- BEGIN: email_tab_title -->
            <li><a href="#tab6success" data-toggle="tab">{LANG.email_detail} <span class="red">({CUSTOMER.count_emails})</span></a></li>
            <!-- END: email_tab_title -->
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1success">
                <table class="table table-striped">
                    <tbody>
                        <tr>
							<th>{LANG.code}</th>
                            <td>{CUSTOMER.code}</td>
                            <th>{LANG.fullname}</th>
                            <td>{CUSTOMER.fullname}</td>
                            <th>{LANG.care_staff_name}</th>
                            <td>{CUSTOMER.care_staff}</td>
                        </tr>
                        <tr>
                            <th>{LANG.main_phone}</th>
                            <td>{CUSTOMER.main_phone}</td>
                            <th>{LANG.other_phone}</th>
                            <td>{CUSTOMER.other_phone}</td>
                        </tr>
                        <tr>
                            <th>{LANG.main_email}</th>
                            <td>
                                <a href="mailto:{CUSTOMER.main_email}">{CUSTOMER.main_email}</a>
                            </td>
                            <th>{LANG.other_email}</th>
                            <td>{CUSTOMER.other_email}</td>
                        </tr>
                        <tr>
                            <th>{LANG.customer_types}</th>
                            <td>{CUSTOMER.type_id}</td>
                            <th>{LANG.birthday}</th>
                            <td>{CUSTOMER.birthday}</td>
                        </tr>
                        <tr>
                            <th>Facebook</th>
                            <td>
                                <a href="{CUSTOMER.facebook}">{CUSTOMER.facebook}</a>
                            </td>
                            <th>Skype</th>
                            <td>
                                <a href="skype:{CUSTOMER.skype}">{CUSTOMER.skype}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Zalo</th>
                            <td>{CUSTOMER.zalo}</td>
                            <th>Website</th>
                            <td>{CUSTOMER.website_str}</td>
                        </tr>
                        <tr>
                            <th>{LANG.address}</th>
                            <td>{CUSTOMER.address}</td>
                            <th></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>{LANG.gender}</th>
                            <td>{CUSTOMER.gender}</td>
                            <th>{LANG.unit}</th>
                            <td>
                                <!-- BEGIN: unit -->
                                <label class="label label-default">{UNITS}</label>
                                <!-- END: unit -->
                            </td>
                        
                        
                        <tr>
                            <th>{LANG.addtime}</th>
                            <td>{CUSTOMER.addtime}</td>
                            <th>{LANG.user_account}</th>
                            <td>{CUSTOMER.user_account}</td>
                        </tr>
                        <tr>
                            <th>{LANG.edittime}</th>
                            <td>{CUSTOMER.edittime}</td>
                            <th><label class="control-label"><strong>{LANG.tags}</strong></label></th>
                            <td>
                                <!-- BEGIN: tags -->
                                <label class="label label-default">{TAGS}</label>
                                <!-- END: tags -->
                            </td>
                        </tr>
                        <tr>
                            <th>{LANG.share_people}</th>
                            <td>
                                <!-- BEGIN: share_accs -->
                                <label class="label label-primary">{SHAREACC}</label>
                                <!-- END: share_accs -->
                            </td>
                            <th><label class="control-label"><strong>{LANG.share_groups}</strong></label></th>
                            <td>{CUSTOMER.share_groups}</td>
                        </tr>
                        <!-- BEGIN: field -->
                        <!-- BEGIN: loop -->
                        <tr>
                            <th>{FIELD.title}</th>
                            <td>{FIELD.value}</td>
                        </tr>
                        <!-- END: loop -->
                        <!-- END: field -->
                        <tr>
                            <th>{LANG.userid_link}</th>
                            <td>{CUSTOMER.userid_link}</td>
                        </tr>
                        <tr>
                            <th>{LANG.note}</th>
                            <td colspan="3">{CUSTOMER.note}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- BEGIN: service_tab_content -->
            <div class="tab-pane fade" id="tab2success">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="20" class="text-center">
								<input value="{id}" type="checkbox" class="checkbox_all_service">
							</th>
                            <th width="50" class="text-center">{LANG.number}</th>
                            <th>{LANG.service}</th>
                            <th>{LANG.unit_service}</th>
                            <th>{LANG.note_service}</th>
                            <th>{LANG.partner}</th>
							<th>Chi phí</th>
                            <th>{LANG.begintime}</th>
                            <th>{LANG.endtime1}</th>
                          
                            <th>{LANG.status}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- BEGIN: loop -->
                        <tr>
                            <td class="text-center">
							
							<input type="checkbox" name="checkbox_service[]" class="checkbox_service_item" value="{SERVICE.id}">
							
							</td>
                            <td class="text-center">{SERVICE.number}</td>
                            <td>{SERVICE.itemid}</td>
                            <td>{SERVICE.unit_service}</td>
                            <td>{SERVICE.note}</td>
                            <td>{SERVICE.partner}</td>
                            <td>{SERVICE.total}</td>
                            <td>{SERVICE.createtime}</td>
                            <td>{SERVICE.duetime_next} ({SERVICE.duetime})</td>
                           
                            <td class="{SERVICE.class}">{SERVICE.status}</td>
                            <td>
								<!-- BEGIN: edit -->
								<a href="#" onclick="edit_service({SERVICE.id})">{LANG.edit}</a>
								<!-- END: edit -->
								
								<!-- BEGIN: delete -->
								<a href="#" onclick="delete_service({SERVICE.id}, {id})">{LANG.delete}</a>
								<!-- END: delete -->
							</td>
                        </tr>
                        <!-- END: loop -->
                    </tbody>
                </table>
				
		<div class="export_service_invoice">
			<span class="btn btn-primary">{LANG.export_service_invoice}</span>
		</div>
			
		<!-- BEGIN: add_form -->
		<div class="panel panel-default">
        <div class="panel-heading">
            <span class="pull-left">{LANG.item_details}</span><span class="pull-right">{LANG.money_unit}: {LANG.vnd}</span>
            <div class="clearfix"></div>
        </div>
		
		<form onsubmit="return nv_validForm(this);" id ="frm-submit" class="form-horizontal form_product_detail" action="{ACTION}" name="form_product_detail" method="post">
		<input type="hidden" name="new_id" value="{id}"/>
        <table class="table table-striped table-bordered table-hover table-middle">
            <thead>
                <tr>
                    <th width="50">{LANG.number}</th>
                    <th>{LANG.title}</th>
                    <th width="150">{LANG.unit_price}</th>
                    <th width="150">{LANG.quantity}</th>
                    <th width="150">{LANG.price_string}</th>
                    <th width="150">{LANG.vat}</th>
                    <th width="300">{LANG.vat_price}</th>
                    <th width="150">{LANG.total}</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="item-detail">
               
            </tbody>
        </table>
		
		<ul class="list-inline">
			<li><span class="btn btn-primary btn-xs" onclick="nv_service_add(); return !1;">{LANG.service_add}</span></li>
			<li><span class="btn btn-primary btn-xs" onclick="nv_product_add(); return !1;">{LANG.product_add}</span></li>
			<li><span class="btn btn-primary btn-xs" onclick="nv_projects_add(); return !1;">{LANG.projects_add}</span></li>
		</ul>
		<div class="submit_form_service text-center">
		<input class="btn btn-primary" name="submit" type="submit" value="Lưu thay đổi">
		</div>
		</form>
		</div>
		
		<!-- END: add_form -->
		
            </div>
            <!-- END: service_tab_content -->
            <!-- BEGIN: products_tab_content -->
            <div class="tab-pane fade" id="tab3success">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{LANG.product_name}</th>
                            <th scope="col">{LANG.product_time}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- BEGIN: loop -->
                        <tr>
                            <td>{PRODUCTS.product_name}</td>
                            <td>{PRODUCTS.time_add}</td>
                        </tr>
                        <!-- END: loop -->
                    </tbody>
                </table>
            </div>
            <!-- END: products_tab_content -->
            <!-- BEGIN: invoice_tab_content -->
            <div class="tab-pane fade" id="tab4success">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{LANG.number}</th>
                            <th scope="col">{LANG.invoice_code}</th>
                            <th scope="col">{LANG.title}</th>
                            <th scope="col">{LANG.invoice_createtime}</th>
                            <th scope="col">{LANG.invoice_duetime}</th>
                            <th scope="col">{LANG.addtime}</th>
                            <th scope="col">{LANG.invoice_grand_total}</th>
                            <th scope="col">{LANG.status}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- BEGIN: loop -->
                        <tr onclick="nv_table_row_click(event, '{INVOICE.link_view}', false);" class="pointer">
                            <td>{INVOICE.number}</td>
                            <td>#{INVOICE.code}</td>
                            <td>{INVOICE.title}</td>
                            <td>{INVOICE.createtime}</td>
                            <td>{INVOICE.duetime}</td>
                            <td>{INVOICE.addtime}</td>
                            <td>{INVOICE.grand_total}</td>
                            <td>{INVOICE.status}</td>
                            <td></td>
                        </tr>
                        <!-- END: loop -->
                    </tbody>
                </table>
            </div>
            <!-- END: invoice_tab_content -->
            <!-- BEGIN: projects_tab_content -->
            <div class="tab-pane fade" id="tab5success">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{LANG.number}</th>
                            <th>{LANG.title}</th>
                            <th width="150">{LANG.project_begintime}</th>
                            <th width="150">{LANG.project_endtime}</th>
                            <th width="190">{LANG.project_realtime}</th>
                            <th width="150">{LANG.status}</th>
                        </tr>
                    </thead>
                    <!-- BEGIN: generate_page -->
                    <tfoot>
                        <tr>
                            <td class="text-center" colspan="9">{NV_GENERATE_PAGE}</td>
                        </tr>
                    </tfoot>
                    <!-- END: generate_page -->
                    <tbody>
                        <!-- BEGIN: loop -->
                        <tr onclick="nv_table_row_click(event, '{PROJECT.link_view}', false);" class="pointer">
                            <td class="text-center">{PROJECT.number}</td>
                            <td>{PROJECT.title}</td>
                            <td>{PROJECT.begintime}</td>
                            <td>{PROJECT.endtime}</td>
                            <td>{PROJECT.realtime}</td>
                            <td>{PROJECT.status}</td>
                        </tr>
                        <!-- END: loop -->
                    </tbody>
                </table>
            </div>
            <!-- END: projects_tab_content -->
            <!-- BEGIN: email_tab_content -->
            <div class="tab-pane fade" id="tab6success">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{LANG.number}</th>
                            <th>{LANG.title}</th>
                            <th width="190">{LANG.email_addtime}</th>
                            <th width="150">{LANG.email_useradd}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- BEGIN: loop -->
                        <tr onclick="nv_table_row_click(event, '{EMAIL.link_view}', false);" class="pointer">
                            <td class="text-center">{EMAIL.number}</td>
                            <td>{EMAIL.title}</td>
                            <td>{EMAIL.addtime}</td>
                            <td>{EMAIL.useradd}</td>
                        </tr>
                        <!-- END: loop -->
                    </tbody>
                </table>
            </div>
            <!-- END: email_tab_content -->
        </div>
    </div>
</div>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<script type="text/javascript" sr="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/i18n/{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>



<script type="text/javascript">
    $('.select2').select2({
        language : '{NV_LANG_INTERFACE}',
        theme : 'bootstrap'
    });
	
    
    function nv_chang_tags(customerid) {
        var tid = $('#change_tags_' + customerid).val();
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail&nocache=' + new Date().getTime(), 'change_tags=1&customerid=' + customerid + '&tid=' + tid, function(res) {
            //         var r_split = res.split("_");
            //         if (r_split[0] != 'OK') {
            //             alert(nv_is_change_act_confirm[2]);
            //             clearTimeout(nv_timer);
            //         }
            //         return;
        });
        return;
    }

    //Change hash for page-reload
   
    function nv_change_contacts() {
        if (confirm('{LANG.queue_confirm}')) {
            $.ajax({
                type : 'POST',
                url : script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail&nocache=' + new Date().getTime(),
                data : 'change_contacts=1&id={CUSTOMER.id}',
                success : function(data) {
                    var r_split = data.split('_');
                    alert(r_split[1]);
                    if (r_split[0] == 'OK') {
                        location.reload();
                    }
                }
            });
        }
        return !1;
    }

    //Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }
</script>

<script type="text/javascript">  


	function time_input(a)
	{
		
		$(a).datepicker({
			dateFormat : "dd/mm/yy",
			changeMonth : true,
			changeYear : true,
			showOtherMonths : true,
		});
	}
	
	$( "#foo" ).bind( "click", function() {
	  alert( "User clicked on 'foo.'" );
	});
	
	function nv_item_change_cycle(i)
	{
		var class_tr = '.item_tr'+ i;
		
		var createtime = $(".createtime" + i).val();
		var cycle = $(".cycle"+ i).val();
		
		console.log(createtime);
		console.log(cycle);
		$.post(script_name + '?' + nv_name_variable + '=invoice&' + nv_fc_variable + '=content&nocache=' + new Date().getTime(), 'get_time_end=1&createtime=' + createtime + '&cycle=' + cycle, function(res) {
			var r_split = res.split('_');
			if (r_split[0] == 'OK') {
				$('.duetime'+ i).val(r_split[1]);
			}
		});
	
	}
   
    
    //]]>
</script>


<script type="text/javascript">

	var count = 1;
    function nv_service_add()
    {
        var html;
        html += '<tr class="item" data-index="' + count + '" data-module="services">';
        html += '    <td rowspan="2" class="number text-center">1</td>';
        html += '    <td><input type="hidden" name="detail[' + count + '][module]" value="services" /><div class="m-bottom"><select class="select2_js form-control" name="detail[' + count + '][itemid]" style="width: 100%" onchange="nv_item_change($(this)); return !1;">';
        html += '	 <option value="0">---{LANG.service_select}---</option>';
    	<!-- BEGIN: services_js -->
        html += '		<option value="{SERVICES.id}">{SERVICES.title}</option>';
        <!-- END: services_js -->
    	html += '	 </select></div></td>';
	    html += '    <td><input type="text" class="form-control unit_price input_price" onkeyup="this.value=FormatNumber(this.value);" onchange="nv_item_change_input();" name="detail[' + count + '][unit_price]" value="0"></td>';
	    html += '    <td><input type="number" class="form-control quantity" onchange="nv_item_change_input();" name="detail[' + count + '][quantity]" value="1"></td>';
        html += '    <td><input type="text" class="form-control price" readonly="readonly" name="detail[' + count + '][price]"></td>';
        html += '    <td><input type="text" class="form-control vat" onchange="nv_item_change_input();" name="detail[' + count + '][vat]"></td>';
        html += '    <td><input type="text" class="form-control vat_price" readonly="readonly" name="detail[' + count + '][vat_price]"></td>';
        html += '    <td class="total"></td>';
        html += '    <td class="text-center"><em class="fa fa-trash-o fa-lg pointer" onclick="nv_item_delete(this); return !1;">&nbsp;</em></td>';
        html += '</tr>';
		
		var chuky = '<select class="cycle'+ count +' form-control" name="detail[' + count + '][cycle]" style="width: 100%" onchange="nv_item_change_cycle('+ count +'); return !1;">';
        chuky += '	 <option value="0">---Chọn chu kỳ---</option>';
    	<!-- BEGIN: cycle -->
        chuky += '		<option value="{CYCLE.key}">{CYCLE.value}</option>';
        <!-- END: cycle -->
    	chuky += '	 </select>';
		
		html += '<tr class="item_tr'+ count +'"><td><textarea class="form-control" name="detail[' + count + '][note]" placeholder="{LANG.note}"></textarea></td><td colspan="2"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Đối tác</div></div><input name="detail[' + count + '][partner]" type="text" class="partner"></div></td><td colspan="2"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Thời gian bắt đầu</div></div><input onclick="time_input(this);" onchange="nv_item_change_cycle('+ count +');" name="detail[' + count + '][createtime]" type="text" class="createtime'+ count +' form-control"></div></td><td colspan="1"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Chọn chu kỳ</div></div> '+ chuky +' </div></td><td colspan="2"><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">Thời gian hết hạn</div></div><input onclick="time_input(this);" name="detail[' + count + '][duetime]" type="text" class="form-control duetime'+ count +'"></div></td></tr>';
        
        $('#item-detail').append(html);
        $('.number').addNumber();
       
        
        $(".select2_js").select2({
            language : "{NV_LANG_INTERFACE}",
            theme : "bootstrap",
        });
        
        count++;
        return !1;
    }
    
    function nv_product_add()
    {
        var html;
        html += '<tr class="item" data-index="' + count + '" data-module="products">';
        html += '    <td class="number text-center">1</td>';
        html += '    <td><input type="hidden" name="detail[' + count + '][module]" value="products" /><div class="m-bottom"><select class="select2_js form-control" name="detail[' + count + '][itemid]" style="width: 100%" onchange="nv_item_change($(this)); return !1;">';
        html += '	 <option value="0">---{LANG.product_select}---</option>';
    	<!-- BEGIN: products_js -->
        html += '		<option value="{PRODUCTS.id}">{PRODUCTS.title}</option>';
        <!-- END: products_js -->
    	html += '	 </select></div><textarea class="form-control" name="detail[' + count + '][note]" placeholder="{LANG.note}"></textarea></td>';
    	html += '    <td><input type="number" class="form-control unit_price input_price" onchange="nv_item_change_input();" name="detail[' + count + '][unit_price]" value="0"></td>';
	    html += '    <td><input type="number" class="form-control quantity" onchange="nv_item_change_input();" name="detail[' + count + '][quantity]" value="1"></td>';
        html += '    <td><input type="text" class="form-control price" readonly="readonly" name="detail[' + count + '][price]"></td>';
        html += '    <td><input type="text" class="form-control vat" onchange="nv_item_change_input();" name="detail[' + count + '][vat]"></td>';
        html += '    <td><input type="text" class="form-control vat_price" readonly="readonly" name="detail[' + count + '][vat_price]"></td>';
        html += '    <td class="total"></td>';
        html += '    <td class="text-center"><em class="fa fa-trash-o fa-lg pointer" onclick="nv_item_delete(this); return !1;">&nbsp;</em></td>';
        html += '</tr>';
        
        $('#item-detail').append(html);
        $('.number').addNumber();
        new AutoNumeric('.input_price');
        
        $(".select2_js").select2({
            language : "{NV_LANG_INTERFACE}",
            theme : "bootstrap",
        });
        
        count++;
        return !1;
    }
    
    function nv_projects_add()
    {
        var html;
        html += '<tr class="item" data-index="' + count + '" data-module="projects">';
        html += '    <td class="number text-center">1</td>';
        html += '    <td><input type="hidden" name="detail[' + count + '][module]" value="projects" /><div class="m-bottom"><select class="select2_js form-control" name="detail[' + count + '][itemid]" style="width: 100%" onchange="nv_item_change($(this)); return !1;">';
        html += '	 <option value="0">---{LANG.projects_select}---</option>';
    	<!-- BEGIN: projects_js -->
        html += '		<option value="{PROJECTS.id}">{PROJECTS.title}</option>';
        <!-- END: projects_js -->
    	html += '	 </select></div><textarea class="form-control" name="detail[' + count + '][note]" placeholder="{LANG.note}"></textarea></td>';
    	html += '    <td><input type="number" class="form-control unit_price input_price" onchange="nv_item_change_input();" name="detail[' + count + '][unit_price]" value="0"></td>';
	    html += '    <td><input type="number" class="form-control quantity" onchange="nv_item_change_input();" name="detail[' + count + '][quantity]" value="1"></td>';
        html += '    <td><input type="text" class="form-control price" readonly="readonly" name="detail[' + count + '][price]"></td>';
        html += '    <td><input type="text" class="form-control vat" onchange="nv_item_change_input();" name="detail[' + count + '][vat]"></td>';
        html += '    <td><input type="text" class="form-control vat_price" readonly="readonly" name="detail[' + count + '][vat_price]"></td>';
        html += '    <td class="total"></td>';
        html += '    <td class="text-center"><em class="fa fa-trash-o fa-lg pointer" onclick="nv_item_delete(this); return !1;">&nbsp;</em></td>';
        html += '</tr>';
        
        $('#item-detail').append(html);
        $('.number').addNumber();
        new AutoNumeric('.input_price');
        
        $(".select2_js").select2({
            language : "{NV_LANG_INTERFACE}",
            theme : "bootstrap",
        });
        
        count++;
        return !1;
    }
    //]]>
</script>


<script>
	$('#item-detail').html('');
</script>


<!-- END: main -->