@extends('layouts.app1')

@section('content')

<body>
	<session class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 py-12 mx-auto">
			<div class="lg:w-4/5 mx-auto flex flex-wrap">
				<img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
					src="{{$showReview['image']}}">

				<div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
					<h2 class="text-sm title-font text-gray-500 tracking-widest">{{$onsen['area']}}</h2>
					<h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$onsen['name']}}</h1>

					<div class="flex mb-4">
						<span class="flex items-center">
							<p class="leading-relaxed line-clamp-7 text-yellow-500">{{$showReview['star']}}</p>
						</span>
						<span class="ml-3 pl-3 py-1 border-l-2 border-gray-200 space-x-2s">
							<p class="text-gray-900 text-base font-medium">投稿者：{{$showReview['name']}}</p>
							<p class="text-sm">投稿日：{{$showReview['created_at']}}</p>
							<p class="text-sm">更新日：{{$showReview['updated_at']}}</p>

						</span>
					</div>

					<p class="leading-relaxed text-gray-900">{{$showReview['content']}}</p>

					<div class="flex mt-3 items-center pb-5 border-b-2 border-gray-100 mb-2">
						<div class="flex"> </div>
					</div>
					<span class="title-font ">タグ：{{$tags['name']}}</span>
					<span class="title-font ">時間帯：{{$showReview['time']}}</span>
					<div class="flex mt-7">

						@if (!is_null($myShowReview))
						<button
							class="flex ml-auto text-white bg-orange-500 border-0 pt-4 font-semibold pb-2 px-6 focus:outline-none hover:bg-orange-600 rounded"
							type="button" onclick="location.href = '/edit/{{$showReview['id']}}'">レビューを編集する</button>

						<form method='POST' action="/delete/{{$showReview['id']}}" id='delete-form'>
							@csrf
							<button type="submit"><i
									class="fa fa-trash fa-2x  border-0 py-2 px-6 text-gray-500 hover:text-gray-700"></i></button>
						</form>
						@endif
					</div>

				</div>
			</div>
		</div>
		<!-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> -->
	</session>
</body>
@endsection