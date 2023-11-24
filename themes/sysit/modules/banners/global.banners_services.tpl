<!-- BEGIN: main  -->
<!-- BEGIN: loop -->
 <!-- BEGIN: type_image_link -->
<section class="banner-slider z-slider position-relative">
<div class="containerr">
<div class="slides slick-initialized slick-slider" data-slick="{
&quot;fade&quot;: true,
&quot;dots&quot;: false,
&quot;infinite&quot;: true,
&quot;autoplay&quot;: true,
&quot;autoplaySpeed&quot;: 9000,
&quot;pauseOnHover&quot;: false,
&quot;arrows&quot;: true,
&quot;speed&quot;: &quot;400&quot;,
&quot;prevArrow&quot;: &quot;.banner-slider .prev&quot;,
&quot;nextArrow&quot;: &quot;.banner-slider .next&quot;
}">
<div class="slick-list draggable">
<div class="slick-track" style="opacity: 1; width: 1640px;"><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 1640px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"><div><div class="entry position-relative" style="width: 100%; display: inline-block;">
<picture class="d-block">
<source class="lazy-load" media="(min-width: 992px)" srcset="{DATA.file_image}" style="background-image: url(&quot;null&quot;);">
<img class="d-block lazy-load" src="{DATA.file_image}" data-src="{DATA.file_image}" alt="...">
</picture><div class="content h-100 w-100 position-absolute d-flex align-items-center flex-columns"><div class="container"><div class="inner"><h1 class="lh-13 font-semi-bold mb-2 mb-sm-4 mb-lg-5 font-oswald">{DATA.file_alt}</h1><div class="desc lh-16 mb-3 mb-sm-4 mb-lg-6"></div><div><a href="{DATA.file_click}" class="primary-button" tabindex="0"><i class="far fa-paper-plane font-11x text-white mr-2"></i> TƯ VẤN NGAY</a></div></div></div></div></div></div></div></div></div></div></div></section>
<!-- END: type_image_link -->



<!-- END: loop -->

<style>




section.banner-slider h1 {
    font-size: 1.5em;
}




section.banner-slider .desc {
    font-size: .9em;
}

.mb-3, .my-3 {
    margin-bottom: 15px !important;
}
.lh-16 {
    line-height: 1.6 !important;
}


section.banner-slider .inner {
    width: 520px;
    max-width: 86%;
}

section.banner-slider .content {
    z-index: 1;
    top: 0;
    left: 0;
}
.h-100 {
    height: 100% !important;
}
.w-100 {
    width: 100% !important;
}
.position-absolute {
    position: absolute !important;
}
.align-items-center {
    align-items: center !important;
}
.d-flex {
    display: flex !important;
}
.font-semi-bold {
    font-weight: 600 !important;
	color: #fff;
}
section.banner-slider {
    color: #fff;
	max-width: 1640px;
    margin: auto;
}
.primary-button {
    border-radius: 5px;
    background: #077dda;
    padding: 12px 30px;
    box-shadow: 6px 0 13px rgba(170,184,248,.3);
    display: inline-block;
    color: #fff;
}
section.banner-slider .primary-button {
    border: 2px solid #fff;
}
.primary-button:hover {
    color: #fff;
}
section.banner-slider .inner {
    margin-left: 200px; 
	
}
@media (min-width: 600px){
section.banner-slider h1 {
    font-size: 2.25em;
}
section.banner-slider .desc {
    font-size: 1em;
}
}
@media (min-width: 768px){
section.banner-slider .desc {
    font-size: 1.1em;
}
.mb-sm-4, .my-sm-4 {
    margin-bottom: 20px !important;
}
}
@media (min-width: 992px){
section.banner-slider h1 {
    font-size: 2em;
}
}
@media (min-width: 1200px){
	section.banner-slider h1 {
		font-size: 3em;
	}
	.mb-lg-6, .my-lg-6 {
		margin-bottom: 30px !important;
	}
}
@media (min-width: 1600px){
section.banner-slider h1 {
    font-size: 3.5em;
}
section.banner-slider .inner {
    width: 600px;
	
}
img.d-block.lazy-load {
    max-width: 1640px;
}
}


</style>
<!-- END: main -->
<div class="nv-block-banners">
   
    <a rel="nofollow" href="{DATA.link}" onclick="this.target='{DATA.target}'" title="{DATA.file_alt}"><img alt="{DATA.file_alt}" src="" width="{DATA.file_width}"></a>
    <!-- END: type_image_link -->
   
    <img alt="{DATA.file_alt}" src="{DATA.file_image}" width="{DATA.file_width}">
   
    <!-- BEGIN: bannerhtml -->
    <div class="clearfix text-left">
        {DATA.bannerhtml}
    </div>
    <!-- END: bannerhtml -->
</div>