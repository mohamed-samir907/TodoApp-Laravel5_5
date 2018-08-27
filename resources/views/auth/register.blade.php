@extends('layout')

@section('content')
@section('home')
<a href="{{ url('/') }}" class=""><i class="material-icons md-36">home</i></a>
@endsection
<div class="row">
    <h1 class="center" style="margin-bottom: 30px;">Todo App</h1>
    <div class="center-margin w-500">
        <div class="card">
            <div class="card-content">
                <h3 class="center">Register</h3>
                <form method="POST" action="{{ route('register') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="input-field col s12{{ $errors->has('name') ? ' invalid' : '' }}">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            <label for="name">Name</label>
                            @if ($errors->has('name'))
                                <span class="helper-text" data-error="{{ $errors->first('name') }}"
                                 data-success="right">
                                </span>
                            @endif
                        </div>
                        <div class="input-field col s12{{ $errors->has('email') ? ' invalid' : '' }}">
                            <input id="email" type="email" class="{{ $errors->has('email') ? ' invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email">Email</label>
                            @if ($errors->has('email'))
                                <span class="helper-text" data-error="{{ $errors->first('email') }}"
                                 data-success="right">
                                </span>
                            @endif
                        </div>
                        <div class="input-field col s12{{ $errors->has('password') ? ' invalid' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" required>
                            <label for="password">Password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-field col s12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            <label for="password-confirm">Confirm Password</label>
                        </div>
                        <div class="col s12 center">
                            <button class="btn waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
