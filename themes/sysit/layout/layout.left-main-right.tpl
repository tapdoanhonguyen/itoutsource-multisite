<!-- BEGIN: main -->
{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}
<div class="row">
	[HEADER]
</div>
<div class="row">
    <div class="col-sm-12 col-md-13 col-sm-push-6 col-md-push-5">
		<div class="single-product-header">
			<div class="container">
				<!-- BEGIN: breadcrumbs -->
				<!-- Ẩn breadcrumb nếu thuộc vào category websosanh  -->
				<nav class="woocommerce-breadcrumb breadcrumbs uppercase">
				<a href="{THEME_SITE_HREF}">{LANG.Home}</a>
				<!-- BEGIN: loop -->
				<span class="divider">/</span>
				<a href="{BREADCRUMBS.link}">{BREADCRUMBS.title}</a> 
				<!-- END: loop -->
				</nav>	
				
				
				<!-- END: breadcrumbs -->
			
			
			
				
			</div>
		</div>
        [TOP]
        {MODULE_CONTENT}
    </div>
    <div class="col-sm-6 col-md-6 col-sm-push-6 col-md-push-5">
        [RIGHT]
    </div>
	<div class="col-sm-6 col-md-5 col-sm-pull-18 col-md-pull-19">
		[LEFT]
	</div>
</div>
<div class="row">
	[FOOTER]
</div>
{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}
<!-- END: main -->