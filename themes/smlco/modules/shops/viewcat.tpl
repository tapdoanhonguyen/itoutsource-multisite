<!-- BEGIN: main -->
<div class="viewcat shops-cat-page shops-cat-page-{MODULE_NAME}" id="category">
    <div class="page-header">
        <h1>{CAT_NAME} ({COUNT} {LANG.title_products})</h1>
        <!-- BEGIN: viewdescriptionhtml -->
        <!-- BEGIN: image -->
        <div class="text-center margin-bottom margin-top">
            <img src="{IMAGE}" class="img-thumbnail" alt="{CAT_NAME}">
        </div>
        <!-- END: image -->
        <div class="margin-bottom">
            {DESCRIPTIONHTML}
        </div>
        <!-- END: viewdescriptionhtml -->
    </div>
    <!-- BEGIN: displays -->
    <div class="form-group text-right s-cat-fillter">
		<div class="css-v6thbz" direction="row">
			<div height="100%" direction="row" class="css-1k985bk">
				<div type="subtitle" class="css-1ew3940">Sắp xếp theo</div>
				<!-- BEGIN: sorts -->
				<div class="css-1w3mv8m {se}" style="padding: 0.5rem; margin-right: 1rem;">
					<div type="body" class="css-1lchwqw"  ><span class="pointer " onclick="nv_chang_price('{key}');" title="{value}">{value}</span></div>
				</div>
				<!-- END: sorts -->
				
			</div>
		</div>
	</div>  

	<!-- BEGIN: viewtypes -->
	<div class="viewtype d-inline-block">
		<span class="pointer {VIEWTYPE.active}" onclick="nv_chang_viewtype('{VIEWTYPE.index}');" title="{VIEWTYPE.title}"><i class="fa fa-{VIEWTYPE.icon} fa-lg"></i></span>
	</div>
	<!-- END: viewtypes -->

    <!-- END: displays -->
    <div id="shops-content">
        {CONTENT}
    </div>
</div>

<style>

</style>
<!-- END: main -->
