@extends('_master')

@section('content')

<h1>Create a Run form</h1>

@foreach($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('action' => 'RunController@store')) }}

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
    {{ Form::select('shoe_id', $shoes->lists('name','id')) }}<br />

    {{-- Form submit button. ---------------}}
    {{ Form::submit('Add run') }}

{{ Form::close() }}

@stop