<div class="mfp-bg off-canvas off-canvas-left main-menu-overlay mfp-ready" style="height: 19874px; position: absolute;display:none"></div>
<div class="mfp-wrap mfp-auto-cursor off-canvas off-canvas-left mfp-ready" tabindex="-1" style="display:none">
<div class="mfp-container mfp-s-ready mfp-inline-holder">
<div class="mfp-content">
 <div id="mySidenavmobile" class="sidenav"  >
   
    <div style="width: 100%;  background-color:#fff;  top: 0; position: absolute; height: 100%;">
    <div style=" padding-top:35px">
    </div>
    
    <div style="padding-right:20px;">
    <a href="{THEME_SITE_HREF}" title="{SITE_NAME}" rel="home">
    <img width="150" height="100" src="{LOGO_SRC}" class="header_logo header-logo" alt="{SITE_NAME}">
    <img  width="150" height="100" src="{LOGO_SRC}" class="header-logo-dark" alt="{SITE_NAME}"></a>
    </div>
    
   
   [MENU_SITE_MOBILE]
           
  </div>
</div>
</div>
<div class="mfp-preloader">Loading...</div>
</div>
<button title="Close (Esc)" type="button" class="mfp-close">
<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
<line x1="18" y1="6" x2="6" y2="18"></line>
<line x1="6" y1="6" x2="18" y2="18"></line>
</svg>
</button>
</div>
<script>
var smlmobile = document.querySelectorAll(".main-header-mobile-left");
var clickEvent = new Event("click", {
    bubbles: true,
    cancelable: true
});

// Duyệt qua danh sách và kích hoạt sự kiện click cho từng phần tử
smlmobile.forEach(function(element) {
    element.dispatchEvent(clickEvent);
});

// Thêm sự kiện click cho hiển thị '.mfp-wrap'
smlmobile.forEach(function(element) {
    element.addEventListener("click", function() {
	var wrapperElement = document.getElementById("wrapper");

	// Vô hiệu hóa cuộn bằng cách đặt thuộc tính "overflow" thành "hidden"
	wrapperElement.style.overflow = "hidden";
        $('.mfp-wrap').show();
        $('.mfp-bg').show();
    });
});

var smlmobileclose = document.querySelectorAll(".mfp-close");
var clickEvent = new Event("click", {
    bubbles: true,
    cancelable: true
});

// Duyệt qua danh sách và kích hoạt sự kiện click cho từng phần tử
smlmobileclose.forEach(function(element) {
    element.dispatchEvent(clickEvent);
});

// Thêm sự kiện click cho hiển thị '.mfp-wrap'
smlmobileclose.forEach(function(element) {
    element.addEventListener("click", function() {
        $('.mfp-wrap').hide();
        $('.mfp-bg').hide();
    });
});



</script>
	<style>
	.sidenav {
  height: 100%;
  width: 0;
  z-index: 99999999999999111111 !important;
  top: 0;
  left: 0;
  background-color:#fff ; 
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #0a569e;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 20px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

   

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-dark-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0.49803921568627" /><feFuncG type="table" tableValues="0 0.49803921568627" /><feFuncB type="table" tableValues="0 0.49803921568627" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-grayscale"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-red"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 1" /><feFuncG type="table" tableValues="0 0.27843137254902" /><feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-midnight"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0 0" /><feFuncG type="table" tableValues="0 0.64705882352941" /><feFuncB type="table" tableValues="0 1" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-magenta-yellow"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.78039215686275 1" /><feFuncG type="table" tableValues="0 0.94901960784314" /><feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-purple-green"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" /><feFuncG type="table" tableValues="0 1" /><feFuncB type="table" tableValues="0.44705882352941 0.4" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;" ><defs><filter id="wp-duotone-blue-orange"><feColorMatrix color-interpolation-filters="sRGB" type="matrix" values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " /><feComponentTransfer color-interpolation-filters="sRGB" ><feFuncR type="table" tableValues="0.098039215686275 1" /><feFuncG type="table" tableValues="0 0.66274509803922" /><feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" /><feFuncA type="table" tableValues="1 1" /></feComponentTransfer><feComposite in2="SourceGraphic" operator="in" /></filter></defs></svg>
<!-- GTM Container placement set to automatic -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2LNHSC" height="0" width="0" style="display:none;visibility:hidden" aria-hidden="true"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="wrapper">
	<header id="header" class="header has-sticky sticky-jump">
  
<div class="header-wrapper">

<div id="top-bar" class="header-top hide-for-sticky nav-dark">
<div class="flex-row container">
<div class="flex-col hide-for-medium flex-left">
<ul class="nav nav-left medium-nav-center nav-small  nav-divided">
<li id="menu-item-2279" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2279 menu-item-design-default"><a href="https://smartlineco.com/vi/about/gioi-thieu-smartline.html" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-info" style=" font-size: 22px; 
vertical-align: top"></i> </span> Về chúng tôi</a></li>
<li id="menu-item-2873" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2873 menu-item-design-default"><a href="https://smartlineco.com/vi/news/" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-newspaper" style=" font-size: 22px; 
vertical-align: top"></i> </span> Tin tức</a></li>
<li id="menu-item-20615" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20615 menu-item-design-default"><a href="https://smartlineco.com/vi/siteterms/chinh-sach-bao-hanh.html" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-warranty" style=" font-size: 22px; 
vertical-align: top"></i> </span> Chính sách bảo hành</a></li>
<li id="menu-item-29342" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29342 menu-item-design-default"><a href="https://smartlineco.com/vi/siteterms/chinh-sach-van-chuyen.html" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-payment-method" style=" font-size: 22px; 
vertical-align: top"></i> </span> Chính sách vận chuyển</a></li>
<li id="menu-item-13783" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13783 menu-item-design-default"><a href="https://smartlineco.com/vi/siteterms/phuong-thuc-thanh-toan.html" class="nav-top-link"><span class="hoangminh-menu-icon"> <i class="hoangminh-icons menu-icon on hoangminh-icon-bill" style=" font-size: 22px; 
vertical-align: top"></i> </span> Phương thức thanh toán</a></li>
</ul>
</div>

<div class="flex-col hide-for-medium flex-center">
<ul class="nav nav-center nav-small  nav-divided">
</ul>
</div>
<div class="flex-col hide-for-medium flex-right">
<ul class="nav top-bar-nav nav-right nav-small  nav-divided">
<li class="html header-social-icons ml-0">
<div class="social-icons follow-icons"><a href="mailto:hoang.nguyen@smartline.com.vn" data-label="E-mail" rel="nofollow" class="icon plain  email tooltip" title="Send us an email" aria-label="Send us an email"><i class="icon-envelop"></i></a></div></li>
</ul>
</div>
<!-- Mobile Left Elements -->

<div class="flex-col show-for-medium flex-grow">
<ul class="nav nav-center nav-small mobile-nav  nav-divided">
<li class="item-hotline">
<div class="header-btn-hotline">
<a href="tel:02873008119" class="button button-primary hotline-link" title="0909997381">
<i class="hoangminh-icon hoangminh-icon-phone-call"></i> 
<span class="hotline-main-title">
<span class="hotline-label">Hotline:		</span>
<span class="phone-number">028.7300.8119</span>
</span>
</a>
</div>
</li>
</ul>
</div>
</div>
</div>
<div id="masthead" class="header-main ">
<div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
<!-- Logo -->
<div id="logo" class="flex-col logo main-header-logo" style=" width:150px">
<!-- Header logo -->
<a href="{THEME_SITE_HREF}" title="{SITE_NAME}" rel="home">
<img width="360" height="100" src="{LOGO_SRC}" class="header_logo header-logo" alt="Hoang Minh Office">
<img  width="360" height="100" src="{LOGO_SRC}" class="header-logo-dark" alt="{SITE_NAME}"></a>
</div>

<div class="flex-col show-for-medium flex-left main-header-mobile-left">
 <div class="icone-menu">   
<span style="font-size:17px;cursor:pointer" >&#9776; </span>
 </div>
    </div>

<!-- Left Elements -->
<div class="flex-col hide-for-medium flex-left
flex-grow main-header-left">
<ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
<li class="header-search-form search-form html relative has-icon">
<div class="header-search-form-wrapper">
<div class="searchform-wrapper ux-search-box relative form-flat is-normal"><form role="search" method="get" class="searchform" action="//smartlineco.com/vi/shops/search">
<div class="flex-row relative">
<div class="flex-col flex-grow">
<label class="screen-reader-text" for="woocommerce-product-search-field-0">Tìm kiếm:</label>
<input type="search" id="woocommerce-product-search-field-0" class="search-field mb-0" placeholder="Nhập từ khóa, tên sản phẩm..." value="" name="q">
<input type="hidden" name="post_type" value="product">
</div>
<div class="flex-col">
<button type="submit" value="Tìm kiếm" class="ux-search-submit submit-button secondary button  icon mb-0" aria-label="Submit">
<i class="icon-search"></i>			</button>
</div>
</div>
<div class="live-search-results text-left z-top"></div>
</form>
</div>	</div>
</li>			<li class="item-hotline">
<div class="header-btn-hotline">
<a href="tel:02873008119" class="button button-primary hotline-link" title="028 7300 8119">
<i class="hoangminh-icon hoangminh-icon-phone-call"></i> 
<span class="hotline-main-title">
<span class="hotline-label">Hotline:		</span>
<span class="phone-number">028 7300 8119</span>
</span>
</a>
</div>
</li>
</ul>
</div>
<!-- Right Elements -->
<div class="flex-col hide-for-medium flex-right main-header-right">
<ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
<li class="cart-item has-icon">
[CART]
</li>
<li class="button-map-pin">
<a class="map-pin-link" href="//smartlineco.com/contact/">
<i class="hoangminh-icon hoangminh-icon-placeholder"></i>						<span class="contact-us-label">Liên hệ</span>
</a>
</li>
<li class="account-item has-icon
has-dropdown">
<a href="//smartlineco.com/users/" class="nav-top-link account-link nav-top-not-logged-in is-small">
<span>
<i class="hoangminh-icon hoangminh-icon-user"></i>    <span class="header-account-title">Đăng nhập    </span>
</span>
</a>
<ul class="nav-dropdown  nav-dropdown-default  account-not-logged-in-dropdown ">
<li>
<a href="//smartlineco.com/tai-khoan-cua-toi/">
<i class="hoangminh-icon hoangminh-icon-user"></i>          <span class="header-account-title">Đăng nhập / Đăng kí</span>
</a>
</li>
</ul>
</li>
</ul>
</div>
<!-- Mobile Right Elements -->
<div class="flex-col show-for-medium flex-right main-header-mobile-right">
<ul class="mobile-nav nav nav-right ">
<li class="cart-item has-icon">
[CART_2]
</li>
<li class="account-item has-icon">
<a href="//smartlineco.com/users/" class="account-link-mobile is-small" title="Tài khoản">
<i class="icon-user"></i>	</a>
</li>
</ul>
</div>
</div>
</div>
<div id="wide-nav" class="header-bottom wide-nav ">
<div class="flex-row container">
<div class="flex-col hide-for-medium flex-left ">
[MENU_SITE]
</div>
<div class="flex-col hide-for-medium flex-right flex-grow">
<ul class="nav header-nav header-bottom-nav nav-right  nav-uppercase">
</ul>
</div>
<div class="flex-col show-for-medium flex-grow">
<ul class="nav header-bottom-nav nav-center mobile-nav  nav-uppercase">
<li class="header-search-form search-form html relative has-icon">
<div class="header-search-form-wrapper">
<div class="searchform-wrapper ux-search-box relative form-flat is-normal"><form role="search" method="get" class="searchform" action="//smartlineco.com/vi/shops/search">
<div class="flex-row relative">
<div class="flex-col flex-grow">
<label class="screen-reader-text" for="woocommerce-product-search-field-1">Tìm kiếm:</label>
<input type="search" id="woocommerce-product-search-field-1" class="search-field mb-0" placeholder="Nhập từ khóa, tên sản phẩm..." value="" name="q">
<input type="hidden" name="post_type" value="product">
<input type="hidden" name="nv" value="shops">
<input type="hidden" name="op" value="search">
</div>
<div class="flex-col">
<button type="submit" value="Tìm kiếm" class="ux-search-submit submit-button secondary button  icon mb-0" aria-label="Submit">
<i class="icon-search"></i>			</button>
</div>
</div>
<div class="live-search-results text-left z-top"></div>
</form>
</div>	</div>
</li>                  </ul>
</div>
</div>
</div>

<div class="header-bg-container fill"><div class="header-bg-image fill"></div><div class="header-bg-color fill"></div></div>		</div>
</header>


