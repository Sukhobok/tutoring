<?php

class UserEducation extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'user_education';

	/**
	 * Validation rules
	 * @var array
	 */
	public static $education_rules = array(
		'type' => 'required|in:highschool,college,graduation',
		'degree' => 'required|in:n/a,bachelor,master,doctorate',
		'education_id' => 'required|not_in:0',
		'from' => 'required|year_range:-100,+5',
		'to' => 'required|year_range:-100,+5'
	);

	/**
	 * Do not store updated_at
	 */
	public function setUpdatedAtAttribute($value) {}

	/**
	 * Get the user education
	 * @param integer $uid
	 * @return array
	 */
	public static function getEducation($uid)
	{
		$result = DB::select('SELECT user_education.id,
		user_education.degree,
		user_education.from,
		user_education.to,
		user_education.type,

		IF(user_education.type = "highschool",
			(SELECT highschools.name
				FROM highschools
				WHERE highschools.id = user_education.education_id),
			
			(SELECT universities.name
				FROM universities
				WHERE universities.id = user_education.education_id)
		) AS name,

		IF(user_education.major_id != 0,
			(SELECT majors.title
				FROM majors
				WHERE majors.id = user_education.major_id),

			(SELECT "")
		) AS major
		FROM user_education
		WHERE user_education.user_id = ?
		ORDER BY FIELD(user_education.type, "graduation", "college", "highschool"),
			user_education.to DESC', array($uid));

		foreach ($result as &$_result)
		{
			if ($_result->type == 'highschool') $_result->type = 'Highschool';
			elseif ($_result->type == 'college') $_result->type = 'College';
			else $_result->type = 'Graduation School';

			if ($_result->degree == 'n/a') $_result->degree = 'N/A';
			elseif ($_result->degree == 'bachelor') $_result->degree = 'Bachelor Degree';
			elseif ($_result->degree == 'master') $_result->degree = 'Master Degree';
			else $_result->degree = 'Doctorate Degree';
		}

		return $result;
	}

	/**
	 * Delete education
	 * @param integer $ueid
	 */
	public static function deleteEducation($ueid)
	{
		return UserEducation::where('user_id', '=', Auth::user()->id)
			->where('id', $ueid)
			->delete();
	}

}
