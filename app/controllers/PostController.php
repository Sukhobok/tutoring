<?php

class PostController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Post a message/question on user profile
	 */
	public function postUserPost()
	{
		$validator = Validator::make(
			Input::all(),
			Post::$rules
		);

		if ($validator->passes())
		{
			$post = new Post;
			$post->post = Input::get('post');

			$user = Auth::user();
			$post = $user->posts()->save($post);
			$post = $user->profilePosts()->save($post);

			if (Input::file('photos')[0])
			{
				foreach (Input::file('photos') as $photo)
				{
					$filename = 'post_pictures/p' . $post->id . '/' . time() . str_random(16) . '.jpg';
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

					$post->images()->save($image);
				}
			}
		}

		return Redirect::back();
	}

	public function ajaxSaveThumb()
	{
		$pid = (int) Input::get('id');
		if (Input::get('type') == 'down')
		{
			$type = 'down';
		}
		else
		{
			$type = 'up';
		}

		$result = Thumb::saveThumb(Auth::user()->id, $pid, $type);

		return array('error' => 0, 'result' => $result);
	}

}
