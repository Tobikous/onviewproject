@extends('layouts.app1')

@section('content')

<main>


	<section class="px-5 py-2 mx-auto xl:px-20 tails-selected-element">


		<div class="flex flex-wrap mt-14 overflow-hidden px-5 md:px-0">
			@include('partials.search-engine')


			@if (isset($tagName) || isset($keyword))
			<div class="w-full overflow-hidden md:w-3/4 md:pr-5 md:pl-9">

				@if (isset($tagName))
				<div class="p-5 text-2xl font-bold bg-orange-100 mt-5 md:mt-0">「{{$tagName}}」 タグのレビュー</div>
				@else
				<div class="p-5 text-2xl font-bold bg-orange-100 mt-5 md:mt-0">キーワード：「{{$keyword}}」 のレビュー</div>
				@endif

				<div class="pt-6 pb-4 md:flex md:justify-between items-center">
					<p class="mb-3 md:mb-0 flex justify-center text-base text-gray-700 leading-5 tracking-widest">
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

					@if (!isset($tagName))
					<div class="flex justify-center">
						<a href="{{ route('onsen_search', ['keyword' => $keyword]) }}"
							class="text-gray-600 hover:text-orange-500 pr-4 md:pr-3 underline md:border-r">温泉を探す</a>
						<a class="text-balck md:px-3 md:pb-0.5">レビューを探す</a>
					</div>
					@endif
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
									<div class=""><span class="font-bold text-2xl">{{$review['onsenName']}}</span>
									</div>
									<div class="mt-1.5"><span
											class="text-orange-500 text-2xl">{{$review['star']}}</span></div>
								</div>
								<div class="text-xs mt-0.5 mb-3"><span class="font-bold">投稿日 :</span><span
										class="ml-1.5">
										{{$review['updated_at']->format('Y年m月d日')}}</span>
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
			@endif



			@if (isset($onsenkeyword))
			<div class="w-full overflow-hidden md:w-3/4 md:pr-5 md:pl-9">
				<div class="p-5 text-2xl font-bold bg-orange-100 mt-5 md:mt-0">キーワード：「{{$onsenkeyword}}」 の温泉</div>


				<div class="pt-6 pb-4 md:flex md:justify-between items-center">
					<p class="mb-3 md:mb-0 flex justify-center text-base text-gray-700 leading-5 tracking-widest">
						@if ($onsens->firstItem())
						<span class="font-medium">{{ $onsens->firstItem() }}</span>
						から
						<span class="font-medium">{{ $onsens->lastItem() }}</span>
						@else
						{{ $onsens->count() }} 件を表示
						@endif
						/ 全
						<span class="font-medium">{{ $onsens->total() }}</span>
						件
					</p>
					<div class="flex justify-center">
						<a class="text-balck pr-4 md:pr-3 md:border-r">温泉を探す</a>
						<a href="{{ route('review_search', ['keyword' => $onsenkeyword]) }}"
							class="text-gray-600 hover:text-orange-500 underline md:px-3 md:pb-0.5">レビューを探す</a>
					</div>

				</div>

				@foreach($onsens as $onsen)
				<div class="mb-3 border-t">
					<div class="pt-5 flex flex-wrap">
						<div class="w-full md:w-1/3">
							@php
							$firstReview = $reviews->where('onsenName', $onsen->name)->first();
							@endphp
							@if($firstReview)
							<a href="/onsen/{{$onsen['id']}}"
								class="block h-48 mb-3 overflow-hidden md:rounded-none rounded-lg">
								<img class="object-cover object-center w-full h-full transition duration-300 ease-out transform scale-100 hover:scale-105"
									src="{{ asset($firstReview->image) }}" alt="onsenImage">
							</a>
							@endif
						</div>
						<a href="/onsen/{{$onsen['id']}}" class="w-full md:w-2/3 md:pl-5">
							<div class="w-full overflow-hidden md:w-4/6">
								<div class="pb-2.5 px-0.5">
									<div class=""><span class="font-bold text-2xl">{{$onsen['name']}}</span>
									</div>
									<div class="mt-1.5"><span class="text-orange-500 text-2xl">{{ str_replace(['(',
											')'], '', star_rating($onsen->evaluation)) }}</span><span
											class="ml-1">{{$onsen->evaluation}}</span></div>
								</div>
								<div class="text-xs my-0.5"><span class="font-bold">所在地 :</span><span
										class="ml-1.5">{{$onsen['area']}}</div>
								<div class="text-xs my-2"><span class="font-bold">最寄り駅 :</span><span
										class="ml-1.5">{{$onsen['nearest_station']}}</div>
								<div class="text-xs my-2"><span class="font-bold">住所 :</span><span class="ml-1.5">
										{{$onsen['formatted_address']}}</span>
									<div class="md:p-3"></div>
								</div>
							</div>
						</a>
					</div>
				</div>
				@endforeach

				<div class="flex flex-row-reverse justify-center pt-5 pb-10">
					<p class="ml-5">{{ $onsens->links() }}</p>
					<p class="text-base text-gray-700 leading-5 pr-4 pt-2.5">
						表示中
						@if ($onsens->firstItem())
						<span class="font-medium">{{ $onsens->firstItem() }}</span>
						から
						<span class="font-medium">{{ $onsens->lastItem() }}</span>
						@else
						{{ $onsens->count() }}
						@endif
						/
						<span class="font-medium">{{ $onsens->total() }}</span>
						件
					</p>

				</div>


			</div>
			@endif
		</div>



	</section>





</main>
@endsection