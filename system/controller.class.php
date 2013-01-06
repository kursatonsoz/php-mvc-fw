<?php
	class controller{
		function index_action(){
			
		}

		
		function view($name,$data=array()){
			try{
				if(!ctype_alpha($name))
					throw new Exception("geçersiz view adı");
				
				if(!file_exists(systemPath.'view/'.$name.'_view.phtml'))
					throw new Exception("view yok");
				
				if (is_array($data))
                	extract($data);
				
				require_once systemPath.'view/'.$name.'_view.phtml';
				
			}catch(exception $e){
					core::err($e);
			}
		}
		
		
		function model($name){
			
			try{
				if(!ctype_alpha($name))
						throw new Exception("geçersiz model adı");
				if(!file_exists(systemPath.'model/'.$name.'_model.php'))
						throw new Exception("model yok");
				
				require_once systemPath.'model/'.$name.'_model.php';
				$name = $name.'_model';
				return new $name;
			}catch(exception $e){
					core::err($e);
			}
			
		}
	}
?>