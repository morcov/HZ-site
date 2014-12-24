@extends('master')

@section('title')
    Test
@stop

@section('content')
    {{ Form::open(array('url'=>'form-submit','files'=>true)) }}

        {{ Form::label('file','File',array('id'=>'','class'=>'')) }}
        {{ Form::file('file','',array('id'=>'','class'=>'')) }}
        <br/>
        <!-- submit buttons -->
        {{ Form::submit('Save') }}

    {{ Form::close() }}
@stop