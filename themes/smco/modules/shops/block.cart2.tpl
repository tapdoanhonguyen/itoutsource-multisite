<!-- BEGIN: main -->

	<!-- BEGIN: enable -->
	<a href="//smartlineco.com/vi/shops/cart" class="header-cart-link off-canvas-toggle nav-top-link is-small" data-mfp-src="#cart-popup" data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng" data-pos="right">
          				<i class="icon-shopping-cart" data-icon-label="{NUM}" style="opacity: 1;">
		</i>
  </a>



  <!-- Cart Sidebar Popup -->
  <div id="cart-popup" class="widget_shopping_cart mfp-hide">
    <div class="cart-popup-inner inner-padding">
        <div class="cart-popup-title text-center">
            <h4 class="header-mini-cart text-left">Giỏ hàng có <span class="cart-count">0</span> sản phẩm</h4>
        </div>
        <div class="widget_shopping_cart_content" style="opacity: 1;">

	
	

</div>
                <div class="cart-sidebar-content relative"></div>    </div>
  </div>



	<!-- END: enable -->

	

<!-- END: main -->


	<a href="//smartlineco.com/vi/shops/cart" class="header-cart-link off-canvas-toggle nav-top-link is-small" data-mfp-src="#cart-popup" data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng" data-pos="right">
		<i class="icon-shopping-cart" data-icon-label="0">
		</i>
	<span class="header-cart-title">
	Giỏ hàng                 </span>
	</a>
	<!-- Cart Sidebar Popup -->
	<div id="cart-popup" class="mfp-hide widget_shopping_cart">
	<div class="cart-popup-inner inner-padding">
	<div class="cart-popup-title text-center">
	<h4 class="header-mini-cart text-left">Your Cart <span class="cart-count"></span> items</h4>
	</div>
	<div class="widget_shopping_cart_content">

		<p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ hàng.</p>


	</div>
	<div class="cart-sidebar-content relative"></div>    </div>
	</div>

<!-- BEGIN: point -->
	<p class="clearfix">
		<a title="{LANG.point_cart_text}" href="{POINT_URL}">{LANG.point_cart_text}</a> ({POINT})
	</p>
	<!-- END: point -->

	<!-- BEGIN: wishlist -->
	<p class="clearfix">
		<a title="{LANG.wishlist_product}" href="{WISHLIST}">{LANG.wishlist_product}</a> (<span id="wishlist_num_id">{NUM_ID}</span>)
	</p>
	<!-- END: wishlist -->

	<!--  BEGIN: history -->
	<p>
		<a href="{LINK_HIS}"><span>{LANG.history_title}</span></a>
	</p>
	<!--  END: history -->

	<!-- BEGIN: disable -->
	<p>
		{LANG.active_order_dis}
	</p>
	<!-- END: disable -->