<!-- BEGIN: main -->
<section class="elementor-section elementor-top-section elementor-element elementor-element-d4f16b3 elementor-section-boxed elementor-section-height-default elementor-section-height-default animated fadeInUp" data-id="d4f16b3" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e2908dd" data-id="e2908dd" data-element_type="column" >
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-1f5dce4 elementor-widget elementor-widget-heading" data-id="1f5dce4" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">BẢNG KHẢO SÁT HẠ TẦNG ONLINE</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-9889895 elementor-button-align-center elementor-widget elementor-widget-form" data-id="9889895" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}" data-widget_type="form.default">
				<div class="elementor-widget-container">
					<form id="survey" class="elementor-form" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
			<input type="hidden" name="save" value="1">
			<input type="hidden" name="post_id" value="30250">
			<input type="hidden" name="form_id" value="9889895">
			<input type="hidden" name="referer_title" value="Khảo sát hạ tầng CNTT doanh nghiệp - mstarcorp.vn">
			<input type="hidden" name="id" value="{ROW.id}" />
							<input type="hidden" name="queried_id" value="30250">
			
			<div class="elementor-form-fields-wrapper elementor-labels-above">
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_5105c15 elementor-col-100 elementor-field-required elementor-mark-required">
												<label for="form-field-field_5105c15" class="elementor-field-label">
								{LANG.usercomp}:							</label>
									<input type="number" name="usercomp" id="form-field-field_5105c15" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true" min="" max="">
						</div>
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_ae0b92d elementor-col-25 elementor-field-required elementor-mark-required">
												<label for="form-field-field_ae0b92d" class="elementor-field-label">
								{LANG.desktop}:							</label>
									<input type="number" name="desktop" id="form-field-field_ae0b92d" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true" min="" max="">
						</div>
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_fd23ef9 elementor-col-25 elementor-field-required elementor-mark-required">
												<label for="form-field-field_fd23ef9" class="elementor-field-label">
								{LANG.laptop}:							</label>
									<input type="number" name="laptop" id="form-field-field_fd23ef9" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true" min="" max="">
						</div>
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_866ddba elementor-col-25 elementor-field-required elementor-mark-required">
												<label for="form-field-field_866ddba" class="elementor-field-label">
								{LANG.print}:							</label>
									<input type="number" name="print" id="form-field-field_866ddba" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true" min="" max="">
						</div>
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_78769e0 elementor-col-25 elementor-field-required elementor-mark-required">
												<label for="form-field-field_78769e0" class="elementor-field-label">
								{LANG.scan}:							</label>
									<input type="number" name="scan" id="form-field-field_78769e0" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true" min="" max="">
						</div>
								<div class="elementor-field-type-checkbox elementor-field-group elementor-column elementor-field-group-field_d4339e5 elementor-col-100">
												<label for="form-field-field_d4339e5" class="elementor-field-label">
								{LANG.window}							</label>
						<div class="elementor-field-subgroup  elementor-subgroup-inline">
						 <!-- BEGIN: checkbox_window -->
						 <span class="elementor-field-option">
                        <label><input class="form-control" type="checkbox" name="window[]" value="{OPTION.key}" {OPTION.checked}>{OPTION.title}</label>
						</span>
						<!-- END: checkbox_window -->
						
						</div>
								<div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_659ca46 elementor-col-50 elementor-field-required elementor-mark-required">
												<label for="form-field-field_659ca46" class="elementor-field-label">
								{LANG.server}							</label>
								<div class="elementor-field elementor-select-wrapper remove-before ">
			<div class="select-caret-down-wrapper">
				<i aria-hidden="true" class="eicon-caret-down"></i>			</div>
			<select name="server" id="form-field-field_659ca46" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
									<!-- BEGIN: radio_server -->
										<option value="{OPTION.key} " {OPTION.checked}>{OPTION.title} </option> 
									<!-- END: radio_server -->
							</select>
		</div>
						</div>
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_8223b0c elementor-col-50 elementor-field-required elementor-mark-required">
												<label for="form-field-field_8223b0c" class="elementor-field-label">
								{LANG.servernum}							</label>
									<input type="number" name="servernum" id="form-field-field_8223b0c" class="elementor-field elementor-size-sm  elementor-field-textual" required="required" aria-required="true" min="" max="">
						</div>
								<div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_4582934 elementor-col-70 elementor-field-required elementor-mark-required">
												<label for="form-field-field_4582934" class="elementor-field-label">
								{LANG.telecom}							</label>
								<div class="elementor-field elementor-select-wrapper remove-before ">
			<div class="select-caret-down-wrapper">
				<i aria-hidden="true" class="eicon-caret-down"></i>			</div>
			<select name="telecom" id="form-field-field_4582934" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
									<!-- BEGIN: radio_telecom -->
										<option value="{OPTION.key} " {OPTION.checked}>{OPTION.title} </option> 
									<!-- END: radio_telecom -->
							</select>
		</div>
						</div>
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_9f4c4ab elementor-col-33">
												<label for="form-field-field_9f4c4ab" class="elementor-field-label">
								{LANG.tel_model} 							</label>
														<input size="1" type="text" name="tel_model" id="form-field-field_9f4c4ab" class="elementor-field elementor-size-sm  elementor-field-textual">
											</div>
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_ffe16e4 elementor-col-33">
												<label for="form-field-field_ffe16e4" class="elementor-field-label">
								{LANG.tel_mobile}							</label>
									<input type="number" name="tel_mobile" id="form-field-field_ffe16e4" class="elementor-field elementor-size-sm  elementor-field-textual" min="" max="">
						</div>
								<div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_95c2cde elementor-col-33">
												<label for="form-field-field_95c2cde" class="elementor-field-label">
								{LANG.tel_ext}						</label>
									<input type="number" name="tel_ext" id="form-field-field_95c2cde" class="elementor-field elementor-size-sm  elementor-field-textual" min="" max="">
						</div>
								<div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_ba43e9a elementor-col-50 elementor-field-required elementor-mark-required">
												<label for="form-field-field_ba43e9a" class="elementor-field-label">
								{LANG.camera} 							</label>
								<div class="elementor-field elementor-select-wrapper remove-before ">
			<div class="select-caret-down-wrapper">
				<i aria-hidden="true" class="eicon-caret-down"></i>			</div>
			<select name="camera" id="form-field-field_ba43e9a" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
									<!-- BEGIN: radio_camera -->
										<option value="{OPTION.key} " {OPTION.checked}>{OPTION.title} </option> 
									<!-- END: radio_camera -->
							</select>
		</div>
						</div>
								<div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_c32301d elementor-col-50 elementor-field-required elementor-mark-required">
												<label for="form-field-field_c32301d" class="elementor-field-label">
								{LANG.camnum}						</label>
								<div class="elementor-field elementor-select-wrapper remove-before ">
			<div class="select-caret-down-wrapper">
				<i aria-hidden="true" class="eicon-caret-down"></i>			</div>
			<select name="camnum" id="form-field-field_c32301d" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
									<option value="5-10">5-10</option>
									<option value="11-20">11-20</option>
									<option value="30-50">30-50</option>
									<option value="50-100">50-100</option>
									<option value="Trên 100 ">Trên 100 </option>
							</select>
		</div>
						</div>
								<div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_3684fa0 elementor-col-100 elementor-field-required elementor-mark-required">
												<label for="form-field-field_3684fa0" class="elementor-field-label">
								{LANG.email}							</label>
								<div class="elementor-field elementor-select-wrapper remove-before ">
			<div class="select-caret-down-wrapper">
				<i aria-hidden="true" class="eicon-caret-down"></i>			</div>
			<select name="email" id="form-field-field_3684fa0" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
									<!-- BEGIN: radio_email -->
										<option value="{OPTION.key} " {OPTION.checked}>{OPTION.title} </option> 
									<!-- END: radio_email -->
							</select>
		</div>
						</div>
								<div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_9877c7c elementor-col-50 elementor-field-required elementor-mark-required">
												<label for="form-field-field_9877c7c" class="elementor-field-label">
								{LANG.itos}						</label>
								<div class="elementor-field elementor-select-wrapper remove-before ">
			<div class="select-caret-down-wrapper">
				<i aria-hidden="true" class="eicon-caret-down"></i>			</div>
			<select name="form_fields[field_9877c7c]" id="form-field-field_9877c7c" class="elementor-field-textual elementor-size-sm" required="required" aria-required="true">
									<!-- BEGIN: radio_itos -->
										<option value="{OPTION.key} " {OPTION.checked}>{OPTION.title} </option> 
									<!-- END: radio_itos -->
									
									
									
							</select>
		</div>
						</div>
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_af9517e elementor-col-50">
												<label for="form-field-field_af9517e" class="elementor-field-label">
								{LANG.itosname}							</label>
														<input size="1" type="text" name="form_fields[field_af9517e]" id="form-field-field_af9517e" class="elementor-field elementor-size-sm  elementor-field-textual">
											</div>
								<div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-field_8f50682 elementor-col-100 elementor-field-required elementor-mark-required">
												<label for="form-field-field_8f50682" class="elementor-field-label">
								{LANG.problem}							</label>
						<textarea class="elementor-field-textual elementor-field  elementor-size-sm" name="problem" id="form-field-field_8f50682" rows="4" required="required" aria-required="true"></textarea>				</div>
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-33 elementor-field-required elementor-mark-required">
												<label for="form-field-name" class="elementor-field-label">
								{LANG.fullname}							</label>
														<input size="1" type="text" name="itosname" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Mời nhập vào đây..." required="required" aria-required="true">
											</div>
								<div class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-message elementor-col-33 elementor-field-required elementor-mark-required">
												<label for="form-field-message" class="elementor-field-label">
								{LANG.infomobile}							</label>
								<input size="1" type="tel" name="infomobile" id="form-field-message" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Mời nhập vào đây..." required="required" aria-required="true" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">

						</div>
								<div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-email elementor-col-33 elementor-field-required elementor-mark-required">
												<label for="form-field-email" class="elementor-field-label">
								{LANG.infoemail}							</label>
														<input size="1" type="email" name="infoemail" id="form-field-email" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Mời nhập vào đây..." required="required" aria-required="true">
											</div>
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_ef3d2a2 elementor-col-50 elementor-field-required elementor-mark-required">
												<label for="form-field-field_ef3d2a2" class="elementor-field-label">
								{LANG.infocomname} 							</label>
														<input size="1" type="text" name="infocomname" id="form-field-field_ef3d2a2" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Mời nhập vào đây..." required="required" aria-required="true">
											</div>
								<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_f31202e elementor-col-50 elementor-field-required elementor-mark-required">
												<label for="form-field-field_f31202e" class="elementor-field-label">
								{LANG.infoaddress}						</label>
														<input size="1" type="text" name="infoaddress" id="form-field-field_f31202e" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Mời nhập vào đây..." required="required" aria-required="true">
											</div>
								
								<div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
					<button type="submit" class="elementor-button elementor-size-md elementor-animation-shrink">
						<span>
															<span class=" elementor-button-icon">
																										</span>
																						<span class="elementor-button-text">{LANG.send} </span>
													</span>
					</button>
				</div>
			</div>
		
				</div>
				</form>
				</div>
					</div>
		</div>
							</div>
		</section>

<script>
$(document).ready(function() {
    $('#survey').submit(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của form

        $.ajax({
            url: $(this).attr('action'), // URL để gửi dữ liệu đến
            type: $(this).attr('method'), // Phương thức HTTP (GET hoặc POST)
            data: $(this).serialize(), // Dữ liệu của biểu mẫu để gửi đi

            success: function(response) {
                // Xử lý kết quả thành công khi gửi AJAX
                alert('Thông tin đã được gửi. Cảm ơn!');
            },

            error: function(xhr, status, error) {
                // Xử lý lỗi khi gửi AJAX
                alert('Đã xảy ra lỗi: ' + error);
            }
        });
    });
});
</script>






 







<link rel="StyleSheet" href="{CSS}">


<!-- END: main -->