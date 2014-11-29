<?php 

interface TestInterface {
	public function test($name);
}

class test implements TestInterface {
	public function test($name) {
		echo "Test " . $name ;
	}
}
 ?>