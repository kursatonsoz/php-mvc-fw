<?php
	$config = new config(config);
	class config{
		
		public static $default_controller = 'main';

		public static $actions_enabled = TRUE;
		public static $default_action = 'index';
		public static $action_format = '_action';

		public static $default_template = 'default';
		
		public static $db_class = 'db';

		public static $log = FALSE;
		public static $detailed_log = FALSE;
		public static $log_path = '../logs'; #if empty: message is sent to PHP's system logger

		public static $style_path = '/static/css/'; 
		public static $script_path = '/static/js/';
		public static $image_path = '/static/images/';
		public static $upload_path = '/static/upload/';

		public static $libs = '/system/core/libs';

		public static $db_host = 'localhost';
		public static $db_user = 'root';
		public static $db_password = '1';
		public static $db_name = 'db';


		public static $mode = 'developer';
	}

	
?>
