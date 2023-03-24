<!-- BEGIN: main -->
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
							<li class="breadcrumb-item active" aria-current="page">Quản lý giảm giá</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Quản lý giảm giá</h4>
					<hr/>
					<!-- BEGIN: data -->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<td width="20px" class="text-center">&nbsp;</td>
								<td>{LANG.salesfrom}</td>
								<td>{LANG.salesto}</td>
								<td>{LANG.moneyrequire}</td>
								<td width="120px" class="text-center">{LANG.function}</td>
							</tr>
						</thead>
						<tbody>
						<!-- BEGIN: row -->
							<tr>
								<td><input type="checkbox" class="ck" value="{ROW.id}" /></td>
								<td><a href="{link_saleoff_detail}">{ROW.salesfrom}</a></td>
								<td>{ROW.salesto}</td>
								<td>{ROW.moneyrequire}</td>
								<td class="text-center"><i class="fa fa-edit">&nbsp;</i><a href="{link_edit}" title="">{LANG.edit}</a>&nbsp; <i class="fa fa-trash-o">&nbsp;</i><a href="{link_del}" class="delete" title="">{LANG.delete}</a></td>
							</tr>
						<!-- END: row -->
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6"><i class="fa fa-check-square-o">&nbsp;</i><a href="#" id="checkall">{LANG.prounit_select}</a> - <i class="fa fa-square-o">&nbsp;</i> <a href="#" id="uncheckall">{LANG.prounit_unselect}</a> - <i class="fa fa-trash-o">&nbsp;</i><a href="#" id="delall">{LANG.prounit_del_select}</a></td>
							</tr>
						</tfoot>
					</table>
					<script type='text/javascript'>
						$(function() {
							$('#checkall').click(function() {
								$('input:checkbox').each(function() {
									$(this).attr('checked', 'checked');
								});
							});
							$('#uncheckall').click(function() {
								$('input:checkbox').each(function() {
									$(this).removeAttr('checked');
								});
							});
							$('#delall').click(function() {
								if (confirm("{LANG.prounit_del_confirm}")) {
									var listall = [];
									$('input.ck:checked').each(function() {
										listall.push($(this).val());
									});
									if (listall.length < 1) {
										alert("{LANG.prounit_del_no_items}");
										return false;
									}
									$.ajax({
										type : 'POST',
										url : '{URL_DEL}',
										data : 'listall=' + listall,
										success : function(data) {
											window.location = '{URL_DEL_BACK}';
										}
									});
								}
							});
							$('a.delete').click(function(event) {
								event.preventDefault();
								if (confirm("{LANG.prounit_del_confirm}")) {
									var href = $(this).attr('href');
									$.ajax({
										type : 'POST',
										url : href,
										data : '',
										success : function(data) {
											window.location = '{URL_DEL_BACK}';
										}
									});
								}
							});
						});
					</script>
					<!-- END: data -->
					<form action="" method="post">
						<input name="savecat" type="hidden" value="1" />
						<h4>{caption}</h4>
						<hr/>
						<div class="form-row mb-3">
							<div class="col-md-4">
								<label>{LANG.salesfrom}</label>
								<input onkeyup="this.value=FormatNumber(this.value);" class="form-control" name="salesfrom" type="text" value="{DATA.salesfrom}" maxlength="255" />
							</div>
							<div class="col-md-4">
								<label>{LANG.salesto}</label>
								<input onkeyup="this.value=FormatNumber(this.value);" class="form-control" name="salesto" type="text" value="{DATA.salesto}" maxlength="255" />
							</div>
							<div class="col-md-4">
								<label>{LANG.moneyrequire}</label>
								<input onkeyup="this.value=FormatNumber(this.value);" class="form-control" name="moneyrequire" type="text" value="{DATA.moneyrequire}" maxlength="255" />
							</div>
						</div>
						<div class="text-center">
							<button class="btn btn-primary" name="submit" type="submit">
								<i class="lni lni-save mr-1"></i>{LANG.prounit_save}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: main -->