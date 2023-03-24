<!-- BEGIN: main -->
<div class="title-text text-center space-20">
               <h2>{BLOCK_TITLE}</h2>
               <p>{DICHVU}</p>
            </div>
            <div class="top-dv">
               <div class="owl-carousel text-center" data-lg-items="3" data-md-items="3" data-sm-items="2" data-xs-items="2" data-xxs-items="1" data-nav="true">
			      <!-- BEGIN: loop -->
                  <div class="item">
                     <a class="avatar" href="{ROW.link}" title="{ROW.title}">
                        <picture>
                           <source media="(max-width: 480px)" srcset="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-lazyload3="{ROW.image}">
                           <img class="img-responsive basic center-block" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-src="{ROW.image}" alt="{ROW.title}" />
                        </picture>
                     </a>
                     <div class="text">
                        <a href="{ROW.link}" class="title">{ROW.title_cut}</a>
                        <p>{ROW.description_cut}</p>
                        <a href="{ROW.link}" class="btn-xemthem">Xem thêm</a>
                     </div>
                  </div>
				  <!-- END: loop -->
               </div>
            </div>
<!-- END: main -->