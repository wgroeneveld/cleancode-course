<?php

require_once('labs/lab02_oodesign.php');
use PHPUnit\Framework\TestCase;

// hulp nodig? https://phpunit.de/manual/current/en/appendixes.assertions.html
class Lab0200DesignTest extends TestCase {

	/**
	* @expectedException InvalidArgumentException
	*/
	public function testOntvangDier_teGrootVoorDierentuin_throwsException() {
		$tuin = Dierentuin::NieuweKleineTuin();
		$tuin->ontvangDier(new Neushoorn('joske'));
	}

	public function testOntvangDier_grootGenoegOmTeOntvangen_toegevoegd() {
		$tuin = Dierentuin::NieuweGroteTuin();
		$tuin->ontvangDier(new Neushoorn('joske'));

		$this->assertArrayHasKey('joske', $tuin->bezoek());
	}

	public function testOntvangDier_verkleintDierentuinGrootte() {
		$tuin = Dierentuin::NieuweKleineTuin();
		$origineleGrootte = $tuin->getBeschikbareRuimte();
		$tuin->ontvangDier(new Poema('Pommeke'));

		$this->assertTrue($origineleGrootte > $tuin->getBeschikbareRuimte());
	}

	public function testBezoek_bezoekAlleHokken() {
		$tuin = Dierentuin::NieuweGroteTuin();
		$tuin->ontvangDier(new Giraf('Raffie'));
		$tuin->ontvangDier(new Poema('Pommeke'));

		$hokken = $tuin->bezoek();

		$this->assertArrayHasKey('Raffie', $hokken);
		$this->assertArrayHasKey('Pommeke', $hokken);
	}

	public function testVoeder_genoegVoedsel_voorEenDier() {
		$tuin = Dierentuin::NieuweGroteTuin();
		$tuin->ontvangDier(new Giraf('Raffie'));

		$this->assertTrue($tuin->voeder(new Chocolade()));
	}

	public function testVoeder_nietGenoegVoedsel_voorEenDier() {
		$tuin = Dierentuin::NieuweGroteTuin();
		$tuin->ontvangDier(new Giraf('Raffie'));

		$this->assertFalse($tuin->voeder(new Banaan()));		
	}

	public function testVoeder_nietGenoegVoedsel_voorTweeDieren() {
		$tuin = Dierentuin::NieuweGroteTuin();
		$tuin->ontvangDier(new Giraf('Raffie'));
		$tuin->ontvangDier(new Giraf('Baffie'));

		$this->assertFalse($tuin->voeder(new Tofu()));
	}

	public function testVoeder_genoegVoedsel_voorTweeDieren() {
		$tuin = Dierentuin::NieuweGroteTuin();
		$tuin->ontvangDier(new Giraf('Raffie'));
		$tuin->ontvangDier(new Giraf('Baffie'));

		$this->assertTrue($tuin->voeder(new Chocolade()));
	}

	public function testNeushoornGrootte() {
		$dier = new Neushoorn('Hornie');

		$this->assertEquals(40, $dier->getGrootte());
	}

	public function testPoemaGrootte() {
		$dier = new Poema('Pommeke');

		$this->assertEquals(10, $dier->getGrootte());
	}

	public function testGirafGrootte() {
		$dier = new Giraf('Joske');

		$this->assertEquals(25, $dier->getGrootte());
	}

	public function testGetNaamVanDier() {
		$dier = new Giraf('Joske');

		$this->assertEquals('Joske', $dier->getNaam());
	}

}


?>