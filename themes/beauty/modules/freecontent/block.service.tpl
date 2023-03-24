 <!-- BEGIN: main -->
 
	  <link href="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/slick/slick.css" rel="stylesheet" type="text/css" />
	  <script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/slick/slick.min.js"></script>
	<div class="" data-lazyload2="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/bgmenu.png" style='background-image: url("{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg"); background-position: center bottom; background-repeat: inherit; '>
         <div class="container pd-tb-50 space-20" > 
			<div class="dich-vu">
	 
				<div class="vnt-affix-neo vnt-service lazyloading showlazy"  id="afix3">
					<div class="wrapper">
						<div class="blHoa">
							<div class="wrap" style='background-image: url("{NV_BASE_SITEURL}themes/{TEMPLATE}/images/sml_hoa.png");'>
								<!-- BEGIN: loop -->
								<div class="service v{ROW.nsort} {ROW.ractive}">
									<div class="service_wrap"><span>{ROW.title}</span></div>
								</div>
								<!-- END: loop -->
							</div>
						</div>
						<div class="blSlide">
							<div id="blSlide" >
								<!-- BEGIN: loop1 -->
								<div class="item" >
									<div class="name">{TITLE_PROFE}</div>
									<p>{GIOITHIEU}</p>
									<div class="jo">{ROW.title}</div>
									<div>
										{ROW.description}
									</div>
								</div>
								<!-- END: loop1 -->
							</div>
						</div>
					</div>
					<div class="clear"></div>
				
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>	 
	 <!-- END: main -->
	 
	 <img alt="icon phattrien" height="50" src="{ROW.image}" width="50">