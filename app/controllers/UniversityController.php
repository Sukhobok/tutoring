<?php

class UniversityController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * University page
	 */
	public function getUniversity($id)
	{
		$university = University::getUniversityData($id);
		if (!$university)
		{
			App::abort('404');
		}

		$posts = University::getUniversityPosts($id);

		$this->layout->content = View::make('university.view', array(
			'university' => $university,
			'posts' => $posts
		));
	}

}
