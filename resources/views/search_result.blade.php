@extends('layouts.app1')

@section('content')

<body>




	<div class="card-body">

		<section class="h-auto bg-white md:py-20 py-10">
			<div class="md:text-center max-w-7xl mx-auto xl:px-0 px-5">

				<h1
					class="text-4xl font-extrabold tracking-normal text-gray-900 sm:text-4xl lg:text-5xl md:leading-none">
					「{{$keyword}}」での検索結果</h1>
				<p
					class="max-w-none mx-auto mt-3 text-xl font-normal text-gray-500 sm:mt-5 sm:text-xl md:mt-5 lg:text-2xl md:max-w-4xl">
					検索結果の表示</p>
			</div>
		</section>



		<div
			class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl tails-selected-element">

			<div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">

				@foreach($reviews as $review)
				<div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
					<a href="/show/{{$review['id']}}" class="block">
						<img alt="Onsen Image" src="{{$review['image']}}"
							class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-64 sm:max-h-56">
					</a>
					<div
						class="bg-purple-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
						<span>Lifestyle</span>
					</div>
					<h2 class="text-3xl font-bold sm:text-xl md:text-2xl"><a
							href="/show/{{$review['id']}}">{{$review['onsenName']}}</a></h2>
					<p class="text-sm text-gray-500 line-clamp-3 overflow-hidden">{{$review['content']}}
					</p>
					<p class="pt-2 text-xs font-medium"><a href="/show/{{$review['id']}}" class="mr-1 underline">投稿日</a>
						： <span class="mx-1">{{$review['updated_at']->format('Y年m月d日')}}</span> · <span
							class="mx-1 text-gray-600">3 min. read</span>
					</p>
				</div>
				@endforeach

			</div>

		</div>




	</div>


	<div class="flex flex-row-reverse ">
		<p class="ml-5">{{ $reviews->links() }}</p>

		<p class="text-base text-gray-700 leading-5 m-4">
			表示中
			@if ($reviews->firstItem())
			<span class="font-medium">{{ $reviews->firstItem() }}</span>
			から
			<span class="font-medium">{{ $reviews->lastItem() }}</span>
			@else
			{{ $reviews->count() }}
			@endif
			/
			<span class="font-medium">{{ $reviews->total() }}</span>
			件
		</p>

	</div>


</body>
@endsection