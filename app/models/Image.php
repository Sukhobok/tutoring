<?php

class Image extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'images';

	/**
	 * Get the image place
	 */
	public function imageable()
	{
		return $this->morphTo('imageable');
	}

}
