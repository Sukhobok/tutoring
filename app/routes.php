<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'guest'), function()
{
	Route::get('/', array(
		'as' => 'index',
		'uses' => 'PageController@getIndex'
	));

	Route::post('signup', 'UserController@postSignUp');
	Route::post('login', 'UserController@postLogIn');
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('logout', array(
		'as' => 'logout',
		'uses' => 'UserController@getLogOut'
	));

	Route::get('dashboard', array(
		'as' => 'dashboard',
		'uses' => 'PageController@getDashboard'
	));

	Route::post('user/post', array(
		'as' => 'user.post',
		'uses' => 'PostController@postUserPost'
	));

	Route::get('user/{id}', array(
		'as' => 'user.view',
		'uses' => 'UserController@getUser'
	));

	Route::get('settings/profile', array(
		'as' => 'settings.profile',
		'uses' => 'SettingsController@getProfile'
	));

	Route::post('settings/profile', array(
		'uses' => 'SettingsController@postProfile'
	));

});

Route::group(array('before' => 'auth|ajax', 'prefix' => 'ajax'), function ()
{
	Route::post('user/upload_photos', array(
		'uses' => 'UserController@ajaxUploadPhotos'
	));

	Route::post('user/delete_photo', array(
		'uses' => 'UserController@ajaxDeletePhoto'
	));

	Route::post('user/send_friend_request', array(
		'uses' => 'UserController@ajaxSendFriendRequest'
	));
});
