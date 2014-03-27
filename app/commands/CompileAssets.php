<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Devize\ClosureCompiler\ClosureCompiler;

class CompileAssets extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'compile:assets';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Compiles the assets (CSS + JS)';

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
		// LESS
		$this->comment('Starting to compile LESS');
		$less = new lessc;
		$less->setFormatter('compressed');
		$less->compileFile('app/assets/less/style.less', 'public/css/style.css');
		$this->info('Done!');

		// JS
		$this->comment('Starting to compile JS');
		$compiler = new ClosureCompiler;
		$compiler->setSourceBaseDir('app/assets/js/');
		$compiler->setTargetBaseDir('public/js/');
		$compiler->setSourceFiles(array(
			'plugins/jquery.tokeninput.js',
			'core.js',
			'time.js',
			'elements_behavior.js',
			'posts.js',
			'photos.js',
			'right_sidebar.js',
			'settings.my_profile.js',
			'cg.js'
		));
		$compiler->setTargetFile('script.min.js');
		$compiler->compile();
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
