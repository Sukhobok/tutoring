<?php

class Message extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'messages';

	/**
	 * Validation rules
	 * @var array
	 */
	public static $message_rules = array(
		'message' => 'required'
	);

	/**
	 * Do not store updated_at
	 */
	public function setUpdatedAtAttribute($value) {}

	/**
	 * Get all conversations of the current user
	 * @return array
	 */
	public static function getConversations()
	{
		$query = 'SELECT *
		FROM (
			SELECT users.name,
			users.id,
			users.profile_picture,

			(SELECT messages.message
				FROM messages
				WHERE
					(CASE WHEN `to_id` = ? THEN `from_id` ELSE `to_id` END) = users.id
					AND
					(messages.from_id = ? OR messages.to_id = ?)
				ORDER BY messages.created_at DESC
				LIMIT 1) AS message,
			
			(SELECT messages.created_at
				FROM messages
				WHERE
					(CASE WHEN `to_id` = ? THEN `from_id` ELSE `to_id` END) = users.id
					AND
					(messages.from_id = ? OR messages.to_id = ?)
				ORDER BY messages.created_at DESC
				LIMIT 1) AS created_at

				FROM users
			) AS _messages
		WHERE message IS NOT NULL
		ORDER BY created_at DESC';

		$query = DB::select($query, array_fill(0, 6, Auth::user()->id));

		foreach ($query as &$_query)
		{
			$_query->created_at = strtotime($_query->created_at);
		}
		
		return $query;
	}

	/**
	 * Get a specific conversation
	 * @param integer $uid
	 * @return array
	 */
	public static function getConversation($uid)
	{
		$query = 'SELECT messages.message,
		messages.from_id,
		messages.to_id,
		messages.created_at
			FROM messages
			WHERE
				(messages.to_id = ? AND messages.from_id = ?)
				OR
				(messages.from_id = ? AND messages.to_id = ?)
			ORDER BY messages.created_at ASC';

		$query = DB::select($query, array(
			Auth::user()->id,
			$uid,
			Auth::user()->id,
			$uid
		));

		foreach ($query as &$_query)
		{
			$_query->created_at = strtotime($_query->created_at);
			if ($_query->from_id == Auth::user()->id)
			{
				$_query->type = 'sent';
				$_query->from_user = Auth::user();
			}
			else
			{
				$_query->type = 'received';
				$_query->from_user = User::find($_query->from_id);
			}

			$_query->message_picture = HTML::profile_picture($_query->from_user);
		}

		return $query;
	}

}
