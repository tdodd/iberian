@extends('layouts.master')

@section('title', 'Browse People')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/browse.css') }}">
@endsection

@section('header-text', 'Browse')

@section('content')

{{--  Confirmation message after making changes to a person --}}

<div class="container">

    <!-- Search Button -->
    <div class="row search-row">
        
        <button class="btn btn-primary" 
            type="button" 
            data-toggle="collapse" 
            data-target="#search-hidden" 
            aria-expanded="false" 
            aria-controls="search-hidden">
            Refine Results
        </button>
    
    </div>

    <!-- Refine Search Form -->

    <div class="collapse col-md-8 col-md-offset-2" id="search-hidden">
        <div class="search-hidden">
            @include('includes.search-browse')            
        </div>
    </div>

    {{-- Check that search is valid --}}
    @if (!empty($people) AND count($people) > 0)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @if (session('status'))
            <div class="alert alert-dismissible alert-success text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
            @endif

            <table class="table table-striped">

                <!-- Table Header -->

                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th data-field="{{ $column }}">{{ translate($column) }}</th>
                        @endforeach
                    </tr>
                </thead>

                <!-- Table row for each person retrieved -->

                <tbody>
                @foreach ($people as $person)
                <tr>

                    @foreach ($columns as $column)
                        @if ($column == 'id') {{-- Link to profile --}}
                            <td><a href="{{ route('person.show', $person->$column) }}">{{ $person->$column }}</a></td>
                        @else
                            <td>{{ $person->$column }}</td>
                        @endif
                    @endforeach
                    
                    <td>
                        <a href="{{ route('person.edit', $person->id) }}">edit</a>
                    </td>
                    
                    <td>                    
                        <form method="POST" action="{{ route('person.destroy', $person->id) }}" class="deleteForm">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn-delete" value="delete">
                        </form>
                    </td>

                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    @else
    <div class="col-md-8 col-md-offset-2">
        <h2>No results.</h2>
    </div>
    @endif

</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/confirm.js') }}"></script>
@endsection