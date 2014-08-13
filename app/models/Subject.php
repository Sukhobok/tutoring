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

	/**
	 * Get users that teach a subject
	 * @param integer $sid
	 * @param integer $offset
	 * @return array (count, data)
	 */
	public static function getSubjectUsers($sid, $offset = 0, $filters = array())
	{
		$query = DB::table('user_subjects')
			->where('subject_id', '=', $sid)
			->where(function ($query) use ($filters)
			{
				foreach ($filters as $filter)
				{
					switch ($filter)
					{
						case 'filter_20_30':
							$query->orWhere(function ($query)
							{
								$query->where('users.price', '>=', 20)
									->where('users.price', '<=', 30);
							});
							break;

						case 'filter_31_40':
							$query->orWhere(function ($query)
							{
								$query->where('users.price', '>=', 31)
									->where('users.price', '<=', 40);
							});
							break;

						case 'filter_41_50':
							$query->orWhere(function ($query)
							{
								$query->where('users.price', '>=', 41)
									->where('users.price', '<=', 50);
							});
							break;

						case 'filter_51':
							$query->orWhere(function ($query)
							{
								$query->where('users.price', '>=', 51);
							});
							break;
					}
				}
			})
			->join('users', 'user_subjects.user_id', '=', 'users.id')
			->select(
				'users.id',
				'users.name',
				'users.bio',
				'users.price',
				'users.profile_picture',
				'users.created_at'
			);

		if (in_array('available_now', $filters))
		{
			$query = $query->where('users.available', '=', 1);
		}

		$count = $query->count();
		$data = $query->skip($offset)->take(4)->get();

		return compact('count', 'data');
	}

	/**
	 * Get Popular Subjects
	 */
	public static function getPopularSubjects()
	{
		$subjects = DB::table('user_subjects')
			->select(
				'user_subjects.subject_id',
				'subjects.name',
				DB::raw('COUNT(user_subjects.subject_id) as c')
			)
			->join('subjects', 'subjects.id', '=', 'user_subjects.subject_id')
			->groupBy('subject_id')
			->orderBy('c', 'desc')
			->take(6)
			->get();

		foreach ($subjects as $subject)
		{
			$subject->users = Subject::getSubjectUsers($subject->subject_id);
		}

		return $subjects;
	}

}
