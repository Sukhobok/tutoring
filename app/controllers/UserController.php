<?php

class UserController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Sign Up
	 */
	public function postSignUp()
	{
		$validator = Validator::make(
			Input::all(),
			User::$signup_rules
		);

		if ($validator->passes())
		{
			$user = new User;
			$user->nickname = Input::get('nickname');
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			));

			return Redirect::route('dashboard');
		}
		else
		{
			return Redirect::to('/')
				->withInput()
				->with('validator_errors', array_keys($validator->failed()));
		}
	}

	/**
	 * Log In
	 */
	public function postLogIn()
	{
		if (Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		)))
		{
			return Redirect::route('dashboard');
		}
		else
		{
			return Redirect::to('/')
				->with('login_error', true);
		}
	}

	/**
	 * Log Out
	 */
	public function getLogOut()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}