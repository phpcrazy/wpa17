<?php 
define('DD', __DIR__ . '/..');

require DD . '/wpa17/functions.php';

$moo = _config_get('site.foo.bar');
var_dump($moo);
die();

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 'home';
}

switch ($page) {
	case 'home':

		$data = array(
			'title'	=> _config_get('site.title')
			);
		_view_load('home', $data);
		break;
	case 'blog':
		$data = array(
		'title'		=> 'Myanmar Links',
		'another'	=> "Myanmar Tutorials",
		);
		_view_load('blog', $data);
		break;
	case 'page':
		_view_load('page');
		break;
	default:
		_view_load('home');
		break;
}

 ?>