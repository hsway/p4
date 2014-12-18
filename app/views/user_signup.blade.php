@extends('_master')

@section('content')

<h2>Sign Up</h2>

<br>

{{ Form::open(array('url' => 'signup')) }}

    <div class="form-group">
    {{-- First name field. ----------------------}}
    {{ Form::label('first_name', 'First name') }}
    {{ Form::text('first_name', '', array('class'=>'form-control', 'placeholder'=>'Scott')) }}
    </div>

    @if($errors->has('first_name'))
        <div class="error">{{ $errors->first('first_name') }}</div><br>
    @endif

    <div class="form-group">
    {{-- Last name field. -----------------------}}
    {{ Form::label('last_name', 'Last name') }}
    {{ Form::text('last_name', '', array('class'=>'form-control', 'placeholder'=>'Jurek')) }}
    </div>

    @if($errors->has('last_name'))
        <div class="error">{{ $errors->first('last_name') }}</div><br>
    @endif
    
    <div class="form-group">
    {{-- Email address field. -------------------}}
    {{ Form::label('email', 'Email address') }}
    {{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>'you@somewhere.com')) }}
    </div>

    @if($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div><br>
    @endif

    <div class="form-group">
    {{-- Password field. ------------------------}}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'******')) }}
    </div>

    @if($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div><br>
    @endif

    <div class="form-group">
    {{-- Password confirmation field. -----------}}
    {{ Form::label('password_confirmation', 'Password confirmation') }}
    {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'******')) }}
    </div>

    @if($errors->has('password_confirmation'))
        <div class="error">{{ $errors->first('password_confirmation') }}</div><br>
    @endif

    {{-- Form submit button. --------------------}}
    {{ Form::submit('Sign up', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
