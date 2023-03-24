<!-- BEGIN: main -->

<link rel="stylesheet" type="text/css"	href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/nvsystems/global.block_shops_multi_tabs.css" />
<link href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/owl.carousel.min.js"></script>
<div class="title-text text-center">
                  <h2>{BLOCK_TITLE}</h2>
               </div>
			<div id="block-news-groups-{BLOCK_INFO.catid}" class="tab-pane fade {BLOCK_INFO.active} in col-lg-24 col-md-24 margin-top-lg">
					<div class="owl-custom-nav"></div>
					<div class="widget-area news_carousel_{BLOCK_INFO.catid} owl-carousel owl-theme owl-loaded">
						<!-- BEGIN: loop -->
					  <div class="item text-center">
						 <div class="avatar">
							<picture>
							   <source media="(max-height: 200px)" srcset="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-lazyload3="{ROW.image}">
							   <img class="rounded-circle-2 img-responsive basic center-block" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-src="{ROW.image}" alt="{ROW.title}" />
							</picture>
						 </div>
						 <div class="text">
							<h3>{ROW.title}</h3>
							<h4 class="position">{ROW.link}</h4>
							<p>{ROW.description}</p>
						 </div>
					  </div>
					 <!-- END: loop -->
					 </div>
					</div>
					
				</div>
				<script>
				$('.news_carousel_{BLOCK_INFO.catid}').owlCarousel({
						nav: true,
						navText: [ '', '' ],
						navContainer: '.owl-custom-nav',
						navClass: [ 'owl-prev', 'owl-next' ],	
					loop:true,
					margin:10,
					dots: false,
					autoplay: true,
					responsive:{
							0:{
						items:1
							},
							575:{
						items:1
							},
							1000:{
						items:1
							}
					}
				});	
				</script>
<!-- END: main -->

