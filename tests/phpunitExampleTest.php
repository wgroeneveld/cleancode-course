<?php


class Amazing {
	public function wow($getal) {
		return $getal + 1;
	}
}


use PHPUnit\Framework\TestCase;
// hulp nodig? https://phpunit.de/manual/current/en/appendixes.assertions.html
class AmazingTest extends TestCase {

	public function testWow_returnsGetalPlus1() {
		$amazing = new Amazing();
		$getal = $amazing->wow(456);

		$this->assertEquals(457, $getal);
	}

}

?>