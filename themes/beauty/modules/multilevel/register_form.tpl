<form class="form-horizontal" enctype="multipart/form-data" onsubmit="return sendsunmit();" action="{USER_REGISTER}" method="post">
	<input type="hidden" name ="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
	<input type="hidden" name ="{NV_OP_VARIABLE}" value="{OP}" />
	<input type="hidden" name ="userid" value="{DATA.userid}" />
	<input name="savecat" type="hidden" value="1" />
	<input type="hidden" name="txtCheckss" value="{checkss}">
	<!-- Form Name -->
	<legend>
		<center>
			<h2><b>{DATA.title_reg_multilevel}</b></h2>
		</center>
	</legend>
	<br />
	<!-- Text input-->
	<div class="form-group">
		<label>{LANG.fullname}: </label>
		<input name="fullname" placeholder="{LANG.fullname}" class="form-control required" type="text" value="{DATA.fullname}" />
	</div>
	<div class="form-group">
		<label>Tài Khoản </label>
		<input name="username_ctv" placeholder="Nhập tên tài khoản" class="form-control required" type="text" value="{DATA.username_ctv}" />
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="required form-control required" placeholder="{LANG.email}" value="{DATA.email}" name="email" maxlength="100" onkeypress="validErrorHidden(this);" data-mess="{GLANG.email_empty}">
	</div>
	<div class="form-group">
		<label>Mật khẩu</label>
		<input type="password" autocomplete="off" value="{DATA.password}" class="password form-control required"  name="password" >
	</div>
	<div class="form-group">
		<label>Nhập lại mật khẩu</label>
		<input type="password" value="{DATA.re_password}" autocomplete="off" class="re-password form-control required" name="re_password">
	</div>
	<div class="form-group">
		<label>Mã giới thiệu</label>
		<input name="nguoigioithieu" placeholder="" class="form-control " type="text" value="{DATA.nguoigioithieu}"/>
	</div>
	<!-- Success message -->
	<!-- Button -->
	<div class="form-group text-center">
		<button type="submit" class="login btn btn-success">Đăng ký</button>
	</div>
</form>
<div class="modal fade" id="modalMain" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Thông Báo</h5>
			</div>
			<div class="modal-body"><span id="mess"></span></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	       $("#fileUpload_befor").on('change', function() {
	           var imgPath = $(this)[0].value;
	           var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	           var image_holder = $("#image-befor");
	           image_holder.empty();
	           if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	               if (typeof(FileReader) != "undefined") {
	                   var reader = new FileReader();
	                   reader.onload = function(e) {
	                       $("<img />", {
	                           "src": e.target.result,
	                           "class": "photo-thumb"
	                       }).appendTo(image_holder);
	                   }
	                   image_holder.show();
	                   reader.readAsDataURL($(this)[0].files[0]);
	
	               } else {
	                   alert("This browser does not support FileReader.");
	               }
	           } else {
	               alert("Pls select only images");
	           }
	       });
	
	       $("#fileUpload_after").on('change', function() {
	           var imgPath = $(this)[0].value;
	           var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	           var image_holder = $("#image-after");
	           image_holder.empty();
	           if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	               if (typeof(FileReader) != "undefined") {
	                   var reader = new FileReader();
	                   reader.onload = function(e) {
	                       $("<img />", {
	                           "src": e.target.result,
	                           "class": "photo-thumb"
	                       }).appendTo(image_holder);
	                   }
	                   image_holder.show();
	                   reader.readAsDataURL($(this)[0].files[0]);
	
	               } else {
	                   alert("This browser does not support FileReader.");
	               }
	           } else {
	               alert("Pls select only images");
	           }
	       });
		});
	   
	
	 function nv_load_district( select_name, selected_id ){
	       var province = $('select[name=provinceid]').val();
		if( province == 0 )$('#load_district').html('');
	       else{
	           $.post(nv_base_siteurl + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main&nocache=' + new Date().getTime(), 'act=district&province=' + province + '&select_name=' + select_name + '&selected_id=' + selected_id, function(res) {
	               $('#load_district').html(res)
	           });
	       }
	   }
	
	   <!-- BEGIN: load_district -->
	   nv_load_district( 'districtid', '{DATA.districtid}' );
	   <!-- END: load_district -->
</script>