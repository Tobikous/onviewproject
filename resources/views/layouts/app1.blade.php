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
	<script src="{{ asset('js/modal.js') }}"></script>

	<link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
</head>



<body>

	<header x-data="{ open: false }"
		class="fixed inset-x-0 top-0 z-50 py-2 bg-gradient-to-br from-orange-600 via-indigo-00 to-yellow-300 tails-selected-element mx-auto"
		data-primary="orange-500" data-tails-scripts="//unpkg.com/alpinejs">
		<div class="flex items-center justify-between h-20 px-8 mx-auto max-w-7xl">




			<a class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none"
				href="{{ url('/') }}">
				<img src="{{ asset('svg/onsen_icon01.svg') }}" alt="customIcon" class="w-12 h-12 opacity-1">
				<img src="{{ asset('header-icon.png') }}" alt="headerName" class="ml-3 opacity-1 md:w-full w-1/2">
			</a>

			<nav class="items-center justify-center hidden space-x-7 text-white md:flex">
				@section('home-link')
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
				@show

				@section('onsens-link')
				<a href="{{ route('onsen_lists') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">温泉一覧</span>
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
				@show

				@section('reviews-link')
				<a href="{{ route('review_lists') }}" x-data="{ hover: false }" @mouseenter="hover = true"
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
				@show

				@auth

				@section('review-create-link')
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
				@show

				@section('mypage-link')
				<a href="{{ route('mypage.favorites') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block"><svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24"
							height="24" viewBox="0 0 24 24">
							<circle fill="none" cx="12" cy="7" r="3"></circle>
							<path
								d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z">
							</path>
						</svg></span>
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
				@show

				@section('profile-link')
				<a href="{{ route('profile.edit') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							stroke-width="2" stroke="currentColor" class="h-6 w-6">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg></span>
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
				@show

				@endauth

				@guest
				<a href="{{ route('login') }}" x-data="{ hover: false }" @mouseenter="hover = true"
					@mouseleave="hover = false"
					class="relative inline-block text-sm font-bold hover:text-gray-200 uppercase transition duration-150 lg:text-base ease text-white">
					<span class="block">ログイン</span>
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

				@section('register-link')

				<a href="{{ route('register') }}"
					class="relative inline-flex items-center justify-start px-4 py-3 overflow-hidden font-medium transition-all bg-orange-500 rounded-xl group">
					<span
						class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-orange-700 rounded group-hover:-mr-4 group-hover:-mt-4">
						<span
							class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
					</span>
					<span
						class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full translate-y-full bg-orange-600 rounded-2xl group-hover:mb-12 group-hover:translate-x-0"></span>
					<span
						class="relative inline-flex items-center w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-white"><svg
							class="w-6 h-6 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>会員登録</span>
				</a>
				@show

				@endguest

				@auth
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
            		document.getElementById('logout-form').submit();"
					class="relative inline-flex items-center justify-start px-4 py-3 overflow-hidden font-medium transition-all bg-orange-500 rounded-xl group">
					<span
						class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-orange-700 rounded group-hover:-mr-4 group-hover:-mt-4">
						<span
							class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
					</span>
					<span
						class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full translate-y-full bg-orange-600 rounded-2xl group-hover:mb-12 group-hover:translate-x-0"></span>
					<span
						class="relative inline-flex items-center w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-white">
						<svg class="h-6 w-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
							xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
							</path>
						</svg>ログアウト</span>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
				@endauth

			</nav>

			@include('partials.header-modal')

		</div>
	</header>

	@section('remove-in-register-link')
	<div class="mt-24"></div>
	@show

	@yield('content')

	<footer class="bg-gray-100">
		<div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col mx-auto max-w-7xl">
			<a href="{{ url('/') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
				<img src="{{ asset('svg/onsen_icon01.svg') }}" alt="customIcon" class="w-9 h-9 opacity-1">
				<img src="{{ asset('footer-icon.png') }}" alt="footerName" class="ml-1 mt-2 opacity-1">
			</a>
			<p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© 2023 Tobiyama Kosuke —
				<a rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@Tobikous</a>
			</p>
			<span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">

				<a href="{{ route('team_of_service') }}"
					class="ml-3 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-700"
					aria-label="Reddit"> 会員規約 </a>
				<a href="{{ route('privacy_policy') }}"
					class="ml-3 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-700"
					aria-label="Reddit"> プライバシーポリシー </a>
				<a href="https://docs.google.com/forms/d/e/1FAIpQLSdL40esRd1466UnATVxCDCBZ84YBGL4JyOfOJIpATUcCRyJNA/viewform?usp=sf_link"
					class="ml-3 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-700"
					aria-label="Reddit"> お問い合わせ </a>
				<a href="https://twitter.com/tobikouov" class="ml-5 text-gray-500 hover:text-gray-700" target="_blank">
					<svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						class="w-5 h-5" viewBox="0 0 24 24">
						<path
							d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
						</path>
					</svg>
				</a>
				<a href="https://www.linkedin.com/in/tobiyama-a40369271" class="ml-3 text-gray-500 hover:text-gray-700"
					target="_blank">
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