<!-- BEGIN: tree -->

			

			<div class="row" id="row-1088938387">


				<div id="col-1532574546" class="col medium-24 small-24 large-24">
							<div class="col-inner">
						
						


							<div class="product_taxonomies_menu ">
										<div class="product_taxonomies_menu-content container product_taxonomies_style_default  tab-content-inner">
								<ul class="categories-menu content-row mb-0">
								<li class="taxonomy-item"><a class="" href="{MENUTREE.link}" title="{MENUTREE.title}"><i class="{MENUTREE.class}"></i><span class="menu-title">{MENUTREE.title}</span></a></li>
								</ul>
								</div>
							</div>


				


					</div>
								</div>

				

				

			</div>






<!-- END: tree -->

<li>
	<a title="{MENUTREE.note}" href=""{MENUTREE.target}></a>
	<!-- BEGIN: tree_content -->
	<ul>
		{TREE_CONTENT}
	</ul>
	<!-- END: tree_content -->
</li>
<!-- BEGIN: main -->
<div id="main-menu" class="mobile-sidebar hm-mobile-menu no-scrollbar">



	<div class="sidebar-menu no-scrollbar ">

		
					<ul class="nav nav-sidebar nav-vertical " data-tab="1">
<!-- BEGIN: loopcat1 -->					
<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-{MENUID}">
<a title="{CAT1.note}" href="{CAT1.link}" {CAT1.target}><i class="{CAT1.html_class}" ></i> {CAT1.title}</a>
<svg fill="none" viewBox="0 0 24 24" class="sml-mobile" color="textPrimary" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
				<path d="M5 8.5L12 15.5L19 8.5" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
		<!-- BEGIN: cat2 -->
			<div class="sub-menu nav-dropdown">	
				<section class="section" id="section_453069330">
					<div class="section-content relative">
			{HTML_CONTENT}
					</div>

	
	</section>
			</div>
		<!-- END: cat2 -->

	
	</li>
<!-- END: loopcat1 -->
			</ul>
		
		
	</div>

	
</div>

<style>
svg.sml-mobile {
    margin-right: 15px;
    font-size: 25px;
	-webkit-transition: 0.2s; 
     transition: 0.2s; 
}
svg.sml-mobile.active{
	-webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
     transform: rotate(180deg); 
}
</style>
	
<style>
#section_453069330 {
  padding-top: 0px !important;
  padding-bottom: 0px !important;
}
#section_453069330 .ux-shape-divider--top svg {
  height: 150px;
  --divider-top-width: 100%;
}
#section_453069330 .ux-shape-divider--bottom svg {
  height: 150px;
  --divider-width: 100%;
}
</style>
<style>
#section_1381790905 {
  padding-top: 30px;
  padding-bottom: 30px;
}
#section_1381790905 .ux-shape-divider--top svg {
  height: 150px;
  --divider-top-width: 100%;
}
#section_1381790905 .ux-shape-divider--bottom svg {
  height: 150px;
  --divider-width: 100%;
}
</style>
<script type="text/javascript" data-show="after">
var svgsml = document.querySelectorAll("svg.sml-mobile");

	// Thêm sự kiện click cho từng dòng SVG
	svgsml.forEach(function(svgElement) {
		var clickEvent = new Event("click", {
			bubbles: true,
			cancelable: true
		});

		// Tự động kích hoạt sự kiện click cho từng dòng SVG
		svgElement.dispatchEvent(clickEvent);
		svgElement.addEventListener("click", function() {
			// Kiểm tra xem dòng SVG đã có lớp "active" chưa
			var parentElement = svgElement.parentElement;
			var nextElementSibling = parentElement.nextElementSibling
			console.log(parentElement.nextElementSibling);
			if (!svgElement.classList.contains("active")) {
				// Nếu chưa có, thêm lớp "active" vào trước lớp "css-500jnn"
				svgElement.classList.add("active");
				parentElement.classList.add("active");
				
				if (!nextElementSibling.classList.contains("show")) {
					nextElementSibling.classList.add("show");
				}else{
					nextElementSibling.classList.remove("show");
				}
			} else {
				// Nếu đã có, loại bỏ lớp "active" để trở về trạng thái ban đầu
				svgElement.classList.remove("active");
				parentElement.classList.remove("active");
				nextElementSibling.classList.remove("show");
				if (!nextElementSibling.classList.contains("hide")) {
					nextElementSibling.classList.add("hide");
				}
			}
		});
	});
</script>
<!-- END: main -->
<link rel="stylesheet" href="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/jquery/jquery.treeview.css" type="text/css"/>
<script src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/jquery/jquery.cookie.js" type="text/javascript"></script>
<script src="{NV_STATIC_URL}{NV_ASSETS_DIR}/js/jquery/jquery.treeview.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#navigation{MENUID}").treeview({
			collapsed : true,
			unique : true,
			persist : "location"
		});
	});
</script>
<style type="text/css">
	#navigation a {
		background-color: transparent !important
	}

	#navigation .current, #navigation .current a {
		font-weight: bold
	}

	#navigation .current ul a {
		font-weight: normal
	}
</style>
<ul id="navigation{MENUID}">
	<!-- BEGIN: loopcat1 -->
	<li {CAT1.class}>
		<a title="{CAT1.note}" href="{CAT1.link}"{CAT1.target}>{CAT1.title}</a>
		<!-- BEGIN: cat2 -->
		<ul>
			{HTML_CONTENT}
		</ul>
		<!-- END: cat2 -->
	</li>
	<!-- END: loopcat1 -->
</ul>
<div class="clear"></div>