<?php

class UserController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Sign Up
	 */
	public function postSignUp()
	{
		$validator = Validator::make(
			Input::all(),
			User::$signup_rules
		);

		if ($validator->passes())
		{
			$user = new User;
			$user->nickname = Input::get('nickname');
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			));

			return Redirect::route('dashboard');
		}
		else
		{
			return Redirect::to('/')
				->withInput()
				->with('validator_errors', array_keys($validator->failed()));
		}
	}

	/**
	 * Log In
	 */
	public function postLogIn()
	{
		if (Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		)))
		{
			return Redirect::route('dashboard');
		}
		else
		{
			return Redirect::to('/')
				->with('login_error', true);
		}
	}

	/**
	 * Log Out
	 */
	public function getLogOut()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	/**
	 * Get User page
	 */
	public function getUser($id)
	{
		$user = User::find($id);
		if (!$user)
		{
			App::abort('404');
		}

		$_userSubjects = Subject::getUserSubjects($user->id);
		$userSubjects = array();
		foreach ($_userSubjects as $subject)
		{
			$userSubjects[] = $subject->name;
		}
		$userSubjects = implode(', ', $userSubjects);

		$userEducation = UserEducation::getEducation($user->id);

		$posts = User::getUserPosts($id);
		$friends = Friendship::getFriends($id);
		$images = $user->images;
		$isTutor = (bool) count($_userSubjects);

		if (Auth::check())
		{
			$isFriend = Friendship::isFriend(Auth::user()->id, $user->id);
			$canSendFR = FriendshipRequest::canSendFriendshipRequest(
				Auth::user()->id,
				$user->id,
				array(
					'isFriend' => $isFriend
				)
			);
		}

		$this->layout->content = View::make(
			'user.view',
			compact(
				'user',
				'userSubjects',
				'userEducation',
				'posts',
				'friends',
				'images',
				'isFriend',
				'canSendFR',
				'isTutor'
			)
		);
	}

	/**
	 * Search a tutor
	 */
	public function getTutorSearch()
	{
		$main_subjects = DB::table('main_subjects')->get();

		// Group subjects by main subject id
		$_subjects = Subject::orderBy('main_subject_id', 'asc')
			->get();
		$subjects = array();
		foreach ($_subjects as $subject)
		{
			$subjects[$subject->main_subject_id][] = $subject;
		}

		$this->layout->content = View::make(
			'user.tutor_search',
			compact('main_subjects', 'subjects')
		);
	}

	/**
	 * Ajax: Search a tutor
	 */
	public function ajaxTutorSearch()
	{
		if (!Input::get('name') && !Input::get('subjects'))
		{
			return '';
		}

		$users = DB::table('users')
			->select(
				'users.id',
				'users.name',
				'users.bio',
				'users.price',
				'users.profile_picture',
				DB::raw('group_concat(subjects.name separator "|=|") as subjects')
			)
			->groupBy('users.id');

		if (Input::get('name'))
		{
			$users = $users->where(function ($query)
			{
				$query->where('users.name', 'LIKE', Input::get('name') . '%');
				$query->orWhere('users.name', 'LIKE', '% ' . Input::get('name') . '%');
			})
			->whereRaw('exists (select null from user_subjects where users.id = user_subjects.user_id)');
		}

		if (Input::get('subjects'))
		{
			$users = $users->whereIn(
				'user_subjects.subject_id',
				explode(',', Input::get('subjects'))
			);
		}

		if (Input::get('available') == '1')
		{
			$users = $users->where('users.available', '=', 1);
		}

		$users = $users->where('users.price', '<=', (int) Input::get('price'))
			->join('user_subjects', 'users.id', '=', 'user_subjects.user_id')
			->join('subjects', 'user_subjects.subject_id', '=', 'subjects.id')
			->get();

		if (count($users) == 0)
		{
			return '';
		}

		$result = '';
		foreach ($users as $user)
		{
			$user->subjects = explode('|=|', $user->subjects);

			$result .= View::make(
				'user.snippets.tutor_search_result',
				compact('user')
			);
		}

		return $result;
	}

	/**
	 * Ajax: Upload user photos
	 */
	public function ajaxUploadPhotos()
	{
		$uploaded = array();
		if (Input::file('user_photos')[0])
		{
			foreach (Input::file('user_photos') as $photo)
			{
				$filename = 'user_pictures/' . time() . str_random(16) . '.jpg';
				$image = GDImage::make($photo->getRealPath())
					->resize(800, null, true, false); // Max width: 800
				
				$s3 = AWS::get('s3');
				$result = $s3->putObject(array(
					'Bucket' => Config::get('s3.bucket'),
					'Key' => $filename,
					'Body' => $image->encode('jpg'),
					'ACL' => 'public-read'
				));

				$image = new Image;
				$image->path = $filename;

				Auth::user()->images()->save($image);
				$uploaded[] = HTML::get_from_s3($filename);
			}
		}

		return $uploaded;
	}

	/**
	 * Ajax: Delete specific user photo
	 */
	public function ajaxDeletePhoto()
	{
		$id = (int) Input::get('id');
		if ($id)
		{
			$image = Image::find($id);
			if ($image && $image->imageable_id === Auth::user()->id
				&& $image->imageable_type === 'User')
			{
				$s3 = AWS::get('s3');
				$s3->deleteObject(array(
					'Bucket' => Config::get('s3.bucket'),
					'Key' => $image->path
				));

				$image->delete();
				// TO DO: Delete associated comments
				return array('error' => 0);
			}
		}

		return array('error' => 1);
	}

	/**
	 * Ajax: Send hire request
	 */
	public function ajaxHire()
	{
		// Start validation
		if ((int) Input::get('hours') < 1 || (int) Input::get('hours') > 4)
		{
			return array('error' => 1, 'error_type' => 'hours');
		}

		if (Input::get('description') == '')
		{
			return array('error' => 1, 'error_type' => 'description');
		}

		$datetime_check = new DateTime('now + 3 hours');
		$datetimes = array();

		for ($i = 1; $i <= 3; $i++)
		{
			if ((int) Input::get('time' . $i . '_y') < (int) date('Y')
				|| (int) Input::get('time' . $i . '_y') > (int) date('Y') + 1)
			{
				return array('error' => 1, 'error_type' => 'time_y');
			}

			if ((int) Input::get('time' . $i . '_m') < 1
				|| (int) Input::get('time' . $i . '_m') > 12)
			{
				return array('error' => 1, 'error_type' => 'time_m');
			}

			if ((int) Input::get('time' . $i . '_d') < 1
				|| (int) Input::get('time' . $i . '_d') > 31)
			{
				return array('error' => 1, 'error_type' => 'time_d');
			}

			if ((int) Input::get('time' . $i . '_h') < 0
				|| (int) Input::get('time' . $i . '_h') > 23)
			{
				return array('error' => 1, 'error_type' => 'time_h');
			}

			if ((int) Input::get('time' . $i . '_min') != 0
				&& (int) Input::get('time' . $i . '_min') != 15
				&& (int) Input::get('time' . $i . '_min') != 30
				&& (int) Input::get('time' . $i . '_min') != 45)
			{
				return array('error' => 1, 'error_type' => 'time_min');
			}

			$datetimes[$i] = new DateTime(
				Input::get('time' . $i . '_y') . '-'
					. Input::get('time' . $i . '_m') . '-'
					. Input::get('time' . $i . '_d') . ' '
					. Input::get('time' . $i . '_h') . ':'
					. Input::get('time' . $i . '_min')
			);

			if ($datetime_check > $datetimes[$i])
			{
				return array('error' => 1, 'error_type' => 'time_check');
			}
		}

		if ($datetimes[1] == $datetimes[2]
			|| $datetimes[1] == $datetimes[3]
			|| $datetimes[2] == $datetimes[3])
		{
			return array('error' => 1, 'error_type' => 'time_equal');
		}

		if (!Subject::isTutor(Input::get('tutor_id'))
			|| (int) Input::get('tutor_id') == (int) Auth::user()->id)
		{
			return array('error' => 1, 'error_type' => 'tutor');
		}

		$price = (int) User::find(Input::get('tutor_id'))->price * (int) Input::get('hours');
		$userMoney = Payment::getAvailableMoney();
		if ($userMoney < $price)
		{
			return array('error' => 1, 'error_type' => 'money');
		}

		// Validated, now save
		$hr = new HireRequest;
		$hr->student_id = Auth::user()->id;
		$hr->tutor_id = (int) Input::get('tutor_id');
		$hr->hours = (int) Input::get('hours');
		$hr->price = $price;
		$hr->last = 'student';
		$hr->date1 = $datetimes[1];
		$hr->date2 = $datetimes[2];
		$hr->date3 = $datetimes[3];
		$hr->description = Input::get('description');
		$hr->save();

		$p = new Payment;
		$p->from_id = Auth::user()->id;
		$p->to_id = (int) Input::get('tutor_id');
		$p->type = 'pending_hire';
		$p->type_id = $hr->id;
		$p->award_date = new DateTime('now + 2 years');
		$p->amount = $price;
		$p->save();

		return array('error' => 0);
	}

	/**
	 * Ajax: Send hire now request
	 */
	public function ajaxHireNow()
	{
		// Start validation
		if ((int) Input::get('hours') < 1 || (int) Input::get('hours') > 4)
		{
			return array('error' => 1, 'error_type' => 'hours');
		}

		if (Input::get('description') == '')
		{
			return array('error' => 1, 'error_type' => 'description');
		}

		if (!Subject::isTutor(Input::get('tutor_id'))
			|| (int) Input::get('tutor_id') == (int) Auth::user()->id)
		{
			return array('error' => 1, 'error_type' => 'tutor');
		}

		$price = (int) User::find(Input::get('tutor_id'))->price * (int) Input::get('hours');
		$userMoney = Payment::getAvailableMoney();
		if ($userMoney < $price)
		{
			return array('error' => 1, 'error_type' => 'money');
		}

		$expire = new DateTime('now + 1 minute');

		// Validated, now save
		$hr = new HireNowRequest;
		$hr->student_id = Auth::user()->id;
		$hr->tutor_id = (int) Input::get('tutor_id');
		$hr->hours = (int) Input::get('hours');
		$hr->price = $price;
		$hr->description = Input::get('description');
		$hr->save();

		$p = new Payment;
		$p->from_id = Auth::user()->id;
		$p->to_id = (int) Input::get('tutor_id');
		$p->type = 'pending_hire_now';
		$p->type_id = $hr->id;
		$p->award_date = new DateTime('now + 2 years');
		$p->amount = $price;
		$p->save();

		// Send to socket.io
		$elephant = new Elephant(Config::get('elephant.domain'));
		$elephant->setHandshakeQuery(array(
			'signature' => Config::get('elephant.signature')
		));

		$elephant->init();
		$elephant->emit('hire_now', array(
			'request_id' => $hr->id,
			'student_id' => Auth::user()->id,
			'student_name' => Auth::user()->name,
			'student_profile_picture' => HTML::profile_picture(Auth::user()),
			'tutor_id' => (int) Input::get('tutor_id'),
			'hours' => (int) Input::get('hours'),
			'price' => $price,
			'description' => Input::get('description'),
			'expire' => $expire->getTimestamp()
		));
		$elephant->close();

		return array('error' => 0);
	}

	/**
	 *
	 */
	public function ajaxHireNowApprove()
	{
		//
	}

	/**
	 *
	 */
	public function ajaxHireNowDecline()
	{
		//
	}

}
