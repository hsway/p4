@extends('_master')

@section('content')

	{{ Form::model($shoe, ['method' => 'put', 'action' => ['ShoeController@update', $shoe->id]]) }}

		<h2>Update: {{ $shoe->name }}</h2>

		<div class='form-group'>

			{{-- Shoe name field. ---------------------------}}
		    {{ Form::label('name', 'Shoe name') }}
		    {{ Form::text('name') }}<br />

		    {{-- Purchase date field. -----------------------}}
		    {{ Form::label('purchase_date', 'Purchase date') }}
		    {{ Form::text('purchase_date') }} YYYY-MM-DD<br />

		    {{-- Total mileage field. -----------------------}}
		    {{ Form::label('mileage', 'Total mileage') }}
		    {{ Form::text('mileage') }}

		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['ShoeController@destroy', $shoe->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
		&nbsp; Caution! This will also delete any runs associated with these shoes.
	{{ Form::close() }}

@stop