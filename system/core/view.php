<?php
	function style($name){
		return style_path.$name.'.css';
	}
	
	function script($name,$type=0){
		switch($type){
			case 0: return script_path.$name.'.js'; break;
			case 1: return $name;
		}
		
	}	
	function image($name){
		return image_path.$name;	
	}
        
        

?>
