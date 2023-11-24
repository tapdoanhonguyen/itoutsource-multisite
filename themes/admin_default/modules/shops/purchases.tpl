<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css">
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.reference_no}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="reference_no" value="{ROW.reference_no}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label" ><strong>{LANG.date}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="date" value="{ROW.date}" id="purchares_date" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.supplier_id}</strong></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="supplier_id">
                <option value=""> --- </option>
                <!-- BEGIN: select_supplier_id -->
                <option value="{OPTION.id}" {OPTION.selected}>{OPTION.vi_title}</option>
                <!-- END: select_supplier_id -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.warehouse_id}</strong></label>
        <div class="col-sm-19 col-md-20">
            <select class="form-control" name="warehouse_id">
                <option value=""> --- </option>
                <!-- BEGIN: select_warehouse_id -->
                <option value="{OPTION.id}" {OPTION.selected}>{OPTION.name}</option>
                <!-- END: select_warehouse_id -->
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.note}</strong></label>
        <div class="col-sm-19 col-md-20">
            <textarea class="form-control" style="height:100px;" cols="75" rows="5" name="note">{ROW.note}</textarea>
        </div>
    </div>
	
	
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.attachment}</strong></label>
        <div class="col-sm-19 col-md-20">
            <div class="input-group">
            <input class="form-control" type="text" name="attachment" value="{ROW.attachment}" id="id_attachment" />
            <span class="input-group-btn">
                <button class="btn btn-default selectfile" type="button" >
                <em class="fa fa-folder-open-o fa-fix">&nbsp;</em>
            </button>
            </span>
        </div>
        </div>
    </div>
	
    <div class="listing-body">
		<!-- BEGIN: loop -->
		<div class="listing-item">
			<div class="row">
				<div class="col-sm-1">

								</div>
				<!-- BEGIN: items -->
				<div class="col-sm-3">
					<div class="form-group">
						<div <!-- BEGIN: has_error -->class="has-error"<!-- END: has_error -->>
							<input type="text" autocomplete="off" name="data[{DATA.id}][{J}][product_id]" class="form-control" placeholder="{LANG.content_add}" id = "selectproduct" />
						</div>
					</div>
				</div>
				<!-- END: items -->
				<div class="col-sm-3">
					<div class="form-group">
						<input type="number" autocomplete="off" name="data[{DATA.id}][{J}][quantity]" class="form-control" placeholder="{LANG.warehouse_quantity}"  />
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<input type="text" name="data[{DATA.id}][{J}][price]" class="form-control" placeholder="{LANG.warehouse_price}" onkeyup="this.value=FormatNumber(this.value);" />
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<select name="data[{DATA.id}][{J}][money_unit]" class="form-control">
							<!-- BEGIN: money_unit -->
							<option value="{MON.code}" {MON.selected}>{MON.currency}</option>
							<!-- END: money_unit -->
						</select>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
		<script type="text/javascript">
			$('.btn-add').click(function(){
				var i = $('.listing-item').length;
				var html = '';
				html += '<div class="listing-item">';
				html += '	<div class="row">';
				html += '		<div class="col-sm-1 text-right text-middle">';
				html += '			<a style="cursor:pointer" onclick="$(this).parent().parent().parent().remove();"><em class="fa fa-trash-o fa-lg">&nbsp;</em></a>';
				html += '		</div>';
						<!-- BEGIN: itemsjs -->
				html += '		<div class="col-sm-3">';
				html += '			<div class="form-group">';
				html += '				<div <!-- BEGIN: has_error -->class="has-error"<!-- END: has_error -->>';
				html += '				<input type="text" autocomplete="off" name="data[{DATA.id}][{J}][product_id]" class="form-control select2" placeholder="{LANG.content_add}" id = "selectproduct"/>';
				html += '				</div>';
				html += '			</div>';
				html += '		</div>';
						<!-- END: itemsjs -->
				html += '		<div class="col-sm-3">';
				html += '			<div class="form-group">';
				html += '				<input type="number" autocomplete="off" name="data[{DATA.id}][' + i + '][quantity]" class="form-control" placeholder="{LANG.warehouse_quantity}" />';
				html += '			</div>';
				html += '		</div>';
				html += '		<div class="col-sm-3">';
				html += '			<div class="form-group">';
				html += '				<input type="text" name="data[{DATA.id}][' + i + '][price]" class="form-control" placeholder="{LANG.warehouse_price}" onkeyup="this.value=FormatNumber(this.value);" />';
				html += '			</div>';
				html += '		</div>';
				html += '		<div class="col-sm-3">';
				html += '			<div class="form-group">';
				html += '				<select name="data[{DATA.id}][' + i + '][money_unit]" class="form-control" >';
									<!-- BEGIN: money_unit_js -->
				html += '					<option value="{MON.code}" {MON.selected}>{MON.currency}</option>';
									<!-- END: money_unit_js -->
				html += '				</select>';
				html += '			</div>';
				html += '		</div>';
				html += '	</div>';
				html += '</div>';

				$('.listing-item:last').after( html );
				$('.listing-item:last .select2').select2({
				  ajax: {
					url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=purchares&nocache=' + new Date().getTime(),
					dataType: 'json',
					delay: 250,
					data: function(params) {
					  return {
						q: params.term,
					  };
					},
					processResults: function(data) {
					  return {
						results: data.items,
					  };
					},
					cache: true,
				  },
				  placeholder: 'Chọn một mục',
				  minimumInputLength: 1,
				});
				return false;
			});
			
		</script>
		<!-- END: loop -->
		<button class="btn btn-primary btn-xs btn-add" style="margin-top: 4px"><em class="fa fa-plus-circle">&nbsp;</em>{LANG.content_add}</button>
	</div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>

<script type="text/javascript">
//<![CDATA[
    $(".selectfile").click(function() {
        var area = "id_attachment";
        var path = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
        var currentpath = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
        var type = "image";
        nv_open_browse(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", 850, 420, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
        return false;
    });
	$('#selectproduct').select2({
		  ajax: {
			url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=purchares&nocache=' + new Date().getTime(),
			dataType: 'json',
			delay: 250,
			data: function(params) {
			  return {
				q: params.term,
			  };
			},
			processResults: function(data) {
			  return {
				results: data.items,
			  };
			},
			cache: true,
		  },
		  placeholder: 'Chọn một mục',
		  minimumInputLength: 1,
		});
//]]>
</script>

<!-- END: main -->