@extends('layouts.app1')

@section('reviews-link')
@endsection

@section('modal-reviews-link')
@endsection

@section('content')

<main class="px-5 py-2 mx-auto xl:px-20 tails-selected-element">


	<div class="flex flex-wrap mt-14 overflow-hidden px-5 md:px-0">
		@include('partials.search-engine')


		<div class="w-full overflow-hidden md:w-3/4 md:pr-4 md:pl-10">

			<div class="p-5 text-2xl font-bold bg-orange-100 mt-5 md:mt-0">投稿レビュー一覧
				<p class="text-sm font-normal mt-2 text-gray-500">
					これまで投稿されたレビューを閲覧できます。</p>
			</div>

			<div class="pt-6 pb-4">
				<p class="text-base text-gray-700 leading-5">
					@if ($reviews->firstItem())
					<span class="font-medium">{{ $reviews->firstItem() }}</span>
					から
					<span class="font-medium">{{ $reviews->lastItem() }}</span>
					@else
					{{ $reviews->count() }} 件を表示
					@endif
					/ 全
					<span class="font-medium">{{ $reviews->total() }}</span>
					件
				</p>
			</div>

			@foreach($reviews as $review)
			<div class="mb-3 border-t">
				<div class="pt-5 flex flex-wrap">
					<div class="w-full md:w-1/3">
						<a href="/review/{{$review['id']}}"
							class="block h-48 mb-3 overflow-hidden md:rounded-none rounded-lg">
							<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 hover:scale-105"
								src="{{ asset($review->image) }}" alt="onsenImage">
						</a>
					</div>
					<a href="/review/{{$review['id']}}" class="w-full md:w-2/3 md:pl-5">
						<div class="w-full overflow-hidden md:w-4/6">
							<div class="pb-2.5 px-0.5">
								<div class=""><span class="font-bold text-2xl">{{$review['onsenName']}} のレビュー</span>
								</div>
								<div class="mt-1.5"><span class="text-orange-500 text-2xl">{{$review['star']}}</span>
								</div>
							</div>
							<div class="text-xs mt-0.5"><span class="font-bold">投稿日 :</span><span class="ml-1.5">
									{{$review['updated_at']->format('Y年m月d日')}}</span>
							</div>
							<div class="text-xs mt-0.5 mb-1">
								<span class="font-medium">投稿者 :</span><span class="ml-1.5">
									{{ optional($review->user)->name }}</span>
							</div>
							<div class="text-sm p-2.5 bg-gray-100 line-clamp-3 overflow-hidden">
								{{$review['content']}}
							</div>
						</div>
					</a>
				</div>
			</div>
			@endforeach

			<div class="flex flex-row-reverse justify-center pt-5 pb-10">
				<p class="ml-5">{{ $reviews->links() }}</p>
				<p class="text-base text-gray-700 leading-5 pr-4 pt-2.5">
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


		</div>

	</div>



</main>
@endsection