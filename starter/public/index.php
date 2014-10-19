<?php 

define('DD', __DIR__ . '/..'); 

require DD . '/wpa17/functions.php';
require DD . '/app/controller/controllers.php';

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 'home';
}

$routes = include DD . '/app/routes.php';

if(array_key_exists($page, $routes)) {
	call_user_func($routes[$page]);	
} else {
	echo "404 Not Found!";
}


 ?>