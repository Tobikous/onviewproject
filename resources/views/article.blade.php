@extends('layouts.app1')

@section('content')

<body>
	<div class="container">



		<div class="card-body">
			@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
			@endif


			<h1 class="title-font  text-4xl text-center font-medium text-gray-900 py-20">投稿レビュー一覧</h1>

			<section class="text-gray-600 body-font overflow-hidden">
				<div class="container px-5 py-24 mx-auto">
					<div class="-my-8 divide-y-2 divide-gray-100">
						@foreach($reviews AS $review)
						<div class="py-8 flex flex-wrap md:flex-nowrap">
							<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
								<span class="font-semibold title-font text-gray-700">投稿者：</span>
								<span
									class="mt-1 text-gray-500 text-sm">投稿日：{{$review['created_at']->format('Y年m月d日')}}</span>
								<span
									class="mt-1 text-gray-500 text-sm">更新日：{{$review['updated_at']->format('Y年m月d日')}}</span>

							</div>
							<div class="md:flex-grow mb:ml-0 ml-12">
								<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{$review['onsenName']}}
								</h2>
								<h2 class="text-yellow-500 tracking-widest text-s title-font font-medium mt-3">
									{{$review['star']}}
								</h2>
								<p class="leading-relaxed line-clamp-">{{$review['content']}}</p>
								<a class="text-yellow-500 inline-flex items-center mt-4"
									href="/show/{{$review['id']}}">レビュー詳細
									<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
										fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path d="M5 12h14"></path>
										<path d="M12 5l7 7-7 7"></path>
									</svg>
								</a>
							</div>
						</div>
						@endforeach
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


			</section>



		</div>

	</div>

</body>
@endsection