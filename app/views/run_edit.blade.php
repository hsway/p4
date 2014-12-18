@extends('_master')

@section('content')

<h2>Update: Run on {{ $run->date }}</h2>

<br>

	{{ Form::model($run, ['method' => 'put', 'action' => ['RunController@update', $run->id]]) }}

	    <div class="form-group">
	    {{-- Date field. -----------------------}}
	    {{ Form::label('date', 'Date') }}
	    <input class="form-control" id="date" name="date" type="text" value="{{ $run->date }}">
	    </div>

	    @if($errors->has('date'))
            <div class='error'>{{ $errors->first('date') }}</div><br>
        @endif

	    <div class="form-group">
	    {{-- Mileage field. --------------------}}
	    {{ Form::label('mileage', 'Mileage') }}
	    <input class="form-control" name="mileage" type="text" value="{{ $run->mileage }}">
	    </div>

	    @if($errors->has('mileage'))
            <div class='error'>{{ $errors->first('mileage') }}</div><br>
        @endif

	    <div class="form-group">
	    {{-- Shoe dropdown. --------------------}}
	    {{ Form::label('shoe_id', 'Shoe you ran in') }}<br>
	    {{ Form::select('shoe_id', $shoes->lists('name','id')) }}
	    </div>

	    <div class="form-group">
	    {{-- Notes field. ----------------------}}
	    {{ Form::label('notes', 'Notes') }}
	    <input class="form-control" name="notes" type="textarea" value="{{ $run->notes }}">
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
