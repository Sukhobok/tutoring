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
		if (in_array('less', $this->option('file')))
		{
			$this->comment('Starting to compile LESS');
			$this->compileLess();
			$this->info('Done!');
		}

		if (in_array('js', $this->option('file')))
		{
			$this->comment('Starting to compile JS');
			$this->compileJs();
			$this->info('Done!');
		}

		if (in_array('js-r', $this->option('file')))
		{
			$this->comment('Starting to compile JS - Replay');
			$this->compileJsReplay();
			$this->info('Done!');
		}

		if (in_array('js-r-wb', $this->option('file')))
		{
			$this->comment('Starting to compile JS - Replay - Whiteboard');
			$this->compileJsReplayWhiteboard();
			$this->info('Done!');
		}

		if (in_array('js-ts', $this->option('file')))
		{
			$this->comment('Starting to compile JS - Tutoring Session');
			$this->compileJsTutoringSession();
			$this->info('Done!');
		}

		if (in_array('js-wb', $this->option('file')))
		{
			$this->comment('Starting to compile JS - Whiteboard');
			$this->compileJsWhiteboard();
			$this->info('Done!');
		}
	}

	/**
	 * Compile LESS
	 */
	public function compileLess()
	{
		$less = new lessc;
		$less->setFormatter('compressed');
		$less->compileFile('app/assets/less/style.less', 'public/css/style.css');
	}

	/**
	 * Compile JS
	 */
	public function compileJs()
	{
		$compiler = new ClosureCompiler;
		$compiler->setSourceBaseDir('app/assets/js/');
		$compiler->setTargetBaseDir('public/js/');
		$compiler->setSourceFiles(array(
			'plugins/jquery-jcrop-0.9.12.js',
			'plugins/jquery-tokeninput.js',
			'plugins/jquery-mousewheel.js',
			'plugins/jquery-mCustomScrollbar.js',
			'plugins/jquery-growl.js',
			'plugins/jquery-pageslide-ss.js',
			'plugins/jquery-readmore.js',
			'core.js',
			'socket.io.js',
			'ss_modals.js',
			'time.js',
			'elements_behavior.js',
			'posts.js',
			'photos.js',
			'right_sidebar.js',
			'left_sidebar.js',
			'settings.my_profile.js',
			'settings.cg_management.js',
			'settings.tutor_center.js',
			'settings.notifications_security.js',
			'settings.financial.js',
			'cg.js',
			'messages.js',
			'user.view.js',
			'header_expand.js',
			'search.js',
			'hire_now.js',
			'ss_chat.js'
		));
		$compiler->setTargetFile('script.min.js');
		$compiler->compile();
	}

	/**
	 * Compile JS - Replay
	 */
	public function compileJsReplay()
	{
		$compiler = new ClosureCompiler;
		$compiler->setSourceBaseDir('app/assets/js/tutoring_session/');
		$compiler->setTargetBaseDir('public/js/tutoring_session/');
		$compiler->setSourceFiles(array(
			'text_core.js',
			'text_replay.js',
			'coding_core.js',
			'select_mode.js',
			'chat_core.js',
			'file_manager_replay.js',
		));
		$compiler->setTargetFile('replay.min.js');
		$compiler->compile();
	}

	/**
	 * Compile JS - Replay - Whiteboard
	 */
	public function compileJsReplayWhiteboard()
	{
		$compiler = new ClosureCompiler;
		$compiler->setSourceBaseDir('app/assets/js/tutoring_session/');
		$compiler->setTargetBaseDir('public/js/tutoring_session/');
		$compiler->setSourceFiles(array(
			'whiteboard_core.js',
			'whiteboard_tools/pencil.js',
			'whiteboard_tools/erase.js',
			'whiteboard_tools/rectangle.js',
			'whiteboard_tools/ellipse.js',
			'whiteboard_tools/line.js',
			'whiteboard_tabs.js',
			'whiteboard_color_size.js',
			'replay_core.js'
		));
		$compiler->setTargetFile('replay_whiteboard.min.js');
		$compiler->compile();
	}

	/**
	 * Compile JS - Tutoring Session
	 */
	public function compileJsTutoringSession()
	{
		$compiler = new ClosureCompiler;
		$compiler->setSourceBaseDir('app/assets/js/tutoring_session/');
		$compiler->setTargetBaseDir('public/js/tutoring_session/');
		$compiler->setSourceFiles(array(
			'socket_core.js',
			'webrtc.js',
			'text_core.js',
			'text_interaction.js',
			'coding_core.js',
			'coding_interaction.js',
			'select_mode.js',
			'select_mode_interaction.js',
			'chat_core.js',
			'chat_interaction.js',
			'file_manager_core.js',
			'file_manager_interaction.js',
			'finish.js'
		));
		$compiler->setTargetFile('tutoring_session.min.js');
		$compiler->compile();
	}

	/**
	 * Compile JS - Whiteboard
	 */
	public function compileJsWhiteboard()
	{
		$compiler = new ClosureCompiler;
		$compiler->setSourceBaseDir('app/assets/js/tutoring_session/');
		$compiler->setTargetBaseDir('public/js/tutoring_session/');
		$compiler->setSourceFiles(array(
			'whiteboard_socket_send.js',
			'whiteboard_core.js',
			'whiteboard_tools/pencil.js',
			'whiteboard_tools/erase.js',
			'whiteboard_tools/rectangle.js',
			'whiteboard_tools/ellipse.js',
			'whiteboard_tools/line.js',
			'whiteboard_tabs.js',
			'whiteboard_interaction.js',
			'whiteboard_color_size.js',
			'whiteboard_screenshot.js',
			'socket_receive.js',
		));
		$compiler->setTargetFile('whiteboard.min.js');
		$compiler->compile();
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
		return array(
			array(
				'file',
				'f',
				InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
				'Compile a certain file',
				array('less', 'js', 'js-r', 'js-r-wb', 'js-ts', 'js-wb')
			)
		);
	}

}
