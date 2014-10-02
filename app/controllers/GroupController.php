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
					'Bucket' => Config::get('s3.bucket'),
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

		$friends_joined = Friendship::getFriendsJoinedGroup(Auth::user()->id, $id);
		$friends_invited = Friendship::getFriendsInvitedGroup(Auth::user()->id, $id);
		$posts = Group::getGroupPosts($id);

		if (Auth::check())
		{
			$isJoined = Group::isJoined(Auth::user()->id, $group->id);
		}

		$this->layout->content = View::make(
			'group.view',
			compact(
				'group',
				'posts',
				'isJoined',
				'friends_joined',
				'friends_invited'
			)
		);
	}

	/**
	 * Ajax: Join a group
	 */
	public function ajaxJoin()
	{
		$success = Group::joinGroup(
			Auth::user()->id,
			(int) Input::get('id')
		);

		return array('error' => (int) !$success);
	}

	/**
	 * Ajax: Quit a group
	 */
	public function ajaxQuit()
	{
		DB::table('group_users')
			->where('user_id', '=', Auth::user()->id)
			->where('group_id', '=', (int) Input::get('id'))
			->delete();

		return array('error' => 0);
	}

	/**
	 * Data for autocomplete
	 */
	public function ajaxList()
	{
		$search = Input::get('search');

		if ($search)
		{
			return Group::ajaxList($search);
		}
		else
		{
			return array();
		}
	}

}
