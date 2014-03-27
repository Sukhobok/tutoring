<?php

class MajorController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Data for autocomplete
	 */
	public function ajaxList()
	{
		$search = Input::get('search');

		if ($search)
		{
			return Major::ajaxList($search);
		}
		else
		{
			return array();
		}
	}

}
