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

		@section('modal-home-link')
		<a href="{{ url('/') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				stroke="currentColor" class="w-4 h-4 mr-2.5">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
			</svg>ホーム
		</a>
		@show

		@section('modal-onsens-link')
		<a href="{{ route('onsen_lists') }}"
			class="flex items-center space-x-2 transition hover:text-orange-600  hover:text-orange-600">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_"
				x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" class="w-4 h-4 text-gray-100 mr-2.5">
				<g>
					<path class="st0"
						d="M400.688,2.031v54.563H298.703V0h-85.406v56.594H111.313V1.031H25.922v55.563v34.203V512h460.156V91.813   V56.594V2.031H400.688z M298.875,266.688c1.406-6.781,4.078-13.406,6.469-18.891c2.406-5.516,4.125-9.813,5.141-14.109   c1.047-4.25,1.484-8.563,1.594-12.984c0.141-9.016-0.766-17.156-2.125-23.375c-1.328-6.266-3.359-11.672-4.266-16.328   c-0.922-4.625-0.406-8.063,2.063-9.625c2.484-1.547,5.672-0.906,9.672,1.75c3.922,2.656,9.203,7.859,13.453,16.328   c2.078,4.172,3.813,9.016,5.047,14.172c1.234,5.219,2.016,10.594,2.344,16.594c0.297,5.984-0.047,12.625-1.516,19.422   c-1.406,6.766-4.078,13.391-6.453,18.859c-2.422,5.516-4.125,9.813-5.141,14.094c-1.031,4.281-1.469,8.594-1.578,13   c-0.141,9.031,0.766,17.172,2.125,23.375c1.328,6.297,3.359,11.703,4.266,16.344c0.938,4.625,0.406,8.047-2.094,9.625   c-2.469,1.563-5.625,0.906-9.656-1.75c-3.906-2.656-9.188-7.859-13.422-16.313c-2.109-4.188-3.828-9.031-5.047-14.188   c-1.25-5.219-2.063-10.578-2.375-16.594C297.094,280.125,297.406,273.469,298.875,266.688z M239.766,269.406   c1.234-7.375,3.797-14.719,6.141-20.969c2.375-6.313,4.125-11.375,5.125-16.469c1.047-5.094,1.438-10.219,1.469-15.313   c0-10.422-1-19.844-2.516-27.125c-1.453-7.344-3.609-13.5-4.547-18.641c-0.969-5.109-0.438-8.734,2.125-10.188   c2.563-1.438,5.844-0.391,9.969,2.906c4.063,3.281,9.438,9.391,13.625,18.719c4.203,9.344,6.75,20.797,7.531,33.594   c0.359,6.484,0.141,13.625-1.156,21c-1.266,7.344-3.813,14.719-6.172,20.953c-2.375,6.281-4.109,11.375-5.109,16.469   c-1.031,5.078-1.406,10.188-1.453,15.313c-0.016,10.422,0.984,19.828,2.516,27.109c1.453,7.375,3.594,13.516,4.531,18.672   c0.969,5.094,0.422,8.734-2.125,10.188c-2.563,1.438-5.859,0.375-9.969-2.922c-4.078-3.297-9.406-9.406-13.625-18.719   c-4.219-9.359-6.75-20.797-7.531-33.609C238.219,283.906,238.469,276.75,239.766,269.406z M179.531,266.688   c1.406-6.781,4.063-13.406,6.469-18.891c2.391-5.516,4.109-9.813,5.125-14.109c1.047-4.25,1.5-8.563,1.594-12.969   c0.125-9.031-0.766-17.172-2.125-23.391c-1.313-6.266-3.344-11.672-4.25-16.328c-0.938-4.625-0.406-8.063,2.063-9.625   c2.469-1.547,5.656-0.906,9.656,1.75c3.922,2.656,9.219,7.859,13.438,16.328c2.094,4.172,3.844,9.016,5.063,14.188   c1.219,5.203,2.031,10.563,2.344,16.578c0.281,5.984-0.031,12.625-1.5,19.422c-1.406,6.766-4.094,13.391-6.469,18.859   c-2.406,5.516-4.125,9.813-5.141,14.094c-1.031,4.281-1.469,8.594-1.578,13c-0.125,9.031,0.781,17.172,2.125,23.375   c1.328,6.297,3.359,11.703,4.281,16.344c0.906,4.625,0.406,8.047-2.078,9.625c-2.484,1.563-5.672,0.906-9.672-1.75   c-3.906-2.656-9.188-7.859-13.438-16.313c-2.109-4.188-3.828-9.031-5.063-14.188c-1.219-5.219-2.031-10.578-2.344-16.594   C177.75,280.125,178.063,273.469,179.531,266.688z M405.375,348.313c-4.313,11.5-11.828,21.438-21.281,29.953   c-14.234,12.75-33.031,22.563-54.844,29.453c-21.844,6.844-46.75,10.688-73.25,10.688s-51.422-3.844-73.25-10.688   c-21.813-6.891-40.594-16.703-54.844-29.453c-9.453-8.516-16.969-18.453-21.281-29.953c-2.469-6.547-3.813-13.578-3.813-20.766   c0-6.953,1.219-13.625,3.344-19.734c2.156-6.094,8.078-13.156,12.438-17.359c10.281-9.984,21.344-14.953,26.766-17.875   c4.047-2.422,9.172-0.953,11.484,3.266c2.297,4.234,0.781,9.406-3.109,12.063c-25.641,17.5-29.891,38.453-11.328,60.359   c5.547,6.516,12.953,11.703,23.813,17.797c17.797,9.953,54.5,18.734,89.781,18.688c35.266,0.047,71.984-8.734,89.781-18.688   c10.875-6.094,18.266-11.281,23.813-17.797c18.547-21.906,14.328-42.859-11.313-60.359c-3.906-2.656-5.422-7.828-3.125-12.063   c2.313-4.219,7.453-5.688,11.484-3.266c5.422,2.922,16.484,7.891,26.766,17.875c4.359,4.203,10.281,11.266,12.438,17.359   c2.125,6.109,3.359,12.781,3.344,19.734C409.203,334.734,407.828,341.766,405.375,348.313z" />
				</g>
			</svg>温泉一覧
		</a>
		@show

		@section('modal-reviews-link')
		<a href="{{ route('review_lists') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				stroke="currentColor" class="w-4 h-4 mr-2.5">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
			</svg>レビュー一覧
		</a>
		@show

		@auth

		@section('modal-review-create-link')
		<a href="{{ route('create') }}" class="flex items-center space-x-2 transition hover:text-orange-600">
			<svg class="w-4 h-4 mr-2.5 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg"
				xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" xml:space="preserve">
				<g>
					<polygon
						points="374.107,448.835 34.01,448.835 34.01,194.102 164.947,194.102 164.947,63.165 374.107,63.165 374.107,96.698 408.117,64.049 408.117,29.155 164.947,29.155 34.01,160.092 0,194.102 0,482.845 408.117,482.845 408.117,282.596 374.107,318.034" />
					<path
						d="M508.609,118.774l-51.325-51.325c-4.521-4.522-11.852-4.522-16.372,0L224.216,275.561 c-1.344,1.344-2.336,2.998-2.889,4.815l-26.21,86.117c-2.697,8.861,5.586,17.144,14.447,14.447l88.886-27.052l210.159-218.741 C513.13,130.626,513.13,123.295,508.609,118.774z M243.986,349.323l-16.877-18.447l11.698-38.447l29.139,15.678l15.682,29.145 L243.986,349.323z M476.036,110.577L291.414,296.372l-11.728-11.728l185.804-184.631l10.547,10.546 C476.036,110.567,476.036,110.571,476.036,110.577z" />
				</g>
			</svg>レビューを投稿する
		</a>
		@show

		@endauth
	</div>

	<div class="p-2">

		@guest

		<a class="flex items-center space-x-2 transition hover:text-orange-600 pb-2" href="{{ route('login') }}">
			<svg class="w-4 h-4 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
					class=""></path>
			</svg>
			ログイン
		</a>

		@section('modal-register-link')
		<a class="flex items-center space-x-2 transition hover:text-orange-600" href="{{ route('register') }}">
			<svg class="w-4 h-4 mr-2.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
					stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor"
					stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
			会員登録
		</a>
		@show

		@endguest

		@auth

		@section('modal-mypage-link')
		<a href="{{ route('mypage.favorites') }}"
			class="mb-2 flex items-center space-x-2 transition hover:text-orange-600">
			<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24">
				<circle fill="none" cx="12" cy="7" r="3"></circle>
				<path
					d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z">
				</path>
			</svg><span class="ml-0.5">マイページ</span>
		</a>
		@show

		@section('modal-profile-link')
		<a href="{{ route('profile.edit') }}" class="mb-2 flex items-center space-x-2 transition hover:text-orange-600">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				stroke="currentColor" class="h-4 w-4 mr-2.5">
				<path stroke-linecap="round" stroke-linejoin="round"
					d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
			</svg>設定
		</a>
		@show

		<a class="flex items-center space-x-2 transition hover:text-orange-600" href="{{ route('logout') }}" onclick="event.preventDefault();
            			document.getElementById('logout-form').submit();">
			<svg class="h-4 w-4 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
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