<?php

class HighschoolController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Highschool page
	 */
	public function getHighschool($id)
	{
		$highschool = Highschool::getHighschoolData($id);
		if (!$highschool)
		{
			App::abort('404');
		}

		$posts = Highschool::getHighschoolPosts($id);

		$this->layout->content = View::make('highschool.view', array(
			'highschool' => $highschool,
			'posts' => $posts
		));
	}

	/**
	 * Data for autocomplete
	 */
	public function ajaxList()
	{
		$search = Input::get('search');

		if ($search)
		{
			return Highschool::ajaxList($search);
		}
		else
		{
			return array();
		}
	}

}
