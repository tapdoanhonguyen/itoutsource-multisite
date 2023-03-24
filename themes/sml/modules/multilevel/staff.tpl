<!-- BEGIN: main -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/home/assets/plugins/select2/css/select2.min.css"/>
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/home/assets/plugins/select2/css/select2-bootstrap4.css"/>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/home/assets/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/i18n/{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<div class="page-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
				<div class="breadcrumb-title pr-3">Quản trị hệ thống</div>
				<div class="pl-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Hệ thống nhân viên</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">{caption}</h4>
					<hr/>
					<div id="module_show_list">
						{CAT_LIST}
					</div>
					<div id="edit">
						<!-- BEGIN: error -->
						<div class="alert alert-warning">
							{ERROR}
						</div>
						<!-- END: error -->
						<!-- BEGIN: content -->
						<form action="{NV_BASE_ADMINURL}index.php" method="post">
							<input type="hidden" name ="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
							<input type="hidden" name ="{NV_OP_VARIABLE}" value="{OP}" />
							<input type="hidden" name ="userid" value="{DATA.userid}" />
							<input name="savecat" type="hidden" value="1" />
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.catinfo}</label>
										<select class="form-control" name="parentid" id="parentid">
											<option value="0">--{LANG.root_level}--</option>
											<!-- BEGIN: catinfo -->
											<option value="{CAT_SUB.value}"{CAT_SUB.selected}>{CAT_SUB.title}</option>
											<!-- END: catinfo -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.fullname} <span class="red">(*)</span></label>
										<div class="input-group">
											<div class="uiTokenizer uiInlineTokenizer"  style="float:left;width: 100%">
												<span id="userid" class="tokenarea">
													<!-- BEGIN: data_users -->
													<span class="uiToken removable" title="{DATA.fullname}">
														{DATA.fullname}
														<input type="hidden" autocomplete="off" name="userid" value="{DATA.userid}" />
														<a class="remove uiCloseButton uiCloseButtonSmall" href="javascript:void(0);" onclick="$(this).parent().remove();"></a>
													</span>
													<!-- END: data_users -->
												</span>
												<span class="uiTypeahead">
													<input type="hidden" class="hiddenInput" autocomplete="off" value="" />
													<div class="innerWrap" style="float:left;width: 100%">
														<input id="group_cat-search" type="text" placeholder="{LANG.fullname}" class="form-control textInput" style="width: 100%;" />
													</div>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.username}</label>
										<span id="username"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.email}</label>
										<span id="email"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.birthday}</label>
										<span id="birthday"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.possiton} <span class="red">(*)</span></label>
										<select class="form-control" name="possitonid">
											<option value="0">------</option>
											<!-- BEGIN: possiton -->
											<option value="{POSSITION.id}"{POSSITION.sl}>{POSSITION.title}</option>
											<!-- END: possiton -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.agencyid} <span class="red">(*)</span></label>
										<select class="form-control" name="agencyid">
											<option value="0">------</option>
											<!-- BEGIN: agency -->
											<option value="{AGENCY.id}"{AGENCY.sl}>{AGENCY.title} - {AGENCY.price_require}</option>
											<!-- END: agency -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.province_select}</label>
										<select onchange="nv_load_district('districtid', 0)" class="form-control chosen-select" name="provinceid">
											<option value=""> --- </option>
											<!-- BEGIN: select_province -->
											<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
											<!-- END: select_province -->
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.district_select}</label>
										<div id="load_district">
											<select  class="form-control" name="districtid" id="district" style="width:100%;" tabindex="2">
												<option value="0"> --- </option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.salary_day}</label>
										<input type="text" placeholder="{LANG.salary_day}" value="{DATA.salary_day}" name="salary_day" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.benefit}</label>
										<input type="text" placeholder="{LANG.benefit}" value="{DATA.benefit}" name="benefit" class="form-control" />
									</div>
								</div><div class="col-md-6">
									<div class="form-group">
										<label>{LANG.mobile}</label>
										<input type="text" placeholder="{LANG.mobile}" value="{DATA.mobile}" name="mobile" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.address}</label>
										<input type="text" placeholder="{LANG.address}" value="{DATA.datatext.address}" name="address" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.cmnd}</label>
										<input type="text" placeholder="{LANG.cmnd}" value="{DATA.datatext.cmnd}" name="cmnd" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.ngaycap}</label>
										<input type="text" placeholder="{LANG.ngaycap}" value="{DATA.datatext.ngaycap}" name="ngaycap" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.noicap}</label>
										<input type="text" placeholder="{LANG.noicap}" value="{DATA.datatext.noicap}" name="noicap" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.stknganhang}</label>
										<input type="text" placeholder="{LANG.stknganhang}" value="{DATA.datatext.stknganhang}" name="stknganhang" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.tennganhang}</label>
										<input type="text" placeholder="{LANG.tennganhang}" value="{DATA.datatext.tennganhang}" name="tennganhang" class="form-control" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>{LANG.chinhanh}</label>
										<input type="text" placeholder="{LANG.chinhanh}" value="{DATA.datatext.chinhanh}" name="chinhanh" class="form-control" />
									</div>
								</div>
							</div>
							<div class="text-center">
								<button class="btn btn-primary" name="submit1" type="submit">
									<i class="lni lni-save mr-1"></i>{LANG.save}
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function nv_load_district( select_name, selected_id ){
        var province = $('select[name=provinceid]').val();
        if( province == 0 )$('#load_district').html('');
        else{
            $.post(nv_base_siteurl + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&nocache=' + new Date().getTime(), 'act=district&province=' + province + '&select_name=' + select_name + '&selected_id=' + selected_id, function(res) {
                $('#load_district').html(res)
            });
        }
    }
    <!-- BEGIN: load_district -->
    nv_load_district( 'districtid', '{DATA.districtid}' );
    <!-- END: load_district -->
	$(document).ready(function() {
		$("#parentid").select2({
			language : '{NV_LANG_DATA}',
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	});
    $("#group_cat-search").bind("keydown", function(event) {
        if (event.keyCode === $.ui.keyCode.TAB && $(this).data("ui-autocomplete").menu.active) {
            event.preventDefault();
        }
    }).autocomplete({
        source : function(request, response) {
            $.getJSON(script_name + "?" + nv_name_variable + "=" + nv_module_name + "&" + nv_fc_variable + "=userajax", {
                term : extractLast(request.term)
            }, response);
        },
        search : function() {
            // custom minLength
            var term = extractLast(this.value);
            if (term.length < 2) {
                return false;
            }
        },
        select : function(event, data) {
            nv_add_element( data.item );
            $(this).val('');
            return false;
        }
    });
    function nv_add_element( data ){
        var html = "<span title=\"" + data.value + "\" class=\"uiToken removable\">" + data.fullname + "<input type=\"hidden\" value=\"" + data.key + "\" name=\"userid\" autocomplete=\"off\"><a onclick=\"$(this).parent().remove();\" href=\"javascript:void(0);\" class=\"remove uiCloseButton uiCloseButtonSmall\"></a></span>";
        $("#userid").html( html );
        $('#username').html(data.username);
        $('#birthday').html(data.birthday);
        $('#email').html(data.email);
        return false;
    }
    function split(val) {
        return val.split(/,\s*/);
    }

    function extractLast(term) {
        return split(term).pop();
    }
    <!-- BEGIN: data_cus_js -->
    $('#username').html('{DATA.username}');
    $('#birthday').html('{DATA.birthday}');
    $('#email').html('{DATA.email}');
    <!-- END: data_cus_js -->
</script>
<!-- END: content -->
<!-- END: main -->