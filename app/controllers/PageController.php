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
		$users = User::count();
		$subjects = Subject::count();
		$tutors = DB::table('user_subjects')
			->distinct('user_id')
			->count('user_id');

		$input_classes = array(
			'nickname' =>  '',
			'first_name' => '',
			'last_name' => '',
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
			'input_classes' => $input_classes,
			'users' => $users,
			'subjects' => $subjects,
			'tutors' => $tutors
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

	/**
	 * Terms of service
	 */
	public function getTerms()
	{
		$this->layout->content = View::make('page.terms');
	}

	/**
	 * Privacy policy
	 */
	public function getPrivacy()
	{
		$this->layout->content = View::make('page.privacy');
	}

	/**
	 * Cookie policy
	 */
	public function getCookie()
	{
		$this->layout->content = View::make('page.cookie');
	}

}
