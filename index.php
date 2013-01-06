<?php
	define('mode', 'developer');

	define('default_controller', 'giris');
	define('default_action', 'index');
	define('action_format',	'_action');
	define('actions_enabled', TRUE);

	define('log',TRUE);
	define('log_path','../logs'); #if empty: message is sent to PHP's system logger
	define('detailed_log',TRUE);

	define('db_host', 'localhost');
	define('db_user', '');
	define('db_pass', '');
	define('db_database', '');

	define('stylePath','/static/style/');
	define('scriptPath', '/static/script/');

	define('systemPath', 'system/');
	define('imagePath', '/static/images/');

	if(mode=='developer'){
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
	}

	require_once systemPath.'core.class.php';
	require_once systemPath.'controller.class.php';
	require_once systemPath.'model.class.php';
	require_once systemPath.'view.php';
	$core = new core();


?>
