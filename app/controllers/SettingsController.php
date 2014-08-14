<?php

class SettingsController extends BaseController {

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.default';

	/**
	 * My Profile
	 */
	public function getProfile()
	{
		$messages = array();
		$user = Auth::user();
		$education = UserEducation::getEducation($user->id);

		$this->layout->content = View::make(
			'settings.profile', 
			compact('messages', 'user', 'education')
		);
	}

	/**
	 * POST process: Save user general info from "My Profile" page
	 */
	public function postProfile()
	{
		$messages = array();
		$user = Auth::user();
		$education = UserEducation::getEducation($user->id);

		$validator = Validator::make(
			Input::all(),
			User::$settings_profile_rules
		);

		if ($validator->passes())
		{
			$messages[] = 'Changes saved!';
			$user->name = Input::get('name');
			$user->nickname = Input::get('nickname');
			$user->email = Input::get('email');
			$user->gender = Input::get('gender');

			if (Input::get('b_save'))
			{
				$birthday_validator = Validator::make(
					Input::all(),
					User::$birthday_rules
				);

				if ($birthday_validator->passes())
				{
					$user->birthday = array(
						'y' => Input::get('b_year'),
						'm' => Input::get('b_month'),
						'd' => Input::get('b_day')
					);
				}
			}

			if (Input::get('old_password'))
			{
				$password_validator = Validator::make(
					Input::all(),
					User::$password_rules
				);

				if ($password_validator->passes()
					&& Hash::check(Input::get('old_password'), $user->password))
				{
					$user->password = Hash::make(Input::get('password'));
				}
				else
				{
					$messages[] = 'Incorrect password!';
				}
			}

			if (Input::hasFile('photo')
				&& Input::get('profile_w') > 0
				&& Input::get('profile_w') == Input::get('profile_h'))
			{
				$photo = Input::file('photo');
				list($src_w, $src_h) = getimagesize($photo->getRealPath());

				$profile_w = Input::get('profile_w');
				$profile_h = Input::get('profile_h');
				$profile_x = Input::get('profile_x');
				$profile_y = Input::get('profile_y');

				if ($src_w > 350)
				{
					$ratio = $src_w/350;
					$profile_w*=$ratio;
					$profile_h*=$ratio;
					$profile_x*=$ratio;
					$profile_y*=$ratio;
				}

				$filename = 'profile_pictures/' . time() . str_random(16) . '.jpg';
				$image = GDImage::make($photo->getRealPath())
					->crop($profile_w, $profile_h, $profile_x, $profile_y)
					->resize(160, null, true, false);
				
				$s3 = AWS::get('s3');
				if ($user->profile_picture)
				{
					$s3->deleteObject(array(
						'Bucket' => Config::get('s3.bucket'),
						'Key' => $user->profile_picture
					));
				}

				$user->profile_picture = $filename;
				$s3->putObject(array(
					'Bucket' => Config::get('s3.bucket'),
					'Key' => $filename,
					'Body' => $image->encode('jpg'),
					'ACL' => 'public-read'
				));
			}

			$user->save();
		}

		$this->layout->content = View::make(
			'settings.profile', 
			compact('messages', 'user', 'education')
		);
	}

	/**
	 * POST process: Save user education from "My Profile" page
	 */
	public function postSaveEducation()
	{
		$_inputs = array();
		for ($k = 0; $k < count(Input::get('type')); $k++)
		{
			$_inputs[] = array(
				'type' => Input::get('type')[$k],
				'degree' => Input::get('degree')[$k],
				'education_id' => (int) Input::get('education_id')[$k],
				'from' => (int) Input::get('from')[$k],
				'to' => (int) Input::get('to')[$k],
				'major_id' => (int) Input::get('major_id')[$k]
			);
		}

		foreach ($_inputs as $_input)
		{
			$validator = Validator::make(
				$_input,
				UserEducation::$education_rules
			);

			if ($validator->passes()
				&& $_input['from'] < $_input['to'])
			{
				$education = new UserEducation;
				$education->user_id = Auth::user()->id;
				$education->type = $_input['type'];
				$education->degree = $_input['degree'];
				$education->education_id = $_input['education_id'];
				$education->from = $_input['from'];
				$education->to = $_input['to'];
				$education->major_id = $_input['major_id'];
				$education->save();
			}
		}

		return Redirect::back();
	}

	/**
	 * Ajax: Delete Education ("My Profile" page)
	 */
	public function ajaxDeleteEducation()
	{
		UserEducation::deleteEducation(Input::get('id'));
		return array('error' => 0);
	}

	/**
	 * My Wallet
	 */
	public function getMyWallet()
	{
		$money = Payment::getAvailableMoney();
		$transaction_history = Payment::getTransactionHistory();
		foreach ($transaction_history as $_transaction_history)
		{
			if ($_transaction_history->from_id == Auth::user()->id)
			{
				$_transaction_history->display_icon = 'minus';
			}
			else
			{
				$_transaction_history->display_icon = 'plus';
			}

			switch ($_transaction_history->type)
			{
				case 'funding':
					$_transaction_history->display_message = 'Funds added';
					break;

				case 'studysquare_fee':
					$_transaction_history->display_message = 'StudySquare Fee';
					break;

				case 'tutoring_session':
					$_transaction_history->display_message = 'Tutoring Session #' . $_transaction_history->type_id;
					break;

				case 'pending_hire':
					$_transaction_history->display_message = 'Pending for Hire Request #' . $_transaction_history->type_id;
					break;

				case 'pending_hire_now':
					$_transaction_history->display_message = 'Pending for Hire Now Request';
					break;

				case 'pending_tutoring_session':
					$_transaction_history->display_message = 'Pending for Tutoring Session #' . $_transaction_history->type_id;
					break;

				case 'saved_session':
					$_transaction_history->display_message = 'Saved Tutoring Session #' . $_transaction_history->type_id;
					break;

				default:
					$_transaction_history->display_message = 'Unknown';
					break;
			}

			if (new DateTime($_transaction_history->award_date) < new DateTime)
			{
				$_transaction_history->awarded = true;
			}
			else
			{
				$_transaction_history->awarded = false;
			}
		}

		$this->layout->content = View::make(
			'settings.my_wallet',
			compact(
				'money', 'transaction_history'
			)
		);
	}

	/**
	 * POST process: Add Funds (from My Wallet)
	 */
	public function postAddFunds() {
		if ((int) Input::get('ss-add-funds-amount') < 25)
		{
			return Redirect::back();
		}

		$expiration = str_pad(Input::get('ss-add-funds-exp-month'), 2, '0', STR_PAD_LEFT)
			. Input::get('ss-add-funds-exp-year');

		$data = http_build_query(array(
			'username' => 'studysquare',
			'password' => 'Study125!',
			'firstname' => Input::get('ss-add-funds-first-name'),
			'lastname' => Input::get('ss-add-funds-last-name'),
			'ccnumber' => Input::get('ss-add-funds-card-number'),
			'ccexp' => $expiration,
			'cvv' => Input::get('ss-add-funds-cvv-code'),
			'address1' => '',
			'address2' => '',
			'zip' => Input::get('ss-add-funds-zip-code'),
			'city' => '',
			'state' => '',
			'amount' => (int) Input::get('ss-add-funds-amount')
		));

		// Execute request
		$url = 'https://secure.payscapegateway.com/api/transact.php?' . $data;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSLVERSION, 3);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);

		// Process result
		$result = explode('&', $result);
		$results = array();
		foreach ($result as $value) {
			$value = explode('=', $value);
			$results[$value[0]] = $value[1];
		}

		if ($results['response'] == 1)
		{
			Payment::addMoney(Auth::user()->id, (int) Input::get('ss-add-funds-amount'));
		}

		// TO DO: Alert user
		return Redirect::back();
	}

	/**
	 * Groups Management
	 */
	public function getGroupsManagement()
	{
		$groups = Group::getUserGroups();
		$suggested = Group::getSuggestedGroups();

		$this->layout->content = View::make(
			'settings.groups_management', 
			compact('groups', 'suggested')
		);
	}

	/**
	 * Classrooms Management
	 */
	public function getClassroomsManagement()
	{
		$classrooms = Classroom::getUserClassrooms();
		$suggested = Classroom::getSuggestedClassrooms();

		$this->layout->content = View::make(
			'settings.classrooms_management', 
			compact('classrooms', 'suggested')
		);
	}

	/**
	 * Notifications & Security
	 */
	public function getNotificationsSecurity()
	{
		$this->layout->content = View::make(
			'settings.notifications_security'
		);
	}

	/**
	 * Invite Friends
	 */
	public function getInviteFriends()
	{
		$this->layout->content = View::make(
			'settings.invite'
		);
	}

	/**
	 * Financial Center
	 */
	public function getFinancial()
	{
		$withdrawal_available = Payment::getWithdrawalAvailableMoney();
		$all_time_income = Payment::getAllTimeIncome();
		$dwolla_accounts = DwollaAccount::where('user_id', '=', Auth::user()->id)
			->get();

		$this->layout->content = View::make(
			'settings.financial',
			compact(
				'withdrawal_available',
				'all_time_income',
				'dwolla_accounts'
			)
		);
	}

	/**
	 * Identity Verification
	 */
	public function getVerification()
	{
		$validator_errors = Session::get('validator_errors');

		if (Auth::user()->verified == 'pending')
		{
			$verification_id = Image::where('imageable_type', '=', '_UserVerification')
				->where('imageable_id', '=', Auth::user()->id)
				->firstOrFail();
		}

		if (Auth::user()->w9 == 'complete')
		{
			$old_w9 = W9::where('user_id', '=', Auth::user()->id)
				->firstOrFail();
		}

		$this->layout->content = View::make(
			'settings.verification',
			compact('validator_errors', 'verification_id', 'old_w9')
		);
	}

	/**
	 * Identity Verification (POST)
	 */
	public function postVerification()
	{
		if (Input::hasFile('photo')
			&& Input::file('photo')->getSize() < 4000000
			&& Auth::user()->verified == 'not sent')
		{
			$filename = 'verification/' . time() . str_random(16) . '.jpg';
			$image = GDImage::make(Input::file('photo')->getRealPath())
				->resize(450, null, true, false); // Max width: 450
			
			$s3 = AWS::get('s3');
			$result = $s3->putObject(array(
				'Bucket' => Config::get('s3.bucket'),
				'Key' => $filename,
				'Body' => $image->encode('jpg'),
				'ACL' => 'public-read'
			));

			$image = new Image;
			$image->path = $filename;
			$image->imageable_type = '_UserVerification';
			$image->imageable_id = Auth::user()->id;
			$image->save();

			$user = Auth::user();
			$user->verified = 'pending';
			$user->save();
		}

		return Redirect::route('settings.verification');
	}

	/**
	 * POST: Send W9 form
	 */
	public function postSendW9()
	{
		$validator = Validator::make(
			Input::all(),
			User::$w9_rules
		);

		if ($validator->passes())
		{
			$w9 = W9::firstOrNew(array(
				'user_id' => Auth::user()->id
			));
			$w9->name = Input::get('name');
			$w9->address = Input::get('address');
			$w9->city = Input::get('city');
			$w9->state = Input::get('state');
			$w9->zip = Input::get('zip');
			$w9->tax_status = Input::get('tax_status');
			$w9->tin_type = Input::get('tin_type');
			$w9->tin = Input::get('tin');
			$w9->save();

			$user = Auth::user();
			$user->w9 = 'complete';
			$user->save();

			return Redirect::route('settings.verification');
		}
		else
		{
			return Redirect::route('settings.verification')
				->withInput()
				->with('validator_errors', array_keys($validator->failed()));
		}
	}

	/**
	 * Tutor Center
	 */
	public function getTutorCenter()
	{
		$user = Auth::user();
		$current_user_subjects = Subject::getUserSubjects();
		$incomingRequests = HireRequest::getIncomingRequests($user->id);

		$this->layout->content = View::make(
			'settings.tutor_center',
			compact('current_user_subjects', 'incomingRequests')
		);
	}

	/**
	 * Ajax: Subjects autocomplete
	 */
	public function ajaxSubjects()
	{
		$search = Input::get('q');
		return Subject::searchAutocomplete($search);
	}

	/**
	 * Ajax: Assign a subject to a user
	 */
	public function ajaxAddSubject()
	{
		$sid = Input::get('id');
		Subject::addUserSubject(Auth::user()->id, $sid);

		return array('error' => 0);
	}

	/**
	 * Ajax: Delete a subject from the user
	 */
	public function ajaxDeleteSubject()
	{
		$sid = Input::get('id');
		Subject::deleteUserSubject(Auth::user()->id, $sid);

		return array('error' => 0);
	}

	/**
	 * Ajax: Change user data (bio, price, available, ...)
	 */
	public function ajaxChangeUserData()
	{
		$user = Auth::user();
		switch (Input::get('what'))
		{
			case 'bio':
				$user->bio = Input::get('value');
				$user->save();
				break;

			case 'price':
				$new_price = (int) Input::get('value');
				if ($new_price >= 20 && $new_price <= 99)
				{
					$user->price = $new_price;
					$user->save();
				}
				break;

			case 'available':
				$available = (int) Input::get('value');
				$available = (bool) $available;
				$available = (int) $available;
				$user->available = $available;
				$user->save();
				break;

			case 'notifications_friend_requests':
			case 'notifications_messages':
			case 'notifications_hours_early':
			case 'security_see_profile':
			case 'security_search_engine':
				$what = Input::get('what');
				$user->$what = Input::get('value');
				$user->save();
				break;
		}

		return array('error' => 0);
	}

	/**
	 * Ajax: Approve hire request
	 */
	public function ajaxApproveHireRequest()
	{
		$success = HireRequest::approveHireRequest(
			(int) Input::get('hr_id'),
			(int) Input::get('choice')
		);

		return array('error' => (int) !$success);
	}

	/**
	 * Ajax: Decline hire request
	 */
	public function ajaxDeclineHireRequest()
	{
		$success = HireRequest::declineHireRequest(
			(int) Input::get('hr_id')
		);
		
		return array('error' => (int) !$success);
	}

	/**
	 * Ajax: Add Dwolla Account
	 */
	public function ajaxAddDwolla()
	{
		$before = DwollaAccount::where('user_id', '=', Auth::user()->id)
			->where('email', '=', Input::get('email'))
			->count();

		if (!$before)
		{
			$da = new DwollaAccount;
			$da->user_id = Auth::user()->id;
			$da->email = Input::get('email');
			$da->save();

			return array('error' => 0);
		}

		return array('error' => 1);
	}

	/**
	 * Ajax: Delete Dwolla Account
	 */
	public function ajaxDeleteDwolla()
	{
		$before = DwollaAccount::where('user_id', '=', Auth::user()->id)
			->where('id', '=', (int) Input::get('id'))
			->delete();

		return array('error' => 0);
	}

	/**
	 * Ajax: Withdrawal
	 */
	public function ajaxWithdrawal()
	{
		$can_withdrawal = Withdrawal::canWithdrawal(
			Auth::user(),
			(int) Input::get('amount')
		);

		if ($can_withdrawal)
		{
			$dwolla_account = DwollaAccount::where('id', '=', (int) Input::get('method_id'))
				->where('user_id', '=', Auth::user()->id)
				->first();

			if (!$dwolla_account)
			{
				return array('error' => 1);
			}

			$transaction_id = Withdrawal::sendDwolla(
				$dwolla_account->email,
				(int) Input::get('amount')
			);

			if ($transaction_id)
			{
				$w = new Withdrawal;
				$w->user_id = Auth::user()->id;
				$w->amount = (int) Input::get('amount');
				$w->transaction_id = $transaction_id;
				$w->save();

				return array('error' => 0);
			}
			else
			{
				return array('error' => 1);
			}
		}
		else
		{
			return array('error' => 1);
		}
	}

}
