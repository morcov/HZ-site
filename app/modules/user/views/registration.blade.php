@extends('master')

@section('content')
    <form class="form">
        <h3>Registration</h3>
        <p>
            <span>Name: </span>
            <input type="text" name="name">
        <div class="error-message name"></div>
        </p>
        <p>
            <span>Email: </span>
            <input type="text" name="email">
        <div class="error-message email"></div>
        </p>
        <p>
            <span>Password: </span>
            <input type="password" name="password">
        <div class="error-message password"></div>
        </p>
        <p>
            <span>Confirm password: </span>
            <input type="password" name="password_confirmation">
        <div class="error-message password_confirmation"></div>
        </p>
        <p><a href="#" id="send">Registration</a></p>
    </form>
@stop

@section('javascript')
    {{ HTML::script('js/user/registration.js') }}
@stop