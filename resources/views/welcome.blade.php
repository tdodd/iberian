@section('title', 'Homepage')
@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
<div class="page-content">

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="overlay">
			
				<h4>@lang('messages.instructions')</h4>

				<!-- Search form -->
				<form method="POST" action="{{ route('search') }}" role="form">
					<div class="form-group search-container">

						<input type="text" name="q" class="form-control search-main" placeholder="{{ trans('messages.search-text') }}">
						<button type"submit" class="glyphicon glyphicon-search"></button>

					</div>
				</form>

				<a href="advanced" id="advanced-search">@lang('messages.advanced-search')</a>

			</div>
		</div>
	</div>
</div>

</div>

<footer class="footer">@lang('messages.footer')</footer>

@endsection

@section('scripts')
<script>
	$(document).ready(function() {

		// Fade in overlay content.
		$('.overlay').fadeIn('slow');

	});
</script>
@endsection