@extends('layouts.app1')


@section('reviews-link')
@endsection

@section('modal-reviews-link')
@endsection

@section('content')

<main>

	@if (session('success'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-10 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('success') }}</p>
		</div>
	</div>
	@endif

	@if (session('error'))
	<div class="flex container  w-full flex-col text-center my-10">
		<div class="mt-10 bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
			<p class="font-bold">{{ session('error') }}</p>
		</div>
	</div>
	@endif

	<section class="max-w-5xl px-5 py-5 md:py-10 mx-auto xl:px-0 tails-selected-element">



		<div class="mx-1.5 md:mx-7 mb-5">
			<div class="flex flex-wrap md:flex-nowrap">
				<div class="w-full overflow-hidden md:w-4/6">
					<div class="pt-4 pb-2.5 px-0.5">
						<a href="/onsen/{{$review->onsen->id}}" class="underline pt-2 font-bold text-2xl">
							{{$review->onsen->name}}
						</a>
						<div class="mt-1.5"><span class="text-orange-500 text-2xl">{{ str_replace(['(',
								')'], '', star_rating($review->onsen->evaluation)) }}</span><span
								class="ml-1">{{$review->onsen->evaluation}}</span></div>
					</div>
					<div class="text-xs my-0.5"><span class="font-bold">都道府県 :</span><span
							class="ml-1.5">{{$review->onsen->area}}<span class="ml-4 font-bold">最寄り駅 :</span><span
								class="ml-1.5">{{$review->onsen->nearest_station}}</div>
					<div class="text-xs my-1"><span class="font-bold">営業日 :</span><span
							class="ml-1.5">{{$review->onsen->regular_holiday}}</span>
						<div class="md:p-3"></div>
					</div>
				</div>
				@auth
				@if($review->isWrittenByUser(auth()->user()))
				<div class="w-full overflow-hidden md:w-2/6 pt-3 mb-5 md:mb-0 md:ml-6">
					<div class="mt-2.5 px-3 py-2.5 md:bg-gray-200 flex justify-center">
						<a href="/edit/{{$review['id']}}"
							class="flex text-gray-600 border-0 py-1.5 px-2 mr-4 font-semibold focus:outline-none rounded hover:bg-white"><img
								src="{{ asset('svg/edit_article.svg') }}" alt="customIcon"
								class="w-6 h-6 opacity-1 mr-1">レビュー編集</a>
						<button
							class="flex text-gray-600 border-0 py-1.5 px-2 mr-4 font-semibold focus:outline-none rounded hover:bg-white"
							x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"><img
								src="{{ asset('svg/trashbox_icon.svg') }}" alt="customIcon"
								class="w-6 h-6 opacity-1 mr-1">レビュー削除</button>

						<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable
							x-cloak>
							<form method='POST' action="/delete/{{$review['id']}}" class="p-10">
								@csrf

								<h2 class="text-lg font-medium text-gray-900">
									{{ __('本当にレビューを削除しますか？') }}
								</h2>
								<p class="mt-1 text-sm text-red-600">
									{{ __('レビューは一度消すと、復元できません') }}
								</p>
								<div class="mt-6 flex justify-end">
									<x-secondary-button x-on:click="$dispatch('close')">
										{{ __('キャンセル') }}
									</x-secondary-button>
									<x-danger-button class="ml-3">
										{{ __('削除する') }}
									</x-danger-button>
								</div>
							</form>
						</x-modal>
					</div>
				</div>
				@endif
				@endauth
			</div>
		</div>

		<div class="flex flex-wrap overflow-hidden">



			<div id="reviewSection" class="w-full md:w-4/6 lg:w-4/6 xl:w-4/6 md:px-5">
				<div class="md:ml-2 md:mr-4 pb-10 md:pb-5">


					<div class="p-3 border border-gray-300 rounded">
						<div class="flex items-center pb-2 border-b border-gray-300">
							<img src="{{ asset('svg/human_icon.svg') }}" alt="customIcon" class="ml-0.5 w-4 h-4">
							<span class="ml-2 text-gray-900 text-sm font-bold">{{ $review->user->name }}</span>
						</div>

						<h2 class="text-orange-500 tracking-widest text-xl py-2.5 border-b border-gray-300">
							{{$review['star']}} </h2>

						<div class="text-gray-900 text-base my-2 p-2 bg-gray-200 rounded-sm">{{$review['content']}}
						</div>
						<div class="w-1/3 overflow-hidden mt-5 mb-3">
							<img class="object-cover object-center w-full h-full" src="{{ asset($review->image) }}"
								alt="onsenImage">
						</div>
						<div class="text-gray-600 items-center text-sm p-2.5 my-3 bg-gray-100 rounded-sm">
							<div class="flex justify-between items-center">
								<a href="/tag/{{$review['tag_id']}}"
									class="mb-3 inline-flex items-center justify-center px-2 py-0.5 font-medium leading-6 text-white bg-orange-400 border border-transparent rounded md:w-auto hover:bg-orange-500">
									#
									{{$review->tag->name}}
								</a>

							</div>
							<div>時間帯:{{$review['time']}}<br>更新日:{{$review['updated_at']->format('Y年m月d日')}}</div>
						</div>
					</div>
				</div>
			</div>


			<div class="w-full overflow-hidden md:w-2/6 lg:w-2/6 xl:w-2/6 mt-10 md:mt-0 md:pr-6">
				<div class="mr-2 md:ml-2">

					<div class="pr-1 w-full py-3 mb-2 border-t border-gray-300">
						<h2 class="flex text-2xl font-normal">
							<img src="{{ asset('svg/phone_icon.svg') }}" alt="customIcon" class="mr-1.5 w-5 h-5 mt-2">
							<a href="tel:{{$review->onsen->phone_number}}">{{$review->onsen->phone_number}}</a>
						</h2>
					</div>



					<div class="mt-10">
						<div class="pr-1 flex items-center justify-between w-full pb-2 mb-2 border-b border-gray-300">
							<h2 class="text-base font-medium text-gray-900">周辺の温泉</h2>
						</div>

					</div>


				</div>
			</div>


		</div>

	</section>



</main>
@endsection