<!-- BEGIN: main -->
    <link rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/nouislider.min.css">
<h3 class="margin-bottom-sm">Khoảng giá:</h3>
<div class="css-17pi3k">
 <div id="slider-value" class="css-12q959z" direction="row"><span id="slider-display-value">0</span></div>
 
 <div id="slider"></div>
 </div>   
    <script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/nouislider.min.js"></script>
 
    <script>
	function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
        // Lấy tham chiếu đến div chứa thanh kéo
var slider = document.getElementById('slider');

// Lấy tham chiếu đến div hiển thị giá trị
var sliderValue = document.getElementById('slider-display-value');

// Khởi tạo thanh kéo
noUiSlider.create(slider, {
    start: [{PRICESTART}, {PRICEEND}], // Giá trị ban đầu cho điểm đầu và cuối
    step: {PRICESTEP}, // Bước nhảy
	connect: true, // Kết nối hai nút slider với thanh màu
    range: {
        'min': {PRICEMIN}, // Giá trị tối thiểu
        'max': {PRICEMAX} // Giá trị tối đa
    },
    format: {
        to: function (value) {
            return Math.round(value); // Định dạng giá trị
        },
        from: function (value) {
            return value;
        }
    }
});

// Thêm sự kiện 'update' để theo dõi giá trị thay đổi
slider.noUiSlider.on('update', function (values, handle) {
	var rewrite_enable = {REWRITE_ENABLE};
    var startValue = parseFloat(values[0]);

    var endValue = parseFloat(values[1]);
	var formattedStartValue = startValue.toLocaleString(); // Định dạng thành chuỗi với dấu cách hàng nghìn
    var formattedEndValue = endValue.toLocaleString(); // Định dạng thành chuỗi với dấu cách hàng nghìn
    sliderValue.innerHTML = '';
    sliderValue.innerHTML = '<span class="css-hhrj34">' + formattedStartValue + 'đ</span><span class="css-hhrj34">' + formattedEndValue + 'đ</span>';
	var url_group = [];
		listid = '', i = 0;
        $('input[name="groupid[]"]:checked').each(function() {
			url_group.push($(this).attr('data-alias'));
            if (i > 0) {
                listid += ',' + $(this).val();
            } else {
                listid += $(this).val();
            }
            $(this).parent().addClass('active');
            i++;
        });
		window.history.pushState("", "", '{LINK_URL}' + ((url_group.length || rewrite_enable) ? '/' : '') + url_group.join('/') + ((url_group.length && rewrite_enable)  ? '/' : ''));
        $.ajax({
            type: "POST",
            url: "{AJAX_URL}",
            data: 'ajax=1&catid={CATID}&listgroupid=' + listid + '&pricestart=' + startValue + '&priceend=' + endValue,
            success: function(data) {
				$('#shops-content').innerHTML = "";
                $('#category').html(data);
                $(".ajax-load-qa").hide();
            },
            error: function() {
                $('.ajax-load-qa').hide();
            },
            timeout : 3000
        });
});

// Tùy chỉnh màu của thanh màu
var middleBar = slider.querySelector('.noUi-connect');
middleBar.style.background = 'blue'; // Đổi màu thành màu xanh

// Tùy chỉnh màu của nút slider
var sliderHandles = slider.querySelectorAll('.noUi-handle');
sliderHandles.forEach(function (handle) {
    handle.style.background = 'white'; // Đổi màu nút slider thành màu đỏ
});
    </script>
<style>
.css-1realo9 {
    margin: 0px 0px 0.5rem;
    padding: 0px;
    border-style: none;
    border-width: 1px;
    border-color: unset;
    opacity: 1;
    color: inherit;
    font-weight: 500;
    text-decoration: unset;
    font-size: 13px;
    line-height: 24px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: unset;
    max-width: unset;
    min-width: unset;
    transition: color 0.3s ease 0s;
}
.css-17pi3k {
    border-style: none;
    border-width: 1px;
    border-color: unset;
    opacity: 1;
	padding: 15px;
}
.css-12q959z {
    border-style: none;
    border-width: 1px;
    border-color: unset;
    opacity: 1;
    margin-bottom: 0.25rem;
    display: flex;
    flex-flow: row;
    gap: 0rem;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: baseline;
    align-items: baseline;
    position: relative;
}
.css-hhrj34 {
    opacity: 1;
    display: inline-block;
    color: inherit;
    font-weight: inherit;
    width: 60px;
    padding: 0.25rem;
    border: 1px solid rgb(228, 229, 240);
    font-size: 1.0rem;
    border-radius: 0.25rem;
    background-color: rgb(255, 255, 255);
    z-index: 0;
    text-align: center;
    margin: 10px;
	color: #0a569e;
}
.css-1sv7nws {
    position: relative;
    height: 3px;
    width: 100%;
}
.css-tipbfv {
    position: relative;
    width: 100%;
    background-color: #F6F6F6;
    height: 100%;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
}
.css-7rhk5r {
    position: absolute;
    top: 0;
    height: 100%;
}
.css-1sv7nws>.slider-track .slider-track-fill {
    background-color: #1435C3;
}



.css-1mc3642 {
    position: absolute;
    border-radius: 1000px;
    top: 0;
    -webkit-transform: translate(-25%, -50%);
    -moz-transform: translate(-25%, -50%);
    -ms-transform: translate(-25%, -50%);
    transform: translate(-25%, -50%);
    background-color: #FFFFFF;
    text-align: center;
    cursor: pointer;
    top: 50%;
}
.css-1sv7nws>.slider-thumb {
    box-shadow: 0px 0px 0px 1.5px #1435C3 inset;
    width: 9px;
    height: 9px;
}
.css-1nfxeg5 {
    visibility: hidden;
    background-color: #000000;
    color: #fff;
    text-align: center;
    padding: 2px 3px;
    position: absolute;
    z-index: 1;
    font-size: 0.625rem;
    border-radius: 3px;
    -webkit-transform: translate(-50%, -150%);
    -moz-transform: translate(-50%, -150%);
    -ms-transform: translate(-50%, -150%);
    transform: translate(-50%, -150%);
    min-width: 1.25rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.css-1nfxeg5:after {
    content: '';
    width: 8px;
    height: 5px;
    bottom: -5px;
    border-top: 4px solid #000000;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    position: absolute;
}
</style>

<!-- END: main -->


<div type="subtitle" class="css-1realo9">Khoảng giá</div>
<div class="css-17pi3k">
<div class="css-12q959z" direction="row">

</div>
<div class="css-1wtn57e">
<div color="primary" class="css-1sv7nws">
<div class="slider-track css-tipbfv">
<div class="slider-track-fill css-7rhk5r" style="width: 62.4%; left: 0%;">
</div>
</div>
<div class="slider-thumb css-1mc3642" role="slider" style="left: calc(0%);">
<span class="tooltip css-1nfxeg5" style="visibility: hidden;">0</span>
</div>
<div class="slider-thumb css-1mc3642" role="slider" style="left: 62.4%;">
<span class="tooltip css-1nfxeg5" style="visibility: hidden;">78,000,000</span>
</div>
</div>
</div>
</div>
<style>
.css-1realo9 {
    margin: 0px 0px 0.5rem;
    padding: 0px;
    border-style: none;
    border-width: 1px;
    border-color: unset;
    opacity: 1;
    color: inherit;
    font-weight: 500;
    text-decoration: unset;
    font-size: 13px;
    line-height: 24px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: unset;
    max-width: unset;
    min-width: unset;
    transition: color 0.3s ease 0s;
}
.css-17pi3k {
    border-style: none;
    border-width: 1px;
    border-color: unset;
    opacity: 1;
}
.css-12q959z {
    border-style: none;
    border-width: 1px;
    border-color: unset;
    opacity: 1;
    margin-bottom: 0.25rem;
    display: flex;
    flex-flow: row;
    gap: 0rem;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: baseline;
    align-items: baseline;
    position: relative;
}
.css-hhrj34 {
    opacity: 1;
    display: inline-block;
    color: inherit;
    font-weight: inherit;
    width: 75px;
    padding: 0.25rem;
    border: 1px solid rgb(228, 229, 240);
    font-size: 0.7rem;
    border-radius: 0.25rem;
    background-color: rgb(255, 255, 255);
    z-index: 0;
    text-align: center;
}
.css-1sv7nws {
    position: relative;
    height: 3px;
    width: 100%;
}
.css-tipbfv {
    position: relative;
    width: 100%;
    background-color: #F6F6F6;
    height: 100%;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
}
.css-7rhk5r {
    position: absolute;
    top: 0;
    height: 100%;
}
.css-1sv7nws>.slider-track .slider-track-fill {
    background-color: #1435C3;
}



.css-1mc3642 {
    position: absolute;
    border-radius: 1000px;
    top: 0;
    -webkit-transform: translate(-25%, -50%);
    -moz-transform: translate(-25%, -50%);
    -ms-transform: translate(-25%, -50%);
    transform: translate(-25%, -50%);
    background-color: #FFFFFF;
    text-align: center;
    cursor: pointer;
    top: 50%;
}
.css-1sv7nws>.slider-thumb {
    box-shadow: 0px 0px 0px 1.5px #1435C3 inset;
    width: 9px;
    height: 9px;
}
.css-1nfxeg5 {
    visibility: hidden;
    background-color: #000000;
    color: #fff;
    text-align: center;
    padding: 2px 3px;
    position: absolute;
    z-index: 1;
    font-size: 0.625rem;
    border-radius: 3px;
    -webkit-transform: translate(-50%, -150%);
    -moz-transform: translate(-50%, -150%);
    -ms-transform: translate(-50%, -150%);
    transform: translate(-50%, -150%);
    min-width: 1.25rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.css-1nfxeg5:after {
    content: '';
    width: 8px;
    height: 5px;
    bottom: -5px;
    border-top: 4px solid #000000;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    position: absolute;
}
</style>