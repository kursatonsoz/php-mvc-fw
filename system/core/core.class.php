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

		} catch(Exception $e){
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
			$cont = '';
			if(empty(core::$path[1])) 
				$cont=config::$default_controller;
			else
				$cont=core::$path[1];
						
			$validate_controller_name = ctype_alnum($cont);
			$controller_file_exist			= file_exists('system/controller/'.$cont.'.php');
			

			if($validate_controller_name and $controller_file_exist)
				;
			else
				$cont=config::$default_controller;

			
				require_once 'system/controller/'.$cont.'.php';
				core::$controller = new $cont;
				
			
			#controller load END
		}catch(Exception $e){
					throw new Exception(core::ex_string($e));	
		}
	}

	public static function call_action(){
		try{
			#action call START
			if(!config::$actions_enabled) 
				return;	
			$action = '';
			
			
				
                            
			if(empty(core::$path[2])) 
				$action = config::$default_action;	
			else
				$action = trim(core::$path[2]);
			
			$validate_action_name = ctype_alnum($action);
			$action_exists				 = method_exists(core::$controller, $action.config::$action_format);
	
			if($validate_action_name and $action_exists){	        
				;
			}else{
				#core::$path[2]=config::$default_action;	
				$action = config::$default_action;	
			}
			core::$controller->{$action.config::$action_format}();
			#action call END
		}catch(Exception $e){
			throw new Exception(core::ex_string($e));
		}
	}

	static function ex_string($e){
		$ex = new stdClass;
		$ex->m = $e->getMessage();
		if(config::$detailed_log)
			$ex->l = $e->getTrace();
		$ex->t = date('d-m-y h:i:s');
		
		return json_encode($ex)."\n";
	}

	static function err($e){
		if(config::$mode=='developer'){
					print_r(($e->getMessage())); 
		}

		if(config::$log){
			if(config::$log_path!=''){
                            echo 'asd';
				error_log($e->getMessage()."\n",3,config::$log_path.'/'.date('d-m-y ',time()).'.log');
			}else{
				errot_log($e->getMessage());
			}
			
		}
	}		


	}
?>
