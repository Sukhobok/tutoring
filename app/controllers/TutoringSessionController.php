<?php

class TutoringSessionController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Get session start page
	 */
	public function getStart()
	{
		// Checking here

		$this->layout->content = View::make(
			'tutoring_session.start',
			array()
		);
	}

}
