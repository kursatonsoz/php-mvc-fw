<?php
class upload{
	public $addresses = array();
	public $ids = array();
	public $errors = array();

	function upload($title, $dic = '', $types="", $maxsize=1048576){
		$dic=config::$upload_path.$dic;
		if(!file_exists($dic))
			mkdir($dic);

		if(!isset($_FILES) or count($_FILES)<1)
			return false;
		foreach ($_FILES as $key => $file) {

			if($file['size']>$maxsize){
				$this->errors[$key] = 'boyut çok büyük: '.$file['size'].'>'.$maxsize;
				continue;
			}

			if(!empty($types) and !in_array($file['type'] , $types)){
				$this->errors[$key] = 'dosya tipinde sorun vardı: file['.$key.']='.$file['name'].'...Olası tipler:'.implode(',', $types);
				continue;
			}

			if($file['error']>0){
				$this->errors[$key] = 'bir sorun vardı:'.$file['error'].' ';
				continue;
			}			
				
			$dest = $dic.(time()%10000).'_'.$title.'_'.$file['name'];
			if(move_uploaded_file($file['tmp_name'] , $dest)){
				chmod($dest, 777);
				$this->addresses[$key] = $dest;
				$gorsel = new stdClass();
				$gorsel->eklemeTarihi = time();
				$gorsel->path = '/'.$dest;
				$gorsel->title = $title;
				$gorsel->yayinID = 0;
			}


		}
	}

	function get_addresses(){
		return $this->adresses;
	}	

	function get_errors(){
		return $this->errors;
	}


}

?>