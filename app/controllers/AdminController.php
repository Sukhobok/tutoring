<?php

class AdminController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'admin.layouts.default';

	/**
	 * First page
	 */
	public function getDashboard()
	{
		$users = User::count();
		$tutors = DB::table('user_subjects')
			->distinct('user_id')
			->count('user_id');
		$ss_wallet = round(Payment::where('to_id', '=', 0)
			->sum('amount'));
		$groups = Group::count();
		$classrooms = Classroom::count();
		$tutoring_sessions = TutoringSession::count();
		$goal_users = number_format($users/1000*100, 1);

		$verification_requests = Image::where('imageable_type', '=', '_UserVerification')
			->join('users', 'users.id', '=', 'images.imageable_id')
			->select('users.*', 'path')
			->get();

		foreach ($verification_requests as $verification_request)
		{
			$verification_request->birthday = User::getBirthdayAttribute($verification_request->birthday);
		}

		$this->layout->page = 'dashboard';
		$this->layout->content = View::make(
			'admin.dashboard',
			compact(
				'users',
				'tutors',
				'ss_wallet',
				'groups',
				'classrooms',
				'tutoring_sessions',
				'goal_users',
				'verification_requests'
			)
		);
	}

	/**
	 * Verification page
	 */
	public function getVerification()
	{
		$verification_requests = Image::where('imageable_type', '=', '_UserVerification')
			->join('users', 'users.id', '=', 'images.imageable_id')
			->select('users.*', 'path')
			->get();

		foreach ($verification_requests as $verification_request)
		{
			$verification_request->birthday = User::getBirthdayAttribute($verification_request->birthday);
		}

		$this->layout->page = 'verification';
		$this->layout->content = View::make(
			'admin.verification',
			compact(
				'verification_requests'
			)
		);
	}

	/**
	 * Ajax: Approve Verification Request
	 */
	public function postApproveVerification()
	{
		$user = User::find((int) Input::get('uid'));
		$user->verified = 'complete';
		if (Input::get('w9') == 'yes')
		{
			$user->w9 = 'required';
		}
		else
		{
			$user->w9 = 'no need';
		}

		$user->save();
		Image::where('imageable_type', '=', '_UserVerification')
			->where('imageable_id', '=', (int) Input::get('uid'))
			->delete();

		return array('error' => 0);
	}

	/**
	 * Ajax: Decline Verification Request
	 */
	public function postDeclineVerification()
	{
		Image::where('imageable_type', '=', '_UserVerification')
			->where('imageable_id', '=', (int) Input::get('uid'))
			->delete();

		$user = User::find((int) Input::get('uid'));
		$user->verified = 'not sent';
		$user->save();

		return array('error' => 0);
	}

}
