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
					$messages[] = 'Birthday saved!';

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
					$messages[] = 'Password saved!';
					$user->password = Hash::make(Input::get('password'));
				}
				else
				{
					$messages[] = 'Incorrect password!';
				}
			}

			if (Input::file('photo'))
			{
				// $filename = 'profile_pictures/' . time() . str_random(16) . '.jpg';
				// $image = GDImage::make($photo->getRealPath())
				// 	->resize(800, null, true, false); // Max width: 800
				
				// $s3 = AWS::get('s3');
				// $result = $s3->putObject(array(
				// 	'Bucket' => 'studysquare',
				// 	'Key' => $filename,
				// 	'Body' => $image->encode('jpg'),
				// 	'ACL' => 'public-read'
				// ));

				// $image = new Image;
				// $image->path = $filename;

				// $post->images()->save($image);
			}

			$user->save();
		}

		$this->layout->content = View::make('settings.profile', array(
			'messages' => $messages,
			'user' => $user
		));
	}

	/**
	 * Ajax: Change user data
	 */
	public function ajaxChange()
	{
		return User::change_user_data(
			Input::get('what'),
			Input::get('value')
		);
	}

}