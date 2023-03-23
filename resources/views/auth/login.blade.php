@extends('layouts.app1')

@section('content')
<section class="text-gray-600 body-font">
	<form name="loginForm" method="POST" action="{{ route('login') }}">
		@csrf
		<div class="container px-10 py-20 mx-auto flex flex-wrap items-center">
			<div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
				<h1 class="mb-2 title-font font-medium text-3xl text-gray-900">温泉レビューサイト、おんびゅーへようこそ！</h1>
				<a href="{{ route('home') }}">ゲストの方はこちらから（会員登録なしでレビューを見る）</a>
			</div>

			<div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
				<div class="text-center">
					<h1 class="block text-2xl font-bold text-gray-800 dark:text-white">ログイン</h1>
					<p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
					</p>
				</div>

				<div class="mb-4">
					<label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
					<input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
						autofocus
						class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out form-control @error('email') is-invalid @enderror">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="mb-4">
					<label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
					<input id="password" type="password" name="password" required autocomplete="current-password"
						class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out form-control @error('password') is-invalid @enderror">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3 text-gray-900">
					<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

					<label for="remember">
						ログイン状態を維持する
					</label>
				</div>

				<button
					class="m-1 text-white bg-orange-500 border-0 py-2 px-8 focus:outline-none hover:bg-orange-600 rounded text-lg">ログイン</button>

				<div class="mt-4 text-blue-600">
					@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}">
						パスワードを忘れた場合
					</a>
					@endif
				</div>

				<div class="mt-4 text-blue-600">
					<a href="{{ route('register') }}">
						会員登録はこちらから
					</a>
				</div>
			</div>
		</div>
		</div>
	</form>

</section>
@endsection