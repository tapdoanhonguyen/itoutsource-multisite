<!-- BEGIN: main -->
<div class="col-md-12" style="text-align: center;">
	Thông tin chấm công ngày {ROW.date_login} 
</div>
<div class="col-md-12" style="text-align: center;">
	<!-- BEGIN: checkin -->

			<button id="capturein"  >Check-in lúc {ROW.time_login}</button>

	<!-- END: checkin -->
	<!-- BEGIN: checkout -->
			<button id="captureout"  >Check-out lúc {ROW.time_login}</button>
	<!-- END: checkout -->  
</div>
<div class="row">
<div class="col-md-6 col-xs-12">
 <img src="/uploads/timekeeper/capture/{ROW.image_file}" width="400px">
</div>    
 <div class="col-md-5 col-xs-12">
      
	<script src="https://maps.googleapis.com/maps/api/js?key={GOGGLEMAP_API}&callback=initMap" async defer></script>
    <script>
      var map;

      function initMap() {
        // Khởi tạo bản đồ và vị trí mặc định
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 0, lng: 0},
          zoom: 8
        });

        // Lấy vị trí của người dùng hiện tại
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: {ROW.lat},
              lng: {ROW.lng}
            };
            // Đặt marker tại vị trí của người dùng
            var marker = new google.maps.Marker({
              position: pos,
              map: map,
              title: 'Check-in location'
            });

            // Lấy thông tin chi tiết về địa điểm
            var geocoder = new google.maps.Geocoder;
            geocoder.geocode({'location': pos}, function(results, status) {
              if (status === 'OK') {
                if (results[0]) {
                  console.log(results[0].formatted_address);
				  
                  // Lưu thông tin chi tiết về địa điểm vào cơ sở dữ liệu
                  // ...

                } else {
                  console.log('No results found');
                }
              } else {
                console.log('Geocoder failed due to: ' + status);
              }
            });

            // Đặt center của bản đồ vào vị trí của người dùng
            map.setCenter(pos);
            map.setZoom(15);
          }, function() {
            console.log("Geolocation failed");
          });
        } else {
          console.log("Geolocation not supported by this browser");
        }
      }
    </script>
	 <div id="map" style="height: 400px;"></div>
	 <div class="row">
		
	</div>
</div> 	 

</div> 
<div class="row">
	<table class="table table-striped table-bordered table-hover">
            <caption><em class="fa fa-file-text-o">&nbsp;</em>{LANG.setting_post}</caption>
            <tbody>
                <tr>
					<th>{LANG.employer_group}</th>
					<td>
						{ROW.type_login_title} {ROW.locationid_title}
					</td>
				</tr>
				<tr>
					<th>{LANG.employer_group}</th>
					<td>
						{ROW.address}
					</td>
				</tr>
				<tr>
					<th>{LANG.employer_group}</th>
					<td>
						{ROW.image_file}
					</td>
				</tr>
			</tbody>
		</table>
</div>
<!-- END: main -->