<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_STATIC_URL}themes/default/images/{MODULE_FILE}/jquery.ez-plus.js"></script>

<main id="maincontent" class="page-main">
<a id="contentarea" tabindex="-1"></a>
<div class="page messages">
<div data-placeholder="messages">
</div>
<div data-bind="scope: 'messages'">
    <!-- ko if: cookieMessages && cookieMessages.length > 0 --><!-- /ko -->

    <!-- ko if: messages().messages && messages().messages.length > 0 --><!-- /ko -->
</div>

</div>
<div class="columns">
<div class="column main-detail">                                                                                                                                                                                                                                                                                                                                                                    
<div class="product-info-main">
<div class="page-title-wrapper product">
    <h1 class="page-title">
        <span class="brand-title" data-ui-id="page-title-wrapper">
		<!-- BEGIN: custom_data -->
                        {CUSTOM_DATA}
         <!-- END: custom_data -->
		
		</span>
		<span class="base" data-ui-id="page-title-wrapper" itemprop="name">{TITLE}</span>    </h1>
    </div>
<div class="product-info-price">
<!-- BEGIN: product_code -->
<div class="top-product-info-price">
<div class="product-info-stock-sku">

                        
<div class="product attribute sku">
            <strong class="type">{LANG.product_code}</strong>
        <div class="value" itemprop="sku">{PRODUCT_CODE}</div>
</div>

</div>
</div>
<!-- END: product_code -->
<!-- BEGIN: price -->
<div class="price-box price-final_price" data-role="priceBox" data-product-id="595280" data-price-box="product-id-595280">
<span class="normal-price">
    

<span class="price-container price-final_price tax weee" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
    <span id="product-price-595280" data-price-amount="{PRICE.price}" data-price-type="finalPrice" class="price-wrapper "><span class="price">{PRICE.price_format} {PRICE.unit}</span></span>
                <meta itemprop="price" content="{PRICE.price}">
        <meta itemprop="priceCurrency" content="{PRICE.unit}">
    </span>
</span>

</div>
<!-- END: price -->
</div>

<ul class="product-info">
                        
                        
                       
                        
                       
                        <!-- BEGIN: group_detail -->
                        <li class="info-groups">
                            <!-- BEGIN: loop --> <!-- BEGIN: maintitle -->
                            <div class="pull-left">
                                <strong>{MAINTITLE}:</strong>&nbsp;
                            </div> <!-- END: maintitle --> <!-- BEGIN: subtitle -->
                            <ul class="pull-left list-inline" style="padding: 0 10px 0">
                                <!-- BEGIN: loop -->
                                <li>{SUBTITLE.title}</li>
                                <!-- END: loop -->
                            </ul>
                            <div class="clear"></div> <!-- END: subtitle --> <!-- END: loop -->
                        </li>
                        <!-- END: group_detail -->
                        
                        <!-- BEGIN: promotional -->
                        <li class="info-promotion"><strong>{LANG.detail_promotional}:</strong> {promotional}</li>
                        <!-- END: promotional -->
                        <!-- BEGIN: warranty -->
                        <li class="info-warranty"><strong>{LANG.detail_warranty}:</strong> {warranty}</li>
                        <!-- END: warranty -->
                    </ul>
                    <hr />
                    <!-- BEGIN: gift -->
                    <div class="alert alert-info pro-gift">
                        <div class="pull-left">
                            <em class="fa fa-gift fa-3x">&nbsp;</em>
                        </div>
                        <div class="pull-left">
                            <h4>{gift_content}</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- END: gift -->
                    <!-- BEGIN: group -->
                    <div class="well pro-group-lists">
                        <div class="filter_product">
                            <!-- BEGIN: items -->
                            <div class="row">
                                <!-- BEGIN: header -->
                                <div class="col-xs-8 col-sm-5" style="margin-top: 4px">{HEADER}</div>
                                <!-- END: header -->
                                <div class="col-xs-16 col-sm-19 itemsgroup" data-groupid="{GROUPID}" data-header="{HEADER}">
                                    <!-- BEGIN: loop -->
                                    <label class="label_group <!-- BEGIN: active -->active<!-- END: active -->"> <input type="radio" class="groupid" onclick="check_quantity( $(this) )" name="groupid[{GROUPID}]" value="{GROUP.groupid}"
                                    <!-- BEGIN: checked -->checked="checked" <!-- END: checked -->>{GROUP.title}
                                    </label>
                                    <!-- END: loop -->
                                </div>
                            </div>
                            <!-- END: items -->
                        </div>
                        <span id="group_error">&nbsp;</span>
                    </div>
                    <!-- END: group -->
                    
					<div class="box-tocart">
						<div class="fieldset">
						<!-- BEGIN: order_number -->
											<div class="field qty">
									<label class="label">{LANG.detail_pro_number}</label>
									<div class="control">
										
										
										<!-- BEGIN: product_empty -->
										<button class="action primary buynow tocart real-stock-disabled" onclick="return false" >
					Tạm thời hết hàng</button>
										<!-- END: product_empty -->
										<!-- BEGIN: product_number -->
										<button type="button" class="minus toggle-qty"><span>-</span></button>
										<input type="number" name="num" id="pnum" min="0" value="1" title="{LANG.detail_pro_number}" class="input-text qty" data-validate="{&quot;required-number&quot;:true,&quot;validate-item-quantity&quot;:{&quot;minAllowed&quot;:1,&quot;maxAllowed&quot;:10000}}">
										<button type="button" class="plus toggle-qty"><span>+</span></button>
										<!-- END: product_number -->
									</div>
								</div>
								<!-- END: order_number -->
													<div class="actions">
													<!-- BEGIN: order -->
								<button class="action primary tocart" data-id="{proid}" onclick="cartorder_detail(this, {POPUP}, 0); return !1;">
									<i class="fa fa-shopping-cart fa-lg"></i> {LANG.add_cart}
								</button>
								<button class="action primary buynow" data-id="{proid}" onclick="cartorder_detail(this, {POPUP}, 1); return !1;">
									<i class="fa fa-paper-plane-o fa-lg"></i> {LANG.buy_now}
								</button>
								<!-- END: order -->
								
												

							</div>
							
									</div>
					</div>
					
					<div class="product-info-actions"><div class="product-social-links"><div class="product-addto-links" data-role="add-to-links">
        <a href="#" class="action towishlist" data-post="{&quot;action&quot;:&quot;https:\/\/www.acfc.com.vn\/wishlist\/index\/add\/&quot;,&quot;data&quot;:{&quot;product&quot;:882707,&quot;uenc&quot;:&quot;aHR0cHM6Ly93d3cuYWNmYy5jb20udm4vcG9sby1yYWxwaC1sYXVyZW4tZGFtLXBvbG8tbnUtY290dG9uLW1lc2gtcG9sby1kcmVzcy1wcmwtMjExNzk5NDkwLTAxMi5odG1s&quot;}}" data-action="add-to-wishlist"><span><i class="icon-wishlist"></i> Yêu thích</span></a>

</div>
</div>        <div class="product-share-block">
            <div class="share-btn-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" tabindex="0">
                <i class="icon-share"></i> Chia sẻ            </div>
            <div class="hideshare-wrap"><span class="share-content-toggle hideshare-btn" data-target="dropdown" aria-hidden="true">
                
            </span><ul class="share-list"><li><a class="share-fb" href="#"><div class="facebook-share"></div></a></li><li><div class="zalo-share-button" data-href="https://www.acfc.com.vn/polo-ralph-lauren-dam-polo-nu-cotton-mesh-polo-dress-prl-211799490-012.html" data-oaid="3640131523095548048" data-layout="2" data-color="blue" data-customize="false" style="overflow: hidden; display: inline-block; width: 20px; height: 20px;"><iframe frameborder="0" allowfullscreen="" scrolling="no" width="20px" height="20px" src="https://sp.zalo.me/plugins/share?dev=null&amp;color=blue&amp;oaid=3640131523095548048&amp;href=https%3A%2F%2Fwww.acfc.com.vn%2Fpolo-ralph-lauren-dam-polo-nu-cotton-mesh-polo-dress-prl-211799490-012.html&amp;layout=2&amp;customize=false&amp;callback=null&amp;id=762ea7ea-75dc-4225-9c6b-d4acffa69bf2&amp;domain=www.acfc.com.vn&amp;android=false&amp;ios=false"></iframe></div></li></ul></div>
        </div>
    </div>
                    
                    <div class="clearfix"></div>
                    <!-- BEGIN: typepeice -->
                    <table class="table table-striped table-bordered table-hover type-peice">
                        <thead>
                            <tr>
                                <th class="text-right">{LANG.detail_pro_number}</th>
                                <th class="text-left">{LANG.cart_price} ({money_unit})</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- BEGIN: items -->
                            <tr>
                                <td class="text-right">{ITEMS.number_from} -> {ITEMS.number_to}</td>
                                <td class="text-left">{ITEMS.price}</td>
                            </tr>
                            <!-- END: items -->
                        </tbody>
                    </table>
                    <!-- END: typepeice -->
                    
                   

</div>
<div class="product media">   
                                                                                                                                                                                                                                             <a id="gallery-prev-area" tabindex="-1"></a>
<div class="action-skip-wrapper">
<a class="action skip gallery-next-area" href="#gallery-next-area">
    <span>
        Chuyển đến phần đầu của thư viện hình ảnh    </span>
</a>
</div>

	<div class="gallery-placeholder" data-gallery-role="gallery-placeholder">
		<!-- BEGIN: oneimage -->
						<div class="product-one-image mb-2">
							<img itemprop="image" src="{IMAGE.file}" alt="{DATA.homeimgalt}" id="product-image-one-view">
						</div>
						<script type="text/javascript">
						$(document).ready(function() {
							$('#product-image-one-view').ezPlus({
								scrollZoom: true,
								containLensZoom: true
							});
						});
						</script>
						<!-- END: oneimage -->
						<!-- BEGIN: image -->
						<div class="product-image-gallery mb-2">
							<div class="gallery-view">
								<div class="gallery-view-inner owl-carousel" id="product-image-gallery-view">
									<!-- BEGIN: loop -->
									<div class="item" data-item="{IMAGE_STT}">
										<div class="item-inner">
											<img itemprop="image" src="{IMAGE.file}" alt="{DATA.homeimgalt}" data-zoom-image="{IMAGE.file}">
										</div>
									</div>
									<!-- END: loop -->
								</div>
							</div>
							<div class="gallery-nav owl-carousel" id="product-image-gallery-nav">
								<!-- BEGIN: loop1 -->
								<div class="item
								" data-item="{IMAGE_STT}" >
									<div class="item-inner">
										<a href="#" class="item-click-change" data-offset="{IMAGE_STT}"><img src="{IMAGE.thumb}" alt="{DATA.homeimgalt} thumb"></a>
									</div>
								</div>
								<!-- END: loop1 -->
							</div>
						</div>
						<link rel="stylesheet" href="{NV_STATIC_URL}themes/default/images/{MODULE_FILE}/OwlCarousel2/assets/owl.carousel.min.css">
						<script type="text/javascript" src="{NV_STATIC_URL}themes/default/images/{MODULE_FILE}/OwlCarousel2/owl.carousel.min.js"></script>
						<script type="text/javascript">
						$(document).ready(function() {
							// Slide ảnh sản phẩm
							var owlView = $('#product-image-gallery-view');
							var owlNav = $('#product-image-gallery-nav');
							owlView.owlCarousel({
								items: 1,
								nav: true,
								navText: ['<span><i class="fa fa-angle-left" aria-hidden="true"></i></span>', '<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>'],
								dots: false,
								lazyLoad: true,
								autoplay: false,
								margin: 5
							});
							owlNav.owlCarousel({
								nav: false,
								dots: false,
								autoplay: false,
								items: 5,
								margin: 5
							});
							owlView.on('changed.owl.carousel', function(e) {
								$('.item', owlNav).removeClass('active');
								$('[data-item="' + e.item.index + '"]', owlNav).addClass('active');
								$('[data-item="' + e.item.index + '"]', owlView).find('img').ezPlus({
									zIndex: 9,
									zoomContainerAppendTo: owlView,
									scrollZoom: true,
									containLensZoom: true
								});
							});
							$('.item-click-change', owlNav).on('click', function(e) {
								e.preventDefault();
								owlView.trigger('to.owl.carousel', [$(this).data('offset'), 300]);
							});
							// Zoom ảnh đầu tiên
							$('[data-item="0"]', owlView).find('img').ezPlus({
								zIndex: 9,
								zoomContainerAppendTo: owlView,
								scrollZoom: true,
								containLensZoom: true
							});
						});
						</script>
						<!-- END: image -->
						<!-- BEGIN: adminlink -->
						<div class="admin-links margin-bottom mb-2">{ADMINLINK}</div>
						<!-- END: adminlink -->
						<!-- BEGIN: social_icon -->
						<div class="panel panel-default socialicon-wrap">
							<div class="panel-body">
								<div class="socialicon">
									<div class="fb-like" data-href="{SELFURL}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true">&nbsp;</div>
									<a href="http://twitter.com/share" class="twitter-share-button">Tweet</a>
								</div>
							</div>
						</div>
						<!-- END: social_icon -->

	</div>


<div class="product-label-items">
    <div class="product-label-container image-label bot-mid custom-to2306-label-1" style="width:100%;">
                
            </div>
                            <style>.product.media .bot-mid{
text-align: center;
}
@media (max-width: 768px){
.product-item .product-label-items .custom-to2306-label-1{
padding: 0px 0 12px !important;
}
}
.product.media .product-label-items .image-label.custom-to2306-label-1{
margin-top: -20px !important;
}</style>
            </div>
<div class="action-skip-wrapper">

<a class="action skip gallery-prev-area" href="#gallery-prev-area">
    <span>
        Chuyển đến phần đầu của thư viện hình ảnh    </span>
</a>
</div><a id="gallery-next-area" tabindex="-1"></a>
<div class="product-labels">
    </div>
</div> 
<!-- BEGIN: product_detail -->
   <div class="product info detailed" role="tabpanel" >
			<!-- BEGIN: tabs -->
			<div role="tabpanel" class="tabs">
				<ul class="nav nav-tabs" role="tablist">
					<!-- BEGIN: tabs_title -->
					<li role="presentation"
						<!-- BEGIN: active -->class="active"<!-- END: active -->> <a href="#{TABS_KEY}-{TABS_ID}" aria-controls="{TABS_KEY}-{TABS_ID}" role="tab" data-toggle="tab"> <!-- BEGIN: icon --> <img src="{TABS_ICON}" /> <!-- END: icon --> <!-- BEGIN: icon_default --> <em class="fa fa-bars">&nbsp;</em> <!-- END: icon_default --> <span>{TABS_TITLE}</span>
					</a>
					</li>
					<!-- END: tabs_title -->
				</ul>
				<div class="tab-content">
					<!-- BEGIN: tabs_content -->
					<div role="tabpanel" class="tab-pane fade <!-- BEGIN: active -->active in<!-- END: active -->" id="{TABS_KEY}-{TABS_ID}">{TABS_CONTENT}</div>
					<!-- END: tabs_content -->
				</div>
			</div>
			<!-- END: tabs -->
    <!-- BEGIN: keywords -->
    <div class="panel panel-default panel-product-keywords">
        <div class="panel-body">
            <div class="keywords">
                <em class="fa fa-tags">&nbsp;</em><strong>{LANG.keywords}: </strong>
                <!-- BEGIN: loop -->
                <a title="{KEYWORD}" href="{LINK_KEYWORDS}" rel="dofollow"><em>{KEYWORD}</em></a>{SLASH}
                <!-- END: loop -->
            </div>
        </div>
    </div>
    <!-- END: keywords -->
    <!-- BEGIN: other -->
    <div class="panel panel-default panel-product-others">
        <div class="panel-heading" style="text-align: center;margin-bottom: 24px;"><span>{LANG.detail_others}</span></div>
        <div class="panel-body">{OTHER}</div>
    </div>
    <!-- END: other -->
    <!-- BEGIN: other_view -->
    <div class="panel panel-default panel-product-viewed">
        <div class="panel-heading" style="text-align: center;margin-bottom: 24px;"><span>{LANG.detail_others_view}</span></div>
        <div class="panel-body">{OTHER_VIEW}</div>
    </div>
    <!-- END: other_view -->
       </div>
<!-- END: product_detail --> 






<div>
</div>







</div>
</div>
</main>









<!-- BEGIN: allowed_print_js -->
<script type="text/javascript" data-show="after">
    $(function() {
        $('#click_print').click(function(event) {
            var href = $(this).attr("href");
            event.preventDefault();
            nv_open_browse(href, '', 640, 500, 'resizable=no,scrollbars=yes,toolbar=no,location=no,status=no');
            return false;
        });
    });
</script>
<!-- END: allowed_print_js -->
<!-- BEGIN: imagemodal -->
<script type="text/javascript" data-show="after">
    $('.open_modal').click(function(e){
        e.preventDefault();
         $('#idmodals .modal-body').html( '<img src="' + $(this).data('src') + '" alt="" class="img-responsive" />' );
         $('#idmodals').modal('show');
    });
</script>
<!-- END: imagemodal -->
<!-- BEGIN: order_number_limit -->
<script type="text/javascript" data-show="after">
    $('#pnum').attr( 'max', '{PRODUCT_NUMBER}' );
    $('#pnum').change(function(){
        if( intval($(this).val()) > intval($(this).attr('max')) ){
            alert('{LANG.detail_error_number} ' + $(this).attr('max') );
            $(this).val( $(this).attr('max') );
        }
    });
</script>
<!-- END: order_number_limit -->
<script type="text/javascript">
var detail_error_group = '{LANG.detail_error_group}';
function check_quantity(_this) {
    $('input[name="'+_this.attr('name')+'"]').parent().css('border-color', '#ccc');
    if (_this.is(':checked')) {
        _this.parent().css('border-color', 'blue');
    }
    $('#group_error').css( 'display', 'none' );
    <!-- BEGIN: check_price -->
    check_price( '{proid}', '{pro_unit}' );
    <!-- END: check_price -->
    resize_popup();
}
$(document).ready(function() {
    // Chọn ngay nhóm sản phẩm đầu tiên nếu có 1 nhóm mỗi loại
    var itemsgroup = $('.itemsgroup');
    itemsgroup.each(function() {
        var item = $(this);
        var radio = $('[type="radio"]', item);
        if (radio.length == 1) {
            radio.trigger('click');
        }
    });
});
</script>
<!-- BEGIN: popup -->
<script type="text/javascript">
$(window).on('load', function() {
    resize_popup();
});
</script>
<!-- END: popup -->

<script>
    require([
        'jquery'
    ], function ($) {
        $(".toggle-qty").on("click", function () {

            var $button = $(this);
            var oldValue = $button.closest('.control').find("#qty").val();

            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }

            $button.closest('.control').find("#qty").val(newVal).trigger('change');
        });

    });
</script>
<!-- END: main -->






<div class="product-detail <!-- BEGIN: popupid -->prodetail-popup<!-- END: popupid -->" itemtype="http://schema.org/Product" itemscope>
    <span class="d-none hidden hide" itemprop="mpn" content="{PRODUCT_CODE}"></span>
    <span class="d-none hidden hide" itemprop="sku" content="{PRODUCT_CODE}"></span>
    <div class="d-none hidden hide" itemprop="brand" itemtype="http://schema.org/Thing" itemscope>
        <span itemprop="name">N/A</span>
    </div>
    <!-- BEGIN: allowed_rating_snippets -->
    <div class="d-none hidden hide" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope>
        <span itemprop="reviewCount">{RATE_TOTAL}</span>
        <span itemprop="ratingValue">{RATE_VALUE}</span>
    </div>
    <!-- END: allowed_rating_snippets -->
    <div class="d-none hidden hide" itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
        <!-- BEGIN: price1 -->
        <span itemprop="price">{PRICE.sale}</span>
        <span itemprop="priceCurrency">{PRICE.unit}</span>
        <!-- END: price1 -->
        <a itemprop="url" href="{PRO_FULL_LINK}"></a>
        <span itemprop="priceValidUntil">{PRICEVALIDUNTIL}</span>
        <span itemprop="availability">{AVAILABILITY}</span>
    </div>
    <div class="panel panel-default panel-product-info">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-24 col-sm-10 col-md-10 text-center">
                    
                </div>
                <div class="col-xs-24 col-sm-14 col-md-14">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: product_detail -->
    <!-- BEGIN: tabs -->
    <div role="tabpanel" class="tabs">
        <ul class="nav nav-tabs" role="tablist">
            <!-- BEGIN: tabs_title -->
            <li role="presentation"
                > <a href="#{TABS_KEY}-{TABS_ID}" aria-controls="{TABS_KEY}-{TABS_ID}" role="tab" data-toggle="tab"> <!-- BEGIN: icon --> <img src="{TABS_ICON}" /> <!-- END: icon --> <!-- BEGIN: icon_default --> <em class="fa fa-bars">&nbsp;</em> <!-- END: icon_default --> <span>{TABS_TITLE}</span>
            </a>
            </li>
            <!-- END: tabs_title -->
        </ul>
        <div class="tab-content">
            <!-- BEGIN: tabs_content -->
            <div role="tabpanel" class="tab-pane fade <!-- BEGIN: active -->active in<!-- END: active -->" id="{TABS_KEY}-{TABS_ID}">{TABS_CONTENT}</div>
            <!-- END: tabs_content -->
        </div>
    </div>
    <!-- END: tabs -->
    <!-- BEGIN: keywords -->
    <div class="panel panel-default panel-product-keywords">
        <div class="panel-body">
            <div class="keywords">
                <em class="fa fa-tags">&nbsp;</em><strong>{LANG.keywords}: </strong>
                <!-- BEGIN: loop -->
                <a title="{KEYWORD}" href="{LINK_KEYWORDS}" rel="dofollow"><em>{KEYWORD}</em></a>{SLASH}
                <!-- END: loop -->
            </div>
        </div>
    </div>
    <!-- END: keywords -->
    <!-- BEGIN: other -->
    <div class="panel panel-default panel-product-others">
        <div class="panel-heading"><span>{LANG.detail_others}</span></div>
        <div class="panel-body">{OTHER}</div>
    </div>
    <!-- END: other -->
    <!-- BEGIN: other_view -->
    <div class="panel panel-default panel-product-viewed">
        <div class="panel-heading"><span>{LANG.detail_others_view}</span></div>
        <div class="panel-body">{OTHER_VIEW}</div>
    </div>
    <!-- END: other_view -->
    <!-- END: product_detail -->
</div>
<div class="modal fade" id="idmodals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                &nbsp;
            </div>
            <div class="modal-body">
                <p class="text-center">
                    <em class="fa fa-spinner fa-spin fa-3x">&nbsp;</em>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="product data items" role="tablist">
                                                            <div class="data item title active" data-role="collapsible" id="tab-label-additional" role="presentation" data-collapsible="true" aria-controls="additional" aria-selected="true" aria-expanded="true" tabindex="0" aria-disabled="false">
                    <a class="data switch" tabindex="-1" data-toggle="trigger" href="#additional" id="tab-label-additional-title">
                        Thông tin                    </a>
                </div>
                <div class="data item content" aria-labelledby="tab-label-additional" id="additional" data-role="content" role="tabpanel" aria-hidden="false" style="display: block;">
                        <div class="additional-attributes-wrapper table-wrapper">
        <table class="data table additional-attributes" id="product-attribute-specs-table">
            <caption class="table-caption">Thêm thông tin</caption>
            <tbody>
                                        <tr>
                    <th class="col label" scope="row">Màu Sắc</th>
                    <td class="col data" data-th="Màu Sắc">Black</td>
                </tr>
                                                    <tr>
                    <th class="col label" scope="row">Chất liệu</th>
                    <td class="col data" data-th="Chất liệu">100% Pu                                                     </td>
                </tr>
                                                    <tr>
                    <th class="col label" scope="row">HDSD &amp; BQ</th>
                    <td class="col data" data-th="HDSD &amp; BQ">Tránh ngâm trong nước quá lâu - Tránh tiếp xúc với các chất liệu gây loang màu - Không sử dụng các chất tẩy rửa, tránh giặt bằng máy</td>
                </tr>
                                    </tbody>
        </table>
    </div>
                </div>
                                            <div class="data item title" data-role="collapsible" id="tab-label-brand_tab_brand_policy" role="presentation" data-collapsible="true" aria-controls="brand_tab_brand_policy" aria-selected="false" aria-expanded="false" tabindex="0" aria-disabled="false">
                    <a class="data switch" tabindex="-1" data-toggle="trigger" href="#brand_tab_brand_policy" id="tab-label-brand_tab_brand_policy-title">
                        Chính sách đổi hàng                    </a>
                </div>
                <div class="data item content" aria-labelledby="tab-label-brand_tab_brand_policy" id="brand_tab_brand_policy" data-role="content" role="tabpanel" aria-hidden="true" style="display: none;">
                    <ul class="brand-policy">
    <li>
        <ul>
            <li class="no-control">
                <div><ul>
<li>Quý khách có thể đổi sản phẩm trong vòng 15 ngày kể từ ngày nhận sản phẩm và được thể hiện trên hệ thống.&nbsp;</li>
<li>Chính sách chỉ áp dụng đổi sản phẩm nguyên giá và chỉ được đổi 01 lần duy nhất.&nbsp;&nbsp;Sản phẩm phải còn nguyên tem và&nbsp;kèm hóa đơn khi đến đổi hàng.</li>
<li>Chúng tôi không giải quyết những trường hợp không có hóa đơn.</li>
<li>Khách hàng được đổi sản phẩm cùng giá hoặc sản phẩm có giá cao hơn (<em>bù phần tiền chênh lệch</em>). Sản phẩm không được hoàn tiền nếu mệnh giá thấp hơn so với giá ban đầu.</li>
<li>Chính sách đổi hàng&nbsp;không áp dụng đối với sản phẩm giảm giá, khuyến mãi, phụ kiện, trang sức, mắt kính, đồ bơi và đồ lót.</li>
</ul>
<ul>
<li>Không áp dụng trả sản phẩm.</li>
</ul></div>
            </li>
        </ul>
    </li>
</ul>

                </div>
                                                    </div>