<?php 

function HomeController() {
	$data = array(
		'title'	=> _config_get('site.title')
		);
	_view_load('home', $data);
}

function BlogController() {
	$data = array(
		'title' 	=> _config_get('site.title'),
		'another'	=> 'How are you!'
		);
	_view_load('blog', $data);
}

 ?>