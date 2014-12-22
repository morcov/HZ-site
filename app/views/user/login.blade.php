@extends('master')

@section('content')
    <form class="form">
        <h3>Login</h3>
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
        <p><a href="#" id="send">Login</a></p>
    </form>
@stop

@section('javascript')
    {{ HTML::script('js/user/login.js') }}
@stop