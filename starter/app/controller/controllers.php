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

function AddUserController() {
	session_start();
	$form_token = md5( uniqid('auth', true) );
	$_SESSION['form_token'] = $form_token;
	$data['form_token'] = $form_token;
 	_view_load('adduser', $data);
}

function MembersController() {
	echo "Hello Member!";
}

function LoginController() {
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$check_password = sha1(_config_get('site._salt')  . $password);
		if(_checkUserNameAndPassword($username, $check_password)) {
			header('Location: http://localhost/wpa17/starter/public/members');
		}
	}
	_view_load('login');
}

function SubmitUserController() {
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Need to validate data

		if($_SESSION['form_token'] != $_POST['form_token']) {
			header('Location: http://localhost/wpa17/starter/public/adduser');
		}
		_addUser($username, sha1(_config_get('site._salt') . $password));
		header('Location: http://localhost/wpa17/starter/public/members');
	} else {
		header('Location: http://localhost/wpa17/starter/public/adduser');
	}
}

?>