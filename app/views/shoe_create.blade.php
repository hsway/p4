@extends('_master')

@section('content')

<h1>Add Shoes</h1>

@foreach($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('action' => 'ShoeController@store')) }}

    {{-- Shoe name field. ---------------------------}}
    {{ Form::label('name', 'Shoe name') }}
    {{ Form::text('name') }}<br />

    {{-- Purchase date field. -----------------------}}
    {{ Form::label('purchase_date', 'Purchase date') }}
    {{ Form::text('purchase_date', '', array('id' => 'date')) }} YYYY-MM-DD<br />

    {{-- Starting mileage field. --------------------}}
    {{ Form::label('mileage', 'Starting mileage') }}
    {{ Form::text('mileage') }} If brand new, enter 0.<br />

    {{-- Form submit button. ------------------------}}
    {{ Form::submit('Add shoes', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop