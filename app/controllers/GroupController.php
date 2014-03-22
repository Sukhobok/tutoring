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
			'description' => ''
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
			$id = Group::saveGroup(
				Input::get('name'),
				Input::get('description')
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
		$group = Group::find($id);
		if (!$group)
		{
			App::abort('404');
		}

		return $group;
	}

}
