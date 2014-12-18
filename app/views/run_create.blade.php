@extends('_master')

@section('content')

<h2>Add Run</h2>

<br>

@if ($shoes->isEmpty())

    <p>You haven't added any shoes yet. <a href="/shoe/create">Add a pair first</a>, then come back here to log some runs.</p>

@else

    {{ Form::open(array('action' => 'RunController@store')) }}

        <div class="form-group">
        {{-- Date field. -----------------------}}
        {{ Form::label('date', 'Date') }}
        {{ Form::text('date', '', array('id' => 'date', 'class' => 'form-control', 'placeholder' => 'YYYY-MM-DD')) }}
        </div>

        @if($errors->has('date'))
            <div class='error'>{{ $errors->first('date') }}</div><br>
        @endif

        <div class="form-group">
        {{-- Mileage field. --------------------}}
        {{ Form::label('mileage', 'Mileage') }}
        {{ Form::text('mileage', '', array('class'=>'form-control', 'placeholder'=> 'round to one decimal point')) }}
        </div>

        @if($errors->has('mileage'))
            <div class='error'>{{ $errors->first('mileage') }}</div><br>
        @endif

        <div class="form-group">
        {{-- Shoe dropdown. --------------------}}
        {{ Form::label('shoe_id', 'Shoe') }}<br>
        {{ Form::select('shoe_id', $shoes->lists('name','id')) }}
        </div>

        <div class="form-group">
        {{-- Notes field. ----------------------}}
        {{ Form::label('notes', 'Notes') }}
        {{ Form::textarea('notes', '', array('class'=>'form-control', 'placeholder'=>'(optional)')) }}
        </div>

        {{-- Form submit button. ---------------}}
        {{ Form::submit('Add Run', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endif

@stop
