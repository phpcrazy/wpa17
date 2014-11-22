<?php 
namespace Wpa17\Core;

class Application {
	private $request_uri;

	public function __construct()
	{
		$requestURI = explode('/', strtolower($_SERVER['REQUEST_URI']));
		$scriptName = explode('/', strtolower($_SERVER['SCRIPT_NAME']));
		$request_uri = array_diff($requestURI, $scriptName);
		$this->request_uri = array_values($request_uri);
		if(empty($this->request_uri)) {
			$this->request_uri[0] = 'home';
		}
		var_dump($this->request_uri);

	}

	public function run() {
		$routes = include DD . '/app/routes.php';

		if(array_key_exists($this->request_uri[0], $routes)) {
			if(!is_callable($routes[$this->request_uri[0]])) {
				$controller = explode('@', $routes[$this->request_uri[0]]);	
				call_user_func_array(array(new $controller[0], $controller[1]), array());	
			} else {
				$controller = $routes[$this->request_uri[0]];
				call_user_func($controller);
			}

		} else {
			echo "404 Not Found!";
		}

	}

}

?>