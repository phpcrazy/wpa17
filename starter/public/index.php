<?php 

/* 
What - Defines a named constant at runtime. 
Why - define the root directory 
*/
define('DD', __DIR__ . '/..'); 

require DD . '/wpa17/functions.php';
require DD . "/app/model/models.php";
require DD . '/app/controller/controllers.php';

$requestURI = explode('/', strtolower($_SERVER['REQUEST_URI']));
$scriptName = explode('/', strtolower($_SERVER['SCRIPT_NAME']));
$request_uri = array_diff($requestURI, $scriptName);
$request_uri = array_values($request_uri);
if(empty($request_uri)) {
	$request_uri[0] = 'home';
}

$routes = include DD . '/app/routes.php';

if(array_key_exists($request_uri[0], $routes)) {
	call_user_func($routes[$request_uri[0]]);	
} else {
	echo "404 Not Found!";
}


 ?>