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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
	<script src="{{ asset('js/reviewPostMordal.js') }}"></script>

	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
	</script>

</head>



<body>

	<header x-data="{ open: false }"
		class="fixed inset-x-0 top-0 z-50 py-2 bg-gradient-to-br from-orange-600 via-indigo-00 to-yellow-300 tails-selected-element"
		data-primary="orange-500" data-tails-scripts="//unpkg.com/alpinejs">
		<div class="flex items-center justify-between h-20 px-8 mx-auto max-w-7xl">




			<a class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none"
				href="{{ url('/') }}">
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
				<span class="ml-3 font-extrabold text-2xl">{{ config('app.name', 'Laravel') }}</span>
			</a>

			<nav class="items-center justify-center hidden space-x-8 text-white md:flex">

				<a href="{{ url('/') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">ホーム</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-orange-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="orange-600" style="display: none;"></span>
					</span>
				</a>

				<a href="{{ route('articles') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">レビュー一覧1</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="orange-600" style="display: none;"></span>
					</span>
				</a>

				@auth
				<a href="{{ route('create') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">レビューの投稿</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="orange-600" style="display: none;"></span>
					</span>
				</a>
				<a href="{{ route('profile.edit') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">各種変更</span>
					<span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
						<span x-show="hover"
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="orange-600" style="display: none;"></span>
					</span>
				</a>
				@endauth

				<div class="w-0 h-5 border border-r border-white" data-primary="orange-800"></div>

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
							class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange-200"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
							x-transition:leave="transition ease-out duration-300"
							x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
							data-primary="orange-600" style="display: none;"></span>
					</span>
				</a>

				<a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium tracking-normal transition duration-150 rounded text-orange-500 bg-orange-50 border-orange-200 hover:bg-orange-100 active:bg-orange-200 focus:ring-orange-300
					ease tails-selected-element" data-rounded="rounded-md" data-primary="orange-600">
					<svg class="w-6 h-6 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor"
							stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					会員登録
				</a>

				@endguest

				@auth
				<a data-rounded="rounded-md" data-primary="orange-600" href="{{ route('logout') }}" onclick="event.preventDefault();
            		document.getElementById('logout-form').submit();" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium tracking-normal transition duration-150 rounded text-orange-500 bg-orange-50 border-orange-200 hover:bg-orange-100 active:bg-orange-200 focus:ring-orange-300
					ease tails-selected-element" data-rounded="rounded-md" data-primary="orange-600">
					<svg class="h-6 w-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
						</path>
					</svg>ログアウト
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
				@endauth

			</nav>

			@include('partials.rayout-mordal')

		</div>
	</header>

	<div class="mt-24"></div>

	@yield('content')

	<footer class="bg-gray-100">
		<div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
			<a href="{{ url('/') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"><svg
					version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
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

				<span class="ml-3 text-lg">{{ config('app.name', 'Laravel') }}</span>
			</a>
			<p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© 2022 Tobiyama Kosuke —
				<a rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@Tobikous</a>
			</p>
			<span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">

				<a href="https://www.linkedin.com/in/tobiyama-a40369271" class="ml-3 text-gray-500">
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


	</footer>

</body>