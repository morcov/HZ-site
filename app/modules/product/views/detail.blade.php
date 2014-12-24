@extends('master')

@section('content')
    <div class="form">
        <h3>Product "{{ $product->name }}"</h3>
        <p>
            <span>Name: </span>{{ $product->name }}
        </p>
    @if(!empty($product->name_en))
        <p>
            <span>Name EN: </span> {{ $product->name_en }}
        </p>
    @endif
    @if(!empty($product->name_ua))
        <p>
            <span>Name UA: </span> {{ $product->name_ua }}
        </p>
    @endif
    @if(!empty($product->year))
        <p>
            <span>Year: </span> {{ $product->year }}
        </p>
    @endif
    @if(!empty($product->time))
        <p>
            <span>Time: </span> {{ $product->time }}
        </p>
    @endif
    @if(!empty($product->series))
        <p>
            <span>Series: </span> {{ $product->series }}
        </p>
    @endif
    @if(!empty($product->description))
        <p>
            <span>Description: </span> {{ $product->description }}
        </p>
    @endif
        -----------------------------------------------
    @if($isLogin)
        <form class="form-comment">
            <p>
                <span>Comment: </span>
                <textarea name="comment"></textarea>
            <div class="error-message comment"></div>
            </p>
            <p><a href="#" id="send-comment">Add comment</a></p>
        </form>
    @endif
        <div class="comments"></div>
        -----------------------------------------------

        <p>{{ HTML::linkAction('ProductController@index', 'Back') }}</p>
    </div>
@stop

@section('javascript')
    <script>productID = {{ $product->id }};</script>
    {{ HTML::script('js/product/detail.js') }}
@stop