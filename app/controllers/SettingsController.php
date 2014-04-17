<?php

class SettingsController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * My Profile
	 */
	public function getProfile()
	{
		$messages = array();
		$user = Auth::user();
		$education = UserEducation::getEducation($user->id);

		$this->layout->content = View::make(
			'settings.profile', 
			compact('messages', 'user', 'education')
		);
	}

	/**
	 * POST process: Save user general info from "My Profile" page
	 */
	public function postProfile()
	{
		$messages = array();
		$user = Auth::user();
		$education = UserEducation::getEducation($user->id);

		$validator = Validator::make(
			Input::all(),
			User::$settings_profile_rules
		);

		if ($validator->passes())
		{
			$messages[] = 'Changes saved!';
			$user->name = Input::get('name');
			$user->nickname = Input::get('nickname');
			$user->email = Input::get('email');
			$user->gender = Input::get('gender');

			if (Input::get('b_save'))
			{
				$birthday_validator = Validator::make(
					Input::all(),
					User::$birthday_rules
				);

				if ($birthday_validator->passes())
				{
					$user->birthday = array(
						'y' => Input::get('b_year'),
						'm' => Input::get('b_month'),
						'd' => Input::get('b_day')
					);
				}
			}

			if (Input::get('old_password'))
			{
				$password_validator = Validator::make(
					Input::all(),
					User::$password_rules
				);

				if ($password_validator->passes()
					&& Hash::check(Input::get('old_password'), $user->password))
				{
					$user->password = Hash::make(Input::get('password'));
				}
				else
				{
					$messages[] = 'Incorrect password!';
				}
			}

			if (Input::hasFile('photo')
				&& Input::get('profile_w') > 0
				&& Input::get('profile_w') == Input::get('profile_h'))
			{
				$photo = Input::file('photo');
				list($src_w, $src_h) = getimagesize($photo->getRealPath());

				$profile_w = Input::get('profile_w');
				$profile_h = Input::get('profile_h');
				$profile_x = Input::get('profile_x');
				$profile_y = Input::get('profile_y');

				if ($src_w > 350)
				{
					$ratio = $src_w/350;
					$profile_w*=$ratio;
					$profile_h*=$ratio;
					$profile_x*=$ratio;
					$profile_y*=$ratio;
				}

				$filename = 'profile_pictures/' . time() . str_random(16) . '.jpg';
				$image = GDImage::make($photo->getRealPath())
					->crop($profile_w, $profile_h, $profile_x, $profile_y)
					->resize(160, null, true, false);
				
				$s3 = AWS::get('s3');
				if ($user->profile_picture)
				{
					$s3->deleteObject(array(
						'Bucket' => Config::get('s3.bucket'),
						'Key' => $user->profile_picture
					));
				}

				$user->profile_picture = $filename;
				$s3->putObject(array(
					'Bucket' => Config::get('s3.bucket'),
					'Key' => $filename,
					'Body' => $image->encode('jpg'),
					'ACL' => 'public-read'
				));
			}

			$user->save();
		}

		$this->layout->content = View::make(
			'settings.profile', 
			compact('messages', 'user', 'education')
		);
	}

	/**
	 * POST process: Save user education from "My Profile" page
	 */
	public function postSaveEducation()
	{
		$_inputs = array();
		for ($k = 0; $k < count(Input::get('type')); $k++)
		{
			$_inputs[] = array(
				'type' => Input::get('type')[$k],
				'degree' => Input::get('degree')[$k],
				'education_id' => (int) Input::get('education_id')[$k],
				'from' => (int) Input::get('from')[$k],
				'to' => (int) Input::get('to')[$k],
				'major_id' => (int) Input::get('major_id')[$k]
			);
		}

		foreach ($_inputs as $_input)
		{
			$validator = Validator::make(
				$_input,
				UserEducation::$education_rules
			);

			if ($validator->passes()
				&& $_input['from'] < $_input['to'])
			{
				$education = new UserEducation;
				$education->user_id = Auth::user()->id;
				$education->type = $_input['type'];
				$education->degree = $_input['degree'];
				$education->education_id = $_input['education_id'];
				$education->from = $_input['from'];
				$education->to = $_input['to'];
				$education->major_id = $_input['major_id'];
				$education->save();
			}
		}

		return Redirect::back();
	}

	/**
	 * Ajax: Delete Education ("My Profile" page)
	 */
	public function ajaxDeleteEducation()
	{
		UserEducation::deleteEducation(Input::get('id'));
		return array('error' => 0);
	}

	/**
	 * Groups Management
	 */
	public function getGroupsManagement()
	{
		$groups = Group::getUserGroups();
		$suggested = Group::getSuggestedGroups();

		$this->layout->content = View::make(
			'settings.groups_management', 
			compact('groups', 'suggested')
		);
	}

	/**
	 * Classrooms Management
	 */
	public function getClassroomsManagement()
	{
		$classrooms = Classroom::getUserClassrooms();
		$suggested = Classroom::getSuggestedClassrooms();

		$this->layout->content = View::make(
			'settings.classrooms_management', 
			compact('classrooms', 'suggested')
		);
	}

	/**
	 * Tutor Center
	 */
	public function getTutorCenter()
	{
		$current_user_subjects = Subject::getUserSubjects();

		$this->layout->content = View::make(
			'settings.tutor_center',
			compact('current_user_subjects')
		);
	}

	/**
	 * Ajax: Subjects autocomplete
	 */
	public function ajaxSubjects()
	{
		$search = Input::get('q');
		return Subject::searchAutocomplete($search);
	}

	/**
	 * Ajax: Assign a subject to a user
	 */
	public function ajaxAddSubject()
	{
		$sid = Input::get('id');
		Subject::addUserSubject(Auth::user()->id, $sid);

		return array('error' => 0);
	}

	/**
	 * Ajax: Delete a subject from the user
	 */
	public function ajaxDeleteSubject()
	{
		$sid = Input::get('id');
		Subject::deleteUserSubject(Auth::user()->id, $sid);

		return array('error' => 0);
	}

	/**
	 * Ajax: Change user data (bio, price, available)
	 */
	public function ajaxChangeUserData()
	{
		$user = Auth::user();
		switch (Input::get('what'))
		{
			case 'bio':
				$user->bio = Input::get('value');
				$user->save();
				break;

			case 'price':
				$new_price = (int) Input::get('value');
				if ($new_price >= 20 && $new_price <= 99)
				{
					$user->price = $new_price;
					$user->save();
				}
				break;

			case 'available':
				$available = (int) Input::get('value');
				$available = (bool) $available;
				$available = (int) $available;
				$user->available = $available;
				$user->save();
				break;
		}

		return array('error' => 0);
	}

}
