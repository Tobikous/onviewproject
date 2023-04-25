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

</head>


<body class="relative">
	<div class="absolute inset-0 z-(-1) bg-cover bg-center bg-no-repeat opacity-70"
		style="background-image: url('images/onsenback02.jpg');"></div>
	<div class="relative">

		<header x-data="{ open: false }" class="bg-opacity-70 inset-x-0 top-0 z-20 py-2 tails-selected-element"
			data-tails-scripts="//unpkg.com/alpinejs">
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
								class="absolute inset-0 inline-block w-full h-full transform border-t-2 border-blue-200"
								x-transition:enter="transition ease-out duration-300"
								x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
								x-transition:leave="transition ease-out duration-300"
								x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
								data-primary="blue-600" style="display: none;"></span>
						</span>
					</a>

					<a href="{{ route('articles') }}" x-data="{ hover: false }" @mouseenter="hover = true"
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
					<a href="{{ route('articles') }}"
						class="flex items-center space-x-2 transition hover:text-orange-600">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="w-4 h-4 mr-1">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
						</svg>レビュー一覧</a>
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
				<div class="container px-10 py-20 mx-auto flex flex-wrap justify-center md:items-center">
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
					</div>
				</div>

			</form>

		</main>

		<footer class="bg-gray-100">
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
					<a href="https://twitter.com/tobikouov" class="ml-3 text-gray-500">
						<svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							class="w-5 h-5" viewBox="0 0 24 24">
							<path
								d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
							</path>
						</svg>
					</a>
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

	</div>

</body>