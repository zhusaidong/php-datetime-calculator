<?php
/**
* @author zhusaidong [zhusaidong@gmail.com]
*/
use \zhusaidong\DateTimeCalculator\DateTimeCalculator;

class DateTimeCalculatorTests extends PHPUnit_Framework_TestCase
{
	public function testNow()
	{
		$this->assertEquals(DateTimeCalculator::now()->getTimestamp(),time());
	}
	public function testCreate()
	{
		$this->assertEquals(DateTimeCalculator::create(2018,6,15,16,56,21)->getTimestamp(),strtotime('2018-6-15 16:56:21'));
	}
	public function testSub()
	{
		$dtc = new DateTimeCalculator;
		$dtc->setTimestamp(strtotime('2018-06-15 16:56:21'));

		$this->assertEquals($dtc->sub(DateTimeCalculator::YEAR,1)->format(),'2017-06-15 16:56:21');
	}
	public function testAdd()
	{
		$dtc = new DateTimeCalculator;
		$dtc->setTimestamp(strtotime('2018-06-15 16:56:21'));

		$this->assertEquals($dtc->add(DateTimeCalculator::YEAR,1)->format(),'2019-06-15 16:56:21');
	}
	public function testDiff()
	{
		$dtc = new DateTimeCalculator;
		$dtc->setTimestamp(time());
		
		$this->assertEquals($dtc->add(DateTimeCalculator::YEAR,1)->diff(DateTimeCalculator::now()),365);
		
		$dtc = new DateTimeCalculator;
		$dtc->setTimestamp(time());
		$this->assertEquals($dtc->sub(DateTimeCalculator::YEAR,1)->diff(DateTimeCalculator::now()),-365);
	}
}
