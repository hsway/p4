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

@stop