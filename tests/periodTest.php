<?php

require_once('labs/period.php');

class PeriodTest extends PHPUnit_Framework_TestCase {

	public function testIsInPeriod_NaEindDatum_False() {
		$period = new Period(new DateTime('2016-01-01'), new DateTime('2016-10-10'));

		$this->assertEquals(FALSE, $period->isInPeriod(new DateTime('2016-12-01')));
	}

	public function testIsInPeriod_ValtErtussen_True() {
		$period = new Period(new DateTime('2016-01-01'), new DateTime('2016-10-10'));

		$this->assertEquals(TRUE, $period->isInPeriod(new DateTime('2016-03-01')));
	}

	public function testIsInPeriod_VoorBeginDatum_False() {
		$period = new Period(new DateTime('2016-01-01'), new DateTime('2016-10-10'));

		$this->assertEquals(FALSE, $period->isInPeriod(new DateTime('2015-12-01')));
	}


}

