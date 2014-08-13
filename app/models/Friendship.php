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
