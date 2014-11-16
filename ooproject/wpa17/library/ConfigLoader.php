<?php 
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


 ?>