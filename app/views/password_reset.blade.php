@extends('_master')

@section('content')

<form action="{{ action('RemindersController@postReset') }}" method="POST">
    
    <input type="hidden" name="token" value="{{ $token }}">
    
    <label for="email" value="email">Email</label>
    <input type="email" name="email"><br>
    
    <label for="password">New Password</label>
    <input type="password" name="password"><br>
    
    <label for="password_confirmation">Re-enter Password</label>
    <input type="password" name="password_confirmation"><br>
    
    <input type="submit" value="Reset Password" class="btn btn-primary">
</form>

@stop