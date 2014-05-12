<?php

class HireRequest extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'hire_requests';

	/**
	 * Get all incoming request
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

		// TO DO: Notif user
		// TO DO: Give money back
	}

}
