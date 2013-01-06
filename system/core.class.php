<?php 
	class core {

	public static $path;
	public static $path_s;
	public static $controller;

	public function core(){
		try{
			core::$path = core::parse_url();
			core::load_controller();
			core::call_action();			
		}catch(Exception $e){
			core::err($e);
		}
	}

	public static function parse_url(){
		try{
			#url path parshe START
			$parse_url= parse_url($_SERVER["REQUEST_URI"]);
			return explode('/' , $parse_url['path']);
			#url path parshe END
		}catch(Exception $e){
			throw new Exception(core::ex_string($e));		
		}
	}

	public static function load_controller(){
		try{
			#controller load START
			if(empty(core::$path[1])) 
				core::$path[1]=default_controller;
						
			$validate_controller_name = ctype_alnum(core::$path[1]);
			$controller_file_exist			= file_exists(systemPath.'controller/'.core::$path[1].'.php');

			if($validate_controller_name and $controller_file_exist){
				require_once 'system/controller/'.core::$path[1].'.php';
				$controller = new core::$path[1];
			}
			#controller load END
		}catch(Exception $e){
					throw new Exception(core::ex_string($e));	
		}
	}

	public static function call_action(){
		try{
			#action call START
			if(!actions_enabled) 
				return;	
				
			if(empty(core::$path[2])) 
				core::$path[2]=default_action;	

			$validate_action_name = ctype_alnum(core::$path[2]);
			$action_exists				 = method_exists(core::$controller, core::$path[2].action_format);
	
			if($validate_action_name and $action_exists){	
				core::$controller->{core::$path[2].action_format};
			}
			#action call END
			throw new Exception('bisey oldu');
		}catch(Exception $e){
			throw new Exception(core::ex_string($e));
		}
	}

	static function ex_string($e){
		$ex = new stdClass;
		$ex->m = $e->getMessage();
		if(detailed_log)
			$ex->l = $e->getTrace();
		$ex->t = date('d-m-y h:i:s');
		
		return json_encode($ex)."\n";
	}

	static function err($e){
		if(mode=='developer'){
					echo '<pre>';
					print_r(($e->getMessage())); 
					echo '<pre>';
		}

		if(log){
			if(log_path!=''){
				error_log($e->getMessage(),3,log_path.'/'.date('d-m-y ',time()).'.log');
			}else{
				errot_log($e->getMessage());
			}
			
		}
	}		


	}
?>
