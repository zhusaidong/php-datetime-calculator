# php-datetime-calculator
php datetime calculator

![travis](https://api.travis-ci.org/zhusaidong/php-datetime-calculator.svg?branch=master)
![license](https://img.shields.io/github/license/zhusaidong/php-datetime-calculator.svg)

- Installation

```
composer require zhusaidong/php-datetime-calculator
```

- Usage

	### add or sub time
	
	```
	use \zhusaidong\DateTimeCalculator\DateTimeCalculator;
	
	$dtc = new DateTimeCalculator;
	$dtc->setTimestamp(time());

	echo $dtc->sub(DateTimeCalculator::YEAR,1)->format();//2017-06-16 17:36:51
	```

	### time diff
	
	```
	use \zhusaidong\DateTimeCalculator\DateTimeCalculator;
	
	$dtc = new DateTimeCalculator;
	$dtc->setTimestamp(time());
	
	echo $dtc->add(DateTimeCalculator::YEAR,1)->diff(DateTimeCalculator::now());//365
	```
