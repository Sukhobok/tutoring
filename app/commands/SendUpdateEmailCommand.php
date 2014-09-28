<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SendUpdateEmailCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'send_email:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Send an email to existing users to notify about the update';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		User::chunk(100, function ($users)
		{
			foreach ($users as $user)
			{
				$email_data = array();
				$email_data['token_link'] = URL::route('user.token_link');
				$email_data['token_link'] .= '?token=' . $user->remember_token;
				$email_data['token_link'] .= '&id=' . $user->id;
				
				Mail::send('emails.studysquare_update', $email_data, function ($message) use ($user)
				{
					$message->to($user->email, $user->name)
						->subject('StudySquare is back!');
				});
			}
		});

		$this->info('Done!');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
