@section('title', 'View Person')
@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('header-text')
    {{ $attributes['fName'] . ' ' . $attributes['mName'] . ' ' . $attributes['lName'] }}

    @if ($attributes['alias'] != '')
        <h2 class="text-center alias">({{ $attributes['alias'] }})</h2>
    @endif
@endsection

@section('content')

{{--  Confirmation message after making changes to a person --}}
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row">        
        <div class="col-md-6 col-md-offset-3">

            <!-- Tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active">
                    <a href="#info" aria-controls="info" role="tab" data-toggle="tab">@lang('messages.information-tab')</a>
                </li>
                <li role="presentation">
                    <a href="#relations" aria-controls="relations" role="tab" data-toggle="tab">@lang('messages.relation-tab')</a>
                </li>
                <li role="presentation">
                    <a href="#sources" aria-controls="sources" role="tab" data-toggle="tab">@lang('messages.source-tab')</a>
                </li>
           
            </ul>

            <!-- Tab content -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane fade in active" id="info">
                    @include('includes.info-tab')
                </div>
                
                <div role="tabpanel" class="tab-pane fade" id="relations">
                    @include('includes.relations-tab')
                </div>

                <div role="tabpanel" class="tab-pane fade" id="sources">
                    @include('includes.sources-tab')                    
                </div>

            </div>

        </div>
    </div>
</div>
@endsection