# php-datetime-calculator
php datetime calculator

![travis](https://api.travis-ci.org/zhusaidong/php-datetime-calculator.svg?branch=master)
![license](https://img.shields.io/github/license/zhusaidong/php-datetime-calculator.svg)

## Installation

```php
composer require zhusaidong/php-datetime-calculator
```

## Usage

### add or sub time

```php
require('./vendor/autoload.php');

use \zhusaidong\DateTimeCalculator\DateTimeCalculator;

$dtc = new DateTimeCalculator;
$dtc->setTimestamp(time());

echo $dtc->sub(DateTimeCalculator::YEAR,1)->add(DateTimeCalculator::MONTH,1)->format();
//output:2017-07-16 17:36:51
```

### time diff

```php
require('./vendor/autoload.php');

use \zhusaidong\DateTimeCalculator\DateTimeCalculator;

$dtc = new DateTimeCalculator;
$dtc->setTimestamp(time());

echo $dtc->add(DateTimeCalculator::YEAR,1)->diff(DateTimeCalculator::now());
//output:365
```

## methods

```php
format();//format date

diff();//diff date

add();//add date

sub();//sub date

next();//next date

last();//last date

ago();//this function is an alias of sub
```