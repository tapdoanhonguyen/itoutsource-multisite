<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css">

<script type="text/javascript" data-show="after" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" data-show="after" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript" data-show="after">
    $(document).ready(function() {
        $("#to_date,#from_date").datepicker({
            showOn : "both",
            dateFormat : "dd/mm/yy",
            changeMonth : true,
            changeYear : true,
            showOtherMonths : true,
            buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
            buttonImageOnly : true
        });
    });
    $("#reset").click(function() {
        $('#from_date').val("");
        $('#to_date').val("");
        $('#key').val("");
    });
</script>
<!-- END: main -->
<!-- BEGIN: results -->
<div class="panel panel-default">
    <div class="panel-body">
        <h3 class="text-center">
            <em class="fa fa-filter">&nbsp;</em>{LANG.search_on} {TITLE_MOD}
        </h3>
        <hr />
        <!-- BEGIN: noneresult -->
        <p>
            <em>{LANG.search_none} : <strong class="label label-info">{KEY}</strong> {LANG.search_in_module} <strong>{INMOD}</strong></em>
        </p>
        <!-- END: noneresult -->
        <!-- BEGIN: result -->
        
     <div class="viewgrid shops-viewgrid shops-viewgrid-{MODULE_NAME}">
    <div class="col-sm-12 col-md-{NUM}">
        <div class="thumbnail">
            
            <div style="height: {height}px" class="item-image">
                <a href="{ROW.LINK}" title="{ROW.TITLEROW}"><img src="{IMG_SRC}" alt="{ROW.TITLEROW}"
               data-rel="tooltip" data-img="{IMG_SRC}" class="img-thumbnail" style="max-height:290px;max-width:290px;"></a>
            </div>
            <div class="caption text-center">
                <h3>
                    <a href="{LINK}">{TITLEROW}</a>
                </h3>

                <p class="price">
                    <span class="money">{PRICE.sale_format} {PRICE.unit}</span> <span class="discounts_money">{PRICE.price_format} {PRICE.unit}</span>
                </p>
        </div>
    </div>
 </div>
   </div>
       
        <!-- END: result -->
        <!-- BEGIN: pages_result -->
        <div class="text-center">{VIEW_PAGES}</div>
        <!-- END: pages_viewpages -->
        <div class="alert alert-info">
            
        </div>
        
    </div>
</div>
<!-- END: results -->
<p>
                <em>{LANG.search_sum_title} <strong>{NUMRECORD}</strong> {LANG.result_title} <br /> 
                </em>
            </p>
{LANG.info_adv}
<h4>
            <strong>{LANG.search_adv_internet} :</strong>
        </h4>
        <div align="center">
            <form method="get" action="http://www.google.com/search" target="_top">
                <input type="hidden" name="domains" value="{MY_DOMAIN}" />
                <div class="form-group">
                    <div class="col-md-8">
                        <img src="http://www.google.com/logos/Logo_25wht.gif" border="0" alt="Google" />
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="q" maxlength="255" value="{KEY}" id="sbi" class="form-control" />
                    </div>
                    <div class="col-md-8">
                        <input type="submit" name="sa" value="{LANG.search_title}" id="sbb" class="btn btn-default">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        <input type="radio" name="sitesearch" value="" checked id="ss0" /> {LANG.search_on_internet}
                    </div>
                    <div class="col-md-8">
                        <input type="radio" name="sitesearch" value="{MY_DOMAIN}" /> {LANG.search_on_nuke} {MY_DOMAIN}
                    </div>
                    <div class="col-md-8"></div>
                </div>
            </form>
        </div>
<div class="row viewgrid shops-viewgrid shops-viewgrid-{MODULE_NAME}">
    <!-- BEGIN: loop -->
    <div class="col-sm-12 col-md-{NUM}">
        <div class="thumbnail">
            <div style="height: {HEIGHT}px" class="item-image">
                <a href="{ROW.link_pro}" title="{ROW.title}"><img src="{ROW.homeimgthumb}" alt="{ROW.title}"
                <!-- BEGIN: tooltip_js -->data-content='{ROW.hometext}' data-rel="tooltip" data-img="{ROW.homeimgthumb}"<!-- END: tooltip_js -->class="img-thumbnail" style="max-height:{HEIGHT}px;max-width:{WIDTH}px;"></a>
            </div>
            <div class="info_pro">
                <!-- BEGIN: new -->
                <span class="label label-success newday">{LANG.newday}</span>
                <!-- END: new -->
                <!-- BEGIN: discounts -->
                <span class="label label-danger">-{PRICE.discount_percent}{PRICE.discount_unit}</span>
                <!-- END: discounts -->
                <!-- BEGIN: point -->
                <span class="label label-info" title="{point_note}">+{point}</span>
                <!-- END: point -->
                <!-- BEGIN: gift -->
                <span class="label label-success">+<em class="fa fa-gift fa-lg">&nbsp;</em></span>
                <!-- END: gift -->
            </div>
            <div class="caption text-center">
                <h3>
                    <a href="{ROW.link_pro}" title="{ROW.title}">{ROW.title_0}</a>
                </h3>
                <!-- BEGIN: product_code -->
                <p class="label label-default">{PRODUCT_CODE}</p>
                <!-- END: product_code -->
                <!-- BEGIN: adminlink -->
                <p>{ADMINLINK}</p>
                <!-- END: adminlink -->
                <!-- BEGIN: price -->
                <p class="price">
                    <!-- BEGIN: discounts -->
                    <span class="money">{PRICE.sale_format} {PRICE.unit}</span> <span class="discounts_money">{PRICE.price_format} {PRICE.unit}</span>
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
                <!-- BEGIN: compare -->
                <p>
                    <input type="checkbox" value="{ROW.id}" {ch} onclick="nv_compare({ROW.id});" id="compare_{ROW.id}" /><a href="#" onclick="nv_compare_click();">&nbsp;{LANG.compare}</a>
                </p>
                <!-- END: compare -->
                <div class="clearfix">
                    <!-- BEGIN: order -->
                    <a href="javascript:void(0)" id="{ROW.id}" title="{ROW.title}" onclick="cartorder(this, {GROUP_REQUIE}, '{ROW.link_pro}'); return !1;"><button type="button" class="btn btn-primary btn-xs">{LANG.add_product}</button></a>
                    <!-- END: order -->
                    <!-- BEGIN: product_empty -->
                    <button class="btn btn-danger disabled btn-xs">{LANG.product_empty}</button>
                    <!-- END: product_empty -->
                    <!-- BEGIN: wishlist -->
                    <a href="javascript:void(0)" title="{ROW.title}"><button type="button" onclick="wishlist({ROW.id}, this)" class="btn btn-primary btn-xs <!-- BEGIN: disabled -->disabled<!-- END: disabled -->">{LANG.wishlist}</button></a>
                    <!-- END: wishlist -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: loop -->
    <!-- BEGIN: page -->
    <div class="text-center w-100 gen-page">{PAGE}</div>
    <!-- END: page -->
</div>
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



    <h3>
            <a href="{LINK}">{TITLEROW}</a>
        </h3>
        <div class="text-justify">
            <p>
                <!-- BEGIN: result_img -->
                <img src="{IMG_SRC}" width="100px" class="img-thumbnail pull-left image" />
                <!-- END: result_img -->
             
                
                
            </p>
            
        </div>

<form action="{BASE_URL_SITE}index.php" name="fsea" method="get" id="fsea" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">{LANG.search_title}</div>
        <div class="panel-body">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" /> <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" /> <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP_NAME}" />
            <div class="form-group">
                <label class="col-xs-4 col-sm-4 col-md-4 control-label">{LANG.key_title}</label>
                <div class="col-xs-20 col-sm-20 col-md-20">
                    <input type="text" name="q" value="{KEY}" class="form-control" id="key" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{LANG.catagories}</label>
                <div class="col-sm-20">
                    <select name="catid" class="form-control">
                        <!-- BEGIN: search_cat -->
                        <option value="{SEARCH_CAT.catid}"{SEARCH_CAT.select}>{SEARCH_CAT.xtitle}{SEARCH_CAT.title}</option>
                        <!-- END: search_cat -->
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{LANG.from_date}</span></label>
                <div class="col-sm-20">
                    <input name="to_date" id="to_date" value="{TO_DATE}" class="form-control" style="width: 90px; display: inline" maxlength="10" readonly="readonly" type="text" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">{LANG.to_date}</span></label>
                <div class="col-sm-20">
                    <input name="from_date" id="from_date" value="{FROM_DATE}" class="form-control" style="width: 90px; display: inline" maxlength="10" readonly="readonly" type="text" />
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="{LANG.search_title}" /> <input class="btn btn-warning" type="button" value="{LANG.search_reset}" id="reset" />
            </div>
        </div>
    </div>
</form>

        <div class="row viewgrid shops-viewgrid shops-viewgrid-{MODULE_NAME}">
    <!-- BEGIN: loop -->
    <div class="col-sm-12 col-md-{NUM}">
        <div class="thumbnail">
            <div style="height: {height}px" class="item-image">
                <a href="{ROW.LINK}" title="{ROW.TITLE_MOD}"><img src="{IMG_SRC}" alt="{ROW.TITLE_MOD}"
                <!-- BEGIN: tooltip_js -->data-content='{ROW.CONTENT}' data-rel="tooltip" data-img="{IMG_SRC}"<!-- END: tooltip_js -->class="img-thumbnail" style="max-height:450px;max-width:450px;"></a>
            </div>
            <div class="caption text-center">
                <h3>
                    <em class="fa fa-filter">&nbsp;</em>{LANG.search_on} {TITLE_MOD}
                </h3>
                <!-- BEGIN: adminlink -->
                  <div class="pull-right">{ADMINLINK}</div>
                <!-- END: adminlink -->
                <!-- BEGIN: price -->
                 {CONTENT}
                <!-- END: price -->
            </div>
        </div>
    </div>
    <!-- END: loop -->
</div>
<!-- BEGIN: tooltip_js -->
<script type="text/javascript" data-show="after">
    $(document).ready(function() {
        $("[data-rel='tooltip']").tooltip({
            placement : "bottom",
            html : true,
            title : function() {
                return '<p class="text-justify">' + $(this).data('hometext') + '</p><div class="clearfix"></div>';
            }
        });
    });
</script>
<!-- END: tooltip_js -->
</hr>