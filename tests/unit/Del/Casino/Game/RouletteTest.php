<?php

namespace Del\Casino;


use Del\Casino\Game\Roulette;

class RouletteTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Roulette
     */
    protected $roulette;

    protected function _before()
    {
        $del = new Player('Del');
        $dave = new Player('Dave');
        $peter = new Player('Peter');
        $del->addChips(1000);
        $dave->addChips(1000);
        $peter->addChips(1000);
        $this->roulette = new Roulette();
        $this->roulette->addPlayer($del);
        $this->roulette->addPlayer($dave);
        $this->roulette->addPlayer($peter);
    }

    protected function _after()
    {
        unset($this->roulette);
    }


    public function testNextPlayersTurn()
    {
        $this->assertInstanceOf('Del\Casino\Game\Turn\Roulette',$this->roulette->nextPlayersTurn());
    }

    public function testRoundOfPlay()
    {
        $this->roulette->nextPlayersTurn()->betRed(100);
        $this->roulette->nextPlayersTurn()->betBlack(100);
        $this->roulette->nextPlayersTurn()->betGreen(100);
        $this->roulette->spinWheel();
        $bal1 = $this->roulette->getNextPlayer()->getBalance();
        $bal2 = $this->roulette->getNextPlayer()->getBalance();
        $bal3 = $this->roulette->getNextPlayer()->getBalance();
        $this->assertNotEquals(1000,$bal1);
        $this->assertNotEquals(1000,$bal2);
        $this->assertNotEquals(1000,$bal3);

        $this->roulette->nextPlayersTurn()->betEven(100);
        $this->roulette->nextPlayersTurn()->betOdd(100);
        $this->roulette->nextPlayersTurn()->betEven(100);
        $this->roulette->spinWheel();
        $bal4 = $this->roulette->getNextPlayer()->getBalance();
        $bal5 = $this->roulette->getNextPlayer()->getBalance();
        $bal6 = $this->roulette->getNextPlayer()->getBalance();
        $this->assertNotEquals($bal4,$bal1);
        $this->assertNotEquals($bal5,$bal2);
        $this->assertNotEquals($bal6,$bal3);

        $this->roulette->nextPlayersTurn()
            ->betSplit(31,34,10)
            ->betSplit(35,32,10)
            ->betSplit(33,36,10)
            ->betSplit(27,30,10)
            ->betSplit(26,29,10)
            ->betSplit(25,28,10)
        ;
        $this->roulette->nextPlayersTurn()
            ->betSplit(3,6,10)
            ->betSplit(2,5,10)
            ->betSplit(1,4,10)
            ->betSplit(9,12,10)
            ->betSplit(8,11,10)
            ->betSplit(7,10,10)
        ;
        $this->roulette->nextPlayersTurn()
            ->betSplit(15,18,10)
            ->betSplit(14,17,10)
            ->betSplit(13,16,10)
            ->betSplit(18,21,10)
            ->betSplit(17,20,10)
            ->betSplit(16,19,10)
        ;
        $this->roulette->spinWheel();
        $bal1 = $this->roulette->getNextPlayer()->getBalance();
        $bal2 = $this->roulette->getNextPlayer()->getBalance();
        $bal3 = $this->roulette->getNextPlayer()->getBalance();
        $this->assertNotEquals($bal4,$bal1);
        $this->assertNotEquals($bal5,$bal2);
        $this->assertNotEquals($bal6,$bal3);

        $this->roulette->nextPlayersTurn()
            ->betNumber(0,10)
            ->betNumber(1,10)
            ->betNumber(2,10)
            ->betNumber(3,10)
            ->betNumber(4,10)
        ;
        $this->roulette->nextPlayersTurn()
            ->betNumber(5,10)
            ->betNumber(6,10)
            ->betNumber(7,10)
            ->betNumber(8,10)
            ->betNumber(9,10)
        ;
        $this->roulette->nextPlayersTurn()
            ->betNumber(10,10)
            ->betNumber(11,10)
            ->betNumber(12,10)
            ->betNumber(13,10)
            ->betNumber(14,10)
        ;
        $this->roulette->spinWheel();
        $bal4 = $this->roulette->getNextPlayer()->getBalance();
        $bal5 = $this->roulette->getNextPlayer()->getBalance();
        $bal6 = $this->roulette->getNextPlayer()->getBalance();
        $this->assertNotEquals($bal4,$bal1);
        $this->assertNotEquals($bal5,$bal2);
        $this->assertNotEquals($bal6,$bal3);
    }


}
