<?php

	session_start();
	
 	error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT) ; ini_set("display_errors", 1); 
	define('system','system/');
	define('systemPath', 'system/core/');
	define('configDic',systemPath.'config/');

	define('config','developer');	#default: NULL
	define('autoload',TRUE);

	require_once systemPath.'config.class.php';
	require_once systemPath.'core.class.php';
	require_once systemPath.'controller.class.php';
	require_once systemPath.'model.class.php';
	require_once systemPath.'view.php';
        
	if(autoload)
		require_once systemPath.'autoload.php';

	$core = new core();


?>
