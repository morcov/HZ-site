@extends('master')

@section('title')
    {{ Lang::get('lang.Registration') }}
@stop

@section('content')
    <form class="form" action="/registration" method="POST">
        <h3>{{ Lang::get('lang.Registration') }}</h3>
        <p>
            <span>{{ Lang::get('lang.Name') }}: </span>
            <input type="text" name="name" value="{{ Input::old('name') }}">
        <div class="error-message name">{{ $errors->first('name'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Email') }}: </span>
            <input type="text" name="email" value="{{ Input::old('email') }}">
        <div class="error-message email">{{ $errors->first('email'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Password') }}: </span>
            <input type="password" name="password" value="{{ Input::old('password') }}">
        <div class="error-message password">{{ $errors->first('password'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Confirm password') }}: </span>
            <input type="password" name="password_confirmation" value="{{ Input::old('password_confirmation') }}">
        <div class="error-message password_confirmation">{{ $errors->first('password_confirmation'); }}</div>
        </p>
        <p><input type="submit" value="{{ Lang::get('lang.Registration') }}"></p>
        {{--<p><a href="#" id="send">Registration</a></p>--}}
    </form>
@stop

@section('javascript')
{{--    {{ HTML::script('js/user/registration.js') }}--}}
@stop