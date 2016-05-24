@extends('layouts.master')

@section('styles')
    @@parent
    <link rel="stylesheet" href="css/search.css">
@endsection

@section('content')
    <div class="container">

        <div class="row" id="header">

            <h1 class="bottom-left">Search results:</h1>

            <button class="btn btn-default bottom-right" type="button" data-toggle="collapse"
                    data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                Search again
            </button>

        </div>

        <hr><div class="clearfix"></div>

        <!-- Search Again -->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="collapse" id="collapseExample">
                    <div class="well">
                        {{-- Include the GET search form --}}
                        @include('includes.searchformGET')
                    </div>
                </div>

                <!-- Search Results -->

                @if (!$empty) {{-- Rows are found --}}
                <table class="col-md-12 table table-striped search-results">

                    <thead>
                        <tr>
                            <th><h4>#</h4></th>
                            <th><h4>Name</h4></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($results as $index => $currentPerson)
                            <tr>
                                <td><h5>{{ $index }}</h5></td>
                                <td><a href="#"><h5>{{ $currentPerson->fName }}  {{ $currentPerson->lName }}</h5></a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                @else {{-- No rows are found --}}
                    <h2>No results found.</h2>
                @endif

            </div>
        </div>
    </div>
@endsection