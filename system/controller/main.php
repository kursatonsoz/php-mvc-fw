<?php
class main extends controller{
	function main(){
		              
	}
  
	function index_action() {
			$data[] = array();
			$mm = $this->model('main');
			$tl = new testlib();
			$data['word'] =  $mm->get_helloworld();
			$data['word2'] = $tl->get_data();
		  $this->view('main',$data);
	}


      
}
