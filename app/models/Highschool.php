<?php

class Highschool extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'highschools';

	/**
	 * Highschool posts
	 * @return Post
	 */
	public function posts()
	{
		return $this->morphMany('Post', 'author');
	}

	/**
	 * Posts on the highschool page
	 * @return Post
	 */
	public function highschoolProfilePosts()
	{
		return $this->morphMany('Post', 'postable');
	}

	/**
	 * Get the highschool info
	 * @param integer $id
	 * @return object Highschool info
	 */
	public static function getHighschoolData($id)
	{
		$query = DB::select('SELECT highschools.*
		FROM highschools
		WHERE highschools.id = ?
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
	 * Get the Highschool posts
	 * @param integer $id
	 * @return array Posts
	 */
	public static function getHighschoolPosts($id)
	{
		$query = DB::select(Post::$postsQuery . '
		WHERE postable_type = "Highschool"
		AND postable_id = ?
		ORDER BY posts.created_at DESC', array($id));

		$query = Post::processPostsResult($query);
		return $query;
	}

}
