<!-- BEGIN: main -->

<div class="panel panel-default">
	<div class="panel-heading">{LANG.import_customer}</div>
	<div class="panel-body">
		<!-- BEGIN: error_import_excel -->
		<div class="alert alert-warning">{ERROR}</div>
		<!-- END: error_import_excel -->
					
		<div class="panel panel-default">
		<div class="panel-body">
			<form enctype="multipart/form-data" class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" >
			
			<div class="form-group">
				<label class="col-sm-5 col-md-4 control-label"><strong>Chọn file excel</strong></label>
				<div class="col-sm-19 col-md-20">
					<input type="file" name="file_excel"/>
				</div>
			</div>
				
				<div class="form-group" style="text-align: center"><input class="btn btn-primary" name="import_excel" type="submit" value="Import file excel" /></div>
			</form>
		</div>
		</div>


	</div>
</div>



<!-- END: main -->