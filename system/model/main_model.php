<?php
class main_model extends model{
	function test(){
		$this->db->setQuery('SELECT * FROM user');
		print_r($this->db->loadObjectList());
	}	
}
?>
