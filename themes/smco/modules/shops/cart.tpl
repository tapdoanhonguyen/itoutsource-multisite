<!-- BEGIN: main -->


<!-- BEGIN: errortitle -->
<ul class="alert alert-danger text-center">
	<!-- BEGIN: errorloop -->
	<li class="clearfix">
		{ERROR_NUMBER_PRODUCT}
	</li>
	<!-- END: errorloop -->
</ul>
<!-- END: errortitle -->

<!-- BEGIN: point_note -->
<div class="alert alert-info">
	{point_note}
</div>
<!-- END: point_note -->

<!-- BEGIN: edit_order -->
<div class="alert alert-warning">
{EDIT_ORDER}
</div>
<!-- END: edit_order -->

<form action="{LINK_CART}" method="post" id="fpro">
	<input type="hidden" value="1" name="save"/>
	<!-- BEGIN: price6 -->
	<span class="text-right help-block"><strong>{LANG.product_unit_price}:</strong> {unit_config}</span>
	<!-- END: price6 -->
	<div class="table-responsive">
		<div class="css-0">
			<div class="teko-card css-1qlu3d0">
			<div class="teko-card-body css-0">
			<div class="css-10osyhh">
			<label class="check-box css-1arb6mh">
			<div class="css-l24w9c">
			<div class="checkbox-inner css-rumpju">
			<svg fill="none" viewBox="0 0 24 24" size="12" class="css-5ju3er" color="white" height="12" width="12" xmlns="http://www.w3.org/2000/svg">
			<path d="M5 12.4545L9.375 17L19 7" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
			</path>
			</svg>
			</div>
			</div>
			</label>&nbsp;<div class="css-1pnw1b5">
			<div class="css-1ezgv1">
			Đơn đặt hàng
			</div>
			</div>
			<div class="css-1v9kxil">
			<span class="css-htm2b9">
			<!-- BEGIN: price3 -->
			<span id="total"></span> 
			<!-- END: price3 -->
			<span class="css-1ul6wk9">
			{unit_config}
			</span>
			</span>
			</div>
			</div>
			<div class="teko-card css-1e0mzos">
			
			<div class="teko-card-body css-0">
			<div class="teko-row main-product-line css-1o3gs9x" style="position: relative;">
			<div class="teko-col css-t10dgr">
			<label class="check-box css-vv0yw1">
			<div class="css-l24w9c">
			
			<div class="checkbox-inner css-rumpju">
			<svg fill="none" viewBox="0 0 24 24" size="12" class="css-5ju3er" color="white" height="12" width="12" xmlns="http://www.w3.org/2000/svg">
			<path d="M5 12.4545L9.375 17L19 7" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
			</path>
			</svg>
			</div>
			</div>
			</label>
			</div>
			<div class="teko-col teko-col-11 css-gr7r8o" style="flex: 1 0 0%;">
			<!-- BEGIN: rows -->
			<div class="teko-row teko-row-space-between teko-row-top css-1o3gs9x">
			<div class="teko-col css-gr7r8o"><div width="100%" class="css-1evxwf1">
			<!-- BEGIN: image -->
			<img src="{img_pro}" loading="lazy" decoding="async" alt="product" style="width: 100%; height: auto;">
			<!-- END: image -->
			</div>
			</div>
			<div class="teko-col css-1p98676" style="flex: 1 0 0%;">
			<div type="subtitle" href="/dien-thoai-samsung-galaxy-z-flip4-8gb-128gb-light-violet-sm-f721blvaxxv--s221003264?sku=221003264" class="css-1rbwqkp">
				{title_pro}
				<!-- BEGIN: display_groups -->
				<p>
					<!-- BEGIN: group -->
					<span class="show"><span class="text-muted">{group.parent_title}: <strong>{group.title}</strong></span></span>
					<!-- END: group -->
				</p>
				<!-- END: display_groups -->
				<!-- BEGIN: sub_groups -->
				<p>
					<!-- BEGIN: loop -->
					<a href="{SUB_GROUP.link}" title="{SUB_GROUP.title}">{SUB_GROUP.title}</a>
					<!-- END: loop -->
				</p>
				<!-- END: sub_groups -->
			</div>
			
			<div class="teko-row teko-row-space-between teko-row-middle css-1j32n1t">
			<div class="teko-col css-gr7r8o">
			<div class="teko-row teko-row-middle css-1o3gs9x">
				<span class="product-price__price css-1u7nn1v">
					<!-- BEGIN: price2 -->
					{PRICE.sale_format}
					<!-- END: price2 -->
						
				</span>
			</div>

			</div>
			<div class="css-2c0axb">
			
			<div class="css-ktgpr2">
			<div height="40" class="wrap-input-number css-1d2ixzd">
			<div class="rc-input-number">
			<div class="rc-input-number-input-wrap">
			<input type="number" size="1" value="{pro_num}" name="listproid[{id}_{list_group}]" id="{id}" class="form-control"/>
			
			</div>
			</div>
			</div>
			</div>
			
			</div>
			</div>
			</div>
			<a class="remove_cart" title="{LANG.cart_remove_pro}" href="{link_remove}">
			<svg fill="none" viewBox="0 0 24 24" size="20" class=" css-1qzmzas" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M6.81304 5.75263C6.52015 5.45974 6.04528 5.45974 5.75238 5.75263C5.45949 6.04552 5.45949 6.5204 5.75238 6.81329L10.8789 11.9398L5.75241 17.0663C5.45952 17.3592 5.45952 17.8341 5.75241 18.127C6.0453 18.4199 6.52018 18.4199 6.81307 18.127L11.9396 13.0005L17.0661 18.127C17.359 18.4199 17.8339 18.4199 18.1268 18.127C18.4196 17.8341 18.4196 17.3592 18.1268 17.0663L13.0002 11.9398L18.1268 6.81329C18.4197 6.5204 18.4197 6.04552 18.1268 5.75263C17.8339 5.45974 17.359 5.45974 17.0661 5.75263L11.9396 10.8792L6.81304 5.75263Z" fill="#82869E">
			</path>
			</svg>
			</a>
			</div>
			<!-- END: rows -->
			<div class="teko-row css-74gn8o">
			
			</div>
			<div class="css-1x6y1s9">
			</div>
			</div>
			</div>
			</div>
			
			</div>
			</div>
			</div>
			<div class="css-1x6y1s9">
			</div>
			</div>
			
			
			
			
			
			
			
	</div>

	<!-- BEGIN: coupons_code -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			{LANG.coupons}
		</div>
		<div class="panel-body">
			<div class="input-group">
				<input type="text" name="coupons_code" value="{C_CODE}" id="coupons_code" placeholder="{LANG.coupons_fill}" class="form-control" style="width:300px;">
				<span class="input-group-btn">
					<input type="button" value="{LANG.coupons_check}" id="coupons_check" class="btn btn-primary">
				</span>
			</div>
			<div id="coupons_info">
				&nbsp;
			</div>
		</div>
	</div>
	<!-- END: coupons_code -->

	<div>
		

		<div class="row">
			<div class="col-md-12 text-left" style="margin-top: 10px;">
				<a title="{LANG.cart_back} {LANG.cart_page_product}" href="{LINK_PRODUCTS}"><em class="fa fa-arrow-circle-left">&nbsp;</em>{LANG.cart_back} <span>{LANG.cart_page_product}</span></a>
			</div>
			<div class="col-md-12 text-right" style="margin: 10px 0 10px 0">
				<input type="submit" name="cart_update" title="{LANG.cart_update}" value="{LANG.cart_update}" class="btn btn-primary btn-sm">
				<input type="submit" name="cart_order" title="{LANG.cart_order}" value="{LANG.cart_order}" class="btn btn-primary btn-sm">
			</div>
		</div>
	</div>
</form>
<script type="text/javascript" data-show="after">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});

	var urload = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=loadcart';
	$("#total").load(urload + '&t=2');

	$(function() {
		$("a.remove_cart").click(function() {
			var href = $(this).attr("href");
			$.ajax({
				type : "GET",
				url : href,
				data : '',
				success : function(data) {
					if (data != '') {
						$("#" + data).html('');
						$("#cart_" + nv_module_name).load(urload);
						$("#total").load(urload + '&t=2');
						window.location.href=window.location.href;
					}
				}
			});
			return false;
		});
	});
</script>

<!-- BEGIN: coupons_javascript -->
<script type="text/javascript" data-show="after">
	var coupons_code = $('input[name="coupons_code"]').val();
	if (coupons_code != '') {
		$.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=cart&nocache=' + new Date().getTime(), 'coupons_check=1&coupons_code=' + coupons_code, function(res) {
			$('#coupons_info').html(res);
		});
	}

	$(function() {
		$("#coupons_check").click(function() {
			var coupons_code = $('input[name="coupons_code"]').val();
			nv_settimeout_disable('coupons_code', 1000);
			nv_settimeout_disable('coupons_check', 1000);
			$.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=cart&nocache=' + new Date().getTime(), 'coupons_check=1&coupons_code=' + coupons_code, function(res) {
				$('#coupons_info').html(res);
			});
			return false;
		});
	});
</script>
<!-- END: coupons_javascript -->

<!-- END: main -->

<div class="step_bar alert alert-success clearfix">
	<a class="step step_current" title="{LANG.cart_check_cart}" href="#"><span>1</span>{LANG.cart_check_cart}</a>
	<a class="step step_disable" title="{LANG.cart_order}" href="{link_order_all}" id="cart_next"><span>2</span>{LANG.cart_order}</a>
</div>