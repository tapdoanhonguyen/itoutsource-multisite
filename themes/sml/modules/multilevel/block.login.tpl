<!-- BEGIN: main -->
<!-- BEGIN: display_button -->
<a href="{NV_BASE_SITEURL}users" class="login-mobile">
	<i class="fa fa-user" aria-hidden="true"></i>
</a>
<div id="nv-block-login" class="text-center hidden-xs">
    <button type="button" class="login btn btn-success btn-sm" onclick="modalShowByObj('#guestLogin_{BLOCKID}', 'recaptchareset')">
        {GLANG.signin}
    </button>
    <!-- BEGIN: allowuserreg2 -->
    <button type="button" class="register btn btn-primary btn-sm" title="Đăng ký" onclick="modalShowByObj('#guestReg_{BLOCKID}', 'recaptchareset')">
        {GLANG.register}
    </button>
    <!-- END: allowuserreg2 -->
    <!-- BEGIN: allowuserreg_link -->
    <a href="{USER_REGISTER}" class="register btn btn-primary btn-sm">{GLANG.register}</a>
    <!-- END: allowuserreg_link -->
</div>
<!-- START FORFOOTER -->
<div id="guestLogin_{BLOCKID}" class="hidden">
    <div class="page panel panel-default bg-lavender box-shadow">
        <div class="panel-body">
            <h2 class="text-center margin-bottom-lg">
                {LANG.login}
            </h2>
            {FILE "login_form.tpl"}
        </div>
    </div>
</div>
<!-- END FORFOOTER -->
<!-- END: display_button -->

<!-- BEGIN: display_form -->
{FILE "login_form.tpl"}
<!-- END: display_form -->

<!-- BEGIN: allowuserreg -->
<div id="guestReg_{BLOCKID}" class="hidden">
    <div class="page panel panel-default bg-lavender box-shadow">
        <div class="panel-body">
            <h2 class="text-center margin-bottom-lg">
                {LANG.title_reg_multilevel}
            </h2>
            {FILE "register_form.tpl"}
        </div>
    </div>
</div>
<!-- END: allowuserreg -->

<!-- BEGIN: datepicker -->
<link type="text/css" href="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<!-- END: datepicker -->

<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{BLOCK_JS}/js/users.js"></script>
<!-- END: main -->

<!-- BEGIN: signed -->
<div class="content signed clearfix">
    <div class="nv-info" style="display:none"></div>
    <div class="userBlock">
		<a href="#" class="login-mobile">
			<i class="fa fa-user" aria-hidden="true"></i>
		</a>
        <div class=" hidden-xs"><span class="lev-{LEVEL} text-normal margin-right hidden-xs">{WELCOME}:</span>{USER.full_name}</div>
		<div class="user-info-box">
			<div class="user-info">
				<div class="row margin-bottom-lg">
					<div class="col-xs-8 text-center">
						<a title="{LANG.edituser}" href="#" onclick="changeAvatar('{URL_AVATAR}')"><img src="{AVATA}" alt="{USER.full_name}" class="img-thumbnail bg-gainsboro" /></a>
						<!-- BEGIN: crossdomain_listener -->
						<script type="text/javascript">
						function SSOReciver(event) {
							if (event.origin !== '{SSO_REGISTER_ORIGIN}') {
								return false;
							}
							location.reload();
						}
						window.addEventListener("message", SSOReciver, false);
						</script>
						<!-- END: crossdomain_listener -->
					</div>
					<div class="col-xs-16">
						<ul class="nv-list-item sm">
							<li class="active">
								<a href="{URL_MODULE}">{LANG.user_info}</a>
							</li>
							<li>
								<a href="{URL_HREF}editinfo">{LANG.editinfo}</a>
							</li>
							<!-- BEGIN: allowopenid -->
							<li>
								<a href="{URL_HREF}editinfo/openid">{LANG.openid_administrator}</a>
							</li>
							<!-- END: allowopenid -->
							<!-- BEGIN: regroups -->
							<li>
								<a href="{URL_HREF}editinfo/group">{LANG.in_group}</a>
							</li>
							<!-- END: regroups -->
						</ul>
					</div>
				</div>
				<!-- BEGIN: admintoolbar -->
				<div class="margin-top boder-top padding-top margin-bottom-lg">
					<p class="margin-bottom-sm"><strong>{GLANG.for_admin}</strong></p>
					<ul class="nv-list-item sm">
						<li>
							<em class="fa fa-cog fa-horizon margin-right-sm"></em><a href="{NV_BASE_SITEURL}{NV_ADMINDIR}/index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}" title="{GLANG.admin_page}"><span>{GLANG.admin_page}</span></a>
						</li>
						<!-- BEGIN: is_modadmin -->
						<li>
							<em class="fa fa-key fa-horizon margin-right-sm"></em><a href="{URL_ADMINMODULE}" title="{GLANG.admin_module_sector} {MODULENAME}"><span>{GLANG.admin_module_sector} {MODULENAME}</span></a>
						</li>
						<!-- END: is_modadmin -->
						<!-- BEGIN: is_spadadmin -->
						<li>
							<em class="fa fa-arrows fa-horizon margin-right-sm"></em><a href="{URL_DBLOCK}" title="{LANG_DBLOCK}"><span>{LANG_DBLOCK}</span></a>
						</li>
						<!-- END: is_spadadmin -->
						<li>
							<em class="fa fa-user fa-horizon margin-right-sm"></em><a href="{URL_AUTHOR}" title="{GLANG.admin_view}"><span>{GLANG.admin_view}</span></a>
						</li>
					</ul>
				</div>
				<!-- END: admintoolbar -->
				<div class="row">
					<div class="col-xs-14">
						<em class="button btn-sm icon-enter" title="{LANG.current_login}"></em>{USER.current_login_txt}
					</div>
					<div class="col-xs-10 text-right">
						<button type="button" class="btn btn-default btn-sm active" onclick="{URL_LOGOUT}(this);">
							<em class="icon-exit"></em>&nbsp;{LANG.logout_title}&nbsp;
						</button>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{BLOCK_JS}/js/users.js"></script>
<!-- END: signed -->


<!-- BEGIN: main2 -->





<form class="user-reg-form" action="{USER_REGISTER}" method="post" onsubmit="return reg_validForm(this);" autocomplete="off" novalidate<!-- BEGIN: reg_recaptcha3 --> data-recaptcha3="1"<!-- END: reg_recaptcha3 -->>
    <div class="nv-info margin-bottom" data-default="{LANG.info}">{LANG.info}</div>

    <div class="form-detail">
        <!-- BEGIN: name_show_0 -->
        <!-- BEGIN: show_last_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="last_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess="{LANG.field_unane_error}"<!-- BEGIN: data_callback--> data-callback="{CALLFUNC}" data-error="{ERRMESS}"<!-- END: data_callback-->>
            </div>
        </div>
        <!-- END: show_last_name-->
        <!-- BEGIN: show_first_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="first_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess="{LANG.field_unane_error}"<!-- BEGIN: data_callback--> data-callback="{CALLFUNC}" data-error="{ERRMESS}"<!-- END: data_callback-->>
            </div>
        </div>
        <!-- END: show_first_name-->
        <!-- END: name_show_0 -->

        <!-- BEGIN: name_show_1 -->
        <!-- BEGIN: show_first_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="first_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess=""<!-- BEGIN: data_callback--> data-callback="{CALLFUNC}" data-error="{ERRMESS}"<!-- END: data_callback-->>
            </div>
        </div>
        <!-- END: show_first_name-->
        <!-- BEGIN: show_last_name-->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="last_name" maxlength="{FIELD.max_length}" onkeypress="validErrorHidden(this);" data-mess=""<!-- BEGIN: data_callback--> data-callback="{CALLFUNC}" data-error="{ERRMESS}"<!-- END: data_callback-->>
            </div>
        </div>
        <!-- END: show_last_name-->
        <!-- END: name_show_1 -->

        <div class="form-group">
            <div>
                <input type="text" class="required form-control" placeholder="{LANG.account}" value="" name="username" maxlength="{NICK_MAXLENGTH}" onkeypress="validErrorHidden(this);" data-mess="{USERNAME_RULE}" data-callback="login_check" data-minlength="{NICK_MINLENGTH}" data-type="{LOGINTYPE}">
            </div>
        </div>

        <div class="form-group">
            <div>
                <input type="email" class="required form-control" placeholder="{LANG.email}" value="" name="email" maxlength="100" onkeypress="validErrorHidden(this);" data-mess="{GLANG.email_empty}">
            </div>
        </div>

        <div class="form-group">
            <div>
                <input type="password" autocomplete="off" class="password required form-control" placeholder="{LANG.password}" value="" name="password" maxlength="{PASS_MAXLENGTH}" data-pattern="/^(.){{PASS_MINLENGTH},{PASS_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{PASSWORD_RULE}">
            </div>
        </div>

        <div class="form-group">
            <div>
                <input type="password" autocomplete="off" class="re-password required form-control" placeholder="{LANG.re_password}" value="" name="re_password" maxlength="{PASS_MAXLENGTH}" data-pattern="/^(.){1,}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.re_password_empty}">
            </div>
        </div>

        <!-- BEGIN: show_gender -->
        <div>
            <div>
                <div class="form-group clearfix radio-box {FIELD.required} {FIELD.class}" data-mess="">
                    <label class="col-sm-8 control-label {FIELD.required} {FIELD.class}" title="{FIELD.description}"> {FIELD.title} </label>
                    <div class="btn-group col-sm-16">
                        <!-- BEGIN: gender -->
                        <label class="radio-box"> <input type="radio" name="gender" value="{GENDER.key}" class="{FIELD.class}" onclick="validErrorHidden(this,5);" {GENDER.checked}> {GENDER.title} </label>
                        <!-- END: gender -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: show_gender -->

        <!-- BEGIN: show_birthday -->
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control datepicker {FIELD.required} {FIELD.class}" data-provide="datepicker" placeholder="{FIELD.title}" value="{FIELD.value}" name="birthday" readonly="readonly" style="background-color:#fff" onchange="validErrorHidden(this);" onfocus="datepickerShow(this);" data-mess=""/>
                <span class="input-group-addon pointer" onclick="button_datepickerShow(this);"> <em class="fa fa-calendar"></em> </span>
            </div>
        </div>
        <!-- END: show_birthday -->

        <!-- BEGIN: show_sig -->
        <div class="form-group">
            <div>
                <textarea class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" name="sig" onkeypress="validErrorHidden(this);" data-mess="">{FIELD.value}</textarea>
            </div>
        </div>
        <!-- END: show_sig -->

        <!-- BEGIN: show_question -->
        <div class="form-group rel">
            <div class="input-group">
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="question" maxlength="{FIELD.max_length}" data-pattern="/^(.){{FIELD.min_length},}$/" onkeypress="validErrorHidden(this);" data-mess="{LANG.your_question_empty}">
                <div class="input-group-btn" role="group">
                    <button type="button" class="btn btn-default pointer dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- BEGIN: frquestion -->
                        <li><a href="javascript:void(0)" onclick="addQuestion(this);">{QUESTION}</a></li>
                        <!-- END: frquestion -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: show_question -->

        <!-- BEGIN: show_answer -->
        <div class="form-group">
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="answer" maxlength="{FIELD.max_length}" data-pattern="/^(.){{FIELD.min_length},}$/" onkeypress="validErrorHidden(this);" data-mess="{LANG.answer_empty}">
            </div>
        </div>
        <!-- END: show_answer -->

        <!-- BEGIN: field -->
        <!-- BEGIN: loop -->
        <!-- BEGIN: textbox -->
        <div class="form-group">
            <label for="nvcf-{FIELD.field}">{FIELD.title}:</label>
            <div>
                <input type="text" class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" value="{FIELD.value}" name="custom_fields[{FIELD.field}]" onkeypress="validErrorHidden(this);" data-mess="" id="nvcf-{FIELD.field}"<!-- BEGIN: data_callback--> data-callback="{CALLFUNC}"  data-error="{ERRMESS}"<!-- END: data_callback-->>
            </div>
        </div>
        <!-- END: textbox -->

        <!-- BEGIN: date -->
        <div class="form-group">
            <label for="nvcf-{FIELD.field}">{FIELD.title}:</label>
            <div class="input-group">
                <input type="text" class="form-control datepicker {FIELD.required} {FIELD.class}" data-provide="datepicker" placeholder="{FIELD.title}" value="{FIELD.value}" name="custom_fields[{FIELD.field}]" readonly="readonly" style="background-color:#fff" onchange="validErrorHidden(this);" onfocus="datepickerShow(this);" data-mess="" id="nvcf-{FIELD.field}">
                <span class="input-group-addon pointer" onclick="button_datepickerShow(this);"> <em class="fa fa-calendar"></em> </span>
            </div>
        </div>
        <!-- END: date -->

        <!-- BEGIN: textarea -->
        <div class="form-group">
            <label for="nvcf-{FIELD.field}">{FIELD.title}:</label>
            <div>
                <textarea class="form-control {FIELD.required} {FIELD.class}" placeholder="{FIELD.title}" name="custom_fields[{FIELD.field}]" onkeypress="validErrorHidden(this);" data-mess="" id="nvcf-{FIELD.field}">{FIELD.value}</textarea>
            </div>
        </div>
        <!-- END: textarea -->

        <!-- BEGIN: editor -->
        <div class="form-group">
            <label>{FIELD.title}:</label>
            {EDITOR}
        </div>
        <!-- END: editor -->

        <!-- BEGIN: select -->
        <div class="form-group">
            <label for="nvcf-{FIELD.field}">{FIELD.title}:</label>
            <div>
                <select name="custom_fields[{FIELD.field}]" class="form-control {FIELD.required} {FIELD.class}" onchange="validErrorHidden(this);" data-mess="" id="nvcf-{FIELD.field}">
                    <!-- BEGIN: loop -->
                    <option value="{FIELD_CHOICES.key}" {FIELD_CHOICES.selected}> {FIELD_CHOICES.value} </option>
                    <!-- END: loop -->
                </select>
            </div>
        </div>
        <!-- END: select -->

        <!-- BEGIN: radio -->
        <div>
            <div>
                <div class="form-group clearfix radio-box {FIELD.required}" data-mess="">
                    <div class="margin-bottom-sm">
                        <label class="control-label text-normal {FIELD.required}" title="{FIELD.description}"> {FIELD.title} </label>
                    </div>
                    <!-- BEGIN: loop -->
                    <label for="lb_{FIELD_CHOICES.id}" class="radio-box"><input type="radio" name="custom_fields[{FIELD.field}]" id="lb_{FIELD_CHOICES.id}" value="{FIELD_CHOICES.key}" class="{FIELD.class}" onclick="validErrorHidden(this,5);"{FIELD_CHOICES.checked}> {FIELD_CHOICES.value} </label><br/>
                    <!-- END: loop -->
                </div>
            </div>
        </div>
        <!-- END: radio -->

        <!-- BEGIN: checkbox -->
        <div>
            <div>
                <div class="form-group clearfix check-box {FIELD.required}" data-mess="">
                    <div class="margin-bottom-sm">
                        <label class="control-label text-normal {FIELD.required}" title="{FIELD.description}"> {FIELD.title} </label>
                    </div>
                    <!-- BEGIN: loop -->
                    <label for="lb_{FIELD_CHOICES.id}" class="check-box"><input type="checkbox" name="custom_fields[{FIELD.field}][]" id="lb_{FIELD_CHOICES.id}" value="{FIELD_CHOICES.key}" class="{FIELD.class}" style="margin-top:0" onclick="validErrorHidden(this,5);"{FIELD_CHOICES.checked}> {FIELD_CHOICES.value} </label><br/>
                    <!-- END: loop -->
                </div>
            </div>
        </div>
        <!-- END: checkbox -->

        <!-- BEGIN: multiselect -->
        <div class="form-group">
            <label for="nvcf-{FIELD.field}">{FIELD.title}:</label>
            <div>
                <select name="custom_fields[{FIELD.field}][]" multiple="multiple" class="{FIELD.class} {FIELD.required} form-control" onchange="validErrorHidden(this);" data-mess="" id="nvcf-{FIELD.field}">
                    <!-- BEGIN: loop -->
                    <option value="{FIELD_CHOICES.key}" {FIELD_CHOICES.selected}>{FIELD_CHOICES.value}</option>
                    <!-- END: loop -->
                </select>
            </div>
        </div>
        <!-- END: multiselect -->
        <!-- END: loop -->
        <!-- END: field -->

        <!-- BEGIN: agreecheck -->
        <div>
            <div>
                <div class="form-group text-center check-box required" data-mess="">
                    <input type="checkbox" name="agreecheck" value="1" class="fix-box" style="margin-top:0" onclick="validErrorHidden(this,3);"/>{LANG.accept2} <a onclick="usageTermsShow('{LANG.usage_terms}');" href="javascript:void(0);"><span class="btn btn-default btn-xs">{LANG.usage_terms}</span></a>
                </div>
            </div>
        </div>
        <!-- END: agreecheck -->

        <!-- BEGIN: reg_captcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <img class="captchaImg display-inline-block" src="{SRC_CAPTCHA}" width="{GFX_WIDTH}" height="{GFX_HEIGHT}" alt="{N_CAPTCHA}" title="{N_CAPTCHA}" />
                <em class="fa fa-pointer fa-refresh margin-left margin-right" title="{CAPTCHA_REFRESH}" onclick="change_captcha('.rsec');"></em>
                <input type="text" style="width:100px;" class="rsec required form-control display-inline-block" name="nv_seccode" value="" maxlength="{GFX_MAXLENGTH}" placeholder="{GLANG.securitycode}" data-pattern="/^(.){{GFX_MAXLENGTH},{GFX_MAXLENGTH}}$/" onkeypress="validErrorHidden(this);" data-mess="{GLANG.securitycodeincorrect}" />
            </div>
        </div>
        <!-- END: reg_captcha -->
        <!-- BEGIN: reg_recaptcha -->
        <div class="form-group">
            <div class="middle text-center clearfix">
                <div class="nv-recaptcha-default">
                    <div id="{RECAPTCHA_ELEMENT}" data-toggle="recaptcha" data-pnum="4" data-btnselector="[type=submit]"></div>
                </div>
            </div>
        </div>
        <!-- END: reg_recaptcha -->
        <div class="text-center margin-bottom-lg">
            <input type="hidden" name="checkss" value="{CHECKSS}" />
            <!-- BEGIN: redirect --><input name="nv_redirect" value="{REDIRECT}" type="hidden" /><!-- END: redirect -->
            <input type="button" value="{GLANG.reset}" class="btn btn-default" onclick="validReset(this.form);return!1;" />
            <input type="submit" class="btn btn-primary" value="{LANG.register}" />
        </div>
        <!-- BEGIN: lostactivelink -->
        <div class="text-center">
            <a href="{LOSTACTIVELINK_SRC}">{LANG.resend_activelink}</a>
        </div>
        <!-- END: lostactivelink -->
    </div>
</form>
<!-- END: main2 -->