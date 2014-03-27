<?php

class University extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'universities';

	/**
	 * University posts
	 * @return Post
	 */
	public function posts()
	{
		return $this->morphMany('Post', 'author');
	}

	/**
	 * Posts on the university page
	 * @return Post
	 */
	public function universityProfilePosts()
	{
		return $this->morphMany('Post', 'postable');
	}

	/**
	 * Get the university info
	 * @param integer $id
	 * @return object University info
	 */
	public static function getUniversityData($id)
	{
		$query = DB::select('SELECT universities.*
		FROM universities
		WHERE universities.id = ?
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
	 * Get the University posts
	 * @param integer $id
	 * @return array Posts
	 */
	public static function getUniversityPosts($id)
	{
		$query = DB::select(Post::$postsQuery . '
		WHERE postable_type = "University"
		AND postable_id = ?
		ORDER BY posts.created_at DESC', array($id));

		$query = Post::processPostsResult($query);
		return $query;
	}

	/**
	 * Get the list of universities for autocomplete
	 * @param string $search
	 * @return array
	 */
	public static function ajaxList($search)
	{
		return DB::table('universities')
			->where('name', 'LIKE', '%' . $search . '%')
			->select('id', 'name', 'address')
			->take(5)
			->get();
	}

}
