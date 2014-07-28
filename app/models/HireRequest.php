<?php

class HireRequest extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'hire_requests';

	/**
	 * Get all incoming requests
	 * @param integer $uid
	 * @return array
	 */
	public static function getIncomingRequests($uid)
	{
		$query = 'SELECT hire_requests.date1,
		hire_requests.date2,
		hire_requests.date3,
		hire_requests.hours,
		hire_requests.description,
		hire_requests.id,
		users.name as userName,
		users.profile_picture
		FROM hire_requests, users
		WHERE users.id = hire_requests.student_id
			AND hire_requests.tutor_id = ?';

		$query = DB::select($query, array_fill(0, 1, $uid));

		foreach ($query as &$_query)
		{
			$time = new DateTime('now + 3 hours');
			$_query->availableDates = array();

			if ($time < new DateTime($_query->date1))
			{
				$_query->availableDates[] = array(
					'id' => 1,
					'time' => strtotime($_query->date1)
				);
			}
			
			if ($time < new DateTime($_query->date2))
			{
				$_query->availableDates[] = array(
					'id' => 2,
					'time' => strtotime($_query->date2)
				);
			}

			if ($time < new DateTime($_query->date3))
			{
				$_query->availableDates[] = array(
					'id' => 3,
					'time' => strtotime($_query->date3)
				);
			}
		}
		
		return $query;
	}

	/**
	 * Delete expired requests
	 * @param integer $uid
	 * @return boolean TRUE
	 */
	public static function deleteExpiredRequests($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$query = 'SELECT hire_requests.date1,
		hire_requests.date2,
		hire_requests.date3,
		hire_requests.hours,
		hire_requests.id,
		hire_requests.student_id,
		hire_requests.tutor_id
		FROM hire_requests
		WHERE hire_requests.student_id = ?
			OR hire_requests.tutor_id = ?';

		$query = DB::select($query, array_fill(0, 2, $uid));

		foreach ($query as &$_query)
		{
			if ($_query->student_id == $uid)
			{
				$_query->other_id = $_query->tutor_id;
				$_query->other_what = 'tutor';
				$_query->me_what = 'student';
			}
			else
			{
				$_query->other_id = $_query->student_id;
				$_query->other_what = 'student';
				$_query->me_what = 'tutor';
			}

			$_query->me_id = $uid;
			$time = new DateTime('now + 3 hours');
			$_query->availableDates = array();

			if ($time < new DateTime($_query->date1))
			{
				$_query->availableDates[] = array(
					'id' => 1,
					'start_time' => strtotime($_query->date1),
					'end_time' => strtotime($_query->date1) + ($_query->hours*3600),
				);
			}
			
			if ($time < new DateTime($_query->date2))
			{
				$_query->availableDates[] = array(
					'id' => 2,
					'start_time' => strtotime($_query->date2),
					'end_time' => strtotime($_query->date2) + ($_query->hours*3600),
				);
			}

			if ($time < new DateTime($_query->date3))
			{
				$_query->availableDates[] = array(
					'id' => 3,
					'start_time' => strtotime($_query->date3),
					'end_time' => strtotime($_query->date3) + ($_query->hours*3600),
				);
			}

			if (count($_query->availableDates) == 0)
			{
				HireRequest::destroy($_query->id);
				HireRequest::_refundHireRequest($_query->id);
				HireRequest::_sendCancelHireRequest($_query->id);
			}
			else
			{
				// Check for tutoring session conflicts
				$query2 = DB::table('tutoring_sessions')
					->where(
						$_query->other_what . '_id',
						'=',
						$_query->other_id
					)
					->orWhere(
						$_query->me_what . '_id',
						'=',
						$_query->me_id
					)
					->select('session_date', 'hours')
					->get();


				foreach ($query2 as $_query2) {
					$_query2->session_start = strtotime($_query2->session_date);
					$_query2->session_end = $_query2->session_start + ($_query2->hours*3600);

					foreach ($_query->availableDates as $i => $availableDate) {
						if (
							// Hire request start date - in the session
							(
								$_query2->session_start <= $availableDate['start_time']
								&& $availableDate['start_time'] <= $_query2->session_end
							)
							OR
							// Hire request end date - in the session
							(
								$_query2->session_start <= $availableDate['end_time']
								&& $availableDate['end_time'] <= $_query2->session_end
							)
						)
						{
							DB::table('hire_requests')
								->where('id', '=', $_query->id)
								->update(array(
									'date' . $availableDate['id'] => new DateTime('now')
								));

							unset($_query->availableDates[$i]);
							reset($_query->availableDates);
						}
					}
				}

				if (count($_query->availableDates) == 0)
				{
					HireRequest::destroy($_query->id);
					HireRequest::_refundHireRequest($_query->id);
					HireRequest::_sendCancelHireRequest($_query->id);
				}
			}
		}
		
		return true;
	}

	/**
	 * Approve Hire Request
	 * @param integer $hr_id
	 * @param integer $choice
	 * @return boolean Success
	 */
	public static function approveHireRequest($hr_id, $choice)
	{
		$hr = HireRequest::find($hr_id);
		if (!$hr)
		{
			return false;
		}

		if ($hr->tutor_id != Auth::user()->id)
		{
			return false;
		}

		$_time = '';
		if ($choice == 1)
		{
			$_time = $hr->date1;
		}
		elseif ($choice == 2)
		{
			$_time = $hr->date2;
		}
		else
		{
			$_time = $hr->date3;
		}

		$time = new DateTime('now + 3 hours');
		if ($time > new DateTime($_time))
		{
			return false;
		}

		// TO DO: Notif user

		$ts = new TutoringSession;
		$ts->student_id = $hr->student_id;
		$ts->tutor_id = $hr->tutor_id;
		$ts->hours = $hr->hours;
		$ts->price = $hr->price;
		$ts->session_date = new DateTime($_time);
		$ts->description = $hr->description;
		$ts->save();

		Payment::where('type', '=', 'pending_hire')
			->where('type_id', '=', $hr->id)
			->update(array(
				'type' => 'pending_tutoring_session',
				'type_id' => $ts->id
			));

		$hr->delete();
		return true;
	}

	/**
	 * Decline Hire Request
	 * @param integer $hr_id
	 * @return boolean Success
	 */
	public static function declineHireRequest($hr_id)
	{
		$hr = HireRequest::find($hr_id);
		if (!$hr)
		{
			return false;
		}

		if ($hr->tutor_id != Auth::user()->id)
		{
			return false;
		}

		$hr->delete();
		HireRequest::_refundHireRequest($hr_id);
		HireRequest::_sendCancelHireRequest($hr_id, false);
		return true;
	}

	/**
	 * Refund Hire Request
	 * @param integer $hr_id
	 * @return boolean TRUE
	 */
	public static function _refundHireRequest($hr_id)
	{
		Payment::where('type', '=', 'pending_hire')
			->where('type_id', '=', $hr_id)
			->delete();

		return true;
	}

	/**
	 * Send Hire Request Cancel Notification
	 * @param integer $hr_id
	 * @param boolean $auto (TRUE if auto canceled, FALSE if canceled by user)
	 * @param string $message
	 * @return boolean Success
	 */
	public static function _sendCancelHireRequest($hr_id, $auto = true, $message = '')
	{
		// TO DO: Notif user
	}

}
