<?php 
define('DD', __DIR__ . '/..');
$title = Config::site('foo.bar');
$dbname = Config::database('dbname');
$name = Config::products('name');
var_dump($name);
class Config {
	public static function __callStatic($method, $arguments) {
		$file = DD . '/app/config/' . $method . '.php';
		if(file_exists($file)) {
			$data = require $file;
			$key = explode('.', $arguments[0]);
			return _arrayResolver($key, $data);
		} else {
			trigger_error("File not found!", E_USER_ERROR);
		}	
	}
}

function _arrayResolver($key, $default_array) {
	foreach ($key as $k => $value) {
		$default_array = $default_array[$value];
	}
	return $default_array;
}

 ?>