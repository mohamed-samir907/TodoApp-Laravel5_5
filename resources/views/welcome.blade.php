@extends('layout')

@section('content')

<div class="row">
    <h1 class="center" style="margin-bottom: 30px;">Todo App</h1>
    <div class="center-margin w-500">
        <div class="card">
            <div class="card-content">
                <h3 class="center">Login</h3>
                <form id="login-form" method="POST" action="{{ route('login') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" name="email" class="validate{{  $errors->has('email') ? ' invalid' : ''  }}" value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @if ($errors->has('email'))
                            <span class="helper-text" data-error="{{ $errors->first('email') }}" data-success="right">
                            </span>
                            @endif
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate" required="true">
                            <label for="password">Password</label>
                            @if ($errors->has('email'))
                            <span class="helper-text" data-error="{{ $errors->first('password') }}" data-success="right">
                            </span>
                            @endif
                        </div>
                        <div class="input-field col s12" style="height: 50px">
                            <label>
                                <input type="checkbox" {{ old('remember') ? 'checked' : '' }} />
                                <span>Remember me</span>
                            </label>
                        </div>
                        <div class="col s12 center">
                            <button class="btn waves-effect waves-light" type="submit">Login</button>
                        </div>
                        <div class="col s12 center" style="margin-top: 20px;">
                            OR <a href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-action center">
                <a href="{{ route('password.request') }}">Forget Your Password?</a>
            </div>
        </div>
    </div>
</div>
@endsection