<!-- BEGIN: main -->

<ul class="nav nav-tabs">
<!-- BEGIN: group_info -->
  <li class="{BLOCK_INFO.active}"><a data-toggle="tab" href="#block-news-groups-{BLOCK_INFO.catid}">{BLOCK_INFO.title}</a></li>
<!-- END: group_info -->
</ul>
<div class="tab-content">
<!-- BEGIN: group_content -->
	<ul id="block-news-groups-{BLOCK_INFO.catid}" class="tab-pane fade {BLOCK_INFO.active} in list-group">
		<!-- BEGIN: loop -->
		<li class="list-group-item">
			<!-- BEGIN: img -->
			<a href="{ROW.link}" title="{ROW.title}"><img src="{ROW.thumb}" alt="{ROW.title}" width="{ROW.blockwidth}" class="img-thumbnail"/></a>
			<!-- END: img -->
			<a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a>
		</li>
		<!-- END: loop -->
	</ul>
<!-- END: group_content -->
</div>
<!-- END: main -->

<!-- BEGIN: grid -->
<script src='{NV_BASE_SITEURL}themes/{TEMPLATE}/js/shops.js' type="text/javascript"></script>

<section class="section" id="section_1895702934">
	<div class="bg section-bg fill bg-fill  bg-loaded">
	</div>
	<div class="section-content relative">
		<div class="row" id="row-310322315">
			<div id="col-1345971263" class="col small-12 large-12">
				<div class="col-inner">
					<div class="box  container has-hover   has-hover box-text-bottom">

						<div class="hm_heading_block text-center ">
							<div class="hm_heading_block-inner">
								<span class="heading-block-icon"><i class="{NVS_CLASS}"></i></span>
								<div class="container section-title-container" style="margin-top:0px;">
									<h3 class="section-title section-title-normal"><b></b>
										<span class="section-title-main" style="font-size:undefined%;">{NVS_TITLE}</span><b></b>
									</h3>
								</div>
								<div class="ux-menu stack stack-col justify-start ux-menu--divider-solid">
									<!-- BEGIN: group_info -->
									<div class="ux-menu-link flex menu-item">
										<a class="ux-menu-link__link flex" href="{BLOCK_INFO.link}">
											<span class="ux-menu-link__text">
												{BLOCK_INFO.title}	
											</span>
										</a>
									</div>

									<!-- END: group_info -->
								</div>
							</div>
						</div>
					</div>
					<!-- BEGIN: group_content -->
					<div class="row large-columns-5 medium-columns-3 small-columns-2 row-small">

						<!-- BEGIN: loop -->
						<div class="product-small col has-hover cactus_lgv_grid cactus_lgv_list_grid product type-product post-36010 status-publish first instock product_cat-may-in-2-mat-da-nang product_cat-may-in-2-mat-den-trang product_cat-may-in-2-mat-wifi product_cat-may-in-da-nang product_cat-may-in-da-nang-hp-may-in-da-nang product_cat-may-in-den-trang product_cat-may-in-laser-chinh-hang product_cat-may-in-pantum product_cat-may-in-van-phong product_cat-may-in-van-phong-da-nang product_cat-may-in-van-phong-2-mat product_cat-may-in-wifi-pro product_tag-may-in-2-mat product_tag-may-in-da-nang product_tag-may-in-pantum product_tag-may-in-van-phong has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
							<div class="col-inner">
								<!-- BEGIN: discounts -->

								<div class="badge-container absolute left top z-1">
									<div class="callout badge badge-circle">
										<div class="badge-inner secondary on-sale">
											<span class="onsale">-{PRICE.discount_percent}{PRICE.discount_unit}</span>
										</div>
									</div>
								</div>
								<!-- END: discounts -->
								<div class="product-small box ">
									<!-- BEGIN: img -->
									<div class="box-image">
										<div class="image-none">
											<a href="{ROW.link}" aria-label="{ROW.title}">
												<img width="{ROW.blockwidth}" height="{ROW.blockheight}" src="{ROW.thumb}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="{ROW.thumb} 247w, {ROW.thumb} 300w, {ROW.thumb} 150w, {ROW.thumb} 510w, {ROW.thumb} 100w, {ROW.thumb} 680w" sizes="(max-width: 247px) 100vw, 247px">			
											</a>
										</div>
									</div>
									<!-- END: img -->
									<div class="box-text box-text-products">
										<div class="product-main-wrapper">
											<div class="title-wrapper" style="height: 50.375px;">
												<p class="name product-title woocommerce-loop-product__title">
													<a href="{ROW.link}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{ROW.title}</a>
												</p>
											</div>
											<div class="product-bottom-wrapper" style="height: 137px;">
												<!-- BEGIN: price -->												
												<div class="price-wrapper">
													<span class="product-price">
														<!-- BEGIN: discounts -->										
														<div class="was-now-save">
															<div class="was-price">
																<div class="old-price">
																	<span class="woocommerce-Price-amount amount"><bdi>{PRICE.price_format}<span class="woocommerce-Price-currencySymbol">{PRICE.unit}</span></bdi></span>
																</div>
															</div>
															<div class="now-price">
																<span class="woocommerce-Price-amount amount"><bdi>{PRICE.sale_format}<span class="woocommerce-Price-currencySymbol">{PRICE.unit}</span></bdi></span>
															</div>
														</div>
														<!-- END: discounts -->
														<!-- BEGIN: no_discounts -->
														<div class="was-now-save">
															<div class="was-price">
															</div>
															<div class="now-price">
																<span class="woocommerce-Price-amount amount"><bdi>{PRICE.price_format}<span class="woocommerce-Price-currencySymbol">{PRICE.unit}</span></bdi></span>
															</div>
														</div>
														<!-- END: no_discounts -->
													</span>
												</div>
												<!-- END: price -->
												<div class="product-loop-action">
											
													<!-- BEGIN: order -->

													<div class="add-to-cart-button">

														<a href="javascript:void(0)" onclick="cartorder(this, {GROUP_REQUIE}, '{ROW.link}')" data-quantity="1" class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-outline" data-product_id="{ROW.id}" data-product_sku="{ROW.title}" aria-label="Thêm “{ROW.title}” vào giỏ hàng" rel="nofollow"><i class="hoangminh-icon hoangminh-icon-shopping-cart2"></i> {LANG.add_product}</a>
													</div>	
													<!-- END: order -->
													<!-- BEGIN: product_empty -->
													<button class="btn btn-danger disabled btn-xs">{LANG.product_empty}</button>
													<!-- END: product_empty -->

													<!-- BEGIN: wishlist -->
													<div class="add-to-wishlist-button">
													<a href="javascript:void(0)" title="{ROW.title}" ><button type="button" onclick="wishlist({ROW.id}, this)" class="btn btn-primary btn-xs <!-- BEGIN: disabled -->disabled<!-- END: disabled -->">{LANG.wishlist}</button></a>
													</div>
													<!-- END: wishlist -->	
													

												</div>
											</div>
										</div>
										<div class="product-list-wrapper">
											<div class="short_description">
											</div>
										</div>	
									</div>
								</div>
								<span class="gtm4wp_productdata" style="display:none; visibility:hidden;" data-gtm4wp_product_id="36010" data-gtm4wp_product_name="Máy in đa chức năng Pantum BM5100ADN" data-gtm4wp_product_price="7890000" data-gtm4wp_product_cat="Máy In Laser" data-gtm4wp_product_url="{ROW.link}" data-gtm4wp_product_listposition="21" data-gtm4wp_productlist_name="General Product List" data-gtm4wp_product_stocklevel="" data-gtm4wp_product_brand=""></span>	
							</div>
						</div>

						<!-- END: loop -->

					</div>
					<!-- END: group_content -->

				</div>
				<div id="col-2070918120" class="col small-12 large-12">
					<div class="col-inner text-center">
						<a href="{cat_link_block}" target="_self" class="button primary" style="border-radius:10px;">
							<span>Xem thêm</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<style>
	#section_1895702934 {
	padding-top: 30px;
	padding-bottom: 30px;
	}
	#section_1895702934 .ux-shape-divider--top svg {
	height: 150px;
	--divider-top-width: 100%;
	}
	#section_1895702934 .ux-shape-divider--bottom svg {
	height: 150px;
	--divider-width: 100%;
	}
	</style>
</section>


<div class="modal fade" id="idmodals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">{LANG.add_product}</h4>
			</div>
			<div class="modal-body">
				<em class="fa fa-spinner fa-spin">&nbsp;</em>
			</div>
		</div>
	</div>
</div>


<!-- END: grid -->

<!-- BEGIN: group_content -->
				<div id="block-news-groups-{BLOCK_INFO.catid}" class="tab-pane fade {BLOCK_INFO.active} in col-lg-24 col-md-24 margin-top-lg">
					<div class="owl-custom-nav"></div>
					<div class="widget-area news_carousel_{BLOCK_INFO.catid} owl-carousel owl-theme owl-loaded">
						
						<!-- BEGIN: loop -->
						<div class="owl-stage-outer">
							<div class="owl-stage" style="transition: all 0.25s ease 0s">
								<div class="owl-item">
									<div class="items">
										<div class="inner">
											<div class="thumb-area">
												<div class="post-format"><i class="fa fa-text"></i></div>
												<div class="col-md-24 items item_{BLOCK_INFO.catid}">
													<!-- BEGIN: img -->
													<a href="{ROW.link}" title="{ROW.title}"><img src="{ROW.thumb}" style="width:{ROW.blockwidth}px;height:{ROW.blockheight}px;"  alt="{ROW.title}" class="thumbnail" /></a>
													<!-- END: img -->
													<div class="nvs_info_pro">
														<!-- BEGIN: new -->
														<span class="label nvs_label-success nvs_newday">{LANG.newday}</span>
														<!-- END: new -->
														<!-- BEGIN: discounts -->
														<span class="label nvs_label-danger">-{PRICE.discount_percent}{PRICE.discount_unit}</span>
														<!-- END: discounts -->
														<!-- BEGIN: point -->
														<span class="label label-info" title="{point_note}">+{point}</span>
														<!-- END: point -->
														<!-- BEGIN: gift -->
														<span class="label label-success">+<em class="fa fa-gift fa-lg">&nbsp;</em></span>
														<!-- END: gift -->
													</div>
													<!-- BEGIN: product_code -->
													<p class="label label-default">{ROW.product_code}</p>
													<!-- END: product_code -->
													<!-- BEGIN: price -->
													<p class="nvs_price">
														<!-- BEGIN: discounts -->
														<span class="nvs_money show">{PRICE.sale_format} {PRICE.unit}</span>
														<span class="nvs_discounts_money">{PRICE.price_format} {PRICE.unit}</span> 
														<!-- END: discounts -->

														<!-- BEGIN: no_discounts -->
														<span class="nvs_money">{PRICE.price_format} {PRICE.unit}</span> 
														<!-- END: no_discounts -->
													</p>
													<!-- END: price -->
													<!-- BEGIN: contact -->
													<span class="nvs_money">{LANG.price_contact}</span>
													<!-- END: contact -->
													<p><a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a></p>
													<div class="clearfix">
														<!-- BEGIN: order -->
														<a href="javascript:void(0)" id="{ROW.id}" title="{ROW.title}" onclick="cartorder(this, {GROUP_REQUIE}, '{ROW.link}')"><button type="button" class="btn btn-primary btn-xs">{LANG.add_product}</button></a>
														<!-- END: order -->
														<!-- BEGIN: product_empty -->
														<button class="btn btn-danger disabled btn-xs">{LANG.product_empty}</button>
														<!-- END: product_empty -->

														<!-- BEGIN: wishlist -->
														<a href="javascript:void(0)" title="{ROW.title}" ><button type="button" onclick="wishlist({ROW.id}, this)" class="btn btn-primary btn-xs <!-- BEGIN: disabled -->disabled<!-- END: disabled -->">{LANG.wishlist}</button></a>
														<!-- END: wishlist -->
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END: loop -->
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
						items:2
							},
							1000:{
						items:4
							}
					}
				});	
				</script>
			<!-- END: group_content -->