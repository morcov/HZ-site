@extends('master')

@section('title')
    Login
@stop

@section('content')
    <form class="form" action="/login" method="POST">
        <h3>Login</h3>
        <p>
            <span>Email: </span>
            <input type="text" name="email" value="{{ Input::old('email') }}">
            <div class="error-message email">{{ $errors->first('email'); }}</div>
        </p>
        <p>
            <span>Password: </span>
            <input type="password" name="password" value="{{ Input::old('password') }}">
            <div class="error-message password">{{ $errors->first('password'); }}</div>
        </p>
        <p><input type="submit" value="Login"></p>
        {{--<p><a href="#" id="send">Login</a></p>--}}
    </form>
@stop

@section('javascript')
{{--    {{ HTML::script('js/user/login.js') }}--}}
@stop