<?php

/*
|--------------------------------------------------------------------------
| View composers
|--------------------------------------------------------------------------
|
| Data needed to load views
|
*/

View::composer('footer', function($view)
{
	// $view->with('', '');
});

View::share('logged_in', Auth::check());
