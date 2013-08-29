<?php
	class model{
		public $db;
		public $fn;
		public function model(){
                    $this->db = new databasei();
                    //print_r($this->db);
                    $this->db->connect(config::$db_host, config::$db_user, config::$db_password, config::$db_name);
                	$this->db->uconnect(config::$db_host, config::$db_user, config::$db_password, config::$db_name);
                	
                	$this->fn = new functions();
                }
		
	}
?>
