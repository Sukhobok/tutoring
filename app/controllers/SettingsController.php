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
		$this->layout->content = View::make('settings.profile');
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