<!-- BEGIN: main -->
<div class="well">
	 <div class="row">
		<div class="col-md-4">
			<h2>Hạng mục: {ROW.title}</h2>
		</div>
		<div class="col-md-7">
			<h2>Thuộc Dự Án: 
					<!-- BEGIN: project -->
					<a href="{ROW.project.link}">{ROW.project.title}</a>
                    <!-- END: project -->
			</h2>
		</div>
		<div class="col-md-4">
			<div style="width:100%;display: inline-block;" class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:{ROW.progress}%">
					{ROW.progress}%
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<a href="{CONTROL.url_print}" id="btn-print" class="btn btn-primary"><em class="fa fa-print">&nbsp;</em>{LANG.print}</a>
			<a href="{CONTROL.url_change_read}" class="btn btn-primary"><em class="fa fa-sign-out">&nbsp;</em>{LANG.change_read}</a>
			<a class="btn btn-primary" href="{CONTROL.url_edit}" class="btn btn-default btn-xs"><em class="fa fa-edit">&nbsp;</em>SỬA HẠNG MỤC</a>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-9">
        <div class="well">
            <h3>THÔNG TIN CƠ BẢN HẠNG MỤC</h3>
            <ul>
                 <li><label>{LANG.useradd}: </label>{ROW.useradd_str}</li>
                 <li><label>{LANG.performer}: </label>{ROW.performer_str}</li>
                 <li><label>{LANG.begintime}: </label>{ROW.begintime}</li>
                 <li><label>{LANG.exptime}: </label>{ROW.exptime}</li>
                 <li><label>{LANG.realtime}: </label>{ROW.realtime}</li>
                 <li><label class="pull-left" style="margin-top: 6px">{LANG.status}</label> <select class="form-control" style="width: 200px" id="change_cat_status_{ROW.id}" onchange="nv_chang_cat_status('{ROW.id}');">
                 <!-- BEGIN: status -->
                  <option value="{STATUS.index}"{STATUS.selected}>{STATUS.value}</option>
                   <!-- END: status -->
                   </select>
				  </li>
                   <li><label class="pull-left" style="margin-top: 6px">{LANG.priority}</label> <select class="form-control" style="width: 200px" id="change_cat_priority_{ROW.id}" onchange="nv_chang_cat_priority('{ROW.id}');">
                            <!-- BEGIN: priority -->
                            <option value="{PRIORITY.index}"{PRIORITY.selected}>{PRIORITY.value}</option>
                            <!-- END: priority -->
                    </select></li>
                    <!-- BEGIN: field -->
                    <!-- BEGIN: loop -->
                    <li><label>{FIELD.title}</label>{FIELD.value}</li>
                    <!-- END: loop -->
                    <!-- END: field -->
                </ul>
            
			<!-- BEGIN: description -->
				<div class="panel panel-default" id="description">
					<div class="panel-body">
						<h4>{LANG.description}</h4>
						{ROW.description}
					</div>
				</div>
			<!-- END: description -->
			<!-- BEGIN: files -->
			<div class="panel panel-default">
				<div class="panel-body">
					<h4> <em class="fa fa-download">&nbsp;</em>{LANG.download}  </h4> 
					<ul style="list-style: none; padding: 0; margin: 0">
                    <!-- BEGIN: loop -->
                    <li>
                        <!-- BEGIN: show_quick_viewpdf --> <a href="" class="open_file" data-key="{FILES.key}"> <i class="fa fa-file-pdf-o">&nbsp;</i>{FILES.title}
                    </a> <!-- END: show_quick_viewpdf --> <!-- BEGIN: show_quick_viewimg --> <a href="javascript:void(0)" class="open_file" data-key="{FILES.key}" data-src="{FILES.src}"> <i class="fa fa-file-image-o">&nbsp;</i>{FILES.title}
                    </a> <!-- END: show_quick_viewimg --> <!-- BEGIN: show_quick_viewpdf_url --> <a href="" class="open_file" data-key="{FILES.key}"> <i class="fa fa-file-pdf-o">&nbsp;</i>{FILES.title}
                    </a> <!-- END: show_quick_viewpdf_url --> <!-- BEGIN: show_quick_viewimg_url --> <a href="javascript:void(0)" class="open_file" data-key="{FILES.key}" data-src="{FILES.src}"> <i class="fa fa-file-image-o">&nbsp;</i>{FILES.title}
                    </a> <!-- END: show_quick_viewimg_url --> <!-- BEGIN: show_download --> <a href="{FILES.url}" target="_blank"> <i class="fa fa-file-image-o">&nbsp;</i>{FILES.title}
                    </a> <!-- END: show_download -->
                    </li>
                    <li id="file_content" style="display: none;">
                        <!-- BEGIN: content_quick_viewpdf_url -->
                        <div id="{FILES.key}" data-src="{FILES.src}">
                            <iframe frameborder="0" height="800" scrolling="yes" src="" width="900px"></iframe>
                        </div> <!-- END: content_quick_viewpdf_url --> <!-- BEGIN: content_quick_viewdoc_url -->
                        <div id="{FILES.key}" data-src="{FILES.urldoc}">
                            <iframe frameborder="0" height="800" scrolling="yes" src="" width="900px"></iframe>
                        </div> <!-- END: content_quick_viewdoc_url --> <!-- BEGIN: content_quick_viewpdf -->
                        <div id="{FILES.key}" data-src="{FILES.urlpdf}">
                            <iframe frameborder="0" height="800" scrolling="yes" src="" width="900px"></iframe>
                        </div> <!-- END: content_quick_viewpdf --> <!-- BEGIN: content_quick_viewdoc -->
                        <div id="{FILES.key}" data-src="{FILES.urldoc}">
                            <iframe frameborder="0" height="800" scrolling="yes" src="" width="900px"></iframe>
                        </div> <!-- END: content_quick_viewdoc --> <!-- BEGIN: content_quick_viewimg -->
                        <div id="{FILES.key}" data-src="{FILES.src}">
                            <img src="" style="max-width: 900px" />
                        </div> <!-- END: content_quick_viewimg -->
                    </li>
                    <!-- END: loop -->
                </ul>
				</div>
			</div>
        <!-- END: files -->
		</div>
    </div>
    <div class="col-md-15">
	
        <div id="task_divst">{TASK_divST}</div>
        <div class="text-center m-bottom">
            <button class="btn btn-success" onclick="nv_task_content(0, {ROW.projectid}, {ROW.id});">{LANG.task_add}</button>
        </div>
        
        <!-- BEGIN: cong_viec -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc
            </div>
            <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover table-middle">
						<thead> 
							<tr>
								<th>Công việc</th>
								<th>Người thực hiện</th>
								<th>Thời gian hoàn thành</th>
								<th>Mức độ ưu tiên</th>
								<th>Trạng thái</th>
							</tr>
						</thead>
						<tbody>
							<!-- BEGIN: loop -->
							<tr>
								<td>
								<a href="{CONG_VIEC.link}" title="{CONG_VIEC.title}">{CONG_VIEC.title}</a>
								</td>
								<td>{CONG_VIEC.str_performer}</td>
								<td>{CONG_VIEC.exptime}</td>
								<td>{CONG_VIEC.priority_str}</td>
								<td>{CONG_VIEC.status_str}</td>
							</tr>			
							<!-- END: loop -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
        <!-- END: cong_viec -->
		
        <!-- BEGIN: comment -->
        <div class="panel panel-default">
            <div class="panel-body">{COMMENT}</div>
        </div>
        <!-- END: comment -->
    </div>
</div>
<script>
    $('#btn-print').click(function() {
        nv_open_browse($(this).attr('href'), "NVImg", 850, 620, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
        return !1;
    });
</script>
<!-- END: main -->
<!-- BEGIN: print -->
<div id="print">{CONTENT}</div>
<script type="text/javascript">
    $(document).ready(function() {
        window.print();
    });
</script>
<!-- BEGIN: print -->