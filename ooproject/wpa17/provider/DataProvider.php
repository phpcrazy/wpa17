<?php 

class DB extends PDO {
	// Singleton
	private static $_instance = null;
	private $table_name = null;
	private $select_columns = null;

	public function __construct() {
		$dsn = Config::database('engine') . ':dbname=' . Config::database('dbname') 
				. ';host=' . Config::database('hostname');
		$user = Config::database('username');
		$password = Config::database('password');
		parent::__construct($dsn, $user, $password, Config::database('connection'));
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
		self::$_instance->table_name = $table_name;
		return self::$_instance;	
	}

	public function __destruct() 
	{
		unset($this);
	}

	public function select(array $var) {
		$this->select_columns = $var;
		return $this;
	}

	public function get() {
		if($this->select_columns == null) {
			$sql = 'SELECT * FROM ' . $this->table_name;
		} else {
			$selected = implode(', ', $this->select_columns);
			$sql = 'SELECT ' . $selected . ' FROM ' . $this->table_name;
			$this->select_columns = null;	
		}
		$stmt = $this->prepare($sql);
		$stmt->execute(array());
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function insert(array $data) {	
		$data_key = array_keys($data);
		$implode_key = implode(', ', $data_key);
		$implode_data = implode(', :', $data_key);
		$sql = "INSERT INTO " . $this->table_name 
			. "(" . $implode_key . ") VALUES" 
			. "( :" . $implode_data . ")";
			
		$stmt = $this->prepare($sql);
		$stmt->execute($data);
		return $this->lastInsertId();
	}
}
?>