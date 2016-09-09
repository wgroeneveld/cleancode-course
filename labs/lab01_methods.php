<?php

class Empire {

	private $a;

	public function __construct() {
		$this->a = [];
	}

	public function getA() {
		return $this->a;
	}

	public function report($i, $result) {
		if($result == -1 && sizeof($this->a) > 0) {
			$this->a = array_slice($this->a, 0, sizeof($this->a) - 1);
		}
	}

	public function generate() {
		$x = new Sith();
		$this->a[] = $x;
		return $x;
	}

	public function generate01() {
		return new Jedi();
	}


}

class Sith {

	public function execute($i) {
		if($i == null) return 0;
		$result = $i->execute(null);
		if($result == -1) {
			echo "mwahahah";
			return 1;
		}

		return -1;
	}
}

class Jedi {

	public function execute($i) {
		echo "bzzz! urgh! *dies*";

		return -1;
	}
}



?>
