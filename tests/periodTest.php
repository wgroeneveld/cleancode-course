<?php

require_once('labs/period.php');
use PHPUnit\Framework\TestCase;

class PeriodTest extends TestCase {

	public function setUp() {
		date_default_timezone_set('Europe/Brussels');
	}

	public function testIsInPeriod_ExtactOpDeEindDatum_True() {
		$period = new Period(new DateTime('2016-01-01'), new DateTime('2016-10-10'));
		$datum = new DateTime('2016-10-10');

		$this->assertEquals(TRUE, $period->isInPeriod($datum));		
	}

	public function testIsInPeriod_ExactOpDeBeginDatum_True() {
		$period = new Period(new DateTime('2016-01-01'), new DateTime('2016-10-10'));
		$datum = new DateTime('2016-01-01');

		$this->assertEquals(TRUE, $period->isInPeriod($datum));
	}

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

