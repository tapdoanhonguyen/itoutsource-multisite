<!-- BEGIN: tree -->
<li>
	<!-- BEGIN: icon -->
	<img src="{MENUTREE.icon}" alt="{MENUTREE.note}" />&nbsp;
	<!-- END: icon -->
	<a title="{MENUTREE.note}" href="{MENUTREE.link}" {MENUTREE.target}>{MENUTREE.title_trim}</a>
	<!-- BEGIN: tree_content -->
	<ul>
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- END: tree -->
<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" media="screen" href="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/css/slimmenu.css" />
<ul class="nav nav-left medium-nav-center nav-small  nav-divided">
<!-- BEGIN: loopcat1 -->
<li id="menu-item-{CAT1.cid}" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2279 menu-item-design-default">
	<a href="{CAT1.link}" class="nav-top-link">
		<span class="hoangminh-menu-icon"> 
			<i class="hoangminh-icons menu-icon on {CAT1.class}" style=" font-size: 22px; vertical-align: top">
			</i> 
			</span> 
		{CAT1.title_trim}
	</a>
</li>
<!-- END: loopcat1 -->
</ul>
<script	type="text/javascript" src="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/jquery.slimmenu.js"></script>
<script src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript">
	$('ul.slimmenu').slimmenu({
	    resizeWidth: (theme_responsive == '1') ? 768 : 0,
		collapserTitle: '',
		easingEffect:'easeInOutQuint',
		animSpeed: 'medium',
		indentChildren: true,
		childrenIndenter: '&nbsp;&nbsp; '
	});
</script>
<!-- END: main -->

<li id="menu-item-2873" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2873 menu-item-design-default"><a href="https://smartlineco.com/vi/news/" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-newspaper" style=" font-size: 22px; 
vertical-align: top"></i> </span> Tin tức</a></li>
<li id="menu-item-20615" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20615 menu-item-design-default"><a href="https://smartlineco.com/vi/siteterms/chinh-sach-bao-hanh.html" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-warranty" style=" font-size: 22px; 
vertical-align: top"></i> </span> Chính sách bảo hành</a></li>
<li id="menu-item-29342" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29342 menu-item-design-default"><a href="https://smartlineco.com/vi/siteterms/chinh-sach-van-chuyen.html" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-payment-method" style=" font-size: 22px; 
vertical-align: top"></i> </span> Chính sách vận chuyển</a></li>
<li id="menu-item-13783" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13783 menu-item-design-default"><a href="https://smartlineco.com/vi/siteterms/phuong-thuc-thanh-toan.html" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-bill" style=" font-size: 22px; 
vertical-align: top"></i> </span> Phương thức thanh toán</a></li>


<ul class="slimmenu">
	<li>
		<a title="{LANG.Home}" href="{THEME_SITE_HREF}"><em class="fa fa-lg fa-home">&nbsp;</em> <span class="hidden-sm"> {LANG.Home} </span></a>
	</li>
	
	<li >
		<!-- BEGIN: icon -->
        <img src="{CAT1.icon}" alt="{CAT1.note}" />&nbsp;
        <!-- END: icon -->
		<a title="{CAT1.note}" href="{CAT1.link}" {CAT1.target}>{CAT1.title_trim}</a>
		<!-- BEGIN: cat2 -->
			<ul>
				{HTML_CONTENT}
			</ul>
		<!-- END: cat2 -->
	</li>
	
</ul>