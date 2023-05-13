@extends('layouts.app1')

@section('profile-link')
@endsection

@section('modal-profile-link')
@endsection

@section('content')

<body>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('プロフィールの編集') }}
		</h2>
	</x-slot>

	<div class="pt-16 pb-8 px-3 md:px-0">
		<div class="md:px-8 md:justify-center md:flex">
			<div class="p-6 sm:p-8 shadow rounded-lg mx-3 mb-10 bg-gray-200">
				<div class="max-w-xl">
					@include('profile.partials.update-profile-information-form')
				</div>
			</div>

			<div class="p-6 sm:p-8 shadow rounded-lg mx-3 mb-10 bg-gray-200">
				<div class="max-w-xl">
					@include('profile.partials.update-password-form')
				</div>
			</div>

			<div class="p-6 sm:p-8 shadow rounded-lg mx-3 mb-10 bg-gray-200">
				<div class="max-w-xl">
					@include('profile.partials.delete-user-form')
				</div>
			</div>
		</div>
	</div>
</body>

@endsection