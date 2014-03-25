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
	 * Checks if $u1 can send a friend request to $u2
	 * @param int $u1
	 * @param int $u2
	 * @return bool
	 */
	public static function canSendFriendshipRequest($u1, $u2, $previousData = array())
	{
		if (!isset($previousData['isFriend']))
		{
			// Check if they are already friends
			$previousData['isFriend'] = Friendship::isFriend($u1, $u2);
		}

		if (!isset($previousData['friendRequestSent']))
		{
			// Check if he already sent a request
			$previousData['friendRequestSent'] = (bool) DB::table('friendship_requests')
				->where('from_id', '=', $u1)
				->where('to_id', '=', $u2)
				->count();
		}

		if ($previousData['isFriend'] || $previousData['friendRequestSent'])
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	/**
	 * Save the friendship request
	 * If it's the case it accepts the friend request 
	 * @param integer $to
	 * @return boolean TRUE if saved, FALSE if not
	 */
	public static function saveRequest($to)
	{
		$canSend = FriendshipRequest::canSendFriendshipRequest(Auth::user()->id, $to);
		if ($canSend)
		{
			// Check if the other sent a friend request
			$otherSent = DB::table('friendship_requests')
				->where('to_id', '=', Auth::user()->id)
				->where('from_id', '=', $to)
				->count();

			if ($otherSent)
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

		return !$canSend;
	}

}
