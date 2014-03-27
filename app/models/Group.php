<?php

class Group extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'groups';
	
	/**
	 * Validation rules
	 * @var array
	 */
	public static $create_rules = array(
		'name' => 'required|min:2|unique:groups',
		'description' => 'required',
		'photo' => 'required_file|image'
	);

	/**
	 * Saves the group to the database
	 * @param string $name
	 * @param string $desc
	 * @return void
	 */
	public static function saveGroup($name, $desc, $filename)
	{
		$date = new DateTime;

		$insert = array(
			'name' => $name,
			'description' => $desc,
			'profile_picture' => $filename,
			'created_at' => $date,
			'updated_at' => $date
		);

		return DB::table('groups')->insertGetId($insert);
	}

	/**
	 * Group posts
	 * @return Post
	 */
	public function groupPosts()
	{
		return $this->morphMany('Post', 'postable');
	}

	/**
	 * Get the group info
	 * @param integer $id
	 * @return object Group info
	 */
	public static function getgroupData($id)
	{
		$query = DB::select('SELECT groups.*,
		(SELECT COUNT(*)
			FROM group_users
			WHERE group_users.group_id = groups.id) AS count_members
		FROM groups
		WHERE groups.id = ?
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
	 * Get the group posts
	 * @param integer $id
	 * @return array Posts
	 */
	public static function getGroupPosts($id)
	{
		$query = DB::select(Post::$postsQuery . '
		WHERE postable_type = "Group"
		AND postable_id = ?
		ORDER BY posts.created_at DESC', array($id));

		$query = Post::processPostsResult($query);
		return $query;
	}

	/**
	 * Get the user groups
	 * @param $uid
	 * @return array
	 */
	public static function getUserGroups($uid)
	{
		$query = DB::table('group_users')
			->where('user_id', '=', $uid)
			->join('groups', 'groups.id', '=', 'group_users.group_id')
			->select('groups.id', 'groups.name')
			->get();

		return $query;
	}

	/**
	 * Check if the user has joined the group
	 * @param $uid
	 * @param $gid
	 * @return boolean TRUE if joined, FALSE if not
	 */
	public static function isJoined($uid, $gid)
	{
		return (bool) DB::table('group_users')
			->where('user_id', '=', $uid)
			->where('group_id', '=', $gid)
			->count();
	}

	/**
	 * Joines the user to a group
	 * @param $uid
	 * @param $gid
	 * @return boolean Success
	 */
	public static function joinGroup($uid, $gid)
	{
		if (!Group::isJoined($uid, $gid))
		{
			$date = new DateTime;
			$insert = array(
				'group_id' => $gid,
				'user_id' => $uid,
				'created_at' => $date
			);

			DB::table('group_users')->insert($insert);
			return true;
		}

		return false;
	}

}
