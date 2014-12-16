@extends('_master')

@section('content')

<h2>Add a Run</h2>

@if ($shoes->isEmpty())

    <p>You haven't added any shoes yet. <a href="/shoe/create">Add a pair first</a>, then come back here to log some runs.</p>

@else

    @foreach($errors->all() as $message)
        <div class='error'>{{ $message }}</div>
    @endforeach

    {{ Form::open(array('action' => 'RunController@store')) }}

        {{-- Date field. -----------------------}}
        {{ Form::label('date', 'Date') }}
        {{ Form::text('date', '', array('id' => 'date')) }} YYYY-MM-DD<br />

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
        {{ Form::submit('Add run', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endif

@stop
