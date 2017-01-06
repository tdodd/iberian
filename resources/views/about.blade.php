@section('title', 'About this Project')
@extends('layouts.master')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('header-text')
	@lang('messages.about')
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="blurb">
				
				<p>@lang('messages.blurb1')</p>
				<p>@lang('messages.blurb2')</p>

				<div class="text-center">
					<a href="{{ url('/') }}" class="btn btn-default" id="get-started">@lang('messages.get-started')</a>
				</div>

			</div>


		</div>
	</div>
</div>
@endsection