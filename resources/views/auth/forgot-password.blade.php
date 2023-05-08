@extends('layouts.app1')

@section('register-link')
@endsection

@section('remove-in-register-link')
@endsection


@section('content')

<div class="h-screen md:flex">
	<div class="absolute inset-0 z-(-1) bg-cover bg-center bg-no-repeat opacity-80 relative overflow-hidden md:flex w-1/2 justify-around items-center hidden"
		style="background-image: url('images/onsenback05.jpg');">

	</div>
	<div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
		<form method="POST" action="{{ route('password.email') }}" class="bg-white">
			@csrf
			<div class="flex flex-col text-center w-full">
				<h1 class="sm:text-3xl text-2xl font-medium mb-2 text-gray-900 mt-20 md:mt-0">パスワードをお忘れですか？</h1>
				<p class=" mx-auto leading-relaxed text-base text-gray-700">
					お手数ですがこちらのフォームにメールアドレスを入力して下されば、
				<p class=" mx-auto leading-relaxed text-base mb-12 text-gray-700">新しいパスワードを設定する為のリンクをメールでお送りします。
				</p>
				</p>
			</div>

			<div class="justify-center items-center py-1 rounded-md mb-4">
				<div class="flex items-center border-2 py-1 px-3 rounded-md mb-4">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
						viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
					</svg>
					<x-text-input
						class="w-full pl-2 outline-none border-none focus:outline-none focus:border-none focus:ring-0"
						type="email" id="email" name="email" placeholder="登録したメールアドレスを入力" />
				</div>
				<x-input-error :messages="$errors->get('email')" class="mt-2" />
			</div>

			<div class="flex justify-center mt-6">
				<button
					class="text-white font-semibold bg-orange-500 border-0 py-3 px-10 focus:outline-none hover:bg-orange-600 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 text-lg flex items-center"
					required autofocus>リセットリンクを送る</button>
			</div>

		</form>
	</div>
</div>


@endsection