@extends('_master')

@section('content')

	<h2>Run on: {{ $run->date }}</h2>

	<div>
	Created: {{ $run->created_at }}
	</div>

	<div>
	Last Updated: {{ $run->updated_at }}
	</div>

	<div>
	Mileage: {{ $run->mileage }}
	</div>

	<div>
	Notes: {{ $run->notes }}
	</div>

	<div>
	Shoe: {{ Shoe::find($run->shoe_id)->name }}
	</div>

	{{---- Edit ----}}
	<a href='/run/{{ $run->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['RunController@destroy', $run->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop