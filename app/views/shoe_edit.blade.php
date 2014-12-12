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

		{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}

	<br>

	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['ShoeController@destroy', $shoe->id], 'id' => 'shoe_delete_form']) }}
		<a id="shoe_delete_button" class="btn btn-danger" href='#' data-trigger='focus'
		title='Are you sure? This will also delete all runs on these shoes.'>Delete Shoe</a>
	{{ Form::close() }}

@stop

@section('scripts')

<script type="text/javascript" src="/js/bootstrap-confirmation.js"></script>

<script type="text/javascript">
	$('#shoe_delete_button').confirmation({
		onConfirm: function() { $('#shoe_delete_form').submit() },
		onCancel: function() { return false; }
	});
</script>

@stop
