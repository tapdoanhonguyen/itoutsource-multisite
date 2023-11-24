<!-- BEGIN: main -->
<div class="text-center mt-4" style="margin-top: 10px">
    <p class="" id="show-mess"></p>    
</div>
<div id="accordion">
    <!-- BEGIN: catid -->
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#category_{CATS.catid}">
         {CATS.title} 
        </a>
      </div>
      <div id="category_{CATS.catid}" class="collapse body-gpt accordion-content-{CATS.catid}" data-parent="#accordion" data-cate-id="{CATS.catid}"></div>
    </div>
    <!-- END: catid -->
</div>
<div class="text-center mt-4" style="margin-top: 10px">
    <p class="submit"><input type="submit" name="submit" id="submit-run" class="button button-green" value="Chạy chương trình"></p>    
</div>
<script>
    const loading = '<div class="right-wrapper"> <div class="spinnerIconWrapper"> <div class="spinnerIcon"></div> </div> <div class="finished-text"> Hãy quay lại sau sẽ có nội dung khác cho bạn </div> </div>';
    const load_mess = '<span class="loading-mess"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/><path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/></svg></span> <span class="green-text">Running...</span>';
    //script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=city&action='+ mod +'&nocache=' + new Date().getTime(),
    function save_key() {
        $('.save-key-url').click(function(event){

            var cate_id = $(this).attr('data-cate-id');
            console.log('save-key-url');
            console.log(cate_id);
            var input_keyword = $('#keyword_' + cate_id).val();
            var input_keyword_active = $('#keyword_active_' + cate_id).val();
            $(document).ready(function() {
                $.ajax({
                    method: "POST",
                    url: '{FORM_AJAX}',
                    data: {
                        action_save_key: 1,
                        cate_id: cate_id,
                        input_keyword: input_keyword,
                        input_keyword_active: input_keyword_active
                    },
                    beforeSend: function(){
                        $('<div class="modal-backdrop fade show"></div>').appendTo($('body').append(loading));
                    },
                    success: function(content){
                        setTimeout(function () {
                            $('.modal-backdrop').remove();
                            $('.right-wrapper').remove();
                            $('.accordion-content-' + cate_id).html(content);
                            save_key();
                        }, 100);
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.log(error);
                    }
                });
            });
        });
    }
    $(function() {
        $(".collapse").on('show.bs.collapse', function(e) {
            var cate_id = $(this).attr('data-cate-id');
            $.ajax({
                method: "POST",
                url: '{FORM_AJAX}',
                data: {
                    act_load_key: 1,
                    cate_id: cate_id
                },
                beforeSend: function(){
                    $('<div class="modal-backdrop fade show"></div>').appendTo($('body').append(loading));
                },
                success: function(content){
                    setTimeout(function () {
                        $('.modal-backdrop').remove();
                        $('.right-wrapper').remove();
                        $('.accordion-content-' + cate_id).html(content);
                        save_key();
                    }, 100);
                }
            });
        }).on('hidden.bs.collapse', function(event) {
            $(this).html('');
        });

        $('#submit-run').click(function() {
			var cate_id = 1;
            $.ajax({
                method: "POST",
                url: '{FORM_SUBMIT}',
                data: {
                    act_load_key: 1,
                    cate_id: cate_id
                },
                beforeSend: function(){
                    $('#show-mess').html(load_mess);
                },
                success: function(content){
                    console.log(content);
                    // setTimeout(function () {
                    //     $('.modal-backdrop').remove();
                    //     $('.right-wrapper').remove();
                    //     $('.accordion-content-' + cate_id).html(content);
                    //     save_key();
                    // }, 100);
                }
            });
        })

    });
    
</script>
<!-- END: main -->