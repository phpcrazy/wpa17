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

		 $users = DB::table('users')
		 	->select(array('username', 'password'))
		 	->get();	
		 dump($users);

		 $users = DB::table('users')->get();
		 dump($users);

		 $users = DB::table('users')
		 	->select(array('username'))
		 	->get();
		 dump($users);

		 // $users = DB::table('users')
		 // 	->where('username', 'thiha')
		 // 	->get();
		 // dump($users);

		//  $users = DB::table('users')
		//  	->select(array('username'))
		//  	->where('username', '=', 'thiha')
		//  	->get();
		// dump($users);
		// $students = DB::table('students');
		// dump($students,true);
		// View::load('home');
	}
}

?>