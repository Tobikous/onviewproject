<div @click="open = !open" class="flex items-center justify-center h-full text-white md:hidden cursor-pointer">
	<div class="relative py-3 sm:max-w-xl mx-auto">
		<nav x-data="{ open: false }">
			<button class="text-white hover:text-gray-400 w-10 h-10 relative focus:outline-none bg-opacity-0"
				@click="open = !open">
				<span class="sr-only">Open main menu</span>
				<div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
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
	x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
	x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
	x-transition:leave-end="opacity-0 transform scale-90">

	<div class="flex flex-col space-y-3 p-2">
		<a href="{{ url('/') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				stroke="currentColor" class="w-4 h-4 mr-1">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
			</svg>ホーム
		</a>

		<a href="{{ route('articles') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				stroke="currentColor" class="w-4 h-4 mr-1">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
			</svg>レビュー一覧
		</a>

		@auth
		<a href="{{ route('create') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
			<svg class="w-4 h-4 mr-1 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg"
				xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" xml:space="preserve">
				<g>
					<polygon
						points="374.107,448.835 34.01,448.835 34.01,194.102 164.947,194.102 164.947,63.165 374.107,63.165 374.107,96.698 408.117,64.049 408.117,29.155 164.947,29.155 34.01,160.092 0,194.102 0,482.845 408.117,482.845 408.117,282.596 374.107,318.034" />
					<path
						d="M508.609,118.774l-51.325-51.325c-4.521-4.522-11.852-4.522-16.372,0L224.216,275.561 c-1.344,1.344-2.336,2.998-2.889,4.815l-26.21,86.117c-2.697,8.861,5.586,17.144,14.447,14.447l88.886-27.052l210.159-218.741 C513.13,130.626,513.13,123.295,508.609,118.774z M243.986,349.323l-16.877-18.447l11.698-38.447l29.139,15.678l15.682,29.145 L243.986,349.323z M476.036,110.577L291.414,296.372l-11.728-11.728l185.804-184.631l10.547,10.546 C476.036,110.567,476.036,110.571,476.036,110.577z" />
				</g>
			</svg>レビューを投稿する
		</a>

		<a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				stroke="currentColor" class="h-4 w-4 mr-1">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
			</svg>プロフィール
		</a>

		@endauth
	</div>

	<div class="p-2">

		@guest
		<a class="flex items-center space-x-2 transition hover:text-orange-600 pb-2" href="{{ route('login') }}">
			<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
					class=""></path>
			</svg>
			ログイン
		</a>

		<a class="flex items-center space-x-2 transition hover:text-orange-600" href="{{ route('register') }}">
			<svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
		<a class="flex items-center space-x-2 transition hover:text-orange-600" href="{{ route('logout') }}" onclick="event.preventDefault();
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