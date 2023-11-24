<!-- BEGIN: main -->
<section class="features pt-10">
<div class="container">
<h3 class="features-head font-bold has-border-bottom-line mb-7 mb-lg-10 text-center lh-13">{BLOCK_TITLE}</h3>
<div class="row row-cols-1 row-cols-sm-2">
	<!-- BEGIN: loop -->
	<div class="col mb-6 mb-lg-10">

		<div class="row">
			<div class="col-3 col-sm-auto col-sm-12 col-lg-auto mb-sm-3 mb-lg-0">
				<img width="70" src="{ROW.image}" alt="{ROW.title}">
			</div>
			<div class="col">
				<h3 class="lh-13 mb-3 font-semi-bold font-11x">{ROW.title}</h3>
				<div class="desc lh-16">
					{ROW.description}
				</div>
			</div>
		</div>
	</div>
	<!-- END: loop -->
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
section.features .desc {
    font-size: 1em;
}
.features .col {
    flex-basis: 0; 
    flex-grow: 1;
    max-width: 100%;
	min-width: 50%;
}
.features .row.row-cols-1.row-cols-sm-2 {
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
section.features .desc {
    font-size: 1.05em;
}
}



</style> 
<!-- END: main -->


<div class="title-text text-center">
                  <h2></h2>
               </div>
               <div class="owl-carousel box-testimonial pb-40" data-dot="true" data-lg-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xss-items="1">
                  
				  <div class="item text-center">
                     <div class="avatar">
                        <picture>
                           <source media="(max-width: 80px)" srcset="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-lazyload3="">
                           <img class="rounded-circle img-responsive basic center-block" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-src="{ROW.image}" alt="{ROW.title}" />
                        </picture>
                     </div>
                     <div class="text">
                        <h3></h3>
                        <h4 class="position">{ROW.link}</h4>
                        <p></p>
                     </div>
                  </div>
                 
               </div>