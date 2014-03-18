<?php

class Friendship extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'friendships';

	/**
	 * Do not store updated_at
	 */
	public function setUpdatedAtAttribute($value) {}

}
