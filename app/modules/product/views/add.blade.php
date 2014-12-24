@extends('master')

@section('content')
    <form class="form">
        <h3>Add product</h3>
        <p>
            <span>Name: </span>
            <input type="text" name="name">
        <div class="error-message name"></div>
        </p>
        <p>
            <span>Name EN: </span>
            <input type="text" name="name_en">
        <div class="error-message name_en"></div>
        </p>
        <p>
            <span>Name UA: </span>
            <input type="text" name="name_ua">
        <div class="error-message name_ua"></div>
        </p>
        <p>
            <span>Year: </span>
            <input type="text" name="year">
        <div class="error-message year"></div>
        </p>
        <p>
            <span>Time: </span>
            <input type="text" name="time">
        <div class="error-message time"></div>
        </p>
        <p>
            <span>Series: </span>
            <input type="text" name="series">
        <div class="error-message series"></div>
        </p>
        <p>
            <span>Description: </span>
            <textarea name="description"></textarea>
        <div class="error-message description"></div>
        </p>

        <p><a href="#" id="send">Add</a></p>
    </form>
@stop

@section('javascript')
    {{ HTML::script('js/product/add.js') }}
@stop