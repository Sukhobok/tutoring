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
	 * Get users friendship requests
	 * @param integer $uid (optional)
	 * @return array
	 */
	public static function getUserRequests($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;
		
		$requests = DB::table('friendship_requests')
			->where('to_id', $uid)
			->join('users', 'users.id', '=', 'friendship_requests.from_id')
			->select('users.id', 'users.name', 'users.profile_picture', 'friendship_requests.created_at')
			->get();

		foreach ($requests as $request)
		{
			$request->created_at = strtotime($request->created_at);
		}

		return $requests;
	}

	/**
	 * Checks if $u1 can send a friend request to $u2
	 * @param integer $u1
	 * @param integer $u2
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
	 * Save a friendship request
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

	/**
	 * Accept a friendship request
	 * @param integer $from
	 * @return boolean
	 */
	public static function acceptRequest($from)
	{
		// Check if the other sent a friend request
		$otherSent = DB::table('friendship_requests')
			->where('to_id', '=', Auth::user()->id)
			->where('from_id', '=', $from)
			->count();

		if ($otherSent)
		{
			// Delete the friend request ...
			DB::table('friendship_requests')
				->where('to_id', '=', Auth::user()->id)
				->where('from_id', '=', $from)
				->delete();

			// ... and make them friends
			$date = new DateTime;
			$insert = array();
			$insert[] = array(
				'user_id' => Auth::user()->id,
				'friend_id' => $from,
				'created_at' => $date
			);
			$insert[] = array(
				'user_id' => $from,
				'friend_id' => Auth::user()->id,
				'created_at' => $date
			);

			DB::table('friendships')->insert($insert);
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Decline a friendship request
	 * @param integer $uid
	 * @return boolean TRUE
	 */
	public static function declineRequest($uid)
	{
		FriendshipRequest::where('to_id', '=', Auth::user()->id)
			->where('from_id', '=', $uid)
			->delete();

		return true;
	}

}
