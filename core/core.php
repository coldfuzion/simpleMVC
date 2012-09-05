<?php if (!defined('ROOT')) exit('You Cant do that!');
class core {
	
	function __construct() {
	
		// set appliaction folder name
		
		$app_folder = "app";
		
		if(!defined(DS))
		{
			define('DS', DIRECTORY_SEPARATOR);
		};
		if(!defined(ROOT))
		{
			define('ROOT', dirname(__FILE__));
		};
		if(!defined(APP_PATH))
		{
			define('APP_PATH', ROOT . DS . $app_folder);
		};
		if(!defined(EXT))
		{
			define('EXT', ".php");
		};
	}
	


}