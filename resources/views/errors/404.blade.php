@extends('layouts.master')

@Section('title', 'Page not found')

@section('styles')
    @@parent
    <style>
        .sadface { font-size: 15em; }
    </style>
@endsection

@section('content')
<div class="container text-center">

    <h1>@lang('messages.not-found')</h1>

    <div class="sadface">&#9785;</div>

    <h2>
        <a href="{{ url('/') }}">@lang('messages.return-homepage')</a>
    </h2>

</div>
@endsection