@extends('layouts.master')

@section('title', 'Create a person')

@section('header-text', 'Create a person')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.standalone.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">        
        <div class="col-md-8 col-md-offset-2">

            {{-- Confirmation message after entering a user --}}

            @if (session('status'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
            @endif           

            <!-- Form panel -->
            @include('includes.searchformPOST')

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/create.js') }}"></script>
@endsection