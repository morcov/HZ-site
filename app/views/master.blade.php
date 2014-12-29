<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
    {{ HTML::style('css/style.css') }}
    @yield('css')

    {{ HTML::script('http://code.jquery.com/jquery-2.1.3.min.js') }}
    {{ HTML::script('js/common.js') }}
    @yield('javascript')
</head>

<body>
<div class="header">
    <div class="headerFirst">
        <div class="title">
            <h1>{{ HTML::link('/', 'HOME') }}</h1>
        </div>
        <div class="locale">
            {{ $locale }}
        </div>
        <div class="user-login">
            @if($isLogin)
                {{ Lang::get('lang.Hello user', ['name' => $currentUser->first_name]) }}!!! |
                {{ HTML::link('/logout', Lang::get('lang.Logout')) }}
            @else
                {{ HTML::link('/login', Lang::get('lang.Login')) }} |
                {{ HTML::link('/registration', Lang::get('lang.Registration')) }}
            @endif
        </div>
        <div class="menu">
            <span>{{ HTML::link('/', Lang::get('lang.Home')) }}</span> |
            <span>{{ HTML::link('/product/add', Lang::get('lang.Add product')) }}</span>
        </div>
    </div>
</div>
<div class="body">
    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>