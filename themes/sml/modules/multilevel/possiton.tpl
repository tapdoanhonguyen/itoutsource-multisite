<!-- BEGIN: main -->
<!-- BEGIN: data -->
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
							<li class="breadcrumb-item active" aria-current="page">Vị trí nhân sự</li>
						</ol>
					</nav>
				</div>
				<div class="ml-auto">
					<div class="btn-group">
						<a href="{add_possiton}" class="btn btn-success"><i class="lni lni-add-files mr-1"></i>{LANG.add_possiton}</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Vị trí nhân sự</h4>
					<hr/>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<colgroup>
								<col class="w100">
								<col span="1">
								<col span="2" class="w150">
							</colgroup>
							<thead class="thead-dark">
								<tr class="text-center">
									<th>ID</th>
									<th>{LANG.title}</th>
									<th>{LANG.salary}</th>
									<th>{LANG.salary_kpi}&nbsp;<em class="fa fa-question-circle fa-pointer text-info" data-toggle="tooltip" data-original-title="{LANG.salary_kpi_note}"></em></th>
									<th>{LANG.percent_responsibility}&nbsp;<em class="fa fa-question-circle fa-pointer text-info" data-toggle="tooltip" data-original-title="{LANG.percent_responsibility_note}"></em></th>
									<th>{LANG.istype}</th>
									<th>{LANG.status}</th>
									<th>{LANG.feature}</th>
								</tr>
							</thead>
							<tbody>
								<!-- BEGIN: row -->
								<tr>
									<td class="text-center">
										<select id="change_weight_{ROW.id}" onchange="nv_chang_weight('{ROW.id}', '{op}');" class="form-control">
											<!-- BEGIN: weight -->
											<option value="{WEIGHT.w}"{WEIGHT.selected}>{WEIGHT.w}</option>
											<!-- END: weight -->
										</select>
									</td>
									<td>{ROW.title}</td>
									<td>{ROW.salary}</td>
									<td>{ROW.kpi_require}</td>
									<td>{ROW.percent_responsibility}%</td>
									<td>{ROW.istype}</td>
									<td class="text-center">
										<select id="change_status_{ROW.id}" onchange="nv_chang_status('{ROW.id}', '{op}');" class="form-control">
											<!-- BEGIN: status -->
											<option value="{STATUS.key}"{STATUS.selected}>{STATUS.val}</option>
											<!-- END: status -->
										</select>
									</td>
									<td class="text-center">
										<a class="btn btn-primary btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{GLANG.edit}" href="{ROW.url_edit}" title="{GLANG.edit}"><i class="lni lni-pencil"></i></a>
										 <a class="btn btn-danger btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{GLANG.delete}" href="{ROW.link_delete}" title="{GLANG.delete}" onclick="nv_module_del({ROW.id}, '{op}', '{ROW.checkss}');"><i class="lni lni-trash"></i></a>
									</td>
								</tr>
								<!-- END: row -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: data -->
<!-- BEGIN: add -->
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
							<li class="breadcrumb-item active" aria-current="page">Thêm vị trí nhân sự</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Thêm vị trí nhân sự</h4>
					<hr/>				
					<!-- BEGIN: error -->
					<div class="alert alert-danger">
						{ERROR}
					</div>
					<!-- END: error -->
					<form action="{FORM_ACTION}" method="post" class="confirm-reload">
						<input name="submit" type="hidden" value="1" />
						<div class="form-row">
							<div class="col-md-6">
								<div class="">
									<label>{LANG.title} <span class="red">(*)</span></label>
									<input class="form-control" type="text" value="{DATA.title}" name="title" id="idtitle" maxlength="250" />
								</div>
							</div>
							<div class="col-md-6">
								<label>{LANG.alias}</label>
								<div class="input-group mb-3">
									<input class="form-control pull-left" type="text" value="{DATA.alias}" name="alias" id="idalias" maxlength="250" />
									<div class="input-group-append">
										<button type="button" class="btn btn-primary">
											<i class="lni lni-reload" onclick="get_alias('{ID}');"></i>
										</button>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<label>{LANG.image}</label>
								<div class="input-group">
									<input class="form-control" type="text" name="image" id="image" value="{DATA.image}"/>
									<div class="input-group-append">
										<button type="button" name="selectimg" class="btn btn-primary"><i class="lni lni-folder mr-1"></i>Browse server</button>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>{LANG.salary_kpi}<em class="fa fa-question-circle fa-pointer text-info" data-toggle="tooltip" data-original-title="{LANG.salary_kpi_note}">&nbsp;</em></label>
									<input onkeyup="this.value=FormatNumber(this.value);" class="w300 form-control" type="text" value="{DATA.kpi_require}" name="kpi_require" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>{LANG.salary}<em class="fa fa-question-circle fa-pointer text-info" data-toggle="tooltip" data-original-title="{LANG.salary_note}">&nbsp;</em></label>
									<input onkeyup="this.value=FormatNumber(this.value);" class="w300 form-control" type="text" value="{DATA.salary}" name="salary" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>{LANG.percent_responsibility}<em class="fa fa-question-circle fa-pointer text-info" data-toggle="tooltip" data-original-title="{LANG.percent_responsibility_note}">&nbsp;</em></label>
									<input class="w300 form-control" type="text" value="{DATA.percent_responsibility}" name="percent_responsibility" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>{LANG.istype}</label>
									<select name="istype" class="w300 form-control">
										<!-- BEGIN: istype -->
										<option value="{ISTYPE.value}"{ISTYPE.sl}>{ISTYPE.title}</option>
										<!-- END: istype -->
									</select>
								</div>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary"/><i class="lni lni-save mr-1"></i>{LANG.save}</button>
						</div>
					</form>
					<script type="text/javascript">
						var uploads_dir_user = '{UPLOADS_DIR_USER}';
						$("#titlelength").html($("#idtitle").val().length);
						$("#idtitle").bind('keyup paste', function() {
							$("#titlelength").html($(this).val().length);
						});

						$("#descriptionlength").html($("#description").val().length);
						$("#description").bind('keyup paste', function() {
							$("#descriptionlength").html($(this).val().length);
						});
					</script>
					<!-- BEGIN: get_alias -->
					<script type="text/javascript">
						$(document).ready(function() {
							$('#idtitle').change(function() {
								get_alias('{ID}');
							});
						});
					</script>
					<!-- END: get_alias -->
					<!-- END: add -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: main -->