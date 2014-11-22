<?php
class TestClass
{
	public static $currentValue;
	// static property - to hold a dynamic method
	private static $_instance = null;
	public static function getInstance()
	{
		if(!(self::$_instance instanceof TestClass)) {
			echo "Hi there!" . '<br />';
			self::$_instance = new TestClass();
		}
		return self::$_instance;
	}
	private function __construct() {
		echo "construct!";
	}
	public function toValue($value) {
		self::$currentValue = $value;
		return $this;
	}
	public function add($value) {
		self::$currentValue = self::$currentValue + $value;
		return $this;
	}
	public function subtract($value) {
		self::$currentValue = self::$currentValue - $value;
		return $this;
	}
	public function result() {
		return self::$currentValue;
	}
	public function __destruct() {
		var_dump('Destructed!');
	}
}
// Example Usage:
$result = TestClass::getInstance()
->toValue(5)
->add(3)
->subtract(2)
->add(8)
->result();
var_dump($result);
$result2 = TestClass::getInstance()
->toValue(50)
->add(3)
->subtract(3)
->add(50)
->result();
var_dump($result2);
?>