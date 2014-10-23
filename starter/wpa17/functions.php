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

/** 
* Connect to Database 
* @param string, array
*/

function _DB($sql, $value = array()) {
	$servername = _config_get('database.hostname');
	$username = _config_get('database.username');
	$password = _config_get('database.password');
	$dbname = _config_get('database.dbname');
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$stmt = $conn->prepare($sql);
		$stmt->execute($value);
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		unset($conn);
		return $products;
	
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>