@section('title', 'Search Results')
@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

@section('header-text')
    @lang('messages.search-header')
@endsection

@section('content')
<div class="container">

    <!-- Search Again Button -->

    <div class="row text-center search-again">
        <div class="col-md-8 col-md-offset-2">
    
            <button
                class="btn btn-primary"
                type="button"
                data-toggle="collapse"
                data-target="#search-form"
                aria-expanded="false"
                aria-controls="search-form">@lang('messages.search-again')
            </button>

            <div class="collapse" id="search-form">
                @include('includes.searchform-advanced')
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    
            <hr>

            <!-- Search Results -->
            @if (!empty($results) AND !$empty) {{-- Rows are found --}}
            <table class="col-md-12 table table-striped">

                <thead>
                    <tr>
                        <th><h4>#</h4></th>
                        <th><h4>@lang('messages.results-table')</h4></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($results as $index => $currentPerson)
                        <tr>
                            <td><h5>{{ $index }}</h5></td>
                            <td>
                                <a href="{{ route('person.show', $currentPerson->id) }}">
                                    <h5>{{ $currentPerson->fName }}  {{ $currentPerson->lName }}</h5>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            @else {{-- No rows are found --}}
                <h2>@lang('messages.no-results')</h2>
            @endif

        </div>
    </div>
    
</div>
@endsection

@section('bootstrap-js')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@endsection