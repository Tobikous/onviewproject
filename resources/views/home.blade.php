@extends('layouts.app1')

@section('content')

<body>

	@if (session('success'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-20 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('success') }}</p>
		</div>
	</div>
	@endif


	<main class="max-w-5xl px-5 py-10 mx-auto xl:px-0 tails-selected-element">

		@auth
		<div>
			<div class="sliderAx h-auto">
				@foreach($reviews as $count =>$review)
				<div id="slider-{{$count+1}}" class="container mx-auto">
					<div class="relative bg-cover bg-center h-auto text-white py-24 px-10 object-fill"
						style="background-image: url({{$review['image']}})">
						<div class="absolute inset-0 bg-black opacity-30"></div>
						<div class="relative md:w-1/2">
							<p class="font-bold text-sm uppercase">{{$review['updated_at']->format('Y年m月d日')}}</p>
							<p class="text-3xl font-bold">{{$review['onsenName']}}</p>
							<p class="text-2xl mb-10 leading-none"></p>
							<a href="/review/{{$review['id']}}"
								class="bg-orange-500 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-orange-600">レビューを見る</a>
						</div>
					</div>
					<br>
				</div>
				@endforeach
			</div>
			<div class="flex justify-between w-12 mx-auto pb-2">
				@foreach($reviews as $count =>$review)
				<button id="sButton{{$count+1}}" onclick="sliderButton({{$count+1}})"
					class="bg-orange-400 hover:bg-orange-500 rounded-full w-5 pb-2 mr-2"></button>
				@endforeach
			</div>

		</div>


		<script>
			var cont = 0;
			var sliderCount = {
				{
					$reviews - > count()
				}
			};
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
		@endauth

		@guest
		<div
			class="relative flex flex-col items-center justify-center w-full px-6 bg-white bg-cover lg:py-16 min-w-screen py-20 tails-selected-element">
			<div
				class="flex flex-col items-center justify-center mx-auto sm:p-6 xl:p-8 lg:flex-row lg:max-w-6xl lg:p-0">
				<div
					class="container relative z-20 flex flex-col w-full px-5 pb-1 pr-12 mb-16 text-2xl text-gray-700 lg:w-1/2 sm:pr-0 md:pr-6 md:pl-0 lg:pl-5 xl:pr-10 sm:items-center lg:items-start lg:mb-0">
					<h1 class="relative z-20 text-4xl font-extrabold leading-none text-orange-500 xl:text-4xl sm:text-center lg:text-left"
						data-primary="purple-500">おんびゅ～へようこそ！</h1>
					<h1 class="relative z-20 text-4xl font-extrabold leading-none text-orange-500 xl:text-5xl sm:text-center lg:text-left"
						data-primary="purple-500"></h1>
					<p class="relative z-20 block mt-6 text-base text-gray-500 xl:text-xl sm:text-center lg:text-left">
						温泉レビューサイトおんびゅ～では、温泉、サウナのレビューの投稿や閲覧ができます。皆さんでより良い温泉ライフを一緒に開拓していきましょう！</p>
					<div class="relative flex mt-4">
						<a href="{{ route('register') }}"
							class="flex items-center self-start justify-center px-5 py-2 mt-5 text-base font-medium leading-tight text-white transition duration-150 ease-in-out bg-orange-500 border border-transparent rounded-full shadow lg:py-4 hover:bg-orange-600 focus:outline-none focus:border-orange-600 focus:shadow-outline-orange md:text-lg xl:text-xl md:px-5 xl:px-10"
							data-primary="purple-500" data-rounded="rounded-full">
							<svg class="w-6 h-6 mr-1" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
									stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" />
								<path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"
									stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" />
							</svg>会員登録</a>
						<a href="{{ route('login') }}"
							class="relative flex items-center self-start justify-center py-2 pl-10 pr-5 mt-5 ml-5 text-base font-medium leading-tight text-orange-500 transition duration-150 ease-in-out bg-gray-200 hover:bg-orange-500 border-transparent rounded-full shadow-sm lg:py-4 md:pl-16 md:pr-5 xl:pr-10 hover:text-white focus:outline-none md:text-lg xl:text-xl"
							data-primary="orange-500" data-rounded="rounded-full">
							<svg class="absolute left-0 w-6 h-6 ml-4 md:w-10 md:h-10" fill="none" stroke="currentColor"
								viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
									class=""></path>
							</svg>
							<span data-primary="orange-600">ログイン</span>
						</a>
					</div>
				</div>
				<div class="relative w-full px-5 rounded-lg cursor-pointer lg:w-1/2 group xl:px-0">
					<div class="absolute top-0 left-0 w-11/12 -mt-20 opacity-50">
						<svg class="w-full h-full ml-4 text-purple-100" data-primary="purple-500" viewBox="0 0 200 200"
							xmlns="http://www.w3.org/2000/svg">
							<path fill="currentColor"
								d="M45,-78C58.3,-70.3,69,-58.2,75.2,-44.4C81.3,-30.7,82.9,-15.3,83.5,0.4C84.2,16,83.8,32.1,76.5,43.9C69.2,55.7,55.1,63.3,41.2,69.4C27.3,75.4,13.6,80,-0.7,81.2C-15.1,82.5,-30.1,80.3,-41.2,72.6C-52.2,64.9,-59.2,51.6,-67.1,38.5C-75.1,25.5,-83.9,12.8,-83.8,0C-83.8,-12.7,-74.9,-25.4,-65.8,-36.4C-56.7,-47.4,-47.4,-56.7,-36.4,-65.7C-25.4,-74.7,-12.7,-83.5,1.6,-86.2C15.9,-89,31.8,-85.7,45,-78Z"
								transform="translate(100 100)" class=""></path>
						</svg>
					</div>
					<div id="default-carousel" class="relative z-10 object-cover w-full h-full" data-carousel="static">
						<div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
							<div class="hidden duration-700 ease-in-out" data-carousel-item>
								<span
									class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
									Slide</span>
								<img src='images/onsenback03.jpg'
									class="object-cover w-full h-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
									alt="onsenslider">
							</div>
							<div class="hidden duration-700 ease-in-out" data-carousel-item>
								<img src='images/onsenback02.jpg'
									class="object-cover w-full h-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
									alt="onsenslider">
							</div>
							<div class="hidden duration-700 ease-in-out" data-carousel-item>
								<img src='images/onsenback01.jpg'
									class="object-cover w-full h-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
									alt="onsenslider">
							</div>

						</div>
						<div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
							<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
								data-carousel-slide-to="0"></button>
							<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
								data-carousel-slide-to="1"></button>
							<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
								data-carousel-slide-to="2"></button>
						</div>
						<button type="button"
							class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
							data-carousel-prev>
							<span
								class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/40 dark:bg-gray-800/30 hover:bg-white/60 group-focus:outline-none">
								<svg class="w-5 h-5 text-gray-200 sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
									stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M15 19l-7-7 7-7"></path>
								</svg>
								<span class="hidden">Previous</span>
							</span>
						</button>
						<button type="button"
							class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
							data-carousel-next>
							<span
								class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/40 dark:bg-gray-800/30 hover:bg-white/60 group-focus:outline-none">
								<svg class="w-5 h-5 text-gray-200 sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
									stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M9 5l7 7-7 7"></path>
								</svg>
								<span class="hidden">Next</span>
							</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		@endguest


		<section class="flex flex-wrap mt-14 overflow-hidden">
			<div class="w-full overflow-hidden md:w-4/6 lg:w-4/6 xl:w-4/6 md:px-5">
				<div class="ml-2 mr-2 md:mr-4">
					<div class="flex items-center justify-between w-full pb-5 mb-8 border-b border-gray-200">
						<h2 class="text-3xl font-bold text-gray-800">投稿レビュー一覧</h2>
						<a href="articles"
							class="flex items-center text-base font-semibold text-blue-400 hover:text-blue-500 group">
							<span class="">すべてのレビューを見る</span>
							<svg class="w-4 h-4 mt-0.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
								xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
								</path>
							</svg>
						</a>
					</div>

					<div class="pb-12">
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


						<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-lg">
							{{$review['star']}} <span
								class="text-gray-500 inline-flex items-center inline text-sm ml-4 font-base">
								更新日:{{$review['updated_at']->format('Y年m月d日')}}</span></h2>


						<p class="leading-relaxed truncate overflow-hidden">{{$review['content']}}</p>

						<p class="text-gray-500">
							<a href="/review/{{$review['id']}}"
								class="inline-flex items-center inline text-sm underline">
								<span class="">続きを読む</span>
								<svg class="w-3 h-3 ml-1 transform -rotate-45" fill="none" stroke="currentColor"
									viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
								</svg>
							</a>
						</p>
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


							<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-lg md:text-base">
								{{$review['star']}} <span
									class="text-gray-500 inline-flex items-center inline text-sm ml-4 md:text-xs md:hidden">
									更新日:{{$review['updated_at']->format('Y年m月d日')}}</span>
							</h2>

							<p class="leading-relaxed truncate overflow-hidden">{{$review['content']}}</p>

							<p class="text-gray-500">
								<a href="/review/{{$review['id']}}"
									class="inline-flex items-center inline text-sm underline">
									<span class="">続きを読む</span>
									<svg class="w-3 h-3 ml-1 transform -rotate-45" fill="none" stroke="currentColor"
										viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
									</svg>
								</a>


							</p>
						</div>
						@endif
						@endforeach
					</div>
				</div>

				<div class="mt-16 text-center mb-10">
					<a href="{{ route('articles') }}"
						class="px-5 py-3 text-sm font-medium tracking-widest text-white uppercase bg-orange-500 hover:bg-orange-600 rounded-lg">
						すべてのレビューを見る</a>
				</div>

			</div>

			<div class="w-full mt-12 overflow-hidden md:w-2/6 lg:w-2/6 xl:w-2/6 md:mt-0 md:px-5">
				<div class="ml-2 mr-2 md:ml-4">
					<div class="rounded-lg bg-gray-100 p-7">
						<div class="pb-6 text-left">
							<h2 class="mb-1 text-lg font-medium text-gray-900">温泉名検索フォーム</h2>
							<span class="block text-xs italic text-gray-500">こちらから、レビューを探せます</span>
							<form action="/search" method="GET">
								@csrf
								<div class="mt-5 overflow-hidden bg-white border-none rounded-lg">
									<input
										class="w-full px-3 py-2 placeholder-gray-400 bg-transparent border-2 border-gray-200 rounded-lg focus:outline-none"
										type="text" name="keyword" id="keyword" placeholder="温泉名を入力">
								</div>

								<button type="submit"
									class="flex items-center justify-center w-full py-3 mt-5 text-sm font-medium tracking-widest text-white uppercase bg-orange-500 hover:bg-orange-600 rounded-lg">
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
						<div class="ml-1 flex items-center justify-between w-full pb-2 mb-2 border-b border-gray-200">
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
										<li class="flex"><a href="/tag/{{$tag['id']}}"
												class="mb-2 flex-1 block text-lg text-gray-800 hover:text-orange-500 focus:text-orange-700">‣
												{{$tag['name']}}</a><span class="text-lg text-gray-700"></span></li>
										@endforeach
									</div>
								</div>
							</div>
						</div>



						<ul class="ml-1">
							@foreach($allTags AS $tag)
							@if ($loop->iteration <= 5) <li class="flex"><a href="/tag/{{$tag['id']}}"
									class="mb-2 flex-1 block text-lg text-gray-800 hover:text-orange-500 focus:text-orange-700">‣
									{{$tag['name']}}</a><span class="text-lg text-gray-700"></span></li>
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