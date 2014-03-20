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

	/**
	 * Groups
	 */
	Route::get('group/create', array(
		'as' => 'group.create',
		'uses' => 'GroupController@getCreate'
	));
	
	Route::post('group/create', array(
		'uses' => 'GroupController@postCreate'
	));

	Route::get('group/{id}', array(
		'as' => 'group.view',
		'uses' => 'GroupController@getGroup'
	));

	/**
	 * Classrooms
	 */
	Route::get('classroom/create', array(
		'as' => 'classroom.create',
		'uses' => 'ClassroomController@getCreate'
	));
	
	Route::post('classroom/create', array(
		'uses' => 'ClassroomController@postCreate'
	));

	Route::get('classroom/{id}', array(
		'as' => 'classroom.view',
		'uses' => 'ClassroomController@getClassroom'
	));

	/**
	 * Settings
	 */
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

	Route::post('post/save_thumb', array(
		'uses' => 'PostController@ajaxSaveThumb'
	));
});
