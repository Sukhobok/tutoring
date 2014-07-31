<?php

class W9 extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'w9';

	/**
	 * The attributes that are mass assignable.
	 * (We need this for firstOrNew at SettingsController@postSendW9)
	 * @var array
	 */
	protected $fillable = array('user_id');

}
