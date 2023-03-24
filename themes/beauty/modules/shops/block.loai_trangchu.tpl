<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/owl.carousel.min.css"/>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/owl.carousel.min.js"></script>
<div class="section_base" id="block_{BLOCK_ID}">
	<div class="row">
		<div class="col-md-24">
			<div class="border_bottom_title clearfix"></div>
			<div class="title_top_menu">
				<h3>{BLOCK_TITLE}</h3>
				<div class="btn_menu">
					<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
				</div>
				<ul class="clearfix">
					<!-- BEGIN: loopcatid -->
					<li><a href="{data.link}" title="{data.title}">{data.title}</a></li>
					<!-- END: loopcatid -->
					<!-- BEGIN: loopcatid1 -->
					<li><a href="{CATLINK}" class="more_view">Xem tất cả</a></li>
					<!-- END: loopcatid1 -->
				</ul>
			</div>
		</div>
		<div class="col-md-24">
			<div class="content_sec clearfix row">
				<div class="col-md-18 col-lg-18 image_right col-lg-push-6 col-md-push-6">
					<div class="prd_sec">
						<div class="products owl-carousel owl-theme products-view-grid" data-nav="true" data-lg-items="3" data-md-items="3" data-sm-items="3" data-xs-items="2" data-margin="15">
							<!-- BEGIN: loop -->
							{block1}
							<div class="product-box-h">
								<div class="product-thumbnail">
									<a class="image_link display_flex" href="{link}" title="{title}">
									<img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/rolling.svg" data-lazyload="{src_img}" alt="{title}">
									</a>
									<!-- BEGIN: labelgiamgia -->
									<div class="tagdacbiet_sale sale-flash">
										<div class="font16">
											- {PRICE.giamgia}%
										</div>
									</div>
									<!-- END: labelgiamgia -->
									<div class="status-pro {status_class}">
										{status_pro}
									</div>
								</div>
								<div class="product-info a-left">
									<h3 class="product-name"><a class="height_name text2line" href="{link}" title="{title}">{title}</a></h3>
									<div class="web-product-reviews-badge">
										<!-- BEGIN: star -->
										<i class="fa fa-star star-yellow" aria-hidden="true"></i>
										<!-- END: star -->
										<!-- BEGIN: star1 -->
										<i class="fa fa-star star-none" aria-hidden="true"></i>
										<!-- END: star1 -->
									</div>
									<div class="product-hides">
										<div class="product-hide">
											<!-- BEGIN: price -->
											<div class="price-box clearfix">
												<!-- BEGIN: discounts -->
												<div class="special-price">
													<span class="price product-price">
														{PRICE.sale_format} {PRICE.unit}
													</span>
												</div>
												<div class="old-price">															 
													<span class="price product-price-old">
														{PRICE.price_format} {PRICE.unit}
													</span>
												</div>
												<!-- END: discounts -->
												<!-- BEGIN: no_discounts -->
												<div class="special-price">
													<span class="price product-price">
														{PRICE.sale_format} {PRICE.unit}
													</span>
												</div>
												<!-- END: no_discounts -->
											</div>
											<!-- END: price -->
											<!-- BEGIN: contact -->
											<div class="price-box clearfix">
												<div class="special-price">
													<span class="price product-price">
														{LANG.price_contact}
													</span>
												</div>
											</div>
											<!-- END: contact -->
										</div> 
										<div class="productcount">
                                		<div class="countitem visible">
                                			<span class="a-center">Đã bán <b>{PRICE.sale_format} {PRICE.unit}</b></span>
                                			  <div class="countdown" style="width: 24% ;">
                                			    <span></span>
                                			  </div>
                                		</div>
                                	</div>
									</div>
									
									
									<div class="product-action clearfix hidden-xs">
										<form class="variants form-nut-grid">
										<div>
												<!-- BEGIN: order -->
												<button class="btn-buy btn-cart btn btn-circle left-to " data-id="{id}" onclick="cartorder_block(this, 0, 0, '{MODULE_NAME}'); return !1;" title="Thêm vào giỏ hàng">
													<i class="fa fa-shopping-basket"></i>{LANG.add_cart}
												</button>
												<button class="btn-buy btn-cart btn btn-circle left-to " data-id="{id}" onclick="cartorder_block(this, 0, 1, '{MODULE_NAME}'); return !1;" title="Mua ngay">
                                                    <em class="fa fa-paper-plane-o fa-lg">&nbsp;</em> {LANG.buy_now}
                                                </button>
												<!-- END: order -->
												<!-- BEGIN: product_empty -->
												<button class="btn-buy btn-cart btn btn-circle left-to btn-danger disabled" title="{LANG.product_empty}">
													<i class="fa fa-cart-arrow-down"></i>{LANG.product_empty}
												</button>
												<!-- END: product_empty -->
												<a title="Xem nhanh" href="{link}" class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm hidden-md">
													<i class="fa fa-eye"></i> {LANG.detail_product}
												</a>
											</div>
											<a href="javascript:;" class="btnEstimate" class="btn btn-primary" data-product="{id}" data-type="0">Chính sách</a>
                                            <a href="javascript:;" class="btnEstimate" class="btn btn-primary" data-product="{id}" data-type="1">Đăng ký</a>
                        
										</form>
									</div>
								</div>
							</div>
							{block2}
							<!-- END: loop -->
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 hidden-sm  fix-padding-left col-lg-pull-18 col-md-pull-18">
					<div class="banner_img">
						<a href="{link1bnn}" class="f-left wid_fix padding-bottom-30">
						<img src="{hinh1bnn}" alt="{alt1bnn}" title="{alt1bnn}" class="img-responsive center-base">
						</a>
						<a href="link2bnn">
						<img src="{hinh2bnn}" alt="{alt2bnn}" title="{alt2bnn}" class="img-responsive center-base">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function cartorder_block(a_ob, popup, buy_now, modulename) {
    var num = 1;
    var id = $(a_ob).attr("data-id");
   

    $.ajax({
        type: "POST",
        url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + modulename + '&' + nv_fc_variable + '=setcart' + '&id=' + id + '&nocache=' + new Date().getTime(),
        data: 'num=' + num,
        success: function(data) {
            var s = data.split('_');
            var strText = s[1];
            if (strText != null) {
                var intIndexOfMatch = strText.indexOf('#@#');
                while (intIndexOfMatch != -1) {
                    strText = strText.replace('#@#', '_');
                    intIndexOfMatch = strText.indexOf('#@#');
                }
                alert_msg(strText);
                $("#cart2_" + modulename).load(nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + modulename + '&' + nv_fc_variable + '=loadcart2');
                if (buy_now) {
                    parent.location = nv_base_siteurl + "index.php?" + nv_lang_variable + "=" + nv_lang_data + "&" + nv_name_variable + "=" + modulename + "&" + nv_fc_variable + "=cart";
                }  
            }
        }
    });
}
function alert_msg(msg) {
    $('body').removeClass('.msgshow').append('<div class="msgshow" id="msgshow">&nbsp;</div>');
    $('#msgshow').html(msg);
    $('#msgshow').show('slide').delay(3000).hide('slow');
}
</script>
<style>
.productcount .countitem.visible {
    background: #ffcfb4;
}

.productcount .countitem {
    width: 100%;
    height: 15px;
    border-radius: 7px;
    position: relative;
    background: #ff5c01;
    z-index: 1;
    margin-top: 15px;
}
.productcount span {
    font-size: 14px;
    font-family: "Roboto","HelveticaNeue","Helvetica Neue",sans-serif;
    position: absolute;
    top: 0;
    z-index: 4;
    color: #fff;
    line-height: 17px;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    -os-transform: translateX(-50%);
}
.a-center {
    text-align: center !important;
}
.productcount .countitem.visible .countdown {
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
}

.productcount .countitem .countdown {
    position: absolute;
    height: 15px;
    border-radius: 7px;
    background: #ff5c01;
    z-index: 2;
    left: 0;
    top: 0;
}
.productcount .countitem .countdown span {
    position: relative;
    display: inline-block;
    width: 25px;
    height: 25px;
    z-index: 3;
    background-image: url(//bizweb.dktcdn.net/100/333/138/themes/687589/assets/icon_fire.svg?1579582079595);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    left: 100%;
    top: -10px;
}
</style>
<!-- END: main -->