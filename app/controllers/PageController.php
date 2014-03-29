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

		return View::make('index', array(
			'input_classes' => $input_classes
		));
	}

	/**
	 * Dashboard
	 */
	public function getDashboard()
	{
		$posts = Post::getDashboardPosts();
		$this->layout->content = View::make(
			'dashboard',
			compact('posts')
		);
	}

	/**
	 * Data for "search anything" autocomplete
	 */
	public function ajaxSearchAnything()
	{
		$search = Input::get('search');

		if ($search)
		{
			return User::searchAnything($search);
		}
		else
		{
			return array();
		}
	}

}
