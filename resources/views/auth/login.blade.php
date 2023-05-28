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
	<link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">


</head>


<body class="relative mx-auto max-w-7xl">
	<div class="absolute inset-0 z-(-1) bg-cover bg-center bg-no-repeat opacity-70"
		style="background-image: url('images/onsenback02.jpg');"></div>
	<div class="relative">

		<header x-data="{ open: false }" class="bg-opacity-70 inset-x-0 top-0 z-20 py-2 tails-selected-element"
			data-tails-scripts="//unpkg.com/alpinejs">
			<div class="flex items-center justify-between h-20 px-8 mx-auto max-w-7xl">


				<a class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none"
					href="{{ url('/') }}">
					<img src="{{ asset('svg/onsen_icon01.svg') }}" alt="customIcon" class="w-12 h-12 opacity-1">
					<img src="{{ asset('header-icon.png') }}" alt="headerName" class="ml-3 opacity-1 md:w-full w-1/2">
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

					<a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium tracking-normal transition duration-150 rounded text-orange-500 bg-orange-50 border-orange-200 hover:bg-orange-100 active:bg-orange-200 focus:ring-orange-300
					ease tails-selected-element" data-rounded=" rounded-md" data-primary="blue-600">
						<svg class="w-6 h-6 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						会員登録
					</a>


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






			</div>
			<div class="absolute md:hidden z-50 r-0 top-20 w-full divide-y divide-gray-200 border border-gray-200 bg-white bg-opacity-70 shadow-md"
				x-show="open" x-transition:enter="transition ease-out duration-300"
				x-transition:enter-start="opacity-0 transform scale-90"
				x-transition:enter-end="opacity-100 transform scale-100"
				x-transition:leave="transition ease-in duration-300"
				x-transition:leave-start="opacity-100 transform scale-100"
				x-transition:leave-end="opacity-0 transform scale-90">




				<div class="flex flex-col space-y-3 p-2">
					<a href="{{ url('/') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="w-4 h-4 mr-1">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
						</svg>ホーム</a>

					<a href="{{ route('onsen_lists') }}"
						class="flex items-center space-x-2 transition hover:text-orange-600">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
							id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" class="w-4 h-4 mr-1">
							<g>
								<path class="st0"
									d="M400.688,2.031v54.563H298.703V0h-85.406v56.594H111.313V1.031H25.922v55.563v34.203V512h460.156V91.813   V56.594V2.031H400.688z M298.875,266.688c1.406-6.781,4.078-13.406,6.469-18.891c2.406-5.516,4.125-9.813,5.141-14.109   c1.047-4.25,1.484-8.563,1.594-12.984c0.141-9.016-0.766-17.156-2.125-23.375c-1.328-6.266-3.359-11.672-4.266-16.328   c-0.922-4.625-0.406-8.063,2.063-9.625c2.484-1.547,5.672-0.906,9.672,1.75c3.922,2.656,9.203,7.859,13.453,16.328   c2.078,4.172,3.813,9.016,5.047,14.172c1.234,5.219,2.016,10.594,2.344,16.594c0.297,5.984-0.047,12.625-1.516,19.422   c-1.406,6.766-4.078,13.391-6.453,18.859c-2.422,5.516-4.125,9.813-5.141,14.094c-1.031,4.281-1.469,8.594-1.578,13   c-0.141,9.031,0.766,17.172,2.125,23.375c1.328,6.297,3.359,11.703,4.266,16.344c0.938,4.625,0.406,8.047-2.094,9.625   c-2.469,1.563-5.625,0.906-9.656-1.75c-3.906-2.656-9.188-7.859-13.422-16.313c-2.109-4.188-3.828-9.031-5.047-14.188   c-1.25-5.219-2.063-10.578-2.375-16.594C297.094,280.125,297.406,273.469,298.875,266.688z M239.766,269.406   c1.234-7.375,3.797-14.719,6.141-20.969c2.375-6.313,4.125-11.375,5.125-16.469c1.047-5.094,1.438-10.219,1.469-15.313   c0-10.422-1-19.844-2.516-27.125c-1.453-7.344-3.609-13.5-4.547-18.641c-0.969-5.109-0.438-8.734,2.125-10.188   c2.563-1.438,5.844-0.391,9.969,2.906c4.063,3.281,9.438,9.391,13.625,18.719c4.203,9.344,6.75,20.797,7.531,33.594   c0.359,6.484,0.141,13.625-1.156,21c-1.266,7.344-3.813,14.719-6.172,20.953c-2.375,6.281-4.109,11.375-5.109,16.469   c-1.031,5.078-1.406,10.188-1.453,15.313c-0.016,10.422,0.984,19.828,2.516,27.109c1.453,7.375,3.594,13.516,4.531,18.672   c0.969,5.094,0.422,8.734-2.125,10.188c-2.563,1.438-5.859,0.375-9.969-2.922c-4.078-3.297-9.406-9.406-13.625-18.719   c-4.219-9.359-6.75-20.797-7.531-33.609C238.219,283.906,238.469,276.75,239.766,269.406z M179.531,266.688   c1.406-6.781,4.063-13.406,6.469-18.891c2.391-5.516,4.109-9.813,5.125-14.109c1.047-4.25,1.5-8.563,1.594-12.969   c0.125-9.031-0.766-17.172-2.125-23.391c-1.313-6.266-3.344-11.672-4.25-16.328c-0.938-4.625-0.406-8.063,2.063-9.625   c2.469-1.547,5.656-0.906,9.656,1.75c3.922,2.656,9.219,7.859,13.438,16.328c2.094,4.172,3.844,9.016,5.063,14.188   c1.219,5.203,2.031,10.563,2.344,16.578c0.281,5.984-0.031,12.625-1.5,19.422c-1.406,6.766-4.094,13.391-6.469,18.859   c-2.406,5.516-4.125,9.813-5.141,14.094c-1.031,4.281-1.469,8.594-1.578,13c-0.125,9.031,0.781,17.172,2.125,23.375   c1.328,6.297,3.359,11.703,4.281,16.344c0.906,4.625,0.406,8.047-2.078,9.625c-2.484,1.563-5.672,0.906-9.672-1.75   c-3.906-2.656-9.188-7.859-13.438-16.313c-2.109-4.188-3.828-9.031-5.063-14.188c-1.219-5.219-2.031-10.578-2.344-16.594   C177.75,280.125,178.063,273.469,179.531,266.688z M405.375,348.313c-4.313,11.5-11.828,21.438-21.281,29.953   c-14.234,12.75-33.031,22.563-54.844,29.453c-21.844,6.844-46.75,10.688-73.25,10.688s-51.422-3.844-73.25-10.688   c-21.813-6.891-40.594-16.703-54.844-29.453c-9.453-8.516-16.969-18.453-21.281-29.953c-2.469-6.547-3.813-13.578-3.813-20.766   c0-6.953,1.219-13.625,3.344-19.734c2.156-6.094,8.078-13.156,12.438-17.359c10.281-9.984,21.344-14.953,26.766-17.875   c4.047-2.422,9.172-0.953,11.484,3.266c2.297,4.234,0.781,9.406-3.109,12.063c-25.641,17.5-29.891,38.453-11.328,60.359   c5.547,6.516,12.953,11.703,23.813,17.797c17.797,9.953,54.5,18.734,89.781,18.688c35.266,0.047,71.984-8.734,89.781-18.688   c10.875-6.094,18.266-11.281,23.813-17.797c18.547-21.906,14.328-42.859-11.313-60.359c-3.906-2.656-5.422-7.828-3.125-12.063   c2.313-4.219,7.453-5.688,11.484-3.266c5.422,2.922,16.484,7.891,26.766,17.875c4.359,4.203,10.281,11.266,12.438,17.359   c2.125,6.109,3.359,12.781,3.344,19.734C409.203,334.734,407.828,341.766,405.375,348.313z" />
							</g>
						</svg>温泉一覧
					</a>

					<a href="{{ route('review_lists') }}"
						class="flex items-center space-x-2 transition hover:text-orange-600">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="w-4 h-4 mr-1">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
						</svg>レビュー一覧
					</a>
				</div>

				<div class="p-2">
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
				</div>
			</div>

		</header>


		<main class="text-gray-600 body-font">
			<form name="loginForm" method="POST" action="{{ route('login') }}">
				@csrf
				<div class="container px-10 py-10 md:py-20 mx-auto flex flex-wrap justify-center md:items-center">
					<div class="lg:w-3/5 md:w-1/2 lg:pr-0 pr-0 text-center text-white">
						<h1 class="mb-2 title-font font-medium text-2xl md:text-3xl">温泉レビューサイト <br
								class="md:hidden">おんびゅーへようこそ！</h1>
						<a href="{{ route('home') }}">ゲストのまま、会員登録せずにレビューを見る</a>
					</div>

					<div
						class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
						<div class="text-center">
							<h1 class="block text-2xl font-bold text-gray-800 dark:text-white">ログイン</h1>
							<p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
							</p>
						</div>


						<div class="flex items-center border-2 py-1 px-3 rounded-md mt-3 mb-4 bg-white">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
								viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
							</svg>
							<input
								class="w-full pl-2 outline-none border-none focus:outline-none focus:border-none focus:ring-0"
								type="email" id="email" name="email" value="{{ old('email') }}" required
								autocomplete="email" required aria-describedby="email-error" placeholder="メールアドレス" />
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div class="flex items-center border-2 py-1 px-3 rounded-md mt-3 mb-4 bg-white">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							<input
								class="w-full pl-2 outline-none border-none focus:outline-none focus:border-none focus:ring-0"
								type="password" id="password" name="password" required autocomplete="new-password"
								required aria-describedby="password-error" placeholder="パスワード" />
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<p class="hidden text-xs text-red-600 mt-2" id="password-error">8+ characters required
						</p>

						<div class="ml-2 m-3 text-gray-900">
							<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

							<label for="remember">
								ログイン状態を維持する
							</label>
						</div>

						<button
							class="m-1 text-white bg-orange-500 border-0 py-2 px-8 focus:outline-none hover:bg-orange-600 rounded text-lg">ログイン</button>

						<div class="underline mt-4 text-blue-600 hover:text-blue-800">
							@if (Route::has('password.request'))
							<a href="{{ route('password.request') }}">
								パスワードを忘れた場合
							</a>
							@endif
						</div>

						<div class="underline mt-2 text-blue-600 hover:text-blue-800">
							<a href="{{ route('register') }}">
								会員登録はこちらから
							</a>
						</div>

						<!-- <a href="#_"
							class="mt-5 w-full flex items-center shadow justify-center rounded bg-white border border-gray-300 text-gray-600 py-3.5 px-2 text-center font-medium tails-selected-element">
							<svg class="w-5 h-5" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
								<g fill-rule="nonzero" fill="none">
									<path
										d="M23.998 13.278a10.881 10.881 0 00-.252-2.52H12.414v4.576h6.653a6.034 6.034 0 01-2.466 4l-.024.15 3.582 2.836.248.025c2.275-2.149 3.591-5.31 3.591-9.067"
										fill="#4285F4"></path>
									<path
										d="M12.585 24.828c3.303 0 6.078-1.1 8.105-2.998l-3.86-3.027a7.174 7.174 0 01-4.24 1.238c-3.173-.02-5.978-2.093-6.964-5.144l-.146.014-3.776 2.954-.049.137c2.07 4.19 6.301 6.83 10.93 6.826"
										fill="#34A853"></path>
									<path
										d="M4.966 14.986a8.672 8.672 0 01-.383-2.542 9.2 9.2 0 01.373-2.541l-.004-.168-3.604-3.114-.118.06a14.114 14.114 0 000 11.526l3.736-3.221"
										fill="#FBBC05"></path>
									<path
										d="M12.544 4.785a6.662 6.662 0 014.708 1.844l3.438-3.41A11.611 11.611 0 0012.54.002C7.933 0 3.72 2.637 1.655 6.825L5.593 9.93c.992-3.052 3.789-5.127 6.951-5.146"
										fill="#EB4335"></path>
								</g>
							</svg>
							<span class="ml-2.5">Googleアカウントでログイン</span>
						</a> -->
					</div>
				</div>

			</form>

		</main>

		<footer class="bg-gray-100">
			<div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
				<a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
					<img src="{{ asset('svg/onsen_icon01.svg') }}" alt="customIcon" class="w-9 h-9 opacity-1">
					<img src="{{ asset('footer-icon.png') }}" alt="footerName" class="ml-1 mt-2 opacity-1">
				</a>
				<p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© 2022 Tobiyama Kosuke —
					<a rel="noopener noreferrer" class="text-gray-600 ml-1">@Tobikous</a>
				</p>
				<span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
					<a href="https://twitter.com/tobikouov" class="ml-3 text-gray-500" target="_blank">
						<svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							class="w-5 h-5" viewBox="0 0 24 24">
							<path
								d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
							</path>
						</svg>
					</a>
					<a href="https://www.linkedin.com/in/tobiyama-a40369271" class="ml-3 text-gray-500" target="_blank">
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

	</div>

</body>