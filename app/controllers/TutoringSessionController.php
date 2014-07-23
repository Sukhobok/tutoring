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

		// TODO: Externalize data for load balancing
		if (!file_exists(storage_path() . '/tutoring_sessions/' . $ts_id))
		{
			mkdir(storage_path() . '/tutoring_sessions/' . $ts_id);
			mkdir(storage_path() . '/tutoring_sessions/' . $ts_id . '/files');
			mkdir(storage_path() . '/tutoring_sessions/' . $ts_id . '/video');
			mkdir(storage_path() . '/tutoring_sessions/' . $ts_id . '/data');
		}

		$role = TutoringSession::getUserRole($ts_id, Auth::user()->id);
		$this->layout->content = View::make(
			'tutoring_session.start',
			compact('ts_id', 'role')
		);
	}

	/**
	 * Ajax: Receive Audio
	 */
	public function ajaxReceiveAudio()
	{
		// Checking access
		$ts_id = TutoringSession::deleteExpiredAndGetSession((int) Input::get('uid'));
		if (!$ts_id)
		{
			App::abort(403, 'Unauthorized');
		}

		$time = new DateTime('now');
		$filename = storage_path() . '/tutoring_sessions/' . $ts_id . '/video/';
		$filename .= $time->getTimestamp() . '.' . Auth::user()->id;
		unset($time);

		if (!move_uploaded_file($_FILES['audio-blob']['tmp_name'], $filename . '.wav'))
		{
			App::abort(500);
		}
		else
		{
			exec('ffmpeg -i ' . $filename . '.wav ' . $filename . '.mp3');
			unlink($filename . '.wav');
			return array('error' => 0);
		}
	}

}
