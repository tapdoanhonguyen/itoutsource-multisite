<!-- BEGIN: main -->
<link href="{NV_BASE_SITEURL}assets/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" data-show="after" src="{NV_BASE_SITEURL}assets/js/select2/select2.min.js"></script>
<div class="website_map_cuahang">

<div class="content_maps">
	<style>#map_canvas { width:100%; height: 450px; }</style>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyCoP9IEMvecTokyi6yCNTuXA4F7OZ-JUlM"></script>
		
		<div id="map_canvas"></div>

		<script>
		var map;
		var markersArray = [];
		var image_cuahang = 'img/';
		var bounds = new google.maps.LatLngBounds();
		var loc;

		function init(){
			var mapOptions = { mapTypeId: google.maps.MapTypeId.ROADMAP };
			map =  new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			<!-- BEGIN: loop -->
			loc = new google.maps.LatLng({lat},{lng});
			bounds.extend(loc);
			addMarker(loc, 'NPP : {row.username} ', "active", '{row.link}', '{row.image}', '{image}');
			<!-- END: loop -->
			loc = new google.maps.LatLng(10.7542893,106.1346779);
			bounds.extend(loc);
			addMarker(loc, 'nvholding - HCM', "active", 'http://app.minahi.vn/duynv01/', '/themes/minahi/images/no_image.gif', '/themes/minahi/images/icons/map-icon.png');
			loc = new google.maps.LatLng(21.022736,105.8019439);
			bounds.extend(loc);
			addMarker(loc, 'nvholding - Ha Noi', "active", 'http://app.minahi.vn/duynv01/', '/themes/minahi/images/no_image.gif', '/themes/minahi/images/icons/map-icon.png');

			map.fitBounds(bounds);
			map.panToBounds(bounds);    
		}

		function addMarker(location, title, active, link, image, anh_loai) {   

			var markerIcon = {
				  url: anh_loai,
				  scaledSize: new google.maps.Size(40, 40),
				  origin: new google.maps.Point(0, 0),
				  anchor: new google.maps.Point(32,65),
				  labelOrigin: new google.maps.Point(40,33)
				};
				
			var marker = new google.maps.Marker({
				position: location,
				icon: markerIcon,
				map: map,
				title: title,
				status: active
			});
			
			var html ='<div class="content_map_main"><div class="tiede_map_main"><a href="'+ link +'">'+ title +'</a></div><div class="image_des_map"><a href="'+ link +'"><img style="width:100px;" src="'+ image +'"/></a></div></div>';
				var infowindow = new google.maps.InfoWindow({
				  content:html
				  }); 
							
				marker.addListener('click', function() {
					 infowindow.open(map, marker); 
				});
				
				
		}

		$(function(){ init(); });
		</script>
</div>




<script type="text/javascript">
	$(document).ready(function() {
	  $("select").select2();
	});
	
	$('select[name=catid_search]').change(function(){
		
		var catid_search = $(this).val();
		var province = $('.province option:selected').val();
		var district = $('.district option:selected').val();
		var ward = $('.ward option:selected').val();
		
		
		var html = 'map';
		if(catid_search != '')
		{
			html = html + '/' + catid_search;
		}
		
		if(province != '')
		{
			html = html + '/' + province;
		}
		
		if(district != '')
		{
			html = html + '/' + district;
		}
		
		if(ward != '')
		{
			html = html + '/' + ward;
		}
	
		if(html != '')
		{	
			window.location.href = '{NV_BASE_SITEURL}{module_name}/'+ html +'.html';
		}
		
		
	});
	
	
	$('.province').change(function(){
	
		var catid_search = $('select[name=catid_search]').val();		
		var province = $(this).val();
		
		var html = 'map';
		if(catid_search != '')
		{
			html = html + '/' + catid_search;
		}
		
		if(province != '')
		{
			html = html + '/' + province;
		}
	
		if(html != '')
		{	
			window.location.href = '{NV_BASE_SITEURL}{module_name}/'+ html +'.html';
		}
	});
	
	$('.district').change(function(){
	
		var catid_search = $('select[name=catid_search]').val();	
		var province = $('.province option:selected').val();
		var district = $(this).val();
	
		var html = 'map';
		if(catid_search != '')
		{
			html = html + '/' + catid_search;
		}
		
		if(province != '')
		{
			html = html + '/' + province;
		}
		
		if(district != '')
		{
			html = html + '/' + district;
		}
	
		if(html != '')
		{	
			window.location.href = '{NV_BASE_SITEURL}{module_name}/'+ html +'.html';
		}
		
		
	});
	
	$('.ward').change(function(){
	
		var catid_search = $('select[name=catid_search]').val();	
		var province = $('.province option:selected').val();
		var district = $('.district option:selected').val();
		var ward = $(this).val();
		
		var html = 'map';
		if(catid_search != '')
		{
			html = html + '/' + catid_search;
		}
		
		if(province != '')
		{
			html = html + '/' + province;
		}
		
		if(district != '')
		{
			html = html + '/' + district;
		}
		
		if(ward != '')
		{
			html = html + '/' + ward;
		}
	
		if(html != '')
		{	
			window.location.href = '{NV_BASE_SITEURL}{module_name}/'+ html +'.html';
		}
	
	});
	
	
	
	

</script>

<div class="tms_primary_title"> Tìm kiếm cửa hàng</div>
<div class="tms_primary">
		<div class="row">
				
		
				<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					<span id="getcity"class="margin-bottom10">
						 
							<select class="form-control province margin-bottom10" name="city_id" id="city">
								<option value ="">-- Toàn quốc --</option>
								<!-- BEGIN: city -->					
								<option {CITY.selected} value="{CITY.alias}">{CITY.name}</option>
								<!-- END: city -->
							</select>
							
							
						</span>
				</div>
			
				<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					<span id="getdistrict">	 
							<select class="form-control district margin-bottom10" name="district_id" id="district">
								<option value="">-- Quận/ huyện --</option>
								<!-- BEGIN: district -->					
								<option value="{DISTRICT.alias}" {DISTRICT.selected}>{DISTRICT.type} {DISTRICT.name}</option>
								<!-- END: district -->
							</select>
							<span id="loading_district" style="display:none"><img src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/images/load_bar.gif"></span>							
						</span>
				</div>
			
				<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					<span id="getward"> 
								<select class="form-control ward margin-bottom10" name="ward_id" id="ward">
								<option value="">-- Xã/Phường --</option>
								<!-- BEGIN: ward -->					
								<option value="{WARD.alias}" {WARD.selected}>{WARD.type} {WARD.name}</option>
								<!-- END: ward -->
								</select>
								<span id="loading_ward"  style="display:none"><img src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/images/load_bar.gif"></span>
							</span>
				</div>

	</div>
		</div>	</div>



<div class="clearfix"></div>
<div class="tms_store_deatail_titlle"><h3>Kết quả tìm kiếm</h3></div>
<div class="row">
		<!-- BEGIN: loop_left -->
		<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
			<div class="tms_store_col">
            <div class="tms_store_img"><a href="{row.link}" title="{row.username}"><img src="{row.image}" alt="{row.username}"title="{row.username}"></a></div>	
			<div class="tms_store_city text-center" >{row.district} - {row.province}</div>
            <div class="caption text-center"><h3><a href="{row.link}" username="{row.username}">{row.username}</a></h3></div>	
			</div>
		</div>
		<!-- END: loop_left -->
				
</div>
<div class="clearfix"></div>

<div class="text-center">{NV_GENERATE_PAGE}</div>


<!-- END: main -->