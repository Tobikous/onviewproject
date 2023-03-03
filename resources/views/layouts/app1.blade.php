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

	<!-- Scripts -->
	@vite('resources/css/app.css')
	<!-- @vite(['resources/css/app.css','resources/js/app.js']) -->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

	<link rel="stylesheet" href="{{ asset('build/assets/app-5005f49e.css') }}">
	<script src="{{ asset('build/assets/app-95b87cd7.js') }}"></script>

</head>


<div id="app">

	<header class="bg-orange-100 text-gray-600 body-font sticky top-0">
		<div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
			<a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ url('/') }}">

				<svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
					xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" class="w-12 h-12 opacity-1"
					xml:space="preserve">
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

				<span class="ml-3 font-medium text-xl">{{ config('app.name', 'Laravel') }}</span>
			</a>
			<nav
				class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
				@guest
				<a class="mr-7 text-yellow-500 hover:text-yellow-600" href="{{ route('login') }}">ログイン</a>
				<a class="mr-7 text-yellow-500 hover:text-yellow-600" href="{{ route('register') }}">会員登録</a>
				@endguest

				@auth
				<a class="mr-10 inline-flex font-bold  text-gray-900">
					ようこそ、{{ Auth::user()->name }}様
				</a>
				<a class="mr-7 text-yellow-500 hover:text-yellow-600" href="{{ route('home') }}">ホーム</a>
				<a class="mr-7 text-yellow-500 hover:text-yellow-600" href="{{ route('article') }}">レビュー一覧</a>

				@if(Auth::user()->id !== 1 )
				<a class="mr-7 text-yellow-500 hover:text-yellow-600" href="{{ route('create') }}">レビューの投稿</a>
				<a class="mr-7 text-yellow-500 hover:text-yellow-600" href="{{ route('logout') }}" onclick="event.preventDefault();
                    	document.getElementById('logout-form').submit();">ログアウト
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
				@else
				<a class="mr-7 text-yellow-500 hover:text-yellow-600" href="{{ route('logout') }}" onclick="event.preventDefault();
                    	document.getElementById('logout-form').submit();">ログイン
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
				@endif
				@endauth
			</nav>

		</div>
	</header>


	@yield('content')

	<footer class="text-gray-600 body-font">
		<div class="container px-5 py-24 mx-auto">
			<div class="flex flex-wrap md:text-left text-center order-first">
				<div class="lg:w-1/4 md:w-1/2 w-full px-4">
					<h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
					<nav class="list-none mb-10">
						<li>
							<a class="text-gray-600 hover:text-gray-800">First Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Second Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Third Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
						</li>
					</nav>
				</div>
				<div class="lg:w-1/4 md:w-1/2 w-full px-4">
					<h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
					<nav class="list-none mb-10">
						<li>
							<a class="text-gray-600 hover:text-gray-800">First Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Second Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Third Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
						</li>
					</nav>
				</div>
				<div class="lg:w-1/4 md:w-1/2 w-full px-4">
					<h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
					<nav class="list-none mb-10">
						<li>
							<a class="text-gray-600 hover:text-gray-800">First Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Second Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Third Link</a>
						</li>
						<li>
							<a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
						</li>
					</nav>
				</div>
				<div class="lg:w-1/4 md:w-1/2 w-full px-4">
					<h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">SUBSCRIBE</h2>
					<div
						class="flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center items-end md:justify-start">
						<div class="w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
							<label for="footer-field" class="leading-7 text-sm text-gray-600">Placeholder</label>
							<input type="text" id="footer-field" name="footer-field"
								class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:bg-transparent focus:ring-2 focus:ring-yellow-200 focus:border-yellow-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
						</div>
						<button
							class="lg:mt-2 xl:mt-0 flex-shrink-0 inline-flex text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded">Button</button>
					</div>
					<p class="text-gray-500 text-sm mt-2 md:text-left text-center">Bitters chicharrones fanny pack
						<br class="lg:block hidden">waistcoat green juice
					</p>
				</div>
			</div>
		</div>
		<div class="bg-gray-100">
			<div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
				<a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"><svg version="1.1"
						id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
						viewBox="0 0 512 512" class="w-12 h-12 opacity-1" xml:space="preserve">
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
	</footer>
</div>