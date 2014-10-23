<?php 

function HomeController() {
	$data = array(
		'title'	=> _config_get('site.title')
		);
	_view_load('home', $data);
}

function ProductController() {
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	if($id == null) {
		$products = _getAllProducts();
		var_dump($products);
	} else {
		$product = _getProduct(2);
		var_dump($product);
	}
}

function BlogController() {
	$data = array(
		'title' 		=> _config_get('site.title'),
		'another'		=> 'How are you!', 
		);
	_view_load('blog', $data);
}

 ?>