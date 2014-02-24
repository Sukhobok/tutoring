<?php

class Post extends Eloquent {

	/**
	 * Validation rules
	 * @var array
	 */
	public static $rules = array(
		'post' => 'required'
	);

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'posts';

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

}
