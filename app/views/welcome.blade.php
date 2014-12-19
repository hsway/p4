@extends('_master')

@section('content')

<div class="jumbotron">
  <div id="jumbo-text">
    <h1>Run. Record. Repeat.</h1>
	<p>Track your miles and your shoes in one place.</p>
	<p><a href="signup" class="btn btn-primary">Sign Up</a>&nbsp;<a href="login" class="btn btn-primary">Log In</a></p>
  </div>

  <div id="jumbo-image">
    <img src="{{ URL::asset('img/rs-small.png') }}" alt="Run Simple logo" id="logo">
  </div>
</div>

@stop