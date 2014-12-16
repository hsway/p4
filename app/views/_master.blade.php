<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Run Simple</title>
    <link rel="stylesheet" href="{{ asset('styles/bootswatch-journal.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/runsimple.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/datepicker.css') }}" />
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <div class="container">

        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a href="/" class="navbar-brand">Run Simple</a>
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">

              @if(Auth::check())

              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="/run" id="runs">Runs <span class="caret"></span></a>
                  <ul class="dropdown-menu" aria-labelledby="runs">
                    <li><a href="/run/create">Add Run</a></li>
                    <li><a href="/run">View Runs</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="/run" id="shoes">Shoes <span class="caret"></span></a>
                  <ul class="dropdown-menu" aria-labelledby="shoes">
                    <li><a href="/shoe/create">Add Shoes</a></li>
                    <li><a href="/shoe">View Shoes</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout">Logout</a></li>
              </ul>

              @else

              <ul class="nav navbar-nav">
                  <li><a href='/signup'>Sign Up</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href='/login'>Log In</a></li>
              </ul>

              @endif

            </div>
          </div>
        </div>

        @if(Session::get('warning_message'))
            <div id="warning-div" class='alert alert-danger'>{{ Session::get('warning_message') }}</div>
        @endif

        @if(Session::get('success_message'))
            <div id="success-div" class='alert alert-success'>{{ Session::get('success_message') }}</div>
        @endif

        @yield('content')

    </div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);

    window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
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