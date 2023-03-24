<!-- BEGIN: main -->


</ul>

<!-- END: main -->

<!-- BEGIN: grid -->
<link rel="stylesheet" type="text/css"	href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/nvsystems/global.block_shops_multi_tabs.css" />
<link href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/owl.carousel.min.js"></script>
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/shops.js"></script>

<div class="panel panel-nvs-default">
	<div class="title-text text-center space-20">
                  <h2>{NVS_TITLE}</h2>
                  <p>Theo số liệu thống kê của Navigos Search, trong khi các ngành khác phải đối mặt với những khó khăn vì nhiều lý do khác nhau, thì các công ty IT tăng trưởng 25% nhu cầu tuyển dụng trong năm 2021. Đặc biệt là trong mảng thuê ngoài IT. Đồng thời, nhu cầu tìm kiếm công ty cung cấp các Dịch vụ IT thuê ngoài cũng tăng theo.

Cuối năm 2020 và đầu năm 2021, các doanh nghiệp chịu ảnh hưởng không nhỏ từ khủng hoảng Covid. Chính vì thế, việc cắt giảm nhân sự, giảm chi phí lương thưởng cho nhân viên được nhiều doanh nghiệp áp dụng để tối ưu chi phí nhất có thể.

Chi tiêu cho thuê ngoài dịch vụ IT tăng mạnh
Theo thống kê từ Gartner, chi tiêu cho thuê ngoài dịch vụ IT khu vực các nước mới nổi châu Á – Thái Bình Dương (ngoài Ấn Độ, Thái Lan, Indonesia và Malaysia) trong đó có Việt Nam tăng trưởng mạnh với tốc độ trung bình là 8,5% giai đoạn 2016-2022, đạt mức 1,6 tỷ USD năm 2022.</p>
               </div>
	<div class="panel-body">
		<div class="row">
			<div class="wraper" >
				<div class="tab-content">
				<!-- BEGIN: group_content -->
					<div id="block-news-groups-{BLOCK_INFO.catid}" class="tab-pane fade {BLOCK_INFO.active} in col-lg-24 col-md-24 margin-top-lg">
						<div class="owl-custom-nav"></div>
						<div class="widget-area news_carousel_{BLOCK_INFO.catid} owl-carousel owl-theme owl-loaded">
							
													<!-- BEGIN: loop -->
							
								
													<div class="wpb_column vc_column_container vc_col-sm-4">
														<div class="vc_column-inner">
															<div class="wpb_wrapper">
																<div class="ult_pricing_table_wrap ult_design_5  ult-cs-custom  ">
																	<div class="ult_pricing_table ult_price_table_ht" style="background:#ffffff;color:#575757;min-height:400px;">
																		<div id="price-table-wrap-8546" class="ult_pricing_heading" style="background:#f2f2f2;color:#36383a;">
																			<!-- BEGIN: img -->
																			<a href="{ROW.link}" title="{ROW.title}"><img src="{ROW.thumb}" style="width:{ROW.blockwidth};height:{ROW.blockheight};"  alt="{ROW.title}" class="thumbnail" /></a>
																			<!-- END: img -->
																			<h3 class="price-heading ult-responsive cust-headformat"  data-ultimate-target='#price-table-wrap-8546 .cust-headformat'  data-responsive-json-new='{"font-size":"","line-height":""}'  style="font-weight:normal;"><a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a></h3>
																			<h5  data-ultimate-target='#price-table-wrap-8546 .cust-subhead'  data-responsive-json-new='{"font-size":"","line-height":""}'  >{ROW.hometext}</h5>
																		</div>
																		<!--ult_pricing_heading-->
																		<div class="ult_price_body_block" style="background:#f2f2f2;color:#36383a;">
																			<div class="ult_price_body">
																				<div id="price-table-wrap-7391"  class="ult_price">
																					<span  data-ultimate-target='#price-table-wrap-7391 .ult_price_figure'  data-responsive-json-new='{"font-size":"","line-height":""}'  class="ult_price_figure ult-responsive" style="font-weight:normal;">
																						<!-- BEGIN: price -->
																						<p class="nvs_price">
																							<!-- BEGIN: discounts -->
																							<span class="nvs_money ">{PRICE.sale_format} {PRICE.unit}</span>
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
																					
																					</span>
																					<span  data-ultimate-target='#price-table-wrap-7391 .ult_price_term'  data-responsive-json-new='{"font-size":"","line-height":""}'  class="ult_price_term ult-responsive" style="font-weight:normal;"></span>
																				</div>
																			</div>
																		</div>
																		<!--ult_price_body_block-->
																		<div id="price-table-features-wrap-4421" class="ult_price_features ult-responsive"  data-ultimate-target='#price-table-features-wrap-4421'  data-responsive-json-new='{"font-size":"","line-height":""}'  style="font-weight:normal;">
																			<p>
																			<!-- BEGIN: group -->
																					<!-- BEGIN: items -->
																							<!-- BEGIN: loop -->
																								{GROUP.title} <br>
																							<!-- END: loop -->
																					<!-- END: items -->
																			<!-- END: group -->
																			</p>

																		</div>
																		<!--ult_price_features-->
																		<div id="price-table-button-wrap-2068" class="ult_price_link">
																			<!-- BEGIN: order -->
																			<a href="javascript:void(0)" id="{ROW.id}" title="{ROW.title}" onclick="cartorder(this, {GROUP_REQUIE}, '{ROW.link}')"><button type="button" class="btn btn-primary btn-xs">Báo giá tư vấn</button></a>
																			<!-- END: order -->
																			<!-- BEGIN: product_empty -->
																			<button class="btn btn-danger disabled btn-xs">{LANG.product_empty}</button>
																			<!-- END: product_empty -->

																			<!-- BEGIN: wishlist -->
																			<a href="javascript:void(0)" title="{ROW.title}" ><button type="button" onclick="wishlist({ROW.id}, this)" class="btn btn-primary btn-xs <!-- BEGIN: disabled -->disabled<!-- END: disabled -->">{LANG.wishlist}</button></a>
																			<!-- END: wishlist -->
																		
																		</div>
																		<!--ult_price_link-->
																		<div class="ult_clr"></div>
																	</div>
																	<!--pricing_table-->
																</div>
																<!--pricing_table_wrap-->
															</div>
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
						margin:25,
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
							items:3
								}
						}
					});	
					</script>
				<!-- END: group_content -->
				</div>
			</div>
		</div>
	</div>
</div>

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


	
						
						<div class="owl-stage-outer">
							<div class="owl-stage" style="transition: all 0.25s ease 0s">
								<div class="owl-item">
									<div class="items">
										<div class="inner">
											<div class="thumb-area">
												<div class="post-format"><i class="fa fa-text"></i></div>
												<div class="col-md-24 items item_{BLOCK_INFO.catid}">
												
													<p></p>
													<p></p>
													<!-- BEGIN: img -->
													<a href="{ROW.link}" title="{ROW.title}"><img src="{ROW.thumb}" style="width:{ROW.blockwidth};height:{ROW.blockheight};"  alt="{ROW.title}" class="thumbnail" /></a>
													<!-- END: img -->
													<div class="nvs_info_pro">
														<!-- BEGIN: news -->
														<span class="label nvs_label-success nvs_newday">{LANG.newday}</span>
														<!-- END: news -->
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
													
													
													<div class="clearfix">
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>