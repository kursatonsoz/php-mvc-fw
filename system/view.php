<?php
	function style($name){
		return stylePath.$name.'.css';
	}
	
	function script($name,$type=0){
		switch($type){
			case 0: return scriptPath.$name.'.js'; break;
			case 1: return $name;
		}
		
	}
	
	function image($name){
		return imagePath.$name;	
	}

?>