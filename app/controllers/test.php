<?php
class test extends controller {
	
	function index() {
	
	parent::__construct();
		$data['name'] = "JASON";
		$data['view'] = "test";
		$this->load->page("test", $data);
	
	}

}