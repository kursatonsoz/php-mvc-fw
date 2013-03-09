<?php
	class model{
		public static $db;
		public function model(){
                    $this->db = new databasei();
                    $this->db->connect('localhost', 'root', '1', 'abi');
                }
		
	}
?>
