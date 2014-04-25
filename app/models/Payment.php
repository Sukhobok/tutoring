<?php

class Payment extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'payments';

	/**
	 * Get available money for an user
	 * TO DO: Substract withdrawals after I implement them
	 * @param integer $uid
	 * @return float
	 */
	public static function getAvailableMoney($uid)
	{
		$payments = DB::select('SELECT COALESCE(SUM(payments.amount), 0) AS result
		FROM payments
		WHERE payments.to_id = ?
		AND payments.award_date < ?

		UNION ALL
		
		SELECT COALESCE(SUM(payments.amount), 0) AS result
		FROM payments
		WHERE payments.from_id = ?', array(
			$uid,
			new DateTime,
			$uid
		));

		return $payments['result'][0] - $payments['result'][1];
	}

}
