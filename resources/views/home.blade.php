@extends('layouts.app1')

@section('content')

<body>


	<div class="container">

		@if (session('success'))
		<div class="mb-5 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('success') }}</p>
		</div>
		@endif

		<!-- <div class="flex container  w-full flex-col text-center my-10">
			@if (session('success'))
			<div class="mb-5 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
				<p class="font-bold">{{ session('success') }}</p>
			</div>
			@endif

			@auth
			<button
				class=" m-auto text-white bg-orange-500 border-0 py-8 px-20 focus:outline-none hover:bg-orange-600 rounded font-semibold text-4xl"
				onclick="location.href='{{ route('create') }}'">レビューを投稿する</button>
			@endauth

			@guest
			<button
				class=" m-auto text-white bg-orange-500 border-0 py-8 px-20 focus:outline-none hover:bg-orange-600 rounded font-semibold text-4xl"
				onclick="location.href='{{ route('login') }}'">ログインはこちらから</button>
			@endguest

		</div> -->




		<!-- Modal Component
		<div x-data="{ showModal: false }" x-cloak x-init="() => { window.modal = this; }">
			<button @click="showModal = true" class="bg-blue-500 text-white px-4 py-2 rounded">Open Modal</button>
			<div x-show="showModal" x-on:click.away="showModal = false"
				class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40" x-cloak>
				<div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/2">
					<div class="mb-4">
						<h2 class="text-xl font-bold">Modal Title</h2>
					</div>
					<div class="mb-4">
						<p>Modal content goes here...</p>
					</div>
					<div class="text-right">
						<button @click="showModal = false"
							class="px-4 py-2 bg-gray-500 text-white rounded">Close</button>
					</div>
				</div>
			</div>
		</div> -->



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

					<p class="leading-relaxed  truncate overflow-hidden">{{$review['content']}}</p>
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