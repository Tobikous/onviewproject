<section class="space-y-6">
	<header>
		<h2 class="text-lg font-medium text-gray-900">
			{{ __('アカウントの削除') }}
		</h2>

		<p class="mt-1 text-sm text-gray-600">
			{{ __('アカウントが削除されると、すべての投稿とデータが削除されます。') }}
		</p>

	</header>

	<button class='m-1 text-white bg-red-600 border-0 py-3 px-5 focus:outline-none hover:bg-red-700 rounded text-xl'
		x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('アカウントを削除する') }}</button>
	<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable x-cloak>
		<form method="post" action="{{ route('profile.destroy') }}" class="p-10">
			@csrf
			@method('delete')
			<h2 class="text-lg font-medium text-gray-900">
				{{ __('本当にアカウントを削除しますか？') }}
			</h2>
			<p class="mt-1 text-sm text-red-600">
				{{ __('アカウントが削除されると、すべてのデータが完全に削除されます。それでも良ければアカウントを削除してください。') }}
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


</section>