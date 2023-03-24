<!-- BEGIN: main -->


	<!-- BEGIN: wishlist -->
	<div class="header-wishlist">
		<div class="toggle-event">
			<div class="link wishlist" data-bind="scope: 'wishlist'">
				<a href="{WISHLIST}">
					<i class="icon-wishlist"></i>
					(<span id="wishlist_num_id">{NUM_ID}</span>)
				</a>
			</div>

		</div>
	</div>
	<!-- END: wishlist -->
	<!-- BEGIN: enable -->
		<a class="action showcart" href="{LINK_VIEW}" data-bind="scope: 'minicart_content'">
			<span class="icon"><img src="/themes/{TEMPLATE}/images/icon_cart.svg"></span>
			<span class="counter qty empty" data-bind="css: { empty: !!getCartParam('summary_count') == false &amp;&amp; !isLoading() }, blockLoader: isLoading">
				<span class="counter-number"><!-- ko text: getCartParam('summary_count') -->{NUM}<!-- /ko --></span>
				<span class="counter-label">
				<!-- ko if: getCartParam('summary_count') --><!-- /ko -->
				</span>
			</span>
		</a>
		<div class="block block-minicart hidden">
			<div id="minicart-content-wrapper" data-bind="scope: 'minicart_content'">
					<!-- ko template: getTemplate() -->
			<div class="block-title">
				<strong>
					<span class="text" data-bind="i18n: 'My Cart'">{LANG.cart_title}</span>
					<span class="qty empty" data-bind="css: { empty: !!getCartParam('summary_count') == false },
								   attr: { title: $t('Items in Cart') }, text: getCartParam('summary_count')" title="sản phẩm">0</span>
				</strong>
			</div>

			<div class="block-content">
				<!-- ko if: getCartParam('summary_count') --><!-- /ko -->

				<!-- ko if: getCartParam('summary_count') --><!-- /ko -->

				<!-- ko ifnot: getCartParam('summary_count') -->
					<div class="empty-image">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="157" height="93" viewBox="0 0 157 93">
							<defs>
								<path id="lxd2ag1upa" d="M0 0.035L61.48 0.035 61.48 42.42 0 42.42z"></path>
								<path id="ofcob211jc" d="M0 65.344L61.48 65.344 61.48 0.204 0 0.204z"></path>
							</defs>
							<g fill="none" fill-rule="evenodd">
								<path fill="#F8F8F8" d="M149.577 36.888c-10.168-15.09-27.274-17.889-43.659-21.5-11.628-2.562-19.553-9.215-30.54-13.192C68.49-.298 60.665-.997 53.911 1.843c-2.287.962-4.428 2.405-6.46 4.093-4.067 3.383-7.695 7.754-11.183 11.232-6.464 6.447-12.59 13.238-19.085 19.635C10.96 42.957 4.962 49.71 1.72 57.966-6.207 78.02 15.025 82.428 29.55 83.221c22.596 1.234 45.962 2.508 68.62 2.026 12.228-.26 27.531-2.476 38.89-7.186 17.016-7.06 23.046-25.546 12.517-41.173" transform="translate(.885 .67)"></path>
								<g>
									<path fill="#FFF" d="M32.165 9.019L29.11 9.019 6.025 9.019 12.03 15.268 12.03 23.472 29.407 23.472 32.42 23.472 49.446 23.472 49.446 15.429 55.631 9.019z" transform="translate(.885 .67) translate(46.993 24.793)"></path>
									<path fill="#FFF" d="M2.865 9.019L2.865 23.472 5.432 23.472 11.499 15.469 5.729 9.019zM11.754 23.472L11.754 16.259 6.449 23.472zM58.801 9.019L58.801 23.472 56.235 23.472 50.167 15.469 55.938 9.019zM49.912 23.472L49.912 16.259 55.217 23.472z" transform="translate(.885 .67) translate(46.993 24.793)"></path>
									<path fill="#BBBDBF" d="M3.172 22.974h55.135V9.544H3.172v13.43zM1.61 24.537H59.87V7.981H1.61v16.556z" transform="translate(.885 .67) translate(46.993 24.793)"></path>
									<g transform="translate(.885 .67) translate(46.993 24.793) translate(0 .015)">
										<path fill="#FABDA6" d="M54.11 62.479H7.37c-2.478 0-4.505-2.028-4.505-4.505v-32.15h55.75v32.15c0 2.477-2.027 4.505-4.505 4.505"></path>
										<g transform="translate(0 22.924)">
											<mask id="m25k2fc0ob" fill="#fff">
												<use xlink:href="#lxd2ag1upa"></use>
											</mask>
											<path fill="#BBBDBF" d="M1.563 1.598v33.75c0 3.038 2.471 5.51 5.509 5.51h47.337c3.037 0 5.508-2.472 5.508-5.51V1.598H1.563zM54.41 42.42H7.072C3.172 42.42 0 39.247 0 35.348V.035h61.48v35.313c0 3.9-3.172 7.072-7.071 7.072z" mask="url(#m25k2fc0ob)"></path>
										</g>
										<path fill="#BBBDBF" d="M7.123 22.96h47.234l-5.694-7.712 5.424-5.72H7.393l5.424 5.72-5.694 7.711zm50.33 1.562H4.027l6.754-9.149-7.024-7.407h53.966l-7.024 7.407 6.754 9.15z"></path>
										<mask id="r9gq80sk3d" fill="#fff">
											<use xlink:href="#ofcob211jc"></use>
										</mask>
										<path fill="#BBBDBF" d="M11.248 23.458L12.811 23.458 12.811 15.253 11.248 15.253zM48.665 23.458L50.228 23.458 50.228 15.253 48.665 15.253z" mask="url(#r9gq80sk3d)"></path>
										<path fill="#FFF" d="M42.91 34.564c-.431 0-.782.35-.782.781v3.462c0 6.559-5.335 11.895-11.894 11.895s-11.895-5.336-11.895-11.895v-3.462c0-.432-.35-.781-.781-.781-.432 0-.782.35-.782.781v3.462c0 7.421 6.037 13.458 13.458 13.458 7.42 0 13.457-6.037 13.457-13.458v-3.462c0-.432-.35-.781-.781-.781" mask="url(#r9gq80sk3d)"></path>
										<path fill="#FFF" d="M41.207 35.41v-.112c0-.95.773-1.723 1.722-1.723.95 0 1.722.773 1.722 1.723v.113h1.563v-.113c0-1.812-1.474-3.286-3.285-3.286-1.811 0-3.285 1.474-3.285 3.286v.113h1.563zM15.916 35.41v-.112c0-.95.773-1.723 1.723-1.723.949 0 1.721.773 1.721 1.723v.113h1.563v-.113c0-1.812-1.473-3.286-3.284-3.286-1.812 0-3.286 1.474-3.286 3.286v.113h1.563z" mask="url(#r9gq80sk3d)"></path>
										<path fill="#BBBDBF" d="M39.273 6.323l.553-.855c.234-.36.13-.847-.23-1.08-.36-.235-.848-.13-1.08.23L37.41 6.323h1.863zM34.999 6.323l1.22-3.316c.148-.403-.06-.855-.464-1.003-.403-.149-.854.06-1.003.464l-1.418 3.855h1.665zM31.522 6.323V.986c0-.43-.352-.782-.782-.782-.43 0-.781.352-.781.782v5.337h1.563zM26.481 6.323h1.666l-1.419-3.855c-.148-.404-.6-.613-1.003-.464-.404.148-.612.6-.464 1.003l1.22 3.316zM22.208 6.323h1.862l-1.105-1.705c-.234-.36-.72-.465-1.08-.23-.361.233-.465.72-.232 1.08l.555.855z" mask="url(#r9gq80sk3d)"></path>
									</g>
								</g>
							</g>
						</svg>
					</div>
					<strong class="subtitle empty" data-bind="visible: closeSidebar(), i18n: 'You have no items in your shopping cart.'">Bạn không có sản phẩm nào trong giỏ hàng của bạn.</strong>
					<!-- ko if: getCartParam('cart_empty_message') --><!-- /ko -->
				<!-- /ko -->

				<!-- ko if: getCartParam('summary_count') --><!-- /ko -->

				<!-- ko if: getRegion('promotion').length --><!-- /ko -->
			</div>
			<!-- ko foreach: getRegion('sign-in-popup') --><!-- /ko -->
			<!-- /ko -->
				</div>
						</div>
			
		

	<!-- END: enable -->
	

<!-- END: main -->

<!--  BEGIN: history -->
	<p>
		<a href="{LINK_HIS}" rel="dofollow"><span>{LANG.history_title}</span></a>
	</p>
	<!--  END: history -->

	<!-- BEGIN: disable -->
	<p>
		{LANG.active_order_dis}
	</p>
	<!-- END: disable -->
	
	<!-- BEGIN: price -->
	<p>
		<strong>{LANG.cart_product_total} : </strong>
		<span class="money">{TOTAL}</span> {MONEY_UNIT}
	</p>
	<!-- END: price -->
	<p class="clearfix">
		<a title="{LANG.cart_check_out}" href="{LINK_VIEW}" id="submit_send" rel="dofollow">{LANG.cart_check_out}</a>
	</p>
	

	<!-- BEGIN: point -->
	<p class="clearfix">
		<a title="{LANG.point_cart_text}" href="{POINT_URL}" rel="dofollow">{LANG.point_cart_text}</a> ({POINT})
	</p>
	<!-- END: point -->
	
	<p>
		<strong>{LANG.cart_title} :</strong>
		<span>{NUM}</span>
		{LANG.cart_product_title}
	</p>
	