<?php

class FriendshipRequest extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'friendship_requests';

	/**
	 * Do not store updated_at
	 */
	public function setUpdatedAtAttribute($value) {}

	/**
	 * Save the friendship request
	 * If it's the case it accepts the friend request 
	 * @param integer $to
	 * @return boolean TRUE if inserted, FALSE if not
	 */
	public static function saveRequest($to)
	{
		// Check if he already sent a request
		$exists1 = DB::table('friendship_requests')
			->where('from_id', '=', Auth::user()->id)
			->where('to_id', '=', $to)
			->count();

		// Check if they are already friends
		$exists2 = DB::table('friendships')
			->where('user_id', '=', Auth::user()->id)
			->where('friend_id', '=', $to)
			->count();

		if (!$exists1 && !$exists2)
		{
			// Check if the other sent a friend request
			$exists3 = DB::table('friendship_requests')
				->where('to_id', '=', Auth::user()->id)
				->where('from_id', '=', $to)
				->count();

			if ($exists3)
			{
				// Delete the friend request ...
				DB::table('friendship_requests')
					->where('to_id', '=', Auth::user()->id)
					->where('from_id', '=', $to)
					->delete();

				// ... and make them friends
				$date = new DateTime;
				$insert = array();
				$insert[] = array(
					'user_id' => Auth::user()->id,
					'friend_id' => $to,
					'created_at' => $date
				);
				$insert[] = array(
					'user_id' => $to,
					'friend_id' => Auth::user()->id,
					'created_at' => $date
				);

				DB::table('friendships')->insert($insert);
			}
			else
			{
				$request = new FriendshipRequest;
				$request->from_id = Auth::user()->id;
				$request->to_id = $to;
				$request->save();
			}
		}

		return !$exists1 && !$exists2;
	}

}
