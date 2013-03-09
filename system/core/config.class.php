<?php
	$config = new config(config);
	class config{
		
		public  $default_controller = 'main';

		public  $actions_enabled = TRUE;
		public  $default_action = 'index';
		public  $action_format = '_action';
		
		public 	$db_class = 'db';

		public  $log = FALSE;
		public  $detailed_log = FALSE;
		public  $log_path = '../logs';

		public  $style_path = '/static/style/'; #if empty: message is sent to PHP's system logger
		public  $script_path = '/static/script/';
		public  $image_path = '/static/image/';

		public $libs = '/system/core/libs';

		public function config($conf){
			if(file_exists(configDic.$conf.'.class.php')){
				require_once configDic.$conf.'.class.php';
				$this->apply(new $conf);
			}else{
				$this->apply($this);
			}
		}
		
		

		function apply($conf){

			define('default_controller', $conf->default_controller);
			define('default_action', $conf->default_action);
			define('action_format',	$conf->action_format);
			define('actions_enabled', $conf->actions_enabled);
					
			define('db_class',$conf->db_class);			
			
			define('log', $conf->log);
			define('log_path', $conf->log_path); 
			define('detailed_log', $conf->detailed_log);

			define('style_path', $conf->style_path);
			define('script_path', $conf->script_path);	
			define('image_path', $conf->image_path);
			define('libs',$conf->libs);
                        define('mode', $conf->mode);

		}

	}

	
?>
