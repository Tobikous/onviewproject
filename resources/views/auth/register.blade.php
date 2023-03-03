@extends('layouts.app1')
@section('content')
<html class="h-full">
<main class="w-full max-w-md mx-auto p-6">
	<div class="mt-7 bg-gray-100 border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
		<div class="p-4 sm:p-7">
			<div class="text-center">
				<h1 class="block text-2xl font-bold text-gray-800 dark:text-white">会員登録画面</h1>
				<p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
				</p>
			</div>
			<div class="mt-5">
				<form method="POST" action="{{ route('register') }}">
					@csrf
					<div class="grid gap-y-4">

						<div>
							<label for="email" class="block text-sm mb-2 dark:text-white">名前</label>
							<div>
								<input id="name" type="text" name="name" value="{{ old('name') }}" required
									autocomplete="name" autofocus
									class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
									required aria-describedby="email-error">
								@error('name')
								<span class="invalid-feedback hidden text-xs text-red-600 mt-2" id="email-error"
									role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div>
							<label for="email" class="block text-sm mb-2 dark:text-white">メールアドレス</label>
							<div>
								<input type="email" id="email" name="email" value="{{ old('email') }}" required
									autocomplete="email"
									class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
									required aria-describedby="email-error">
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
								<div
									class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
									<svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
										viewBox="0 0 16 16" aria-hidden="true">
										<path
											d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
									</svg>
								</div>
							</div>
							<p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid
								email address so we can get back to you</p>
						</div>

						<div>
							<label for="password" class="block text-sm mb-2 dark:text-white">パスワード</label>
							<div>
								<input type="password" id="password" name="password" required
									autocomplete="new-password"
									class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
									required aria-describedby="password-error">
								<div
									class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
									<svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
										viewBox="0 0 16 16" aria-hidden="true">
										<path
											d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
									</svg>
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<p class="hidden text-xs text-red-600 mt-2" id="password-error">8+ characters required
							</p>
						</div>

						<div>
							<label for="confirm-password" class="block text-sm mb-2 dark:text-white">パスワードの確認</label>
							<div>
								<input type="password" id="confirm-password" name="password_confirmation" required
									autocomplete="new-password"
									class="w-full bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
									required aria-describedby="confirm-password-error">
								<div
									class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
									<svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
										viewBox="0 0 16 16" aria-hidden="true">
										<path
											d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
									</svg>
								</div>
							</div>
							<p class="hidden text-xs text-red-600 mt-2" id="confirm-password-error">Password does
								not match the password</p>
						</div>

						<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
							href="{{ route('login') }}">
							{{ __('Already registered?') }}
						</a>

						<button type="submit"
							class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-orange-500 text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">会員登録</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</main>

</html>
@endsection