<?php 

return array(
	'home'	=> 'HomeController@actionIndex',
	'test'	=> function() {
		View::load('home');
	},
	'blog'	=> 'BlogController@actionIndex',
	);

 ?>