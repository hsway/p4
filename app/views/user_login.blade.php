@extends('_master')

@section('content')

<h1>Login form for Run Simple</h1>

@foreach($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => 'login')) }}

    {{-- Email address field. -------------------}}
    {{ Form::label('email', 'Email address') }}
    {{ Form::email('email') }}<br />

    {{-- Password field. ------------------------}}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}<br />

    {{-- Form submit button. --------------------}}
    {{ Form::submit('Log in') }}

{{ Form::close() }}

@stop