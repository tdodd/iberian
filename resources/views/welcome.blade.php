@extends('layouts.master')

@section('styles')
    @@parent
    <link rel="stylesheet" href="css/dashboard.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Search the Iberian Database!</div>

                    <div class="panel-body">
                        {{-- Include the GET search form --}}
                        @include('includes.searchformGET')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
