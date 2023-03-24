<!-- BEGIN: main -->
<div class="modal-header">
	<h5 class="modal-title">{MODAL_TITLE}</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<!-- BEGIN: trialdrive_des -->
	<p>Lái thử xe ô tô là cách trải nghiệm đầy đủ và rõ ràng nhất về khả năng vận hành của một chiếc xe, vì chỉ khi là người trực tiếp cầm lái thì bạn mới cảm nhận và đánh giá chính xác được các yếu tố như: sức mạnh động cơ, cảm giác lái, sự linh hoạt khi di chuyển, khả năng cách âm,...</p>
	<p><em><strong>Khách hàng đăng ký lái thử xe miễn phí.</strong></em></p>
	<!-- END: trialdrive_des -->
	<!-- BEGIN: estimate_des -->
	<p><span style="font-size:16px">Quý khách vui lòng điền thông tin để nhận báo giá nhanh và chính xác nhất!</span></p>
	<!-- END: estimate_des -->
	<form method="post" action="{ACTION_FILE}" onsubmit="return nv_validForm(this);" novalidate>
		<input type="hidden" value="{CONTENT.ftitle}" name="ftitle" />
		<input type="hidden" value="{CONTENT.ftype}" name="ftype" />
		<input type="hidden" value="{CONTENT.fpid}" name="fpid" />

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><em class="fa fa-user fa-lg fa-horizon"></em></span>
				<input type="text" maxlength="100" value="" name="fname" class="form-control required" placeholder="{LANG.fullname}" data-pattern="/^(.){3,}$/" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_fullname}" />
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-envelope fa-lg fa-horizon"></em>
				</span>
				<input type="email" maxlength="60" value="" name="femail" class="form-control required" placeholder="{LANG.email}" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_email}" />
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-phone fa-lg fa-horizon"></em>
				</span>
				<input type="text" maxlength="60" value="{CONTENT.fphone}" name="fphone" class="form-control required" placeholder="{LANG.phone}" onkeypress="nv_validErrorHidden(this);" data-mess="Vui lòng nhập số điện thoại" />
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-home fa-lg fa-horizon"></em>
				</span>
				<select name="faddress" class="form-control">
					<option value="Hồ Chí Minh">Hồ Chí Minh</option>
					<option value="An Giang">An Giang</option>
					<option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
					<option value="Bắc Giang">Bắc Giang</option>
					<option value="Bắc Kạn">Bắc Kạn</option>
					<option value="Bạc Liêu">Bạc Liêu</option>
					<option value="Bắc Ninh">Bắc Ninh</option>
					<option value="Bến Tre">Bến Tre</option>
					<option value="Bình Định">Bình Định</option>
					<option value="Bình Dương">Bình Dương</option>
					<option value="Bình Phước">Bình Phước</option>
					<option value="Bình Thuận">Bình Thuận</option>
					<option value="Cà Mau">Cà Mau</option>
					<option value="Cần Thơ">Cần Thơ</option>
					<option value="Cao Bằng">Cao Bằng</option>
					<option value="Đà Nẵng">Đà Nẵng</option>
					<option value="Đắk Lắk">Đắk Lắk</option>
					<option value="Đắk Nông">Đắk Nông</option>
					<option value="Điện Biên">Điện Biên</option>
					<option value="Đồng Nai">Đồng Nai</option>
					<option value="Đồng Tháp">Đồng Tháp</option>
					<option value="Gia Lai">Gia Lai</option>
					<option value="Hà Giang">Hà Giang</option>
					<option value="Hà Nam ">Hà Nam </option>
					<option value="Hà Nội">Hà Nội</option>
					<option value="Hà Tĩnh">Hà Tĩnh</option>
					<option value="Hải Dương">Hải Dương</option>
					<option value="Hải Phòng">Hải Phòng</option>
					<option value="Hậu Giang">Hậu Giang</option>
					<option value="Hòa Bình">Hòa Bình</option>
					<option value="Hưng Yên">Hưng Yên</option>
					<option value="Khánh Hòa">Khánh Hòa</option>
					<option value="Kiên Giang">Kiên Giang</option>
					<option value="Kon Tum">Kon Tum</option>
					<option value="Lai Châu">Lai Châu</option>
					<option value="Lâm Đồng">Lâm Đồng</option>
					<option value="Lạng Sơn">Lạng Sơn</option>
					<option value="Lào Cai">Lào Cai</option>
					<option value="Long An">Long An</option>
					<option value="Nam Định">Nam Định</option>
					<option value="Nghệ An">Nghệ An</option>
					<option value="Ninh Bình">Ninh Bình</option>
					<option value="Ninh Thuận">Ninh Thuận</option>
					<option value="Phú Thọ">Phú Thọ</option>
					<option value="Phú Yên">Phú Yên</option>
					<option value="Quảng Bình">Quảng Bình</option>
					<option value="Quảng Nam">Quảng Nam</option>
					<option value="Quảng Ngãi">Quảng Ngãi</option>
					<option value="Quảng Ninh">Quảng Ninh</option>
					<option value="Quảng Trị">Quảng Trị</option>
					<option value="Sóc Trăng">Sóc Trăng</option>
					<option value="Sơn La">Sơn La</option>
					<option value="Tây Ninh">Tây Ninh</option>
					<option value="Thái Bình">Thái Bình</option>
					<option value="Thái Nguyên">Thái Nguyên</option>
					<option value="Thanh Hóa">Thanh Hóa</option>
					<option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
					<option value="Tiền Giang">Tiền Giang</option>
					<option value="Trà Vinh">Trà Vinh</option>
					<option value="Tuyên Quang">Tuyên Quang</option>
					<option value="Vĩnh Long">Vĩnh Long</option>
					<option value="Vĩnh Phúc">Vĩnh Phúc</option>
					<option value="Yên Bái">Yên Bái</option>
				</select>
			</div>
		</div>
		<!-- BEGIN: estimate -->
		<div class="form-group">
			<label>Hình thức thanh toán</label>
			<div class="form-check form-check-inline">
				<label class="form-check-label">
					<input class="form-check-input" type="radio" name="fpayment" value="0" checked>
					Tiền mặt
				</label>
				<label class="form-check-label" style="margin-left: 20px">
					<input class="form-check-input" type="radio" name="fpayment" value="1">
					Hỗ trợ vay
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Thời gian lấy xe</label>
			<select name="ftimetake" class="form-control">
				<option value="0">Mua ngay trong tháng</option>
				<option value="1">Khoảng 2 tháng</option>
				<option value="2">Khoảng 3 tháng</option>
				<option value="3">Khoảng 6 tháng</option>
				<option value="4">Khác</option>
			</select>
		</div>
		<!-- END: estimate -->
		<div class="form-group">
			<label>Lời nhắn</label>
			<div>
				<textarea cols="8" name="fcon" class="form-control" placeholder="{LANG.content}"></textarea>
			</div>
		</div>
		<div class="text-center form-group">
			<input type="hidden" name="checkss" value="{CHECKSS}" />
			<input type="submit" value="{LANG.sendcontact}" name="btsend" class="btn btn-primary" />
		</div>
	</form>
	<div class="contact-result alert"></div>
</div>

<style>
	h5.modal-title {
		font-size: 16px;
		color: #000;
		padding: 5px;
		display: inline-block;
	}

	.modal-header .close {
		opacity: 1;
		margin-top: -25px;
		margin-right: -25px;
		background: #fff;
		height: 35px;
		width: 35px;
		padding: 5px;
		border-radius: 50%;
		border: 1px solid #e5e5e5;
		color: #7d7d7d;
	}

	.modal-header .close:hover {
		background: #333;
		color: #fff;
	}

	.modal-body {
		color: #333;
	}
</style>
<!-- END: main -->