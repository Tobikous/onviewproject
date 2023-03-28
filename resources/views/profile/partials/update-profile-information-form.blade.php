<section>
	<header>
		<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">
			{{ __('プロフィール情報の編集') }}
		</h2>

		<p class="mb-9 text-sm text-gray-600">
			{{ __("アカウント名とメールアドレスの更新を行えます。") }}
		</p>
	</header>

	<form id="send-verification" method="post" action="{{ route('verification.send') }}">
		@csrf
	</form>

	<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
		@csrf
		@method('patch')

		<div>
			<x-input-label for="name" :value="__('アカウント名')" />
			<x-text-input id="name" name="name" type="text"
				class="w-3/4 bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
				:value="old('name', $user->name)" maxlength="10" required autofocus autocomplete="name" />
			<x-input-error class="mt-2" :messages="$errors->get('name')" />
		</div>

		<div>
			<x-input-label for="email" :value="__('メールアドレス')" />
			<x-text-input id="email" name="email" type="email"
				class="w-3/4 bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
				:value="old('email', $user->email)" required autocomplete="username" />
			<x-input-error class="mt-2" :messages="$errors->get('email')" />

			@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
			<div>
				<p class="text-sm mt-2 text-gray-800">
					{{ __('申し訳ありません。メールアドレスを確認できませんでした') }}

					<button form="send-verification"
						class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						{{ __('確認メールを再送信するには、ここをクリックしてください。') }}
					</button>
				</p>

				@if (session('status') === 'verification-link-sent')
				<p class="mt-2 font-medium text-sm text-green-600">
					{{ __('リンクがメールアドレスに送信されました。') }}
				</p>
				@endif
			</div>
			@endif
		</div>

		<div class="flex items-center gap-4">
			<button
				class='m-1 text-white bg-orange-500 border-0 py-1 px-7 focus:outline-none hover:bg-orange-600 rounded text-xl'>{{
				__('変更') }}</button>

			@if (session('status') === 'profile-updated')
			<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
				class="text-sm text-gray-600">{{ __('変更が完了しました。') }}</p>
			@endif
		</div>
	</form>
</section>