@extends('layouts.app1')

@section('content')

<main>

	<div class="max-w-2xl mx-auto bg-white p-16">

		<form id="review-form" method='POST' action="{{ route('update', [ 'id' =>$review['id'] ]) }}"
			enctype="multipart/form-data">
			<input type='hidden' name='user_id' value="{{$loggedInUser['id']}}">
			<input type='hidden' name='onsenName' value="{{$review['onsenName']}}">
			@csrf


			<h1 class="block text-4xl font-bold text-gray-800 dark:text-white mb-11">レビューの編集</h1>

			<div class="mb-8">
				@if ($errors->any())
				<ul>
					@foreach ($errors->all() as $error)
					<li>・{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>

			<div class="mb-8">
				<label for="onsenmei"
					class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">温泉名:</label>
				{{$review['onsenName']}}
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">レビュー点数:</label>
				<select name='star' value="{{$review['star']}}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
					<option selected>{{$review['star']}}</option>
					<option>★☆☆☆☆</option>
					<option>★★☆☆☆</option>
					<option>★★★☆☆</option>
					<option>★★★★☆</option>
					<option>★★★★★</option>
				</select>
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">時間帯:</label>
				<select name='time'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
					<option selected>{{$review['time']}}</option>
					<option>早朝</option>
					<option>午前</option>
					<option>昼</option>
					<option>夕方</option>
					<option>夜</option>
				</select>
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">レビュー詳細:</label>
				<textarea name='content'
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					maxlength='3000' row='4'>{{$review['content']}}</textarea>
			</div>


			<div class="mb-8">
				<label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">タグ</label>
				<input name='tag' type="text" value="{{ $review->tag->name }}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					id="tag" list="tags" placeholder="テキスト入力もしくはクリック">
				<datalist id="tags">
					@foreach($allTags as $allTag)
					<option> {{$allTag['name']}}</option>
					@endforeach
				</datalist>
			</div>


			<div class="mb-8">
				<label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">写真</label>
				<label for="image"
					class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 p-4 cursor-pointer">
					<input type="file" name='image' id="image" style="display: none;" accept=".png, .jpg, .jpeg">
					<div class="space-y-1 text-center" id="initial">
						<svg id="upload-icon" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
							viewBox="0 0 48 48" aria-hidden="true">
							<path
								d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
								stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<div class="flex text-sm text-gray-600 justify-center">
							<p class="pl-1">クリックして画像を挿入</p>
						</div>
						<p class="text-xs text-gray-500">PNG, JPG 画像を入れてください</p>
					</div>
					<div id="preview" class="space-y-1 text-center"
						style="display: none; align-items: center; justify-content: center;">
						<img id="previewImage" style="max-width: 60%; max-height: 60%; object-fit: contain;">
						<p id="previewText" class="text-sm text-gray-600 ml-1"></p>
					</div>
				</label>

			</div>


			<button type="button" onclick="openEditModal()"
				class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-600">更新する</button>
			<div class="mt-5">
				<button type="button"
					class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-400 dark:hover:bg-gray-500 dark:focus:ring-gray-600"
					onclick="location.href = '/review/{{$review['id']}}'">更新をやめる</button>
			</div>
		</form>

		<div id="modal" onclick="closeModal(event)"
			class="fixed insert-0 z-50 overflow-auto bg-black bg-opacity-50 inset-0 overflow-y-auto hidden">
			<div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20">
				<div class="bg-white rounded-lg shadow-xl w-full max-w-md">
					<div class="p-6">
						<div class="flex items-center justify-between w-full pb-2 mb-6 border-b border-gray-200">
							<h2 class="text-xl font-bold">レビュー内容確認</h2>
						</div>
						<div id="modalContent">
						</div>
						<div class="mt-10 flex justify-between">
							<button type="button" onclick="submitReview();"
								class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-600">更新する</button>
							<button type="button" onclick="cancelModal();"
								class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-400 dark:hover:bg-gray-500 dark:focus:ring-gray-600">キャンセル</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<script src="{{ asset('js/create-insert-image.js') }}"></script>

</main>

@endsection