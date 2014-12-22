<!DOCTYPE html>
<html>
<head>
    <title>Site</title>
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
                <h1><a href="/">HOME</a></h1>
            </div>
            <div class="user-login">
                @if($isLogin)
                    Hello {{ $currentUser->first_name }}!!! |
                    <a href="/logout">Logout</a>
                @else
                    <a href="/login">Login</a> |
                    <a href="/registration">Registration</a>
                @endif
            </div>
            <div class="menu">
                <span><a href="/">Home</a></span> |
                <span><a href="/product/add">Add product</a></span>
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