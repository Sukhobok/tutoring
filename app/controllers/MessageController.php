<?php

class MessageController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Show conversations
	 */
	public function getMessages($uid = 0)
	{
		$uid = (int) $uid;

		// Get all conversations
		$conversations = Message::getConversations();

		// Find the user to get the conversation
		$selected_user = User::find($uid);
		if (!$selected_user || Auth::user()->id == $selected_user->id)
		{
			if (count($conversations) != 0)
			{
				$selected_user = User::find($conversations[0]->id);
			}
		}

		$conversation_before = false;
		if ($selected_user)
		{
			// Check if they had a conversation before
			foreach ($conversations as $conversation)
			{
				if ($conversation->id == $selected_user->id)
				{
					$conversation_before = true;
				}
			}

			// Get the conversation
			$selected_conversation = Message::getConversation($selected_user->id);
		}
		else
		{
			$selected_conversation = array();
		}

		$this->layout->content = View::make(
			'message.index',
			compact(
				'selected_conversation',
				'selected_user',
				'conversations',
				'conversation_before'
			)
		);
	}

	/**
	 * Ajax: Get a particular conversation
	 */
	public function ajaxGetConversation()
	{
		$uid = (int) Input::get('uid') ?: 0;
		return Message::getConversation($uid);
	}

	/**
	 * Ajax: Send a message
	 */
	public function ajaxSendMessage()
	{
		$uid = (int) Input::get('uid') ?: 0;
		$user = User::find($uid);
		if (!$user)
		{
			App::abort('404');
		}

		$message = new Message;
		$message->from_id = Auth::user()->id;
		$message->to_id = $user->id;
		$message->message = (string) Input::get('message');
		$message->save();

		return array('error' => 0);
	}

}
