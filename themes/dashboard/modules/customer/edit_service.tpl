<!-- BEGIN: main -->

    <tr class="item" data-index="1" data-module="services">
        <td rowspan="2" class="number text-center">1</td>
        <td>
            <input type="hidden" name="detail[1][module]" value="services">
			
			<div class="m-bottom">
				<select class="select2_js form-control" name="detail[1][itemid]" style="width: 100%" onchange="nv_item_change($(this)); return !1;">
				<option value="0">---{LANG.service_select}---</option>
				<!-- BEGIN: services_js -->
					<option {selected_service} value="{SERVICES.id}">{SERVICES.title}</option>
				<!-- END: services_js -->
				</select>
			</div>
        </td>
        <td>
            <input type="text" class="form-control unit_price input_price" onkeyup="this.value=FormatNumber(this.value);" onchange="nv_item_change_input();" name="detail[1][unit_price]" value="{info.unit_price}">
        </td>
        <td>
            <input type="number" class="form-control quantity" onchange="nv_item_change_input();" name="detail[1][quantity]" value="{info.quantity}">
        </td>
        <td>
            <input value="{info.price}" type="text" class="form-control price" readonly="readonly" name="detail[1][price]">
        </td>
        <td>
            <input value="{info.vat}" type="text" class="form-control vat" onchange="nv_item_change_input();" name="detail[1][vat]">
        </td>
        <td>
            <input value="{info.vat_price}" type="text" class="form-control vat_price" readonly="readonly" name="detail[1][vat_price]">
        </td>
        <td class="total">{info.total}</td>
    </tr>
    <tr class="item_tr1">
        <td>
            <textarea class="form-control" name="detail[1][note]" placeholder="Ghi chú">{info.note}</textarea>
        </td>
        <td colspan="2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Đối tác</div>
                </div>
                <input value="{info.partner}" name="detail[1][partner]" type="text" class="partner">
            </div>
        </td>
        <td colspan="2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Thời gian bắt đầu</div>
                </div>
                <input value="{info.createtime}" onclick="time_input(this);" onchange="nv_item_change_cycle(1);" name="detail[1][createtime]" type="text" class="createtime1 form-control">
            </div>
        </td>
        <td colspan="1">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Chọn chu kỳ</div>
                </div>
                <select class="cycle1 form-control" name="detail[1][cycle]" style="width: 100%" onchange="nv_item_change_cycle(1); return !1;">
                    <option value="0">---Chọn chu kỳ---</option>
					<!-- BEGIN: cycle -->
						<option {selected_cycle} value="{CYCLE.key}">{CYCLE.value}</option>
					<!-- END: cycle -->
                   
                    
                </select>
            </div>
        </td>
        <td colspan="2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Thời gian hết hạn</div>
                </div>
                <input value="{info.duetime}" onclick="time_input(this);" name="detail[1][duetime]" type="text" class="form-control duetime1">
            </div>
        </td>
    </tr>
	
	<tr><td colspan="8" class="text-center"><input value="{info.id}" type="hidden" name="id_service_old"/><input class="btn btn-primary" name="submit" type="submit" value="Lưu thay đổi"/></td></tr>
	

<!-- END: main -->
