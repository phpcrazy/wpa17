<?php 

function _view_load($view, $data = null) {
	ob_start();
	if($data != null) {
		extract($data); 
	}
	require DD . '/app/view/' . $view . '.php';
	ob_end_flush();
}	

function _config_get($value) {
	$explode_value = explode('.', $value);
	$config_value = require DD . '/app/config/' 
		. $explode_value[0] . '.php';
	var_dump($explode_value);
	return $config_value;
}

?>