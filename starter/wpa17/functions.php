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
	$slice_value = array_slice($explode_value, 1);
	return _arrayResolver($slice_value, $config_value);

}

function _arrayResolver($key, $default_array) {
	foreach ($key as $k => $value) {
		$default_array = $default_array[$value];
	}
	return $default_array;
}

?>