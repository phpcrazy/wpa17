<?php 

class DB extends PDO {
	// Singleton
	private static $_instance = null;

	public function __construct() {
		$dsn = Config::database('engine') . ':dbname=' . Config::database('dbname') 
				. ';host=' . Config::database('hostname');
		$user = Config::database('username');
		$password = Config::database('password');
		parent::__construct($dsn, $user, $password);
	}

	public static function table($table_name) 
	{
		if(!self::$_instance instanceof DB) {
			try {
				self::$_instance = new DB();	
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
			
		}
		return self::$_instance;	
	}

	public function exectest() {
		var_dump($this->getAvailableDrivers());
	}
}
?>