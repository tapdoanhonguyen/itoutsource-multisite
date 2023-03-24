<!-- BEGIN: main -->
<!-- BEGIN: view -->
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
							<li class="breadcrumb-item active" aria-current="page">Danh sách nhà phân phối</li>
						</ol>
					</nav>
				</div>
				<div class="ml-auto">
					<div class="btn-group">
						<a href="{LINK.add}" class="btn btn-success"><i class="lni lni-add-files mr-1"></i>Thêm NPP mới</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Danh sách nhà phân phối</h4>
					<hr/>
					<form action="{LINK.search}" method="get">
						<div class="form-row">
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" type="text" value="{Q}" name="q" maxlength="255" placeholder="Tìm kiếm"/>
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit"><i class="lni lni-search-alt mr-1"></i>{LANG.search}</button>
										</div>   
									</div>  
								</div>  
							</div>						
						</div>						
					</form>
					<form class="form-inline" action="{LINK.form}" method="post">
						<div class="table-responsive 123">
							<table class="table table-bordered table-hover">
								<thead class="thead-dark">
									<tr>
										<th>{LANG.number}</th>
										<th>{LANG.customer_code}</th>
										<th>{LANG.customer_name}</th>
										<th>{LANG.address}</th>
										<th>{LANG.phone}</th>
										<th>{LANG.email}</th>
										<th>{LANG.status}</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<!-- BEGIN: loop -->
									<tr>
										<td class="text-center"> {ROW.TT} </td>
										<td> {ROW.code} </td>
										<td> {ROW.fullname} </td>
										<td> {ROW.address} </td>
										<td> {ROW.mobile} </td>
										<td> {ROW.email} </td>
										<td> {ROW.status} </td>
										<td class="text-center">
										  <a class="btn btn-primary btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{LANG.edit}" href="{ROW.link_edit}" title="{LANG.edit}"><i class="lni lni-pencil"></i></a>
										  <a class="btn btn-danger btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{LANG.delete}" href="{ROW.link_delete}" title="{LANG.delete}" onclick="return confirm(nv_is_del_confirm[0]);"><i class="lni lni-trash"></i></a>
										</td>
									</tr>
									<!-- END: loop -->
								</tbody>
							</table>
						</div>
						{NV_GENERATE_PAGE}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- END: view -->

<!-- BEGIN: add_customer -->
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css">

<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/i18n/{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<form class="form-inline" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<input type="hidden" name="customer_id" value="{ROW.customer_id}" />
    <div class="tab_container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <caption>{LANG.customer_info}</caption>
    			<tbody>
					<tr>
						<td style="width:150px;">{LANG.refer_user}</td>
						<td>
							<div class="uiTokenizer uiInlineTokenizer"  style="float:left;">
									<span id="userid" class="tokenarea">
										<!-- BEGIN: data_users -->
										<span class="uiToken removable" title="{ROW.refer_title}">
											{ROW.refer_fullname}<input type="hidden" autocomplete="off" name="refer_userid" value="{ROW.refer_userid}" />
											<a class="remove uiCloseButton uiCloseButtonSmall" href="javascript:void(0);" onclick="$(this).parent().remove();"></a>
										</span>
										<!-- END: data_users -->
									</span>
								<span class="uiTypeahead">
										<input type="hidden" class="hiddenInput" autocomplete="off" value="" />
										<div class="innerWrap" style="float:left;">
											<input id="group_cat-search" type="text" placeholder="{LANG.input_customer}" class="form-control textInput" style="width: 100%;" />
										</div>
									</span>
							</div>
						</td>
					</tr>
					<tr>
						<td> {LANG.customer_code} </td>
						<td><input class="w300 form-control" type="text" name="code" value="{ROW.code}" /></td>
					</tr>
    				<tr>
    					<td> {LANG.customer_name} </td>
    					<td><input class="w300 form-control" type="text" name="fullname" value="{ROW.fullname}" /></td>
    				</tr>
    				<tr>
    					<td> {LANG.address} </td>
    					<td><input class="w300 form-control" type="text" name="address" value="{ROW.address}" /></td>
    				</tr>
    				<tr>
    					<td> {LANG.phone} </td>
    					<td><input class="w300 form-control" type="text" name="phone" value="{ROW.phone}" /></td>
    				</tr>
    				<tr>
    					<td> {LANG.email} </td>
    					<td><input class="w300 form-control" type="text" name="email" value="{ROW.email}" /></td>
    				</tr>
					<tr>
						<td> {LANG.description} </td>
						<td><textarea class="w300 form-control" name="description">{ROW.description}</textarea></td>
					</tr>
					<tr>
						<td> {LANG.custype} </td>
						<td>
							<select name="custype" class="form-control">
								<!-- BEGIN: select_custype -->
								<option value="{OPTION.key}"{OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_custype -->
							</select>
						</td>
					</tr>
					<tr>
						<td> {LANG.status} </td>
						<td>
							<select name="status" class="form-control">
								<!-- BEGIN: select_status -->
								<option value="{OPTION.key}"{OPTION.selected}>{OPTION.title}</option>
								<!-- END: select_status -->
							</select>
						</td>
					</tr>
    			</tbody>
    		</table>
        </div>
    </div>    
    <div style="text-align: center">
        <input type="hidden" name="cus_type_value" value="" />
        <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
    </div>
    <div class="clear">&nbsp;</div> 
 </form>

<script type="text/javascript">
    $("#parentid").select2();
    $("#group_cat-search").bind("keydown", function(event) {
        if (event.keyCode === $.ui.keyCode.TAB && $(this).data("ui-autocomplete").menu.active) {
            event.preventDefault();
        }
    }).autocomplete({
        source : function(request, response) {
            $.getJSON(script_name + "?" + nv_name_variable + "=" + nv_module_name + "&" + nv_fc_variable + "=customerajax&act=referuser", {
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
        var html = "<span title=\"" + data.value + "\" class=\"uiToken removable\">" + data.fullname + "<input type=\"hidden\" value=\"" + data.key + "\" name=\"refer_userid\" autocomplete=\"off\"><a onclick=\"$(this).parent().remove();\" href=\"javascript:void(0);\" class=\"remove uiCloseButton uiCloseButtonSmall\"></a></span>";
        $("#userid").html( html );
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
<!-- END: add_customer -->
<!-- END: main -->