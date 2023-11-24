<!-- BEGIN: main -->
<script	type="text/javascript" src="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/contact.js"></script>

<div class="nv-fullbg" id="formtuvan">
    <form method="post" action="{ACTION_FILE}" onsubmit="return nv_validForm(this);" novalidate<!-- BEGIN: recaptcha3 --> data-recaptcha3="1"<!-- END: recaptcha3 -->>
		
		<div class="form-group" style="display:none">
			<div class="input-group">
				<span class="input-group-addon">
				</span>
				<input type="text" maxlength="255" class="form-control required" value="Tư vấn dịch vụ" name="ftitle" placeholder="{LANG.title}" data-pattern="/^(.){3,}$/" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_title}" />
			</div>
		</div>
		<!-- BEGIN: iguest -->
		<div class="form-group" >
			<div class="input-group">
				<span class="input-group-addon"></span>
				<input type="text" maxlength="100" value="" name="fname" class="form-control required" placeholder="{LANG.fullname} (*)" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_fullname}" data-callback="nv_uname_check" /> 
            </div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
				</span>
				<input type="email" maxlength="60" value="" name="femail" class="form-control required" placeholder="{LANG.email} (*)" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_email}" />
			</div>
		</div>
		<!-- END: iguest -->
		<!-- BEGIN: iuser -->
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
				</span>
				<input type="text" maxlength="100" value="{CONTENT.fname}" name="fname" class="form-control required disabled" disabled="disabled" placeholder="{LANG.fullname} (*)" data-pattern="/^(.){3,}$/" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_fullname}" />
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<em class="fa fa-envelope fa-fix fa-lg fa-horizon"></em>
				</span>
				<input type="email" maxlength="60" value="{CONTENT.femail}" name="femail" class="form-control required disabled" disabled="disabled" placeholder="{LANG.email} (*)" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_email}" />
			</div>
		</div>
		<!-- END: iuser -->
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
				</span>
                <input type="text" maxlength="60" value="{CONTENT.fphone}" name="fphone" class="form-control" placeholder="{LANG.phone} (*)" />
            </div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
				</span>
                <input type="text" maxlength="60" value="{CONTENT.faddress}" name="faddress" class="form-control" placeholder="Công ty (*)" />
            </div>
        </div>
		<!-- BEGIN: cats -->
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					Nhu cầu theo gói
				</span>
				<select class="form-control" name="fcat">
					<!-- BEGIN: select_option_loop -->
					<option value="{SELECTVALUE}">
						{SELECTNAME}
					</option>
					<!-- END: select_option_loop -->
				</select>
			</div>
		</div>
		<!-- END: cats -->
		<div class="form-group" style="display:none">
            <div>
    			<textarea cols="8" name="fcon" class="form-control required" maxlength="1000" placeholder="Xin vui lòng để lại lời nhắn nội dung yêu cầu cho chúng tôi" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_content}"> tư vấn dịch vụ</textarea>
            </div>
		</div>
        <!-- BEGIN: sendcopy -->
        <div class="form-group">
            <label><input type="checkbox" name="sendcopy" value="1" checked="checked" /><span>{LANG.sendcopy}</span></label>
        </div>
        <!-- END: sendcopy -->
        <!-- BEGIN: captcha -->
		<div class="form-group">
            <div class="middle text-right clearfix">
                <img width="{GFX_WIDTH}" height="{GFX_HEIGHT}" title="{LANG.captcha}" alt="{LANG.captcha}" src="{NV_BASE_SITEURL}index.php?scaptcha=captcha&t={NV_CURRENTTIME}" class="captchaImg display-inline-block">
                <em onclick="change_captcha('.fcode');" title="{GLANG.captcharefresh}" class="fa fa-pointer fa-refresh margin-left margin-right"></em>
                <input type="text" placeholder="{LANG.captcha}" maxlength="{NV_GFX_NUM}" value="" name="fcode" class="fcode required form-control display-inline-block" style="width:100px;" data-pattern="/^(.){{NV_GFX_NUM},{NV_GFX_NUM}}$/" onkeypress="nv_validErrorHidden(this);" data-mess="{LANG.error_captcha}"/>
            </div>
		</div>
        <!-- END: captcha -->
        <!-- BEGIN: recaptcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <div class="nv-recaptcha-default"><div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha" data-pnum="4" data-btnselector="[type=submit]"></div></div>
            </div>
        </div>
        <!-- END: recaptcha -->
		<div class="text-center form-group">
			<input type="hidden" name="checkss" value="{CHECKSS}" />
			<input type="submit" value="{LANG.sendcontact}" name="btsend" class="btn btn-primary" />
		</div>
	</form>
    <div class="contact-result alert" style="display:none"></div>
</div>
<style>

.cats{
	display: table-cell;
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    background: #FFFFFF;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: 1px solid #E8E8E8;
    border-radius: 5px;
    height: 100px;
	box-sizing: border-box;
    color: #a38b7a;
    font-size: .97em;
    max-width: 100%;
    padding: 0 0.75em;
    transition: color .3s,border .3s,background .3s,opacity .3s;
    vertical-align: middle;
}
.cats .cat-content{
	margin-top: calc(100% - 98%);
}
</style>
<!-- END: main -->

<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-9f2cefe" data-id="9f2cefe" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-ee3c4e2 elementor-widget elementor-widget-menu-anchor" data-id="ee3c4e2" data-element_type="widget" data-widget_type="menu-anchor.default">
				<div class="elementor-widget-container">
					<div id="mcare" class="elementor-menu-anchor"></div>
				</div>
				</div>
				<div class="elementor-element elementor-element-e0e6d41 elementor-widget elementor-widget-html" data-id="e0e6d41" data-element_type="widget" data-widget_type="html.default">
				<div class="elementor-widget-container">
			<div class="b24-form"><div id="b24-090107052269225777514148678855013" data-styles-apllied="true" class=""><div class="b24-form-wrapper b24-form-border-bottom"><div class="b24-form-header b24-form-padding-side"><div class="b24-form-header-title">ĐĂNG KÝ NHẬN BÁO GIÁ&nbsp;</div> <div class="b24-form-header-description">Quý khách hàng để lại thông tin liên hệ để phía tư vấn viên có thể gọi hỗ trợ Quý khách hàng ngay. Hoặc liên hệ đến hotline: 0943.199.449</div></div> <div class="b24-form-content b24-form-padding-side"><form method="post" novalidate="novalidate"><!----> <div><div class="b24-form-field b24-form-field-last-name b24-form-control-string"><div><div><div class="b24-form-control-container b24-form-control-icon-after"><input name="lastname" autocomplete="family-name" type="string" class="b24-form-control"> <div class="b24-form-control-label">
				Họ và tên&nbsp; 
				<span class="b24-form-control-required">*</span></div> <!----> <!----> <div class="b24-form-control-alert-message" style="display: none;">
			Trường này là bắt buộc
		</div></div></div> <!----> <!----></div> <!----></div><div class="b24-form-field b24-form-field-email b24-form-control-string"><div><div><div class="b24-form-control-container b24-form-control-icon-after"><input name="email" autocomplete="email" type="email" class="b24-form-control"> <div class="b24-form-control-label">
				E-mail của bạn&nbsp; 
				<span class="b24-form-control-required">*</span></div> <!----> <!----> <div class="b24-form-control-alert-message" style="display: none;">
			Trường này là bắt buộc
		</div></div></div> <!----> <!----></div> <!----></div><div class="b24-form-field b24-form-field-phone b24-form-control-string"><div><div><div class="b24-form-control-container b24-form-control-icon-after"><input name="phone" autocomplete="tel" type="tel" class="b24-form-control"> <div class="b24-form-control-label">
				Số điện thoại của bạn 
				<span class="b24-form-control-required">*</span></div> <!----> <!----> <div class="b24-form-control-alert-message" style="display: none;">
			Trường này là bắt buộc
		</div></div></div> <!----> <!----></div> <!----></div><div class="b24-form-field b24-form-field-string b24-form-control-string"><div><div><div class="b24-form-control-container b24-form-control-icon-after"><input type="string" class="b24-form-control"> <div class="b24-form-control-label">
				Tên doanh nghiệp 
				<span class="b24-form-control-required" style="display: none;">*</span></div> <!----> <!----> <div class="b24-form-control-alert-message" style="display: none;">
			
		</div></div></div> <!----> <!----></div> <!----></div><div class="b24-form-field b24-form-field-string b24-form-control-string"><div><div><div class="b24-form-control-container b24-form-control-icon-after"><input type="string" class="b24-form-control"> <div class="b24-form-control-label">
				Địa chỉ văn phòng&nbsp; 
				<span class="b24-form-control-required" style="display: none;">*</span></div> <!----> <!----> <div class="b24-form-control-alert-message" style="display: none;">
			
		</div></div></div> <!----> <!----></div> <!----></div></div> <div> <div class="v-portal" style="display: none;"></div></div> <!----> <div class="b24-form-btn-container"><!----> <!----> <div class="b24-form-btn-block"><button type="submit" class="b24-form-btn">
								NHẬN GIÁ TỐT TẠI ĐÂY
							</button></div></div> <span style="color: red; display: none;">
						Debug: fill fields
					</span></form></div> <div class="b24-form-state-container"><div class="b24-form-loader" style="display: none;"><!----> <div class="b24-form-loader-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 263 174"><g transform="translate(52.5,7)"><path id="bxSunLines" d="M79,0 C80.6568542,0 82,1.34314575 82,3 L82,22 C82,23.6568542 80.6568542,25 79,25 C77.3431458,25 76,23.6568542 76,22 L76,3 C76,1.34314575 77.3431458,0 79,0 Z M134.861,23.139 C136.032146,24.3104996 136.032146,26.2095004 134.861,27.381 L121.426,40.816 C120.248863,41.9529166 118.377746,41.9366571 117.220544,40.7794557 C116.063343,39.6222543 116.047083,37.7511367 117.184,36.574 L130.619,23.139 C131.7905,21.9678542 133.6895,21.9678542 134.861,23.139 L134.861,23.139 Z M158,79 C158,80.6568542 156.656854,82 155,82 L136,82 C134.343146,82 133,80.6568542 133,79 C133,77.3431458 134.343146,76 136,76 L155,76 C156.656854,76 158,77.3431458 158,79 Z M134.861,134.861 C133.6895,136.032146 131.7905,136.032146 130.619,134.861 L117.184,121.426 C116.40413,120.672777 116.091362,119.557366 116.365909,118.508478 C116.640455,117.45959 117.45959,116.640455 118.508478,116.365909 C119.557366,116.091362 120.672777,116.40413 121.426,117.184 L134.861,130.619 C136.032146,131.7905 136.032146,133.6895 134.861,134.861 Z M79,158 C77.3431458,158 76,156.656854 76,155 L76,136 C76,134.343146 77.3431458,133 79,133 C80.6568542,133 82,134.343146 82,136 L82,155 C82,156.656854 80.6568542,158 79,158 Z M23.139,134.861 C21.9678542,133.6895 21.9678542,131.7905 23.139,130.619 L36.574,117.184 C37.3272234,116.40413 38.4426337,116.091362 39.491522,116.365909 C40.5404103,116.640455 41.3595451,117.45959 41.6340915,118.508478 C41.9086378,119.557366 41.5958698,120.672777 40.816,121.426 L27.381,134.861 C26.2095004,136.032146 24.3104996,136.032146 23.139,134.861 Z M0,79 C0,77.3431458 1.34314575,76 3,76 L22,76 C23.6568542,76 25,77.3431458 25,79 C25,80.6568542 23.6568542,82 22,82 L3,82 C1.34314575,82 0,80.6568542 0,79 L0,79 Z M23.139,23.139 C24.3104996,21.9678542 26.2095004,21.9678542 27.381,23.139 L40.816,36.574 C41.5958698,37.3272234 41.9086378,38.4426337 41.6340915,39.491522 C41.3595451,40.5404103 40.5404103,41.3595451 39.491522,41.6340915 C38.4426337,41.9086378 37.3272234,41.5958698 36.574,40.816 L23.139,27.381 C21.9678542,26.2095004 21.9678542,24.3104996 23.139,23.139 Z" fill="#FFD110" class="bx-sun-lines-animate"></path></g> <g fill="none" fill-rule="evenodd"><path d="M65.745 160.5l.245-.005c13.047-.261 23.51-10.923 23.51-23.995 0-13.255-10.745-24-24-24-3.404 0-6.706.709-9.748 2.062l-.47.21-.196-.477A19.004 19.004 0 0 0 37.5 102.5c-10.493 0-19 8.507-19 19 0 1.154.103 2.295.306 3.413l.108.6-.609-.01A17.856 17.856 0 0 0 18 125.5C8.335 125.5.5 133.335.5 143s7.835 17.5 17.5 17.5h47.745zM166.5 85.5h69v-.316l.422-.066C251.14 82.73 262.5 69.564 262.5 54c0-17.397-14.103-31.5-31.5-31.5-.347 0-.694.006-1.04.017l-.395.013-.103-.382C226.025 9.455 214.63.5 201.5.5c-15.014 0-27.512 11.658-28.877 26.765l-.047.515-.512-.063a29.296 29.296 0 0 0-3.564-.217c-16.016 0-29 12.984-29 29 0 15.101 11.59 27.643 26.542 28.897l.458.039v.064z" stroke-opacity=".05" stroke="#000" fill="#000"></path> <circle stroke="#FFD110" stroke-width="6" cx="131.5" cy="86.5" r="44.5" class="b24-form-loader-icon-sun-ring"></circle></g></svg></div></div> <div class="b24-form-state b24-form-success" style="display: none;"><div class="b24-form-state-inner"><div class="b24-form-state-icon b24-form-success-icon"></div> <div class="b24-form-state-text"><p>Yêu cầu đã được gửi đi!</p> <p></p></div> <!----></div> <div class="b24-form-inner-box"></div></div> <div class="b24-form-state b24-form-error" style="display: none;"><div class="b24-form-state-inner"><div class="b24-form-state-icon b24-form-error-icon"></div> <div class="b24-form-state-text"><p></p></div> <button class="b24-form-btn b24-form-btn-border b24-form-btn-tight">
							Gửi lại						
						</button></div> <div class="b24-form-inner-box"></div></div> <div class="b24-form-state b24-form-warning" style="display: none;"><div class="b24-form-state-inner"><div class="b24-form-state-icon b24-form-warning-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 169 169"><defs><circle id="a" cx="84.5" cy="84.5" r="65.5"></circle><filter x="-.8%" y="-.8%" width="101.5%" height="101.5%" filterUnits="objectBoundingBox" id="b"><feGaussianBlur stdDeviation=".5" in="SourceAlpha" result="shadowBlurInner1"></feGaussianBlur><feOffset dx="-1" dy="-1" in="shadowBlurInner1" result="shadowOffsetInner1"></feOffset><feComposite in="shadowOffsetInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.0886691434 0" in="shadowInnerInner1" result="shadowMatrixInner1"></feColorMatrix><feGaussianBlur stdDeviation=".5" in="SourceAlpha" result="shadowBlurInner2"></feGaussianBlur><feOffset dx="1" dy="1" in="shadowBlurInner2" result="shadowOffsetInner2"></feOffset><feComposite in="shadowOffsetInner2" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner2"></feComposite><feColorMatrix values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.292285839 0" in="shadowInnerInner2" result="shadowMatrixInner2"></feColorMatrix><feMerge><feMergeNode in="shadowMatrixInner1"></feMergeNode><feMergeNode in="shadowMatrixInner2"></feMergeNode></feMerge></filter></defs><g fill="none" fill-rule="evenodd"><circle stroke-opacity=".05" stroke="#000" fill-opacity=".07" fill="#000" cx="84.5" cy="84.5" r="84"></circle><use fill="#FFF" xlink:href="#a"></use><use fill="#000" filter="url(#b)" xlink:href="#a"></use><path d="M114.29 99.648L89.214 58.376c-1.932-3.168-6.536-3.168-8.427 0L55.709 99.648c-1.974 3.25.41 7.352 4.234 7.352h50.155c3.782 0 6.166-4.103 4.193-7.352zM81.404 72.756c0-1.828 1.48-3.29 3.33-3.29h.452c1.85 0 3.33 1.462 3.33 3.29v12.309c0 1.827-1.48 3.29-3.33 3.29h-.453c-1.85 0-3.33-1.463-3.33-3.29V72.756zm7.77 23.886c0 2.274-1.892 4.143-4.194 4.143s-4.193-1.869-4.193-4.143c0-2.275 1.891-4.144 4.193-4.144 2.302 0 4.193 1.869 4.193 4.144z" fill="#000" opacity=".4"></path></g></svg></div> <div class="b24-form-state-text"><p>Biểu mẫu này bị vô hiệu</p></div></div> <div class="b24-form-inner-box"></div></div></div> <!----> <div class="b24-form-sign"><select style="display: none;"><option value="ua">
						ua
					</option><option value="vn">
						vn
					</option><option value="de">
						de
					</option><option value="id">
						id
					</option><option value="ms">
						ms
					</option><option value="ja">
						ja
					</option><option value="hi">
						hi
					</option><option value="en">
						en
					</option><option value="in">
						in
					</option><option value="fr">
						fr
					</option><option value="it">
						it
					</option><option value="th">
						th
					</option><option value="tc">
						tc
					</option><option value="pl">
						pl
					</option><option value="sc">
						sc
					</option><option value="ru">
						ru
					</option><option value="la">
						la
					</option><option value="br">
						br
					</option><option value="tr">
						tr
					</option></select> <a href="https://www.bitrix24.com/abuse/?b24_form_id=195&amp;b24_address=https%3A%2F%2Fmstarcorp.bitrix24.com&amp;b24_form_address=https%3A%2F%2Fmstarcorp.vn%2Fdich-vu-it-thue-ngoai-toan-dien-m-care%2F" target="_blank" rel="nofollow" class="b24-form-sign-abuse-link">
					Báo cáo vi phạm
				</a> <span title="Bitrix24 không chịu trách nhiệm cho thông tin được cung cấp trong biểu mẫu này. Tuy nhiên, bạn luôn có thể báo cáo một vi phạm." class="b24-form-sign-abuse-help"></span> <!----></div></div></div></div>
				</div>
				</div>
					</div>
		</div>