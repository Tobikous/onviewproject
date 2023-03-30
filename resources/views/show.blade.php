@extends('layouts.app1')

@section('content')

<body>
	<session class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 py-12 mx-auto lg:flex lg:flex-wrap">
			<div class="lg:w-1/3 w-full lg:h-auto h-64 m-4 object-cover object-center rounded lg:order-1">
				<img alt="ecommerce" class="w-full h-full object-cover object-center rounded"
					src="{{$review['image']}}">
			</div>

			<div class="lg:w-1/3 lg:h-auto h-96 m-4 w-full object-cover z-0 lg:order-2">
				<div id="map" class="h-full"></div>
			</div>

			<div class="lg:w-2/3 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0 lg:order-3">
				<h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $review->onsen->area }}
				</h2>
				<h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $review->onsen->name }}
				</h1>

				<div class="flex mb-4">
					<span class="flex items-center">
						<p class="leading-relaxed line-clamp-7 text-yellow-500">{{$review['star']}}</p>
					</span>
					<span class="ml-3 pl-3 py-1 border-l-2 border-gray-200 space-x-2s">
						<p class="text-gray-900 text-base font-medium">投稿者：{{ $review->user->name }}
						</p>
						<p class="text-sm">投稿日：{{$review['created_at']->format('Y年m月d日')}}</p>
						<p class="text-sm">更新日：{{$review['updated_at']->format('Y年m月d日')}}</p>
					</span>
				</div>

				<p class="leading-relaxed text-gray-900">{{$review['content']}}</p>

				<div class="flex mt-3 items-center pb-5 border-b-2 border-gray-100 mb-2">
					<div class="flex"></div>
				</div>
				<span class="title-font">タグ：{{ $review->tag->name }}
				</span>
				<span class="title-font">時間帯：{{$review['time']}}</span>
				@auth
				<div class="flex mt-7">
					@if($review->isWrittenByUser(auth()->user()))
					<button
						class="flex ml-auto text-white bg-orange-500 border-0 p-3 font-semibold  px-6 focus:outline-none hover:bg-orange-600 rounded"
						type="button" onclick="location.href = '/edit/{{$review['id']}}'">レビューを編集する</button>
					<form method='POST' action="/delete/{{$review['id']}}" id='delete-form'>
						@csrf
						<button type="submit"><i
								class="fa fa-trash fa-2x border-0 py-2 px-6 text-gray-500 hover:text-gray-700"></i></button>
					</form>
					@endif
				</div>
				@endauth
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


	</session>
</body>
@endsection