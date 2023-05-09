@extends('layouts.app1')

@section('home-link')
@endsection


@section('content')

<body>

	@if (session('success'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-20 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('success') }}</p>
		</div>
	</div>
	@endif

	@if (session('error'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-20 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('error') }}</p>
		</div>
	</div>
	@endif

	@guest
	<section class="px-2 bg-white md:px-0 pt-10 pb-12 tails-selected-element">
		<div class="container items-center max-w-6xl px-8 mx-auto">
			<div class="flex flex-wrap items-center sm:-mx-3">
				<div class="relative flex items-center justify-center w-full">
					<img src="{{ asset('svg/onsen_icon02.svg') }}" alt="customIcon" class="w-16 h-16 opacity-1 m-4">
					<h2 class="text-4xl font-normal text-gray-800 tracking-widest">はじめに</h2>
				</div>

				<div class="w-full md:w-1/2 p-7">
					<div class="w-full h-auto overflow-hidden shadow-xl rounded-sm">
						<img src="images/onsenback03.jpg" class="w-full h-64 object-cover md:h-96">
					</div>
				</div>
				<div class="w-full md:w-1/2  px-4 md:px-7">
					<div
						class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
						<p class="mx-auto text-gray-700 sm:max-w-md lg:text-lg md:max-w-2xl text-lg tracking-widest">
							温泉レビューサイトおんびゅ～へようこそ！<br><br>当サイトは、普段の温泉ライフをより豊かにする為につくられた、温泉専用のレビューサイトです。
							みなさまと共に全国の温泉をレビューして、より良い温泉ライフを楽しみましょう！<br><br>
							会員登録することでレビューを投稿することが可能になります。宿泊案内や宿の予約等につながるようなサイトではないので悪しからずご了承くださいませ。
							<br><br>さぁ、ひとっ風呂いきますか！
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endguest

	<main class="px-5 py-10 mx-auto xl:px-20 tails-selected-element">

		<div class="px-7">
			<div class="sliderAx h-auto">
				@foreach($onsens as $count =>$onsen)
				<div id="slider-{{$count+1}}" class="container mx-auto">
					<div class="relative bg-cover bg-center h-auto text-white py-24 px-10 object-fill rounded-md"
						style="background-image: url({{$randomReviews[$count]['image']}})">
						<div class="absolute inset-0 bg-black opacity-30 rounded-md"></div>
						<div class="relative md:w-1/2">
							<p class="font-bold text-sm uppercase">{{$onsen['area']}}</p>
							<p class="text-3xl font-bold">{{$onsen['name']}}</p>
							<p class="text-2xl mb-10 leading-none"></p>
							<a href="/onsen/{{$onsen['id']}}"
								class="bg-orange-500 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-orange-600">詳細</a>
						</div>
					</div>
					<br>
				</div>
				@endforeach
			</div>
			<div class="flex justify-between w-12 mx-auto pb-2">
				@foreach($onsens as $count =>$onsen)
				<button id="sButton{{$count+1}}" onclick="sliderButton({{$count+1}})"
					class="bg-orange-400 hover:bg-orange-500 rounded-full w-5 pb-2 mr-2"></button>
				@endforeach
			</div>

		</div>


		<script>
			var cont = 0;
			var sliderCount = @json(count($onsens));
			var xx;

			function loopSlider() {
				xx = setInterval(function() {
					cont = (cont + 1) % sliderCount;
					updateSlider();
				}, 8000);
			}

			function sliderButton(count) {
				cont = parseInt(count) - 1;
				updateSlider();
				reinitLoop(4000);
			}

			function updateSlider() {
				for (var i = 1; i <= sliderCount; i++) {
					if (i === cont + 1) {
						$("#slider-" + i).stop(true, true).delay(400).fadeIn(400);
						$("#sButton" + i).addClass("bg-orange-800");
					} else {
						$("#slider-" + i).stop(true, true).fadeOut(410);
						$("#sButton" + i).removeClass("bg-orange-800");
					}
				}
			}
			$(window).ready(function() {
				for (var i = 2; i <= sliderCount; i++) {
					$("#slider-" + i).hide();
				}
				loopSlider();
			});

			function reinitLoop(time) {
				clearInterval(xx);
				setTimeout(loopSlider, time);
			}
		</script>








		<section class="flex flex-wrap mt-14 overflow-hidden px-7 md:px-0">
			<div class="w-full overflow-hidden md:w-4/6 md:px-5">
				<div class="md:ml-2 md:mr-4">
					<div class="flex items-center justify-between w-full pb-5 mb-8 border-b border-gray-200">
						<h2 class="text-3xl font-bold text-gray-800">投稿レビュー一覧</h2>
					</div>

					<div class="pb-12 md:mr-5">
						@foreach($reviews as $review)
						@if($loop->first)
						<a href="/review/{{$review['id']}}"
							class="relative block w-full overflow-hidden h-80 rounded-xl">
							<img class="object-cover object-top w-full h-full transition duration-300 ease-out transform scale-100 hover:scale-105"
								src="{{ asset($review->image) }}" alt="onsenImage">
						</a>
						<a
							class="relative block mt-3 mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase"></a>
						<a href="/review/{{$review['id']}}"
							class="block text-2xl font-medium leading-tight text-gray-700 hover:text-gray-900">{{$review['onsenName']}}</a>


						<h2 class="text-orange-500 tracking-widest  title-font font-medium text-lg mb-2">
							{{$review['star']}} <span
								class="text-gray-500 inline-flex items-center inline text-sm ml-4 font-base">
								更新日:{{$review['updated_at']->format('Y年m月d日')}}</span></h2>


						<div class="p-1 rounded bg-gray-100">
							<p class="leading-relaxed truncate overflow-hidden">{{$review['content']}}</p>
							<a href="/review/{{$review['id']}}"
								class="inline-flex items-center inline text-sm underline  text-gray-500">
								<span>続きを読む</span>
								<svg class="w-3 h-3 ml-1 transform -rotate-45" fill="none" stroke="currentColor"
									viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
								</svg>
							</a>
						</div>
						@endif
						@endforeach
					</div>

					<div class="grid grid-cols-12 gap-8">
						@foreach($reviews as $review)
						@if(!$loop->first)
						<div class="col-span-12 md:col-span-6">
							<a href="/review/{{$review['id']}}" class=" block h-48 mb-3 overflow-hidden rounded-lg">
								<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 hover:scale-105"
									src="{{ asset($review->image) }}" alt="onsenImage">
							</a>
							<a
								class="relative block mt-3 mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase"></a>
							<a href="/review/{{$review['id']}}"
								class="block text-2xl font-medium leading-tight text-gray-700 hover:text-gray-900">{{$review['onsenName']}}</a>


							<h2
								class="text-orange-500 tracking-widest  title-font font-medium text-lg md:text-base mb-2">
								{{$review['star']}} <span
									class="text-gray-500 inline-flex items-center inline text-sm ml-4 md:text-xs md:hidden">
									更新日:{{$review['updated_at']->format('Y年m月d日')}}</span>
							</h2>

							<div class="p-1 rounded bg-gray-100">
								<p class="leading-relaxed truncate overflow-hidden text-gray-800">{{$review['content']}}
								</p>
								<a href="/review/{{$review['id']}}"
									class="inline-flex items-center inline text-sm underline text-gray-500">
									<span>続きを読む</span>
									<svg class="w-3 h-3 ml-1 transform -rotate-45" fill="none" stroke="currentColor"
										viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
									</svg>
								</a>


							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>

				<div class="mt-16 text-center mb-10">
					<a href="{{ route('review_lists') }}"
						class="px-5 py-3 text-md font-semibold tracking-widest text-white uppercase bg-orange-500 hover:bg-orange-600 rounded-lg">
						すべてのレビューを見る</a>
				</div>

			</div>

			<div class="w-full mt-12 overflow-hidden md:w-2/6 md:mt-0 md:px-5">
				<div class="ml-2 mr-2 md:ml-4">

					<div class="rounded-lg bg-gray-100 p-7">
						<div class="pb-6 text-left">
							<h2 class="mb-1 text-lg font-medium text-gray-900">レビュー検索</h2>
							<form action="/review_search" method="GET">
								@csrf
								<div class="mt-5 overflow-hidden bg-white border-none rounded-lg">
									<input
										class="w-full px-3 py-2 placeholder-gray-400 bg-transparent border-2 border-gray-200 rounded-lg focus:outline-none"
										type="text" name="keyword" id="keyword" placeholder="温泉名を入力">
								</div>

								<button type="submit"
									class="flex items-center justify-center w-full py-3 mt-5 text-md font-semibold tracking-widest text-white uppercase bg-orange-500 hover:bg-orange-600 rounded-lg">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										stroke-width="1.5" stroke="currentColor"
										class="w-5 h-5 text-white dark:text-gray-600 mr-1">
										<path stroke-linecap="round" stroke-linejoin="round"
											d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
									</svg>
									検索
								</button>

							</form>
						</div>
					</div>

					<div class="mt-10">
						<div
							class="ml-1 pr-1 flex items-center justify-between w-full pb-2 mb-2 border-b border-gray-200">
							<h2 class="text-lg font-bold text-gray-900">タグ一覧</h2>
							<button type="button" onclick="openModal()"
								class="flex items-center text-sm font-semibold text-blue-400 hover:text-blue-500 group">
								<span class="">すべてのタグを表示する</span>
								<svg class="w-4 h-4 mt-0.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M9 5l7 7-7 7">
									</path>
								</svg>
							</button>
						</div>


						<div id="modal" onclick="closeModal(event)"
							class="fixed insert-0 z-50 overflow-auto bg-black bg-opacity-50 inset-0 overflow-y-auto hidden">
							<div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20">
								<div id="modalContent" class="bg-white rounded-lg shadow-xl w-full max-w-md">
									<div class="mx-6 mt-5 flex items-center justify-between">
										<div
											class="flex items-center justify-between w-full pb-2 mb-2 border-b border-gray-200">
											<h2 class="text-lg font-bold text-gray-900">タグ一覧</h2>
										</div>
										<button type="button" onclick="cancelModal();"
											class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-2 mb-5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
											<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
												xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd"
													d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
													clip-rule="evenodd"></path>
											</svg>
										</button>
									</div>
									<div class="px-6 pb-6">
										@foreach($allTags AS $tag)
										<a href="/tag/{{$tag['id']}}"
											class="m-1 inline-flex items-center justify-center px-2 py-0.5 text-base font-medium leading-6 text-white bg-orange-400 border border-transparent rounded-lg md:w-auto hover:bg-orange-500">
											#
											{{$tag['name']}}
										</a>
										@endforeach
									</div>
								</div>
							</div>
						</div>



						<ul class="ml-1">
							@foreach($allTags AS $tag)
							@if ($loop->iteration <= 5) <a href="/tag/{{$tag['id']}}"
								class="m-1 inline-flex items-center justify-center px-2 py-0.5 text-base font-medium leading-6 text-white bg-orange-400 border border-transparent rounded-lg md:w-auto hover:bg-orange-500">
								#
								{{$tag['name']}}
								</a>
								@endif
								@endforeach
						</ul>
					</div>

					<div class="mt-12">
						@auth
						<h2 class="ml-1 mb-5 text-lg font-medium text-gray-900">自分が投稿したレビュー</h2>
						<ul class="">
							@foreach($reviews AS $review)
							@if($review->isWrittenByUser(auth()->user()))
							<li class="mb-5">
								<a href="/review/{{$review['id']}}" class="flex">
									<div class="w-1/3 overflow-hidden rounded">
										<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 rounded hover:scale-105"
											src="{{ asset($review->image) }}" alt="onsenImage">
									</div>
									<div class="flex flex-col items-start justify-center w-2/3 p-2">
										<h3 href="/review/{{$review['id']}}"
											class="font-medium leading-tight text-gray-700 hover:text-gray-900 ext-gray-900">
											{{$review['onsenName']}}
										</h3>
										<h2 class="text-yellow-500 tracking-widest  title-font font-base text-sm">
											{{$review['star']}}</h2>
										<span
											class="block text-xs text-gray-500">更新日：{{$review['updated_at']->format('Y年m月d日')}}</span>
									</div>
								</a>
							</li>
							@endif
							@endforeach
						</ul>
						@endauth
					</div>
				</div>
			</div>

		</section>

	</main>

</body>

@endsection