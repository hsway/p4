@extends('_master')

@section('content')

<h2>Add Shoes</h2>

<br>

{{ Form::open(array('action' => 'ShoeController@store')) }}

    <div class="form-group">
    {{-- Shoe name field. ---------------------------}}
    {{ Form::label('name', 'Shoe name') }}
    {{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>'Purple Asics, perhaps')) }}
    </div>

    @if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div><br>
    @endif

    <div class="form-group">
    {{-- Purchase date field. -----------------------}}
    {{ Form::label('purchase_date', 'Purchase date') }}
    {{ Form::text('purchase_date', '', array('id' => 'date', 'class'=>'form-control', 'placeholder'=>'YYYY-MM-DD')) }}
    </div>

    @if($errors->has('purchase_date'))
        <div class="error">{{ $errors->first('purchase_date') }}</div><br>
    @endif

    <div class="form-group">
    {{-- Starting mileage field. --------------------}}
    {{ Form::label('mileage', 'Starting mileage') }}
    {{ Form::text('mileage', '', array('class'=>'form-control', 'placeholder'=>'If brand new, enter 0.')) }}
    </div>

    @if($errors->has('mileage'))
        <div class="error">{{ $errors->first('mileage') }}</div><br>
    @endif

    {{-- Form submit button. ------------------------}}
    {{ Form::submit('Add Shoes', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop