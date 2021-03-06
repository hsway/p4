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

    public function getIndex() {

    	$user = Auth::user();

    	if ($user) {

    		$runs = $user->runs->sortByDesc('date')->take(5);
    		$runs->load('shoe');
    		$shoes = $user->shoes->sortByDesc('updated_at')->take(2);

    		return View::make('user_index')->with(array( 'runs'  => $runs,
    													 'shoes' => $shoes
    		));

    	} else {

    		return View::make('welcome');

    	}
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
			'password' => 'required|min:6|confirmed',
			'password_confirmation' => 'required|min:6'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/signup')
				->with('warning_message', 'Sign up failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$user = new User;
		$user->email      = Input::get('email');
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->password   = Hash::make(Input::get('password'));

		// set code for email confirmation
		$confirmation_code = str_random(30);
		$user->confirmation_code = $confirmation_code;

		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('warning_message', 'Sign up failed; please try again.')
				->withInput();
		}

		Auth::login($user);
		Session::put("user_id", Auth::id());
		Session::put("user_first_name", Auth::user()->first_name);
		$user->sendEmailVerification();

		return Redirect::to('/')->with('success_message', 'Welcome to Run Simple, ' . Session::get('user_first_name') . '!');

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

		$rules = array(
			'email' => 'required|email',
			'password' => 'required|min:6'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('/login')
				->with('warning_message', 'Login failed; please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];

		// user checked 'remember me'
		if (Input::get('remember')) {

			if (Auth::attempt($credentials, $remember = true)) {

				Session::put("user_id", Auth::id());
				Session::put("user_first_name", Auth::user()->first_name);
				return Redirect::intended('/')->with('success_message', 'Welcome back, ' . Session::get("user_first_name") . '!');

			}
			else {
				return Redirect::to('/login')
					->with('warning_message', 'Log in failed; please try again.')
					->withInput();
			}

		// user did not check 'remember me'
		} else {

			if (Auth::attempt($credentials, $remember = false)) {

				Session::put("user_id", Auth::id());
				Session::put("user_first_name", Auth::user()->first_name);
				return Redirect::intended('/')->with('success_message', 'Welcome back, ' . Session::get("user_first_name") . '!');

			}
			else {
				return Redirect::to('/login')
					->with('warning_message', 'Log in failed; please try again.')
					->withInput();
			}

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

	public function confirm($confirmation_code) {

        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return Redirect::to('/')
        	->with('success_message', 'Thank you for confirming your email address, ' . $user->first_name . '!');
    }

}
