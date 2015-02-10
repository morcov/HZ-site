@if(empty($product))
    {{ Form::open(['class' => 'form', 'url' => $url, 'method' => 'POST']) }}
@else
    {{ Form::model($product, ['class' => 'form', 'url' => $url, 'method' => 'POST']) }}
@endif
        <p>
            <span>{{ Form::label('name', Lang::get('lang.Name')) }}: </span>
            {{ Form::text('name') }}
        <div class="error-message name">{{ $errors->first('name'); }}</div>
        </p>
        <p>
            <span>{{ Form::label('name_en', Lang::get('lang.Name EN')) }}: </span>
            {{ Form::text('name_en') }}
        <div class="error-message name_en">{{ $errors->first('name_en'); }}</div>
        </p>
        <p>
            <span>{{ Form::label('name_ua', Lang::get('lang.Name UA')) }}: </span>
            {{ Form::text('name_ua') }}
        <div class="error-message name_ua">{{ $errors->first('name_ua'); }}</div>
        </p>
        <p>
            <span>{{ Form::label('year') }}: </span>
            {{ Form::text('year') }}
        <div class="error-message year">{{ $errors->first('year'); }}</div>
        </p>
        <p>
            <span>{{ Form::label('time', Lang::get('lang.Time')) }}: </span>
            {{ Form::text('time') }}
        <div class="error-message time">{{ $errors->first('time'); }}</div>
        </p>
        <p>
            <span>{{ Form::label('series', Lang::get('lang.Series')) }}: </span>
            {{ Form::text('series') }}
        <div class="error-message series">{{ $errors->first('series'); }}</div>
        </p>
        <p>
            <span>{{ Form::label('description', Lang::get('lang.Description')) }}: </span>
            {{ Form::textarea('description') }}
        <div class="error-message description">{{ $errors->first('description'); }}</div>
        </p>

        <p>{{ Form::submit() }}</p>
    {{ Form::close() }}