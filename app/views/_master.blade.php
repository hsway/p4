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
            <div class="navbar-header">
                <a href="/" class="navbar-brand">Home</a>
            </div>
        </nav>

        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>