<!-- BEGIN: main -->
<div id="users">
	<form action="{FORM_ACTION}" method="post">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<colgroup>
					<col style="width: 260px" />
					<col/>
				</colgroup>
				<tfoot>
					<tr>
						<td colspan="2"><input type="hidden" name="save" value="1"><input type="submit" value="{LANG.config_save}" class="btn btn-primary" /></td>
					</tr>
				</tfoot>
				<tbody>
                     <tr>
						<td>{LANG.config_category}</td>
						<td><span class="help-block">{LANG.config_category_note}</span>
                        <input class="form-control w200" name="module_setting" value="{DATA.module_setting}" /></td>
					</tr>
                    <tr>
						<td>{LANG.config_apichatgpt}</td>
						<td><span class="help-block">Sử dụng nhiều api|api|api|api|api</span><input class="form-control w200" name="apichatgpt" value="{DATA.apichatgpt}" /></td>
					</tr>
				
				</tbody>
			</table>
		</div>
	</form>
</div>
<!-- END: main -->