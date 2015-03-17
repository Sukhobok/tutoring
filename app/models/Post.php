<?php

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * Validation rules
	 * @var array
	 */
	public static $rules = array(
		// 'post' => 'required'
	);

	/**
	 * The query for getting the posts with additional info
	 */
	public static $postsQuery = 'SELECT posts.*,
		(SELECT GROUP_CONCAT(images.path)
		FROM images
		WHERE images.imageable_type = "Post"
		AND images.imageable_id = posts.id) AS images,
		
		(SELECT COUNT(*)
		FROM thumbs
		WHERE thumbs.post_id = posts.id
		AND thumbs.thumb_type = "up") AS thumbs_up,
		
		(SELECT COUNT(*)
		FROM thumbs
		WHERE thumbs.post_id = posts.id
		AND thumbs.thumb_type = "down") AS thumbs_down,
		
		posts.author_type,

		IF(posts.author_type="User",
			(SELECT CONCAT(users.id, "|,|", users.name, "|,|", users.profile_picture)
			FROM users
			WHERE users.id = posts.author_id),
			
			(SELECT "school stuff here")
		) AS author,

		CASE posts.postable_type
			WHEN "Classroom" THEN (
				SELECT classrooms.name
					FROM classrooms
					WHERE classrooms.id = posts.postable_id
			)

			WHEN "Group" THEN (
				SELECT groups.name
					FROM groups
					WHERE groups.id = posts.postable_id
			)

			ELSE ""
		END AS postable_name
		FROM posts';

	/**
	 * Get the author of the post
	 */
	public function author()
	{
		return $this->morphTo('author');
	}

	/**
	 * Get where is this posted
	 */
	public function postable()
	{
		return $this->morphTo('postable');
	}

	/**
	 * Get Images
	 * @return Image
	 */
	public function images()
	{
		return $this->morphMany('Image', 'imageable');
	}

	/**
	 * Get dashboard posts
	 * @return array Posts
	 */
	public static function getDashboardPosts()
	{
		$query = DB::select(self::$postsQuery . '
		WHERE 
			(posts.author_type="User"
				AND posts.author_id IN (
					SELECT friend_id
						FROM friendships
						WHERE user_id = ?
				)
			)
			OR
			(posts.author_type="User"
				AND posts.author_id = ?
			)
		ORDER BY posts.created_at DESC', array(Auth::user()->id, Auth::user()->id));
		
		$query = self::processPostsResult($query, true);
		return $query;
	}

	/**
	 * Process query result for posts
	 * @param array $posts - query result
	 * @param boolean $withContext (if it will show the context of the post)
	 *     (eg. Classroom, Group ...)
	 *     It just appends the property to the object and we do the check in the view
	 */
	public static function processPostsResult($posts, $withContext = false)
	{
		foreach ($posts as $post)
		{
			$post->withContext = $withContext;

			if ($post->images !== null)
			{
				$post->images = explode(',', $post->images);
			}
			else
			{
				$post->images = array();
			}

			$post->created_at = strtotime($post->created_at);
			$post->post = e($post->post); // prevent XSS
			$post->author = explode('|,|', $post->author);

			$post->author = array(
				'id' => $post->author[0],
				'name' => $post->author[1],
				'profile_picture' => $post->author[2]
			);

			if (!$post->author['profile_picture'])
			{
				if ($post->author_type == 'User')
				{
					$post->author['profile_picture'] = '/images/default_avatar.jpg';
				}
			}
			else
			{
				$post->author['profile_picture'] = HTML::get_from_s3(
					$post->author['profile_picture']
				);
			}

			$post->comments = DB::table('post_comments')
				->where('post_id', '=', $post->id)
				->join('users', 'post_comments.user_id', '=', 'users.id')
				->select(
					'users.name',
					'users.profile_picture',
					'users.id as author_id',
					'post_comments.comment',
					'post_comments.created_at'
				)
				->orderBy('post_comments.created_at', 'desc')
				->get();

			foreach ($post->comments as $comment)
			{
				$comment->created_at = strtotime($comment->created_at);
			}
		}

		return $posts;
	}

}
