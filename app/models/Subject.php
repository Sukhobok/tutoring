<?php

class Subject extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'subjects';

	/**
	 * Do not store updated_at
	 */
	public function setUpdatedAtAttribute($value) {}

	/**
	 * Do not store created_at
	 */
	public function setCreatedAtAttribute($value) {}

	/**
	 * Subjects autocomplete
	 * @param string $search
	 * @return array
	 */
	public static function searchAutocomplete($search)
	{
		$query = DB::select('SELECT subjects.id, subjects.name
		FROM subjects
		WHERE subjects.name LIKE ?
		LIMIT 10', array('%' . $search . '%'));

		return $query;
	}

	/**
	 * Check if the user is tutoring a specific subject
	 * @param integer $uid
	 * @param integer $sid
	 * @return boolean TRUE if tutoring, FALSE if not
	 */
	public static function isTutoringSubject($uid, $sid)
	{
		return (bool) DB::table('user_subjects')
			->where('user_id', '=', $uid)
			->where('subject_id', '=', $sid)
			->count();
	}

	/**
	 * Check if the user is a tutor
	 * @param integer $uid
	 * @return boolean TRUE if tutor, FALSE if not
	 */
	public static function isTutor($uid)
	{
		return (bool) DB::table('user_subjects')
			->where('user_id', '=', $uid)
			->count();
	}

	/**
	 * Assign a subject to a user
	 * @param integer $uid
	 * @param integer $sid
	 * @return boolean Success
	 */
	public static function addUserSubject($uid, $sid)
	{
		if (!Subject::isTutoringSubject($uid, $sid))
		{
			$date = new DateTime;
			$insert = array(
				'subject_id' => $sid,
				'user_id' => $uid,
				'created_at' => $date
			);

			DB::table('user_subjects')->insert($insert);
			return true;
		}

		return false;
	}

	/**
	 * Delete a subject from a user
	 * @param integer $uid
	 * @param integer $sid
	 * @return boolean TRUE
	 */
	public static function deleteUserSubject($uid, $sid)
	{
		DB::table('user_subjects')
			->where('user_id', '=', $uid)
			->where('subject_id', '=', $sid)
			->delete();

		return true;
	}

	/**
	 * Get what the user tutors
	 * @param integer $uid (optional)
	 * @return array
	 */
	public static function getUserSubjects($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		return DB::table('user_subjects')
			->where('user_id', '=', $uid)
			->join('subjects', 'user_subjects.subject_id', '=', 'subjects.id')
			->select('subjects.id', 'subjects.name')
			->get();
	}

}
