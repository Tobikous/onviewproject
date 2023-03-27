@extends('layouts.app1')

@section('content')




<section class="text-gray-600 body-font">
	<div class="container px-5 py-16">
		<div class="flex flex-col text-center w-full mb-12">
			<h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">パスワードをお忘れですか？</h1>
			<p class="lg:w-2/3 mx-auto leading-relaxed text-base mb-12">
				お手数ですがメールアドレスを入力して下されば、新しいパスワードを設定する為のリンクをメールでお送りします。
			</p>
		</div>

		<form method="POST" action="{{ route('password.email') }}" class="text-center">
			@csrf

			<div class="flex justify-center">
				<div class="w-2/5">
					<div class="relative flex-grow w-full">
						<div class="flex flex-col">
							<x-input-label for="email" class="leading-7 text-xl text-gray-600 mb-5 text-center"
								:value="__('メールアドレスを入力')" />
							<x-text-input
								class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-transparent focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
						</div>
						<x-input-error :messages="$errors->get('email')" class="mt-2" />
					</div>

					<div class="flex justify-center mt-6">
						<button
							class="text-white bg-orange-500 border-0 py-3 px-10 focus:outline-none hover:bg-orange-600 rounded text-lg flex items-center"
							required autofocus>リセットリンクを送る</button>
					</div>
				</div>
			</div>


		</form>
	</div>




</section>

@endsection