@extends('_master')

@section('content')

	<h2>Run index</h2>


	<a href='/run/create'>+ Add a new run</a>

	<br><br>

	@foreach($runs as $run)

		<div>
			<a href='/run/{{ $run->id }}'>{{ $run->date }}</a>
		</div>

	@endforeach

@stop