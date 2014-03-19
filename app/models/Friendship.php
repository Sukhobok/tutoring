<?php

class Friendship extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'friendships';

	/**
	 * Do not store updated_at
	 */
	public function setUpdatedAtAttribute($value) {}

	/**
	 * Get friends of $uid
	 * @param integer $uid
	 * @return array Friend ids
	 */
	public static function getFriends($uid)
	{
		return DB::table('friendships')
			->where('user_id', $uid)
			->lists('friend_id');
	}

}
