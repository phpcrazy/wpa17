<?php 
define('DD', __DIR__ . '/..');

require DD . '/wpa17/functions.php';
require DD . '/app/controller/controllers.php';

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 'home';
}

$controller_name = ucfirst($page) . 'Controller';

if(function_exists($controller_name)) {
	call_user_func($controller_name);
} else {
	echo "404";
}

 ?>