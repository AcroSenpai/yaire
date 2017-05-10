<?php
	// developer mode
	error_reporting(E_ALL);
	ini_set('display_errors',1);

	//config file
	require_once 'x.inc.php';

	use \X\Sys\Autoload;
	use \X\Sys\Core;
        use X\Sys\Session;

	$loader=new Autoload();
	$loader->register();
	$loader->addNamespace('X\Sys','sys');
	$loader->addNamespace('X\App','app');
	$loader->addNamespace('X\App\Controllers','app/controllers');
	$loader->addNamespace('X\App\Models','app/models');
	$loader->addNamespace('X\App\Views','app/views');	
        
        Session::init();
	Core::init();