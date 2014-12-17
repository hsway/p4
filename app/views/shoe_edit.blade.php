@extends('_master')

@section('content')

	<h2>Update: {{ $shoe->name }}</h2>

	<br>

	@foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach

	{{ Form::model($shoe, ['method' => 'put', 'action' => ['ShoeController@update', $shoe->id]]) }}

		<div class="form-group">
		{{-- Shoe name field. ---------------------------}}
	    {{ Form::label('name', 'Shoe name') }}
	    <input class="form-control" id="name" name="name" type="text" value="{{ $shoe->name }}">
	    </div>

	    <div class="form-group">
	    {{-- Purchase date field. -----------------------}}
	    {{ Form::label('purchase_date', 'Purchase date') }}
	    <input class="form-control" id="date" name="purchase_date" type="text" value="{{ $shoe->purchase_date }}">
	    </div>

	    <div class="form-group">
	    {{-- Total mileage field. -----------------------}}
	    {{ Form::label('mileage', 'Total mileage') }}
	    <input class="form-control" id="mileage" name="mileage" type="text" value="{{ $shoe->mileage }}">
	    </div>

		{{ Form::submit('Update', array('class' => 'btn btn-primary', 'id' => 'shoe_update_button')) }}

	{{ Form::close() }}

	<br>

	{{---- DELETE -----}}
	{{ Form::open(['action' => ['ShoeController@destroy', $shoe->id], 'id' => 'shoe_delete_form']) }}
		<input type="hidden" value="DELETE" name="_method" id="shoe_delete_method">
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

	$('#shoe_update_button').click(function() {
		'#shoe_delete_method'.val('DELETE');
	});
</script>

@stop
