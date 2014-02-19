<?php

class PageController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * First page
	 */
	public function getIndex()
	{
		$input_classes = array(
			'nickname' =>  '',
			'name' => '',
			'email' => '',
			'password' => '',
			'password_confirmation' => '',
			'agree' => ''
		);

		if (Session::get('validator_errors'))
		{
			foreach (Session::get('validator_errors') as $key)
			{
				$input_classes[$key] .= 'field-error';
			}
		}

		$this->layout->content = View::make('index', array(
			'input_classes' => $input_classes
		));
	}

	/**
	 * Dashboard
	 */
	public function getDashboard()
	{
		$users = User::all();
		Debugbar::info($users);
		$this->layout->content = View::make('dashboard');
	}

}