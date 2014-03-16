<?php

class SettingsController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * My profile
	 */
	public function getProfile()
	{
		$messages = array();
		$user = Auth::user();
		$this->layout->content = View::make('settings.profile', array(
			'messages' => $messages,
			'user' => $user
		));
	}

	public function postProfile()
	{
		$messages = array();
		$user = Auth::user();

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
						'Bucket' => 'studysquare',
						'Key' => $user->profile_picture
					));
				}

				$user->profile_picture = $filename;
				$s3->putObject(array(
					'Bucket' => 'studysquare',
					'Key' => $filename,
					'Body' => $image->encode('jpg'),
					'ACL' => 'public-read'
				));
			}

			$user->save();
		}

		$this->layout->content = View::make('settings.profile', array(
			'messages' => $messages,
			'user' => $user
		));
	}

}