<?php

class ClassroomController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Create a classroom page
	 */
	public function getCreate()
	{
		$input_classes = array(
			'name' =>  '',
			'description' => ''
		);

		if (Session::get('validator_errors'))
		{
			foreach (Session::get('validator_errors') as $key)
			{
				$input_classes[$key] .= 'field-error';
			}
		}

		$this->layout->content = View::make('classroom.create', array(
			'input_classes' => $input_classes
		));
	}

	/**
	 * POST process: Create a classroom page
	 */
	public function postCreate()
	{
		$validator = Validator::make(
			Input::all(),
			Classroom::$create_rules
		);

		if ($validator->passes())
		{
			$id = Classroom::saveClassroom(
				Input::get('name'),
				Input::get('description')
			);

			return Redirect::route('classroom.view', $id);
		}
		else
		{
			return Redirect::route('classroom.create')
				->withInput()
				->with('validator_errors', array_keys($validator->failed()));
		}
	}

	/**
	 * Classroom page
	 */
	public function getClassroom($id)
	{
		$classroom = Classroom::getClassroomData($id);
		if (!$classroom)
		{
			App::abort('404');
		}

		$friends_joined = Friendship::getFriendsJoinedClassroom(Auth::user()->id, $id);
		$friends_invited = Friendship::getFriendsInvitedClassroom(Auth::user()->id, $id);
		$posts = Classroom::getClassroomPosts($id);

		if (Auth::check())
		{
			$isJoined = Classroom::isJoined(Auth::user()->id, $classroom->id);
		}

		$this->layout->content = View::make(
			'classroom.view',
			compact(
				'classroom',
				'posts',
				'isJoined',
				'friends_joined',
				'friends_invited'
			)
		);
	}

	/**
	 * Ajax: Join a classroom
	 */
	public function ajaxJoin()
	{
		$success = Classroom::joinClassroom(
			Auth::user()->id,
			(int) Input::get('id')
		);

		return array('error' => (int) !$success);
	}

	/**
	 * Ajax: Quit a classroom
	 */
	public function ajaxQuit()
	{
		DB::table('classroom_users')
			->where('user_id', '=', Auth::user()->id)
			->where('classroom_id', '=', (int) Input::get('id'))
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
			return Classroom::ajaxList($search);
		}
		else
		{
			return array();
		}
	}

}
