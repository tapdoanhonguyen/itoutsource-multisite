<!-- BEGIN: main -->
<script src="https://hesvn.com/themes/beauty/js/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://hesvn.com/themes/beauty/css/owl.carousel.min.css">
<div class="section-content relative">
<div class="hm-title container section-title-container has-hover hm-title-style-normal x md-x lg-x y md-y lg-y">
<div class="title-content" style="color:rgb(0, 0, 0);text-align:center;">
<h2 class="hm-title__main">{BLOCK_TITLE}</h2>
</div>
<div class="panel-body"  style="margin-top: 20px; text-align:center;">
	<div class="owl-carousel box-testimonial pb-40" data-dot="true" data-lg-items="5" data-md-items="4" data-sm-items="2" data-xs-items="1" data-xss-items="1" id="slider">
	  <!-- BEGIN: loop -->
	   <div class="item">
	  <!-- BEGIN: image_only -->
	  
			   <img src="{ROW.image}" alt="{ROW.title}" height="60px" width="70%" style="width:70%" />

	  <!-- END: image_only -->
	  </div>
	 <!-- END: loop -->
   </div>
	
	
	
	
	
	
	</div>
	</div>
</div>
</div>	
<script>
	$(document).ready(function() { 
	  $("#slider").owlCarousel({ 
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		items: 5,
		slideBy: 1,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		loop: true,
		nav: false,
		dots: true,
		responsiveClass:true
	  });
	});
</script>

<!-- END: main -->

		<!-- BEGIN: loop -->
		<div >
			<div class=" col-xl-48 col-sm-15 col-md-4">
				<!-- BEGIN: image_only --><img title="{ROW.title}" alt="{ROW.title}" src="{ROW.image}" style="height: 88px; width: 150px; margin-left: 20;"><!-- END: image_only -->
				<!-- BEGIN: image_link --><a href="{ROW.link}" title="{ROW.title}"<!-- BEGIN: target --> target="{ROW.target}"<!-- END: target -->><img src="{ROW.image}" title="{ROW.title}" alt="{ROW.title}" class="img-thumbnail"></a><!-- END: image_link -->
			</div>
		</div>
		<!-- END: loop -->
<div class="panel-body">
	<div class="featured-products">
		<!-- BEGIN: loop -->
		<div class="row clearfix">
			
			<!-- BEGIN: title_link --><h3><a href="{ROW.link}" title="{ROW.title}"<!-- BEGIN: target --> target="{ROW.target}"<!-- END: target -->>{ROW.title}</a></h3><!-- END: title_link -->
			<div class="col-xs-24 col-sm-5 col-md-8">
				<!-- BEGIN: image_only --><img title="{ROW.title}" alt="{ROW.title}" src="{ROW.image}" class="img-thumbnail"><!-- END: image_only -->
				<!-- BEGIN: image_link --><a href="{ROW.link}" title="{ROW.title}"<!-- BEGIN: target --> target="{ROW.target}"<!-- END: target -->><img src="{ROW.image}" title="{ROW.title}" alt="{ROW.title}" class="img-thumbnail"></a><!-- END: image_link -->
			</div>
			<div class="col-xs-24 col-sm-19 col-md-16">
				{ROW.description}
			</div>
		</div>
		<!-- END: loop -->
	</div>
</div>