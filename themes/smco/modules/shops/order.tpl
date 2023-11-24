<!-- BEGIN: main -->
<script type="text/javascript" data-show="after" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<div class="block clearfix">

    <p class="alert alert-info">{LANG.order_info}</p>
    <!-- BEGIN: edit_order -->
    <div class="alert alert-warning">{EDIT_ORDER}</div>
    <!-- END: edit_order -->
    <form action="" method="post" name="fpost" id="fpost" class="form-horizontal">
        <input type="hidden" value="1" name="postorder">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-6 control-label">{LANG.order_name} <span class="error">(*)</span></label>
                    <div class="col-sm-18">
                        <p class="form-control-static">
                            <input name="order_name" id="order_name" class="form-control" value="{DATA.order_name}" />
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">{LANG.order_email} <span class="error">(*)</span></label>
                    <div class="col-sm-18">
                        <p class="form-control-static">
                            <input type="email" name="order_email" id="order_email" value="{DATA.order_email}" class="form-control" />
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">{LANG.order_phone} <span class="error">(*)</span></label>
                    <div class="col-sm-18">
                        <p class="form-control-static">
                            <input name="order_phone" id="order_phone" class="form-control" value="{DATA.order_phone}" />
                        </p>
                    </div>
                </div>
                <!-- BEGIN: order_address -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">{LANG.order_address} </label>
                    <div class="col-sm-18">
                        <p class="form-control-static">
                            <input name="order_address" id="order_address" class="form-control" value="{DATA.order_address}" />
                        </p>
                    </div>
                </div>
                <!-- END: order_address -->
                <!-- BEGIN: shipping_chose -->
                <div class="form-group">
                    <label class="col-sm-6 control-label">{LANG.shipping}</label>
                    <div class="col-sm-18">
                        <!-- BEGIN: shipping_loop -->
                        <p class="form-control-static">
                            <label><input type="radio" name="order_shipping" value="{IS_SHIPPING.key}" {IS_SHIPPING.checked} />{IS_SHIPPING.value}</label>
                        </p>
                        <!-- END: shipping_loop -->
                    </div>
                </div>
                <!-- END: shipping_chose -->
            </div>
        </div>
        <!-- BEGIN: shipping -->
        <div class="panel panel-primary" id="shipping_form">
            <div class="panel-heading">{LANG.shipping_services}</div>
            <div class="panel-body">
                <p>
                    <strong>{LANG.order_address} (<a href="javascript:void(0)" title="{LANG.shipping_copy}" onclick="nv_get_customer_info()">{LANG.shipping_copy}</a>)
                    </strong>
                </p>
                <div class="row">
                    <div class="col-xs-10">
                        <input type="text" name="ship_name" value="{DATA.shipping.ship_name}" class="form-control" placeholder="{LANG.shipping_name}" />
                    </div>
                    <div class="col-xs-14">
                        <input type="text" name="ship_phone" id="ship_phone" value="{DATA.shipping.ship_phone}" class="form-control" placeholder="{LANG.shipping_phone}" />
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-10">
                        <select id="location" name="ship_location" class="form-control">
                            <!-- BEGIN: location_loop -->
                            <option value="{LOCATION.id}"{LOCATION.selected}>{LOCATION.title}</option>
                            <!-- END: location_loop -->
                        </select>
                    </div>
                    <div class="col-xs-14">
                        <input type="text" name="ship_address_extend" id="ship_address_extend" value="{DATA.shipping.ship_address_extend}" class="form-control" placeholder="{LANG.shipping_address_extend}" />
                    </div>
                </div>
                <em class="help-block">{LANG.shipping_address_note}</em>
                <div class="panel panel-danger">
                    <div class="panel-body">
                        <p>
                            <strong>{LANG.shipping_services}</strong>
                        </p>
                        <div class="row">
                            <div class="col-xs-12">
                                <p>
                                    <em>{LANG.shipping_shops_chose}</em>
                                </p>
                                <!-- BEGIN: shops_loop -->
                                <label class="show"> <input type="radio" name="shops" value="{SHOPS.id}" {SHOPS.checked} title="{SHOPS.name}" />{SHOPS.name}
                                </label> <span class="help-block">{SHOPS.location_string}</span>
                                <!-- END: shops_loop -->
                            </div>
                            <div class="col-xs-12">
                                <p>
                                    <em>{LANG.shipping_carrier_chose}</em>
                                </p>
                                <div id="carrier">
                                    <!-- BEGIN: carrier_loop -->
                                    <label class="show"><input type="radio" name="carrier" value="{CARRIER.id}" {CARRIER.checked} title="{CARRIER.name}" />{CARRIER.name}</label>
                                    <!-- END: carrier_loop -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-danger">
                    <div class="panel-body">
                        <p>
                            <strong>{LANG.shipping_info}</strong>
                        </p>
                        <ul class="order_shipping_info">
                            <li><em class="fa fa-circle-o">&nbsp;</em><strong>{LANG.shipping_info_weight}:</strong> {DATA.weight_total}{weight_unit}</li>
                            <li><em class="fa fa-circle-o">&nbsp;</em><strong>{LANG.shipping_shops}:</strong> <span id="shipping_shops">&nbsp;</span></li>
                            <li><em class="fa fa-circle-o">&nbsp;</em><strong>{LANG.shipping_services}:</strong> <span id="shipping_services">&nbsp;</span></li>
                            <li><em class="fa fa-circle-o">&nbsp;</em><strong>{LANG.shipping_price}:</strong> <span id="shipping_price">&nbsp;</span></li>
                            <li><em class="fa fa-circle-o">&nbsp;</em><strong>{LANG.order_address}:</strong>
                                <ul>
                                    <li><strong>{LANG.shipping_name}:</strong> <span id="order_ship_name">N/A</span><span id="order_ship_phone">&nbsp;</span></li>
                                    <li><strong>{LANG.shipping_address}:</strong> <span id="order_address_extend">&nbsp;</span><span id="order_address">&nbsp;</span></li>
                                </ul></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: shipping -->
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

			<span class="css-1ul6wk9">

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
			<input type="hidden" size="1" value="{pro_num}" name="listproid[{id}_{list_group}]" id="{id}" class="form-control"/>
			SL: {pro_num} {product_unit}
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
        <!-- BEGIN: price3 -->
        <!-- BEGIN: total_coupons -->
        <p class="pull-right">
            {LANG.coupon}: <strong>{price_coupons}</strong> {unit_config}
        </p>
        <div class="clear"></div>
        <!-- END: total_coupons -->
        <p class="pull-right">
            {LANG.cart_total}: <strong id="total">{price_total}</strong> {unit_config}
        </p>
        <!-- END: price3 -->
        <label>{LANG.order_note}</label>
        <textarea class="form-control m-bottom" name="order_note">{DATA.order_note}</textarea>
        <div class="text-center">
            <label class="show m-bottom pointer"><input type="checkbox" name="check" value="1" id="check" />{LANG.order_true_info}</label>
            <button class="btn btn-primary" title="{LANG.order_submit_send}">{LANG.order_submit_send}</button>
        </div>
    </form>
</div>
<script type="text/javascript" data-show="after">
    var url_load = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=shippingajax';
    var urloadcart = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=loadcart';
    var order_shipping = '{DATA.order_shipping}';
    
    $(document).ready(function() {
        $("#location").select2({
            language : "{NV_LANG_INTERFACE}"
        });
        
        $("#fpost").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type : 'POST',
                url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=order&nocache=' + new Date().getTime(),
                data : $(this).serialize(),
                success : function(json) {
                    if (json.error) {
                        alert(json.msg);
                        $('#' + json.input).focus();
                    } else {
                        window.location.href = json.redirect;
                    }
                }
            });
        });
    });
</script>
<!-- BEGIN: shipping_javascript -->
<script type="text/javascript" data-show="after">
    $(document).ready(function() {
        var shops_id = $('input[name="shops"]:checked');
        var carrier_id = $('input[name="carrier"]:checked');
        var location_id = $('#location option:selected').val();
        
        $('#carrier').load(url_load + '&get_carrier=1&carrier_id={DATA.shipping.ship_carrier_id}&shops_id=' + shops_id.val());
        $('#shipping_shops').text(shops_id.attr("title"));
        $('#shipping_services').text(carrier_id.attr("title"));
        nv_get_price();
        
        $('input[name="shops"]').change(function() {
            var shops_id = $('input[name="shops"]:checked');
            $('#carrier').load(url_load + '&get_carrier=1&shops_id=' + shops_id.val());
            $('#shipping_shops').text(shops_id.attr("title"));
            nv_get_price();
        });
        
        if (order_shipping == '0') {
            $('#shipping_form').hide();
        } else {
            $('#shipping_form').show();
        }
    });
    
    $('input[name="order_shipping"]').change(function() {
        if ($('input[name="order_shipping"]:checked').val() == '1') {
            nv_get_price();
            $('#shipping_form').slideDown();
        } else {
            $('#shipping_form').slideUp();
        }
    });
    
    $("#location").on("change", function(e) {
        var location_id = $('#location option:selected').val();
        $.post(url_load + '&nocache=' + new Date().getTime(), 'get_location=1&location_id=' + location_id, function(res) {
            $('#order_address').text(res);
        });
        nv_get_price();
    });
    
    $('input[name="address_extend"]').on("keyup", function() {
        var text = ', ';
        if ($(this).val().length > 0)
            text = $(this).val() + text;
        else
            text = '';
        $('#order_address_extend').html(text);
    });
    
    $('input[name="ship_name"]').on("keyup", function() {
        $('#order_ship_name').html($(this).val());
    });
    
    $('input[name="ship_phone"]').on("keyup", function() {
        var text = ' - ';
        if ($(this).val().length > 0)
            text = text + $(this).val();
        else
            text = '';
        $('#order_ship_phone').html(text);
    });
    
    function nv_get_price() {
        if ($('input[name="order_shipping"]:checked').val() == '1') {
            var carrier_id = $('input[name="carrier"]:checked');
            var shops_id = $('input[name="shops"]:checked').val();
            var location_id = $('#location option:selected').val();
            $('#shipping_services').text(carrier_id.attr("title"));
            $('#shipping_price').load(url_load + '&get_shipping_price=1&weight={DATA.weight_total}&weight_unit={weight_unit}&location_id=' + location_id + '&shops_id=' + shops_id + '&carrier_id=' + carrier_id.val());
            $('#order_address').load(url_load + '&get_location=1&location_id=' + location_id);
            $("#cart_" + nv_module_name).load(urloadcart + '&coupons_check=1&coupons_code={COUPONS_CODE}&get_shipping_price=1&weight={DATA.weight_total}&weight_unit={weight_unit}&location_id=' + location_id + '&shops_id=' + shops_id + '&carrier_id=' + carrier_id.val());
            $("#total").load(urloadcart + '&coupons_check=1&coupons_code={COUPONS_CODE}&get_shipping_price=1&weight={DATA.weight_total}&weight_unit={weight_unit}&location_id=' + location_id + '&shops_id=' + shops_id + '&carrier_id=' + carrier_id.val() + '&t=2');
        }
    }

    function nv_carrier_change() {
        var carrier_id = $('input[name="carrier"]:checked');
        $('#shipping_services').text(carrier_id.attr("title"));
        nv_get_price();
    }

    function nv_get_customer_info() {
        $('input[name="ship_name"]').val($('input[name="order_name"]').val());
        $('input[name="ship_phone"]').val($('input[name="order_phone"]').val());
        $('#order_ship_name').html($('input[name="order_name"]').val());
        var text = ' - ';
        if ($('input[name="order_phone"]').val().length > 0)
            text = text + $('input[name="order_phone"]').val();
        else
            text = '';
        $('#order_ship_phone').html(text);
    }
</script>
<!-- END: shipping_javascript -->
<!-- END: main -->

    <div class="step_bar alert alert-success clearfix">
        <a class="step step_disable" title="{LANG.cart_check_cart}" href="{LINK_CART}"><span>1</span>{LANG.cart_check_cart}</a> <a class="step step_current" title="{LANG.cart_order}" href="#"><span>2</span>{LANG.cart_order}</a>
    </div>