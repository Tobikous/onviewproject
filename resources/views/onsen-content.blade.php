@extends('layouts.app1')

@section('onsens-link')
@endsection

@section('modal-onsens-link')
@endsection

@section('content')

<main>

	@if (session('success'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-10 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('success') }}</p>
		</div>
	</div>
	@endif

	@if (session('error'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-10 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('error') }}</p>
		</div>
	</div>
	@endif


	<main class="max-w-5xl px-5 py-5 md:py-10 mx-auto xl:px-0 tails-selected-element">

		<section class="mx-7 mb-5">
			<div class="flex flex-wrap md:flex-nowrap">
				<div class="w-full overflow-hidden md:w-4/6">
					<div class="pt-4 pb-2.5 px-0.5">
						<div class="pt-2"><span class="font-bold text-2xl">{{$onsen['name']}}</span>
						</div>
						<div class="mt-1.5"><span class="text-orange-500 text-2xl">{{ str_replace(['(',
								')'], '', star_rating($onsen->evaluation)) }}</span><span class="ml-1">{{
								$onsen->evaluation }} </span></div>
					</div>
					<div class="text-xs my-0.5"><span class="font-bold">都道府県 :</span><span
							class="ml-1.5">{{$onsen['area']}}<span class="ml-4 font-bold">最寄り駅 :</span><span
								class="ml-1.5">{{$onsen['nearest_station']}}</div>
					<div class="text-xs my-1"><span class="font-bold">定休日 :</span><span
							class="ml-1.5">{{$onsen['regular_holiday']}}</span>
						<div class="md:p-3"></div>
					</div>
				</div>

				@auth

				@php
				$isFavorite = auth()->user()->favorites->contains('id', $onsen->id);
				@endphp


				<div class="w-full overflow-hidden md:w-2/6 pt-3 mb-5 md:mb-0 md:ml-5">
					<div class="mt-2.5 px-3 py-2.5 md:bg-gray-200 flex justify-center">
						@if ($isFavorite)
						<form action="{{ route('favorite.remove') }}" method="POST"
							class="m-1 inline-flex items-center justify-center px-2 py-0.5 text-sm font-medium leading-6 text-white bg-orange-400 border border-transparent rounded md:w-auto hover:bg-orange-500">
							@csrf
							<input type="hidden" name="onsen_id" value="{{ $onsen->id }}">
							<button type="submit" class="flex items-center"><img src="{{ asset('svg/heart_icon.svg') }}"
									alt="customIcon" class="mr-1.5 w-5 h-5 mt-0.5">お気に入り解除</button>
						</form>
						@else
						<form action="{{ route('favorite.add') }}" method="POST"
							class="my-1 inline-flex items-center justify-center px-2 py-0.5 text-sm font-medium leading-6 text-white bg-orange-400 border border-transparent rounded md:w-auto hover:bg-orange-500">
							@csrf
							<input type="hidden" name="onsen_id" value="{{ $onsen->id }}">
							<button type="submit" class="flex items-center">
								<img src="{{ asset('svg/heart_icon2.svg') }}" alt="customIcon"
									class="mr-1.5 w-5 h-5 mt-0.5">
								お気に入りに追加
							</button>

						</form>

						@endif
						<a href="/edit_onsen/{{$onsen['id']}}"
							class="m-1 inline-flex items-center justify-center px-2 py-0.5 text-sm font-medium leading-6 text-white bg-orange-400 border border-transparent rounded md:w-auto hover:bg-orange-500">
							<img src="{{ asset('svg/edit_article2.svg') }}" alt="customIcon"
								class="mr-1.5 w-5 h-5 mt-0.5">温泉情報の編集
						</a>
					</div>
				</div>

				@endauth


			</div>

			<div class="flex">
				<button id="topButton"
					class="w-1/3 h-12 text-white bg-orange-500 border border-gray-200 shadow-inner hover:bg-white hover:text-orange-500 focus:outline-none text-md font-semibold rounded">
					トップ
				</button>
				<button id="reviewButton"
					class="w-1/3 h-12 text-white bg-orange-500 border border-gray-200 shadow-inner hover:bg-white hover:text-orange-500 focus:outline-none text-md font-semibold rounded">
					レビュー
				</button>

				<button id="mapButton"
					class="w-1/3 h-12 text-white bg-orange-500 border border-gray-200 shadow-inner hover:bg-white hover:text-orange-500 focus:outline-none text-md font-semibold rounded">
					地図
				</button>
			</div>
		</section>

		<section class="flex flex-wrap overflow-hidden px-7 md:px-0">

			<div id="topSection" class="w-full overflow-hidden md:w-4/6 lg:w-4/6 xl:w-4/6 md:px-5">
				<div class="md:ml-2 md:mr-4">

					<div class="flex justify-center">
						<div class="w-96 h-72 relative mb-8">
							@foreach($reviews as $review)
							@if($loop->first)
							<img alt="Onsen Image" class="w-full h-full object-cover absolute z-20"
								src="{{ asset($review['image']) }}">
							@endif
							@endforeach
						</div>
					</div>

					<div class="m-5">
						<div class="my-5 border rounded">
							<div class="m-1 p-1.5 bg-orange-500 rounded font-bold text-gray-900">基本情報</div>
							<div class="p-3">
								<div class="pt-1">
									<h2 class="pl-2 font-bold">住所</h2>
									<div class="text-sm bg-white w-4/5 p-2.5 border-b border-gray-300">
										{{$onsen['formatted_address']}}</div>
								</div>
								<div class="pt-2">
									<h2 class="pl-2 font-bold">公式サイト</h2>
									<div class="text-sm bg-white w-4/5 p-2.5 border-b border-gray-300 underline">
										<a href="{{ $onsen['URL'] }}" target="_blank">{{ $onsen['URL'] }}</a>
									</div>
								</div>


							</div>


						</div>

						<div class="pt-6 mb-6 font-bold text-xl">レビュー</div>

						@foreach($reviews as $review)
						<div class="my-2">
							<div class="flex items-center">
								<img src="{{ asset('svg/human_icon.svg') }}" alt="customIcon" class="ml-1.5 w-4 h-4">
								<span class="ml-2 text-gray-700 text-sm">{{ $review->user->name }}</span>
							</div>
							<div class="mt-2 p-4 border border-gray-300 rounded">
								<div class="truncate overflow-hidden text-gray-600 text-sm">{{$review['content']}}</div>

								<a href="/review/{{$review['id']}}"
									class="text-gray-500 inline-flex items-center inline text-sm underline">
									<span class="">続きを読む</span>
									<svg class="w-3 h-3 ml-1 transform -rotate-45" fill="none" stroke="currentColor"
										viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
									</svg>
								</a>
								<h2 class="text-orange-500 tracking-widest text-sm mt-2.5">
									{{$review['star']}} <span
										class="text-gray-400 inline-flex items-center inline text-sm ml-4">
										更新日:{{$review['updated_at']->format('Y年m月d日')}}</span></h2>

							</div>

						</div>
						@endforeach

					</div>
				</div>
			</div>

			<div id="reviewSection" class="w-full md:w-4/6 lg:w-4/6 xl:w-4/6 md:px-5" style="display:none;">
				<div class="md:ml-2 md:mr-4 pb-10 md:pb-5">
					<div class="mb-6">
						<p class="text-base text-gray-700 leading-5">
							@if ($reviews->firstItem())
							<span class="font-medium">{{ $reviews->firstItem() }}</span>
							から
							<span class="font-medium">{{ $reviews->lastItem() }}</span>
							@else
							{{ $reviews->count() }} 件を表示
							@endif

							/全
							<span class="font-medium">{{ $reviews->total() }}</span>
							件
						</p>
					</div>

					@foreach($reviews as $review)
					<div class="p-3 border border-gray-300 rounded my-5">
						<div class="flex items-center pb-2 border-b border-gray-300">
							<img src="{{ asset('svg/human_icon.svg') }}" alt="customIcon" class="ml-0.5 w-4 h-4">
							<span class="ml-2 text-gray-900 text-sm font-bold">{{ $review->user->name }}</span>
						</div>
						<h2 class="text-orange-500 tracking-widest text-xl py-2.5 border-b border-gray-300">
							{{$review['star']}} </h2>
						<div class="text-gray-600 inline-flex items-center inline text-sm py-2">
							更新日:{{$review['updated_at']->format('Y年m月d日')}}</div>
						<div class="text-gray-900 text-base my-2">{{$review['content']}}<a
								href="/review/{{$review['id']}}"
								class="text-gray-500 inline-flex items-center inline text-sm underline ml-1.5">
								<span class="">続きを読む</span>
								<svg class="w-3 h-3 ml-1 transform -rotate-45" fill="none" stroke="currentColor"
									viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
								</svg>
							</a></div>
						<div class="w-1/3 overflow-hidden mt-5 mb-3">
							<img class="object-cover object-center w-full h-full" src="{{ asset($review->image) }}"
								alt="onsenImage">
						</div>
					</div>
					@endforeach


					<div class="flex flex-row-reverse justify-center pt-5 pb-10">
						<p class="ml-5">{{ $reviews->links() }}</p>
						<p class="text-base text-gray-700 leading-5 pr-4 pt-2.5">
							表示中
							@if ($reviews->firstItem())
							<span class="font-medium">{{ $reviews->firstItem() }}</span>
							から
							<span class="font-medium">{{ $reviews->lastItem() }}</span>
							@else
							{{ $reviews->count() }}
							@endif
							/
							<span class="font-medium">{{ $reviews->total() }}</span>
							件
						</p>

					</div>

				</div>
			</div>

			<div id="mapSection" class="w-full overflow-hidden md:w-4/6 lg:w-4/6 xl:w-4/6 md:px-5 "
				style="display:none;">
				<div class="md:ml-3 md:pb-5">
					<div class="w-full aspect-w-5 aspect-h-4 relative">
						<div id="map" class="w-full h-full absolute"></div>
					</div>
					<div class="container mx-auto mt-8 border border-gray-300">
						<div class="flex">
							<div class="text-sm font-bold bg-orange-100 w-1/5 p-2.5 border-r border-b border-gray-300">
								住所</div>
							<div class="text-sm bg-white w-4/5 p-2.5 border-b border-gray-300">
								{{$onsen['formatted_address']}}</div>
						</div>
						<div class="flex">
							<div class="text-sm font-bold bg-orange-100 w-1/5 p-2.5 border-r border-gray-300">最寄り駅
							</div>
							<div class="text-sm bg-white w-4/5 p-2.5">{{$onsen['nearest_station']}}</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-full overflow-hidden md:w-2/6 lg:w-2/6 xl:w-2/6 mt-10 md:mt-0 md:pr-6">
				<div class="mr-2 md:ml-2">

					<div class="pr-1 w-full py-3 mb-2 border-t border-gray-300">
						<h2 class="flex text-2xl font-normal">
							<img src="{{ asset('svg/phone_icon.svg') }}" alt="customIcon" class="mr-1.5 w-5 h-5 mt-2">
							<a href="tel:{{$onsen->phone_number}}">{{$onsen->phone_number}}</a>
						</h2>
					</div>



					<div class="mt-10">
						<div class="pr-1 flex items-center justify-between w-full pb-2 mb-2 border-b border-gray-300">
							<h2 class="text-base font-medium text-gray-900">周辺の温泉</h2>
						</div>

					</div>

					<!-- <div class="mt-12">
						<div class="pr-1 flex items-center justify-between w-full pb-2 mb-2 border-b border-gray-300">
							<h2 class="text-base font-medium text-gray-900">周辺の温泉</h2>
						</div>
						@foreach($reviews AS $review)

						<ul class="mt-5">
							<a href="/review/{{$review['id']}}" class="flex">
								<div class="w-1/3 overflow-hidden rounded">
									<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 rounded hover:scale-105"
										src="{{ asset($review->image) }}" alt="onsenImage">
								</div>
								<div class="flex flex-col items-start justify-center w-2/3 p-2">
									<h3 href="/review/{{$review['id']}}"
										class="pb-4 font-medium leading-tight text-gray-700 hover:text-gray-900 ext-gray-900">
										{{$review['onsenName']}}
									</h3>
									<h2 class="text-orange-500 tracking-widest  title-font font-base text-sm">
										{{$review['star']}}</h2>
								</div>
							</a>
						</ul>
						@endforeach
					</div> -->
				</div>
			</div>


		</section>

	</main>




	<script>
		var data = @json($onsen);
		var latData = data['latitude'];
		var lngData = data['longitude'];
		var adress = data['formatted_address'];
		var areaData = data['name'];

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

		window.onload = function() {
			const topButton = document.getElementById('topButton');
			const reviewButton = document.getElementById('reviewButton');
			const mapButton = document.getElementById('mapButton');
			const topSection = document.getElementById('topSection');
			const reviewSection = document.getElementById('reviewSection');
			const mapSection = document.getElementById('mapSection');

			function showSection(sectionToShow) {
				topSection.style.display = 'none';
				reviewSection.style.display = 'none';
				mapSection.style.display = 'none';
				sectionToShow.style.display = 'block';
			}

			reviewButton.addEventListener('click', () => showSection(reviewSection));
			topButton.addEventListener('click', () => showSection(topSection));
			mapButton.addEventListener('click', () => showSection(mapSection));
		};
	</script>

	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
	</script>

</main>

@endsection