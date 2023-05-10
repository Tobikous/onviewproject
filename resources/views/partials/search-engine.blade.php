<div class="w-full overflow-hidden md:w-1/4">
	<div class="p-3 bg-gray-200 rounded-md">
		<div class="flex justify-between items-center py-3 px-5 border-b bg-white rounded-md rounded-b-none">
			<div class="flex items-center">
				<span class="text-xl font-bold pb-0.5">エリア</span>
				<span class="ml-1">から探す</span>
			</div>
			<div>
				<img src="{{ asset('svg/map_icon.svg') }}" alt="customIcon" class="w-5 h-5">
			</div>
		</div>
		<form action="{{ route('onsen.filter') }}" method="GET">
			@csrf
			<div class="py-2 px-5 bg-white rounded-md rounded-t-none">
				<select name='area' onchange="this.form.submit()"
					class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
					<option value="" selected hidden>都道府県の選択</option>
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
		</form>

		<a href="{{ route('onsen_lists') }}"
			class="mt-3 py-3 px-5 border-b bg-white rounded-md block text-lg font-normal">
			すべての温泉を見る
		</a>
	</div>

	<div class="rounded-lg bg-gray-200 mt-5 p-7">
		<div class="text-left">
			<h2 class="mb-1 text-lg font-medium text-gray-900">レビュー検索</h2>
			<form action="/review_search" method="GET">
				@csrf
				<div class="mt-5 overflow-hidden bg-white border-none rounded-lg">
					<input
						class="w-full px-3 py-2 placeholder-gray-400 bg-transparent border-2 border-gray-200 rounded-lg focus:outline-none"
						type="text" name="keyword" id="keyword" placeholder="温泉名を入力">
				</div>

				<button type="submit"
					class="flex items-center justify-center w-full py-3 mt-5 text-md font-semibold tracking-widest text-white uppercase bg-orange-500 hover:bg-orange-600 rounded-lg">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
						stroke="currentColor" class="w-5 h-5 text-white dark:text-gray-600 mr-1">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
					</svg>
					検索
				</button>

			</form>
		</div>
	</div>
</div>