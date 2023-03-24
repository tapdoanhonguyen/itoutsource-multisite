<!-- BEGIN: main -->
<script type="text/javascript" src="{script}"></script>
<link href="{NV_STATIC_URL}themes/{TEMPLATE}/css/select2.css" rel="stylesheet">
<link href="{NV_STATIC_URL}themes/{TEMPLATE}/css/select2.min.css" rel="stylesheet">
<div class="page-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
				<div class="breadcrumb-title pr-3">Quản lý hệ thống bán hàng</div>
				<div class="pl-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Đăng ký nhà phân phối</li>
						</ol>
					</nav>
				</div>
				<div class="ml-auto">
					<div class="btn-group">
						<a href="{LINK.add}" class="btn btn-success"><i class="lni lni-add-files mr-1"></i>Thêm NPP mới</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4 class="mb-0">Đăng ký nhà phân phối</h4>
					<hr/>
					<!-- BEGIN: error -->
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{ERROR}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<!-- END: error -->
					<form action="" method="post" enctype="multipart/form-data"  >
						<input type="hidden" name ="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
						<input type="hidden" name ="{NV_OP_VARIABLE}" value="{OP}" />
						<input name="savecat" type="hidden" value="1" />
						<input name="txtCheckss" type="hidden" value="{txtCheckss}" />
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.fullname}</label>
									<input type="text" required class="form-control" value="{DATA.fullname}" name="fullname" id="fullname" placeholder="{LANG.fullname}"> 
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>{LANG.image}</label>
											<div>
												<label class="btn btn-info" for="fileUpload_npp">
													<i class="lni lni-image mr-1"></i>
													<input id="fileUpload_npp" name="photo_npp" type="file" style="display: none"/>
													{LANG.image}
												</label>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<span class="text-center" id="image-npp" >
											<!-- BEGIN: image_npp -->
											<img src="{NV_BASE_SITEURL}{NV_UPLOADS_DIR}/{MODULE_NAME}/{DATA.photo_npp}" class="photo-thumb" />
											<!-- END: image_npp -->
										</span>
										<input type="hidden" name="photo_npp" value="{DATA.photo_npp}" />
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.address}</label>
									<input required type="text" class="form-control" value="{DATA.address}" name="address" placeholder="{LANG.address}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.phone}</label>
									<input required type="text" class="form-control" value="{DATA.phone}" name="phone" placeholder="{LANG.phone}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.email}</label>
									<input required type="text" class="form-control" value="{DATA.email}" name="email" placeholder="{LANG.email}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.username}</label>
									<input required type="text" class="form-control" value="{DATA.username}" name="username" placeholder="{LANG.username}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.code_name} của NPP</label>
									<input required type="text" class="form-control" value="{DATA.codename}" name="codename" placeholder="{LANG.code_name} của NPP">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.password}</label>
									<input required type="password" class="form-control" value="{DATA.password}" name="password" placeholder="{LANG.password}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nhập lại {LANG.password}</label>
									<input required type="password" class="form-control" value="{DATA.repassword}" name="repassword" placeholder="Nhập lại {LANG.password}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.cmnd}</label>
									<input required type="text" class="form-control" value="{DATA.cccd}"  name="cccd" placeholder="{LANG.cmnd}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{LANG.stknganhang}</label>
									<input required type="text" class="form-control" value="{DATA.stknganhang}"  name="stknganhang" placeholder="{LANG.stknganhang}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Danh sách tỉnh thành được độc quyền</label>
									<select class="select2-multiple form-control" name="list_provin[]" multiple="multiple" id="select2Multiple">
										<option value="0">Lựa chọn</option>
										<!-- BEGIN: select_province -->
										<option value="{OPTION.key}" {OPTION.selected}>{OPTION.title}</option>
										<!-- END: select_province -->
									</select>
								</div>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-success"><i class="lni lni-save mr-1"></i>{LANG.send_register}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="modal" id="modalMain" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body"><span id="mess"></span></div>
			<div class="modal-footer">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span>
				</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	$('.select2-multiple').select2();
	$("#fileUpload_npp").on('change', function() {
	           var imgPath = $(this)[0].value;
	           var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	           var image_holder = $("#image-npp");
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
	function showimage( id='' ){
		$('#mess').html('');
		$('#modalMain').modal('show');
	   }
	function sendsunmit(){
	       $('input[type=submit]').attr('disabled', true)
	       return true;
	   }
</script>
<!-- END: main -->