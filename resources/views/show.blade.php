@extends('layouts.app1')

@section('content')

<body>


	<div
		class="items-center w-full px-0 py-10 sm:py-12 md:py-16 mx-auto md:px-12 lg:px-16 xl:px-32 max-w-7xl relative tails-selected-element">
		<div
			class="grid items-start grid-cols-1 mt-10 lg:mt-1 gap-16 lg:gap-8 md:grid-cols-2 bg-neutral-50 md:rounded-2xl lg:rounded-[4rem] p-10 lg:p-20">
			<div class="relative">
				<h3 class="text-3xl font-extrabold text-black lg:text-5xl tracking-tighter">{{ $review->onsen->name }}
				</h3>
				<div class="relative">


					<ul class="list-none mt-6 space-y-4" role="list">
						<li>
							<div class="relative flex items-start">

								<p class="text-neutral-500 text-sm leading-6 ml-2"><strong
										class="font-semibold text-neutral-900">投稿者：</strong>{{ $review->user->name }}
								</p>
								<p class="text-neutral-500 text-sm leading-6 ml-5"><strong
										class="font-semibold text-neutral-900">更新日：</strong>{{$review['updated_at']->format('Y年m月d日')}}
								</p>
							</div>
						</li>
						<li>
							<div class="relative flex items-start">
								<p class="text-xl leading-relaxed line-clamp-7 text-yellow-500">{{$review['star']}}</p>
							</div>
						</li>

					</ul>
				</div>
				<p class="text-neutral-900 text-lg max-w-2xl mt-4">レビュー内容：</p>
				<p class="text-neutral-800 text-lg max-w-2xl mt-3">{{$review['content']}}</p>
				<div class="flex mt-3 items-center pb-5 border-b-2 border-gray-100 mb-2">
					<div class="flex"></div>
				</div>
				<span class="title-font">タグ：{{ $review->tag->name }}
				</span>


			</div>
			<div class="relative">
				<div class="h-full md:max-w-full max-w-sm mx-auto lg:flex lg:flex-col">
					<div class="w-full aspect-w-4 aspect-h-3 relative mb-8">
						<img alt="Onsen Image" class="w-full h-full object-cover absolute z-20"
							src="{{ asset($review->image) }}">
					</div>

					<div class="w-full aspect-w-4 aspect-h-3 relative">
						<div id="map" class="w-full h-full absolute"></div>
					</div>
				</div>
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


</body>
@endsection