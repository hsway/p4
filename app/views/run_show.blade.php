@extends('_master')

@section('content')

	<h2>Run on {{ $run->date }}</h2>

	<div class="row">
		<div class="col-md-2 heading">Mileage:</div>
		<div class="col-md-10">{{ $run->mileage }}</div>
	</div>

	<div class="row">
		<div class="col-md-2 heading">Shoe:</div>
		<div class="col-md-10"><a href="/shoe/{{ $run->shoe->id }}">{{ $run->shoe->name }}</a></div>
	</div>

	<div class="row">
		<div class="col-md-2 heading">Notes:</div>
		<div class="col-md-10">{{ $run->notes }}</div>
	</div>

	<div class="row">
		<div class="col-md-2 heading">Created:</div>
		<div class="col-md-10">{{ $run->created_at }}</div>
	</div>

	<div class="row">
		<div class="col-md-2 heading">Last Updated:</div>
		<div class="col-md-10">{{ $run->updated_at }}</div>
	</div>

	{{---- Edit ----}}
	
	<br>

	<p><a class="btn btn-success" href='/run/{{ $run->id }}/edit'>Edit/Delete</a></p>

@stop