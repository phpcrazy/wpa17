<?php 

class HomeController {
	public function actionIndex() {
		// $dsn = 'mysql:dbname=' . Config::database('dbname') 
		// . ';host=' . Config::database('hostname');
		// $user = Config::database('username');
		// $password = Config::database('password');
		// try {
		// 	$dbh = new PDO($dsn, 'thiha', $password);
		// } catch (PDOException $e) {
		// 	echo 'Connection failed: ' . $e->getMessage();
		// }

		$users = DB::table('users')->exectest();	
		dump($users);
		// $students = DB::table('students');
		// dump($students,true);
		// View::load('home');
	}
}

?>