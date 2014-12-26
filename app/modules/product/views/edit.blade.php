@extends('master')

@section('title')
    Edit product {{ $input->name }}
@stop

@section('content')
    <form class="form" action="/product" method="PUT">
        <h3>Add product</h3>
        <p>
            <span>Name: </span>
            <input type="text" name="name" value="{{ $input->name }}">
        <div class="error-message name">{{ $errors->first('name'); }}</div>
        </p>
        <p>
            <span>Name EN: </span>
            <input type="text" name="name_en" value="{{ $input->name_en }}">
        <div class="error-message name_en">{{ $errors->first('name_en'); }}</div>
        </p>
        <p>
            <span>Name UA: </span>
            <input type="text" name="name_ua" value="{{ $input->name_ua }}">
        <div class="error-message name_ua">{{ $errors->first('name_ua'); }}</div>
        </p>
        <p>
            <span>Year: </span>
            <input type="text" name="year" value="{{ $input->year }}">
        <div class="error-message year">{{ $errors->first('year'); }}</div>
        </p>
        <p>
            <span>Time: </span>
            <input type="text" name="time" value="{{ $input->time }}">
        <div class="error-message time">{{ $errors->first('time'); }}</div>
        </p>
        <p>
            <span>Series: </span>
            <input type="text" name="series" value="{{ $input->series }}">
        <div class="error-message series">{{ $errors->first('series'); }}</div>
        </p>
        <p>
            <span>Description: </span>
            <textarea name="description">{{ $input->description }}</textarea>
        <div class="error-message description">{{ $errors->first('description'); }}</div>
        </p>

        <p><input type="submit" value="Edit"></p>
    </form>
@stop