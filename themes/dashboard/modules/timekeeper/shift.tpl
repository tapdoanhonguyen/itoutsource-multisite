<!-- BEGIN: main -->
<div class="row">
<div class="col-md-6 col-xs-12">
 <video id="video" width="640" height="480" autoplay></video>
</div>    
 <div class="col-md-5 col-xs-12">
    <form method="post" id="checkin" >
		<select class="form-control" name="locationid" id="locationid">
			<!-- BEGIN: location -->
			<option value="{LOCATION.key}" {LOCATION.selected}>{LOCATION.title}</option>
			<!-- END: location -->
		</select>
      <textarea name="imgdata" id="imgdata" style="display:none"></textarea>
      <input type="hidden" name="userid" value="{USER.id}" style="display:none">
      <input type="text" name="typelogin" id="typelogin" value="" style="display:none">
      <input type="text" name="lat" id="lat" value="" style="display:none">
      <input type="text" name="lng" id="lng" value="" style="display:none">
      <input type="text" name="address" id="address" value="" style="display:none">
	  <input type="submit" name="submit" id="checkinsubmit" style="display:none" value="Save">
    </form>
	
    <script>
      $(document).ready(function() {
        // Lấy camera được liệt kê đầu tiên của thiết bị
        navigator.mediaDevices.getUserMedia({ 
          audio: false,
          video: { 
            width: 640, height: 480 
          }
        })
        .then(function(stream) {
          var video = document.getElementById('video');
          // Thiết lập stream để hiển thị ảnh từ camera
          video.srcObject = stream;
          video.play();
          <!-- BEGIN: jvcheckin1 -->
          // Bắt sự kiện click vào nút chụp ảnh
          $('#capturein1').click(function(){
            // Sử dụng thư viện ImageMagick để xử lý hình ảnh
				var canvas = document.createElement('canvas');
				canvas.width = video.videoWidth;
				canvas.height = video.videoHeight;
				var ctx = canvas.getContext('2d');
				ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
				var imgdata = canvas.toDataURL();
				$('#imgdata').val('');
				$('#imgdata').val(imgdata);
				$('#typelogin').val(0);
				$('#checkinsubmit').click();
				
          });
		  <!-- END: jvcheckin1 -->
		  <!-- BEGIN: jvcheckout1 -->
		   // Bắt sự kiện click vào nút chụp ảnh
          $('#captureout1').click(function(){
            // Sử dụng thư viện ImageMagick để xử lý hình ảnh
				var canvas = document.createElement('canvas');
				canvas.width = video.videoWidth;
				canvas.height = video.videoHeight;
				var ctx = canvas.getContext('2d');
				ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
				var imgdata = canvas.toDataURL();
				$('#imgdata').val('');
				$('#imgdata').val(imgdata);
				$('#typelogin').val(1);
				$('#checkinsubmit').click();
				
          });
		  <!-- END: jvcheckout1 -->
		  <!-- BEGIN: jvcheckin2 -->
		   // Bắt sự kiện click vào nút chụp ảnh
          $('#capturein2').click(function(){
            // Sử dụng thư viện ImageMagick để xử lý hình ảnh
				var canvas = document.createElement('canvas');
				canvas.width = video.videoWidth;
				canvas.height = video.videoHeight;
				var ctx = canvas.getContext('2d');
				ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
				var imgdata = canvas.toDataURL();
				$('#imgdata').val('');
				$('#imgdata').val(imgdata);
				$('#typelogin').val(0);
				$('#checkinsubmit').click();
				
          });
		  <!-- END: jvcheckin2 -->
		  <!-- BEGIN: jvcheckout2 -->
		   // Bắt sự kiện click vào nút chụp ảnh
          $('#captureout2').click(function(){
            // Sử dụng thư viện ImageMagick để xử lý hình ảnh
				var canvas = document.createElement('canvas');
				canvas.width = video.videoWidth;
				canvas.height = video.videoHeight;
				var ctx = canvas.getContext('2d');
				ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
				var imgdata = canvas.toDataURL();
				$('#imgdata').val('');
				$('#imgdata').val(imgdata);
				$('#typelogin').val(1);
				$('#checkinsubmit').click();
				
          });
		  <!-- END: jvcheckout2 -->
		  // Bắt sự kiện click vào nút savecheck
          
        })
        .catch(function(err) {
          console.log(err);
        });
		
		
      });

    </script>
	
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
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
			console.log(position.coords.latitude);
					console.log(position.coords.longitude);
			$('#lat').val(position.coords.latitude);
			$('#lng').val(position.coords.longitude);
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
				  
					$('#address').val(results[0].formatted_address);
					$('#addressdetail').html(results[0].formatted_address);
					console.log(position.coords.latitude);
					console.log(position.coords.longitude);
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
		<span id="addressdetail" ></span>
	 </div>
	 <div class="row">
		<!-- BEGIN: checkin1 -->
		<div class="col-md-12 col-xs-12" style="text-align: center;">
			<button id="capturein1"  >Vào ca 1</button>
		</div>
		<!-- END: checkin1 -->
		<!-- BEGIN: checkout1 -->
		<div class="col-md-12 col-xs-12" style="text-align: center;">
			<button id="captureout1"  >Ra ca 1</button>
		</div> 	
		<!-- END: checkout1 -->
		<!-- BEGIN: checkin2 -->
		<div class="col-md-12 col-xs-12" style="text-align: center;">
			<button id="capturein2"  >Vào ca 2</button>
		</div>
		<!-- END: checkin2 -->
		<!-- BEGIN: checkout2 -->
		<div class="col-md-12 col-xs-12" style="text-align: center;">
			<button id="captureout2"  >Ra ca 2</button>
		</div> 	
		<!-- END: checkout2 -->		
	</div>
</div> 	 
</div> 
	
<!-- END: main -->