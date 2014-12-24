@extends('master')

@section('content')
    <div class="content-blocks">
        @foreach($products as $product)
            <div class="block">
                <div class="photo">
                    <img src="http://i66.fastpic.ru/big/2014/1108/a6/0c676438ef23930b0a1e2884cd3354a6.jpg">
                </div>
                <div class="text">
                    <div><span>{{ HTML::linkAction('ProductController@detail', $product->name, $product->id) }}</span></div>
                    <div><span>info</span></div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="clear"></div>
    <div class="pagination-block">{{ $products->links() }}</div>
@stop