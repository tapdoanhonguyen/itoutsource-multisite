<!-- BEGIN: main -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="w100 text-center">{LANG.number}</th>
                        <th class="text-center">Họ tên </th>
                        <th class="text-center">SĐT</th>
                        <th class="text-center">Địa chỉ</th>
                        <th class="text-center">Chuyên môn</th>
                        <th class="text-center">Chức vụ</th>
                        <th class="text-center">Phòng ban</th>
                        <th class="text-center">Ngày tuyển dụng</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- BEGIN: loop -->
                    <tr>
                        <td class="text-center"> {VIEW.stt} </td>
                        <td> {VIEW.hoten_lot} {VIEW.ten} <br> Giới tính: {VIEW.gioitinh}</td>
                        <td class="text-center"> {VIEW.dienthoai_nha} </a> </td>
                        <td> {VIEW.diachihiennay} </td>
                        <td class="text-center"> {VIEW.chuyenmon} </td>
                        <td class="text-center"> {VIEW.chucvu} </td>
                        <td class="text-center"> {VIEW.phongban} </td>
                        <td class="text-center"> {VIEW.ngaytuyendung} </td>
                        
                    </tr>
                    <!-- END: loop -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END: main -->