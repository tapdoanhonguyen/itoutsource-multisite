 <!-- BEGIN: main -->
 <section class="features2 py-10">
 <div class="container">
 <h3 class="features-head font-bold has-border-bottom-line mb-7 mb-lg-10 text-center lh-13">Tại sao bạn nên sử dụng dịch vụ IT trọn gói?</h3>
 <div class="row row-cols-1 row-cols-sm-3">
 <!-- BEGIN: loop1 -->
	 <div class="col mb-6">
		 <div class="row">
			 <div class="col-3 col-sm-auto col-sm-12 col-lg-auto mb-sm-3 mb-lg-0">
				<img class="rounded-circle" width="75" src="{ROW.image}" alt="{ROW.title}">
			</div>
			<div class="col">
				<h3 class="lh-13 mb-3 font-semi-bold font-11x">{ROW.title}</h3>
				<div class="desc lh-16">
				{ROW.description}
				</div>
			</div>
		</div>
	</div>
<!-- END: loop1 -->


</div>
</div>
</section>
<style>               
.pt-10, .py-10 {
    padding-top: 50px !important;
}
.text-center {
    text-align: center !important;
}
.has-border-bottom-line {
    position: relative;
    padding-bottom: 15px;
}
.features-head {
    font-family: "Oswald",sans-serif;
    font-size: 1.25em;
    text-transform: uppercase;
}
.row-cols-1>* {
    flex: 0 0 100%;
    max-width: 100%;
}
.mb-6, .my-6 {
    /* margin-bottom: 30px !important; */
}
.col-3 {
    flex: 0 0 25%;
    max-width: 25%;
}
.mb-3, .my-3 {
    margin-bottom: 15px !important;
}
.font-11x {
    font-size: 1.1em !important;
}
.lh-13 {
    line-height: 1.3 !important;
}
h3.lh-13.mb-3.font-semi-bold.font-11x {
    color: #000;
}
section.features2 .desc {
    font-size: 1em;
}
.features2 .col {
    flex-basis: 0; 
    flex-grow: 1;
    max-width: 100%;
}
.features2 .row.row-cols-1.row-cols-sm-2 {
    margin: auto;
}
@media (min-width: 768px){
.features-head {
    font-size: 1.68em;
}
.row-cols-sm-2>* {
    flex: 0 0 50%;
    max-width: 50%;
}
.col-sm-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
}
.col-sm-12 {
    flex: 0 0 100%;
    max-width: 100%;
}
.mb-sm-3, .my-sm-3 {
   /*  margin-bottom: 15px !important; */
}
}

@media (min-width: 1200px){
.features-head {
    font-size: 2em;
}
.mb-lg-10, .my-lg-10 {
   /*  margin-bottom: 50px !important; */
}
.col-lg-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
}
.mb-lg-0, .my-lg-0 {
    margin-bottom: 0 !important;
}
section.features2 .desc {
    font-size: 1.05em;
}
}



</style> 	
	 <!-- END: main -->
	  <link href="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/slick/slick.css" rel="stylesheet" type="text/css" />
	  <script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/slick/slick.min.js"></script>
	<div class="" data-lazyload2="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/bgmenu.png" style='background-image: url("{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg"); background-position: center bottom; background-repeat: inherit; '>
         <div class="container pd-tb-50 space-20" > 
			<div class="dich-vu">
	 
				<div class="vnt-affix-neo vnt-service lazyloading showlazy"  id="afix3">
					<div class="wrapper">
						<div class="blHoa">
							<div class="wrap" style='background-image: url("{NV_BASE_SITEURL}themes/{TEMPLATE}/images/sml_hoa.png");'>
								<!-- BEGIN: loop -->
								<div class="service v{ROW.nsort} {ROW.ractive}">
									<div class="service_wrap"><span></span></div>
								</div>
								<!-- END: loop -->
							</div>
						</div>
						<div class="blSlide">
							<div id="blSlide" >
								<!-- BEGIN: loop1 -->
								<div class="item" >
									<div class="name">{TITLE_PROFE}</div>
									<p>{GIOITHIEU}</p>
									<div class="jo">{ROW.title}</div>
									<div>
										{ROW.description}
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="clear"></div>
				
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>	  
	 <img alt="icon phattrien" height="50" src="{ROW.image}" width="50">