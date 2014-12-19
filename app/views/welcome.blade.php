@extends('_master')

@section('content')


<!-- <div class="jumbotron" style="overflow:hidden;">

	<div style="float:left;max-width:70%;display:inline-block;">
		<h1>Run. Record. Repeat.</h1>
		<p>Track your miles and your shoes in one place.</p>
	</div>
	
	<img src="{{ URL::asset('img/rs-small.png') }}" alt="Run Simple logo" id="logo">

</div> -->

<div class="jumbotron">
  <div id="jumbo-text">
    <h1>Run. Record. Repeat.</h1>
	<p>Track your miles and your shoes in one place.</p>
  </div>

  <div id="jumbo-image">
    <img src="{{ URL::asset('img/rs-small.png') }}" alt="Run Simple logo" id="logo">
  </div>
</div>


<!-- http://stackoverflow.com/questions/26979512/css-placing-two-side-by-side-divs-on-the-same-height -->

@stop