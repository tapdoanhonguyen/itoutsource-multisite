<!-- BEGIN: main -->
<div class="title-text text-center">
                  <h2>{BLOCK_TITLE}</h2>
               </div>
               <div class="owl-carousel box-testimonial pb-40" data-dot="true" data-lg-items="3" data-md-items="3" data-sm-items="3" data-xs-items="3" data-xss-items="3">
                  <!-- BEGIN: loop -->
				  <div class="item text-center">
                     <div class="avatar">
                        <picture>
                           <source media="(max-width: 80px)" srcset="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-lazyload3="{ROW.image}">
                           <img class="rounded-circle img-responsive basic center-block" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-src="{ROW.image}" alt="{ROW.title}" />
                        </picture>
                     </div>
                     <div class="text">
                        <h3>{ROW.title}</h3>
                        <h4 class="position">{ROW.link}</h4>
                        <p>{ROW.description}</p>
                     </div>
                  </div>
                 <!-- END: loop -->
               </div>
<style>               
.rounded-circle {
    border-radius: 50%!important;
    max-width: 184px;
}
</style> 
<!-- END: main -->