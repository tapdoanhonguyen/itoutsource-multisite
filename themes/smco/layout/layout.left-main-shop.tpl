<!-- BEGIN: main -->
{FILE "header_shop_only.tpl"}
{FILE "header_extended.tpl"}
[HEADER]
<div class="row category-page-row">
<div class="col large-2 product-list-sidebar hide-for-medium ">
[LEFT]
</div>
<div class="col large-10 product-list-main" >
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
[BOTTOM]
</div>
</div>
[FOOTER]
{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}

<!-- END: main -->

{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}
<div class="row">
    [HEADER]
</div>
<div class="row">
    <div class="col-md-24">
        [TOP]
        
        [BOTTOM]
    </div>
</div>
<div class="row">
    [FOOTER]
</div>
