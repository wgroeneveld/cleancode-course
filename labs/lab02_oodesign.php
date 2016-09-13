<?php

class Dierentuin {

	private $beschikbareRuimte;
	private $hokken;

	public static function NieuweGroteTuin() {
		return new Dierentuin(100);
	}

	public static function NieuweKleineTuin() {
		return new Dierentuin(30);
	}

	public function __construct($grootte) {
		$this->beschikbareRuimte = $grootte;
		$this->hokken = [];
	}

	public function bezoek() {
		return $this->hokken;
	}

	public function getBeschikbareRuimte() {
		return $this->beschikbareRuimte;
	}

	public function voeder($voedsel) {
		$waarde = $voedsel->getVoedingswaarde();
		foreach($this->hokken as $dier) {
			$waarde -= $dier->getGrootte();
		}
		return $waarde > 0;
	}

	public function ontvangDier($dier) {
		if($this->beschikbareRuimte < $dier->getGrootte()) {
			throw new InvalidArgumentException('geen ruimte meer!');
		}

		$this->hokken[$dier->getNaam()] = $dier;
		$this->beschikbareRuimte -= $dier->getGrootte();
	}

}

abstract class Voedsel {
	public abstract function getVoedingswaarde();
}

class Banaan extends Voedsel {
	function getVoedingswaarde() {
		return 10;
	}
}

class Tofu extends Voedsel {
	function getVoedingswaarde() {
		return 40;
	}
}

class Chocolade extends Voedsel {
	function getVoedingswaarde() {
		return 100;
	}
}

abstract class Dier {

	protected $naam;

	protected function __construct($naam) {
		$this->naam = $naam;
	}

	public function getNaam() {
		return $this->naam;
	}

	public abstract function getGrootte();
}

class Giraf extends Dier {
	public function __construct($naam) {
		parent::__construct($naam);
	}

	public function getGrootte() {
		return 25;
	}	
}

class Poema extends Dier {
	public function __construct($naam) {
		parent::__construct($naam);
	}

	public function getGrootte() {
		return 10;
	}
}

class Neushoorn extends Dier {
	public function __construct($naam) {
		parent::__construct($naam);
	}

	public function getGrootte() {
		return 40;
	}
}

?>
