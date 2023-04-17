@extends('layouts.app1')

@section('content')

<body>


	<div class="container">



		@if (session('success'))
		<div class="flex container  w-full flex-col text-center my-10">
			<div class="mb-5 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
				<p class="font-bold">{{ session('success') }}</p>
			</div>
		</div>
		@endif


		<section
			class="relative flex flex-col items-center justify-center w-full px-6 bg-white bg-cover lg:py-32 min-w-screen py-20 tails-selected-element">
			<div
				class="flex flex-col items-center justify-center mx-auto sm:p-6 xl:p-8 lg:flex-row lg:max-w-6xl lg:p-0">
				<div
					class="container relative z-20 flex flex-col w-full px-5 pb-1 pr-12 mb-16 text-2xl text-gray-700 lg:w-1/2 sm:pr-0 md:pr-6 md:pl-0 lg:pl-5 xl:pr-10 sm:items-center lg:items-start lg:mb-0">
					<h1 class="relative z-20 text-5xl font-extrabold leading-none text-purple-500 xl:text-6xl sm:text-center lg:text-left"
						data-primary="purple-500">温泉レビューサイト
						おんびゅ～</h1>
					<p class="relative z-20 block mt-6 text-base text-gray-500 xl:text-xl sm:text-center lg:text-left">
						レビューの投稿、閲覧ができます</p>
					<div class="relative flex mt-4">
						<a href="#_"
							class="flex items-center self-start justify-center px-5 py-2 mt-5 text-base font-medium leading-tight text-white transition duration-150 ease-in-out bg-purple-500 border border-transparent rounded-full shadow lg:py-4 hover:bg-purple-600 focus:outline-none focus:border-purple-600 focus:shadow-outline-purple md:text-lg xl:text-xl md:px-5 xl:px-10"
							data-primary="purple-500" data-rounded="rounded-full">会員登録して始める</a>
						<a href="#_"
							class="relative flex items-center self-start justify-center py-2 pl-10 pr-5 mt-5 ml-5 text-base font-medium leading-tight text-gray-400 transition duration-150 ease-in-out bg-gray-100 border-transparent rounded-full shadow-sm lg:py-4 md:pl-16 md:pr-5 xl:pr-10 hover:text-purple-500 focus:outline-none md:text-lg xl:text-xl"
							data-primary="purple-500" data-rounded="rounded-full">
							<svg class="absolute left-0 w-6 h-6 ml-3 md:w-10 md:h-10" fill="currentColor"
								viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
									d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
									clip-rule="evenodd"></path>
							</svg>
							<span class="text-purple-500" data-primary="purple-600">ログインはこちらから</span>
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
					<div class="relative overflow-hidden rounded-md shadow-2xl cursor-pointer group"
						data-rounded="rounded-md" data-rounded-max="rounded-full">
						<div class="absolute flex items-center justify-center w-full h-full">
							<span
								class="flex items-center justify-center w-20 h-20 bg-purple-500 rounded-full shadow-2xl"
								data-rounded="rounded-full" data-primary="purple-500">
								<svg class="w-auto h-8 ml-1 text-white fill-current" viewBox="0 0 52 66"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M50 30.7L4.1.6C2.6-.4.8.9.8 2.9v60.3c0 2 1.8 3.3 3.3 2.3L50 35.3c1.5-1 1.5-3.6 0-4.6z"
										fill-rule="nonzero"></path>
								</svg>
							</span>
						</div>
						<img src="https://images.unsplash.com/photo-1493857671505-72967e2e2760?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2850&amp;h=1603&amp;q=80"
							class="z-10 object-cover w-full h-full">
					</div>
				</div>
			</div>
		</section>


		<main class="max-w-5xl px-10 py-10 mx-auto xl:px-0 tails-selected-element">


			<div class="flex flex-wrap mt-10 overflow-hidden">
				<div class="w-full overflow-hidden md:w-4/6 lg:w-4/6 xl:w-4/6">
					<div class="ml-2 mr-2 md:mr-4">
						<div class="flex items-center justify-between w-full pb-5 mb-8 border-b border-gray-200">
							<h2 class="text-3xl font-bold text-gray-800">投稿レビュー一覧</h2>
							<a href="article"
								class="flex items-center text-base font-semibold text-blue-400 hover:text-blue-500 group">
								<span class="">すべてのレビューを見る</span>
								<svg class="w-4 h-4 mt-0.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M9 5l7 7-7 7"></path>
								</svg>
							</a>
						</div>

						<div class="pb-12">
							@foreach($reviews as $review)
							@if($loop->first)
							<a href="/show/{{$review['id']}}"
								class="relative block w-full overflow-hidden h-80 rounded-xl">
								<img class="object-cover object-top w-full h-full transition duration-300 ease-out transform scale-100 hover:scale-105"
									src="{{ asset($review->image) }}" alt="onsenImage>
							</a>
							<a class=" relative block mt-5 mb-1 text-xs font-medium tracking-wide text-green-500 uppercase">Travel</a>
							<h2 class="mb-1 font-serif text-3xl font-thin text-gray-900"><a
									href="/show/{{$review['id']}}" class="">{{$review['onsenName']}}</a></h2>


							<span class="block mb-5 text-xs font-normal text-gray-800">

								<span class="ml-1 text-gray-500">更新日：{{$review['updated_at']->format('Y年m月d日')}}</span>
							</span>

							<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-lg">
								{{$review['star']}}</h2>
							<p class="text-gray-800">
								<span class="leading-relaxed truncate overflow-hidden">{{$review['content']}}</span>

								<a href="/show/{{$review['id']}}"
									class="inline-flex items-center inline text-sm text-gray-500 underline">
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
								<a href="/show/{{$review['id']}}" class=" block h-48 mb-3 overflow-hidden rounded-lg">
									<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 hover:scale-105"
										src="{{ asset($review->image) }}" alt="onsenImage">
								</a>
								<h2 class="mb-2 font-serif text-lg text-gray-900"><a href="/show/{{$review['id']}}"
										class="">{{$review['onsenName']}}</a></h2>
								<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-lg">
									{{$review['star']}}</h2>
								<p class="text-gray-800">
								<p class="text-sm text-gray-800 truncate overflow-hidden">
									{{$review['content']}}
								</p>
								<a href="/show/{{$review['id']}}"
									class="inline-flex items-center inline text-sm text-gray-500 underline">
									<span class="">続きを読む</span>
									<svg class="w-3 h-3 ml-1 transform -rotate-45" fill="none" stroke="currentColor"
										viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
											d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
									</svg>
								</a>
							</div>

							@endif
							@endforeach

						</div>
					</div>

					<div class="mt-16 text-center">
						<a href="{{ route('article') }}"
							class="px-5 py-3 text-sm font-medium tracking-widest text-white uppercase bg-gray-800 hover:bg-gray-900 rounded-lg">
							全てのレビューを見る</a>
					</div>

				</div>

				<!-- Begining of Sidebar -->
				<div class="w-full mt-12 overflow-hidden md:w-2/6 lg:w-2/6 xl:w-2/6 md:mt-0">
					<div class="ml-2 mr-2 md:ml-4">
						<div class="rounded-lg bg-gray-50 p-7">
							<div class="pb-6 text-left">
								<h2 class="mb-1 text-lg font-medium text-gray-900">温泉名検索フォーム</h2>
								<span class="block text-xs italic text-gray-500">こちらから、温泉を探せます</span>
								<form action="/search" method="GET">
									@csrf
									<div class="mt-5 overflow-hidden bg-white border-none rounded-lg">
										<input
											class="w-full px-3 py-2 placeholder-gray-400 bg-transparent border-2 border-gray-200 rounded-lg focus:outline-none"
											type="text" name="keyword" id="keyword" placeholder="温泉名を入力">
									</div>

									<button type="submit"
										class="w-full py-3 mt-5 text-sm font-medium tracking-widest text-white uppercase bg-gray-900 rounded-lg">検索</button>
								</form>
							</div>
						</div>
						<div class="mt-10">
							<h2 class="mb-5 text-lg font-medium text-gray-900">Categories</h2>
							<ul>
								<li class="flex"><a href="#_"
										class="flex-1 block py-2 font-serif text-lg font-thin text-gray-900">Lifestyle</a><span
										class="p-2 text-lg font-thin text-gray-700">32</span></li>
								<li class="flex"><a href="#_"
										class="flex-1 block py-2 font-serif text-lg font-thin text-gray-900">Health</a><span
										class="p-2 text-lg font-thin text-gray-700">41</span></li>
								<li class="flex"><a href="#_"
										class="flex-1 block py-2 font-serif text-lg font-thin text-gray-900">Gaming</a><span
										class="p-2 text-lg font-thin text-gray-700">27</span></li>
								<li class="flex"><a href="#_"
										class="flex-1 block py-2 font-serif text-lg font-thin text-gray-900">Travel</a><span
										class="p-2 text-lg font-thin text-gray-700">21</span></li>
								<li class="flex"><a href="#_"
										class="flex-1 block py-2 font-serif text-lg font-thin text-gray-900">Food</a><span
										class="p-2 text-lg font-thin text-gray-700">15</span></li>
								<li class="flex"><a href="#_"
										class="flex-1 block py-2 font-serif text-lg font-thin text-gray-900">Business</a><span
										class="p-2 text-lg font-thin text-gray-700">28</span></li>
							</ul>
						</div>
						<div class="mt-12">
							<h2 class="mb-5 text-lg font-medium text-gray-900">Recent Posts</h2>
							<ul class="">
								<li class="mb-5">
									<a href="#_" class="flex">
										<div class="w-1/3 overflow-hidden rounded">
											<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 rounded hover:scale-105"
												src="https://cdn.devdojo.com/images/may2021/tails-blog-9.jpg" alt="">
										</div>
										<div class="flex flex-col items-start justify-center w-2/3 p-2">
											<h3 class="mb-2 font-serif font-thin text-gray-900">Top Destinations to
												Visit in the World</h3>
											<span class="block text-xs font-thin text-gray-800">January 02, 2021</span>
										</div>
									</a>
								</li>
								<li class="mb-5">
									<a href="#_" class="flex">
										<div class="w-1/3 overflow-hidden rounded">
											<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 rounded hover:scale-105"
												src="https://cdn.devdojo.com/images/may2021/tails-blog-10.jpg" alt="">
										</div>
										<div class="flex flex-col items-start justify-center w-2/3 p-2">
											<h3 class="mb-2 font-serif font-thin text-gray-900">Experience the Future of
												the 3d Gaming Experience</h3>
											<span class="block text-xs font-thin text-gray-800">January 04, 2021</span>
										</div>
									</a>
								</li>
								<li class="mb-5">
									<a href="#_" class="flex">
										<div class="w-1/3 overflow-hidden rounded">
											<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 rounded hover:scale-105"
												src="https://cdn.devdojo.com/images/may2021/tails-blog-11.jpg" alt="">
										</div>
										<div class="flex flex-col items-start justify-center w-2/3 p-2">
											<h3 class="mb-2 font-serif font-thin text-gray-900">Take a Trip to The End
												of The World</h3>
											<span class="block text-xs font-thin text-gray-800">January 05, 2021</span>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>

		</main>






		<div class="px-10 mx-auto max-w-7xl tails-selected-element">
			<div class="flex items-center justify-between w-full pb-5 mb-8 border-b border-gray-200">
				<h2 class="text-3xl font-bold text-gray-800">投稿レビュー一覧</h2>
				<a href="article"
					class="flex items-center text-base font-semibold text-blue-400 hover:text-blue-500 group">
					<span class="">すべてのレビューを見る</span>
					<svg class="w-4 h-4 mt-0.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
					</svg>
				</a>
			</div>

			<div class="grid grid-cols-12 gap-6">
				@foreach($reviews AS $review)
				<div class="relative col-span-12 mb-10 space-y-2 md:col-span-6 lg:col-span-4">
					<a href="/show/{{$review['id']}}" class="relative block w-full h-64 overflow-hidden rounded">
						<img alt="Onsen Image"
							class="object-cover object-center w-full h-full transition duration-500 ease-out transform scale-100 hover:scale-105"
							src="{{ asset($review->image) }}">
					</a>
					<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-lg">
						{{$review['star']}}</h2>
					<a href="/show/{{$review['id']}}"
						class="block text-2xl font-medium leading-tight text-gray-700 hover:text-gray-900">{{$review['onsenName']}}</a>

					<p class="leading-relaxed truncate overflow-hidden">{{$review['content']}}</p>
					<span
						class="text-gray-400 items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm border-gray-200">
						<svg class="w-4 h-4"></svg>更新日：{{$review['updated_at']->format('Y年m月d日')}}
					</span>
				</div>
				@endforeach

			</div>

			@auth
			<div class="flex items-center justify-between w-full pb-5 mt-16 mb-8 border-b border-gray-200">
				<h2 class="text-3xl font-bold text-gray-800">自分が投稿したレビュー</h2>
				<a href="#_" class="flex items-center text-base font-semibold text-blue-400 hover:text-blue-500 group">
					<span class="">自分の投稿した記事を見る</span>
					<svg class="w-4 h-4 mt-0.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
					</svg>
				</a>
			</div>

			<div class="grid grid-cols-12 gap-6">
				@foreach($reviews AS $review)
				@if($review->isWrittenByUser(auth()->user()))
				<div class="relative col-span-12 mb-10 space-y-2 md:col-span-6 lg:col-span-4">
					<a href="/show/{{$review['id']}}" class="relative block w-full h-64 overflow-hidden rounded">
						<img alt="Onsen Image"
							class="object-cover object-center w-full h-full transition duration-500 ease-out transform scale-100 hover:scale-105"
							src="{{ asset($review->image) }}">
					</a>
					<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-lg">
						{{$review['star']}}</h2>
					<a href="/show/{{$review['id']}}"
						class="block text-2xl font-medium leading-tight text-gray-700 hover:text-gray-900">{{$review['onsenName']}}</a>

					<p class="leading-relaxed truncate overflow-hidden">{{$review['content']}}</p>
					<span
						class="text-gray-400 items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm border-gray-200">
						<svg class="w-4 h-4"></svg>更新日：{{$review['updated_at']->format('Y年m月d日')}}
					</span>
				</div>
				@endif
				@endforeach

			</div>
			@endauth
		</div>




</body>

@endsection