<?php

require_once('labs/lab01_methods.php');

use PHPUnit\Framework\TestCase;
class Lab01Test extends TestCase {

	private $theEmpire;

	protected function setUp() : void {
		$this->theEmpire = new Empire();
	}

	public function tearDown() : void {
		$this->theEmpire = null;
	}

	public function testReportWithZeroArmySizeDoesNothing() {
		$this->theEmpire->report(null, -1);
		$this->assertEquals(0, sizeof($this->theEmpire->getA()));
	}

	public function testReportReducesArmySizeIfBattleIsLost() {
		$sith1 = $this->theEmpire->generate();
		$sith2 = $this->theEmpire->generate();

		$this->theEmpire->report($sith1, -1);
		$this->assertEquals(1, sizeof($this->theEmpire->getA()));
	}

	public function testGetAReturnsArmyStrenghtOfTheEmpire() {
		$this->assertEquals(0, sizeof($this->theEmpire->getA()));

		$this->theEmpire->generate();
		$this->theEmpire->generate();
		$this->theEmpire->generate();

		$this->assertEquals(3, sizeof($this->theEmpire->getA()));
	}

	public function testGenerateMakesANewSith() {
		$sith = $this->theEmpire->generate();

		$this->assertInstanceOf('Sith', $sith);
	}

	public function testExecuteSithAgainstSithKillEachOther() {
		$sith1 = $this->theEmpire->generate();
		$sith2 = $this->theEmpire->generate();

		$result = $sith1->execute($sith2);
		$this->assertEquals(-1, $result);
	}

}

?>