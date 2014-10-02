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
	$view->with('notifications', User::getUserNotifications());
	$view->with('unread_messages', Message::unreadMessages());
});

View::composer('templates.left_sidebar', function($view)
{
	$view->with('classrooms', Classroom::getUserClassrooms(Auth::user()->id));
	$view->with('groups', Group::getUserGroups(Auth::user()->id));
	$view->with('tutors', User::getUserTutors(Auth::user()->id));
});

View::composer('snippets.invite_friends', function($view)
{
	$view->with('friends', Friendship::getFriends(Auth::user()->id));
});

View::composer('snippets.chat', function($view)
{
	$view->with('chat_friends', Friendship::getFriends(Auth::user()->id));
	$view->with('chat_tutors', Subject::getPopularSubjects());
	$view->with('chat_conversations', Message::getConversations());
});

View::composer('templates.right_sidebar', function($view)
{
	if (Auth::check())
	{
		$view->with('futureSessions', TutoringSession::getFutureSessions(Auth::user()->id));
	}
	else
	{
		$view->with('futureSessions', array());
	}

	$view->with('new_members', User::take(6)->get());
	$view->with('new_groups', Group::take(6)->get());
});

View::share('logged_in', Auth::check());
