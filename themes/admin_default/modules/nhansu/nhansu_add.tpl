<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
            <input type="hidden" name="id" value="{ROW.id}" />

            <p>
                <div class="btn btn-primary form-control left_nhan_su" data-toggle="collapse" href="#thong_tin_chung" role="button" aria-expanded="false" aria-controls="thong_tin_chung">
                    Thông tin chung
                    <i style="float: right;" class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
                <div class="row collapse multi-collapse khung" id="thong_tin_chung">
                    <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
                        <p>
                         <strong>{LANG.code}</strong>
                     </p>
                     <p>
                        <input class="form-control" type="text" name="code" value="{ROW.code}" />
                    </p>
                </div>
                <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
                    <p>
                        <strong>{LANG.hoten_lot}</strong> <span class="red">(*)</span>
                    </p>
                    <p>
                        <input class="form-control" type="text" name="hoten_lot" value="{ROW.hoten_lot}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                    </p>
                </div>

                <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
                    <p>
                     <strong>{LANG.ten}</strong> <span class="red">(*)</span>
                 </p>
                 <p>
                     <input class="form-control" type="text" name="ten" value="{ROW.ten}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                 </p>
             </div>

             <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
                <p>
                    <strong>{LANG.gioitinh}</strong>
                </p>
                <p>
                   <select class="form-control" name="gioitinh" style="width: 100%;">
                    <option value=""> --- </option>
                    <!-- BEGIN: select_gioitinh -->
                    <option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
                    <!-- END: select_gioitinh -->
                </select>
            </p>
        </div>
        <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
            <p>
                <strong>{LANG.ngaysinh}</strong> <span class="red">(*)</span>
            </p>
            <p>
               <input class="form-control" type="text" name="ngaysinh" value="{ROW.ngaysinh}" id="ngaysinh" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
           </p>
       </div>

       <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
        <p>
           <strong>{LANG.phongban_id}</strong> <span class="red">(*)</span>
       </p>
       <p>
          <select class="form-control phongban_id" name="phongban_id" required="" oninvalid="setCustomValidity('Vui lòng chọn phòng ban')" oninput="setCustomValidity('')" style="width: 100%;">
            <option value="{ROW.phongban_id}">
                {ROW.phongban_name}
            </option>
        </select>
    </p>
</div>
<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.noisinh}</strong> 
   </p>
   <p>
      <input class="form-control" type="text" name="noisinh" value="{ROW.noisinh}" />
  </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.quequan}</strong> 
  </p>
  <p>
    <input class="form-control" type="text" name="quequan" value="{ROW.quequan}" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
        <strong>{LANG.tongiao_id}</strong>
    </p>
    <p>
        <select class="form-control tongiao_id" name="tongiao_id" style="width: 100%;">
            <option value="{ROW.tongiao_id}">
                {ROW.tongiao_name}
            </option>
        </select>
    </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
        <strong>{LANG.diachihiennay}</strong>
    </p>
    <p>
     <input class="form-control" type="text" name="diachihiennay" value="{ROW.diachihiennay}" />
 </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.ngaytuyendung}</strong>
   </p>
   <p>
     <input class="form-control" type="text" name="ngaytuyendung" value="{ROW.ngaytuyendung}" id="ngaytuyendung" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
 </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.chucdanhkiemnhiem}</strong>
   </p>
   <p>
     <input class="form-control" type="text" name="chucdanhkiemnhiem" value="{ROW.chucdanhkiemnhiem}" />
 </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.ngayvaodang}</strong>
  </p>
  <p>
    <input class="form-control" type="text" name="ngayvaodang" value="{ROW.ngayvaodang}" id="ngayvaodang" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
     <strong>{LANG.ngayvaochinhthuc}</strong>
 </p>
 <p>
  <input class="form-control" type="text" name="ngayvaochinhthuc" value="{ROW.ngayvaochinhthuc}" id="ngayvaochinhthuc" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.bhxh}</strong>
  </p>
  <p>
    <input class="form-control" type="text" name="bhxh" value="{ROW.bhxh}" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
     <strong>{LANG.bhyt}</strong>
 </p>
 <p>
    <input class="form-control" type="text" name="bhyt" value="{ROW.bhyt}" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.bienche_id}</strong> <span class="red">(*)</span>
  </p>
  <p>
   <select class="form-control bienche_id" name="bienche_id" required="" oninvalid="setCustomValidity('Vui lòng chọn loại hình biên chế')" oninput="setCustomValidity('')" style="width: 100%;">
    <option value="{ROW.bienche_id}">
        {ROW.bienche_name}
    </option>
</select>
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
        <strong>{LANG.ngayvao_bienche}</strong> 
    </p>
    <p>
      <input class="form-control" type="text" name="ngayvao_bienche" value="{ROW.ngayvao_bienche}" id="ngayvao_bienche" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
  </p>
</div>


<div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
    <p>
        <strong>{LANG.quytrinhcongtac}</strong> 
    </p>
    <p>
       {ROW.quytrinhcongtac}   
   </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
        <strong>{LANG.huutri}</strong> 
    </p>
    <p>
     <input class="form-control" type="text" name="huutri" value="{ROW.huutri}" />
 </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.thucnghi}</strong> 
   </p>
   <p>
    <input class="form-control" type="text" name="thucnghi" value="{ROW.thucnghi}" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.lylich}</strong> 
   </p>
   <p>
     <input class="form-control" type="checkbox" name="lylich" value="1" {ROW.lylich_checked} />
 </p>
</div>



</div>
</p>







<p>
    <div class="btn btn-primary form-control left_nhan_su" data-toggle="collapse" href="#chuc_danh_nghe_nghiep" role="button" aria-expanded="false" aria-controls="chuc_danh_nghe_nghiep">
        Chức danh nghề nghiệp
         <i style="float: right;" class="fa fa-angle-down" aria-hidden="true"></i>
    </div>
    <div class="row collapse multi-collapse khung" id="chuc_danh_nghe_nghiep">
        <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
            <p>
             <strong>{LANG.chucdanh_id}</strong> <span class="red">(*)</span>
         </p>
         <p>
            <select class="form-control chucdanh_id" name="chucdanh_id" required="" oninvalid="setCustomValidity('Vui lòng chọn chức danh')" oninput="setCustomValidity('')" style="width: 100%;">
                <option value="{ROW.chucdanh_id}">
                    {ROW.chucdanh_name}
                </option>
            </select>
        </p>
    </div>

    <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
        <p>
         <strong>{LANG.maso_id}</strong>
     </p>
     <p>
        <select class="form-control maso_id" name="maso_id" style="width: 100%;">
            <option value="{ROW.maso_id}">
                {ROW.maso_name}
            </option>
        </select>
    </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.bacluong_id}</strong> <span class="red">(*)</span>
  </p>
  <p>
    <select class="form-control bacluong_id" name="bacluong_id" required="" oninvalid="setCustomValidity('Vui lòng chọn bậc lương')" oninput="setCustomValidity('')" style="width: 100%;">
        <option value="{ROW.bacluong_id}">
            {ROW.bacluong_name}
        </option>
    </select>
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.heso_id}</strong> <span class="red">(*)</span>
   </p>
   <p>
    <select class="form-control heso_id" name="heso_id" required="" oninvalid="setCustomValidity('Vui lòng chọn bậc lương')" oninput="setCustomValidity('')" style="width: 100%;">
        <option value="{ROW.heso_id}">
            {ROW.heso_name}
        </option>
    </select>
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.ngayhuong}</strong> 
   </p>
   <p>
       <input class="form-control" type="text" name="ngayhuong" value="{ROW.ngayhuong}" id="ngayhuong" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
   </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.phucapchucvu}</strong> 
   </p>
   <p>
    <input class="form-control" type="text" name="phucapchucvu" value="{ROW.phucapchucvu}" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.phucapkhac}</strong> 
   </p>
   <p>
    <input class="form-control" type="text" name="phucapkhac" value="{ROW.phucapkhac}" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.phucapkhac}</strong> 
   </p>
   <p>
    <input class="form-control" type="text" name="phucapkhac" value="{ROW.phucapkhac}" />
</p>
</div>


</div>
</p>


<p>
    <div class="btn btn-primary form-control left_nhan_su" data-toggle="collapse" href="#trinh_do_dao_tao" role="button" aria-expanded="false" aria-controls="trinh_do_dao_tao">
        Trình độ dào tạo
         <i style="float: right;" class="fa fa-angle-down" aria-hidden="true"></i>
    </div>
    <div class="row collapse multi-collapse khung" id="trinh_do_dao_tao">
        <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
            <p>
              <strong>{LANG.chuyenmon_id}</strong> <span class="red">(*)</span>
          </p>
          <p>
            <select class="form-control chuyenmon_id" name="chuyenmon_id" required="" oninvalid="setCustomValidity('Vui lòng chọn chuyên môn')" oninput="setCustomValidity('')" style="width: 100%;">
                <option value="{ROW.chuyenmon_id}">
                    {ROW.chuyenmon_name}
                </option>
            </select>
        </p>
    </div>

    <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
        <p>
           <strong>{LANG.chucvu_id}</strong> <span class="red">(*)</span>
       </p>
       <p>
         <select class="form-control chucvu_id" name="chucvu_id" required="" oninvalid="setCustomValidity('Vui lòng chọn loại hình biên chế')" oninput="setCustomValidity('')" style="width: 100%;">
            <option value="{ROW.chucvu_id}">
                {ROW.chucvu_name}
            </option>
        </select>
    </p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.chinhtri_id}</strong> 
  </p>
  <p>
    <select class="form-control chinhtri_id" name="chinhtri_id" style="width: 100%;">
        <option value="{ROW.chinhtri_id}">
            {ROW.chinhtri_name}
        </option>
    </select>
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.quanlygiaoduc_id}</strong> 
   </p>
   <p>
    <select class="form-control quanlygiaoduc_id" name="quanlygiaoduc_id" style="width: 100%;">
        <option value="{ROW.quanlygiaoduc_id}">
            {ROW.quanlygiaoduc_name}
        </option>
    </select>
</p>
</div>





</div>
</p>




<p>
    <div class="btn btn-primary form-control left_nhan_su" data-toggle="collapse" href="#chung_chi_box" role="button" aria-expanded="false" aria-controls="chung_chi_box">
     Chứng chỉ 
      <i style="float: right;" class="fa fa-angle-down" aria-hidden="true"></i>
 </div>
 <div class="row collapse multi-collapse khung" id="chung_chi_box">
    <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
        <p>
          <strong>{LANG.chungchi_ngoaingu}</strong> 
      </p>
      <p>
        <select class="form-control chungchi_ngoaingu" name="chungchi_ngoaingu" style="width: 100%;">
            <option value="{ROW.chungchi_ngoaingu}">
                {ROW.chungchi_ngoaingu_name}
            </option>
        </select>
    </p>
</div>
<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.tinhoc_id}</strong> 
  </p>
  <p>
   <select class="form-control tinhoc_id" name="tinhoc_id" style="width: 100%;">
    <option value="{ROW.tinhoc_id}">
        {ROW.tinhoc_name}
    </option>
</select>
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.chungchi_khac}</strong> 
  </p>
  <p>
    <input class="form-control" type="text" name="chungchi_khac" value="{ROW.chungchi_khac}" />
</p>
</div>



</div>
</p>



<p>
    <div class="btn btn-primary form-control left_nhan_su" data-toggle="collapse" href="#cmnd_cccd" role="button" aria-expanded="false" aria-controls="cmnd_cccd">
      CMND, CCCD   
       <i style="float: right;" class="fa fa-angle-down" aria-hidden="true"></i>
  </div>
  <div class="row collapse multi-collapse khung" id="cmnd_cccd">
    <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
        <p>
          <strong>{LANG.cmnd}</strong> 
      </p>
      <p>
        <input class="form-control" type="text" name="cmnd" value="{ROW.cmnd}" />
    </p>
</div>
<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.ngaycap}</strong> 
  </p>
  <p>
   <input class="form-control" type="text" name="ngaycap" value="{ROW.ngaycap}" id="ngaycap" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
      <strong>{LANG.noicap}</strong> 
  </p>
  <p>
    <input class="form-control" type="text" name="noicap" value="{ROW.noicap}" />
</p>
</div>





</div>
</p>
<p>
    <div class="btn btn-primary form-control left_nhan_su" data-toggle="collapse" href="#dien_thoai_lien_lac" role="button" aria-expanded="false" aria-controls="dien_thoai_lien_lac">
        ĐIỆN THOẠI LIÊN LẠC  
         <i style="float: right;" class="fa fa-angle-down" aria-hidden="true"></i>
    </div>
    <div class="row collapse multi-collapse khung" id="dien_thoai_lien_lac">
        <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
            <p>
               <strong>{LANG.didong}</strong> 
           </p>
           <p>
               <input class="form-control" type="text" name="didong" value="{ROW.didong}" />
           </p>
       </div>
       <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
        <p>
           <strong>{LANG.dienthoai_nha}</strong> 
       </p>
       <p>
           <input class="form-control" type="text" name="dienthoai_nha" value="{ROW.dienthoai_nha}" />
       </p>
   </div>

   <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
     <strong>{LANG.dienthoai_coquan}</strong> 
 </p>
 <p>
  <input class="form-control" type="text" name="dienthoai_coquan" value="{ROW.dienthoai_coquan}" />
</p>
</div>






</div>
</p>


<p>
    <div class="btn btn-primary form-control left_nhan_su" data-toggle="collapse" href="#thoi_gian_cong_tac" role="button" aria-expanded="false" aria-controls="thoi_gian_cong_tac">
     THỜI GIAN CÔNG TÁC      
      <i style="float: right;" class="fa fa-angle-down" aria-hidden="true"></i>
 </div>
 <div class="row collapse multi-collapse khung" id="thoi_gian_cong_tac">
    <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
        <p>
            <strong>{LANG.ngaynhanviec}</strong> 
        </p>
        <p>
           <input class="form-control" type="text" name="ngaynhanviec" value="{ROW.ngaynhanviec}" id="ngaynhanviec" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
       </p>
   </div>
   <div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
     <strong>{LANG.ngaythoiviec}</strong> 
 </p>
 <p>
   <input class="form-control" type="text" name="ngaythoiviec" value="{ROW.ngaythoiviec}" id="ngaythoiviec" pattern="^[0-9]{2,2}\/[0-9]{2,2}\/[0-9]{1,4}$" />
</p>
</div>

<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
    <p>
       <strong>{LANG.thoigiancongtac}</strong> 
   </p>
   <p>
       <input class="form-control" type="text" name="thoigiancongtac" value="{ROW.thoigiancongtac}" pattern="^[0-9]*$"  oninvalid="setCustomValidity(nv_digits)" oninput="setCustomValidity('')" />
   </p>
</div>






</div>
</p>






<div class="form-group" style="text-align: center">
    <input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" />
</div>
</form>
</div>
</div>
<script type="text/javascript">
    $("#ngaysinh,#ngaytuyendung,#ngayhuong,#ngayvaodang,#ngayvaochinhthuc,#ngaycap,#ngayvao_bienche,#ngaynhanviec,#ngaythoiviec").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true,
        showOtherMonths : true,
    });
    $('.chucvu_id').select2({
        placeholder: "Vui lòng chọn chức vụ",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chucvu',
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
    $('.phongban_id').select2({
        placeholder: "Vui lòng chọn phòng ban",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_phongban',
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
    $('.tongiao_id').select2({
        placeholder: "Vui lòng chọn tôn giáo",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_tongiao',
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
    $('.chucdanh_id').select2({
        placeholder: "Vui lòng chọn chức danh",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chucdanh',
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
    $('.maso_id').select2({
        placeholder: "Vui lòng chọn mã số",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_maso',
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
    $('.bacluong_id').select2({
        placeholder: "Vui lòng chọn bậc lương",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_bacluong',
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
    $('.heso_id').select2({
        placeholder: "Vui lòng chọn hệ số",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_heso',
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

    $('.chuyenmon_id').select2({
        placeholder: "Vui lòng chọn chuyên môn",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chuyenmon',
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
    $('.chinhtri_id').select2({
        placeholder: "Vui lòng chọn chính trị",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_chinhtri',
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
    $('.quanlygiaoduc_id').select2({
        placeholder: "Vui lòng chọn quản lý giáo dục",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_quanlygiaoduc',
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
    $('.ngoaingu_id,.chungchi_ngoaingu').select2({
        placeholder: "Vui lòng chọn ngoại ngữ",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_ngoaingu',
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
    $('.tinhoc_id').select2({
        placeholder: "Vui lòng chọn chứng chỉ tin học",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_tinhoc',
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
    $('.bienche_id').select2({
        placeholder: "Vui lòng chọn loại hình biên chế",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_bienche',
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