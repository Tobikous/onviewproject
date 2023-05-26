@extends('layouts.app1')

@section('onsen-map-link')
@endsection

@section('content')

<main>

	<section class="px-5 py-2 mx-auto xl:px-20 tails-selected-element max-w-7xl">

		<div class="flex flex-wrap mt-14 mb-16 overflow-hidden">

			@include('partials.search-engine')

			<div class="w-full overflow-hidden md:w-3/4 md:pr-5 md:pl-9">

				<div class="py-4 px-5 mb-6 md:mb-12 text-2xl font-bold bg-orange-100 mt-5 md:mt-0">
					マップから探す
					<p class="text-sm font-normal mt-2 text-gray-500">
						これまで投稿された温泉を、マップ上のピンで表示します。</p>
				</div>

				<div class="w-full aspect-w-5 aspect-h-4 relative">
					<div id="map" class="w-full h-full absolute"></div>
				</div>
			</div>

		</div>

	</section>

	<script>
		var onsens = @json($onsens);

		function starRating(evaluation) {
			if (evaluation >= 0 && evaluation <= 1.8) {
				return '★☆☆☆☆';
			} else if (evaluation > 1.8 && evaluation <= 2.8) {
				return '★★☆☆☆';
			} else if (evaluation > 2.8 && evaluation <= 3.8) {
				return '★★★☆☆';
			} else if (evaluation > 3.8 && evaluation <= 4.6) {
				return '★★★★☆';
			} else if (evaluation > 4.6 && evaluation <= 5) {
				return '★★★★★';
			}
		}

		function createInfoWindowContent(onsen) {
			var mapUrl = "https://www.google.com/maps/search/?api=1&query=" + encodeURIComponent(onsen.name);
			return `<div> 
        <h1 class="font-bold">${onsen.name}</h1>
        <p class="text-orange-500">${starRating(onsen.evaluation)}</p>
        <p>${onsen.formatted_address}</p>
		<a href="/onsen/${onsen.id}" class="text-blue-500 hover:text-orange-500 underline">詳細</a>
		<a href="${mapUrl}" target="_blank" class="ml-5 text-blue-500 hover:text-orange-500 underline">GoogleMapsで表示する</a>
    	</div>`;
		}


		function initMap() {
			var strictBounds = new google.maps.LatLngBounds(
				new google.maps.LatLng(31.003676, 129.408463),
				new google.maps.LatLng(44.551483, 145.816896)
			);

			const map = new google.maps.Map(document.getElementById('map'), {
				zoom: 6,
				center: strictBounds.getCenter()
			});

			google.maps.event.addListener(map, 'dragend', function() {
				if (strictBounds.contains(map.getCenter())) return;

				var c = map.getCenter(),
					x = c.lng(),
					y = c.lat(),
					maxX = strictBounds.getNorthEast().lng(),
					maxY = strictBounds.getNorthEast().lat(),
					minX = strictBounds.getSouthWest().lng(),
					minY = strictBounds.getSouthWest().lat();

				if (x < minX) x = minX;
				if (x > maxX) x = maxX;
				if (y < minY) y = minY;
				if (y > maxY) y = maxY;

				map.setCenter(new google.maps.LatLng(y, x));
			});

			var infowindow = new google.maps.InfoWindow();

			onsens.forEach(onsen => {
				const marker = new google.maps.Marker({
					position: {
						lat: parseFloat(onsen.latitude),
						lng: parseFloat(onsen.longitude)
					},
					map: map
				});

				marker.addListener('click', function() {
					infowindow.setContent(createInfoWindowContent(onsen));
					infowindow.open(map, marker);
				});
			});

		}
		window.initMap = initMap;
	</script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
	</script>

</main>

@endsection