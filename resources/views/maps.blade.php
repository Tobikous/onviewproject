<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Google Maps</title>
</head>

<body>
	<div>aaaa</div>
	<div id="map" style="width:640px;height:320px;"></div>
	<div>bbbb</div>
	<script>
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				center: {
					lat: -34.397,
					lng: 150.644
				},
				zoom: 8
			});
			const marker = new google.maps.Marker({
				position: {
					lat: data.latitude,
					lng: data.longitude
				},
				map: map
			});
			console.log(map);
		}
		window.initMap = initMap;
	</script>
	<script async src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
	</script>
</body>

</html>