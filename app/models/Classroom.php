<?php

class Classroom extends Eloquent {

	/**
	 * Validation rules
	 * @var array
	 */
	public static $create_rules = array(
		'name' => 'required|min:2|unique:classrooms',
		'description' => 'required'
	);

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'classrooms';

	/**
	 * Saves the classroom to the database
	 * @param string $name
	 * @param string $desc
	 * @return void
	 */
	public static function saveClassroom($name, $desc)
	{
		$date = new DateTime;

		$insert = array(
			'name' => $name,
			'description' => $desc,
			'created_at' => $date,
			'updated_at' => $date
		);

		return DB::table('classrooms')->insertGetId($insert);
	}

}
