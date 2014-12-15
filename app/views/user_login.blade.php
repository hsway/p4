@extends('_master')

@section('content')

<h1>Login</h1>

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

    {{-- Remember me? ---------------------------}}
    {{ Form::label('remember', 'Remember me?') }}
    {{ Form::checkbox('remember') }}<br />

    {{-- Form submit button. --------------------}}
    {{ Form::submit('Log in', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

<p><a href="/password/remind">Need to reset your password?</p>

@stop