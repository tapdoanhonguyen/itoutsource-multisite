<!-- BEGIN: main -->
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
	<table class="table table-striped table-bordered table-hover">
            <caption><em class="fa fa-file-text-o">&nbsp;</em>{LANG.setting_post}</caption>
            <tbody>
                <tr>
					<th>{LANG.employer_group}</th>
					<td>
						<select class="form-control" name="employer_group" id="employer_group">
							<!-- BEGIN: employer_group -->
							<option  value="{GROUP.group_id}" {GROUP.selected} > {GROUP.group_title} </option>
							<!-- END: employer_group -->
						</select>
					</td>
				</tr>
				<tr>
					<th>{LANG.timelinein1}</th>
					<td>
						<select class="form-control" name="timelinein1_hour" id="timelinein1_hour">
							<!-- BEGIN: timelinein1_hour -->
							<option  value="{HOURIN1.key}" {HOURIN1.selected} > {HOURIN1.value} </option>
							<!-- END: timeline1_hour -->
						</select>{LANG.hour}
						<select class="form-control" name="timelinein1_miniture" id="timelinein1_miniture">
							<!-- BEGIN: timelinein1_miniture -->
							<option  value="{MINITUREIN1.key}" {MINITUREIN1.selected} > {MINITUREIN1.value} </option>
							<!-- END: timelinein1_miniture -->
						</select>{LANG.miniture}
					</td>
				</tr>
				<tr>
					<th>{LANG.timelineout1}</th>
					<td>
						<select class="form-control" name="timelineout1_hour" id="timelineout1_hour">
							<!-- BEGIN: timelineout1_hour -->
							<option  value="{HOUROUT1.key}" {HOUROUT1.selected} > {HOUROUT1.value} </option>
							<!-- END: timelineout1_hour -->
						</select>{LANG.hour}
						<select class="form-control" name="timelineout1_miniture" id="timelineout1_miniture">
							<!-- BEGIN: timelineout1_miniture -->
							<option  value="{MINITUREOUT1.key}" {MINITUREOUT1.selected} > {MINITUREOUT1.value} </option>
							<!-- END: timelineout1_miniture -->
						</select>{LANG.miniture}
					</td>
				</tr>
				<tr>
					<th>{LANG.timelinein2}</th>
					<td>
						<select class="form-control" name="timelinein2_hour" id="timelinein2_hour">
							<!-- BEGIN: timelinein2_hour -->
							<option  value="{HOURIN2.key}" {HOURIN2.selected} > {HOURIN2.value} </option>
							<!-- END: timeline2_hour -->
						</select>{LANG.hour}
						<select class="form-control" name="timelinein2_miniture" id="timelinein2_miniture">
							<!-- BEGIN: timelinein2_miniture -->
							<option  value="{MINITUREIN2.key}" {MINITUREIN2.selected} > {MINITUREIN2.value} </option>
							<!-- END: timelinein2_miniture -->
						</select>{LANG.miniture}
					</td>
				</tr>
				<tr>
					<th>{LANG.timelineout2}</th>
					<td>
						<select class="form-control" name="timelineout2_hour" id="timelineout2_hour">
							<!-- BEGIN: timelineout2_hour -->
							<option  value="{HOUROUT2.key}" {HOUROUT2.selected} > {HOUROUT2.value} </option>
							<!-- END: timelineout2_hour -->
						</select>{LANG.hour}
						<select class="form-control" name="timelineout2_miniture" id="timelineout2_miniture">
							<!-- BEGIN: timelineout2_miniture -->
							<option  value="{MINITUREOUT2.key}" {MINITUREOUT2.selected} > {MINITUREOUT2.value} </option>
							<!-- END: timelineout2_miniture -->
						</select>{LANG.miniture}
					</td>
				</tr>
				<tr>
					<th>{LANG.appapi}</th>
					<td>
						<input type="text" name="appapi"  value="{DATA.appapi}" />
					</td>
				</tr>
			</tbody>
		</table>
   <div class="text-center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
<!-- END: main -->