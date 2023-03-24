<!-- BEGIN: main -->
<div class="page-main">
<div class="page-title-wrapper">
    <h1 class="page-title" id="page-title-heading" aria-labelledby="page-title-heading toolbar-amount">
        <span class="base" data-ui-id="page-title-wrapper">{CAT_NAME}</span>    </h1>
    </div>

<div class="page messages">
<div data-placeholder="messages"></div>
<div data-bind="scope: 'messages'">
    <!-- ko if: cookieMessages && cookieMessages.length > 0 --><!-- /ko -->

    <!-- ko if: messages().messages && messages().messages.length > 0 --><!-- /ko -->
</div>

</div>
</div>

<div class="category-view">
<div>
</div>
</div>

<main id="maincontent" class="page-main"><a id="contentarea" tabindex="-1"></a>
	<div class="columns">
		<div class="column main">
			<div id="shops-content">
				<input name="form_key" type="hidden" value="x0eUcRGi4vMsKeKe">
				<div id="authenticationPopup" data-bind="scope:'authenticationPopup'" style="display: none;">

					
				</div>
				<div>
				</div>


				<div id="amasty-shopby-product-list"> 
				
					<div class="toolbar toolbar-products">
						<!-- BEGIN: displays -->
							<div class="modes">
								<strong class="modes-label" id="modes-label">Xem dưới dạng</strong>
								<!-- BEGIN: viewtype -->
								<div class="viewtype d-inline-block">
									<span class="pointer {VIEWTYPE.active}" onclick="nv_chang_viewtype('{VIEWTYPE.index}');" title="{VIEWTYPE.title}"><i class="fa fa-{VIEWTYPE.icon} fa-lg"></i></span>
								</div>
								<!-- END: viewtype -->
							</div>
							<div class="toolbar-sorter sorter">
								<label class="sorter-label" for="sorter">Sắp xếp theo</label>
								<select id="sorter" data-role="sorter" class="sorter-options" onchange="nv_chang_price();">
								<!-- BEGIN: sorts -->
										<option value="{key}"{se}>{value}</option>
										<!-- END: sorts -->
											
								</select>
							</div>
						<!-- END: displays -->
					</div>
			
					{CONTENT}
						   
					

				</div>

			</div>
		</div>
		<div class="sidebar sidebar-main">
			
			<div class="block filter" id="layered-filter-block">
				<div class="block-content filter-content">
					<div id="am-shopby-container" class="amshopby-filter-current filter-current" data-am-js="shopby-container" data-collapsible="true" role="tablist">
						<span class="block-subtitle filter-current-subtitle" role="tab" aria-level="2" data-role="title" data-count="1" aria-selected="false" aria-expanded="false" tabindex="0">
							Bộ lọc        </span>
					</div>
					<div class="filter-options" id="narrow-by-list" data-role="content" role="tablist">
						<!-- BEGIN: brands -->
						<div data-role="collapsible" class="filter-options-item active" role="presentation" data-collapsible="true">
							<div data-role="title" class="filter-options-title" role="tab" aria-selected="false" aria-expanded="true" tabindex="0">Thương hiệu</div>
							<div data-role="content" class="filter-options-content" role="tabpanel" aria-hidden="false">
								<form class="am-ranges" data-am-js="ranges" data-amshopby-filter="attr_brand_id" data-amshopby-filter-request-var="brand_id" autocomplete="off">
								<ol class="items am-filter-items-attr_brand_id" style="max-height:220px;">
									<!-- BEGIN: brand -->
									<li class="item" data-label="Mango">
                
                                        <input class="checkbox-custom" name="amshopby[brand_id][]" value="{CUSTOM_DATA.key}" type="checkbox" style="">
                                        <span class="checkmask"></span>
                                        <a class="am-filter-item-640c09ac19bdc" data-am-js="filter-item-default" href="{CUSTOM_DATA.link}">

											<span class="label">{CUSTOM_DATA.value}</span>
										</a>
									</li>
									<!-- END: brand -->
								</ol>
								</form>

							</div>
						</div>
						<!-- END: brands -->
						<!-- BEGIN: subcats -->
						<div data-role="collapsible" class="filter-options-item active" role="presentation" data-collapsible="true">
							<div data-role="title" class="filter-options-title" role="tab" aria-selected="false" aria-expanded="true" tabindex="0">Danh mục</div>
							<div data-role="content" class="filter-options-content" role="tabpanel" aria-hidden="false">
								<form data-amshopby-filter="attr_category_ids" data-amshopby-filter-request-var="cat">
									<ul class="items am-filter-items-attr_category_ids am-labels-folding" style="max-height:220px;overflow-y: auto;overflow-x: hidden;">
										<!-- BEGIN: cat -->
										<li class="item
															-filter-parent            " data-label="{SUBCAT.value}">

										<input class="am-input checkbox-custom" name="amshopby[cat][]" value="{SUBCAT.key}" type="checkbox">
										<span class="checkmask"></span>
										<a class="am-filter-item-640c77b6caeb6                    amshopby-filter-parent" data-am-js="filter-item-category-amShopbyFilterCategoryLabelsFolding" href="https://www.acfc.com.vn/nu/trang-phuc-nu/chan-vay.html?cat=1339">
									
														<span class="label">{SUBCAT.value}</span>
									
									
												</a>
							
								
										</li>
										
										<!-- END: cat -->
									</ul>
								</form>

								<script>
									require(["jquery"], function ($) {
										var collapseSelector = ".sidebar"
											+ " .am-collapse-icon";
										if (!$(collapseSelector).length) {
											collapseSelector = '.am-collapse-icon';
										}

										$(collapseSelector).nextAll('ul').each(function() {
											if($(this).find('input[checked]').length === 0) {
												if ($(this).siblings(".amshopby-filter-parent")
														.find('input[name^="amshopby[cat]"]').first().prop("checked")) {
													return true;
												}
												$(this).hide();
											} else {
												$(this).prevAll('.am-collapse-icon').toggleClass('_active');
											}
										});

										$(collapseSelector).click(function (e) {
											$(this).nextAll('ul').toggle();
											$(this).toggleClass('_active');
											e.preventDefault();
											e.stopPropagation();
										});
									});
								</script>
							</div>
						</div>
						<!-- END: subcats -->
						<!-- BEGIN: groups -->
						<!-- BEGIN: group -->
						<div data-role="collapsible" class="filter-options-item active" role="presentation" data-collapsible="true">
							
							<div data-role="title" class="filter-options-title" role="tab" aria-selected="false" aria-expanded="true" tabindex="0">{GROUPS.value}</div>
							<div data-role="content" class="filter-options-content" role="tabpanel" aria-hidden="false">
								<form class="am-ranges" data-am-js="ranges" data-amshopby-filter="attr_color" data-amshopby-filter-request-var="color" autocomplete="off">
									<ol class="items am-filter-items-attr_color" style="max-height:220px;">
										<!-- BEGIN: loop -->
										<li class="item" data-label="Nhiều màu">
				
											<input class="checkbox-custom" name="amshopby[color][]" value="Rainbow" type="checkbox" style="">
											<span class="checkmask"></span>
											<a class="am-filter-item-640316f2b555c" data-am-js="filter-item-default" href="https://www.acfc.com.vn/nu/giay-dep-nu.html?brand_id=5&amp;color=Rainbow">
											<div class="swatch-option-label color-label">{GROUP.value}</div>
											
											</a>
										</li>
										<!-- END: loop -->
									</ol>
								</form>

							</div>
						</div>
						<!-- END: group -->
						<!-- END: groups -->
						<!-- BEGIN: price -->
						<div data-role="collapsible" class="filter-options-item" role="presentation" data-collapsible="true">
							<div data-role="title" class="filter-options-title" role="tab" aria-selected="false" aria-expanded="false" tabindex="0">Giá</div>
							<div data-role="content" class="filter-options-content" role="tabpanel" aria-hidden="true" style="display: none;">

								<div class="items am-filter-items-attr_price">
									<form data-amshopby-filter="attr_price" data-amshopby-filter-request-var="price">
										<div id="am-shopby-filter-attr_price_640316f2ba175" class="amshopby-slider-container amshopby_currency_rate" data-am-js="slider-container" data-min="0" data-max="2999000" data-rate="1">
											<input data-amshopby-slider-id="value" type="hidden" name="amshopby[price][]">
											<div data-amshopby-slider-id="display" class="amshopby-slider-display" data-am-js="slider-display">
											<span>0&nbsp;₫</span><span>2.999.000&nbsp;₫</span>
											</div>
											<div data-amshopby-slider-id="slider" class="am-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
											<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;">
											</div>
											<a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a>
											<a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- END: price -->
					</div>
				</div>
			</div>
			<script>
				require(['jquery', 'domReady!'], function ($) {
					setTimeout(function () {
						$('.filter-options-item ').first().find('.filter-options-content').show();
					}, 2000);
				});
			</script>
		</div>
		
	</div>
</main>




<!-- END: main -->

<div class="viewcat shops-cat-page shops-cat-page-{MODULE_NAME}" id="category">
    <div class="page-header">
        <h1> ({COUNT} {LANG.title_products})</h1>
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
        <select name="sort" id="sort" class="form-control input-sm d-inline-block" onchange="nv_chang_price();">
            <!-- BEGIN: sorts -->
            <option value="{key}"{se}>{value}</option>
            <!-- END: sorts -->
        </select>
        <!-- BEGIN: viewtype -->
        <div class="viewtype d-inline-block">
            <span class="pointer {VIEWTYPE.active}" onclick="nv_chang_viewtype('{VIEWTYPE.index}');" title="{VIEWTYPE.title}"><i class="fa fa-{VIEWTYPE.icon} fa-lg"></i></span>
        </div>
        <!-- END: viewtype -->
    </div>
    <!-- END: displays -->
    
</div>





<li class="item amshopby-item" data-am-js="shopby-item" data-container="brand_id" data-value="5">
                                            <a class="amshopby-remove" href="https://www.acfc.com.vn/nu/giay-dep-nu.html" title="Loại bỏ Thương hiệu Mango">
                        </a>
                                        <span class="amshopby-filter-name">
                        Thương hiệu                    </span>
                    <div class="amshopby-filter-value">
                        Mango                    </div>
                </li>
				
				
				 <div class="block-actions filter-actions">
                    <a href="https://www.acfc.com.vn/nu/giay-dep-nu.html" class="action clear filter-clear">
                        <span>Xóa tất cả <span class="amshopby-remove"></span></span>
                    </a>
                </div>