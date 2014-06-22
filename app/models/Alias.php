<?php

class Alias extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'aliases';

	/**
	 * Returns URL (prefere alias)
	 * @param string $type
	 * @param integer $id
	 * @return array
	 */
	public static function getURL($type, $id)
	{
		$alias = Alias::where('type', '=', $type)
			->where('resource_id', '=', $id)
			->get();

		if (count($alias) > 0)
		{
			return URL::to($alias[0]->alias);
		}
		else
		{
			return URL::route(strtolower($type) . '.view', $id);
		}
	}

}
