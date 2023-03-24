<!-- BEGIN: main -->
<!-- BEGIN: view -->
<div class="well">
<form action="{NV_BASE_ADMINURL}index.php" method="get">
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
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="w100">{LANG.number}</th>
					<th>{LANG.cid}</th>
					<th>SIDE ID</th>
					<th>{LANG.domain}</th>
					<th class="w250">&nbsp;</th>
				</tr>
			</thead>
			<!-- BEGIN: generate_page -->
			<tfoot>
				<tr>
					<td class="text-center" colspan="4">{NV_GENERATE_PAGE}</td>
				</tr>
			</tfoot>
			<!-- END: generate_page -->
			<tbody>
				<!-- BEGIN: loop -->
				<tr>
					<td> {VIEW.number} </td>
					<td> {VIEW.cid} </td>
					<td> {VIEW.idsite} </td>
					<td> {VIEW.domain} </td>
					<td class="text-center"><!-- BEGIN:admin --><i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a> <!-- BEGIN:godadmin -->- <em class="fa fa-sun-o fa-lg">&nbsp;</em> <a class="nv-reinstall-site" href="#" data-title="{VIEW.domain}" >{LANG.reinstall}</a> <!-- END:godadmin -->- <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a><!-- END:admin --></td>
				</tr>
				<!-- END: loop -->
			</tbody>
		</table>
	</div>
</form>
<!-- END: view -->
<div class="modal fade" id="modal-reinstall-site">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{LANG.reinstall_site}</h4>
			</div>
			<div class="modal-body">
				<div class="load text-center hidden">
					<i class="fa fa-circle-o-notch fa-spin fa-2x"></i>
				</div>
				<div class="content hidden">
					<p class="text-info message"></p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary submit">{GLANG.submit}</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">{GLANG.cancel}</button>
			</div>
		</div>
	</div>
</div>
<!-- END: main -->