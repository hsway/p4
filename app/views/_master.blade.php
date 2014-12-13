<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Run Simple</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles/runsimple.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/datepicker.css') }}" />
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <div class="container">

        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">Run Simple</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li><a href='/run'>List runs</a></li>
                            <li><a href='/run/create'>Add a run</a></li>
                            <li><a href='/shoe'>List shoes</a></li>
                            <li><a href='/shoe/create'>Add shoes</a></li>
                            <li><a href='/logout'>Log out</a></li>
                        @else
                            <li><a href='/signup'>Sign up</a></li>
                            <li><a href='/login'>Log in</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::get('flash_message'))
            <div id="flash-div" class='alert alert-warning'>{{ Session::get('flash_message') }}</div>
        @endif

        @yield('content')

    </div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert-warning").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
</script>

<script>
    $('#date').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
</script>

@yield('scripts')

</body>
</html>