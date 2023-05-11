@extends('layouts.app1')

@section('onsens-link')
@endsection


@section('content')

<main>

	@if (session('success'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-20 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('success') }}</p>
		</div>
	</div>
	@endif

	<section class="px-5 py-2 mx-auto xl:px-20 tails-selected-element">


		<div class="flex flex-wrap mt-14 overflow-hidden px-5 md:px-0">
			@include('partials.search-engine')



			<div class="w-full overflow-hidden md:w-3/4 md:pr-5 md:pl-9">
				@if (isset($selectedArea))
				<div class="p-5 text-2xl font-bold bg-orange-100 mt-5 md:mt-0">{{$selectedArea}}の温泉</div>
				@else
				<div class="p-5 text-2xl font-bold bg-orange-100 mt-5 md:mt-0">すべての温泉</div>
				@endif

				<div class="pt-6 pb-4">
					<p class="text-base text-gray-700 leading-5">
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

		</div>



	</section>

</main>

@endsection