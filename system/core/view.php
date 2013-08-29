<?php
	function style($name){
		return config::$style_path.$name.'.css';
	}
	
	function script($name,$type=0){
		switch($type){
			case 0: return config::$script_path.$name.'.js'; break;
			case 1: return $name;
		}
		
	}	
	function image($name){
		return config::$image_path.$name;	
	}
	function upload($name){
		return config::$upload_path.$name;	
	}
        
        

?>
