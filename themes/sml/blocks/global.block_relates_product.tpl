<!-- BEGIN: main -->
<div class="title-text text-center">
                  <h2>{BLOCK_TITLE}</h2>
                  <p>{GIOITHIEU}</p>
               </div>
               <div class="owl-carousel" data-nav="true" data-margin="15" data-lg-items="4" data-md-items="4"
                  data-height="false" data-xs-items="3" data-xss-items="2" data-sm-items="3">
				   <!-- BEGIN: loop -->
                  <div class="product-box  ">
                     <div class="product-thumbnail">
                        <a href="{link}" title="{title}" class="image_responsive">
                        <img class="img-responsive center-block " src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg"  data-lazyload="{src_img}" alt="{title}" />
                        </a>
                     </div>
                     <div class="product-info a-left">
                        <h3 class="product-name text2line"><a href="{link}" title="{title}">{title}</a></h3>
                        <div class="price-box clearfix">
                           <div class="special-price">
                              <!-- BEGIN: price -->
						      <p class="price">
		                       <!-- BEGIN: discounts -->
		                       <span class="money">{PRICE.sale_format} {PRICE.unit}</span>
		                       <span class="discounts_money">{PRICE.price_format} {PRICE.unit}</span>
		                       <!-- END: discounts -->
							   <!-- BEGIN: no_discounts -->
							   <span class="money">{PRICE.price_format} {PRICE.unit}</span>
							   <!-- END: no_discounts -->
						      </p>
						      <!-- END: price -->
		                      <!-- BEGIN: contact -->
		                      <p class="price"><span class="money">{LANG.price_contact}</span></p>
		                      <!-- END: contact -->
                           </div>
                        </div>
                     </div>
                  </div>
				  <!-- END: loop -->         
               </div>
<!-- END: main -->