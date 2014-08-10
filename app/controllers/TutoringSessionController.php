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
		$ts = TutoringSession::find($ts_id);

		$this->layout->content = View::make(
			'tutoring_session.start',
			compact('ts_id', 'role', 'ts')
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

		// Log::info($_FILES['audio-blob']);

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

	/**
	 * Ajax: Leave Feedback
	 */
	public function ajaxLeaveFeedback()
	{
		$tutor_id = TutoringSession::canLeaveFeedback((int) Input::get('ts_id'));
		if (!$tutor_id
			|| (int) Input::get('stars') > 5
			|| (int) Input::get('stars') < 0)
		{
			App::abort(403, 'Unauthorized');
		}

		$f = new Feedback;
		$f->student_id = Auth::user()->id;
		$f->tutor_id = $tutor_id;
		$f->stars = (int) Input::get('stars');
		$f->message = Input::get('message');
		$f->ts_id = (int) Input::get('ts_id');
		$f->save();
		return '';
	}

	/**
	 * Ajax: Send Complaint
	 */
	public function ajaxSendComplaint()
	{
		$tutor_id = TutoringSession::canSendComplaint((int) Input::get('ts_id'));
		if (!$tutor_id)
		{
			App::abort(403, 'Unauthorized');
		}

		$tsi = TutoringSessionInfo::find((int) Input::get('ts_id'));
		if ($tsi->saved != 'yes')
		{
			$tsi->saved = 'only_for_complaint';
			$tsi->save();

			TutoringSession::compressAndSaveSession((int) Input::get('ts_id'));
		}
		// TO DO: Set unsaved pending to no

		$c = new Complaint;
		$c->student_id = Auth::user()->id;
		$c->ts_id = (int) Input::get('ts_id');
		$c->save();

		// Hold money
		$p = Payment::where('type', '=', 'tutoring_session')
			->where('type_id', '=', (int) Input::get('ts_id'))
			->first();
		$p->award_date = new DateTime('now + 2 years');
		$p->save();
		return '';
	}

	/**
	 * Ajax: Save Session
	 */
	public function ajaxSave()
	{
		$can_save = TutoringSession::canSaveSession((int) Input::get('ts_id'));
		if (!$can_save)
		{
			App::abort(403, 'Unauthorized');
		}

		$p = new Payment;
		$p->from_id = Auth::user()->id;
		$p->to_id = 0;
		$p->type = 'saved_session';
		$p->type_id = (int) Input::get('ts_id');
		$p->award_date = new DateTime('now');
		$p->amount = 5;
		$p->save();

		$tsi = TutoringSessionInfo::find((int) Input::get('ts_id'));

		if ($tsi->saved != 'only_for_complaint')
		{
			TutoringSession::compressAndSaveSession((int) Input::get('ts_id'));
		}
		
		$tsi->saved = 'yes';
		$tsi->save();
		return '';
	}

}
