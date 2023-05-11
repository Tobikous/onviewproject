@extends('layouts.app1')

@section('content')

<main>

	<div class="max-w-2xl mx-auto bg-white p-16">

		<form id="onsen-edit-form" method='POST' action="{{ route('update.onsen', [ 'id' =>$onsen['id'] ]) }}"
			enctype="multipart/form-data">
			<input type='hidden' name='user_id' value="{{$loggedInUser['id']}}">
			<input type='hidden' name='name' value="{{$onsen['name']}}">
			@csrf


			<h1 class="block text-4xl font-bold text-gray-800 dark:text-white mb-11">温泉情報の編集</h1>

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
				{{$onsen['name']}}
			</div>

			<div class="mb-8">
				<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">都道府県の選択:</label>
				<select name='area' value="{{$onsen['area']}}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
					<option selected>{{$onsen['area']}}</option>
					<optgroup label="北海道">
						<option value="北海道">北海道</option>
					<optgroup label="東北">
						<option value="青森県">青森県</option>
						<option value="秋田県">秋田県</option>
						<option value="岩手県">岩手県</option>
						<option value="山形県">山形県</option>
						<option value="宮城県">宮城県</option>
						<option value="福島県">福島県</option>
					</optgroup>
					<optgroup label="関東">
						<option value="茨城県">茨城県</option>
						<option value="栃木県">栃木県</option>
						<option value="群馬県">群馬県</option>
						<option value="埼玉県">埼玉県</option>
						<option value="千葉県">千葉県</option>
						<option value="東京都">東京都</option>
						<option value="神奈川県">神奈川県</option>
					</optgroup>
					<optgroup label="中部">
						<option value="新潟県">新潟県</option>
						<option value="富山県">富山県</option>
						<option value="石川県">石川県</option>
						<option value="福井県">福井県</option>
						<option value="山梨県">山梨県</option>
						<option value="長野県">長野県</option>
						<option value="岐阜県">岐阜県</option>
						<option value="静岡県">静岡県</option>
						<option value="愛知県">愛知県</option>
					</optgroup>
					<optgroup label="近畿">
						<option value="三重県">三重県</option>
						<option value="滋賀県">滋賀県</option>
						<option value="京都府">京都府</option>
						<option value="大阪府">大阪府</option>
						<option value="兵庫県">兵庫県</option>
						<option value="奈良県">奈良県</option>
						<option value="和歌山県">和歌山県</option>
					</optgroup>
					<optgroup label="中国">
						<option value="岡山県">岡山県</option>
						<option value="広島県">広島県</option>
						<option value="鳥取県">鳥取県</option>
						<option value="島根県">島根県</option>
						<option value="山口県">山口県</option>
					</optgroup>
					<optgroup label="四国">
						<option value="徳島県">徳島県</option>
						<option value="香川県">香川県</option>
						<option value="愛媛県">愛媛県</option>
						<option value="高知県">高知県</option>
					</optgroup>
					<optgroup label="九州沖縄">
						<option value="福岡県">福岡県</option>
						<option value="佐賀県">佐賀県</option>
						<option value="長崎県">長崎県</option>
						<option value="熊本県">熊本県</option>
						<option value="大分県">大分県</option>
						<option value="宮崎県">宮崎県</option>
						<option value="鹿児島県">鹿児島県</option>
						<option value="沖縄県">沖縄県</option>
					</optgroup>
				</select>
			</div>


			<div class="mb-8">
				<label for="formatted_address"
					class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">住所</label>
				<input name='formatted_address' type="text"
					value="{{ old('formatted_address', $onsen['formatted_address'] ?? '') }}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					id="formatted_address" placeholder="住所を入力" {{ isset($onsen['formatted_address']) ? 'readonly' : ''
					}}>
			</div>


			<div class="mb-8">
				<label for="nearest_station"
					class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">最寄り駅</label>
				<input name='nearest_station' type="text"
					value="{{ old('nearest_station', $onsen['nearest_station'] ?? '') }}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					id="nearest_station" placeholder="最寄り駅を入力">
			</div>


			<div class="mb-8">
				<label for="regular_holiday"
					class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">定休日</label>
				<input name='regular_holiday' type="text"
					value="{{ old('regular_holiday', $onsen['regular_holiday'] ?? '') }}"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
					id="regular_holiday" placeholder="最寄り駅を入力">
			</div>


			<button type="button" onclick="openEditOnsenModal()"
				class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-600">更新する</button>
			<div class="mt-5">
				<button type="button"
					class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-400 dark:hover:bg-gray-500 dark:focus:ring-gray-600"
					onclick="location.href = '/onsen/{{$onsen['id']}}'">編集をやめる</button>
			</div>
		</form>

		<div id="modal" onclick="closeModal(event)"
			class="fixed insert-0 z-50 overflow-auto bg-black bg-opacity-50 inset-0 overflow-y-auto hidden">
			<div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20">
				<div class="bg-white rounded-lg shadow-xl w-full max-w-md">
					<div class="p-6">
						<div class="flex items-center justify-between w-full pb-2 mb-6 border-b border-gray-200">
							<h2 class="text-xl font-bold">情報内容の確認</h2>
						</div>
						<div id="modalContent">
						</div>
						<div class="mt-10 flex justify-between">
							<button type="button" onclick="submitOnsen();"
								class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-600">更新する</button>
							<button type="button" onclick="cancelModal();"
								class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-400 dark:hover:bg-gray-500 dark:focus:ring-gray-600">キャンセル</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

@endsection