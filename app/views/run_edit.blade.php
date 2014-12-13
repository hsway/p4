@extends('_master')

@section('content')

	{{ Form::model($run, ['method' => 'put', 'action' => ['RunController@update', $run->id]]) }}

		<h2>Update: Run on {{ $run->date }}</h2>

		@foreach($errors->all() as $message)
	        <div class='error'>{{ $message }}</div>
	    @endforeach

		<div class='form-group'>

			    {{-- Date field. -----------------------}}
			    {{ Form::label('date', 'Date') }}
			    <input id="date" name="date" type="text" value="{{ $run->date }}"> YYYY-MM-DD<br />

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

		{{ Form::submit('Update', array('class' => "btn btn-primary", 'id' => 'run_update_button')) }}

	{{ Form::close() }}

	<br>

	{{---- DELETE -----}}
	{{ Form::open(['action' => ['RunController@destroy', $run->id], 'id' => 'run_delete_form']) }}
		<input type="hidden" value="DELETE" name="_method" id="run_delete_method">
		<a id="run_delete_button" class="btn btn-danger" href='#' data-trigger="focus">Delete Run</a>
	{{ Form::close() }}

@stop

@section('scripts')

<script type="text/javascript" src="/js/bootstrap-confirmation.js"></script>

<script type="text/javascript">
	$('#run_delete_button').confirmation({
		onConfirm: function() { $('#run_delete_form').submit() },
		onCancel: function() { return false; }
	});

	$('#run_update_button').click(function() {
		'#run_delete_method'.val('DELETE');
	});
</script>

@stop
