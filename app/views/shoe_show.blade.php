@extends('_master')

@section('content')

	<h2>Shoe: {{ $shoe->name }}</h2>

	<div>
	Created: {{ $shoe->created_at }}
	</div>

	<div>
	Last Updated: {{ $shoe->updated_at }}
	</div>

	<div>
	Purchase Date: {{ $shoe->purchase_date }}
	</div>

	<div>
	Mileage: {{ $shoe->mileage }}
	</div>

	{{---- Edit ----}}
	<a href='/shoe/{{ $shoe->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['ShoeController@destroy', $shoe->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
		&nbsp; Caution! This will also delete any runs associated with these shoes.
	{{ Form::close() }}

	<br />

	@if ($runs->isEmpty())

		<p>You haven't yet logged any runs in these shoes.</p>

	@else

		<h3>Recent runs in these shoes:</h3>

		<div>
		@foreach($runs as $run)

			<a href='/run/{{ $run->id }}'>{{ $run->date }}</a><br />

		@endforeach
		</div>

	@endif

@stop