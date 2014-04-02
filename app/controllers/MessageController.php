<?php

class MessageController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * Show conversation(s)
	 */
	public function getMessages($uid = 0)
	{
		$uid = (int) $uid;

		// Get accessed conversation
		$selected_conversation = Message::getConversation($uid);
		// Get all conversations
		$conversations = Message::getConversations();

		if (count($selected_conversation) == 0)
		{
			if (count($conversations) == 0)
			{
				// No messages
			}
			else
			{
				// Get first conversation from the list
				$selected_conversation = Message::getConversation($conversations[0]->id);
				$uid = $conversations[0]->id;
			}
		}

		Debugbar::debug($selected_conversation);

		$this->layout->content = View::make(
			'message.index',
			compact('selected_conversation', 'conversations', 'uid')
		);
	}

}
