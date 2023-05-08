@extends('layouts.app1')


@section('register-link')
@endsection

@section('remove-in-register-link')
@endsection

@section('content')

<div class="h-screen md:flex">
	<div class="absolute inset-0 z-(-1) bg-cover bg-center bg-no-repeat opacity-80 relative overflow-hidden md:flex w-1/2 justify-around items-center hidden"
		style="background-image: url('images/onsenback04.jpg');">

	</div>
	<div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
		<form method="POST" action="{{ route('register') }}" class="bg-white">
			@csrf
			<div class="text-center mr-2 text-gray-800 font-bold text-2xl mb-6 mt-20 md:mt-0">会員登録</div>

			<div class="flex items-center border-2 py-1 px-3 rounded-md mb-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
						clip-rule="evenodd" />
				</svg>
				<input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
					autofocus class="pl-2 outline-none border-none focus:outline-none focus:border-none focus:ring-0"
					maxlength="10" required aria-describedby="email-error" placeholder="名前" />
				@error('name')
				<span class="invalid-feedback text-xs ml-1 text-red-600" id="email-error" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>


			<div class="flex items-center border-2 py-1 px-3 rounded-md mb-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
				</svg>
				<input class="pl-2 outline-none border-none focus:outline-none focus:border-none focus:ring-0"
					type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
					required aria-describedby="email-error" placeholder="メールアドレス" />
				@error('email')
				<a class="invalid-feedback text-xs ml-1 text-red-600" role="alert">
					<strong>{{ $message }}</strong>
				</a>
				@enderror
			</div>



			<p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid
				email address so we can get back to you</p>

			<div class="flex items-center border-2 py-1 px-3 rounded-md mb-4">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd"
						d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
						clip-rule="evenodd" />
				</svg>
				<input class="pl-2 outline-none border-none focus:outline-none focus:border-none focus:ring-0"
					type="password" id="password" name="password" required autocomplete="new-password" required
					aria-describedby="password-error" placeholder="パスワード" />
				@error('password')
				<span class="invalid-feedback text-xs ml-1 text-red-600" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>

			<p class="hidden text-xs text-red-600 mt-2" id="password-error">8+ characters required
			</p>

			<div class="flex items-center border-2 py-1 px-3 rounded-md">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd"
						d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
						clip-rule="evenodd" />
				</svg>
				<input type="password" id="confirm-password" name="password_confirmation" required
					autocomplete="new-password"
					class="pl-2 outline-none border-none focus:outline-none focus:border-none focus:ring-0" required
					aria-describedby="confirm-password-error" required aria-describedby="confirm-password-error"
					placeholder="パスワードの確認" />
				@error('confirm-password')
				<p class="invalid-feedback text-xs ml-1 text-red-600" id="confirm-password-error">Password does not
					match the password
				</p>
				@enderror
			</div>

			<button type="submit"
				class="block w-full mt-7 py-3 rounded-md bg-orange-500 text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 font-semibold mb-2">会員登録</button>
			<a href="{{ route('login') }}"
				class="underline text-sm text-blue-600 hover:text-blue-800 ml-1 cursor-pointer">既に会員登録していますか?</a>
		</form>
	</div>
</div>




@endsection