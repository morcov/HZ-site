@extends('master')

@section('title')
    {{ Lang::get('lang.Add product') }}
@stop

@section('content')
    <form class="form" action="/product" method="POST">
        <h3>{{ Lang::get('lang.Add product') }}</h3>
        <p>
            <span>{{ Lang::get('lang.Name') }}: </span>
            <input type="text" name="name" value="{{ Input::old('name') }}">
        <div class="error-message name">{{ $errors->first('name'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Name EN') }}: </span>
            <input type="text" name="name_en" value="{{ Input::old('name_en') }}">
        <div class="error-message name_en">{{ $errors->first('name_en'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Name UA') }}: </span>
            <input type="text" name="name_ua" value="{{ Input::old('name_ua') }}">
        <div class="error-message name_ua">{{ $errors->first('name_ua'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Year') }}: </span>
            <input type="text" name="year" value="{{ Input::old('year') }}">
        <div class="error-message year">{{ $errors->first('year'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Time') }}: </span>
            <input type="text" name="time" value="{{ Input::old('time') }}">
        <div class="error-message time">{{ $errors->first('time'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Series') }}: </span>
            <input type="text" name="series" value="{{ Input::old('series') }}">
        <div class="error-message series">{{ $errors->first('series'); }}</div>
        </p>
        <p>
            <span>{{ Lang::get('lang.Description') }}: </span>
            <textarea name="description">{{ Input::old('description') }}</textarea>
        <div class="error-message description">{{ $errors->first('description'); }}</div>
        </p>

        <p><input type="submit" value="{{ Lang::get('lang.Add') }}"></p>
        {{--<p><a href="#" id="send">Add</a></p>--}}
    </form>
@stop

@section('javascript')
{{--    {{ HTML::script('js/product/add.js') }}--}}
@stop