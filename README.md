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

$roulette = $casino->getRouletteTable();
$roulette->nextPlayersTurn()
         ->betRed(100)
         ->betSplit(31,34);
$results = $roulette->spinWheel();

```
##The Shoe
```
__construct($decks);<br />
dealCard();<br />
discardCard(Card $card)<br />
shuffleDeck();<br />
getCardsRemaining();<br />
resetShoe();<br />
```
##The Card
```
getSuit(); // eg. C, S, D, or H <br />
getValue(); // eg. A, K, Q, J, 10, 9, etc<br />
getAsText(); // eg. Ace of Spades<br />
getSuitAsText();<br />
getValueAsText();<br />
flipCard(); // toggles crd face up or face down
flipFaceDown();<br />
flipFaceUp();<br />
isFaceDown();<br />
getHtml($id = null)<br />
getJson();<br />
```
##The Player
```
__construct($id);<br />
getID();<br />
addCard(Card $card);<br />
removeCard($cardval); // The card as a shorthand string ie 10D<br />
addChips($amount);<br />
removeChips($amount);<br />
getBalance();<br />
```
##The Table
```
__construct(Shoe $shoe, array $players);<br />
addPlayer(Player $player);<br />
removePlayer($id);<br />
getPlayers(); //returns an array object with iterator<br />
getNumPlayers();<br />
getBanker();<br />
setShoe(Shoe $shoe);<br />
addToPot($amount);<br />
removeFromPot($amount);<br />
getPotBalance();<br />
getHistory();<br />
```