<?php if (!defined('ROOT')) exit('You Cant do that!');

class load {
	private function fileExistsInclude($file) {
		$fileExists = file_exists($file) ? TRUE : FALSE;
		if ($fileExists === TRUE) {
			include $file;
			return true;
		}
		else {
			include ROOT . DS . "core" . DS . "default" . DS . "404.html";
			return false;
		}

	}
	function controller($options = array('controller' => "", 'method' => "", 'data' => "")) {
		$file = APP_PATH . DS .  "controllers" . DS . $options['controller'] . EXT;
		$this->fileExistsInclude($file);
		if(class_exists($options['controller'])) 
		{
			$class = new $options['controller'];
			switch($options['method']) {
				default:
					$class->$options['method']($options['data']);
				break;
				case "":
					$class->index();
				break;
			};
		};
		
		
	
	}
	function model($options = array('model' => "", 'method' => "", 'data' => array('sql' => "", 'returnDataAs' => "" ))) {
		//returnDataAs can be obj, row, array, associate!
		//sql is to be a custom sql and not a select * from table;
		$file = APP . DS . "models" . DS . $options['model'] . EXT;
		$this->fileExistsInclude($file);
		if(class_exists($options['controller'])) 
		{
			$class = new $options['controller'];
			switch($options['method']) {
				default:
					$class->$options['method']($options['data']);
				break;
				case "":
					$class->default();
				break;
			};
		};
	
	
	}
	function view($view, $data = "") {
		if(is_array($data)) 
			{
				extract($data);
			};
		include APP_PATH . DS . "views" . DS . $view . EXT;
	}
	
	function page($view, $data) {
		if(is_array($data)) 
			{
				extract($data);
			};
		$page  = new load();
		include ROOT . DS . "webroot" . DS . "themes" . DS . "default" . DS . "page.tpl.php";
		// footer include 
		
	}


}