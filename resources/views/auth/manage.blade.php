@extends('layouts.master')

@section('title', 'Manage users')

@section('styles')
    @@parent
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('header-text', 'Manage Users')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <!-- Confirmation message after entering a user -->
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form class="panel" method="POST" action="{{ route('user.store') }}">

                {!! csrf_field() !!}

                <h3 class="text-center" id="create-header">Create a new user</h3>        

                <!-- Username Input -->
                <div class="row {{ $errors->has('username') ? ' has-error' : '' }}">

                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Username">

                    @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif

                </div>

                <!-- Password Input -->
                <div class="row {{ $errors->has('password') ? ' has-error' : '' }}">

                    <input type="password" name="password" class="form-control" placeholder="Password">

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                </div>

                <!-- Password Confirm -->
                <div class="row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif

                </div>

                <!-- Administrator radio button -->
                <div class="row">

                    <label>Administrator:</label>

                    <label class="radio-inline"><input type="radio" name="is_admin" value="1">Yes</label>
                    <label class="radio-inline"><input type="radio" name="is_admin" value="0" checked>No</label>

                </div>

                <!-- Add User Button -->
                <div class="row text-center">
                    <button type="submit" class="btn btn-primary" id="add-button">Add User</button>
                </div>

            </form>

            <!-- Users table -->
            <table class="col-md-12 table table-striped">

                <thead>
                    <tr>
                        <th class="text-center">Username</th>
                        <th class="text-center">Administrator</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        
                    <tr>
                        <td class="text-center">{{ $user->username }}</td>
                        <td class="text-center">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                        <td>
                        @if($user->username != Auth::user()->username)
                            <!-- Delete Form -->
                            <form class="deleteForm" method="POST" action="{{ route('user.destroy', $user->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn-delete" value="delete">
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/confirm.js') }}"></script>
@endsection