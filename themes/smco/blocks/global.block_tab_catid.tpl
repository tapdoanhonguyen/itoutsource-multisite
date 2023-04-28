<!-- BEGIN: main -->
<div class="col-product-wrap">
                  <div class="e-tabs2 not-dqtab ajax-tab-1"  data-section="ajax-tab-1">
                     <div class="content">
                        <div class="module-title">
						   <div class="wraper">
                           <div class="container">
                              <div class="tabs-title-ajax">
                                 <div class="title-desktop">
                                    <h2>{BLOCK_TITLE}</h2>
                                    <ul class="tabs-title clearfix" style="margin:0;">
									<!-- BEGIN: group_info -->
                                      <li class="tab-link {BLOCK_INFO.active}">
                                       <span><a data-toggle="tab" href="#tab-{BLOCK_INFO.catid}">{BLOCK_INFO.title}</a></span>
                                      </li>
								     <!-- END: group_info -->
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
						</div>
						<div class="wraper">
                        <div class="container">
                           <div class="row">
						   <div class="tab-content row">
						   <!-- BEGIN: loop -->
                              <div id="tab-{BLOCK_INFO.catid}" class="tab-pane tab-content {BLOCK_INFO.active}">
                                 <div class="owl_product_ owl-carousel"  data-nav="true" data-margin="0" data-lg-items="5" data-md-items="4" data-height="false" data-xs-items="2" data-xss-items="2" data-sm-items="3">
                                    <!-- BEGIN: loopcontent -->
									<div class="item">
                                       <div class="product-box product-item-main">
                                          <div class="details">
                                              <!-- BEGIN: discounts --><div class="sale-flash">- {PRICE.discount_percent}{PRICE.discount_unit} </div><!-- END: discounts -->
                                             <div class="product-thumbnail">
                                                <a class="image_thumb" href="{LOOP.link}" title="{LOOP.title}">
                                                <img src="{LOOP.homeimgthumb}" alt="{ROW.title}" />
                                                </a>
                                             </div>
                                             <div class="product-info product-bottom">
                                                <h3 class="product-name"><a href="{LOOP.link}" title="{LOOP.title}">{LOOP.title0}</a></h3>
                                                <div class="product-item-price price-box">
												    <!-- BEGIN: price -->
													<p class="nvs_price">
														<!-- BEGIN: discounts -->
														<strong class="money">{PRICE.sale_format} {PRICE.unit}</strong>
														<del class="light-font discounts_money ">{PRICE.price_format} {PRICE.unit}</del> 
														<!-- END: discounts -->

														<!-- BEGIN: no_discounts -->
														<span class="money">{PRICE.price_format} {PRICE.unit}</span> 
														<!-- END: no_discounts -->
													</p>
													<!-- END: price -->
													<!-- BEGIN: contact -->
													<span class="money">{LANG.price_contact}</span>
													<!-- END: contact -->
                                                </div>
                                             </div>
                                          </div>
                                          <div class="product-action clearfix hidden-xs">

                                             <div class="variants form-nut-grid">
                                                <div class="group_action">
                                                   <a href="{LOOP.link}" title="{LOOP.title}">
                                                   <button class="btn-buy btn-cart btn btn-gray left-to add_to_cart" type="button">
                                                   {LANG.product_detail}
                                                   </button>
												   </a>
                                                </div>
                                             </div>

                                          </div>
                                       </div>
                                    </div>
                                    <!-- END: loopcontent --> 
                                 </div>
                                 <p class="view-more-product">
                                    <a href="{LOOP.linkcat}">Xem tất cả</a>
                                 </p>
                              </div>
                              <!-- END: loop -->
                           </div>
						   </div>
						   </div>
                        </div>
                     </div>
                  </div>
               </div>
<!-- END: main -->