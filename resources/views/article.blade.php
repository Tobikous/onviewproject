@extends('layouts.app1')

@section('content')

<body>

	<div class="card-body">
		@if (session('status'))
		<div class="alert alert-success" role="alert">
			{{ session('status') }}
		</div>
		@endif

		<section class="h-auto bg-white md:py-20 py-10">
			<div class="md:text-center max-w-7xl mx-auto xl:px-0 px-5">

				<h1
					class="text-4xl font-extrabold tracking-normal text-gray-900 sm:text-4xl lg:text-5xl md:leading-none">
					投稿レビュー一覧</h1>
				<p
					class="max-w-none mx-auto mt-3 text-xl font-normal text-gray-500 sm:mt-5 sm:text-xl md:mt-5 lg:text-2xl md:max-w-4xl">
					これまで投稿されたレビューを閲覧できます。</p>
			</div>
		</section>

		<div
			class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl tails-selected-element">
			@foreach($reviews as $review)
			@if($loop->first)

			<div class="flex flex-col items-center sm:px-5 md:flex-row tails-selected-element">
				<div class="w-full md:w-1/2">
					<a href="/review/{{$review['id']}}" class="block">
						<img alt="Onsen Image" src="{{$review['image']}}"
							class="object-cover w-full h-full rounded-lg max-h-64 md:max-h-96">
					</a>
				</div>

				<div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
					<div
						class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-4">
						<div
							class="flex items-center leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
							<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-lg">
								{{$review['star']}}
						</div>
						<h1 class="text-3xl font-bold leading-none lg:text-5xl"><a href="/review/{{$review['id']}}"
								class="">{{$review['onsenName']}}</a></h1>
						<p class="text-sm text-gray-500 line-clamp-3 overflow-hidden">{{$review['content']}}
						<p class="pt-2 text-sm font-medium"><a href="/review/{{$review['id']}}" class="underline"></a>
							<span class="">投稿日</span>:<span
								class="mx-1 text-gray-600">{{$review['updated_at']->format('Y年m月d日')}}</span>
						</p>
					</div>
				</div>
			</div>
			@endif
			@endforeach

			<div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">

				@foreach($reviews as $review)
				@if(!$loop->first)
				<div class="flex flex-col items-start col-span-12 space-y-2 sm:col-span-6 xl:col-span-4">
					<a href="/review/{{$review['id']}}" class="block">
						<img alt="Onsen Image" src="{{$review['image']}}"
							class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-64 sm:max-h-56">
					</a>
					<div
						class="flex items-center leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
						<h2 class="text-yellow-500 tracking-widest  title-font font-medium text-base">
							{{$review['star']}}
					</div>
					<h2 class="text-3xl font-bold sm:text-xl md:text-2xl"><a
							href="/review/{{$review['id']}}">{{$review['onsenName']}}</a></h2>
					<p class="text-sm text-gray-500 line-clamp-3 overflow-hidden">{{$review['content']}}
					</p>
					<p class="pt-2 text-xs font-medium"><a href="/review/{{$review['id']}}" class="">投稿日</a>:<span
							class="">{{$review['updated_at']->format('Y年m月d日')}}</span><span
							class="mx-1 text-gray-600"></span>
					</p>
				</div>
				@endif
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