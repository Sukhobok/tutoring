<?php

class ClassroomController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	public function getCreate()
	{
		$this->layout->content = View::make('classroom.create');
	}

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
			return Redirect::back();
		}
	}

	public function getClassroom($id)
	{
		$classroom = Classroom::find($id);
		if (!$classroom)
		{
			App::abort('404');
		}
		return $classroom;


	}

}
