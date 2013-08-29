<?php

class main extends controller {
	function main(){
		$this->main_model = $this->model('main');
	}
	
	
	
	function index_action(){
        $data['test'] = 'ok';
		$this->template('main',$data,'main');
	}
	
	
	
}

?>
