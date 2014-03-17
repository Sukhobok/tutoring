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
		$user = User::with(array('profilePosts' => function ($query)
		{
			$query->orderBy('created_at', 'DESC');
		}, 'profilePosts.images'))->where('id', '=', $id)->take(1)->get(); // TO DO: Improve this
		$user = $user[0];
		if (!$user)
		{
			App::abort('404');
		}

		$posts = $user->profilePosts;
		$images = $user->images;

		$this->layout->content = View::make('user.view', array(
			'user' => $user,
			'posts' => $posts,
			'images' => $images
		));
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
					'Bucket' => 'studysquare',
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
					'Bucket' => 'studysquare',
					'Key' => $image->path
				));

				$image->delete();
				// TO DO: Delete associated comments
				return array('error' => 0);
			}
		}

		return array('error' => 1);
	}

}