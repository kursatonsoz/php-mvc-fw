<?php

        define('db_host','localhost');
        define('db_user','root');
        define('db_pass','1');
        define('db_database','abi');
        class db{     
                public $db;
		public static $query_temp;

		public function db(){
			$this->db = new mysqli(	 db_host,
                        db_user,
                        db_pass,
                        db_database);
				
				if($this->db->connect_errno > 0){
					throw new Exception("\nmysqli baglanti hatasi: ".$this->db->connect_error);
				}
		}
		
		public function query($sql){
			
			self::$query_temp[] = $sql;
			if(!$result = $this->db->query($sql)){
			    throw new Exception("\n mysql sorgu hatasi: [" . $this->db->error . ']');
			}
			
			return $result;
		}
		
		public function getAll($sql){
			
			self::$query_temp[] = $sql;
			$data = array();
			if(!$result = $this->db->query($sql)){
			    throw new Exception("\n mysql sorgu hatasi: [" . $this->db->error . ']');
			}
			
			while($row = $result->fetch_assoc()){
			    $data[] = $row;
			}
			$result->free();
			return $data;			
		}
		
		public function getOne($sql){
			
			self::$query_temp[] = $sql;
			if(!$result = $this->db->query($sql)){
			    throw new Exception("\n mysql sorgu hatasi: [" . $this->db->error . ']');
			}
			
			return $result->fetch_assoc();
		}
		
		public function callSp($sp,$parameters){
			$p;
			foreach ($parameters as $key => $value) {
				$p .=$value;
				if($key+1 != sizeof($parameters)){
					$p .=',';
				}	
			}
			
			if(!$result = $this->db->real_query('CALL '.$sp.'('.$p.')') ){
				throw new Exception("\n s.prosedur hatasi: [" . $this->db->error . ']');
			}
			
			return $result;
		}
		
		public function getSpAll($sp,$parameters){
			$p;
			foreach ($parameters as $key => $value) {
				$p .=$value;
				if($key+1 != sizeof($parameters)){
					$p .=',';
				}	
			}
			
			if(!$result = $this->db->real_query('CALL '.$sp.'('.$p.')') ){
				throw new Exception("\n s.prosedur hatasi: [" . $this->db->error . ']');
			}
			
			while($row = $result->fetch_assoc()){
			    $data[] = $row;
			}
			$result->free;
			return $data;
		}
		
		
		public function getSpOne($sp,$parameters){
			$p;
			foreach ($parameters as $key => $value) {
				$p .=$value;
				if($key+1 != sizeof($parameters)){
					$p .=',';
				}	
			}
			
			if(!$result = $this->db->real_query('CALL '.$sp.'('.$p.')') ){
				throw new Exception("\n s.prosedur hatasi: [" . $this->db->error . ']');
			}
			
			
			return $result->fetch_assoc();
		}
		
		


	}


?>
