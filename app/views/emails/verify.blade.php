<h1>
    Welcome {{{ $user['first_name'] }}}!
</h1>

<p>
    This message is to confirm that you have created a Run Simple account with the email {{{ $user['email'] }}}.
</p>

<p>
	Please click this link to verify your email address: {{ URL::to('signup/verify/' . $user['confirmation_code']) }}
</p>

<p>
    - Team Run Simple
</p>