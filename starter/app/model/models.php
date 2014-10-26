<?php 

function _getProduct($id) {
	$sql = "SELECT * FROM product WHERE id = :id";
	return _DB($sql, array('id' => $id));
}

function _getAllProducts() {
	$sql = "SELECT * FROM product";
	return _DB($sql);
}

function _addUser($username, $password) { 
	$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
	_DB($sql, array(
		'username' => $username,
		'password' => $password)
	);
}

function _checkUserNameAndPassword($username, $password) {
	$sql = "SELECT id FROM users WHERE username = :username AND password = :password";
	$id = _DB($sql, array(
			'username' => $username,
			'password' => $password)
	);
	if(empty($id)) {
		return false;
	}
	return true;
}


?>