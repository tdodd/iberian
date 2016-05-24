@extends('layouts.master')

@section('content')
    <div class="container">
            <table class="col-md-12 table table-striped search-results">

                <!-- Table header -->

                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th><p>{{ $column }}</p></th>
                        @endforeach
                    </tr>
                </thead>

                <!-- Table body for each row retrieved -->

                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            @foreach ($columns as $column)
                                <td>{{ $person->$column }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>

        </table>
    </div>
@endsection