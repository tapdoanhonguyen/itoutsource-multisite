<!-- BEGIN: form -->
<div id="formsearch">
	<form action="{NV_BASE_SITEURL}" method="get" name="frm_search" onsubmit="return onsubmitsearch1();">
		<div class="well">
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label>{LANG.keyword}</label>
						<input id="keyword1" type="text" value="{value_keyword}" name="keyword" class="form-control">
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label>{LANG.product_catalogs}</label>
						<select name="cata" id="cata1" class="form-control">
							<option value="0">{LANG.allcatagories}</option>
							<!-- BEGIN: loopcata -->
							<option {ROW.selected} value="{ROW.catid}">{ROW.xtitle}</option>
							<!-- END: loopcata -->
						</select>
					</div>
				</div>
				<div class="col-xs-24 col-sm-8">
					<div class="form-group">
						<label>{LANG.price1}</label>
						<input id="price11" type="text" value="{value_price1}" name="price1" class="form-control">
					</div>
				</div>
				<div class="col-xs-24 col-sm-8">
					<div class="form-group">
						<label>{LANG.price1}</label>
						<input id="price21" size="20" type="text" value="{value_price2}" name="price2" class="form-control">
					</div>
				</div>
				<div class="col-xs-24 col-sm-8">
					<div class="form-group">
						<label>{LANG.product_catalogs}</label>
						<select name="typemoney" id="typemoney1" class="form-control">
							<option value="0">{LANG.moneyunit}</option>
							<!-- BEGIN: typemoney -->
							<option {ROW.selected} value="{ROW.code}">{ROW.currency}</option>
							<!-- END: typemoney -->
						</select>
					</div>
				</div>
				<div class="col-xs-24">
					<div class="form-group text-center">
						<input type="submit" class="btn btn-primary" name="submit" id="submit" value="{LANG.search}" onclick="onsubmitsearch1()">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- END: form -->
<!-- BEGIN: main -->
<div id="products">
	<!-- BEGIN: items -->
	<div class="col-sm-12 col-md-{num}">
		<div class="thumbnail">
			<div style="height: {height}px">
				<a href="{LINK}" title="{TITLE}"><img src="{IMG_SRC}" alt="{TITLE}" data-content='{hometext}' data-rel="tooltip" class="img-thumbnail" style="border:0;max-height:{height}px;max-width:{width}px;"></a>
			</div>
			<div class="info_pro">
				<!-- BEGIN: discounts -->
				<span class="label label-danger">-{PRICE.discount_percent}%</span>
				<!-- END: discounts -->
				<!-- BEGIN: point -->
				<span class="label label-info" title="{point_note}">+{point}</span>
				<!-- END: point -->
				<!-- BEGIN: gift -->
            	<span class="label label-success">+<em class="fa fa-gift fa-lg">&nbsp;</em></span>
            	<!-- END: gift -->
			</div>
			<div class="caption text-center">
				<h3><a href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>

				<!-- BEGIN: adminlink -->
				<p>
					{ADMINLINK}
				</p>
				<!-- END: adminlink -->

				<!-- BEGIN: price -->
				<p class="price">
					<!-- BEGIN: discounts -->
					<span class="money">{PRICE.sale_format} {PRICE.unit}</span>
					<span class="discounts_money">{PRICE.price_format} {PRICE.unit}</span>
					<!-- END: discounts -->

					<!-- BEGIN: no_discounts -->
					<span class="money">{PRICE.price_format} {PRICE.unit}</span>
					<!-- END: no_discounts -->
				</p>
				<!-- END: price -->

				<!-- BEGIN: contact -->
				<p class="price">
					{LANG.detail_pro_price}: <span class="money">{LANG.price_contact}</span>
				</p>
				<!-- END: contact -->
			</div>
		</div>
	</div>
	<!-- END: items -->
</div>
<div class="clear">
	&nbsp;
</div>

<!-- BEGIN: modal_loaded -->
<div class="modal fade" id="idmodals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">{LANG.add_product}</h4>
			</div>
			<div class="modal-body">
				<em class="fa fa-spinner fa-spin">&nbsp;</em>
			</div>
		</div>
	</div>
</div>
<!-- END: modal_loaded -->

<!-- BEGIN: pages -->
<div class="text-center">
	{generate_page}
</div>
<!-- END: pages -->

<div class="msgshow" id="msgshow"></div>

<!-- BEGIN: tooltip_js -->
<script type="text/javascript" data-show="after">
	$(document).ready(function() {
		$("[data-rel='tooltip']").tooltip({
			placement : "bottom",
			html : true,
			title : function() {
				return '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';
			}
		});
	});
</script>
<!-- END: tooltip_js -->
<!-- END: main -->