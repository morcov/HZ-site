@extends('master')

@section('content')
    @for($i=0; $i<20; $i++)
        <div class="block">
            <div class="photo">
                <img src="http://i66.fastpic.ru/big/2014/1108/a6/0c676438ef23930b0a1e2884cd3354a6.jpg">
            </div>
            <div class="text">
                <div><span><a href="#">Name</a></span></div>
                <div><span>info</span></div>
            </div>
        </div>
    @endfor
@stop