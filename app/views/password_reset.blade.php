@extends('_master')

@section('content')

<h2>Password Reset</h2>

<br>

<form action="{{ action('RemindersController@postReset') }}" method="POST">
    
    <input type="hidden" name="token" value="{{ $token }}">
    
    <div class="form-group">
	    <label for="email" value="email">Email</label>
	    <input type="email" name="email" class="form-control" placeholder="you@somewhere.com">
	</div>

	<div class="form-group">
	    <label for="password">New Password</label>
	    <input type="password" name="password" class="form-control" placeholder="*******">
	</div>
	 
	<div class="form-group">   
	    <label for="password_confirmation">Re-enter Password</label>
	    <input type="password" name="password_confirmation" class="form-control" placeholder="******">
	</div>
    
    <input type="submit" value="Reset Password" class="btn btn-primary">

</form>

@stop