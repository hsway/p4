@extends('_master')

@section('content')

	<h2>Shoe index</h2>


	<a href='/shoe/create'>+ Add a new shoe</a>

	<br><br>

	@foreach($shoes as $shoe)

		<div>
			<a href='/shoe/{{ $shoe->id }}'>{{ $shoe->name }}</a>
		</div>

	@endforeach

@stop