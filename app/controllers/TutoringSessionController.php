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
		// Checking access
		$ts_id = TutoringSession::deleteExpiredAndGetSession((int) Input::get('uid'));
		if (!$ts_id)
		{
			App::abort(403, 'Unauthorized');
		}

		$role = TutoringSession::getUserRole($ts_id, Auth::user()->id);
		$this->layout->content = View::make(
			'tutoring_session.start',
			compact('ts_id', 'role')
		);
	}

}
