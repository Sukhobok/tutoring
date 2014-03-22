<?php

class Group extends Eloquent {

	/**
	 * Validation rules
	 * @var array
	 */
	public static $create_rules = array(
		'name' => 'required|min:2|unique:groups',
		'description' => 'required'
	);

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'groups';

	/**
	 * Saves the group to the database
	 * @param string $name
	 * @param string $desc
	 * @return void
	 */
	public static function saveGroup($name, $desc)
	{
		$date = new DateTime;

		$insert = array(
			'name' => $name,
			'description' => $desc,
			'created_at' => $date,
			'updated_at' => $date
		);

		return DB::table('groups')->insertGetId($insert);
	}

}
