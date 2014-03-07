<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $appends = array('display_name');

	/**
	 * Validation rules
	 * @var array
	 */
	public static $signup_rules = array(
		'name' => 'required|min:2',
		'nickname' => '',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6|confirmed',
		'password_confirmation' => 'required|min:6'
	);

	public static $settings_profile_rules = array(
		'name' => 'required|min:2',
		'nickname' => '',
		'email' => 'required|email',
		'gender' => 'required'
	);

	public static $password_rules = array(
		'password' => 'required|min:6|confirmed',
		'password_confirmation' => 'required|min:6'
	);

	public static $birthday_rules = array(
		'b_year' => 'required|numeric|min:1914|max:2004',
		'b_month' => 'required|numeric|min:1|max:12',
		'b_day' => 'required|numeric|min:1|max:31'
	);

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Change user data
	 * @return string
	 */
	public static function change_user_data($what, $value)
	{
		$allowed = array('name', 'nickname', 'email');
		if(in_array($what, $allowed))
		{
			$user = Auth::user();

			$validator = Validator::make(
				array($what => $value),
				array($what => self::$signup_rules[$what])
			);

			if ($validator->passes()) {
				$user->$what = $value;
				$user->save();
			}

			return $user->$what;
		}
		return '';
	}

	/**
	 * Get user posts
	 * @return Post
	 */
	public function posts()
	{
		return $this->morphMany('Post', 'author');
	}

	/**
	 * Get profile posts for current user
	 * @return Post
	 */
	public function profile_posts()
	{
		return $this->morphMany('Post', 'postable');
	}

	/**
	 * Get display name
	 * @return string Format: Name (Nickname)
	 */
	public function getDisplayNameAttribute()
	{
		if ($this->nickname)
		{
			return $this->name . ' (' . $this->nickname . ')';
		}

		return $this->name;
	}

	/**
	 * Birthday setter
	 * @param array $value
	 */
	public function setBirthdayAttribute($value)
	{
		$return = $value['y'] . '-' . $value['m'] . '-' . $value['d'];
		$this->attributes['birthday'] = $return;
	}

	/**
	 * Birthday getter
	 * @param  string $value 
	 * @return array
	 */
	public function getBirthdayAttribute($value)
	{
		$arr = explode('-', $value);
		$return = array(
			'y' => (int) $arr[0],
			'm' => (int) $arr[1],
			'd' => (int) $arr[2]
		);

		return $return;
	}

	/**
	 * Get the unique identifier for the user.
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}