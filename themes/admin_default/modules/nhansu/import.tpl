<!-- BEGIN: main -->
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" enctype="multipart/form-data" name="readexcel" id="readexcel" method="post">
    <div class="container-fluid">
        <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
            <div style="padding: 20px;background: #DBE6FF">
                Xem mẫu excel tại
                <a href="/uploads/{MODULE_NAME}/import.xlsx">Đây</a>
            </div>
        </div>
        <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24" style="margin-top: 20px;">

            <div style="padding: 20px;background: #EEEEEE">
                <div style="margin-top: 20px;">
                    <input type="file" name="excel" id="excel" required />
                </div>
                <div style="text-align: center;">
                    <input type="submit" value="Tải lên" name="import" class="btn btn-primary" />
                </div>
            </div>
        </div>

    </div>
</form>
<!-- END: main -->