<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->

<!-- BEGIN: view -->
<div class="well">
<form action="{NV_BASE_SITEURL}index.php" method="get">
    <input type="hidden" name="{NV_LANG_VARIABLE}"  value="{NV_LANG_DATA}" />
    <input type="hidden" name="{NV_NAME_VARIABLE}"  value="{MODULE_NAME}" />
    <input type="hidden" name="{NV_OP_VARIABLE}"  value="{OP}" />
    <div class="row">
        <div class="col-xs-24 col-md-6">
            <div class="form-group">
                <input class="form-control" type="text" value="{Q}" name="q" maxlength="255" placeholder="{LANG.search_title}" />
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
            </div>
        </div>
    </div>
</form>
</div>
<button class="btn btn-primary" value="" />{LANG.export_excel}</button>
<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
	<!-- BEGIN: loop -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
				<tr colspan="10">
					{USERNAME}
				</tr>
                <tr>
                    <th class="w100">{LANG.date_login}</th>
                    <th>Giờ vào ca 1 </th>
                    <th>Giờ ra ca 1</th>
					<th>Giờ vào ca 2 </th>
                    <th>Giờ ra ca 2</th>
					<th>Đi trễ ca 1 </th>
                    <th>Đi trễ ca 2</th>
					<th>Về sớm ca 1 </th>
                    <th>Về sớm ca 2</th>
                </tr>
            </thead>

            <tbody>
                <!-- BEGIN: date -->
                <tr>
                    
                    <td> {DATE} </td>
                    <td> {TIME.time_login_1} </td>
                    <td> {TIME.time_logout_1} </td>
                    <td> {TIME.time_login_2} </td>
                    <td> {TIME.time_logout_2} </td>
					<td> {TIME.time_late_1} </td>
                    <td> {TIME.time_late_2} </td>
                    <td> {TIME.time_soon_1} </td>
                    <td> {TIME.time_soon_2} </td>
                   </tr>
				<!-- END: date -->
            </tbody>
        </table>
		<!-- END: loop -->
    </div>
</form>
<!-- END: view -->




<!-- END: main -->