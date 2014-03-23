<?php

class GroupController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Create a group page
	 */
	public function getCreate()
	{
		$input_classes = array(
			'name' =>  '',
			'description' => '',
			'photo' => ''
		);

		if (Session::get('validator_errors'))
		{
			foreach (Session::get('validator_errors') as $key)
			{
				$input_classes[$key] .= 'field-error';
			}
		}

		$this->layout->content = View::make('group.create', array(
			'input_classes' => $input_classes
		));
	}

	/**
	 * POST process: Create a group page
	 */
	public function postCreate()
	{
		$validator = Validator::make(
			Input::all(),
			Group::$create_rules
		);

		if ($validator->passes())
		{
			$filename = '';

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

				$filename = 'group_pictures/' . time() . str_random(16) . '.jpg';
				$image = GDImage::make($photo->getRealPath())
					->crop($profile_w, $profile_h, $profile_x, $profile_y)
					->resize(160, null, true, false);
				
				$s3 = AWS::get('s3');
				$s3->putObject(array(
					'Bucket' => 'studysquare',
					'Key' => $filename,
					'Body' => $image->encode('jpg'),
					'ACL' => 'public-read'
				));
			}

			$id = Group::saveGroup(
				Input::get('name'),
				Input::get('description'),
				$filename
			);

			return Redirect::route('group.view', $id);
		}
		else
		{
			return Redirect::route('group.create')
				->withInput()
				->with('validator_errors', array_keys($validator->failed()));
		}
	}

	/**
	 * Group page
	 */
	public function getGroup($id)
	{
		$group = Group::getGroupData($id);
		if (!$group)
		{
			App::abort('404');
		}

		$posts = Group::getGroupPosts($id);

		$this->layout->content = View::make('group.view', array(
			'group' => $group,
			'posts' => $posts
		));
	}

}
