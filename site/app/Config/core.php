<?php
	Configure::write('debug', 2);
	Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
	));
	Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
	));
	Configure::write('App.encoding', 'UTF-8');
	Configure::write('Session', array(
		'defaults' => 'php'
	));
	Configure::write('Security.salt', 'DYhG93b0qyJfBafs2guFuIubWwvniR2G0FgaC9mi');
	Configure::write('Security.cipherSeed', '76859309633781542496749683645');
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');

	$engine = 'File';
	
	$duration = '+999 days';
	if (Configure::read('debug') > 0) 
	{
		$duration = '+10 seconds';
	}
	
	$prefix = 'myapp_';
	
	Cache::config('_cake_core_', array(
		'engine' => $engine,
		'prefix' => $prefix . 'cake_core_',
		'path' => CACHE . 'persistent' . DS,
		'serialize' => ($engine === 'File'),
		'duration' => $duration
	));
	
	Cache::config('_cake_model_', array(
		'engine' => $engine,
		'prefix' => $prefix . 'cake_model_',
		'path' => CACHE . 'models' . DS,
		'serialize' => ($engine === 'File'),
		'duration' => $duration
	));
?>