# casino
[![Build Status](https://travis-ci.org/delboy1978uk/casino.png?branch=master)](https://travis-ci.org/delboy1978uk/casino) [![Code Coverage](https://scrutinizer-ci.com/g/delboy1978uk/casino/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/casino/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/delboy1978uk/casino/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/delboy1978uk/casino/?branch=master) <br />
Classes for simulating Casino games in PHP
##Installation
Install using composer:
```
composer require delboy1978uk/casino
```
##Usage
```
use Del\Casino();

$casino = new Casino();
$casino->createPlayer('Del',1000); // name, chips

$roulette = $casino->nextPlayersTurn()
                   ->betRed(100)
                   ->betSplit(31,34);


```
