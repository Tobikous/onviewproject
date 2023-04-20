<section>
	<header>
		<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">
			{{ __('パスワードの変更') }}
		</h2>

		<p class="mb-9 text-sm text-gray-600">
			{{ __('こちらのフォームから、パスワードの変更が可能です。') }}
		</p>
	</header>

	<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
		@csrf
		@method('put')

		<div>
			<x-input-label for="current_password" :value="__('古いパスワード')" />
			<x-text-input id="current_password" name="current_password" type="password"
				class="w-3/4 bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
				autocomplete="current-password" />
			<x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
		</div>

		<div>
			<x-input-label for="password" :value="__('新しいパスワード')" />
			<x-text-input id="password" name="password" type="password"
				class="w-3/4 bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
				autocomplete="new-password" />
			<x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
		</div>

		<div>
			<x-input-label for="password_confirmation" :value="__('パスワードの確認')" />
			<x-text-input id="password_confirmation" name="password_confirmation" type="password"
				class="w-3/4 bg-white rounded border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
				autocomplete="new-password" />
			<x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
		</div>

		<div class="flex items-center gap-4">
			<button
				class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-600">{{__('パスワードを変更する')
				}}</button>

			@if (session('status') === 'password-updated')
			<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
				class="text-sm text-gray-600">{{ __('パスワードを変更しました。') }}</p>
			@endif
		</div>
	</form>
</section>