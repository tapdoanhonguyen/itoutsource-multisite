/**
 * @Project NUKEVIET 4.x
 * @Author TDFOSS.,LTD (contact@tdfoss.vn)
 * @Copyright (C) 2018 TDFOSS.,LTD. All rights reserved
 * @Createdate Sat, 13 Jan 2018 13:35:09 GMT
 */

$(document).ready(function() {
    $('.loading').click(function() {
        if ($.validator) {
            var valid = $(this).closest('form').valid();
            if (valid) {
                $('body').append('<div class="ajax-load-qa"></div>');
            }
        } else {
            var valid = $(this).closest('form').find('input:invalid').length;
            if (valid == 0) {
                $('body').append('<div class="ajax-load-qa"></div>');
            }
        }
    });
    
    $('#addfile').click(function(e) {
        e.preventDefault();
        var html = '';
        html += '<div class="upload_fileupload m-bottom">';
        html += '    <input type="file" name="upload_fileupload[]" />';
        html += '</div>';
        $('#listfile').append(html);
    });
    
    $('.open_file').click(function() {
        var content = $('#' + $(this).data('key'));
        content.find(':first-child').attr('src', content.data('src'));
        modalShow('', content.html());
        $('#sitemodal .modal-dialog').css('max-width', 900);
    });
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
                    if (trim(r_split[0]) == 'OK') {
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

function nv_chang_status(vid) {
    var nv_timer = nv_settimeout_disable('change_status_' + vid, 1000);
    var new_status = $('#change_status_' + vid).val();
    $.post(nv_base_siteurl + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail&nocache=' + new Date().getTime(), 'change_status=1&id=' + vid + '&new_status=' + new_status, function(res) {
        var r_split = res.split("_");
        if (trim(r_split[0]) != 'OK') {
            alert(nv_is_change_act_confirm[2]);
            clearTimeout(nv_timer);
        }
        return;
    });
    return;
}
function nv_chang_priority(vid) {
    var nv_timer = nv_settimeout_disable('change_priority_' + vid, 1000);
    var new_priority = $('#change_priority_' + vid).val();
    $.post(nv_base_siteurl + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail&nocache=' + new Date().getTime(), 'change_priority=1&id=' + vid + '&new_priority=' + new_priority, function(res) {
        var r_split = res.split("_");
        if (r_split[0] != 'OK') {
            alert(nv_is_change_act_confirm[2]);
            clearTimeout(nv_timer);
        }
        return;
    });
    return;
}
function nv_chang_cat_status(vid) {
    var nv_timer = nv_settimeout_disable('change_cat_status_' + vid, 1000);
    var new_status = $('#change_cat_status_' + vid).val();
    $.post(nv_base_siteurl + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail-cat&nocache=' + new Date().getTime(), 'change_status=1&id=' + vid + '&new_status=' + new_status, function(res) {
        var r_split = res.split("_");
        if (trim(r_split[0]) != 'OK') {
            alert(nv_is_change_act_confirm[2]);
            clearTimeout(nv_timer);
        }
        return;
    });
    return;
}
function nv_chang_cat_priority(vid) {
    var nv_timer = nv_settimeout_disable('change_cat_priority_' + vid, 1000);
    var new_priority = $('#change_cat_priority_' + vid).val();
    $.post(nv_base_siteurl + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail-cat&nocache=' + new Date().getTime(), 'change_priority=1&id=' + vid + '&new_priority=' + new_priority, function(res) {
        var r_split = res.split("_");
        if (r_split[0] != 'OK') {
            alert(nv_is_change_act_confirm[2]);
            clearTimeout(nv_timer);
        }
        return;
    });
    return;
}
function fix_news_image() {
    var news = $('#description'), newsW, w, h;
    if (news.length) {
        var newsW = news.innerWidth();
        $.each($('img', news), function() {
            if (typeof $(this).data('width') == "undefined") {
                w = $(this).innerWidth();
                h = $(this).innerHeight();
                $(this).data('width', w);
                $(this).data('height', h);
            } else {
                w = $(this).data('width');
                h = $(this).data('height');
            }
            
            if (w > newsW) {
                $(this).prop('width', newsW - 30);
                $(this).prop('height', h * newsW / w);
            }
        });
    }
}

$(window).on('load', function() {
    fix_news_image();
});

$(window).on("resize", function() {
    fix_news_image();
});



function nv_task_content(taskid, projectid, catid) {
    $.ajax({
        type : 'POST',
        url : nv_base_siteurl + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=task&' + nv_fc_variable + '=content&nocache=' + new Date().getTime(),
        data : 'ajax=1&id=' + taskid + '&projectid=' + projectid + '&catid=' + catid,
        success : function(html) {
            modalShow('', html);
            $('#sitemodal .modal-dialog').css('max-width', 900);
        }
    });
}