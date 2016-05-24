@extends('layouts.master')

@section('styles')
    @@parent
    <link rel="stylesheet" href="css/dashboard.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Confirmation message after entering a user -->

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Display errors if any -->

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default">

                    <div class="panel-heading"><h4>Enter a new person..</h4></div>

                    <div class="panel-body">
                        @include('includes.searchformPOST')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
