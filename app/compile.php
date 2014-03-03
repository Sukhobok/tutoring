<?php

use Devize\ClosureCompiler\ClosureCompiler;

/*
|--------------------------------------------------------------------------
| Compile LESS & JS files
|--------------------------------------------------------------------------
|
| Here is the code for compiling LESS & JS files on local environment
|
*/

Debugbar::startMeasure('less', 'Time for converting less to css');

$less = new lessc;
$less->setFormatter('compressed');
$less->compileFile('app/assets/less/style.less', 'public/css/style.css');

Debugbar::stopMeasure('less');

// JS

Debugbar::startMeasure('js', 'Time for computing js');

$compiler = new ClosureCompiler;
$compiler->setSourceBaseDir('app/assets/js/');
$compiler->setTargetBaseDir('public/js/');
$compiler->setSourceFiles(array(
	'right_sidebar.js',
	'core.js'
));
$compiler->setTargetFile('script.min.js');
$compiler->compile();

Debugbar::stopMeasure('js');
