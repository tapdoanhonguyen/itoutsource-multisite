/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2018 TDFOSS.,LTD. All rights reserved
 * @Createdate Tue, 02 Jan 2018 08:34:29 GMT
 */


function delete_service(id, custumer)
{
	var r = confirm("Bạn có chắc chắn muốn xóa dịch vụ.");
	if (r == true) {
		
		$.ajax({
			type : 'POST',
			url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail',
			data : {id_delete : id},
			success : function(html) {
				
				location.reload();
			}
		});
		
	}
}

function edit_service(id)
{
	if(id > 0)
	{
		 $.ajax({
			type : 'POST',
			url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail&id_edit='+ id,
			data : {id_edit : id},
			success : function(html) {
				$('#item-detail').html(html);
				var link_action = nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail';
				$('#frm-submit').attr('action', link_action)
			}
		});
	}
	
} 
 
$('.checkbox_all_service').click(function(){
	if($(this).prop( "checked"))
	{
		$('.checkbox_service_item').prop( "checked", true );
	}
	else
		$('.checkbox_service_item').prop( "checked", false );
});


$('.export_service_invoice span').click(function(){
	
	var array_service = [];
	$('.checkbox_service_item').each(function(index,value){
		if($(this).prop('checked'))
		{
			array_service.push($(this).val());
		}
	});
	
	var custumer = $('.checkbox_all_service').val();
	
	if(array_service.length > 0 && custumer > 0)
	{
		window.location.href  = script_name + '?' + nv_name_variable + '=invoice&' + nv_fc_variable + '=content&custumer='+ custumer +'&array_service='+ array_service;
	}
	else
	{
		alert('Bạn chưa chọn dịch vụ, Vui lòng chọn dịch vụ để xuất hóa đơn.');
	}
	
});

function nv_list_action(action, url_action, del_confirm_no_post) {
    var listall = [];
    $('input.post:checked').each(function() {
        listall.push($(this).val());
    });
    if (listall.length < 1) {
        alert(del_confirm_no_post);
        return false;
    }
    if (action == 'delete_list_id') {
        if (confirm(nv_is_del_confirm[0])) {
            $.ajax({
                type : 'POST',
                url : url_action,
                data : 'delete_list=1&listall=' + listall,
                success : function(data) {
                    var r_split = data.split('_');
                    if (r_split[0] == 'OK') {
                        window.location.href = window.location.href;
                    } else {
                        alert(nv_is_del_confirm[2]);
                    }
                }
            });
        }
    }
    return false;
}

function nv_table_row_click(e, t, n) {
    var r = e.target.tagName.toLowerCase(), i = e.target.parentNode.tagName.toLowerCase(), a = e.target.parentNode.parentNode.parentNode;
    return void ("button" != r && "a" != r && "button" != i && "a" != i && "td" != i && (n ? window.open(t) : window.location.href = t))
}

function nv_customer_export_option(url_param, title) {
    var selected_id = [];
    $("form").find("input[name='idcheck[]']:checked").each(function() {
        selected_id.push($(this).val());
    });

    $.ajax({
        type : 'POST',
        url : nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=export&nocache=' + new Date().getTime(),
        data : 'option=1&selected_id=' + selected_id.join(',') + '&' + url_param,
        success : function(html) {
            modalShow(title, html);
            $('.modal-content').css('width', '100%');
        }
    });
}