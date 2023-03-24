<!-- BEGIN: main -->
<div class="title-text text-center">
	<h2>{BLOCK_TITLE}</h2>

	<div class="featured-products">
		<!-- BEGIN: loop -->
		<div class="col-md-6">
			
			<!-- BEGIN: title_link --><h3><a href="{ROW.link}" title="{ROW.title}"<!-- BEGIN: target --> target="{ROW.target}"<!-- END: target -->>{ROW.title}</a></h3><!-- END: title_link -->
			<div class="col-xs-24 col-sm-5 col-md-8">
				<!-- BEGIN: image_only --><img title="{ROW.title}" src="{ROW.image}" class="img-thumbnail"><!-- END: image_only -->
				<!-- BEGIN: image_link --><a href="{ROW.link}" title="{ROW.title}"<!-- BEGIN: target --> target="{ROW.target}"<!-- END: target -->><img src="{ROW.image}" title="{ROW.title}" class="img-thumbnail"></a><!-- END: image_link -->
			</div>
			<!-- BEGIN: title_text --><span>{ROW.title}</span><!-- END: title_text -->
		</div>
		<!-- END: loop -->
	</div>
</div>
<!-- END: main -->