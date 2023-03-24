<!-- BEGIN: main -->
	<!-- BEGIN: enable -->
<div class="heading-cart">
   <a title="{LANG.cart_check_out}" href="{LINK_VIEW}">
   <i class="fa fa-shopping-cart"></i> <span class="cartCount count_item_pr" id="cart-total">{num}</span>
   </a>
</div>
<div class="top-cart-content hidden-sm hidden-xs">
   <ul id="cart-sidebar" class="mini-products-list count_li">
      <!-- BEGIN: price -->
      <div class="wrap_total">
         <div class="top-subtotal">{LANG.cart_product_total}: <span class="price">{total} {money_unit}</span></div>
      </div>
	  <!-- END: price -->
      <div class="wrap_button">
         <div class="actions">
		 <!--  BEGIN: history -->
		 <a href="{LINK_HIS}" class="btn btn-gray btn-cart-page pink"><span>{LANG.history_title}</span></a>
		 <!--  END: history -->
		 <a title="{LANG.cart_check_out}" href="{LINK_VIEW}" id="submit_send" class="btn btn-gray btn-checkout pink"><span>{LANG.cart_check_out}</span></a> </div>
      </div>
   </ul>
</div>
	<!-- END: enable -->
<!-- END: main -->