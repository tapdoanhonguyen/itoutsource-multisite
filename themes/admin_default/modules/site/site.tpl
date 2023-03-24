<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<input type="hidden" name="idsite" value="{ROW.idsite}" />
	<input type="hidden" name="domainold" value="{ROW.domainold}" />
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.cid}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<select class="form-control" name="cid">
				<option value=""> --- </option>
				<!-- BEGIN: select_cid -->
				<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
				<!-- END: select_cid -->
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.domaintype}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<select class="form-control" name="domaintype" {DISABLE}>
				<!-- BEGIN: domaintype -->
				<option value="{DOMAINTYPE.key}" {DOMAINTYPE.selected}>{DOMAINTYPE.title}</option>
				<!-- END: domaintype -->
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.domain}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="domain" value="{ROW.domain}"  required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" {DISABLE}/> 
		</div>
	</div>
	<!-- BEGIN: subdomain -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.subdomain}</strong></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="subdomain" value="{ROW.subdomain}"  /> 
		</div>
	</div>
	<!-- END: subdomain -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.sample}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<select class="form-control" name="sample">
				<option value=""> --- </option>
				<!-- BEGIN: select_sample -->
				<option value="{SAMPLE.key}" {SAMPLE.selected}>{SAMPLE.title}</option>
				<!-- END: select_sample -->
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>EMAIL</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="email" value="{ROW.email}"  required="required" oninvalid="setCustomValidity( nv_required )" oninput="setCustomValidity('')" {DISABLE}/> 
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.authors}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="username" value="{ROW.username}" {DISABLE}/>
		</div>
	</div>
	<!-- BEGIN: password -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.password}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="password" value="{ROW.password}" {DISABLE}/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.repassword}</strong> <span class="red">(*)</span></label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="text" name="repassword" value="{ROW.repassword}" {DISABLE}/>
		</div>
	</div>
	<!-- END: password -->
	<div class="form-group">
		<label class="col-sm-5 col-md-4 control-label"><strong>{LANG.allowuserreg}</strong> </label>
		<div class="col-sm-19 col-md-20">
			<input class="form-control" type="checkbox" name="allowuserreg" value="1" {ROW.checked}/>
		</div>
	</div>
	<div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<!-- END: main -->