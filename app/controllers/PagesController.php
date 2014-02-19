<?php

class PagesController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	public function getIndex()
	{
		$this->layout->content = View::make('index');
	}

	public function postIndex()
	{
		return Redirect::to('/')
			->withInput()
			->with('errors', '');
	}

}