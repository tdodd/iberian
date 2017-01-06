@extends('layouts.master')

@section('title', 'Login')

@section('header-text', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <!-- Login error message -->

            @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
            @endif

            <form class="panel" role="form" method="POST" action="{{ url('login') }}">

                {!! csrf_field() !!}

                <!-- Username Input -->

                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                    <div class="col-md-12">

                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <!-- Password Input -->

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">

                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>

                <!-- Login Button -->

                <div class="text-center">

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i>Login
                    </button>

                </div>

            </form>

            <!-- End panel -->

        </div>
    </div>
</div>
@endsection
