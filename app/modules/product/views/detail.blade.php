@extends('master')

@section('title')
    {{ Lang::get('lang.Product name', ['name' => $product->name]) }}
@stop

@section('content')
    <div class="form">
        <h3>{{ Lang::get('lang.Product name', ['name' => $product->name])  }}</h3><span>{{ HTML::link('/product/edit/'.$product->id, Lang::get('lang.Edit')) }}</span>
        <p>
            <span>{{ Lang::get('lang.Name') }}: </span>{{ $product->name }}
        </p>
    @if(!empty($product->name_en))
        <p>
            <span>{{ Lang::get('lang.Name EN') }}: </span> {{ $product->name_en }}
        </p>
    @endif
    @if(!empty($product->name_ua))
        <p>
            <span>{{ Lang::get('lang.Name UA') }}: </span> {{ $product->name_ua }}
        </p>
    @endif
    @if(!empty($product->year))
        <p>
            <span>{{ Lang::get('lang.Year') }}: </span> {{ $product->year }}
        </p>
    @endif
    @if(!empty($product->time))
        <p>
            <span>{{ Lang::get('lang.Time') }}: </span> {{ $product->time }}
        </p>
    @endif
    @if(!empty($product->series))
        <p>
            <span>{{ Lang::get('lang.Series') }}: </span> {{ $product->series }}
        </p>
    @endif
    @if(!empty($product->description))
        <p>
            <span>{{ Lang::get('lang.Description') }}: </span> {{ $product->description }}
        </p>
    @endif
        -----------------------------------------------
    @if($isLogin)
        <form class="form-comment">
            <p>
                <span>{{ Lang::get('lang.Comment') }}: </span>
                <textarea name="comment"></textarea>
            <div class="error-message comment"></div>
            </p>
            <p><a href="#" id="send-comment">{{ Lang::get('lang.Add comment') }}</a></p>
        </form>
    @endif
        <div class="comments">
            {{ $comments }}
        </div>
        -----------------------------------------------

        <p>{{ HTML::linkAction('ProductController@indexAction', Lang::get('lang.Back')) }}</p>
    </div>
@stop

@section('javascript')
    <script>productID = {{ $product->id }};</script>
    {{ HTML::script('js/product/detail.js') }}
@stop