<!-- BEGIN: main -->
<div class="panel panel-default panel-filter-product filter_product">
    <div class="ajax-load-qa"></div>
    <div class="panel-body">
        <!-- BEGIN: group -->
        <div class="row">
            <div class="col-md-24 flex">
                <h3 class="margin-bottom-sm">{MAIN_GROUP.title}:</h3>
				<!-- BEGIN: show_sub_group -->
				
				<svg fill="none" viewBox="0 0 24 24" class="css-500jnn" color="textPrimary" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
				<path d="M5 8.5L12 15.5L19 8.5" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
				<!-- END: show_sub_group -->
				<!-- BEGIN: no_sub_group -->
				<svg fill="none" viewBox="0 0 24 24" class="active css-500jnn" color="textPrimary" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
				<path d="M5 8.5L12 15.5L19 8.5" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
				<!-- END: no_sub_group -->
            </div>
            <!-- BEGIN: sub_group -->
            <div class="col-md-24 sub-groups {class}" {hide}>
                <div class="clearfix" id="{CATID}-{MAIN_GROUP.groupid}">
                    <!-- BEGIN: loop -->
                    <!-- BEGIN: checkbox -->
                    <label><input type="checkbox" title="{SUB_GROUP.title}" data-alias="{MAIN_GROUP.alias}--{SUB_GROUP.alias}" name="groupid[]" value="{SUB_GROUP.groupid}" {SUB_GROUP.checked}>{SUB_GROUP.title}</label>
                    <!-- END: checkbox -->
                    <!-- BEGIN: label -->
                    <label class="label_group<!-- BEGIN: active --> active<!-- END: active -->"><input type="checkbox" title="{SUB_GROUP.title}" data-alias="{MAIN_GROUP.alias}--{SUB_GROUP.alias}" name="groupid[]" value="{SUB_GROUP.groupid}" {SUB_GROUP.checked}>{SUB_GROUP.title}</label>
                    <!-- END: label -->
                    <!-- BEGIN: image -->
                    <label class="label_group<!-- BEGIN: active --> active<!-- END: active -->" style="background-image: url('{SUB_GROUP.image}')"><input type="checkbox" title="{SUB_GROUP.title}" data-alias="{MAIN_GROUP.alias}--{SUB_GROUP.alias}" name="groupid[]" value="{SUB_GROUP.groupid}" {SUB_GROUP.checked}></label>
                    <!-- END: image -->
                    <!-- END: loop -->
					
					
                </div>
				<!-- BEGIN: more -->
				<div id="{CATID}-{MAIN_GROUP.groupid}-more" >
					<a href="javascript:void(0);" onclick="show_more_groups({CATID},{MAIN_GROUP.groupid})"> xem thêm </a>
				</div>
				<!-- END: more -->
                <hr class="sub-break">
            </div>
            <!-- END: sub_group -->
        </div>
        <!-- END: group -->
    </div>
</div>

<script type="text/javascript" data-show="after">
$(document).ready(function() {
    var rewrite_enable = {REWRITE_ENABLE};
     $(document).on('click', 'input[name="groupid[]"]', function() {
        $('.ajax-load-qa').show();
        $('.filter_product .label_group').removeClass('active');
        var listid = '', i = 0;
        var url_group = [];
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
            data: 'ajax=1&catid={CATID}&listgroupid=' + listid,
            success: function(data) {
                $('#category').html(data);
                $(".ajax-load-qa").hide();
                $('html, body').animate({
                    scrollTop: $("#category").offset().top
                }, 200);
            },
            error: function() {
                $('.ajax-load-qa').hide();
            },
            timeout : 3000
        });
    });
	




	function show_more_groups(catid,groupid){
		var listid = '', i = 0;
        $('input[name="groupid[]"]').each(function() {
            url_group.push($(this).attr('data-alias'));
            if (i > 0) {
                listid += ',' + $(this).val();
            } else {
                listid += $(this).val();
            }
            $(this).parent().addClass('active');
            i++;
        });
		$.ajax({
            type: "POST",
            url: "{AJAX_URL}",
            data: 'ajax=1&mode=ajax_sub_groups&catid=' + catid + '&groupid=' + groupid + '&listgroupid=' + listid,
            success: function(data) {
				$.each(JSON.parse(data),function(key,groups){
					console.log(groups);
					$('#' + catid + '-' +  groupid).append('<label><input type="checkbox" title="' + groups.title + '" data-alias="' + groups.mainalias + '--' + groups.alias + '" name="groupid[]" value="' + groups.groupid + '" >' + groups.title + '</label>');
                });
				$('#' + catid + '-' +  groupid + '-more').hide();
				$(".ajax-load-qa").hide();
                $('html, body').animate({
                    scrollTop: $("#category").offset().top
                }, 200);
            },
            error: function() {
                $('.ajax-load-qa').hide();
            },
            timeout : 3000
        });
	}
	
});
var svgElements = document.querySelectorAll("svg.css-500jnn");

	// Thêm sự kiện click cho từng dòng SVG
	svgElements.forEach(function(svgElement) {
		var clickEvent = new Event("click", {
			bubbles: true,
			cancelable: true
		});

		// Tự động kích hoạt sự kiện click cho từng dòng SVG
		svgElement.dispatchEvent(clickEvent);
		svgElement.addEventListener("click", function() {
			// Kiểm tra xem dòng SVG đã có lớp "active" chưa
			var parentElement = svgElement.parentElement;
			var nextElementSibling = parentElement.nextElementSibling
			console.log(parentElement.nextElementSibling);
			if (!svgElement.classList.contains("active")) {
				// Nếu chưa có, thêm lớp "active" vào trước lớp "css-500jnn"
				svgElement.classList.add("active");
				if (!nextElementSibling.classList.contains("show")) {
					nextElementSibling.classList.add("show");
				}else{
					nextElementSibling.classList.remove("show");
				}
			} else {
				// Nếu đã có, loại bỏ lớp "active" để trở về trạng thái ban đầu
				svgElement.classList.remove("active");
				nextElementSibling.classList.remove("show");
				if (!nextElementSibling.classList.contains("hide")) {
					nextElementSibling.classList.add("hide");
				}
			}
		});
	});

function show_more_groups(catid,groupid){
	var rewrite_enable = {REWRITE_ENABLE};
		var url_group = [];
		listid = '', i = 0;
        $('input[name="groupid[]"]').each(function() {
			url_group.push($(this).attr('data-alias'));
            if (i > 0) {
                listid += ',' + $(this).val();
            } else {
                listid += $(this).val();
            }
            $(this).parent().addClass('active');
            i++;
        });
		$.ajax({
            type: "POST",
            url: "{AJAX_URL}",
            data: 'ajax=1&mode=ajax_sub_groups&catid=' + catid + '&groupid=' + groupid + '&listgroupid=' + listid,
            success: function(data) {
				$.each(JSON.parse(data),function(key,groups){
					$('#' + catid + '-' +  groupid).append('<label><input type="checkbox" title="' + groups.title + '" data-alias="' + groups.mainalias + '--' + groups.alias + '" name="groupid[]" value="' + groups.groupid + '" >' + groups.title + '</label>');
                });
				$('#' + catid + '-' +  groupid + '-more').hide();
				
				$(".ajax-load-qa").hide();
            },
            error: function() {
                $('.ajax-load-qa').hide();
            },
            timeout : 3000
        });
		
	}
</script>
<!-- END: main -->
