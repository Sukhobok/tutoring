<?php

class Thumb extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'thumbs';

	/**
	 * Do not store updated_at
	 */
	public function setUpdatedAtAttribute($value) {}

	/**
	 * Save the thumb
	 * @param integer $uid
	 * @param integer $pid
	 * @param string $type ('up' OR 'down')
	 * @return integer Result code:
	 *   -2 if error
	 *   -1 if exists
	 *   0 if swaps
	 *   1 if new
	 */
	public static function saveThumb($uid, $pid, $type)
	{
		// Check if the post exists
		if (!Post::find($pid)) return -2;

		// Check for previous thumb
		$thumb_type = DB::table('thumbs')
			->where('user_id', $uid)
			->where('post_id', $pid)
			->pluck('thumb_type');

		$date = new DateTime;

		if ($thumb_type)
		{
			if ($thumb_type == $type)
			{
				return -1;
			}
			else
			{
				DB::table('thumbs')
					->where('user_id', $uid)
					->where('post_id', $pid)
					->update(array(
						'thumb_type' => $type
					));

				return 0;
			}
		}
		else
		{
			$insert = array(
				'user_id' => $uid,
				'post_id' => $pid,
				'thumb_type' => $type,
				'created_at' => $date,
				'updated_at' => $date
			);

			DB::table('thumbs')->insert($insert);
			return 1;
		}
	}

}
