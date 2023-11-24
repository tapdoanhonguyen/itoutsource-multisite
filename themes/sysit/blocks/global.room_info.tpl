<!-- BEGIN: main -->
<div class="col-inner">
<a class="hm-custom-icon">
<span class="icon-top" style="color:rgb(255, 255, 255);font-size:68px;">
<i class="{CLASS}"></i>			</span>
<div class="content-row   icon-on-top  ">
<div class="icon-text">
<h3 class="icon-title uppercase" style="color:rgb(255, 255, 255);text-align:center;"><!-- BEGIN: company_name -->{DATA.company_name}<!-- BEGIN: company_sortname --> (<span itemprop="alternateName">{DATA.company_sortname}</span>)<!-- END: company_sortname --><!-- END: company_name --></h3>
<div class="icon-description" style="color:rgb(255, 255, 255);text-align:center;"></div>
</div>         
</div>
</a>
<div id="text-2318286554" class="text">
<p><!-- BEGIN: company_address --><a<!-- BEGIN: company_map_triger --> class="pointer" data-toggle="modal" data-target="#company-map-modal-{DATA.bid}"<!-- END: company_map_triger -->><em class="fa fa-map-marker"></em> <span>{LANG.company_address}: <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="addressLocality" class="company-address">{DATA.company_address}</span></span></span></a><!-- END: company_address --><br>
<!-- BEGIN: company_phone --><em class="fa fa-phone"></em> <span>{LANG.company_phone}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><!-- BEGIN: href --><a href="tel:{PHONE.href}"><!-- END: href --><span itemprop="telephone">{PHONE.number}</span><!-- BEGIN: href2 --></a><!-- END: href2 --><!-- END: item --></span><!-- END: company_phone --><br>
<!-- BEGIN: company_email --><em class="fa fa-envelope"></em> <span>{LANG.company_email}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="mailto:{EMAIL}"><span itemprop="email">{EMAIL}</span></a><!-- END: item --></span><!-- END: company_email --><br>
<!-- BEGIN: company_hour -->  <span itemprop="hour">{HOUR}</span><!-- END: company_hour --><br>
</p>
<style>
#text-2318286554 {
text-align: center;
color: rgb(255, 255, 255);
}
#text-2318286554 > * {
color: rgb(255, 255, 255);
}
</style>
</div>
</div>




<!-- END: main -->
<ul class="company_info" itemscope itemtype="http://schema.org/LocalBusiness">
    <li class="hide hidden">
        <span itemprop="image">{SITE_LOGO}</span>
        <span itemprop="priceRange">N/A</span>
    </li>
    
    <!-- BEGIN: company_regcode --><li><em class="fa fa-file-text"></em><span>{LICENSE}</span></li><!-- END: company_regcode -->
    <!-- BEGIN: company_responsibility --><li><em class="fa fa-flag"></em><span>{LANG.company_responsibility}: <span itemprop="founder" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{DATA.company_responsibility}</span></span></span></li><!-- END: company_responsibility -->
    
    
    <!-- BEGIN: company_fax --><li><em class="fa fa-fax"></em><span>{LANG.company_fax}: <span itemprop="faxNumber">{DATA.company_fax}</span></span></li><!-- END: company_fax -->
    
    <!-- BEGIN: company_website --><li><em class="fa fa-globe"></em><span>{LANG.company_website}: <!-- BEGIN: item --><!-- BEGIN: comma -->&nbsp; <!-- END: comma --><a href="{WEBSITE}" target="_blank"><span itemprop="url">{WEBSITE}</span></a><!-- END: item --></span></li><!-- END: company_website -->
</ul>