@extends('_master')

@section('content')

<h2>Log In</h2>

<br>

@foreach($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => 'login')) }}

    <div class="form-group">
    {{-- Email address field. -------------------}}
    {{ Form::label('email', 'Email address') }}
    {{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>'you@somewhere.com')) }}
    </div>

    <div class="form-group">
    {{-- Password field. ------------------------}}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'******')) }}
    </div>

    <div class="checkbox">
    {{-- Remember me? ---------------------------}}
    <label for="remember"><input name="remember" type="checkbox" value="1" id="remember"> Remember me?</label>
    </div>

    {{-- Form submit button. --------------------}}
    {{ Form::submit('Log In', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

<br>

<p><a href="/password/remind">Need to reset your password?</p>

@stop