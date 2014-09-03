<?php

class Withdrawal extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'withdrawals';

	/**
	 * Check if the user can withdrawal
	 * @param User $user
	 * @param integer $amount
	 * @return boolean
	 */
	public static function canWithdrawal($user, $amount)
	{
		if ($user->verified == 'complete'
			&& ($user->w9 == 'complete' || $user->w9 == 'no need'))
		{
			$available = Payment::getWithdrawalAvailableMoney($user->id);

			if ($available >= $amount)
			{
				return true;
			}
		}
		
		return false;
	}

	/**
	 * Send Dwolla payment
	 * @param string $email
	 * @param integer $amount
	 * @return boolean
	 */
	public static function sendDwolla($email, $amount)
	{
		$dwolla = new DwollaRestClient(
			Config::get('dwolla.key'),
			Config::get('dwolla.secret')
		);

		$dwolla->setToken(Config::get('dwolla.token'));
		$dwolla->setSandbox(Config::get('dwolla.sandbox'));

		$transaction_id = $dwolla->send(
			Config::get('dwolla.pin'), // pin
			$email, // destinationId
			$amount, // amount
			'Email', // destinationType
			'StudySquare Withdrawal', // notes
			NULL, // facilitatorAmount
			false, // assumeCosts
			Config::get('dwolla.fundsSource') // fundsSource
		);

		// Debugbar::info($dwolla->getError());

		return $transaction_id;
	}


}
