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

}
