<?php

class FriendshipController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Ajax: Send a friendship request
	 */
	public function ajaxSendRequest()
	{
		$request = FriendshipRequest::saveRequest(Input::get('id'));
		
		if ($request)
		{
			return array('error' => 0);
		}
		else
		{
			return array('error' => 1);
		}
	}

	/**
	 * Ajax: Accept a friendship request
	 */
	public function ajaxAcceptRequest()
	{
		$request = FriendshipRequest::acceptRequest(Input::get('id'));
		
		if ($request)
		{
			return array('error' => 0);
		}
		else
		{
			return array('error' => 1);
		}
	}

	/**
	 * Ajax: Decline a friendship request
	 */
	public function ajaxDeclineRequest()
	{
		$request = FriendshipRequest::declineRequest(Input::get('id'));
		return array('error' => 0);
	}

	/**
	 * Ajax: Remove friendship
	 */
	public function ajaxRemoveFriendship()
	{
		Friendship::removeFriend(Input::get('id'));
		return array('error' => 0);
	}

}
