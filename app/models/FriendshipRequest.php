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
	 * Checks if authentificated user can send a friend request to $user
	 * @param integer $auid = Authentificated User ID
	 * @param User $user
	 * @param array $previousData (optional)
	 * @return boolean
	 */
	public static function canSendFriendshipRequest($auid, $user, $previousData = array())
	{
		if (!isset($previousData['isFriend']))
		{
			$previousData['isFriend'] = Friendship::isFriend(
				$auid,
				$user->id
			);
		}

		if (!isset($previousData['friendRequestSent']))
		{
			// Check if he already sent a request
			$previousData['friendRequestSent'] = (bool) DB::table('friendship_requests')
				->where('from_id', '=', $auid)
				->where('to_id', '=', $user->id)
				->count();
		}

		if ($previousData['isFriend'] || $previousData['friendRequestSent'])
		{
			return false;
		}
		else
		{
			if (!isset($previousData['isFriendOfFriend']))
			{
				$previousData['isFriendOfFriend'] = Friendship::isFriendOfFriend(
					$auid,
					$user->id
				);
			}

			switch ($user->notifications_friend_requests)
			{
				case 'Everybody':
					return true;
					break;

				case 'Friends of Friends':
					return $previousData['isFriendOfFriend'];
					break;

				case 'Nobody':
					return false;
					break;
			}
		}

		return false;
	}

	/**
	 * Save a friendship request
	 * If it's the case it accepts the friend request 
	 * @param integer $to
	 * @return boolean TRUE if saved, FALSE if not
	 */
	public static function saveRequest($to)
	{
		$canSend = FriendshipRequest::canSendFriendshipRequest(Auth::user()->id, User::find($to));
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
