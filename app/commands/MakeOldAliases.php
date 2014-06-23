<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MakeOldAliases extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'aliases:makeold';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Makes aliases for older resources.';

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
		$this->comment('Subjects ...');
		Subject::chunk(200, function($subjects)
		{
			foreach ($subjects as $subject)
			{
				Alias::makeAlias($subject->name, 'Subject', $subject->id);
			}
		});
		$this->info('Done!');

		$this->comment('Classrooms ...');
		Classroom::chunk(200, function($classrooms)
		{
			foreach ($classrooms as $classroom)
			{
				Alias::makeAlias($classroom->name, 'Classroom', $classroom->id);
			}
		});
		$this->info('Done!');

		$this->comment('Universities ...');
		University::chunk(200, function($universities)
		{
			foreach ($universities as $university)
			{
				Alias::makeAlias($university->name, 'University', $university->id);
			}
		});
		$this->info('Done!');

		$this->comment('Highschools ...');
		Highschool::chunk(200, function($highschools)
		{
			foreach ($highschools as $highschool)
			{
				Alias::makeAlias($highschool->name, 'Highschool', $highschool->id);
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
