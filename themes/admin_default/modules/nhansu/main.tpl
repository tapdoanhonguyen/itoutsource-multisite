<!-- BEGIN: main -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<style type="text/css">
	.table td, .table th {
		padding: 0.72rem;
		vertical-align: middle !important;
	}

	#show_count_full th {
		font-weight: bolder;
	}

	#productcontent p {
		font-weight: bolder;
		text-decoration: underline;
	}
</style>
<div id="productcontent">
	<div class="container-fluid">
		<div class="panel-heading">
			<h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> 
				{LANG.thongkedulieu}
			</h3>
			<div style="clear:both"></div>
		</div>
		<div class="row">
			<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
				<div class="card radius-15 bg-rose">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">
									{count_full}
								</h2>
							</div>
							<div class="ml-auto font-35 text-white">
								<i class="fa fa-flask"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white" onclick="get_statistical('show_count_full')">
									{LANG.tongsoluongnhanvien}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
				<div class="card radius-15 bg-primary-blue">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">
									{count_nu} 
								</h2>
							</div>
							<div class="ml-auto font-35 text-white">
								<i class="fa fa-universal-access"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white"  onclick="get_statistical('show_count_woman')">
									{LANG.soluongnhanviennu}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
				<div class="card radius-15 bg-sunset">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">
									{count_nam} 
								</h2>
							</div>
							<div class="ml-auto font-35 text-white">
								<i class="fa fa-address-card-o"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white" onclick="get_statistical('show_count_man')">
									{LANG.soluongnhanviennam}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- BEGIN: loai_bien_che -->
			<div class="col-xs-24 col-sm-24 col-md-8 col-lg-8">
				<div class="card radius-15 bg-rose">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<h2 class="mb-0 text-white">
									{LOOP.number}
								</h2>
							</div>
							<div class="ml-auto font-35 text-white">
								<i class="fa fa-universal-access"></i>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-white" onclick="get_statistical('{loaibienche}')">
									{LOOP.name_bienche}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END: loai_bien_che -->
		</div>
		<!-- BEGIN: loop -->
		<div class="row">
			<div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
				<div class="card radius-15 bg-rose">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div style="display: flex;">
								<div class="mb-0 text-white">Hiện có {number_nhansu} nhân viên sắp làm việc đủ {key} năm</div>
								<div style="margin-left: 10px">
									<a href="{LINK}" class="btn btn-primary btn-sm">
										Xem chi tiết tại đây
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END: loop -->

		<div class="row"  id="show_count_full">

		</div>

		<div class="row match-height">
			<div class="col-lg-12 col-24">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Trình độ Ngoại ngữ - Tin học</h5>
					</div>
					<div class="card-body">
						<div id="bieudo_trinhdongoaingu_tinhoc" style="width: auto; height: 400px;"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-24">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Nhân sự theo phòng ban</h5>
					</div>
					<div class="card-body">
						<div id="bieudo_phongban" style="width: auto; height: 400px;"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-24">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Phân loại theo chức danh</h5>
					</div>
					<div class="card-body">
						<div id="bieudo_chucdanh" style="width: auto; height: 400px;"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-24">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Trình độ Đào tạo - Chuyên môn</h5>
					</div>
					<div class="card-body">
						<div id="bieudo_trinhdochuyenmon" style="width: auto; height: 400px;"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-24">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Dự kiến đến tuổi nghỉ hưu trong năm (trước 6 tháng) ({count_nhansu_huutri})</h5>
						<select class="form-control" style="width: auto;" id="thang_huutri" onchange="get_huutri_theo_thang()">
							<!-- BEGIN: list_month -->
							<option value="{LISTMONTH.key}">{LISTMONTH.title}</option>
							<!-- END: list_month -->
						</select>
						
					</div>
					<div class="card-body">
						<div class="sticky-header">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th>Họ tên</th>
										<th>Giới tính</th>
										<th>Phòng ban</th>
										<th>Ngày dự kiến</th>

									</tr>
								</thead>
								<tbody id="show_statistical_huutri">
									<!-- BEGIN: huutri_nhansu -->
									<tr>
										<td class="text-center">{STT}</td>
										<td>
											<span>
												<b>{LOOP_HUUTRI.hoten_lot} {LOOP_HUUTRI.ten}</b><br/>
												Ngày sinh: {LOOP_HUUTRI.ngaysinh} <br/>
												Chức danh: {LOOP_HUUTRI.chucdanh}
											</span>
										</td>
										<td class="text-center">
											{LOOP_HUUTRI.gioitinh}
										</td>
										<td>
											{LOOP_HUUTRI.phongban}
										</td>
										<td class="text-center">{LOOP_HUUTRI.ngaydukien}</td>
										
									</tr>
									<!-- END: huutri_nhansu -->
								</tbody>						
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-24">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Sinh nhật trong tháng {CURRENT_MONTH} ({count_nhansu_sinhnhat})</h5>
						<select class="form-control" style="width: auto;" id="quy_sinhnhat" onchange="get_sinhnhat_theo_quy()">
							<!-- BEGIN: list_quy -->
							<option value="{LISTQUY.key}">{LISTQUY.title}</option>
							<!-- END: list_quy -->
						</select>
						<button type="button" class="btn-default cus-btn-default" onclick="xuat_danh_sach_sinh_nhat()">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
								<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
								<polyline points="14 2 14 8 20 8"></polyline>
								<line x1="16" y1="13" x2="8" y2="13"></line>
								<line x1="16" y1="17" x2="8" y2="17"></line>
								<polyline points="10 9 9 9 8 9"></polyline>
							</svg>
							<span >
								Xuất file
							</span>
						</button>
					</div>
					<div class="card-body">
						<div class="sticky-header">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th></th>
										<th>Họ tên</th>
										<th>Phòng ban</th>
										<th>Ngày sinh</th>
										
									</tr>
								</thead>
								<tbody id="show_statistical_sinhnhat">
									<!-- BEGIN: birthday_nhansu -->
									<tr>
										<td class="text-center">{STT}</td>
										<td>
											<span>
												{LOOP_BIRTHDAY.birthday_today}
											</span>
										</td>
										<td>
											<b>{LOOP_BIRTHDAY.hoten_lot} {LOOP_BIRTHDAY.ten} </b><br>
											Chức danh: {LOOP_BIRTHDAY.chucdanh}
										</td>
										<td>
											{LOOP_BIRTHDAY.phongban}
										</td>
										<td>{LOOP_BIRTHDAY.ngaysinh}</td>
										
									</tr>
									<!-- END: birthday_nhansu -->
								</tbody>						
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-24 col-24">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Thông tin lương nhân sự ({count_nhansu_luong})</h5>
						<button type="button" class="btn-default cus-btn-default" onclick="xuat_luong()">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
								<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
								<polyline points="14 2 14 8 20 8"></polyline>
								<line x1="16" y1="13" x2="8" y2="13"></line>
								<line x1="16" y1="17" x2="8" y2="17"></line>
								<polyline points="10 9 9 9 8 9"></polyline>
							</svg>
							<span >Xuất file</span>
						</button>
					</div>
					<div class="card-body">
						<div class="sticky-header">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th>Họ tên</th>
										<th>Giới tính</th>
										<th>Phòng ban</th>
										<th>Bậc lương</th>
										<th>Hệ số tăng</th>
										<th>Ngày dự kiến</th>
									</tr>
								</thead>
								<tbody>
									<!-- BEGIN: luong_nhansu -->
									<tr>
										<td class="text-center">{STT}</td>
										<td>
											<span>
												<b>{LOOP_LUONG.hoten_lot} {LOOP_LUONG.ten}</b><br/>
												Ngày sinh: {LOOP_LUONG.ngaysinh} <br/>
												Chức danh: {LOOP_LUONG.chucdanh}
											</span>
										</td>
										<td>
											{LOOP_LUONG.gioitinh}
										</td>
										<td>
											{LOOP_LUONG.phongban}
										</td>
										<td>
											{LOOP_LUONG.bacluong}
										</td>
										<td>
											{LOOP_LUONG.hesotang}
										</td>
										<td>{LOOP_LUONG.ngaydukien}</td>

									</tr>
									<!-- END: luong_nhansu -->
								</tbody>						
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>	
</div>
<script type='text/javascript'>

	function xuat_danh_sach_sinh_nhat() {
		var quy_sinhnhat = $('#quy_sinhnhat').val();
		$.ajax({
			url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=xuat_danh_sach_sinh_nhat&quy_sinhnhat=' + quy_sinhnhat,
			type: 'post',
			dataType: 'json',
			beforeSend: function() {

			},  
			complete: function() {
				
			},
			success: function(json) {
				if( json['error'] ) alert( json['error'] );         
				if( json['link'] ) window.location.href= json['link'];          
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}

	function xuat_luong() {
		$.ajax({
			url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=xuat_luong',
			type: 'post',
			dataType: 'json',
			beforeSend: function() {

			},  
			complete: function() {
				
			},
			success: function(json) {
				if( json['error'] ) alert( json['error'] );         
				if( json['link'] ) window.location.href= json['link'];          
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}

	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawVisualization);

	function drawVisualization() {
        // Some raw data (not necessarily accurate)
		var data = google.visualization.arrayToDataTable([
			['Trình độ ngoại ngữ', <!-- BEGIN: tinhoc -->'{TINHOC.name_tinhoc}', <!-- END: tinhoc -->{ role: 'annotation' }],
			<!-- BEGIN: ngoaingu -->
			['{NGOAINGU.name_ngoaingu}', <!-- BEGIN: tinhoc -->{nhansu_tinhoc_ngoai_ngu},<!-- END: tinhoc -->''],
			<!-- END: ngoaingu -->
			]);

		var options = {
			title : 'Phân bổ nhân sự theo trình độ ngoại ngữ - tin học',
			vAxis: {title: 'Tổng số nhân sự'},
			hAxis: {title: 'Trình độ Ngoại ngữ - Tin học'},
			seriesType: 'bars',
			series: {5: {type: 'line'}}
		};

		var chart = new google.visualization.ComboChart(document.getElementById('bieudo_trinhdongoaingu_tinhoc'));
		chart.draw(data, options);
	}
</script>
<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Phòng ban', 'Lượng nhân sự'],
			<!-- BEGIN: phongban -->
			['{PHONGBAN.name_phongban}', {PHONGBAN.so_nhan_su}],
			<!-- END: phongban -->
			]);

		var options = {
			width:'100%',
			legend: {
				position: 'right',
				maxLines: 9,
				alignment: 'center',
			},
			is3D: true,
			sliceVisibilityThreshold :0,
		};

		var chart = new google.visualization.PieChart(document.getElementById('bieudo_phongban'));
		chart.draw(data, options);
	}
</script>
<script type="text/javascript">
	google.charts.load('current', {
		callback: function () {
			var data = [
				['Chức danh', 'Số người'],
				<!-- BEGIN: chucdanh -->
				['{CHUCDANH.name_chucdanh}', {CHUCDANH.so_nhan_su_theo_chucdanh}],
				<!-- END: chucdanh -->
				];

			var total = 0;
			for (var i = 1; i < data.length; i++) {
				if (data[i][0] !== null) {
					total += data[i][1];
				}
			}

			var numberFormat = new google.visualization.NumberFormat({
				pattern: '#,##0.0',
				suffix: '%'
			});

			var dataTable = google.visualization.arrayToDataTable(data);
			for (var i = 0; i < dataTable.getNumberOfRows(); i++) {
				if (dataTable.getValue(i, 0) !== null) {
					dataTable.setFormattedValue(i, 1, dataTable.getValue(i, 1) + ' Nhân sự');
				}
			}

			var chart = new google.visualization.PieChart(document.getElementById('bieudo_chucdanh'));

			var options = {
				width:'100%',
				chartArea: {
					top: 24,
				},
				legend: { 
					position: 'labeled',
					textStyle: {
						color: '#1a237e',
						fontSize: 16,
						bold: true
					},
				},
				pieHole: 0.4,
				pieStartAngle: 270,
				pieSliceText: 'value',
				theme: 'maximized',
				sliceVisibilityThreshold :0,
			};

			chart.draw(dataTable, options);
		},
		packages: ['corechart']
	});
</script>
<script type="text/javascript">
	google.charts.load("current", {packages:['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Chuyên môn', <!-- BEGIN: chuyenmon -->'{CHUYENMON.name_chuyenmon}',<!-- END: chuyenmon -->{ role: 'annotation' } ],

			<!-- BEGIN: trinhdodaotao -->
			['{TRINHDODAOTAO.name_chucvu}', <!-- BEGIN: chuyenmon -->{TRINHDOCHUYENMON.so_nhan_su},<!-- END: chuyenmon -->''],
			<!-- END: trinhdodaotao -->
			]);


		var view = new google.visualization.DataView(data);

		var options = {
			width: '100%',
			height: 400,
			legend: { position: 'top', maxLines: 3 },
			bar: { groupWidth: '75%' },
			isStacked: true,

			hAxis: {
				title: 'Trình độ Đào tạo - Chuyên môn',
			},
			vAxis: {
				title: 'Tổng số nhân sự (theo Trình độ đào tạo)',
				minValue: 0,
			}

		};
		var chart = new google.visualization.ColumnChart(document.getElementById("bieudo_trinhdochuyenmon"));
		chart.draw(view, options);
	}
</script>
<script type="text/javascript">
	function get_statistical(table_detail) {
		var data = 'mod=get_statistical&table_detail='+table_detail;
		$.post({
			url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main',
			method: 'post',
			data: data,
			success: function(response) {
				$("#show_count_full").html(response);
			}
		});
	};
	function get_huutri_theo_thang() {
		var thang = $('#thang_huutri').val();
		var data = 'mod=get_statistical_huutri&thang_huutri='+thang;
		$.post({
			url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main',
			method: 'post',
			data: data,
			success: function(response) {
				$("#show_statistical_huutri").html(response);
			}
		});
	}
	function get_sinhnhat_theo_quy() {
		var quy = $('#quy_sinhnhat').val();
		var data = 'mod=get_statistical_sinhnhat&quy_sinhnhat='+quy;
		$.post({
			url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main',
			method: 'post',
			data: data,
			success: function(response) {
				$("#show_statistical_sinhnhat").html(response);
			}
		});
	}
</script>
<!-- END: main -->