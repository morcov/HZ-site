@extends('master')

@section('title')
    {{ Lang::get('lang.Add product') }}
@stop

@section('content')

    <h3>{{ Lang::get('lang.Add product') }}</h3>
    @include('product::_product_form', ['url' => '/product/add'])

@stop

@section('javascript')
    {{--    {{ HTML::script('js/product/add.js') }}--}}
@stop