<section class="space-y-6">
	<header>
		<h2 class="text-lg font-medium text-gray-900">
			{{ __('アカウントの削除') }}
		</h2>

		<p class="mt-1 text-sm text-gray-600">
			{{ __('アカウントが削除されると、すべての投稿とデータが削除されます。') }}
		</p>

	</header>

	<form id="delete-form" method="post" action="{{ route('profile.destroy') }}">
		@csrf
		@method('delete')
	</form>

	<button class="m-1 text-white bg-red-600 border-0 py-3 px-5 focus:outline-none hover:bg-red-700 rounded text-xl"
		onclick="if(confirm('本当にアカウントを削除しますか？')) { document.getElementById('delete-form').submit(); }">
		{{ __('アカウントを削除する') }}
	</button>



</section>