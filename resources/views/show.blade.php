@extends('layouts.app1')

@section('content')

<body>


	<div
		class="items-center w-full px-0 py-10 sm:py-12 md:py-16 mx-auto md:px-12 lg:px-16 xl:px-32 max-w-7xl relative tails-selected-element">
		<div
			class="grid items-start grid-cols-1 mt-10 lg:mt-12 gap-16 lg:gap-8 md:grid-cols-2 bg-neutral-50 md:rounded-2xl lg:rounded-[4rem] p-10 lg:p-20">
			<div class="relative">
				<h3 class="text-3xl font-extrabold text-black lg:text-5xl tracking-tighter">{{ $review->onsen->name }}
				</h3>
				<div class="relative">


					<ul class="list-none mt-6 space-y-4" role="list">
						<li>
							<div class="relative flex items-start">

								<p class="text-neutral-500 text-sm leading-6 ml-2"><strong
										class="font-semibold text-neutral-900">Streamline Your Coding
										Experience</strong> — Our SaaS programming product offers a wide range of
									features to meet the needs of every developer.</p>
							</div>
						</li>
						<li>
							<div class="relative flex items-start">
								<svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none"
									viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
									stroke-width="1.5">
									<path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
										stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<p class="text-neutral-500 text-sm leading-6 ml-2"><strong
										class="font-semibold text-neutral-900">Protecting Your Data</strong> — Our
									SaaS programming product is designed with the modern developer in mind.</p>
							</div>
						</li>

					</ul>
				</div>
				<p class="text-neutral-500 text-lg max-w-2xl mt-4">レビューの内容</p>

			</div>
			<div class="relative">
				<div class="h-full md:max-w-full max-w-sm mx-auto lg:flex lg:flex-col">
					<div class="w-full aspect-w-16 aspect-h-9 relative mb-8">
						<img alt="Onsen Image" class="w-full h-full object-cover absolute z-20"
							src="{{ asset($review->image) }}">
					</div>

					<div class="w-full aspect-w-16 aspect-h-9 relative">
						<div id="map" class="w-full h-full absolute"></div>
					</div>
				</div>

			</div>
		</div>






		<script>
			var data = @json($review);
			console.log(data);
			var latData = data['latitude'];
			var lngData = data['longitude'];
			var adress = data['formatted_address'];
			var areaData = data['onsenName'];

			function createInfoWindowContent(address, area) {
				return `<div> <h1>${address}</h1>
	  <p>${area}</p></div>`;
			}

			function initMap() {
				const center = {
					lat: parseFloat(latData),
					lng: parseFloat(lngData)
				};

				const map = new google.maps.Map(document.getElementById('map'), {
					zoom: 14,
					center: center
				});

				const marker = new google.maps.Marker({
					position: {
						lat: parseFloat(latData),
						lng: parseFloat(lngData)
					},
					map: map
				});

				var infowindow = new google.maps.InfoWindow({
					content: createInfoWindowContent(areaData, adress)
				});

				infowindow.open(map, marker);

				marker.addListener('click', function() {
					infowindow.open(map, marker);
				});
			}

			window.initMap = initMap;
		</script>
		<script async defer
			src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
		</script>
	</div>


</body>
@endsection