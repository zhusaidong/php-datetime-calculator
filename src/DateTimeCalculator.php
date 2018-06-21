<?php
/**
* DateTimeCalculator
* 
* @author zhusaidong [zhusaidong@gmail.com]
*/
namespace zhusaidong\DateTimeCalculator;

class DateTimeCalculator
{
	const YEAR 		= 'year';
	const MONTH 	= 'month';
	const DAY 		= 'day';
	const HOUR 		= 'hour';
	const MINUTE 	= 'minute';
	const SECOND 	= 'second';
	const WEEK 		= 'week';
	
	/**
	* @var timestamp
	*/
	private $timestamp = 0;
	
	/**
	* __construct
	* 
	* @param string $timeZone
	*/
	public function __construct($timeZone = 'PRC')
	{
		date_default_timezone_set($timeZone);
	}
	/**
	* set timestamp
	* 
	* @param int $timestamp timestamp
	* 
	* @return DateTimeCalculator
	*/
	public function setTimestamp($timestamp)
	{
		$this->timestamp = $timestamp;
		return $this;
	}
	/**
	* get timestamp
	* 
	* @return int timestamp
	*/
	public function getTimestamp()
	{
		return $this->timestamp;
	}
	
	/**
	* format
	* 
	* @param string $format format
	* 
	* @return string format time
	*/
	public function format($format = 'Y-m-d H:i:s')
	{
		return date($format,$this->timestamp);
	}
	/**
	* diff
	* 
	* @param DateTimeCalculator $dtc
	* 
	* @return int diff days
	*/
	public function diff(DateTimeCalculator $dtc)
	{
		$dt1 = (new \DateTime())->setTimestamp($this->getTimestamp());
		$dt2 = (new \DateTime())->setTimestamp($dtc->getTimestamp());
		$date = $dt1->diff($dt2);
		return ($date->invert ? 1 : -1) * $date->days;
	}
	
	/**
	* add date
	* 
	* @param string $dateType
	* @param int $number
	* 
	* @return DateTimeCalculator
	*/
	public function add($dateType,$number)
	{
		$this->timestamp = strtotime('+'.$number.' '.$dateType,$this->timestamp);
		return $this;
	}
	/**
	* sub date
	* 
	* @param string $dateType
	* @param int $number
	* 
	* @return DateTimeCalculator
	*/
	public function sub($dateType,$number)
	{
		$this->timestamp = strtotime('-'.$number.' '.$dateType,$this->timestamp);
		return $this;
	}
	/**
	* next date
	* 
	* @param string $dateType
	* 
	* @return DateTimeCalculator
	*/
	public function next($dateType)
	{
		return $this->add($dateType,1);
	}
	/**
	* last date
	* 
	* @param string $dateType
	* 
	* @return DateTimeCalculator
	*/
	public function last($dateType)
	{
		return $this->sub($dateType,1);
	}
	/**
	* ago date, this function is an alias of sub
	* 
	* @param string $dateType
	* @param int $number
	* 
	* @return DateTimeCalculator
	*/
	public function ago($dateType,$number)
	{
		return $this->sub($dateType,$number);
	}
	/**
	* modify
	* 
	* @param string $modify
	* 
	* @return DateTimeCalculator
	*/
	public function modify($modify)
	{
		$this->timestamp = strtotime($modify,$this->timestamp);
		return $this;
	}
	/**
	* __toString
	*/
	public function __toString()
	{
		return $this->format();
	}
	
	/**
	* create
	* 
	* @param int $year
	* @param int $month
	* @param int $day
	* @param int $hour
	* @param int $minute
	* @param int $second
	* 
	* @return DateTimeCalculator
	*/
	public static function create($year,$month,$day,$hour,$minute,$second)
	{
		return (new self)->setTimestamp(mktime($hour,$minute,$second,$month,$day,$year));
	}
	/**
	* now
	* 
	* @return DateTimeCalculator
	*/
	public static function now()
	{
		return (new self)->setTimestamp(time());
	}
}
