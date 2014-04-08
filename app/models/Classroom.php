<?php

class Classroom extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'classrooms';
	
	/**
	 * Validation rules
	 * @var array
	 */
	public static $create_rules = array(
		'name' => 'required|min:2|unique:classrooms',
		'description' => 'required'
	);

	/**
	 * Saves the classroom to the database
	 * @param string $name
	 * @param string $desc
	 * @return void
	 */
	public static function saveClassroom($name, $desc)
	{
		$date = new DateTime;

		$insert = array(
			'name' => $name,
			'description' => $desc,
			'created_at' => $date,
			'updated_at' => $date
		);

		return DB::table('classrooms')->insertGetId($insert);
	}

	/**
	 * Classroom posts
	 * @return Post
	 */
	public function classroomPosts()
	{
		return $this->morphMany('Post', 'postable');
	}

	/**
	 * Get the classroom info
	 * @param integer $id
	 * @return object Classroom info
	 */
	public static function getClassroomData($id)
	{
		$query = DB::select('SELECT classrooms.*,
		(SELECT COUNT(*)
			FROM classroom_users
			WHERE classroom_users.classroom_id = classrooms.id) AS count_members
		FROM classrooms
		WHERE classrooms.id = ?
		LIMIT 1', array($id));

		if ($query)
		{
			return $query[0];
		}
		else
		{
			return array();
		}
	}

	/**
	 * Get the classroom posts
	 * @param integer $id
	 * @return array Posts
	 */
	public static function getClassroomPosts($id)
	{
		$query = DB::select(Post::$postsQuery . '
		WHERE postable_type = "Classroom"
		AND postable_id = ?
		ORDER BY posts.created_at DESC', array($id));

		$query = Post::processPostsResult($query);
		return $query;
	}

	/**
	 * Get the user classrooms
	 * @param $uid
	 * @return array
	 */
	public static function getUserClassrooms($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$query = DB::table('classroom_users')
			->where('user_id', '=', $uid)
			->join('classrooms', 'classrooms.id', '=', 'classroom_users.classroom_id')
			->select('classrooms.id', 'classrooms.name')
			->get();

		$query = DB::select('SELECT classrooms.id,
		classrooms.name,
		(SELECT COUNT(*)
			FROM classroom_users
			WHERE classroom_users.classroom_id = classrooms.id) AS count_members
		FROM classrooms
		WHERE classrooms.id IN (
			SELECT classroom_users.classroom_id
				FROM classroom_users
				WHERE classroom_users.user_id = ?
			)', array($uid));

		return $query;
	}

	/**
	 * Get suggested classrooms
	 * @param $uid
	 * @return array
	 */
	public static function getSuggestedClassrooms($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$query = DB::select('SELECT classrooms.*,
		(SELECT COUNT(*)
			FROM classroom_users
			WHERE classroom_users.classroom_id = classrooms.id) AS count_members
		FROM classroom_users, classrooms
		WHERE
			classroom_users.classroom_id = classrooms.id 
			
			AND classroom_users.user_id IN (
				SELECT friendships.friend_id
					FROM friendships
					WHERE friendships.user_id = ?
			)

			AND classrooms.id NOT IN (
				SELECT classroom_users.classroom_id
					FROM classroom_users
					WHERE classroom_users.user_id = ?
			)
		', array($uid, $uid));

		return $query;
	}

	/**
	 * Check if the user has joined the classroom
	 * @param $uid
	 * @param $cid
	 * @return boolean TRUE if joined, FALSE if not
	 */
	public static function isJoined($uid, $cid)
	{
		return (bool) DB::table('classroom_users')
			->where('user_id', '=', $uid)
			->where('classroom_id', '=', $cid)
			->count();
	}

	/**
	 * Joines the user to a classroom
	 * @param $uid
	 * @param $cid
	 * @return boolean Success
	 */
	public static function joinClassroom($uid, $cid)
	{
		if (!Classroom::isJoined($uid, $cid))
		{
			$date = new DateTime;
			$insert = array(
				'classroom_id' => $cid,
				'user_id' => $uid,
				'created_at' => $date
			);

			DB::table('classroom_users')->insert($insert);
			return true;
		}

		return false;
	}

	/**
	 * Get the list of classrooms for autocomplete
	 * @param string $search
	 * @return array
	 */
	public static function ajaxList($search)
	{
		return DB::table('classrooms')
			->where('name', 'LIKE', '%' . $search . '%')
			->select('id', 'name')
			->take(5)
			->get();
	}

}
