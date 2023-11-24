<!-- BEGIN: submenu -->
<ul class="dropdown-menu" >
    <!-- BEGIN: loop -->
    <li<!-- BEGIN: submenu --> class="dropdown-submenu" <!-- END: submenu -->><div style=" width:200px;"><div style="height:150px; width:150px; margin-top: 20px; margin-bottom: 15px; margin-right: 25px; margin-left: 20px;"><a href="{SUBMENU.link}" title="{SUBMENU.note}"{SUBMENU.target}><!-- BEGIN: icon --><img src="{SUBMENU.icon}" alt="{SUBMENU.note}" />&nbsp;<!-- END: icon --></div>{SUBMENU.title_trim}</a><!-- BEGIN: item --> {SUB} <!-- END: item --></div></li>
    <!-- END: loop -->
    
</ul>


<!-- END: submenu -->

<!-- BEGIN: main -->
    <link rel="stylesheet" type="text/css" media="screen" href="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/css/superfish.css" />
<link rel="stylesheet" type="text/css" media="screen" href="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/css/superfish-navbar.css" />
<link rel="stylesheet" type="text/css" media="screen" href="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/css/superfish-vertical.css" />
<script	type="text/javascript" src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/superfish/hoverIntent.js"></script>
<script	type="text/javascript" src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/superfish/superfish.js"></script>
<script	type="text/javascript" src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/superfish/supersubs.js"></script>



    <div class="collapse navbar-collapse" id="menu-site-default">
        <ul class="nav  header-nav header-bottom-nav sf-navbar nav-left  nav-uppercase">
           
            <!-- BEGIN: top_menu -->
            <li {TOP_MENU.current} role="presentation"><a class="dropdown-toggle" {TOP_MENU.dropdown_data_toggle} href="{TOP_MENU.link}" role="button" aria-expanded="false" title="{TOP_MENU.note}"{TOP_MENU.target}>  {TOP_MENU.title_trim}<!-- BEGIN: has_sub --><i class="icon-angle-down"></i> 
                <!-- END: has_sub --></a> <!-- BEGIN: sub --> {SUB} <!-- END: sub --></li>
            
            <!-- END: top_menu -->
        </ul>
    </div>


<!-- END: main -->

<script type="text/javascript" data-show="after">
    $(function() {
        checkWidthMenu();
        $(window).resize(checkWidthMenu);
    });
</script>
    <ul class="nav navbar-nav">

     <li><a class="home" title="{LANG.Home}" href="{THEME_SITE_HREF}"><em class="fa fa-lg fa-home">&nbsp;</em><span class="visible-xs-inline-block"> {LANG.Home}</span></a></li>

     <strong class="caret">&nbsp;</strong>

     <style type="text/css">
	.style_nav {
		position: relative;
		background: url("{NV_BASE_SITEURL}themes/{BLOCK_THEME}/images/menu/nen.png") repeat-x;
		height: 60px;
		line-height: 32px;
		z-index: 990
	}
</style>