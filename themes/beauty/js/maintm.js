$(document).ready(function ($) {
    "use strict";
    awe_backtotop();
    awe_owl();
    awe_category();
    awe_menumobile();
    awe_tab();
    awe_lazyloadImage();
});

function awe_lazyloadImage() {
    var i = $("[data-lazyload]");
    i.length > 0 && i.each(function() {
        var i = $(this), e = i.attr("data-lazyload");
        i.appear(function() {
            i.removeAttr("height").attr("src", e);
            i.removeAttr("height").attr("srcset", e);
        }, {
            accX: 0,
            accY: 120
        }, "easeInCubic");
    });
    var e = $("[data-lazyload2]");
    e.length > 0 && e.each(function() {
        var i = $(this), e = i.attr("data-lazyload2");
        i.appear(function() {
            i.css("background-image", "url(" + e + ")");
        }, {
            accX: 0,
            accY: 120
        }, "easeInCubic");
    });
    var s = $("[data-lazyload3]");
    s.length > 0 && s.each(function() {
        var s = $(this), e = s.attr("data-lazyload3");
        s.appear(function() {
            s.attr("srcset", e);
        }, {
            accX: 0,
            accY: 120
        }, "easeInCubic");
    });
} window.awe_lazyloadImage=awe_lazyloadImage;


function awe_showNoitice(selector) {
    $(selector).animate({right: '0'}, 500);
    setTimeout(function() {
        $(selector).animate({right: '-300px'}, 500);
    }, 3500);
}  window.awe_showNoitice=awe_showNoitice;


function awe_showLoading(selector) {
    var loading = $('.loader').html();
    $(selector).addClass("loading").append(loading);
}  window.awe_showLoading=awe_showLoading;


function awe_hideLoading(selector) {
    $(selector).removeClass("loading");
    $(selector + ' .loading-icon').remove();
}  window.awe_hideLoading=awe_hideLoading;


function awe_showPopup(selector) {
    $(selector).addClass('active');
}  window.awe_showPopup=awe_showPopup;


function awe_hidePopup(selector) {
    $(selector).removeClass('active');
}  window.awe_hidePopup=awe_hidePopup;


function awe_category(){
    $('.nav-category .fa-angle-down').click(function(e){
        $(this).parent().toggleClass('active');
    });
} window.awe_category=awe_category;


function awe_menumobile(){
    $('.menu-bar').click(function(e){
        e.preventDefault();
        $('#nav').toggleClass('open');
    });
} window.awe_menumobile=awe_menumobile;
$(".date-input").datepicker({
    format: "dd/mm/yyyy",
    language: 'vi',
    orientation: "bottom auto",
    autoclose: true,
});
$('.menu-bar').click(function(){
    $('.nav').slideToggle("fast");
});
$('.nav-mobile .open-close2').click(function(){
    $(this).closest('li').find('>ul').slideToggle("fast");
    $(this).toggleClass("active");
});
$('.categories-box .open-close').click(function(){
    $(this).toggleClass("active");
    $(this).closest('li').find('>ul').slideToggle("fast");
});
$(document).ready(function() {
    var s = $(".sticker");
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        if (windowpos > 0 ) {
            s.addClass("stick");
        } else {
            s.removeClass("stick");
        }
    });

    var width = $(window).outerWidth();
    start_owlcarousel(width);
    $(window).resize(function () {
        var width = $(window).width();
        start_owlcarousel(width);
    });
    function start_owlcarousel(width){
        if (width < 1199) {
            $(".carousel-resize").addClass('owl-carousel owl-theme');
            $(".carousel-resize").owlCarousel({
                loop : false,
                margin: 10,
                items: 4,
                nav: true,
                responsiveClass: true,
                dots: false,
                responsive: {
                    0:{
                        items:2
                    },
                    543:{
                        items:2
                    },
                    768:{
                        items:3
                    },
                    992:{
                        items:4
                    },
                    1200:{
                        items:4
                    }
                }
            });
        } else {
            $('.carousel-resize').trigger('destroy.owl.carousel');
        }
    }
});
var carousel_water = $('#carousel').waterwheelCarousel({
    flankingItems: 4,
    separation: 200,
    forcedImageWidth: 500,
    forcedImageHeight: 500,
    movingToCenter: function(e) {
        $("#callback-output").prepend("movingToCenter: " + e.attr("id") + "<br/>")
    },
    movedToCenter: function(e) {
        $("#callback-output").prepend("movedToCenter: " + e.attr("id") + "<br/>")
    },
    movingFromCenter: function(e) {
        $("#callback-output").prepend("movingFromCenter: " + e.attr("id") + "<br/>")
    },
    movedFromCenter: function(e) {
        $("#callback-output").prepend("movedFromCenter: " + e.attr("id") + "<br/>")
    },
    clickedCenter: function(e) {
        $("#callback-output").prepend("clickedCenter: " + e.attr("id") + "<br/>")
    }
});
$("#prev").bind("click", function() {
    return carousel_water.prev(), !1
});
$("#next").bind("click", function() {
    return carousel_water.next(), !1
});
$(window).on("load resize scroll",function(){
    var details_stick = $(".details-sticky");
    var w_window = $(window).width();
    if (w_window > 991){
        $(".sticky.top-90").append(details_stick);
    }else{
        $(".after-title-product").append(details_stick);
    }
});
function awe_accordion(){
    $('.accordion .nav-link').click(function(e){
        e.preventDefault;
        $(this).parent().toggleClass('active');
    })
} window.awe_accordion=awe_accordion;


function awe_owl() {
    setTimeout(function(){
        $('.owl-carousel').each( function(){
            var xxs_item = $(this).attr('data-xss-items');
            var xs_item = $(this).attr('data-xs-items');
            var md_item = $(this).attr('data-md-items');
            var lg_item = $(this).attr('data-lg-items');
            var sm_item = $(this).attr('data-sm-items');
            var margin	= $(this).attr('data-margin');
            var dot		= $(this).attr('data-dot');
            var loop	= $(this).attr('data-loop');
            var nav		= $(this).attr('data-nav');
            var auto_play = $(this).attr('data-auto-play');
            var auto_height = $(this).attr('data-auto-height');
            if (typeof margin !== typeof undefined && margin !== false) {
            } else{
                margin = 0;
            }
            if (typeof xxs_item !== typeof undefined && xxs_item !== false) {
            } else{
                xxs_item = 1;
            }
            if (typeof xs_item !== typeof undefined && xs_item !== false) {
            } else{
                xs_item = 1;
            }
            if (typeof sm_item !== typeof undefined && sm_item !== false) {

            } else{
                sm_item = 3;
            }
            if (typeof md_item !== typeof undefined && md_item !== false) {
            } else{
                md_item = 3;
            }
            if (typeof dot !== typeof undefined && dot !== true) {
                dot = dot;
            } else{
                dot = false;
            }
            if (typeof loop !== typeof undefined && loop !== true){
                loop = loop;
            } else {
                loop = false;
            }
            if (typeof nav !== typeof undefined && nav !== true) {
                nav = nav;
            } else{
                nav = false;
            }
            if (typeof auto_play !== typeof undefined && auto_play !== true){
                auto_play = auto_play;
            } else {
                auto_play = false;
            }
            if (typeof auto_height !== typeof undefined && auto_height !== true){
                auto_height = auto_height;
            } else {
                auto_height = false;
            }
            $(this).owlCarousel({
                loop: loop,
                margin:Number(margin),
                responsiveClass:true,
                dots:dot,
                nav:nav,
                navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
                responsive:{
                    0:{
                        items:Number(xxs_item)
                    },
                    543:{
                        items:Number(xs_item)
                    },
                    768:{
                        items:Number(sm_item)
                    },
                    992:{
                        items:Number(md_item)
                    },
                    1200:{
                        items:Number(lg_item)
                    }
                },
                //autoplay: auto_play,
                autoplay: false,
                autoPlayHoverPause: true,
                autoHeight: false,
                rewind: true
            })
        })
    },300);
} window.awe_owl=awe_owl;


function awe_backtotop() {
    if ($('.back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.back-to-top').addClass('show');
                } else {
                    $('.back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('.back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
} window.awe_backtotop=awe_backtotop;



function awe_tab() {
    $(".e-tabs").each( function(){
        $(this).find('.tabs-title li:first-child').addClass('current');
        $(this).find('.tab-content').first().addClass('current');

        $(this).find('.tabs-title li').click(function(){
            var tab_id = $(this).attr('data-tab');
            var url = $(this).attr('data-url');
            $(this).closest('.e-tabs').find('.tab-viewall').attr('href',url);
            $(this).closest('.e-tabs').find('.tabs-title li').removeClass('current');
            $(this).closest('.e-tabs').find('.tab-content').removeClass('current');
            $(this).addClass('current');
            $(this).closest('.e-tabs').find("#"+tab_id).addClass('current');
        });
    });
} window.awe_tab=awe_tab;

/********************************************************
 # DROPDOWN
 ********************************************************/
$('.dropdown-toggle').click(function() {
    $(this).parent().toggleClass('open');
});
$('.btn-close').click(function() {
    $(this).parents('.dropdown').toggleClass('open');
});
$('body').click(function(event) {
    if (!$(event.target).closest('.dropdown').length) {
        $('.dropdown').removeClass('open');
    };
});
deferimg('img.basic', 100);

// Create tab
$(".not-dqtab").each( function(e){
    var $this1 = $(this);
    var datasection = $this1.closest('.not-dqtab').attr('data-section');
    $this1.find('.tabs-title li:first-child').addClass('current');
    $this1.find('.tab-content').first().addClass('current');
    $this1.find('.tabs-title.ajax li').click(function(){
        var $this2 = $(this),
            tab_id = $this2.attr('data-tab'),
            url = $this2.attr('data-url');
        var etabs = $this2.closest('.e-tabs2');
        etabs.find('.tab-viewall').attr('href',url);
        etabs.find('.tabs-title li').removeClass('current');
        etabs.find('.tab-content').removeClass('current');
        $this2.addClass('current');
        etabs.find("."+tab_id).addClass('current');
        //Náº¿u Ä‘Ă£ load rá»“i thĂ¬ khĂ´ng load ná»¯a
        if(!$this2.hasClass('has-content')){
            $this2.addClass('has-content');
            getContentTab(url,"."+ datasection+" ."+tab_id);
        }
    });
});
$(".slider-wrap-2-item").each(function(){
    var productdivs = $(this).children(".product-box");
    for(var i = 0; i < productdivs.length; i+=2) {
        productdivs.slice(i, i+2).wrapAll("<div class='item-wrap'></div>");
    }
});

// http://www.entheosweb.com/tutorials/css/tabs.asp
$(".tab_content").hide();
$(".tab_content:first").show();

/* if in tab mode */
$("ul.tabs li").click(function() {

    $(".tab_content").hide();
    var activeTab = $(this).attr("rel");
    $("#"+activeTab).fadeIn();

    $("ul.tabs li").removeClass("active");
    $(this).addClass("active");

    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");

});
/* if in drawer mode */
$(".tab_drawer_heading").click(function() {

    var d_activeTab = $(this).attr("rel");
    $(".tab_content").not($("#"+d_activeTab)).hide();
    $("#"+d_activeTab).slideToggle();

    $(".tab_drawer_heading").not($(this)).removeClass("d_active");
    $(this).toggleClass("d_active");

    $("ul.tabs li").not($("ul.tabs li[rel^='"+d_activeTab+"']")).removeClass("active");
    $("ul.tabs li[rel^='"+d_activeTab+"']").toggleClass("active");
});


//Xá»­ lĂ½ mobile

$('.not-dqtab .next').click(function(e){

    var count = 0
    $(this).parents('.content').find('.tab-content').each(function(e){
        count +=1;
    })

    var str = $(this).parent().find('.tab-titlexs').attr('data-tab'),
        res = str.replace("tab-", ""),
        datasection = $(this).closest('.not-dqtab').attr('data-section');
    res = Number(res);
    if(res < count){
        var current = res + 1;
    }else{
        var current = 1;
    }
    action(current,datasection);
})
$('.not-dqtab .prev').click(function(e){
    var count = 0
    $(this).parents('.content').find('.tab-content').each(function(e){
        count +=1;
    })

    var str = $(this).parent().find('.tab-titlexs').attr('data-tab'),
        res = str.replace("tab-", ""),
        datasection = $(this).closest('.not-dqtab').attr('data-section'),
        res = Number(res);
    if(res > 1){
        var current = res - 1;
    }else{
        var current = count;
    }
    action(current,datasection);
})
// Action mobile
function action(current,datasection){
    $('.'+datasection+' .tab-titlexs').attr('data-tab','tab-'+current);
    var text = '',
        url = '',
        tab_id='';
    $('.'+datasection+' ul.tabs.tabs-title.hidden-xs li').each(function(e){

        if($(this).attr('data-tab') == 'tab-'+current){
            var $this3 = $(this);
            title = $this3.find('span').text();
            url = $this3.attr('data-url');
            tab_id = $this3.attr('data-tab');
            //Náº¿u Ä‘Ă£ load rá»“i thĂ¬ khĂ´ng load ná»¯a
            if(!$this3.hasClass('has-content')){
                $this3.addClass('has-content');

                getContentTab(url,"."+ datasection+" ."+tab_id);
            }
        }
    })
    $("."+ datasection+" .tab-titlexs span").text(title);
    $("."+ datasection+" .tab-content").removeClass('current');
    $("."+ datasection+" .tab-"+current).addClass('current');
}
// Get content cho tab
function getContentTab(url,selector){
    url = url+"?view=ajaxload";

    var dataLgg = $(selector).parent().find('.tab-1 .owl-carousel').attr('data-lgg-items');
    var loadding = '<div class="a-center"><svg height=30px style="enable-background:new 0 0 50 50"version=1.1 viewBox="0 0 24 30"width=24px x=0px xml:space=preserve xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink y=0px><rect fill=#333 height=10 opacity=0.2 width=4 x=0 y=10><animate attributeName=opacity attributeType=XML begin=0s dur=0.6s repeatCount=indefinite values="0.2; 1; .2"/><animate attributeName=height attributeType=XML begin=0s dur=0.6s repeatCount=indefinite values="10; 20; 10"/><animate attributeName=y attributeType=XML begin=0s dur=0.6s repeatCount=indefinite values="10; 5; 10"/></rect><rect fill=#333 height=10 opacity=0.2 width=4 x=8 y=10><animate attributeName=opacity attributeType=XML begin=0.15s dur=0.6s repeatCount=indefinite values="0.2; 1; .2"/><animate attributeName=height attributeType=XML begin=0.15s dur=0.6s repeatCount=indefinite values="10; 20; 10"/><animate attributeName=y attributeType=XML begin=0.15s dur=0.6s repeatCount=indefinite values="10; 5; 10"/></rect><rect fill=#333 height=10 opacity=0.2 width=4 x=16 y=10><animate attributeName=opacity attributeType=XML begin=0.3s dur=0.6s repeatCount=indefinite values="0.2; 1; .2"/><animate attributeName=height attributeType=XML begin=0.3s dur=0.6s repeatCount=indefinite values="10; 20; 10"/><animate attributeName=y attributeType=XML begin=0.3s dur=0.6s repeatCount=indefinite values="10; 5; 10"/></rect></svg></div>';

    $.ajax({
        type: 'GET',
        url: url,
        beforeSend: function() {
            $(selector).html(loadding);
        },
        success: function(data) {
            var content = $(data);

            $(selector).html(content.html());
            ajaxCarousel(selector,dataLgg);
            //Fix app
            if(window.BPR)
                return window.BPR.initDomEls(), window.BPR.loadBadges();
        },
        dataType: "html"
    });
}
// Ajax carousel
function ajaxCarousel(selector,dataLgg){
    $(selector+' .owl-carousel.ajax-carousel').each( function(){
        var xss_item = $(this).attr('data-xss-items');
        var xs_item = $(this).attr('data-xs-items');
        var sm_item = $(this).attr('data-sm-items');
        var md_item = $(this).attr('data-md-items');
        var lg_item = $(this).attr('data-lg-items');
        if(dataLgg !== typeof undefined){

        }
        var lgg_item = dataLgg;
        var margin=$(this).attr('data-margin');
        var dot=$(this).attr('data-dot');
        var nav=$(this).attr('data-nav');
        if (typeof margin !== typeof undefined && margin !== false) {
        } else{
            margin = 30;
        }
        if (typeof xss_item !== typeof undefined && xss_item !== false) {
        } else{
            xss_item = 1;
        }
        if (typeof xs_item !== typeof undefined && xs_item !== false) {
        } else{
            xs_item = 1;
        }
        if (typeof sm_item !== typeof undefined && sm_item !== false) {

        } else{
            sm_item = 3;
        }
        if (typeof md_item !== typeof undefined && md_item !== false) {
        } else{
            md_item = 3;
        }
        if (typeof lg_item !== typeof undefined && lg_item !== false) {
        } else{
            lg_item = 4;
        }
        if (typeof lgg_item !== typeof undefined && lgg_item !== false) {

        } else{
            lgg_item = lg_item;
        }

        if (typeof dot !== typeof undefined && dot !== true) {
            dot = dot;
        } else{
            dot = false;
        }
        if (typeof nav !== typeof undefined && nav !== true) {
            nav = nav;
        } else{
            nav = false;
        }
        $(this).owlCarousel({
            loop:false,
            margin:Number(margin),
            responsiveClass:true,
            dots:dot,
            nav:nav,
            navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
            responsive:{
                0:{
                    items:Number(xss_item),
                    margin:10
                },
                543:{
                    items:Number(xs_item)
                },
                768:{
                    items:Number(sm_item)
                },
                992:{
                    items:Number(md_item)
                },
                1200:{
                    items:Number(lg_item)
                },
                1500:{
                    items:Number(lgg_item)
                }
            }
        })
    })
}

/********************************************************
 # Coca Fashion
 ********************************************************/
function awe_flowersVietnamese(str) {
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
    str= str.replace(/-+-/g,"-");
    str= str.replace(/^\-+|\-+$/g,"");
    return str;
} window.awe_flowersVietnamese=awe_flowersVietnamese;

if($(".hidden-comment-alert-success").length){
    var title_head = $('.box-khuyenmai').parent().find('.title-head');;
    $('.comment-alert-success').hide();
    title_head.after($(".hidden-comment-alert-success"));
}
var end_slide_youtube = $('#box-video-youtube .modal-content');
$('.item.item-video').on('click', function(e) {
    e.preventDefault();
    var id_youtube_url =  $(this).data('videourl');
    var regex = /(\?v=|\&v=|\/\d\/|\/embed\/|\/v\/|\.be\/)([a-zA-Z0-9\-\_]+)/;
    var regexyoutubeurl = id_youtube_url.match(regex);
    var url = 'https://www.youtube.com/embed/' + regexyoutubeurl[2] + '?autoplay=1';
    end_slide_youtube.html('<iframe width="980" style="height: 552px;" src="'+url+'"></iframe>');

    var widthwindow = $(window).width();
    var width_iframe = widthwindow - 40;
    var height_iframe;
    if (widthwindow > 1024) {
        height_iframe = 552;
    } else {
        height_iframe = (width_iframe*315)/560;
    }
    $('#box-video-youtube iframe').css({
        "height": height_iframe + "px"
    });
});
$(window).on("orientationchange load resize", function() {
    var widthwindow = $(window).width();
    var width_iframe = widthwindow - 40;
    var height_iframe;
    if (widthwindow > 1024) {
        height_iframe = 552;
    } else {
        height_iframe = (width_iframe*315)/560;
    }
    $('#box-video-youtube iframe').css({
        "height": height_iframe + "px"
    });
});
$('#box-video-youtube').on('hidden.bs.modal', function () {
    end_slide_youtube.html('<iframe width="980" style="height: 552px;" src=""></iframe>');
});
/*Open filter*/
$('.open-filters').click(function(e){
    e.stopPropagation();
    $(this).toggleClass('openf');
    $('.dqdt-sidebar').toggleClass('openf');
    $('.cate-overlay3').toggleClass('open');
});

$('.cate-overlay3, .filter-item').click(function(e){
    $('.cate-overlay3.open').removeClass('open');
    $('.dqdt-sidebar.openf').toggleClass('openf');
    $('#open-filters.openf').toggleClass('openf');
});


$(document).on('click','.qtyplus',function(e){
    e.preventDefault();
    fieldName = $(this).attr('data-field');
    var currentVal = parseInt($('input[data-field='+fieldName+']').val());
    if (!isNaN(currentVal)) {
        $('input[data-field='+fieldName+']').val(currentVal + 1);
    } else {
        $('input[data-field='+fieldName+']').val(0);
    }
});

$(document).on('click','.qtyminus',function(e){
    e.preventDefault();
    fieldName = $(this).attr('data-field');
    var currentVal = parseInt($('input[data-field='+fieldName+']').val());
    if (!isNaN(currentVal) && currentVal > 1) {
        $('input[data-field='+fieldName+']').val(currentVal - 1);
    } else {
        $('input[data-field='+fieldName+']').val(1);
    }
});

$(document).on('click','.overlay, .close-popup, .btn-continue, .fancybox-close', function() {
    hidePopup('.awe-popup');
    setTimeout(function(){
        $('.loading').removeClass('loaded-content');
    },500);
    return false;
})

function callbackW() {
    iWishCheck();
    iWishCheckInCollection();
    $(".iWishAdd").click(function () {
        var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
        if (typeof iWishvId === 'undefined') {
            iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
        };
        var iWishpId = iWish$(this).attr('data-product');
        if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
            iWishvId = iWish$(this).attr('data-variant');
        }
        if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
            return false;
        }
        if (iwish_cid == 0) {
            iWishGotoStoreLogin();
        } else {
            var postObj = {
                actionx : 'add',
                cust: iwish_cid,
                pid: iWishpId,
                vid: iWishvId
            };
            iWish$.post(iWishLink, postObj, function (data) {
                if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
                var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
                var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
                if (result) {
                    if (Bizweb.template == "product") {
                        iWish$('.iWishAdd').addClass('iWishHidden'), iWish$('.iWishAdded').removeClass('iWishHidden');
                        if (redirect == 2) {
                            iWishSubmit(iWishLink, { cust: iwish_cid });
                        }
                    }
                    else if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
                        iWish$.each(iWish$('.iWishAdd'), function () {
                            var _item = $(this);
                            if (_item.attr('data-variant') == iWishvId) {
                                _item.addClass('iWishHidden'), _item.parent().find('.iWishAdded').removeClass('iWishHidden');
                            }
                        });
                    }
                }
            }, 'html');
        }
        return false;
    });
    $(".iWishAdded").click(function () {
        var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
        if (typeof iWishvId === 'undefined') {
            iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
        };
        var iWishpId = iWish$(this).attr('data-product');
        if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
            iWishvId = iWish$(this).attr('data-variant');
        }
        if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
            return false;
        }
        if (iwish_cid == 0) {
            iWishGotoStoreLogin();
        } else {
            var postObj = {
                actionx: 'remove',
                cust: iwish_cid,
                pid: iWishpId,
                vid: iWishvId
            };
            iWish$.post(iWishLink, postObj, function (data) {
                if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
                var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
                var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
                if (result) {
                    if (Bizweb.template == "product") {
                        iWish$('.iWishAdd').removeClass('iWishHidden'), iWish$('.iWishAdded').addClass('iWishHidden');
                    }
                    else if (Bizweb.template == 'collection' || Bizweb.template == 'index') {
                        iWish$.each(iWish$('.iWishAdd'), function () {
                            var _item = $(this);
                            if (_item.attr('data-variant') == iWishvId) {
                                _item.removeClass('iWishHidden'), _item.parent().find('.iWishAdded').addClass('iWishHidden');
                            }
                        });
                    }
                }
            }, 'html');
        }
        return false;
    });

}  window.callbackW=callbackW;


$('.site-footer h4').on('click', function(e){
    e.preventDefault();
    var $this = $(this);
    $this.parents('.site-footer .footer-widget').find('ul.has-toggle').stop().slideToggle();
    $(this).toggleClass('active')
    return false;
});
$('.before-search').on('click', function(){
    $('.search').addClass('active');
    $('.after-search').addClass('active');
});
$('.after-search').on('click', function(){
    $(this).removeClass("active");
    $(".search").removeClass("active");
});