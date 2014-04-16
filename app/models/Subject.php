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
		WHERE subjects.name LIKE ?', array('%' . $search . '%'));

		return $query;
	}

}
