@section('title', 'Advanced search')
@extends('layouts.master')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/start.css') }}">
@endsection

@section('header-text')
	@lang('messages.advanced-search-header')
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			@include('includes.searchform-advanced')

		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/create.js') }}"></script>
@endsection