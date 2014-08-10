<?php

class ApiController extends BaseController {

	/**
	 * Get user id by laravel_session cookie
	 */
	public function getUserBySession()
	{
		try
		{
			$session = Crypt::decrypt(Input::get('session'));

			$payload = DB::table('sessions')
				->where('id', '=', $session)
				->select('payload')
				->first();

			$payload = $payload->payload;
			$payload = unserialize(base64_decode($payload));

			return array('error' => 0, 'result' => $payload[Auth::getName()]);
		}
		catch (Exception $e)
		{
			return array('error' => 1);
		}
	}

	/**
	 * Get tutoring session id
	 */
	public function getTutoringSession()
	{
		try
		{
			$id = TutoringSession::deleteExpiredAndGetSession((int) Input::get('uid'));
			if ($id)
			{
				$session = TutoringSession::find($id);
				if (!$session)
				{
					return array('error' => 1);
				}

				$cancel_time = new DateTime($session->session_date . ' + 5 minutes');

				return array(
					'error' => 0, 
					'result' => $id, 
					'cancel_time' => $cancel_time->getTimestamp()
				);
			}
			else
			{
				throw new Exception('No active sessions');
			}
		}
		catch (Exception $e)
		{
			return array('error' => 1);
		}
	}

	/**
	 * Start tutoring session
	 */
	public function getStartTutoringSession()
	{
		$ts = TutoringSession::findOrFail((int) Input::get('ts_id'));
		$finish_time = new DateTime('now + ' . $ts->hours . ' hours');

		$ts_info = TutoringSessionInfo::firstOrNew(array('ts_id' => (int) Input::get('ts_id')));
		$ts_info->started_at = new DateTime('now');
		$ts_info->started_by = (int) Input::get('uid');
		$ts_info->save();


		return array('error' => 0, 'finish_time' => $finish_time->getTimestamp());
	}

	/**
	 * Finish tutoring session
	 * Note: Input::get('uid') is the online user
	 */
	public function getFinishTutoringSession()
	{
		if ((int) Input::get('uid'))
		{
			// Unexpected ending
			$role = TutoringSession::getUserRole(
				(int) Input::get('ts_id'),
				(int) Input::get('uid')
			);

			if ($role === 'student')
			{
				// The tutor is out => Cancel the session
				$session = TutoringSession::findOrFail((int) Input::get('ts_id'));
				TutoringSession::_refundTutoringSession($session->id);
				TutoringSession::_sendCancelTutoringSession($session->id);
				TutoringSession::destroyForStudent($session->id, (int) Input::get('uid'));
			}
			elseif ($role === 'tutor')
			{
				// The student is out => End the session
				$ts_info = TutoringSessionInfo::find((int) Input::get('ts_id'));
				if (!$ts_info)
				{
					$ts_info = new TutoringSessionInfo;
					$ts_info->ts_id = (int) Input::get('ts_id');
					$ts_info->started_at = new DateTime;
					$ts_info->started_by = (int) Input::get('uid');
					$ts_info->save();
				}

				TutoringSession::finishTutoringSession((int) Input::get('ts_id'));
			}
			else
			{
				Log::error(
					'User '
					. (int) Input::get('uid')
					. ' doesn\'t have permission to access tutoring session '
					. (int) Input::get('ts_id')
				);
			}
		}
		else
		{
			// Session completed successfully
			TutoringSession::finishTutoringSession((int) Input::get('ts_id'));
		}

		return array('error' => 0);
	}

}
