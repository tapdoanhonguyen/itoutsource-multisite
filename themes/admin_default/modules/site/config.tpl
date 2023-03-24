<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<!-- BEGIN: permission -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th colspan="2">
						<em class="fa fa-file-text-o">&nbsp;</em>{LANG.config} 
					</th>
			</thead>
			<tfoot>
				<tr>
					<td colspan="2"><input type="submit" value=" {LANG.save_cf} " name="submit" class="btn btn-primary" /><input type="hidden" value="1" name="savesetting" /></td>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<td width="250">{LANG.alow_multi}</td>
					<td><input class="form-control" type="checkbox" name="alow_multi" value="1"  {ROW.alow_multi}/></td>
				</tr>
				<tr>
					<td width="250">DOMAIN ROOT</td>
					<td><input class="form-control" type="text" name="my_domains" value="{ROW.my_domains}" /></td>
				</tr>
				<tr>
					<td width="250">CPANEL TYPE</td>
					<td>
						<select class="form-control" name="cpaneltype">
							<option value=""> --- </option>
							<!-- BEGIN: select_ctype -->
							<option value="{CPANEL.key}" {CPANEL.selected}>{CPANEL.title}</option>
							<!-- END: select_ctype -->
						</select>
					</td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th colspan="2">
						<em class="fa fa-file-text-o">&nbsp;</em>{LANG.config_cpanel} 
					</th>
			</thead>
			<tbody>
			
				
				<tr>
					<td width="250">IP</td>
					<td><input class="form-control" type="text" name="cpanel_ip" value="{ROW.cpanel_ip}" /></td>
				</tr>
				<tr>
					<td width="250">PORT</td>
					<td><input class="form-control" type="text" name="cpanel_port" value="{ROW.cpanel_port}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.pre_host}</td>
					<td><input class="form-control" type="text" name="cpanel_pre_host" value="{ROW.cpanel_pre_host}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.ftp_user_name}</td>
					<td><input class="form-control" type="text" name="cpanel_ftp_user_name" value="{ROW.cpanel_ftp_user_name}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.ftp_user_pass}</td>
					<td><input class="form-control" type="password" name="cpanel_ftp_user_pass" value="{ROW.cpanel_ftp_user_pass}"/></td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th colspan="2">
						<em class="fa fa-file-text-o">&nbsp;</em>{LANG.config_da} 
					</th>
			</thead>
			<tbody>
				<tr>
					<td width="250">IP</td>
					<td><input class="form-control" type="text" name="da_ip" value="{ROW.da_ip}" /></td>
				</tr>
				<tr>
					<td width="250">PORT</td>
					<td><input class="form-control" type="text" name="da_port" value="{ROW.da_port}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.pre_host}</td>
					<td><input class="form-control" type="text" name="da_pre_host" value="{ROW.da_pre_host}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.ftp_user_name}</td>
					<td><input class="form-control" type="text" name="da_ftp_user_name" value="{ROW.da_ftp_user_name}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.ftp_user_pass}</td>
					<td><input class="form-control" type="password" name="da_ftp_user_pass" value="{ROW.da_ftp_user_pass}"/></td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th colspan="2">
						<em class="fa fa-file-text-o">&nbsp;</em>{LANG.config_vesta} 
					</th>
			</thead>
			<tbody>
				<tr>
					<td width="250">IP</td>
					<td><input class="form-control" type="text" name="vesta_host" value="{ROW.vesta_host}" /></td>
				</tr>
				<tr>
					<td width="250">PORT</td>
					<td><input class="form-control" type="text" name="vesta_port" value="{ROW.vesta_port}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.pre_host}</td>
					<td><input class="form-control" type="text" name="vesta_pre_host" value="{ROW.vesta_pre_host}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.ftp_user_name}</td>
					<td><input class="form-control" type="text" name="vesta_user" value="{ROW.vesta_user}" /></td>
				</tr>
				<tr>
					<td width="250">{LANG.ftp_user_pass}</td>
					<td><input class="form-control" type="password" name="vesta_pass" value="{ROW.vesta_pass}"/></td>
				</tr>
			</tbody>
		</table>
	</div>
</form>
</div></div>
<!-- END: permission -->
<!-- BEGIN: no_permission -->
<div class="panel panel-default">
<div class="panel-body">
 {LANG.no_permission}
</div></div>
<!-- END: no_permission -->
<!-- END: main -->