<?php

class TutoringSession extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'tutoring_sessions';

	/**
	 * Get future tutoring sessions
	 * @param integer $uid
	 * @return array
	 */
	public static function getFutureSessions($uid)
	{
		$query = 'SELECT tutoring_sessions.session_date,
		CASE tutoring_sessions.student_id
			WHEN ? THEN tutor.name
			ELSE student.name
		END AS partnerName,
		CASE tutoring_sessions.student_id
			WHEN ? THEN tutor.id
			ELSE student.id
		END AS partnerId,
		tutoring_sessions.description,
		tutoring_sessions.id
		FROM tutoring_sessions
		LEFT JOIN users AS tutor ON (
			tutoring_sessions.student_id = ?
			AND tutoring_sessions.tutor_id = tutor.id
		)
		LEFT JOIN users AS student ON (
			tutoring_sessions.tutor_id = ?
			AND tutoring_sessions.student_id = student.id
		)

		WHERE tutoring_sessions.student_id = ?
			OR tutoring_sessions.tutor_id = ?';

		$query = DB::select($query, array_fill(0, 6, $uid));
		foreach ($query as $i => $_query)
		{
			$_query->session_date = strtotime($_query->session_date);

			$ts_info = TutoringSessionInfo::find($_query->id);
			if ($ts_info)
			{
				unset($query[$i]);
			}
		}

		return $query;
	}

	/**
	 * This function does 2 things:
	 * 1) Cancel expired tutoring sessions (> 5 min)
	 * 2) Return the session id if in 5 min delay (student)
	 *    or 15 min delay (tutor)
	 * @param integer $uid
	 * @return integer (Tutoring Session ID or 0)
	 */
	public static function deleteExpiredAndGetSession($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;
		$ts_id = 0;
		
		$sessions = TutoringSession::where('tutor_id', '=', $uid)
			->orWhere('student_id', '=', $uid)
			->leftJoin(
				'tutoring_sessions_info',
				'tutoring_sessions_info.ts_id', '=', 'tutoring_sessions.id'
			)
			->get();

		foreach ($sessions as $session)
		{
			$session->session_date = new DateTime($session->session_date);
			if (new DateTime('now - 5 minutes') > $session->session_date
				&& $session->started_at == null)
			{
				TutoringSession::destroy($session->id);
				TutoringSession::_refundTutoringSession($session->id);
				TutoringSession::_sendCancelTutoringSession($session->id);
			}
			else
			{
				if ($session->tutor_id == $uid
					&& new DateTime('now + 15 minutes') > $session->session_date
					&& $session->started_at == null)
				{
					// Tutors have access 15 minutes early
					$ts_id = $session->id;
				}

				if ($session->student_id == $uid
					&& new DateTime('now + 5 minutes') > $session->session_date
					&& $session->started_at == null)
				{
					// Students have access 5 minutes early
					$ts_id = $session->id;
				}
			}
		}

		return $ts_id;
	}

	/**
	 * Get user role in a tutoring session
	 * @param integer $ts_id
	 * @param integer $uid
	 * @return mixed FALSE, student or tutor
	 */
	public static function getUserRole($ts_id, $uid)
	{
		$session = TutoringSession::find($ts_id);
		if (!$session)
		{
			return false;
		}

		if ($session->student_id == $uid)
		{
			return 'student';
		}

		if ($session->tutor_id == $uid)
		{
			return 'tutor';
		}

		return false;
	}

	/**
	 * Finish tutoring session
	 * @param integer $ts_id
	 * @return boolean TRUE
	 */
	public static function finishTutoringSession($ts_id)
	{
		$ts = TutoringSession::findOrFail($ts_id);

		$ts_info = TutoringSessionInfo::findOrFail($ts_id);
		$ts_info->ended_at = new DateTime('now');
		$ts_info->ended_by = 0;
		$ts_info->save();

		// Get pending payment
		$payment = Payment::where('type_id', '=', $ts->id)
			->where('type', '=', 'pending_tutoring_session')
			->first();

		// Calculate StudySquare fee
		$ss_fee = 0.1 * $payment->amount;
		$ss_fee++;

		// Send payment to tutor in 5 minutes
		$payment->type = 'tutoring_session';
		$payment->type_id = $ts_id;
		$payment->amount = $payment->amount - $ss_fee;
		$payment->award_date = new DateTime('now + 5 minutes');
		$payment->save();

		// Save StudySquare fee
		$payment = new Payment;
		$payment->from_id = $ts->student_id;
		$payment->to_id = 0;
		$payment->type = 'studysquare_fee';
		$payment->amount = $ss_fee;
		$payment->save();

		return true;
	}

	/**
	 * Refund Tutoring Session
	 * @param integer $ts_id
	 * @return boolean TRUE
	 */
	public static function _refundTutoringSession($ts_id)
	{
		Payment::where('type', '=', 'pending_tutoring_session')
			->where('type_id', '=', $ts_id)
			->delete();

		return true;
	}

	/**
	 * Send Tutoring Session Cancel Notification
	 * @param integer $ts_id
	 * @param boolean $auto (TRUE if auto canceled, FALSE if canceled by user)
	 * @param string $message
	 * @return boolean Success
	 */
	public static function _sendCancelTutoringSession($ts_id, $auto = true, $message = '')
	{
		// TO DO: Notif user
	}

	/**
	 * Check if a user can leave feedback
	 * @param integer $ts_id
	 * @param integer $uid (optional)
	 * @return integer Tutor ID or 0
	 */
	public static function canLeaveFeedback($ts_id, $uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;
		
		$session = TutoringSession::where('id', '=', $ts_id)
			->where('student_id', '=', $uid)
			->leftJoin(
				'tutoring_sessions_info',
				'tutoring_sessions_info.ts_id', '=', 'tutoring_sessions.id'
			)
			->pluck('tutor_id');

		$left_before = Feedback::where('ts_id', '=', $ts_id)
			->count();

		if ($session && !$left_before)
		{
			return $session;
		}

		return 0;
	}

	/**
	 * Check if a user can send complaint
	 * @param integer $ts_id
	 * @param integer $uid (optional)
	 * @return integer Tutor ID or 0
	 */
	public static function canSendComplaint($ts_id, $uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;
		
		$session = TutoringSession::where('id', '=', $ts_id)
			->where('student_id', '=', $uid)
			->where('tutoring_sessions_info.ended_at', '>=', new DateTime('now - 5 minutes'))
			->leftJoin(
				'tutoring_sessions_info',
				'tutoring_sessions_info.ts_id', '=', 'tutoring_sessions.id'
			)
			->pluck('tutor_id');

		$left_before = Complaint::where('ts_id', '=', $ts_id)
			->count();

		if ($session && !$left_before)
		{
			return $session;
		}

		return 0;
	}

	/**
	 * Check if a user can save a session
	 * @param integer $ts_id
	 * @param integer $uid (optional)
	 * @return boolean
	 */
	public static function canSaveSession($ts_id, $uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;
		
		$session = TutoringSession::where('id', '=', $ts_id)
			->where('student_id', '=', $uid)
			->where('tutoring_sessions_info.ended_at', '>=', new DateTime('now - 5 minutes'))
			->leftJoin(
				'tutoring_sessions_info',
				'tutoring_sessions_info.ts_id', '=', 'tutoring_sessions.id'
			)
			->pluck('tutor_id');

		if ($session)
		{
			$tsi = TutoringSessionInfo::find($ts_id);

			if ($tsi->saved != 'yes')
			{
				return $session;
			}
		}

		return 0;
	}

	/**
	 * Destroy session for the student
	 * (tutor is out, student is refunded)
	 * @param integer $ts_id
	 * @return boolean TRUE
	 */
	public function destroy_for_student($ts_id)
	{
		$now = new DateTime('now');

		$tsi = new TutoringSessionInfo;
		$tsi->ts_id = $ts_id;
		$tsi->started_at = $now;
		$tsi->started_by = Auth::user()->id;
		$tsi->ended_at = $now;
		$tsi->ended_by = Auth::user()->id;
		$tsi->saved = 'no';
		$tsi->save();

		return true;
	}

}
