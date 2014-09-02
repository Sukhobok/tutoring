<?php

use ElephantIO\Client as Elephant;

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
		if ($role === 'student')
		{
			$partner = User::find($ts->tutor_id);
		}
		else
		{
			$partner = User::find($ts->student_id);
		}

		$this->layout->content = View::make(
			'tutoring_session.start',
			compact('ts_id', 'role', 'ts', 'partner')
		);
	}

	/**
	 * Replayer Page
	 */
	public function getReplay($id)
	{
		$id = (int) $id;
		$s3 = AWS::get('s3');
		$_ts = TutoringSession::where('id', '=', $id)
			->leftJoin(
				'tutoring_sessions_info',
				'tutoring_sessions_info.ts_id', '=', 'tutoring_sessions.id'
			)
			->select(
				'tutoring_sessions_info.started_at',
				'tutoring_sessions_info.ended_at',
				'tutoring_sessions.student_id',
				'tutoring_sessions.tutor_id'
			)
			->get();

		if (!count($_ts))
		{
			App::abort('404');
		}

		$_ts[0]->started_at = new DateTime($_ts[0]->started_at);
		$_ts[0]->ended_at = new DateTime($_ts[0]->ended_at);
		$_ts[0]->student = User::find($_ts[0]->student_id);
		$_ts[0]->tutor = User::find($_ts[0]->tutor_id);

		$_data = $s3->getObject(array(
			'Bucket' => Config::get('s3.bucket'),
			'Key' => 'tutoring_sessions/' . $id . '/data.tsd'
		));
		$_data = $_data['Body'];

		$_files = $s3->listObjects(array(
		    'Bucket' => Config::get('s3.bucket'),
		    'Prefix' => 'tutoring_sessions/' . $id . '/files'
		));
		$_files = $_files['Contents'];

		/* Local:
		$_ts = array();
		$_ts[0] = new stdClass();
		$_ts[0]->started_at = new DateTime('@1408100582');
		$_ts[0]->ended_at = new DateTime('@1408104182');
		$_ts[0]->student = new stdClass();
		$_ts[0]->student->name = 'Student';
		$_ts[0]->student->profile_picture = '';
		$_ts[0]->tutor = new stdClass();
		$_ts[0]->tutor->name = 'Tutor';
		$_ts[0]->tutor->profile_picture = '';

		$s3 = AWS::get('s3');
		$_data = $s3->getObject(array(
			'Bucket' => 'studysquare',
			'Key' => 'tutoring_sessions/8/data.tsd'
		));
		$_data = $_data['Body'];

		$_files = $s3->listObjects(array(
		    "Bucket" => 'studysquare',
		    "Prefix" => "tutoring_sessions/8/files"
		));
		$_files = $_files['Contents']; */

		foreach ($_files as &$_file)
		{
			switch (pathinfo($_file['Key'], PATHINFO_EXTENSION))
			{
				case 'xls':
				case 'xlsx':
					$_file['icon'] = '/images/tutoring_session/file_icons/excel_icon.png';
					break;

				case 'pdf':
					$_file['icon'] = '/images/tutoring_session/file_icons/pdf_icon.png';
					break;

				case 'ppt':
				case 'pptx':
					$_file['icon'] = '/images/tutoring_session/file_icons/ppt_icon.png';
					break;

				case 'doc':
				case 'docx':
					$_file['icon'] = '/images/tutoring_session/file_icons/word_icon.png';
					break;
				
				default:
					$_file['icon'] = '/images/tutoring_session/file_icons/programming_icon.png';
					break;
			}
		}

		$this->layout->content = View::make(
			'tutoring_session.replay',
			compact('_data', '_ts', '_files')
		);
	}

	/**
	 * Ajax: Close Session
	 */
	public function ajaxCloseSession()
	{
		$ts_id = TutoringSession::deleteExpiredAndGetSession();
		if (!$ts_id)
		{
			App::abort(403, 'Unauthorized');
		}

		$role = TutoringSession::getUserRole(
			$ts_id,
			Auth::user()->id
		);

		if ($role === 'student')
		{
			$elephant = new Elephant(Config::get('elephant.ts_domain'));
			$elephant->setHandshakeQuery(array(
				'signature' => Config::get('elephant.signature')
			));

			$elephant->init();
			$elephant->emit('close_session', array(
				'base_url' => URL::to('/') . '/',
				'ts_id' => $ts_id
			));
			$elephant->close();

			return array('error' => 0);
		}
		else
		{
			App::abort(403, 'Unauthorized');
		}
	}

	/**
	 * Ajax: Receive Audio
	 */
	public function ajaxReceiveAudio()
	{
		// Checking access
		$ts_id = TutoringSession::deleteExpiredAndGetSession();
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
	 * Ajax: Receive File
	 */
	public function ajaxReceiveFile()
	{
		// Checking access
		$ts_id = TutoringSession::deleteExpiredAndGetSession((int) Input::get('uid'));
		if (!$ts_id)
		{
			App::abort(403, 'Unauthorized');
		}

		$file = Input::file('ts-file');
		$size = 0;
		foreach (File::allFiles(storage_path('tutoring_sessions/' . $ts_id . '/files')) as $_file)
		{
			$size += $_file->getSize();
		}
		$size += $file->getSize();
		
		if ($size > 100*1000*1000)
		{
			return array('error' => 1, 'error_type' => 'size');
		}

		$dir = storage_path() . '/tutoring_sessions/' . $ts_id . '/files/';
		if (Input::get('ts-file-type') == 'screenshot')
		{
			$filename = 'screenshot';
			$filename .= '.' . str_random(3) . time() . str_random(3);
			$filename .= '.png';

			$icon = URL::to('ajax/session/download_file?file=' . $filename);
		}
		else
		{
			$filename = preg_replace(
				"/[^A-Za-z0-9]/", '',
				pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
			);
			$filename .= '.' . str_random(3) . time() . str_random(3);
			$filename .= '.' . $file->getClientOriginalExtension();

			switch ($file->getClientOriginalExtension())
			{
				case 'xls':
				case 'xlsx':
					$icon = '/images/tutoring_session/file_icons/excel_icon.png';
					break;

				case 'pdf':
					$icon = '/images/tutoring_session/file_icons/pdf_icon.png';
					break;

				case 'ppt':
				case 'pptx':
					$icon = '/images/tutoring_session/file_icons/ppt_icon.png';
					break;

				case 'doc':
				case 'docx':
					$icon = '/images/tutoring_session/file_icons/word_icon.png';
					break;
				
				default:
					$icon = '/images/tutoring_session/file_icons/programming_icon.png';
					break;
			}

			if (in_array($file->guessExtension(), array('jpeg', 'png', 'gif', 'bmp')))
			{
				$icon = URL::to('ajax/session/download_file?file=' . $filename);
			}
		}

		$file->move($dir, $filename);

		// Send to socket.io
		$elephant = new Elephant(Config::get('elephant.ts_domain'));
		$elephant->setHandshakeQuery(array(
			'signature' => Config::get('elephant.signature')
		));

		$elephant->init();
		$elephant->emit('server_tutoring_session_data', array(
			'what' => 'new_file',
			'user_id' => Auth::user()->id,
			'ts_id' => $ts_id,
			'filename' => $filename,
			'icon' => $icon
		));
		$elephant->close();

		return array(
			'error' => 0,
			'filename' => $filename,
			'icon' => $icon
		);
	}

	/**
	 * Ajax: Download file
	 */
	public function ajaxDownloadFile()
	{
		// Checking access
		if (!(int) Input::get('ts_id'))
		{
			$ts_id = TutoringSession::deleteExpiredAndGetSession((int) Input::get('uid'));
			if (!$ts_id)
			{
				App::abort(403, 'Unauthorized');
			}
		}
		else
		{
			$ts_id = (int) Input::get('ts_id');
		}

		return Response::download(
			storage_path(
				'tutoring_sessions/' . $ts_id . '/files/' . Input::get('file')
			)
		);
	}

	/**
	 * Ajax: Remove file
	 */
	public function ajaxRemoveFile()
	{
		// Checking access
		$ts_id = TutoringSession::deleteExpiredAndGetSession((int) Input::get('uid'));
		if (!$ts_id)
		{
			App::abort(403, 'Unauthorized');
		}

		File::delete(
			storage_path(
				'tutoring_sessions/' . $ts_id . '/files/' . Input::get('file')
			)
		);

		// Send to socket.io
		$elephant = new Elephant(Config::get('elephant.ts_domain'));
		$elephant->setHandshakeQuery(array(
			'signature' => Config::get('elephant.signature')
		));

		$elephant->init();
		$elephant->emit('server_tutoring_session_data', array(
			'what' => 'remove_file',
			'user_id' => Auth::user()->id,
			'ts_id' => $ts_id,
			'filename' => Input::get('file')
		));
		$elephant->close();

		return array('error' => 0);
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
