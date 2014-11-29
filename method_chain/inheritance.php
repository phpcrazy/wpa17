<?php 
abstract class Foo {
	public function bar() {
		echo "Moo!";
	}
}
class Animal {
	private $name = '';
	public function __construct($name) {
		$this->name = $name;
	}
	public function eat() {
		echo "Eat!";
	}
}
class Cat extends Foo {

}
class Dog extends Animal {
	private $color;
	public function __construct($name, $color) {
		parent::__construct($name);
		$this->color = $color;
	}
	public function bark() {
		echo "Woof!";
	}
}
$dog = new Dog('Aung Net', 'red');
$dog->eat();
$dog->bark();
 ?>