<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function shoes() {
        return $this->hasMany('Shoe');
    }

    public function runs() {
    	return $this->hasMany('Run');
    }

    public function sendEmailVerification() {

	    # Create an array of data, which will be passed/available in the view
	    $data = array('user' => $this);

	    Mail::send('emails.verify', $data, function($message) {

	        $recipient_email = $this->email;
	        $recipient_name  = $this->first_name.' '.$this->last_name;
	        $subject  = 'Please verify your email address, '.$this->first_name.'!';

	        $message->to($recipient_email, $recipient_name)->subject($subject);

	    });

	}

}
