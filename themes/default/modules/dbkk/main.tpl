<!-- BEGIN: main -->
<script src="{NV_BASE_SITEURL}themes/default/modules/dbkk/plugins/jquery.autocomplete.js"></script> 
<div class="parent container">
    <div class="box_seach box_search_more">
        <p class="text-right" style="float:right">
            <label class="inline Power-by">
                <a href="" target="_blank">Nguồn: diemthi.tuyensinh247.com</a>
            </label>
        </p>
        <p class="bs_01 tabs">
            <label class="bs_dttn inline" style="float:left">
                <a href="#tab1">Tra cứu Mã Tỉnh, Huyện, Xã năm 2021</a>
            </label>
        </p>
        <div class="tab_container">
            <ul style="padding: 0px; margin: 0px; display: block;" id="tab1" class="tab_content">
                <li>
                    <div class="bs_02 clearfix"></div>
                    <p class="clearfix p-seach" style="margin-top:36px;text-align:left">
                        <strong style="color: red;font-size: 14px;">Lưu ý: Xã ĐBKK áp dụng cho thí sinh làm hồ sơ trước ngày 4/6/2021</strong>
                        <br>
                        <strong style="color: black;font-size: 16px;" class="mb-10">Nhập tên huyện có dấu hoặc không dấu vào ô dưới
                            đây</strong>
                        <br>
                        <label class="input-search">
                            <input class="bg_input acInput" type="text" id="ac1"
                                style="width:100%; height:42px;font-size: 16px;border: 2px solid red;font-weight: 400;"
                                placeholder="Nhập tên huyện vào đây">
                        </label>
                        <input type="hidden" value="" id="salias" name="salias">
                        <input type="hidden" value="" id="scode" name="scode">
                    </p>
                </li>
            </ul>
        </div>
        <div id="result"></div>
    </div>
</div>
<script>
    var dataDistrict = {DATA};
    $(function() {
        /* Cột giữa trang chủ */
        $(".tab_content").hide();
       
        $(".tab_content:first").show();
        
        $("p.tabs label").click(function () {
        
        $("p.tabs label").removeClass("bs_dttn", "bs_dhcd");
       
        $("p.tabs label").addClass("bs_dhcd");
       
        $(this).addClass("bs_dttn").removeClass("bs_dhcd");
      
        $(".tab_content").hide();

        var activeTab = $(this).find("a").attr("href");
       
        $(activeTab).fadeIn();
            return false;
        });


        $("#ac1").autocomplete({
            sortFunction: function (a, b, filter) {
                var f = filter.toLowerCase();
                var fl = f.length;
                var a1 = a.value.toLowerCase().substring(0, fl) == f ? '0' : '1';
                var a1 = a1 + String(a.data[0]).toLowerCase();
                var b1 = b.value.toLowerCase().substring(0, fl) == f ? '0' : '1';
                var b1 = b1 + String(b.data[0]).toLowerCase();
                if (a1 > b1) {
                    return 1;
                }
                if (a1 < b1) {
                    return - 1;
                }
                return 0;
            },
            showResult: function (value, data) {
                return value;
            },
            onItemSelect: function (item) {
                var em_info = item.data;
                loadSchool(em_info[0]);
            },
            onNoMatch: function (item) {
            console.log("no data found");
            },
          data: dataDistrict
        });
        
    });
    function checkSubmit(type) {
        if (type == 1) {
            var scode = $("#scode").val();
            if (scode == "") {
                alert("Bạn chưa nhập thông tin để tra cứu mã huyện.");
                return false;
            }

            var salias = $("#salias").val();
            url = BASEURL + "diem-chuan/" + salias + "-" + scode + ".html";
        }
        var screenW = screen.width;
        var screenH = screen.height;
        window.open(url, 'mywin', 'left=0,top=0,width=' + screenW + ',height=' + screenH + ',toolbar=1,resizable=1,scrollbars=1,menubar=yes,Navigation toolbar=yes');
    }

    function loadSchool(district_code){
        $.ajax({
            type : 'POST',
            url : script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&nocache=' + new Date().getTime(),
            data :  ({
                dcode: district_code
            }),
            success : function(resp) {
                //console.log(resp)
                $("#result").html(resp);
            }
        });
    }
</script>
<!-- END: main -->

{* $.ajax({
    type : 'POST',
    url : script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&nocache=' + new Date().getTime(),
    data :  ({
        searchq: inputValue
    }),
    success : function(json) {
        console.log(json)
       // $("#result").html(suc);
    }
}); *}