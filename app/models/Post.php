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
		'post' => 'required'
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
		) AS author
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
	 * Process query result for posts
	 */
	public static function processPostsResult($posts)
	{
		foreach ($posts as $post)
		{
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
		}

		return $posts;
	}

}
