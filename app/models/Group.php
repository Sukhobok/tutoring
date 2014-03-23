<?php

class Group extends Eloquent {

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
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'groups';

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
			WHERE group_users.user_id = groups.id) AS count_members
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

}
