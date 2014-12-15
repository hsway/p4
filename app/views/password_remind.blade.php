@extends('_master')

@section('content')

<h2>Forgot your password?</h2>

<p>Enter your email address below to reset your password.</p>

<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email">
    <input type="submit" value="Send Reminder" class="btn btn-primary">
</form>

@stop