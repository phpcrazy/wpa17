<?php 

function _getProduct($id) {
	$sql = "SELECT * FROM product WHERE id = :id";
	return _DB($sql, array('id' => $id));
}

function _getAllProducts() {
	$sql = "SELECT * FROM product";
	return _DB($sql);
}



?>