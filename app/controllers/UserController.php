<?php

use Illuminate\Support\MessageBag;

class UserController extends BaseController {

	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
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

		// get the POST data
		$data = (Input::all());
		// create a new model instance for validation
		$user = new User();
		// attempt validation
		if (!$user->validate($data))
		{
    		return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please fix the errors listed below.')
				->withInput()
				->withErrors($user->errors());
		}

		$user = new User;
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->remember_token = 'YES';

		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Sign up failed; please try again.')
				->withInput();
		}

		# Log in
		Auth::login($user);

		return Redirect::to('/')->with('flash_message', 'Welcome to Jenny\'s Kitchen!');

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
		$email = Input::get('email');
		
		$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
		

		# Note we don't have to hash the password before attempting to auth - Auth::attempt will take care of that for us
		if (Auth::attempt($credentials, $remember = false)) {
			return Redirect::intended('/orders')->with('flash_message', 'Welcome Back '.$email.'!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput()
				->withErrors($errors);
		}

	}


	/**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {

		# Log out
		Auth::logout();

		# Send them to the homepage
		return Redirect::to('/');

	}

}