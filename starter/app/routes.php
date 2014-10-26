<?php 

return array(
	'blog'	=> 'BlogController',
	'home'	=> 'HomeController',
	'test'	=> function() {
		_view_load('home');
	},
	'foo'		=> 'BlogController',
	'product'	=> 'ProductController',
	'adduser'	=> 'AddUserController',
	'submituser'=> 'SubmitUserController',
	'members'	=> 'MembersController',
	'login'		=> 'LoginController'
	);

 ?>