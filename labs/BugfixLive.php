
<?php

class Period {

	private $beginDate;
	private $endDate;

	public function __construct($begin, $end) {
		$this->beginDate = $begin;
		$this->endDate = $end;
	}

	public function getBegin() {
		return $this->beginDate;
	}

	public function getEnd() {
		return $this->endDate;
	}

	public function IsInPeriod($date) {
		return $this->beginDate < $date && $this->endDate > $date;
	}
}

?>