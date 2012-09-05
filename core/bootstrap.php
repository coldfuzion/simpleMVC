<?php if (!defined('ROOT')) exit('You Cant do that!');

// ROOT and DS are declared in index.php

include ROOT . DS . 'core' . DS . 'core.php' ;


class bootstrap extends core {

	private $load;

	function __construct(){
	
		parent::__construct();
		
		include ROOT . DS . 'core' . DS . 'controller.php';

		include ROOT . DS . 'core' . DS . 'load.php';

		include ROOT . DS . 'core' . DS . 'uri.php';

		include ROOT . DS . 'core' . DS . 'routes.php';

		$routes = new routes();

		$defaultController = $routes->default;

		$uri  =  new uri($_SERVER['REQUEST_URI'], $defaultController);
		
		new controller();

		$this->load = new load();
		
		$this->load->controller($options = array('controller' => $uri->uriClass, 'method' => $uri->uriMethod, 'data' => $uri->data));

	}
}

new bootstrap;
