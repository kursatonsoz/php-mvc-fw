<?php
	class controller{
		function index_action(){
			
		}

		
		static function view($name,$data=array()){
			try{
				if(!ctype_alpha($name))
					;//throw new Exception("geçersiz view adı");
				
				if(!file_exists(system.'view/'.$name.'_view.phtml'))
					throw new Exception("view yok");
				
				if (is_array($data))
                    extract($data);
				
				require_once system.'view/'.$name.'_view.phtml';
				
			}catch(exception $e){
					core::err($e);
			}
		}
		
		
		static function model($name){
			
			try{
				if(!ctype_alpha($name))
						throw new Exception("geçersiz model adı");
				if(!file_exists('system/model/'.$name.'_model.php'))
						throw new Exception("model yok");
				
				require_once 'system/model/'.$name.'_model.php';
				$name = $name.'_model';
				return new $name;
			}catch(exception $e){
					core::err($e);
			}
			
		}

		static function template($view,$data=array(), $template=''){
			if(empty($template)){
				$template = config::$default_template;
			}
	        $data['__content__'] = '';
	        $data['path'] = core::$path;
	        $data['path'][0] = '';
	        $data['path'] = implode('/', $data['path']);
	        if(!empty($view)){
	        	ob_start();
				controller::view($view,$data);
				$data['__content__'] = ob_get_contents();
			
				ob_end_clean();
	        }

	        try{
	        if(!file_exists(system.'template/'.$template.'_template.phtml'))
				throw new Exception("template yok");

	        if (is_array($data))
	            extract($data);

	        require_once system.'template/'.$template.'_template.phtml';
			}catch(exception $e){
				core::err($e);
			}
			//controller::view('template'.$template,$data);
	}

	}
?>