<?php

class HireNowRequest extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'hire_now_requests';

	/**
	 * Delete expired Hire Now Requests
	 * @param integer $uid (optional)
	 * @return boolean TRUE
	 */
	public static function deleteExpiredHireNowRequests($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$hnr = HireNowRequest::where('created_at', '<=', new DateTime('now - 1 minute'))
			->where(function ($query) use ($uid)
			{
				$query->where('student_id', '=', $uid);
				$query->orWhere('tutor_id', '=', $uid);
			})
			->get();

		foreach ($hnr as $_hnr)
		{
			HireNowRequest::destroy($_hnr->id);
			HireNowRequest::_refundHireNowRequest($_hnr->id);
			HireNowRequest::_sendCancelHireNowRequest($_hnr->id);
		}

		return true;
	}

	/**
	 * Approve Hire Now Request
	 * @param integer $hnr_id
	 * @return boolean FALSE or integer student_id
	 */
	public static function approveHireNowRequest($hnr_id)
	{
		$hnr = HireNowRequest::find($hnr_id);
		if (!$hnr)
		{
			return false;
		}

		if ($hnr->tutor_id != Auth::user()->id)
		{
			return false;
		}

		// TO DO: Notif user

		$ts = new TutoringSession;
		$ts->student_id = $hnr->student_id;
		$ts->tutor_id = $hnr->tutor_id;
		$ts->hours = $hnr->hours;
		$ts->price = $hnr->price;
		$ts->session_date = new DateTime('now');
		$ts->description = $hnr->description;
		$ts->save();

		Payment::where('type', '=', 'pending_hire_now')
			->where('type_id', '=', $hnr->id)
			->update(array(
				'type' => 'pending_tutoring_session',
				'type_id' => $ts->id
			));

		$hnr->delete();
		return $ts->student_id;
	}

	/**
	 * Decline Hire Now Request
	 * @param integer $hnr_id
	 * @return boolean FALSE or integer student_id
	 */
	public static function declineHireNowRequest($hnr_id)
	{
		$hnr = HireNowRequest::find($hnr_id);
		if (!$hnr)
		{
			return false;
		}

		if ($hnr->tutor_id != Auth::user()->id)
		{
			return false;
		}

		$student_id = $hnr->student_id;
		$hnr->delete();
		HireNowRequest::_refundHireNowRequest($hnr_id);
		HireNowRequest::_sendCancelHireNowRequest($hnr_id, false);
		return $student_id;
	}

	/**
	 * Refund Hire Now Request
	 * @param integer $hnr_id
	 * @return boolean TRUE
	 */
	public static function _refundHireNowRequest($hnr_id)
	{
		Payment::where('type', '=', 'pending_hire_now')
			->where('type_id', '=', $hnr_id)
			->delete();

		return true;
	}

	/**
	 * Send Hire Now Request Cancel Notification
	 * @param integer $hnr_id
	 * @param boolean $auto (TRUE if auto canceled, FALSE if canceled by user)
	 * @param string $message
	 * @return boolean Success
	 */
	public static function _sendCancelHireNowRequest($hnr_id, $auto = true, $message = '')
	{
		// TO DO: Notif user
	}

}
