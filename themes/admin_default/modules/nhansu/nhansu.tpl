<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<style type="text/css">
    .table-responsive {
        overflow-x: scroll !important;
    } 
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left">
            <i class="fa fa-list"></i> 
            {LANG.nhansu}
        </h3> 
        <div class="pull-right">
            <button title="Ẩn /Hiện tìm kiếm" id="tms_sea_id" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button> 
            <a href="{nhansu_add}" data-toggle="tooltip" data-placement="top" title="{LANG.nhansu_add}" class="btn btn-success btn-sm">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="well" id="tms_sea">
        <form action="{NV_BASE_ADMINURL}index.php" id="formsearch" method="get">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
            <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
            <input type="hidden" name="year" value="{year}" />
            <input type="hidden" name="static" value="{static}" />

            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.search_fast}
                            </span>
                            <select class="form-control link_flast" id="sea_flast" name="sea_flast">
                                <option value="0">
                                    {LANG.search_time}
                                </option>
                                <option value="1" {SELECT1}>{LANG.today}</option>
                                <option value="2" {SELECT2}>{LANG.yesterday}</option>
                                <option value="3" {SELECT3}>{LANG.this_week}</option>
                                <option value="4" {SELECT4}>{LANG.last_week}</option>
                                <option value="5" {SELECT5}>{LANG.this_month}</option>
                                <option value="6" {SELECT6}>{LANG.last_month}</option>
                                <option value="7" {SELECT7}>{LANG.this_year}</option>
                                <option value="8" {SELECT8}>{LANG.last_year}</option>
                                <option value="9" {SELECT9}>{LANG.all_the_time}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.hoac} {LANG.ngay_tu}
                            </span>
                            <input id="ngaytu" type="text" maxlength="255" class="form-control disabled" value="{ngay_tu}" autocomplete="off" name="ngay_tu" placeholder="{LANG.ngay_tu}">
                        </div>
                    </div>
                </div>


                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.ngay_den}
                            </span>
                            <input id="ngayden" type="text" maxlength="255" class="form-control disabled" value="{ngay_den}" autocomplete="off" name="ngay_den" placeholder="{LANG.ngay_den}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.chucvu_id}
                            </span>
                            <select id="chucvu_id" name="chucvu_id" class="form-control input-sm">
                                <option value="{chucvu_id}">{chucvu_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.phongban_id}
                            </span>
                            <select id="phongban_id" name="phongban_id" class="form-control input-sm">
                                <option value="{phongban_id}">{phongban_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.tongiao_id}
                            </span>
                            <select id="tongiao_id" name="tongiao_id" class="form-control input-sm">
                                <option value="{tongiao_id}">{tongiao_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.chucdanh_id}
                            </span>
                            <select id="chucdanh_id" name="chucdanh_id" class="form-control input-sm">
                                <option value="{chucdanh_id}">{chucdanh_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.maso_id}
                            </span>
                            <select id="maso_id" name="maso_id" class="form-control input-sm">
                                <option value="{maso_id}">{maso_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.bacluong_id}
                            </span>
                            <select id="bacluong_id" name="bacluong_id" class="form-control input-sm">
                                <option value="{bacluong_id}">{bacluong_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.heso_id}
                            </span>
                            <select id="heso_id" name="heso_id" class="form-control input-sm">
                                <option value="{heso_id}">{heso_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.chuyenmon_id}
                            </span>
                            <select id="chuyenmon_id" name="chuyenmon_id" class="form-control input-sm">
                                <option value="{chuyenmon_id}">{chuyenmon_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.chinhtri_id}
                            </span>
                            <select id="chinhtri_id" name="chinhtri_id" class="form-control input-sm">
                                <option value="{chinhtri_id}">{chinhtri_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.quanlygiaoduc_id}
                            </span>
                            <select id="quanlygiaoduc_id" name="quanlygiaoduc_id" class="form-control input-sm">
                                <option value="{quanlygiaoduc_id}">{quanlygiaoduc_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Chứng chỉ ngoại ngữ
                            </span>
                            <select id="chungchi_ngoaingu" name="chungchi_ngoaingu" class="form-control input-sm">
                                <option value="{chungchi_ngoaingu}">{chungchi_ngoaingu_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.tinhoc_id}
                            </span>
                            <select id="tinhoc_id" name="tinhoc_id" class="form-control input-sm">
                                <option value="{tinhoc_id}">{tinhoc_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.bienche_id}
                            </span>
                            <select id="bienche_id" name="bienche_id" class="form-control input-sm">
                                <option value="{bienche_id}">{bienche_name}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-8  col-md-8  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.status}
                            </span>
                            <select id="status_search" name="status_search" class="form-control input-sm">
                                <!-- BEGIN: status_filt -->
                                <option value="{status_filt.id}" {status_filt.selected}>{status_filt.text}
                                </option>
                                <!-- END: status_filt -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-24 col-sm-24  col-md-20  col-lg-20">
                    <div class="form-group">
                        <input class="form-control" type="text" value="{Q}" name="q" maxlength="255"
                        placeholder="{LANG.hoten_lot}, {LANG.ten}, {LANG.code}" />
                    </div>
                </div>
                <div class="col-sm-24  col-md-2  col-lg-4">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
                        <button class="btn btn-success btn-sm export_excel">
                            {LANG.export_excel}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="w100 text-center" style="vertical-align: middle;">{LANG.number}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.code}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.hoten_lot}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.ten}</th>
                    <th class="text-center" style="vertical-align: middle;">Giới tính</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.ngaysinh}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.phongban_id}</th>
                    <th class="text-center" style="vertical-align: middle;">
                        Nơi sinh
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Quê quán
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Tôn giáo
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Địa chỉ hiện nay
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày tuyển dụng/ chuyển công tác đến    
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Chức danh kiêm nhiệm
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày vào đảng
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày vào đảng chính thức
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Số BHXH 
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Số BHYT  
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Loại hình biên chế 
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày vào biên chế   
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Quy trình công tác  
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Hưu trí 
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Thực nghỉ   
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Lý lịch VC Mẫu HS01-VC/BNV Theo 07/2019/TT-BNV     
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Chức danh      
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Mã số 
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Bậc lương
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Hệ số
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày hưởng  
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Phụ cấp chức vụ 
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Phụ cấp khác
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Chuyên môn
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Trình độ đào tạo  
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        LL CHÍNH TRỊ     
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        QL GIÁO DỤC      
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngoại ngữ       
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Tin học        
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Chứng chỉ khác     
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Số CMND      
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày cấp          
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Nơi cấp          
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Di động          
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Nhà          
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Cơ quan           
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày nhận công tác tại TT              
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Ngày thôi việc tại TT                 
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Thời gian công tác                   
                    </th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.time_add}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.user_add}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.time_edit}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.user_edit}</th>
                    <th class="w100 text-center" style="vertical-align: middle;">{LANG.active}</th>
                    <th class="w150">&nbsp;</th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="13">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.number} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.code} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.hoten_lot} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ten} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.gioitinh} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngaysinh} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.phongban_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.noisinh} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.quequan} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.tongiao_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.diachihiennay} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngaytuyendung} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.chucdanhkiemnhiem} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngayvaodang} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngayvaochinhthuc} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.bhxh} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.bhyt} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.bienche_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngayvao_bienche} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.quytrinhcongtac} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.huutri} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.thucnghi} </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        <!-- BEGIN: checked -->
                        <input class="form-control" type="checkbox" name="lylich" value="1" disabled="" checked="">
                        <!-- END: checked -->
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.chucdanh_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.maso_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.bacluong_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.heso_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngayhuong} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.phucapchucvu} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.phucapkhac} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.chuyenmon_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.chucvu_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.chinhtri_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.quanlygiaoduc_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.chungchi_ngoaingu} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.tinhoc_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.chungchi_khac} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.cmnd} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngaycap} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.noicap} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.didong} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.dienthoai_nha} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.dienthoai_coquan} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngaynhanviec} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.ngaythoiviec} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.thoigiancongtac} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.time_add} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.user_add} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.time_edit} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.user_edit} </td>
                    <td class="text-center" style="vertical-align: middle;"><input type="checkbox" name="status" id="change_status_{VIEW.id}" value="{VIEW.id}" {CHECK} onclick="nv_change_status({VIEW.id});" /></td>
                    <td class="text-center" style="vertical-align: middle;"><i class="fa fa-edit fa-lg">&nbsp;</i> <a href="{VIEW.link_edit}#edit">{LANG.edit}</a> - <em class="fa fa-trash-o fa-lg">&nbsp;</em> <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a></td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>


<script type="text/javascript">
    $('.export_excel').on('click', function(e) {
        var form_data = $('#formsearch').serializeArray(); 
        $.ajax({
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=is_download&nocache=' + new Date().getTime(),
            type: 'post',
            dataType: 'json',
            data: form_data,
            beforeSend: function() {
                $('.export_file i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                $('.export_file').prop('disabled', true);
            },  
            complete: function() {
                $('.export_file i').replaceWith('<i class="fa fa-download"></i>');
                $('.export_file').prop('disabled', false);
            },
            success: function(json) {
                if( json['error'] ) alert( json['error'] );         
                if( json['link'] ) window.location.href= json['link'];          
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        e.preventDefault();     
    });
    function nv_change_status(id) {
        var new_status = $('#change_status_' + id).is(':checked') ? true : false;
        if (confirm(nv_is_change_act_confirm[0])) {
            var nv_timer = nv_settimeout_disable('change_status_' + id, 5000);
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=nhansu&nocache=' + new Date().getTime(), 'change_status=1&id='+id, function(res) {
                var r_split = res.split('_');
                if (r_split[0] != 'OK') {
                    alert(nv_is_change_act_confirm[2]);
                }
            });
        }
        else{
            $('#change_status_' + id).prop('checked', new_status ? false : true);
        }
        return;
    }
    $('select[name=sea_flast]').change(function() {
        var time_from = "";
        var time_to = "";
        var time = $('select[name=sea_flast]').val();
        if (time == 1) {
            time_from = "{HOMNAY}"
            time_to = "{HOMNAY}"
        } else if (time == 2) {
            time_from = "{HOMQUA}"
            time_to = "{HOMQUA}"
        } else if (time == 3) {
            time_from = "{TUANNAY.from}"
            time_to = "{TUANNAY.to}"
        } else if (time == 4) {
            time_from = "{TUANTRUOC.from}"
            time_to = "{TUANTRUOC.to}"
        } else if (time == 5) {
            time_from = "{THANGNAY.from}"
            time_to = "{THANGNAY.to}"
        } else if (time == 6) {
            time_from = "{THANGTRUOC.from}"
            time_to = "{THANGTRUOC.to}"
        } else if (time == 7) {
            time_from = "{NAMNAY.from}"
            time_to = "{NAMNAY.to}"
        } else if (time == 8) {
            time_from = "{NAMTRUOC.from}"
            time_to = "{NAMTRUOC.to}"
        } else if (time == 9) {
            time_from = "Không chọn"
            time_to = "Không chọn"
        } else if (time == 0) {
            time_from = ""
            time_to = ""
        }
        $('#ngaytu').val(time_from);
        $('#ngayden').val(time_to);
    })
    $("#tms_sea_id").click(function() {
        $("#tms_sea").toggle();
    });
    $("#ngaytu,#ngayden").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        showOtherMonths: true,
    });
    $('#chucvu_id').select2({
        placeholder: "Vui lòng chọn chức vụ",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chucvu_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#phongban_id').select2({
        placeholder: "Vui lòng chọn phòng ban",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_phongban_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#tongiao_id').select2({
        placeholder: "Vui lòng chọn tôn giáo",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_tongiao_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#chucdanh_id').select2({
        placeholder: "Vui lòng chọn chức danh",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chucdanh_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#maso_id').select2({
        placeholder: "Vui lòng chọn mã số",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_maso_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#bacluong_id').select2({
        placeholder: "Vui lòng chọn bậc lương",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_bacluong_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#heso_id').select2({
        placeholder: "Vui lòng chọn hệ số",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_heso_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#chuyenmon_id').select2({
        placeholder: "Vui lòng chọn chuyên môn",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chuyenmon_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#chinhtri_id').select2({
        placeholder: "Vui lòng chọn chính trị",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chinhtri_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#quanlygiaoduc_id').select2({
        placeholder: "Vui lòng chọn quản lý giáo dục",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_quanlygiaoduc_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#ngoaingu_id,#chungchi_ngoaingu').select2({
        placeholder: "Vui lòng chọn ngoại ngữ",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_ngoaingu_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#tinhoc_id').select2({
        placeholder: "Vui lòng chọn chứng chỉ tin học",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_tinhoc_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#bienche_id').select2({
        placeholder: "Vui lòng chọn loại hình biên chế",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_bienche_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

</script>
<!-- END: main -->