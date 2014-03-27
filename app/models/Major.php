<?php

class Major extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'majors';

	/**
	 * Get the list of majors for autocomplete
	 * @param string $search
	 * @return array
	 */
	public static function ajaxList($search)
	{
		return DB::table('majors')
			->where('title', 'LIKE', '%' . $search . '%')
			->select('id', 'title')
			->take(5)
			->get();
	}

}
