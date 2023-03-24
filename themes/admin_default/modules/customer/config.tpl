<!-- BEGIN: main -->
<form action="" method="post" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label">{LANG.config_groups_admin}</label>
                <div class="col-sm-20" style="height: 200px; padding: 10px; border: solid 1px #ddd; overflow: scroll;">
                    <!-- BEGIN: groups -->
                    <label class="show"><input type="checkbox" name="groups_admin[]" value="{GROUPS.value}" {GROUPS.checked} />{GROUPS.title}</label>
                    <!-- END: groups -->
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{LANG.config_groups_manage}</label>
                <div class="col-sm-20" style="height: 200px; padding: 10px; border: solid 1px #ddd; overflow: scroll;">
                    <!-- BEGIN: groups_manage -->
                    <label class="show"><input type="checkbox" name="groups_manage[]" value="{GROUPS.value}" {GROUPS.checked} />{GROUPS.title}</label>
                    <!-- END: groups_manage -->
                </div>
            </div>
            <div class="form-group">
				<label class="col-sm-4 control-label">Phân quyền</label>
				<div class="col-sm-20">
					<div class="table-responsive">
						<table class="table table-bordered table-stripped">
							<thead>
								<tr>
									<th>Nhóm</th>
									<th>Xuất excel</th>
									<th>Nhập excel</th>
									<th>Xem</th>
									<th>Xem theo dự án</th>
									<th>Thêm</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								<!-- BEGIN: groups_permission -->
								<tr>
									<td>{GROUPS.title}</td>
									<td class="text-center"><input class="form-control" type="checkbox" name="allow_export[]" value="{GROUPS.value}" {allow_export_ck}/></td>
									<td class="text-center"><input class="form-control" type="checkbox" name="allow_import[]" value="{GROUPS.value}" {allow_import_ck}/></td>
									<td class="text-center"><input class="form-control" type="checkbox" name="allow_view[]" value="{GROUPS.value}" {allow_view_ck}/></td>
									<td class="text-center"><input class="form-control" type="checkbox" name="allow_view_by_project[]" value="{GROUPS.value}" {allow_view_by_project_ck}/></td>
									<td class="text-center"><input class="form-control" type="checkbox" name="allow_add[]" value="{GROUPS.value}" {allow_add_ck}/></td>
									<td class="text-center"><input class="form-control" type="checkbox" name="allow_edit[]" value="{GROUPS.value}" {allow_edit_ck}/></td>
									<td class="text-center"><input class="form-control" type="checkbox" name="allow_delete[]" value="{GROUPS.value}" {allow_delete_ck}/></td>
								</tr>
								<!-- END: groups_permission -->
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="{LANG.save}" name="savesetting" />
    </div>
</form>
<!-- END: main -->