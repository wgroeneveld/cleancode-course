<?php

require_once('labs/lab01_methods.php');

class Lab01Test extends PHPUnit_Framework_TestCase {

	private $methods;

	public function setUp() {
		$this->methods = new Methods();
	}

	public function tearDown() {
		$this->methods = null;
	}

	public function testBlabla() {
		$this->assertEquals(1, $this->methods->blabla());
	}

}

?>