<?php

class Alias extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'aliases';

	/**
	 * Make alias
	 * @param string $name
	 * @param string $type
	 * @param integer $id
	 * @return mixed Created alias or FALSE
	 */
	public static function makeAlias($name, $type, $id)
	{
		$exists = !!((int) Alias::where('type', '=', $type)
			->where('resource_id', '=', $id)
			->count());

		if ($exists)
		{
			return false;
		}

		$_alias = '';
		if ($type === 'User')
		{
			$_alias = Str::slug($name, '');
		}
		else
		{
			$_alias = Str::slug($name, '-');
		}

		if ($type === 'Subject')
		{
			$_alias .= '-tutors';
		}

		$add = '';
		do
		{
			$ok = !((int) Alias::where('alias', '=', $_alias . $add)
				->count());
			
			if (!$ok)
			{
				if ($add === '') $add = 2;
				else $add++;
			}
		} while (!$ok);

		$alias = new Alias;
		$alias->alias = $_alias . $add;
		$alias->type = $type;
		$alias->resource_id = $id;
		$alias->save();

		return $_alias . $add;
	}

	/**
	 * Returns URL (prefere alias)
	 * @param string $type
	 * @param integer $id
	 * @return string
	 */
	public static function getURL($type, $id)
	{
		return '[alias type=' . $type . ' id=' . $id . ']';
	}

}
