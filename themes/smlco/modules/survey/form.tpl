<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <input type="hidden" name="id" value="{ROW.id}" />
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.usercomp}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="usercomp" value="{ROW.usercomp}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.desktop}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="desktop" value="{ROW.desktop}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.laptop}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="laptop" value="{ROW.laptop}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.print}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="print" value="{ROW.print}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.scan}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="scan" value="{ROW.scan}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.window}</strong></label>
        <div class="col-sm-19 col-md-20">

                    <!-- BEGIN: checkbox_window -->
                        <label><input class="form-control" type="checkbox" name="window[]" value="{OPTION.key}" {OPTION.checked}>{OPTION.title}</label>
                    <!-- END: checkbox_window -->
                        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.server}</strong></label>
        <div class="col-sm-19 col-md-20">

            <!-- BEGIN: radio_server -->
                <label><input class="form-control" type="radio" name="server" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
            <!-- END: radio_server -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.servernum}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="servernum" value="{ROW.servernum}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.serverwindow}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="serverwindow" value="{ROW.serverwindow}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.telecom}</strong></label>
        <div class="col-sm-19 col-md-20">

            <!-- BEGIN: radio_telecom -->
                <label><input class="form-control" type="radio" name="telecom" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
            <!-- END: radio_telecom -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.tel_model}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="tel_model" value="{ROW.tel_model}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.tel_mobile}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="tel_mobile" value="{ROW.tel_mobile}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.tel_ext}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="tel_ext" value="{ROW.tel_ext}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.camera}</strong></label>
        <div class="col-sm-19 col-md-20">

            <!-- BEGIN: radio_camera -->
                <label><input class="form-control" type="radio" name="camera" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
            <!-- END: radio_camera -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.camnum}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="camnum" value="{ROW.camnum}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.itos}</strong></label>
        <div class="col-sm-19 col-md-20">

            <!-- BEGIN: radio_itos -->
                <label><input class="form-control" type="radio" name="itos" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
            <!-- END: radio_itos -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.itosname}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="itosname" value="{ROW.itosname}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.problem}</strong></label>
        <div class="col-sm-19 col-md-20">

                    <!-- BEGIN: checkbox_problem -->
                        <label><input class="form-control" type="checkbox" name="problem[]" value="{OPTION.key}" {OPTION.checked}>{OPTION.title}</label>
                    <!-- END: checkbox_problem -->
                        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.email}</strong></label>
        <div class="col-sm-19 col-md-20">

            <!-- BEGIN: radio_email -->
                <label><input class="form-control" type="radio" name="email" value="{OPTION.key}" {OPTION.checked}>{OPTION.title} &nbsp;</label> 
            <!-- END: radio_email -->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.fullname}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="fullname" value="{ROW.fullname}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.infoemail}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="email" name="infoemail" value="{ROW.infoemail}" oninvalid="setCustomValidity(nv_email)" oninput="setCustomValidity('')" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.infomobile}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="infomobile" value="{ROW.infomobile}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.infocomname}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="infocomname" value="{ROW.infocomname}" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.infoaddress}</strong></label>
        <div class="col-sm-19 col-md-20">
            <input class="form-control" type="text" name="infoaddress" value="{ROW.infoaddress}" />
        </div>
    </div>
    <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
</div></div>
<!-- END: main -->