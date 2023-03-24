<!-- BEGIN: main -->
{FILE "header_only.tpl"}
<div class="login-box">
  <div class="login-logo">
    <a title="{SITE_NAME}" href="{THEME_SITE_HREF}"><img class="logo" src="{LOGO_SRC}" alt="{SITE_NAME}"></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
		{MODULE_CONTENT}
    </div>
  </div>
</div>
{FILE "footer_only.tpl"}
<!-- END: main -->