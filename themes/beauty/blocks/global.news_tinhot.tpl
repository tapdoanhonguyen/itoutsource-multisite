<!-- BEGIN: main -->
<div class="title-text text-center">
<h2>{BLOCK_TITLE}</h2>
</div>
<div class="content-blog">
<div class="left">
<!-- BEGIN: content -->
                     <div class="item">
					    <!-- BEGIN: img -->
                        <a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank} class="thumb">
                        <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-src="{CONTENT.thumb}" class="img-responsive basic" alt="{CONTENT.title}" />
                        </a>
						<!-- END: img -->
                        <div class="text">
                           <h3 class="title"><a href="{CONTENT.link}" title="{CONTENT.title}" {CONTENT.target_blank}>{CONTENT.title_clean}</a></h3>
                           <p>{CONTENT.hometext_clean}</p>
                        </div>
                     </div>
<!-- END: content -->
</div>
<div class="right">
<!-- BEGIN: loop -->
<div class="item">
                        <a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank} class="thumb" >
                        <img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/loading.svg" data-src="{ROW.thumb}" class="img-responsive basic" alt="{ROW.title}" />
                        </a>
                        <div class="text">
                           <h3 class="title"><a href="{ROW.link}" title="{ROW.title}" {ROW.target_blank}>{ROW.title_clean}</a></h3>
                           <p>{ROW.hometext_clean}</p>
                        </div>
                     </div>
<!-- END: loop -->
</div>
</div>
<!-- END: main -->