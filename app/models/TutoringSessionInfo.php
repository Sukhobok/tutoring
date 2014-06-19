<?php

class TutoringSessionInfo extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'tutoring_sessions_info';

	/**
	 * Auto increment key
	 * @var boolean
	 */
	public $incrementing = false;

	/**
	 * Guarded variables
	 * @var boolean
	 */
	protected $guarded = array();

	/**
	 * Primary Key
	 * @var string
	 */
	public $primaryKey = 'ts_id';


}
