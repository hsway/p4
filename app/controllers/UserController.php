<?php

class UserController extends BaseController {

   /**
	*
	*/
	public function __construct() {

		parent::__construct();

        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin','getSignup')
        	));

    }


   /**
	* Show the new user signup form
	* @return View
	*/
	public function getSignup() {

		return View::make('user_signup');

	}

   /**
	* Process the new user signup
	* @return Redirect
	*/
	public function postSignup() {

		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6|confirmed'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$user = new User;
		$user->email      = Input::get('email');
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->password   = Hash::make(Input::get('password'));

		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please try again.')
				->withInput();
		}

		Auth::login($user);

		return Redirect::to('/')->with('flash_message', 'Welcome to Run Simple!');

	}

   /**
	* Display the login form
	* @return View
	*/
	public function getLogin() {

		return View::make('user_login');

	}

   /**
	* Process the login form
	* @return View
	*/
	public function postLogin() {

		$credentials = Input::only('email', 'password');

		if (Auth::attempt($credentials, $remember = false)) {
			return Redirect::intended('/')->with('flash_message', 'Welcome back, ' . Auth::user()->first_name . '!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput();
		}

		return Redirect::to('login');

	}


   /**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {

		Auth::logout();
		return Redirect::to('/');

	}

}