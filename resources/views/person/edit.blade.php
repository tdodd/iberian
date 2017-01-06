@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('title')
    Editing {{ $attributes['fName'].' '.$attributes['lName'] }}
@endsection

@section('header-text')
    Editing {{ $attributes['fName'].' '.$attributes['lName'] }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            {{-- Confimation message --}}

            @if (session('status'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">

                <li role="presentation" class="active">
                    <a href="#info" aria-controls="info" role="tab" data-toggle="tab">Information</a>
                </li>

                <li role="presentation">
                    <a href="#relationships" aria-controls="relationships" role="tab" data-toggle="tab">Relationships</a>
                </li>

                <li role="presentation">
                    <a href="#sources" aria-controls="sources" role="tab" data-toggle="tab">Sources</a>
                </li>

            </ul> <!-- End Nav tabs -->

            <!-- Tab content -->
            <div class="tab-content">

                <!-- Information Tab -->
                <div role="tabpanel" class="tab-pane fade in active" id="info">
                    @include('includes.edit-info')
                </div>
                
                <!-- Relationship Tab -->
                <div role="tabpanel" class="tab-pane fade" id="relationships">
                    @include('includes.edit-relations')
                </div>
                
                <!-- Sources Tab -->
                <div role="tabpanel" class="tab-pane fade" id="sources">                 
                    @include('includes.edit-source')
                </div>
           
            </div> <!-- End tab content -->    

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/edit.js') }}"></script>
<script src="{{ asset('js/confirm.js') }}"></script>
<script src="{{ asset('js/label.js') }}"></script>
@endsection