@extends('_master')

@section('content')

	{{ Form::model($run, ['method' => 'put', 'action' => ['RunController@update', $run->id]]) }}

		<h2>Update: Run on {{ $run->date }}</h2>

		<div class='form-group'>

			    {{-- Date field. -----------------------}}
			    {{ Form::label('date', 'Date') }}
			    {{ Form::text('date') }} YYYY-MM-DD<br />

			    {{-- Mileage field. --------------------}}
			    {{ Form::label('mileage', 'Mileage') }}
			    {{ Form::text('mileage') }}<br />

			    {{-- Notes field. ----------------------}}
			    {{ Form::label('notes', 'Notes') }}
			    {{ Form::textarea('notes') }}<br />

			    {{-- Shoe dropdown. --------------------}}
			    {{ Form::label('shoe_id', 'Shoe you ran in') }}
			    {{ Form::select('shoe_id', $shoes->lists('name','id')) }}

		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['RunController@destroy', $run->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop