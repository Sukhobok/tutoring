<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	// Remove extra spaces from elements in Input
	$new_input = Input::all();
	array_walk_recursive($new_input, function (&$item, $key)
	{
		$item = trim($item);
	});

	Input::replace($new_input);

	if (Auth::check())
	{
		// Global application data - NOT ready
		App::singleton('globalData', function() {
			$data = new stdClass;
			if (Auth::check())
			{
				$data->friends = Friendship::getFriends(Auth::user()->id);
			}

			return $data;
		});

		HireRequest::deleteExpiredRequests();
		HireNowRequest::deleteExpiredHireNowRequests();
		if (TutoringSession::deleteExpiredAndGetSession()
			&& $request->path() != 'session/start' 
			&& substr($request->path(), 0, 4) != 'ajax'
			&& substr($request->path(), 0, 5) != 'admin')
		{
			return Redirect::route('tutoring_session.start');
		}
	}
});

// NOTE: Executed twice because of $response->setContent!
App::after(function($request, $response)
{
	$content = $response->getContent();
	$pattern = '/\[alias type=([a-zA-Z]+) id=([0-9]+)\]/';

	preg_match_all($pattern, $content, $matches);
	$aliases = array();
	
	foreach ($matches[1] as $k => $type)
	{
		if (!isset($aliases[$type]))
			$aliases[$type] = array();
		
		if (!in_array($matches[2][$k], $aliases[$type]))
			$aliases[$type][] = $matches[2][$k];
	}

	if ($aliases)
	{
		$alias_results = DB::table('aliases');
		$first_type = true;
		foreach ($aliases as $type => $ids)
		{
			if ($first_type)
			{
				$alias_results->where(function ($q) use ($type, $ids)
				{
					$q->where('type', '=', $type);
					$q->whereIn('resource_id', $ids);
				});

				$first_type = false;
			}
			else
			{
				$alias_results->orWhere(function ($q) use ($type, $ids)
				{
					$q->where('type', '=', $type);
					$q->whereIn('resource_id', $ids);
				});
			}
		}
		
		$alias_results->select('alias', 'type', 'resource_id');
		$alias_results = $alias_results->get();
	}
	else
	{
		$alias_results = array();
	}

	$found = array();
	foreach ($alias_results as $alias_result)
	{
		$found[] = '[alias type=' . $alias_result->type . ' id=' . $alias_result->resource_id . ']';
		$content = str_replace(
			'[alias type=' . $alias_result->type . ' id=' . $alias_result->resource_id . ']',
			URL::to($alias_result->alias),
			$content
		);
	}

	$not_found = ss_array_diff($matches[0], $found);
	foreach ($not_found as $_not_found)
	{
		preg_match($pattern, $_not_found, $_match);
		
		$content = str_replace(
			$_match[0],
			URL::route(strtolower($_match[1]) . '.view', $_match[2]),
			$content
		);
	}

	$response->setContent($content);
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('/');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::route('dashboard');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| Ajax Filter
|--------------------------------------------------------------------------
|
| Check if the current request is ajax
|
*/

Route::filter('ajax', function ()
{
	if (!Request::ajax())
	{
		// App::abort(403, 'Unauthorized');
		// Note: we assume everything's ok ... because we need to handle
		// non-ajax call for saving audio from tutoring session
	}
});

/*
|--------------------------------------------------------------------------
| API Filter
|--------------------------------------------------------------------------
|
| Check if the current request has access to the private
| StudySquare API (match the signature)
|
*/

Route::filter('api', function ()
{
	if (App::environment() == 'local')
	{
		Debugbar::disable();
	}

	if (Input::get('signature') != '008ae19bff7861eeec0ecdf80f8915b842cd34e1')
	{
		App::abort(403, 'Unauthorized');
	}
});

/*
|--------------------------------------------------------------------------
| Admin Filter
|--------------------------------------------------------------------------
|
| Check if the current user has access to the admin panel
|
*/

Route::filter('admin', function ()
{
	if (Auth::guest() || Auth::user()->type != 'admin')
	{
		return Redirect::guest('/');
	}
});
