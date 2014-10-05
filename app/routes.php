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

	Route::get('send_token_login', array(
		'as' => 'user.send_token_login',
		'uses' => 'UserController@getSendTokenLogin'
	));

	Route::get('token_login', array(
		'as' => 'user.token_login',
		'uses' => 'UserController@getTokenLogin'
	));
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
	
	Route::get('group/create', array(
		'as' => 'group.create',
		'uses' => 'GroupController@getCreate'
	));
	
	Route::post('group/create', array(
		'uses' => 'GroupController@postCreate'
	));

	Route::post('group/post', array(
		'as' => 'group.post',
		'uses' => 'PostController@postGroupPost'
	));

	Route::get('classroom/create', array(
		'as' => 'classroom.create',
		'uses' => 'ClassroomController@getCreate'
	));
	
	Route::post('classroom/create', array(
		'uses' => 'ClassroomController@postCreate'
	));

	Route::post('classroom/post', array(
		'as' => 'classroom.post',
		'uses' => 'PostController@postClassroomPost'
	));

	Route::get('messages/{uid?}', array(
		'as' => 'messages',
		'uses' => 'MessageController@getMessages'
	));

	Route::get('settings/profile', array(
		'as' => 'settings.profile',
		'uses' => 'SettingsController@getProfile'
	));

	Route::post('settings/profile', array(
		'uses' => 'SettingsController@postProfile'
	));

	Route::post('settings/save_education', array(
		'as' => 'settings.save_education',
		'uses' => 'SettingsController@postSaveEducation'
	));

	Route::get('settings/my_wallet', array(
		'as' => 'settings.my_wallet',
		'uses' => 'SettingsController@getMyWallet'
	));

	Route::post('settings/add_funds', array(
		'as' => 'settings.add_funds',
		'uses' => 'SettingsController@postAddFunds'
	));

	Route::get('settings/groups_management', array(
		'as' => 'settings.groups_management',
		'uses' => 'SettingsController@getGroupsManagement'
	));

	Route::get('settings/classrooms_management', array(
		'as' => 'settings.classrooms_management',
		'uses' => 'SettingsController@getClassroomsManagement'
	));

	Route::get('settings/notifications_security', array(
		'as' => 'settings.notifications_security',
		'uses' => 'SettingsController@getNotificationsSecurity'
	));

	Route::get('settings/invite', array(
		'as' => 'settings.invite',
		'uses' => 'SettingsController@getInviteFriends'
	));

	Route::get('settings/financial', array(
		'as' => 'settings.financial',
		'uses' => 'SettingsController@getFinancial'
	));

	Route::get('settings/verification', array(
		'as' => 'settings.verification',
		'uses' => 'SettingsController@getVerification'
	));

	Route::post('settings/verification', array(
		'uses' => 'SettingsController@postVerification'
	));

	Route::post('settings/send_w9', array(
		'as' => 'settings.send_w9',
		'uses' => 'SettingsController@postSendW9'
	));

	Route::get('settings/tutor_center', array(
		'as' => 'settings.tutor_center',
		'uses' => 'SettingsController@getTutorCenter'
	));

	Route::get('session/start', array(
		'as' => 'tutoring_session.start',
		'uses' => 'TutoringSessionController@getStart'
	));

	Route::get('session/replay/{id}', array(
		'as' => 'tutoring_session.replay',
		'uses' => 'TutoringSessionController@getReplay'
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

	Route::post('user/hire', array(
		'uses' => 'UserController@ajaxHire'
	));

	Route::post('user/hire_now', array(
		'uses' => 'UserController@ajaxHireNow'
	));

	Route::post('user/hire_now_approve', array(
		'uses' => 'UserController@ajaxHireNowApprove'
	));

	Route::post('user/hire_now_decline', array(
		'uses' => 'UserController@ajaxHireNowDecline'
	));

	Route::post('friendship/send_request', array(
		'uses' => 'FriendshipController@ajaxSendRequest'
	));

	Route::post('friendship/accept_request', array(
		'uses' => 'FriendshipController@ajaxAcceptRequest'
	));

	Route::post('friendship/decline_request', array(
		'uses' => 'FriendshipController@ajaxDeclineRequest'
	));

	Route::post('post/save_thumb', array(
		'uses' => 'PostController@ajaxSaveThumb'
	));

	Route::post('post/post_comment', array(
		'uses' => 'PostController@ajaxPostComment'
	));

	Route::post('group/join', array(
		'uses' => 'GroupController@ajaxJoin'
	));

	Route::post('group/quit', array(
		'uses' => 'GroupController@ajaxQuit'
	));

	Route::post('classroom/join', array(
		'uses' => 'ClassroomController@ajaxJoin'
	));

	Route::post('classroom/quit', array(
		'uses' => 'ClassroomController@ajaxQuit'
	));

	Route::get('highschool/json', array(
		'uses' => 'HighschoolController@ajaxList'
	));

	Route::get('university/json', array(
		'uses' => 'UniversityController@ajaxList'
	));

	Route::get('major/json', array(
		'uses' => 'MajorController@ajaxList'
	));

	Route::get('classroom/json', array(
		'uses' => 'ClassroomController@ajaxList'
	));

	Route::get('group/json', array(
		'uses' => 'GroupController@ajaxList'
	));

	Route::post('settings/delete_education', array(
		'uses' => 'SettingsController@ajaxDeleteEducation'
	));

	Route::get('settings/subjects', array(
		'uses' => 'SettingsController@ajaxSubjects'
	));

	Route::post('settings/add_subject', array(
		'uses' => 'SettingsController@ajaxAddSubject'
	));

	Route::post('settings/delete_subject', array(
		'uses' => 'SettingsController@ajaxDeleteSubject'
	));

	Route::post('settings/request_subject', array(
		'uses' => 'SettingsController@ajaxRequestSubject'
	));

	Route::post('settings/change_user_data', array(
		'uses' => 'SettingsController@ajaxChangeUserData'
	));

	Route::post('settings/approve_hire_request', array(
		'uses' => 'SettingsController@ajaxApproveHireRequest'
	));

	Route::post('settings/decline_hire_request', array(
		'uses' => 'SettingsController@ajaxDeclineHireRequest'
	));

	Route::post('settings/add_dwolla', array(
		'uses' => 'SettingsController@ajaxAddDwolla'
	));

	Route::post('settings/delete_dwolla', array(
		'uses' => 'SettingsController@ajaxDeleteDwolla'
	));

	Route::post('settings/withdrawal', array(
		'uses' => 'SettingsController@ajaxWithdrawal'
	));

	Route::get('messages/get_conversation', array(
		'uses' => 'MessageController@ajaxGetConversation'
	));

	Route::post('messages/send_message', array(
		'uses' => 'MessageController@ajaxSendMessage'
	));

	Route::post('messages/seen', array(
		'uses' => 'MessageController@ajaxSeen'
	));

	Route::post('session/close_session', array(
		'uses' => 'TutoringSessionController@ajaxCloseSession'
	));

	Route::post('session/receive_audio', array(
		'uses' => 'TutoringSessionController@ajaxReceiveAudio'
	));

	Route::post('session/receive_file', array(
		'uses' => 'TutoringSessionController@ajaxReceiveFile'
	));

	Route::get('session/download_file', array(
		'uses' => 'TutoringSessionController@ajaxDownloadFile'
	));

	Route::post('session/remove_file', array(
		'uses' => 'TutoringSessionController@ajaxRemoveFile'
	));

	Route::post('session/leave_feedback', array(
		'uses' => 'TutoringSessionController@ajaxLeaveFeedback'
	));

	Route::post('session/send_complaint', array(
		'uses' => 'TutoringSessionController@ajaxSendComplaint'
	));

	Route::post('session/save', array(
		'uses' => 'TutoringSessionController@ajaxSave'
	));

	Route::post('classroom/invite', array(
		'uses' => 'ClassroomController@ajaxInvite'
	));

	Route::post('group/invite', array(
		'uses' => 'GroupController@ajaxInvite'
	));

	Route::post('user/decline_invitation', array(
		'uses' => 'UserController@ajaxDeclineInvitation'
	));
});

/**
 * Public Pages
 */
Route::group(array(), function()
{
	Route::get('page/terms', array(
		'as' => 'page.terms',
		'uses' => 'PageController@getTerms'
	));

	Route::get('page/privacy', array(
		'as' => 'page.privacy',
		'uses' => 'PageController@getPrivacy'
	));

	Route::get('page/cookie', array(
		'as' => 'page.cookie',
		'uses' => 'PageController@getCookie'
	));

	Route::get('user/{id}', array(
		'as' => 'user.view',
		'uses' => 'UserController@getUser'
	))
	->where('id', '[0-9]+');

	Route::get('group/{id}', array(
		'as' => 'group.view',
		'uses' => 'GroupController@getGroup'
	))
	->where('id', '[0-9]+');

	Route::get('classroom/{id}', array(
		'as' => 'classroom.view',
		'uses' => 'ClassroomController@getClassroom'
	))
	->where('id', '[0-9]+');

	Route::get('highschool/{id}', array(
		'as' => 'highschool.view',
		'uses' => 'HighschoolController@getHighschool'
	))
	->where('id', '[0-9]+');

	Route::get('university/{id}', array(
		'as' => 'university.view',
		'uses' => 'UniversityController@getUniversity'
	))
	->where('id', '[0-9]+');

	Route::get('subject/{id}', array(
		'as' => 'subject.view',
		'uses' => 'SubjectController@getSubject'
	))
	->where('id', '[0-9]+');

	Route::get('tutor/search', array(
		'as' => 'tutor.search',
		'uses' => 'UserController@getTutorSearch'
	));
});

Route::group(array('before' => 'ajax', 'prefix' => 'ajax'), function ()
{
	Route::get('search', array(
		'uses' => 'PageController@ajaxSearchAnything'
	));

	Route::post('tutor/search', array(
		'uses' => 'UserController@ajaxTutorSearch'
	));
});

/**
 * API
 */
Route::group(array('before' => 'api', 'prefix' => 'api'), function ()
{
	Route::get('get_user_by_session', array(
		'uses' => 'ApiController@getUserBySession'
	));

	Route::get('get_tutoring_session', array(
		'uses' => 'ApiController@getTutoringSession'
	));

	Route::get('start_tutoring_session', array(
		'uses' => 'ApiController@getStartTutoringSession'
	));

	Route::get('finish_tutoring_session', array(
		'uses' => 'ApiController@getFinishTutoringSession'
	));
});

/**
 * Admin
 */
Route::group(array('before' => 'admin', 'prefix' => 'admin'), function ()
{
	Route::get('/', array(
		'as' => 'admin.dashboard',
		'uses' => 'AdminController@getDashboard'
	));

	Route::get('verification', array(
		'as' => 'admin.verification',
		'uses' => 'AdminController@getVerification'
	));

	Route::get('complaints', array(
		'as' => 'admin.complaints',
		'uses' => 'AdminController@getComplaints'
	));
});

/**
 * Admin Ajax
 */
Route::group(array('before' => 'admin|ajax', 'prefix' => 'admin/ajax'), function ()
{
	Route::post('verification/approve', array(
		'uses' => 'AdminController@postApproveVerification'
	));

	Route::post('verification/decline', array(
		'uses' => 'AdminController@postDeclineVerification'
	));
});

/**
 * Aliases
 */
Route::get('{alias}', function ($alias)
{
	$alias = Alias::where('alias', '=', $alias)->first();
	if (!$alias)
	{
		App::abort('404');
	}

	$request = Request::create('/' . strtolower($alias->type) . '/' . $alias->resource_id, 'GET');
	return Route::dispatch($request)->getContent();
});
