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
                <h1>{{ HTML::linkAction('HomeController@index', 'HOME') }}</h1>
            </div>
            <div class="user-login">
                @if($isLogin)
                    Hello {{ $currentUser->first_name }}!!! |
                    {{ HTML::linkAction('UserController@logout', 'Logout') }}
                @else
                    {{ HTML::linkAction('UserController@login', 'Login') }} |
                    {{ HTML::linkAction('UserController@registration', 'Registration') }}
                @endif
            </div>
            <div class="menu">
                <span>{{ HTML::linkAction('HomeController@index', 'Home') }}</span> |
                <span>{{ HTML::linkAction('ProductController@add', 'Add product') }}</span>
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