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
	 * Get friends id of $uid that joined Classroom $cid
	 * @param integer $uid
	 * @param integer $cid
	 * @return array
	 */
	public static function getFriendsJoinedClassroom($uid, $cid)
	{
		return DB::table('friendships')
			->join('classroom_users', 'classroom_users.user_id', '=', 'friendships.friend_id')
			->where('friendships.user_id', '=', $uid)
			->where('classroom_users.classroom_id', '=', $cid)
			->whereNotNull('classroom_users.id')
			->lists('friendships.friend_id');
	}

	/**
	 * Get friends id of $uid that were invited to Classroom $cid
	 * @param integer $uid
	 * @param integer $cid
	 * @return array
	 */
	public static function getFriendsInvitedClassroom($uid, $cid)
	{
		return DB::table('friendships')
			->join('invitations', 'invitations.to_id', '=', 'friendships.friend_id')
			->where('friendships.user_id', '=', $uid)
			->where('invitations.object', '=', 'Classroom')
			->where('invitations.object_id', '=', $cid)
			->whereNotNull('invitations.id')
			->lists('friendships.friend_id');
	}

	/**
	 * Get friends id of $uid that joined Group $gid
	 * @param integer $uid
	 * @param integer $gid
	 * @return array
	 */
	public static function getFriendsJoinedGroup($uid, $gid)
	{
		return DB::table('friendships')
			->join('group_users', 'group_users.user_id', '=', 'friendships.friend_id')
			->where('friendships.user_id', '=', $uid)
			->where('group_users.group_id', '=', $gid)
			->whereNotNull('group_users.id')
			->lists('friendships.friend_id');
	}

	/**
	 * Get friends id of $uid that were invited to Group $gid
	 * @param integer $uid
	 * @param integer $gid
	 * @return array
	 */
	public static function getFriendsInvitedGroup($uid, $gid)
	{
		return DB::table('friendships')
			->join('invitations', 'invitations.to_id', '=', 'friendships.friend_id')
			->where('friendships.user_id', '=', $uid)
			->where('invitations.object', '=', 'Group')
			->where('invitations.object_id', '=', $gid)
			->whereNotNull('invitations.id')
			->lists('friendships.friend_id');
	}

	/**
	 * Get friend ids of $uid
	 * @param integer $uid
	 * @return array
	 */
	public static function getFriendIds($uid)
	{
		return DB::table('friendships')
			->where('friendships.user_id', '=', $uid)
			->lists('friendships.friend_id');
	}

	/**
	 * Get friends of $uid
	 * @param integer $uid
	 * @return array Friends
	 */
	public static function getFriends($uid)
	{
		return DB::table('friendships')
			->where('user_id', '=', $uid)
			->join('users', 'users.id', '=', 'friendships.friend_id')
			->select(
				'users.id',
				'users.name',
				'users.profile_picture',
				DB::raw('(SELECT
				CASE user_education.type
					WHEN "highschool" THEN highschools.name
					ELSE universities.name
				END
				FROM user_education
				LEFT JOIN highschools ON (
					user_education.type = "highschool"
					AND user_education.education_id = highschools.id
				)
				LEFT JOIN universities ON (
					user_education.type != "highschool"
					AND user_education.education_id = universities.id
				)
				WHERE user_education.user_id = users.id
				ORDER BY FIELD (user_education.type, "graduation", "college", "highschool"),
					user_education.from DESC
				LIMIT 1
				) AS education')
			)
			->get();
	}

	/**
	 * Checks if the users are friends
	 * @param int $u1
	 * @param int $u2
	 * @return bool
	 */
	public static function isFriend($u1, $u2)
	{
		return (bool) DB::table('friendships')
			->where('user_id', '=', $u1)
			->where('friend_id', '=', $u2)
			->count();
	}

	/**
	 * Checks if the users are friends/friends of friends
	 * @param int $u1
	 * @param int $u2
	 * @return bool
	 */
	public static function isFriendOfFriend($u1, $u2)
	{
		$query = 'SELECT COUNT(*) AS c
		FROM (
			(SELECT friend_id
				FROM friendships
				WHERE user_id = ?)
			
			UNION
			
			(SELECT friend_id
				FROM friendships
				WHERE user_id IN (
					SELECT friend_id
						FROM friendships
						WHERE user_id = ?
				))
		) AS fof
		WHERE fof.friend_id = ?';

		$result = DB::select($query, array($u1, $u1, $u2));
		return (bool) $result[0]->c;
	}

}
