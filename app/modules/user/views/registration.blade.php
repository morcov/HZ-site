@extends('master')

@section('title')
    Registration
@stop

@section('content')
    <form class="form" action="/registration" method="POST">
        <h3>Registration</h3>
        <p>
            <span>Name: </span>
            <input type="text" name="name" value="{{ Input::old('name') }}">
        <div class="error-message name">{{ $errors->first('name'); }}</div>
        </p>
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
        <p>
            <span>Confirm password: </span>
            <input type="password" name="password_confirmation" value="{{ Input::old('password_confirmation') }}">
        <div class="error-message password_confirmation">{{ $errors->first('password_confirmation'); }}</div>
        </p>
        <p><input type="submit" value="Registration"></p>
        {{--<p><a href="#" id="send">Registration</a></p>--}}
    </form>
@stop

@section('javascript')
{{--    {{ HTML::script('js/user/registration.js') }}--}}
@stop