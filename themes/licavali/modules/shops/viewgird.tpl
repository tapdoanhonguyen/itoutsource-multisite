<!-- BEGIN: main -->
   
        <div class="products wrapper products-grid products-grid-3-columns">
        <ol class="products list items product-items">
			<!-- BEGIN: loop -->
                <li class="item product product-item">
										
                    <div class="product-item-info" data-container="product-grid">
					<!-- BEGIN: discounts -->
                        <div class="product-labels">
                            <div class="item-label discount-label">
                                <span>Giảm</span>
                                <span class="discount-percent">35%</span>
                            </div>
                        </div>
						<!-- END: discounts -->
                        <a href="{ROW.link_pro}" class="product photo product-item-photo" tabindex="-1">
                            
<span class="product-image-container" style="width:546px;">
    <span class="product-image-wrapper " style="padding-bottom: 132.96703296703%;">
        <img loading="lazy" class="product-image-photo" src="{ROW.homeimgthumb}" max-width="546" max-height="726" alt="">
			<!-- BEGIN: new -->
            <div class="product-label-items">
				<div class="product-label-container image-label top-left" style="width:25%;">
                <span class="label-image">
                    <img style="height: 100%; width: 100%" src="https://exacdn.acfc.com.vn/media/label/tmp/image/Tag0323_NA_2.png">
                </span>
            </div>
			
           </div>
		   <!-- END: new -->
		 </span>
		 </span> 
		 </a>
                        <div class="product details product-item-details">
                                                        <strong class="product name product-item-name">
                                <span class="product-item-brand-link">
                                     <!-- BEGIN: brand -->  {BRAND.title} <!-- END: brand -->                            </span>
                                <a class="product-item-link" href="{ROW.link_pro}">
                                    {ROW.title}</a>
                            </strong>
                            <div class="price-box price-final_price" data-role="priceBox" data-product-id="606148" data-price-box="product-id-606148"><span class="normal-price">
    
<!-- BEGIN: price -->
<!-- BEGIN: no_discounts -->
<span class="price-container price-final_price tax weee">
    <span id="product-price-606148" data-price-amount="{PRICE.price_format} {PRICE.unit}" data-price-type="finalPrice" class="price-wrapper "><span class="price">
		
		<p class="price">
			
			<span class="money"></span> <span class="discounts_money"></span>
			
			
			<span class="money">{PRICE.price_format} {PRICE.unit}</span>
			
		</p>
		
	
	</span></span>
        </span>
		<!-- END: no_discounts -->
</span>
<!-- BEGIN: discounts -->
    <span class="old-price sly-old-price">
        

<span class="price-container price-final_price tax weee">
    <span id="old-price-606148" data-price-amount="{PRICE.sale_format} {PRICE.unit}" data-price-type="oldPrice" class="price-wrapper "><span class="price">{PRICE.sale_format} {PRICE.unit}</span></span>
        </span>
    </span>
<!-- END: discounts -->
<!-- END: price -->
</div>                                                    </div>
                    </div>
                </li>
                            
			<!-- END: loop -->
                    </ol>
    <div id="amasty-shopby-overlay"><div class="loader"></div></div></div>
 







<!-- END: main -->


<div class="row viewgrid shops-viewgrid shops-viewgrid-{MODULE_NAME}">
    <!-- BEGIN: loops -->
    <div class="col-sm-12 col-md-{NUM}">
        <div class="thumbnail">
            <div style="height: {HEIGHT}px" class="item-image">
                <a href="{ROW.link_pro}" title="{ROW.title}" rel="dofollow"><img src="{ROW.homeimgthumb}" alt="{ROW.title}"
                <!-- BEGIN: tooltip_js -->data-content='{ROW.hometext}' data-rel="tooltip" data-img="{ROW.homeimgthumb}"<!-- END: tooltip_js -->class="img-thumbnail" style="max-height:{HEIGHT}px;max-width:{WIDTH}px;"></a>
            </div>
            <div class="info_pro">
                <!-- BEGIN: new -->
                <span class="label label-success newday">{LANG.newday}</span>
                <!-- END: new -->
                <!-- BEGIN: discounts -->
                <span class="label label-danger">-{PRICE.discount_percent}{PRICE.discount_unit}</span>
                <!-- END: discounts -->
                <!-- BEGIN: point -->
                <span class="label label-info" title="{point_note}">+{point}</span>
                <!-- END: point -->
                <!-- BEGIN: gift -->
                <span class="label label-success">+<em class="fa fa-gift fa-lg">&nbsp;</em></span>
                <!-- END: gift -->
            </div>
            <div class="caption text-center">
                <h3>
                    <a href="{ROW.link_pro}" title="{ROW.title}" rel="dofollow">{ROW.title}</a>
                </h3>
                <!-- BEGIN: product_code -->
                <p class="label label-default">{PRODUCT_CODE}</p>
                <!-- END: product_code -->
                <!-- BEGIN: adminlink -->
                <p>{ADMINLINK}</p>
                <!-- END: adminlink -->
                <!-- BEGIN: price -->
                <p class="price">
                    <!-- BEGIN: discounts -->
                    <span class="money">{PRICE.sale_format} {PRICE.unit}</span> <span class="discounts_money">{PRICE.price_format} {PRICE.unit}</span>
                    <!-- END: discounts -->
                    <!-- BEGIN: no_discounts -->
                    <span class="money">{PRICE.price_format} {PRICE.unit}</span>
                    <!-- END: no_discounts -->
                </p>
                <!-- END: price -->
                <!-- BEGIN: contact -->
                <p class="price">
                    {LANG.detail_pro_price}: <span class="money">{LANG.price_contact}</span>
                </p>
                <!-- END: contact -->
                <!-- BEGIN: compare -->
                <p>
                    <input type="checkbox" value="{ROW.id}" {ch} onclick="nv_compare({ROW.id});" id="compare_{ROW.id}" /><a href="#" onclick="nv_compare_click();">&nbsp;{LANG.compare}</a>
                </p>
                <!-- END: compare -->
                <div class="clearfix">
                    <!-- BEGIN: order -->
                    <a href="javascript:void(0)" id="{ROW.id}" title="{ROW.title}" onclick="cartorder(this, {GROUP_REQUIE}, '{ROW.link_pro}'); return !1;"><button type="button" class="btn btn-primary btn-xs">{LANG.add_product}</button></a>
                    <!-- END: order -->
                    <!-- BEGIN: product_empty -->
                    <button class="btn btn-danger disabled btn-xs">{LANG.product_empty}</button>
                    <!-- END: product_empty -->
                    <!-- BEGIN: wishlist -->
                    <a href="javascript:void(0)" title="{ROW.title}"><button type="button" onclick="wishlist({ROW.id}, this)" class="btn btn-primary btn-xs <!-- BEGIN: disabled -->disabled<!-- END: disabled -->">{LANG.wishlist}</button></a>
                    <!-- END: wishlist -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: loops -->
    <!-- BEGIN: page -->
    <div class="text-center w-100 gen-page">{PAGE}</div>
    <!-- END: page -->
</div>
<!-- BEGIN: tooltip_js -->
<script type="text/javascript" data-show="after">
    $(document).ready(function() {
        $("[data-rel='tooltip']").tooltip({
            placement : "bottom",
            html : true,
            title : function() {
                return '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';
            }
        });
    });
</script>
<!-- END: tooltip_js -->