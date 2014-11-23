<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Run Simple</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles/runsimple.css') }}" />
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">Home</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li><a href='/shoe'>List shoes</a></li>
                            <li><a href='/shoe/create'>Add shoes</a></li>
                            <li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
                        @else
                            <li><a href='/signup'>Sign up</a></li>
                            <li><a href='/login'>Log in</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif

        @yield('content')

    </div>

</body>
</html>