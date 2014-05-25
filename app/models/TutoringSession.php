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
		tutoring_sessions.description
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
		foreach ($query as &$_query) {
			$_query->session_date = strtotime($_query->session_date);
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

		Debugbar::info($sessions);

		foreach ($sessions as $session)
		{
			$session->session_date = new DateTime($session->session_date);
			if (new DateTime('now - 5 minutes') > $session->session_date
				&& $session->started_at == null)
			{
				TutoringSession::destroy($session->id);
				HireRequest::_refundHireRequest($session->hr_id);
				HireRequest::_sendCancelHireRequest($session->hr_id);
			}
			else
			{
				if ($session->tutor_id == $uid
					&& new DateTime('now + 15 minutes') > $session->session_date)
				{
					// Tutors have access 15 minutes early
					$ts_id = $session->id;
				}

				if ($session->student_id == $uid
					&& new DateTime('now + 5 minutes') > $session->session_date)
				{
					// Students have access 5 minutes early
					$ts_id = $session->id;
				}
			}
		}

		return $ts_id;
	}


}
