@extends('_master')

@section('content')

<h2>Forgot your password?</h2>

<br>

<p>Enter your email address below and we'll send you a link to reset your password.</p>

<br>

<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <div class="form-group">
    	<label for="email">Email</label>
    	<input class="form-control" type="email" name="email" placeholder="you@somewhere.com">
    </div>
    <input type="submit" value="Send Reminder" class="btn btn-primary">
</form>

@stop