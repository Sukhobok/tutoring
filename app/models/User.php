<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $appends = array('display_name', 'net_price');

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'users';

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
	 * The attributes excluded from the model's JSON form.
	 * @var array
	 */
	protected $hidden = array('password');

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
	public function profilePosts()
	{
		return $this->morphMany('Post', 'postable');
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
	 * Get hourly net rate
	 * @return float
	 */
	public function getNetPriceAttribute()
	{
		return $this->price - ($this->price / 10) - 1;
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
	 * Get the user posts
	 * @param integer $id
	 * @return array Posts
	 */
	public static function getUserPosts($id)
	{
		$query = DB::select(Post::$postsQuery . '
		WHERE postable_type = "User"
		AND postable_id = ?
		ORDER BY posts.created_at DESC', array($id));

		$query = Post::processPostsResult($query);
		return $query;
	}

	/**
	 * Search anything
	 * @param string $search
	 * @return array Search result
	 */
	public static function searchAnything($search)
	{
		// Add "*" after every word to match partial words
		$search = explode(' ', $search);
		$search = array_map(function($n)
		{
			return $n . '*';
		}, $search);
		$search = implode(' ', $search);

		// Queries
		$query = array();
		$query['users'] = 'SELECT users.name,
		"User" AS type,
		users.id,
		users.profile_picture AS profile_picture,
		(SELECT
			CASE user_education.type
				WHEN "highschool" THEN highschools.name
				ELSE universities.name
			END
			FROM user_education
			LEFT JOIN highschools ON (
				user_education.type = "highschool"
				AND user_education.education_id = highschools.id
			)
			LEFT JOIN universities ON (
				user_education.type != "highschool"
				AND user_education.education_id = universities.id
			)
			WHERE user_education.user_id = users.id
			ORDER BY FIELD (user_education.type, "graduation", "college", "highschool"),
				user_education.from DESC
			LIMIT 1
		) AS data
			FROM users
			WHERE MATCH(users.name) AGAINST(? IN BOOLEAN MODE)
			LIMIT 5';

		$query['groups'] = 'SELECT groups.name,
		"Group" AS type,
		groups.id,
		groups.profile_picture AS profile_picture,
		(SELECT COUNT(*)
			FROM group_users
			WHERE group_users.group_id = groups.id
		) AS data
			FROM groups
			WHERE MATCH(groups.name) AGAINST(? IN BOOLEAN MODE)
			LIMIT 5';

		$query['classrooms'] = 'SELECT classrooms.name,
		"Classroom" AS type,
		classrooms.id,
		"" AS profile_picture,
		(SELECT COUNT(*)
			FROM classroom_users
			WHERE classroom_users.classroom_id = classrooms.id
		) AS data
			FROM classrooms
			WHERE MATCH(classrooms.name) AGAINST(? IN BOOLEAN MODE)
			LIMIT 5';

		$query['universities'] = 'SELECT universities.name,
		"University" AS type,
		universities.id,
		"" AS profile_picture,
		universities.address AS data
			FROM universities
			WHERE MATCH(universities.name) AGAINST(? IN BOOLEAN MODE)
			OR MATCH(universities.acronym) AGAINST(? IN BOOLEAN MODE)
			LIMIT 5';

		$query['highschools'] = 'SELECT highschools.name,
		"Highschool" AS type,
		highschools.id,
		"" AS profile_picture,
		highschools.address AS data
			FROM highschools
			WHERE MATCH(highschools.name) AGAINST(? IN BOOLEAN MODE)
			LIMIT 5';

		$query = array_map(function($n)
		{
			return ' (' . $n . ') ';
		}, $query);
		$query = implode('UNION ALL', $query);
		$query = DB::select($query, array_fill(0, 6, $search));

		foreach ($query as $element)
		{
			$element->name = HTML::limit($element->name, 30);

			if ($element->data)
			{
				$element->data = HTML::limit($element->data, 30);
			}

			if ($element->type == 'User'
				|| $element->type == 'Group')
			{
				$element->profile_picture = HTML::profile_picture($element);
			}
			elseif ($element->type == 'Highschool'
				|| $element->type == 'University')
			{
				$element->profile_picture = HTML::school_profile_picture($element);
			}
		}

		return $query;
	}

	/**
	 * Get user tutors
	 * @param integer $uid (optional)
	 * @return array
	 */
	public static function getUserTutors($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		return DB::table('tutoring_sessions')
			->where('student_id', '=', $uid)
			->join('users', 'tutoring_sessions.tutor_id', '=', 'users.id')
			->select('users.name', 'users.id')
			->get();
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

	/**
	 * Laravel Update
	 * http://laravel.com/docs/upgrade
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

}
