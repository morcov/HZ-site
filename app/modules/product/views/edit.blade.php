@extends('master')

@section('title')
    {{ Lang::get('lang.Edit product') }}
@stop

@section('content')

    <h3>{{ Lang::get('lang.Edit product') }}</h3>
    @include('product::_product_form', ['url' => '/product/'.$product->id.'/edit'])

@stop
