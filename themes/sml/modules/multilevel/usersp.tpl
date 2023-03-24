<!-- BEGIN: main -->
<!-- BEGIN: nodata -->
<div class="page-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
				<div class="breadcrumb-title pr-3">Quản lý hệ thống bán hàng</div>
				<div class="pl-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Tài khoản đợi kích hoạt</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Tài khoản đợi kích hoạt</h4>
					<hr/>
					<div class="alert alert-success">
						{LANG.no_users_pending}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: nodata -->
<!-- BEGIN: data -->
<div class="page-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
				<div class="breadcrumb-title pr-3">Quản lý hệ thống bán hàng</div>
				<div class="pl-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Tài khoản đợi kích hoạt</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Tài khoản đợi kích hoạt</h4>
					<hr/>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<col span="4" style="white-space: nowrap;" />
							<col class="w250" />
							<col style="white-space: nowrap;" />
							<thead class="thead-dark">
								<tr>
									<th class="text-center">{LANG.fullname}</th>
									<th class="text-center">{LANG.birthday}</th>
									<th class="text-center">{LANG.email}</th>
									<th class="text-center">{LANG.mobile}</th>
									<th class="text-center">{LANG.address}</th>
									<th class="text-center">{LANG.functional}</th>
								</tr>
							</thead>
							<tbody>
								<!-- BEGIN: loop -->
								<tr>
									<td><strong>{ROW.fullname}</strong></td>
									<td class="text-center">{ROW.birthday}</td>
									<td class="text-center">{ROW.email}</td>
									<td class="text-center">{ROW.datatext.mobile}</td>
									<td class="text-center">{ROW.datatext.address}</td>
									<td class="text-center">
										<a class="btn btn-primary btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{ROW.edit}" href="{ROW.active_url}" title="{LANG.awaiting_active}"><i class="lni lni-pencil"></i></a>
										<a class="btn btn-danger btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{ROW.delete}" href="javascript:void(0);" title="{LANG.delete}" onclick="nv_waiting_row_del({CONTENT_TD.userid});"><i class="lni lni-trash"></i></a>
									</td>
								</tr>
								<!-- END: loop -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: data -->
<!-- END: main -->