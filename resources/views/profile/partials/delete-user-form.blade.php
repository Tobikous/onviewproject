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

	<button class="m-1 text-white bg-red-600 border-0 py-3 px-5 focus:outline-none hover:bg-red-700 rounded text-xl" onclick="showModal()">
		{{ __('アカウントを削除する') }}
	</button>

	<!-- Modal -->
	<div id="delete-modal" class="hidden fixed bg-slate-800 bg-opacity-50 flex justify-center items-center w-full h-full top-0 right-0 bottom-0 left-0 z-50">
	<div class="bg-white px-16 py-14 rounded-md text-center">
		<h1 class="text-xl mb-4 font-bold text-slate-500">アカウントを本当に削除しますか？</h1>
		<button id="cancel-delete" class="bg-red-500 px-4 py-2 rounded-md text-md text-white">キャンセル</button>
		<button id="confirm-delete" class="bg-indigo-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">削除する</button>
	</div>
	</div>


	<script>
		function showModal() {
			document.getElementById('delete-modal').classList.remove('hidden');
		}

		function hideModal() {
			document.getElementById('delete-modal').classList.add('hidden');
		}

		document.getElementById('cancel-delete').addEventListener('click', function () {
			hideModal();
		});

		document.getElementById('confirm-delete').addEventListener('click', function () {
			document.getElementById('delete-form').submit();
			hideModal();
		});

		
	</script>



</section>