<?php

class ApiController extends BaseController {

	/**
	 * Get user id by laravel_session cookie
	 */
	public function getUserBySession()
	{
		try
		{
			$session = Crypt::decrypt(Input::get('session'));

			$payload = DB::table('sessions')
				->where('id', '=', $session)
				->select('payload')
				->first();

			$payload = $payload->payload;
			$payload = unserialize(base64_decode($payload));

			return array('error' => 0, 'result' => $payload[Auth::getName()]);
		}
		catch (Exception $e)
		{
			return array('error' => 1);
		}
	}

	/**
	 * Get tutoring session id
	 */
	public function getTutoringSession()
	{
		try
		{
			$id = TutoringSession::deleteExpiredAndGetSession((int) Input::get('uid'));
			if ($id)
			{
				return array('error' => 0, 'result' => $id);
			}
			else
			{
				throw new Exception('No active sessions');
			}
		}
		catch (Exception $e)
		{
			return array('error' => 1);
		}
	}

}
