@extends('layouts.master')

@section('title', 'Logged in')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2 alert alert-success">

        <h1 id="logged-in">Logged in as {{ Auth::user()->username }}</h1>

    </div>
</div>
@endsection
