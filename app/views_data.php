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

// We need this in order to load specific assets
View::share('outer_pages', array('index'));
