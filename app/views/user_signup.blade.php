@extends('_master')

@section('content')

<h1>Registration form for Run Simple</h1>

@foreach($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => 'signup')) }}

    {{-- First name field. ----------------------}}
    {{ Form::label('first_name', 'First name') }}
    {{ Form::text('first_name') }}<br />

    {{-- Last name field. -----------------------}}
    {{ Form::label('last_name', 'Last name') }}
    {{ Form::text('last_name') }}<br />

    {{-- Email address field. -------------------}}
    {{ Form::label('email', 'Email address') }}
    {{ Form::email('email') }}<br />

    {{-- Password field. ------------------------}}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}<br />

    {{-- Password confirmation field. -----------}}
    {{ Form::label('password_confirmation', 'Password confirmation') }}
    {{ Form::password('password_confirmation') }}<br />

    {{-- Form submit button. --------------------}}
    {{ Form::submit('Sign up') }}

{{ Form::close() }}

@stop