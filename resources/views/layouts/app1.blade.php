<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />


	@vite(['resources/css/app.css', 'resources/js/app.js'])


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">


	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<script>
		var cont = 0;

		function loopSlider() {
			var xx = setInterval(function() {
				switch (cont) {
					case 0: {
						$("#slider-1").fadeOut(400);
						$("#slider-2").delay(400).fadeIn(400);
						$("#sButton1").removeClass("bg-purple-800");
						$("#sButton2").addClass("bg-purple-800");
						cont = 1;

						break;
					}
					case 1: {

						$("#slider-2").fadeOut(400);
						$("#slider-1").delay(400).fadeIn(400);
						$("#sButton2").removeClass("bg-purple-800");
						$("#sButton1").addClass("bg-purple-800");

						cont = 0;

						break;
					}


				}
			}, 8000);

		}

		function reinitLoop(time) {
			clearInterval(xx);
			setTimeout(loopSlider(), time);
		}



		function sliderButton1() {

			$("#slider-2").fadeOut(400);
			$("#slider-1").delay(400).fadeIn(400);
			$("#sButton2").removeClass("bg-purple-800");
			$("#sButton1").addClass("bg-purple-800");
			reinitLoop(4000);
			cont = 0

		}

		function sliderButton2() {
			$("#slider-1").fadeOut(400);
			$("#slider-2").delay(400).fadeIn(400);
			$("#sButton1").removeClass("bg-purple-800");
			$("#sButton2").addClass("bg-purple-800");
			reinitLoop(4000);
			cont = 1

		}

		$(window).ready(function() {
			$("#slider-2").hide();
			$("#sButton1").addClass("bg-purple-800");


			loopSlider();






		});
	</script>


</head>



<div id="app">

	<header x-data="{ open: false }"
		class="fixed inset-x-0 top-0 z-50 py-2 bg-gradient-to-br from-orange-600 via-indigo-00 to-yellow-300 tails-selected-element"
		data-primary="blue-500" data-tails-scripts="//unpkg.com/alpinejs">
		<div class="flex items-center justify-between h-20 px-8 mx-auto max-w-7xl">


			<a href="{{ url('/') }}"
				class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none">
				<span class="ml-3 font-extrabold text-2xl">{{ config('app.name', 'Laravel') }}</span>
			</a>

			<nav class="items-center justify-center hidden space-x-8 text-white md:flex">

				<a href="{{ url('/') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">ホーム</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-blue-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="blue-600" style="display: none;"></span>
					</span>
				</a>

				<a href="{{ route('article') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">レビュー一覧</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="blue-600" style="display: none;"></span>
					</span>
				</a>

				@auth
				<a href="{{ route('create') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">レビューを投稿</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="blue-600" style="display: none;"></span>
					</span>
				</a>
				<a href="/user/profile" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">各種変更</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="blue-600" style="display: none;"></span>
					</span>
				</a>
				@endauth

				<div class="w-0 h-5 border border-r border-white" data-primary="blue-800"></div>

				@guest
				<a href="{{ route('login') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block ml-5 text-base font-bold hover:text-gray-200 uppercase transition duration-150 ease text-white">
					<span class="block">ログイン</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span
							class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-2 border-white"></span>
					</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="blue-600" style="display: none;"></span>
					</span>
				</a>

				<a href="{{ route('register') }}"
					class="inline-flex items-center justify-center px-4 py-2 text-base font-medium tracking-normal text-white transition duration-150 bg-green-400 rounded hover:bg-green-500 ease tails-selected-element"
					data-rounded="rounded-md" data-primary="blue-600">
					<svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
							class=""></path>
					</svg>
					会員登録
				</a>
				@endguest

				@auth
				<a class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-blue-500 whitespace-no-wrap border border-blue-300 rounded-md shadow-sm bg-blue-50 focus:ring-offset-blue-600 hover:bg-white hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-100"
					data-rounded="rounded-md" data-primary="blue-600" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">ログアウト
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
				@endauth

			</nav>

			<div @click="open = !open"
				class="flex items-center justify-center h-full text-white md:hidden cursor-pointer">
				<div class="relative py-3 sm:max-w-xl mx-auto">
					<nav x-data="{ open: false }">
						<button
							class="text-white hover:text-gray-400 w-10 h-10 relative focus:outline-none bg-opacity-0"
							@click="open = !open">
							<span class="sr-only">Open main menu</span>
							<div
								class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
								<span aria-hidden="true"
									class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
									:class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
								<span aria-hidden="true"
									class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out"
									:class="{'opacity-0': open } "></span>
								<span aria-hidden="true"
									class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out"
									:class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
							</div>
						</button>
					</nav>
				</div>
			</div>




			<div class="absolute md:hidden right-0 top-full w-full divide-y divide-gray-200  border border-gray-200 bg-white shadow-md"
				x-show="open" x-transition:enter="transition ease-out duration-300"
				x-transition:enter-start="opacity-0 transform scale-90"
				x-transition:enter-end="opacity-100 transform scale-100"
				x-transition:leave="transition ease-in duration-300"
				x-transition:leave-start="opacity-100 transform scale-100"
				x-transition:leave-end="opacity-0 transform scale-90">


				<div class="flex items-center space-x-2 p-2">
					<img src="https://plchldr.co/i/40x40?bg=111111" alt="plchldr.co" class="h-9 w-9 rounded-full" />
					<div class="font-medium">Hafiz Haziq</div>
				</div>

				<div class="flex flex-col space-y-3 p-2">
					<a href="{{ url('/') }}" class="transition hover:text-blue-600">ホーム</a>
					<a href="{{ route('article') }}" class="transition hover:text-blue-600">レビュー一覧</a>
					<a href="#" class="transition hover:text-blue-600">Settings</a>
					@auth
					<a href="{{ route('create') }}" class="transition hover:text-blue-600">レビューを投稿する</a>
					<a href="/user/profile" class="transition hover:text-blue-600">各種変更</a>
					@endauth
				</div>

				<div class="p-2">

					@guest
					<a class="flex items-center space-x-2 transition hover:text-blue-600 pb-2"
						href="{{ route('login') }}">
						<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
							xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
								class=""></path>
						</svg>
						ログイン
					</a>

					<a class="flex items-center space-x-2 transition hover:text-blue-600"
						href="{{ route('register') }}">
						<svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
							xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
							</path>
						</svg>
						会員登録
					</a>
					@endguest


					@auth
					<a class="flex items-center space-x-2 transition hover:text-blue-600" href="{{ route('logout') }}"
						onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
						<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
							xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
							</path>
						</svg>
						ログアウト
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
					@endauth
				</div>
			</div>

		</div>
	</header>

	<main class="mt-24"></main>




	@yield('content')




	<div class="bg-gray-100">
		<div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
			<a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"><svg version="1.1" id="_x32_"
					xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
					class="w-12 h-12 opacity-1" xml:space="preserve">
					<style type="text/css">
						.st0 {
							fill: #4B4B4B;
						}
					</style>
					<g>
						<path class="st0" d="M506.391,287.074c-3.578-10.219-13.484-22-20.734-29.047c-17.188-16.672-35.688-25-44.75-29.875
							c-6.75-4.047-15.313-1.594-19.188,5.484c-3.844,7.063-1.313,15.703,5.219,20.141c42.844,29.234,49.906,64.281,18.906,100.859
							c-9.266,10.922-21.641,19.563-39.813,29.75c-29.734,16.656-91.094,31.313-150.031,31.234
							c-58.938,0.078-120.297-14.578-150.031-31.234c-18.156-10.188-30.531-18.828-39.813-29.75c-31-36.578-23.938-71.625,18.938-100.859
							c6.5-4.438,9.047-13.078,5.188-20.141c-3.844-7.078-12.438-9.531-19.156-5.484c-9.078,4.875-27.594,13.203-44.75,29.875
							c-7.281,7.047-17.188,18.828-20.75,29.047C2.047,297.262,0,308.402,0,320.027c0,12.016,2.25,23.766,6.375,34.719
							c7.219,19.203,19.766,35.828,35.563,50.047c23.781,21.313,55.188,37.719,91.656,49.219c36.484,11.453,78.125,17.844,122.406,17.844
							s85.922-6.391,122.406-17.844c36.469-11.5,67.875-27.906,91.656-49.219c15.797-14.219,28.359-30.844,35.563-50.047
							c4.125-10.953,6.391-22.703,6.375-34.719C512.016,308.402,509.953,297.262,506.391,287.074z"
							style="fill: rgba(255, 167, 41, 0.99);"></path>
						<path class="st0" d="M239.5,314.074c7.031,15.563,15.969,25.781,22.75,31.281c6.906,5.516,12.406,7.266,16.656,4.859
							c4.281-2.406,5.188-8.484,3.594-17.016c-1.594-8.578-5.156-18.859-7.609-31.172c-2.516-12.188-4.203-27.906-4.203-45.328
							c0.063-8.547,0.719-17.094,2.438-25.578c1.688-8.531,4.594-17.016,8.547-27.516c3.953-10.438,8.203-22.75,10.297-35.031
							c2.188-12.313,2.531-24.234,1.953-35.094c-1.328-21.406-5.563-40.516-12.594-56.141c-7.016-15.578-15.984-25.781-22.766-31.281
							c-6.906-5.516-12.406-7.266-16.656-4.859c-4.281,2.406-5.172,8.5-3.563,17.016c1.594,8.594,5.156,18.859,7.609,31.172
							c2.516,12.172,4.203,27.906,4.203,45.313c-0.063,8.547-0.719,17.094-2.438,25.578c-1.688,8.531-4.594,17.016-8.563,27.516
							c-3.953,10.453-8.188,22.75-10.281,35.063c-2.188,12.297-2.563,24.219-1.953,35.078C228.234,279.34,232.469,298.449,239.5,314.074z
							" style="fill: rgba(255, 167, 41, 0.99);"></path>
						<path class="st0" d="M329.094,278.465c2.063,8.656,4.938,16.734,8.438,23.719c7.094,14.141,15.938,22.828,22.469,27.266
							c6.688,4.453,12,5.531,16.141,2.922s5.016-8.344,3.469-16.063c-1.516-7.781-4.906-16.797-7.109-27.313
							c-2.281-10.375-3.781-24-3.563-39.078c0.156-7.359,0.906-14.578,2.625-21.703c1.719-7.172,4.578-14.344,8.594-23.563
							c3.969-9.141,8.453-20.219,10.813-31.547c2.438-11.328,3-22.438,2.516-32.438c-0.516-10.047-1.859-19.016-3.922-27.719
							c-2.063-8.641-4.938-16.719-8.453-23.703c-7.078-14.156-15.922-22.844-22.469-27.266c-6.688-4.453-12-5.531-16.141-2.922
							s-5,8.328-3.469,16.063c1.531,7.766,4.922,16.797,7.125,27.297c2.281,10.375,3.781,24,3.563,39.063
							c-0.188,7.359-0.922,14.578-2.656,21.703c-1.719,7.172-4.594,14.344-8.594,23.578c-4,9.141-8.469,20.234-10.813,31.563
							c-2.438,11.344-2.984,22.438-2.5,32.422C325.688,260.793,327.031,269.762,329.094,278.465z"
							style="fill: rgba(255, 167, 41, 0.99);"></path>
						<path class="st0" d="M129.625,278.465c2.063,8.656,4.938,16.734,8.469,23.719c7.094,14.141,15.906,22.828,22.469,27.266
							c6.688,4.453,12,5.531,16.125,2.922c4.156-2.609,5.016-8.344,3.469-16.063c-1.516-7.766-4.906-16.797-7.125-27.313
							c-2.281-10.375-3.781-24-3.563-39.078c0.172-7.359,0.922-14.578,2.656-21.703c1.703-7.172,4.547-14.344,8.578-23.563
							c3.984-9.141,8.453-20.219,10.797-31.547c2.453-11.328,3.016-22.438,2.516-32.438c-0.516-10.047-1.859-19-3.891-27.719
							c-2.063-8.641-4.969-16.719-8.469-23.703c-7.094-14.141-15.938-22.844-22.469-27.281c-6.688-4.453-12-5.516-16.156-2.906
							c-4.125,2.609-5,8.328-3.438,16.063c1.516,7.766,4.891,16.781,7.094,27.297c2.281,10.375,3.781,24,3.563,39.063
							c-0.188,7.359-0.922,14.578-2.656,21.703c-1.719,7.172-4.563,14.344-8.594,23.578c-3.969,9.141-8.453,20.234-10.813,31.563
							c-2.422,11.328-2.984,22.438-2.484,32.422C126.25,260.793,127.578,269.762,129.625,278.465z"
							style="fill: rgba(255, 167, 41, 0.99);"></path>
					</g>
				</svg>

				<span class="ml-3 text-lg">{{ config('app.name', 'Laravel') }}</span>
			</a>
			<p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© 2022 Tobiyama Kosuke —
				<a href=# rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@Tobikous</a>
			</p>
			<span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
				<a class="text-gray-500">
					<svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						class="w-5 h-5" viewBox="0 0 24 24">
						<path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
					</svg>
				</a>
				<a class="ml-3 text-gray-500">
					<svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						class="w-5 h-5" viewBox="0 0 24 24">
						<path
							d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
						</path>
					</svg>
				</a>
				<a class="ml-3 text-gray-500">
					<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
						stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
						<rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
						<path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
					</svg>
				</a>
				<a class="ml-3 text-gray-500">
					<svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
						stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
						<path stroke="none"
							d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
						</path>
						<circle cx="4" cy="4" r="2" stroke="none"></circle>
					</svg>
				</a>
			</span>
		</div>
	</div>

</div>