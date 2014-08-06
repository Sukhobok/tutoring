<?php

class Payment extends Eloquent {
	
	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'payments';

	/**
	 * Add money for an user
	 * @param integer $uid
	 * @param integer $amount
	 * @return boolean TRUE
	 */
	public static function addMoney($uid, $amount)
	{
		$now = new DateTime('now');

		$payment = new Payment;
		$payment->from_id = 0;
		$payment->to_id = $uid;
		$payment->amount = $amount;
		$payment->type = 'funding';
		$payment->type_id = 0;
		$payment->award_date = $now;
		$payment->save();

		return true;
	}

	/**
	 * Get available money for an user
	 * TO DO: Substract withdrawals after I implement them
	 * @param integer $uid
	 * @return float
	 */
	public static function getAvailableMoney($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$payments = DB::select('SELECT COALESCE(SUM(payments.amount), 0) AS result
		FROM payments
		WHERE payments.to_id = ?
		AND payments.award_date < ?

		UNION ALL
		
		SELECT COALESCE(SUM(payments.amount), 0) AS result
		FROM payments
		WHERE payments.from_id = ?

		UNION ALL

		SELECT COALESCE(SUM(withdrawals.amount), 0) AS result
		FROM withdrawals
		WHERE withdrawals.user_id = ?', array(
			$uid,
			new DateTime,
			$uid,
			$uid
		));

		return floor($payments[0]->result - $payments[1]->result - $payments[2]->result);
	}

	/**
	 * Get money available for Withdrawal
	 * @param integer $uid
	 * @return float
	 */
	public static function getWithdrawalAvailableMoney($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$payments = DB::select('SELECT COALESCE(SUM(payments.amount), 0) AS result
		FROM payments
		WHERE payments.to_id = ?
		AND payments.award_date < ?
		AND payments.type = "tutoring_session"

		UNION ALL
		
		SELECT COALESCE(SUM(payments.amount), 0) AS result
		FROM payments
		WHERE payments.from_id = ?

		UNION ALL

		SELECT COALESCE(SUM(withdrawals.amount), 0) AS result
		FROM withdrawals
		WHERE withdrawals.user_id = ?', array(
			$uid,
			new DateTime,
			$uid,
			$uid
		));

		$result = floor($payments[0]->result - $payments[1]->result - $payments[2]->result);
		return $result > 0 ? $result : 0;
	}

	/**
	 * Get all time income
	 * @param integer $uid
	 * @return float
	 */
	public static function getAllTimeIncome($uid = 0)
	{
		if (!$uid) $uid = Auth::user()->id;

		$payments = DB::select('SELECT COALESCE(SUM(payments.amount), 0) AS result
		FROM payments
		WHERE payments.to_id = ?
		AND payments.award_date < ?
		AND payments.type = "tutoring_session"', array(
			$uid,
			new DateTime
		));

		return floor($payments[0]->result);
	}

}
