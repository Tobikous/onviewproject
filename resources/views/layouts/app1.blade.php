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
	<!-- <script src="{{ asset('js/slider.js') }}"></script> -->

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
					<span class="block">レビュー一覧</span>
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
				<a href="{{ route('profile.edit') }}" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
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


				<!-- <div class="flex items-center space-x-2 p-2">
					<img src="https://plchldr.co/i/40x40?bg=111111" alt="plchldr.co" class="h-9 w-9 rounded-full" />
					<div class="font-medium">Hafiz Haziq</div>
				</div> -->

				<div class="flex flex-col space-y-3 p-2">
					<a href="{{ url('/') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="w-4 h-4 mr-1">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
						</svg>ホーム</a>
					<a href="{{ route('articles') }}"
						class="flex items-center space-x-2 transition hover:text-orange-600">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="w-4 h-4 mr-1">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
						</svg>レビュー一覧</a>

					@auth
					<a href="{{ route('create') }}"
						class="flex items-center space-x-2 transition hover:text-orange-600">
						<svg class="w-4 h-4 mr-1 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512"
							xml:space="preserve">
							<g>
								<polygon
									points="374.107,448.835 34.01,448.835 34.01,194.102 164.947,194.102 164.947,63.165 374.107,63.165 374.107,96.698 408.117,64.049 408.117,29.155 164.947,29.155 34.01,160.092 0,194.102 0,482.845 408.117,482.845 408.117,282.596 374.107,318.034" />
								<path
									d="M508.609,118.774l-51.325-51.325c-4.521-4.522-11.852-4.522-16.372,0L224.216,275.561 c-1.344,1.344-2.336,2.998-2.889,4.815l-26.21,86.117c-2.697,8.861,5.586,17.144,14.447,14.447l88.886-27.052l210.159-218.741 C513.13,130.626,513.13,123.295,508.609,118.774z M243.986,349.323l-16.877-18.447l11.698-38.447l29.139,15.678l15.682,29.145 L243.986,349.323z M476.036,110.577L291.414,296.372l-11.728-11.728l185.804-184.631l10.547,10.546 C476.036,110.567,476.036,110.571,476.036,110.577z" />
							</g>
						</svg>
						ビューを投稿する</a>
					<a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 transition hover:text-orange-600"><svg
							xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="h-4 w-4 mr-1">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg>各種変更</a>
					@endauth
				</div>

				<div class="p-2">

					@guest
					<a class="flex items-center space-x-2 transition hover:text-orange-600 pb-2"
						href="{{ route('login') }}">
						<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
							xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
								class=""></path>
						</svg>
						ログイン
					</a>

					<a class="flex items-center space-x-2 transition hover:text-orange-600"
						href="{{ route('register') }}">
						<svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						会員登録
					</a>
					@endguest


					@auth
					<a class="flex items-center space-x-2 transition hover:text-orange-600" href="{{ route('logout') }}"
						onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
						<svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
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

	<div class="mt-24"></div>

	@yield('content')

	<footer class="bg-gray-100">
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


	</footer>

</body>