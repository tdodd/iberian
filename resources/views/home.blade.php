@extends('layouts.master')

@section('styles')
    @@parent
    <link rel="stylesheet" href="css/dashboard.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

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

                <div class="panel-heading">Enter a new person..</div>

                <div class="panel-body">
                    <form method="post" action="{{ url('home') }}" class="form-inline" role="form">
                        {!! csrf_field() !!}

                        <p class="lead">Name</p>

                        <div class="form-group">
                            <label for="fName" class="sr-only">First Name</label>
                            <input type="text" name="fName" placeholder="First Name" class="form-control" value="{{ old('fName') }}">

                            <label for="mName" class="sr-only">Middle Name</label>
                            <input type="text" name="mName" placeholder="Middle Name" class="form-control" value="{{ old('mName') }}">

                            <label for="lName" class="sr-only">Last Name</label>
                            <input type="text" name="lName" placeholder="Last Name" class="form-control" value="{{ old('lName') }}">
                        </div>

                        <p class="lead">Dates</p>

                        <div class="form-group">
                            <label for="DoB" class="sr-only">Date of Birth</label>
                            <input type="text" name="DoB" placeholder="Date of Birth" class="form-control" value="{{ old('DoB') }}">

                            <label for="DoD" class="sr-only">Date of Death</label>
                            <input type="text" name="DoD" placeholder="Date of Death" class="form-control" value="{{ old('DoD') }}">
                        </div>

                        <p class="lead">Birthplace</p>

                        <div class="form-group">
                            <label for="birthCity" class="sr-only">Birth City</label>
                            <input type="text" name="birthCity" placeholder="Birth City" class="form-control" value="{{ old('birthCity') }}">

                            <label for="birthCountry" class="sr-only">Birth Country</label>
                            <input type="text" name="birthCountry" placeholder="Birth Country" class="form-control" value="{{ old('birthCountry') }}">
                        </div>

                        <p class="lead">Arrival</p>

                        <div class="form-group">
                            <label for="arrivalCity" class="sr-only">Arrival City</label>
                            <input type="text" name="arrivalCity" placeholder="City" class="form-control" value="{{ old('arrivalCity') }}">

                            <label for="arrivalCountry" class="sr-only">Arrival Country</label>
                            <input type="text" name="arrivalCountry" placeholder="Country" class="form-control" value="{{ old('arrivalCountry') }}">

                            <label for="arrivalDate" class="sr-only">Arrival Date</label>
                            <input type="text" name="arrivalDate" placeholder="Date of arrival" class="form-control" value="{{ old('arrivalDate') }}">
                        </div>

                        <p class="lead">Profession</p>

                        <div class="form-group">
                            <label for="profession" class="sr-only">Profession</label>
                            <input type="text" name="profession" placeholder="Profession" class="form-control" value="{{ old('profession') }}">
                        </div>

                        <p class="lead">Notes</p>

                        <div class="form-group">
                            <label for="notes" class="sr-only">Notes</label>
                            <textarea name="notes" cols="70" rows="5" class="form-control">{{ old('notes') }}</textarea>
                        </div>

                        <div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-default">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
