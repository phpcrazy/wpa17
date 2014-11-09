<?php 
class Dog {
	public $name;
	private $leg;
	public static $eyes = 2;
	private $value = array();
	public function __construct($name, $leg = 4) {
		echo "Constructor!". "<br />";
		$this->name = $name;
		$this->name = $leg;
	}
	public function getLeg() {
		return $this->leg;
	}
	public function bark() {
		echo "Whoof!" . "<br />";
	}
	public static function bite() {
		echo "Bite!" . "<br />";
	}
	public function __destruct() {
		echo "Destructor!". "<br />";
	}
	public function __call($method, $arguments) {
		var_dump($method);
		var_dump($arguments);
	}
	public function __set($key, $value) {
		$this->value[$key] = $value;
	}

	public function __get($key) {
		if(array_key_exists($key, $this->value)) {
			return $this->value[$key];
		} else {
			user_error('Array key does not found', E_USER_ERROR);
		}
	}
	public static function __callStatic($method, $arguments) {
		var_dump($method);
		var_dump($arguments);
	}
}
Dog::bite();
Dog::dance('Shuffle');
echo Dog::$eyes;
$dog = new Dog('Puppy');
echo $dog->name . "<br />";
$dog->bark();
$dog2 = new Dog('Aung Net', 3);
echo $dog2->getLeg() . "<br />";
echo $dog2->name. "<br />";
$dog->bark();
$dog->dance('shuffle', 3);
$dog->test = 4;
echo $dog->test;
echo $dog->another;
?>