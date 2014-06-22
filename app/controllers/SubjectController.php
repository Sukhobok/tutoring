<?php

class SubjectController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Get subject page
	 */
	public function getSubject($id)
	{
		$subject = Subject::find((int) $id);
		if (!$subject)
		{
			App::abort('404');
		}

		$offset = (int) Input::get('offset');
		if ($offset < 0) $offset = 0;

		$filters = array(
			'available_now' => !!((int) Input::get('available_now')),
			'filter_20_30' => !!((int) Input::get('filter_20_30')),
			'filter_31_40' => !!((int) Input::get('filter_31_40')),
			'filter_41_50' => !!((int) Input::get('filter_41_50')),
			'filter_51' => !!((int) Input::get('filter_51'))
		);

		$available_filters = array_filter($filters, function ($value)
		{
			return $value;
		});
		$available_filters = array_keys($available_filters);
		$available_filters_query = array_fill_keys($available_filters, '1');
		$available_filters_query = http_build_query($available_filters_query);

		// Base URL for the next links
		$base_url = explode('?', URL::full())[0];
		$base_url .= '?';
		$base_url .= $available_filters_query;
		if (!$available_filters_query)
		{
			$base_url .= 'offset=' . $offset;
		}

		$users = Subject::getSubjectUsers((int) $id, $offset, $available_filters);
		$count_users = $users['count'];
		$users = $users['data'];
		$pages = ceil($count_users / 4);

		foreach ($users as $user)
		{
			$user->created_at = new DateTime($user->created_at);
			$user->created_at = $user->created_at->format('M. Y');
			$user->short_name = explode(' ', $user->name)[0];
		}

		$this->layout->content = View::make(
			'subject.view',
			compact(
				'subject',
				'offset',
				'base_url',
				'filters',
				'count_users',
				'pages',
				'users'
			)
		);
	}

}
