@extends('_master')

@section('content')

<div id="home-wrapper">
<div id="home-jumbo" class="jumbotron">

	<h1>Run. Record. Repeat.</h1>

	<p>Track your miles and your shoes in one place.</p>

	<img src="{{ URL::asset('img/rs-small.png') }}" alt="Run Simple logo" id="logo">

</div>
</div>

<!-- http://stackoverflow.com/questions/26979512/css-placing-two-side-by-side-divs-on-the-same-height -->

@stop