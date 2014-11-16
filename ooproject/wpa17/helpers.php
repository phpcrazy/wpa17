<?php 
function _arrayResolver($key, $default_array) {
	foreach ($key as $k => $value) {
		$default_array = $default_array[$value];
	}
	return $default_array;
}

function dump($value, $die = FALSE) {
	var_dump($value);
	if($die == TRUE) {
		die();
	}
}
?>