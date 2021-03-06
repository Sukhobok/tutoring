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
		'first_name' => 'required|min:2',
		'last_name' => 'required|min:2',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6|confirmed',
		'password_confirmation' => 'required|min:6',
		'agree' => 'required'
	);

	public static $settings_profile_rules = array(
		'first_name' => 'required|min:2',
		'last_name' => 'required|min:2',
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

	public static $w9_rules = array(
		'name' => 'required',
		'address' => 'required',
		'city' => 'required',
		'state' => 'required',
		'zip' => 'required',
		'tax_status' => 'required|in:1,2,3,4,5,6,7',
		'tin_type' => 'required|in:1,2',
		'tin' => 'required',
		'correct_tin' => 'required|accepted',
		'backup_witholding' => 'required|accepted',
		'us_citizen' => 'required|accepted'
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
	public static function getBirthdayAttribute($value)
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
			->groupBy('users.id')
			->get();
	}

	/**
	 * Get user rating
	 * @param integer $uid
	 * @return array('1_stars', ..., '5_stars', 'count', 'sum', 'average')
	 */
	public static function get_user_rating($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$_1_stars = Feedback::where('stars', '=', '1')
			->where('tutor_id', '=', $uid)
			->count();
		$_2_stars = Feedback::where('stars', '=', '2')
			->where('tutor_id', '=', $uid)
			->count();
		$_3_stars = Feedback::where('stars', '=', '3')
			->where('tutor_id', '=', $uid)
			->count();
		$_4_stars = Feedback::where('stars', '=', '4')
			->where('tutor_id', '=', $uid)
			->count();
		$_5_stars = Feedback::where('stars', '=', '5')
			->where('tutor_id', '=', $uid)
			->count();

		$ratings = array();
		$ratings['1_stars'] = $_1_stars;
		$ratings['2_stars'] = $_2_stars;
		$ratings['3_stars'] = $_3_stars;
		$ratings['4_stars'] = $_4_stars;
		$ratings['5_stars'] = $_5_stars;
		$ratings['count'] = $_1_stars + $_2_stars + $_3_stars + $_4_stars + $_5_stars;
		$ratings['sum'] = ($_1_stars * 1)
			+ ($_2_stars * 2)
			+ ($_3_stars * 3)
			+ ($_4_stars * 4)
			+ ($_5_stars * 5);

		if ($ratings['count'] == 0)
		{
			$ratings['average'] = 0;
		}
		else
		{
			$ratings['average'] = round($ratings['sum'] / $ratings['count']);
		}

		return $ratings;
	}

	/**
	 * Get tutor info
	 * @param integer $uid
	 * @return array('subjects', 'sessions', 'hours', 'earnings', 'per_session')
	 */
	public static function get_tutor_info($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;
		$result = array();

		$subjects = DB::table('user_subjects')
			->where('user_id', '=', $uid)
			->count();

		$sessions = TutoringSession::where('tutor_id', '=', $uid)
			->where('session_date', '<', new DateTime('now'))
			->count();

		$hours = TutoringSession::where('tutor_id', '=', $uid)
			->where('session_date', '<', new DateTime('now'))
			->sum('hours');

		$earnings = Payment::where('type', '=', 'tutoring_session')
			->where('to_id', '=', $uid)
			->where('award_date', '<', new DateTime('now'))
			->sum('amount');

		$result['subjects'] = $subjects;
		$result['sessions'] = $sessions;
		$result['hours'] = $hours;
		$result['earnings'] = round($earnings);
		if ($sessions)
		{
			$result['per_session'] = round($earnings / $sessions);
		}
		
		return $result;
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
	 * Can see profile (Privacy)
	 * @param User $user
	 * @return boolean
	 */
	public static function canSeeProfile($user)
	{
		if ($user->security_see_profile == 'Everybody')
		{
			return true;
		}

		if (Auth::check())
		{
			switch ($user->security_see_profile)
			{
				case 'Friends of Friends':
					return Friendship::isFriendOfFriend(
						Auth::user()->id,
						$user->id
					);
					break;

				case 'Only Friends':
					return Friendship::isFriend(
						Auth::user()->id,
						$user->id
					);
					break;
			}
		}

		return false;
	}

	/**
	 * Check if the user is Busy
	 * @param integer $uid
	 * @param integer $hours
	 * @return boolean
	 */
	public static function isBusy($uid, $hours = 0)
	{
		HireNowRequest::deleteExpiredHireNowRequests($uid);
		$hnr = HireNowRequest::where('student_id', '=', $uid)
			->orWhere('tutor_id', '=', $uid)
			->count();

		if ($hnr) return true;

		$ts = DB::table('tutoring_sessions')
			->where('student_id', '=', $uid)
			->orWhere('tutor_id', '=', $uid)
			->leftJoin(
				'tutoring_sessions_info',
				'tutoring_sessions_info.ts_id', '=', 'tutoring_sessions.id'
			)
			->select(
				'tutoring_sessions.session_date',
				'tutoring_sessions.hours',
				'tutoring_sessions_info.started_at',
				'tutoring_sessions_info.ended_at'
			)
			->get();

		foreach ($ts as $_ts)
		{
			$_ts->session_start = strtotime($_ts->session_date);
			$_ts->session_end = $_ts->session_start + ($_ts->hours*3600) + 6*60;

			if ($_ts->started_at != '0000-00-00 00:00:00' && $_ts->started_at != null)
				$_ts->session_start = strtotime($_ts->started_at);

			if ($_ts->ended_at != '0000-00-00 00:00:00' && $_ts->ended_at != null)
				$_ts->session_end = strtotime($_ts->ended_at);

			$_now = new DateTime('now');
			$_end = new DateTime('now + ' . $hours . ' hours');

			if ($_ts->session_start <= $_now->getTimestamp()
				&& $_now->getTimestamp() <= $_ts->session_end)
			{
				return true;
			}

			if ($_ts->session_start <= $_end->getTimestamp()
				&& $_end->getTimestamp() <= $_ts->session_end)
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Get Header Notifications
	 * @param integer $uid (optional)
	 * @return array
	 */
	public static function getUserNotifications($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$query = 'SELECT users.name as from_name,
		users.profile_picture,
		invitations.id,
		invitations.object,
		invitations.object_id,
		invitations.created_at,
			CASE invitations.object
				WHEN "Classroom" THEN classrooms.name
				ELSE groups.name
			END as object_name
		FROM invitations
		LEFT JOIN users ON invitations.from_id = users.id
		LEFT JOIN classrooms ON (
			invitations.object = "Classroom"
			AND invitations.object_id = classrooms.id
		)
		LEFT JOIN groups ON (
			invitations.object != "Classroom"
			AND invitations.object_id = groups.id
		)
		WHERE invitations.to_id = ?
			AND invitations.status = "pending"';

		$query = DB::select($query, array_fill(0, 1, $uid));

		foreach ($query as $_query)
		{
			$_query->created_at = strtotime($_query->created_at);
		}

		return $query;
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
