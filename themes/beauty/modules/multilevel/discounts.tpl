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
							<li class="breadcrumb-item active" aria-current="page">Quản lý chiết khấu</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Quản lý chiết khấu</h4>
					<hr/>
					<!-- BEGIN: view -->
					<form action="{NV_BASE_ADMINURL}index.php" method="get">
						<input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
						<input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />

						<div class="form-row">
							<div class="col-xs-12 col-md-6">
								<div class="input-group mb-3">
									<select class="form-control mp" name="productid" id="productid">
										<option value="0"> -- {LANG.discount_product} -- </option>
										<!-- BEGIN: sl_productid -->
										<option value="{PRODUCT.id}" {PRODUCT.sl} >{PRODUCT.title}</option>
										<!-- END: sl_productid -->
									</select>
									<button class="btn btn-primary" type="submit"><i class="lni lni-search-alt mr-1"></i>{LANG.search}</button>
								</div>
							</div>
						</div>
						<input type="hidden" name="checkss" value="{NV_CHECK_SESSION}" />
					</form>
					<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="thead-dark">
									<tr>
										<th>{LANG.discount_product}</th>
										<th>{LANG.discount_from}</th>
										<th>{LANG.discount_to}</th>
										<th>{LANG.discount_number}</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<!-- BEGIN: generate_page -->
								<tfoot>
									<tr>
										<td colspan="6" class="text-center">{NV_GENERATE_PAGE}</td>
									</tr>
								</tfoot>
								<!-- END: generate_page -->
								<tbody>
									<!-- BEGIN: loop -->
									<tr>
										<td> {VIEW.product} </td>
										<td> {VIEW.begin_quantity} </td>
										<td> {VIEW.end_quantity} </td>
										<td> {VIEW.percent} </td>
										<td class="text-center">
											<a class="btn btn-primary btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{LANG.edit}" href="{VIEW.link_edit}" title="{LANG.edit}"><i class="lni lni-pencil"></i></a>
											<a class="btn btn-danger btn-sm " data-toggle="tooltip" data-placement="top" data-original-title="{LANG.delete}" href="{ROW.link_delete}" title="{LANG.delete}" onclick="return confirm(nv_is_del_confirm[0]);"><i class="lni lni-trash"></i></a>
										</td>
									</tr>
									<!-- END: loop -->
								</tbody>
							</table>
						</div>
					</form>
					<!-- END: view -->
					<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
						<input type="hidden" name="id" value="{ROW.id}" />
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<caption>{CAPTION}</caption>
								<thead class="thead-dark">
									<tr>
										<th> {LANG.discount_product} </th>
										<th> {LANG.discount_from} </th>
										<th> {LANG.discount_to} </th>
										<th> {LANG.discount_number} </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<select class="form-control" name="productid">
												<option value="0">--{LANG.select_product}--</option>
												<!-- BEGIN: productid -->
												<option value="{PRODUCT.id}"{PRODUCT.sl}>{PRODUCT.title}</option>
												<!-- END: productid -->
											</select>
										</td>
										<td><input class="form-control" type="text" name="begin_quantity" value="{ROW.begin_quantity}" /></td>
										<td><input class="form-control" type="text" name="end_quantity" value="{ROW.end_quantity}"/></td>
										<td>
											<div class="input-group">
												<input class="form-control" type="text" name="percent" value="{ROW.percent}" />
												<div class="input-group-append">
													<span class="input-group-text">%</span>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="text-center">
							<button class="btn btn-primary" name="submit" type="submit"><i class="lni lni-save mr-1"></i>{LANG.save}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: main -->