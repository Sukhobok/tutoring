<?php

/*
|--------------------------------------------------------------------------
| View composers
|--------------------------------------------------------------------------
|
| Data needed to load views
|
*/

View::composer('templates.header', function($view)
{
	$view->with('friend_requests', FriendshipRequest::getUserRequests());
	$view->with('unread_messages', Message::unreadMessages());
});

View::composer('templates.left_sidebar', function($view)
{
	$view->with('classrooms', Classroom::getUserClassrooms(Auth::user()->id));
	$view->with('groups', Group::getUserGroups(Auth::user()->id));
});

View::composer('templates.right_sidebar', function($view)
{
	$view->with('futureSessions', TutoringSession::getFutureSessions(Auth::user()->id));
});

View::share('logged_in', Auth::check());
