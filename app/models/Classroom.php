<?php

class Classroom extends Eloquent {

	/**
	 * Validation rules
	 * @var array
	 */
	public static $create_rules = array(
		'name' => 'required|min:2|unique:classrooms',
		'description' => 'required'
	);

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'classrooms';

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
			WHERE classroom_users.user_id = classrooms.id) AS count_members
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

}
