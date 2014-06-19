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
			Debugbar::info('called');
			$data = new stdClass;
			if (Auth::check())
			{
				$data->friends = Friendship::getFriends(Auth::user()->id);
			}

			return $data;
		});

		HireRequest::deleteExpiredRequests();
		if (TutoringSession::deleteExpiredAndGetSession()
			&& $request->path() != 'session/start') // TO DO: search by route name
		{
			return Redirect::route('tutoring_session.start');
		}
	}
});


App::after(function($request, $response)
{
	//
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
		App::abort(403, 'Unauthorized');
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

