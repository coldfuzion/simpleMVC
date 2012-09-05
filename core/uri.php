<?php if (!defined('ROOT')) exit('You Cant do that!');

class uri {
	public $uriClass;
	public $uriMethod;
	public $uriData;


	function __construct($uri, $defaultController) {
		// do no include external files!		
		if(preg_match('/^[http::\/\/] | /', $uri)) { return FALSE; $uri = NULL;};
		
		$u = explode("/", $uri);

		$this->uriClass  = $u[2] ? $u[2]  : $defaultController;
		$this->uriMethod = $u[3] ? $u[3]  : "index";
		$this->uriData   = $u[4];
	}

}