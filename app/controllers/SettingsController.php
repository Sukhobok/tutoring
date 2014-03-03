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

}