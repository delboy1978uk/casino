<?php

namespace Del\Casino\Game\Bet\Type\Roulette;

use Del\Casino\Game\Bet\Roulette as Bet;
use Del\Casino\Player;

class SplitTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Split
     */
    protected $type;

    /**
     * @var Player
     */
    protected $player;

    protected function _before()
    {
        $del = new Player('Del');
        $del->addChips(500);
        $this->player = $del;
    }

    protected function _after()
    {
        unset($this->type);
        unset($this->player);
    }


    public function testProcessBet()
    {
        $this->type = new Split(31,34);
        $bet = new Bet($this->player,$this->type,100);
        $this->assertFalse($bet->getType()->processBet(0));
        $this->assertTrue($bet->getType()->processBet(31));
        $this->assertFalse($bet->getType()->processBet(20));
        $this->assertTrue($bet->getType()->processBet(34));
    }


    public function testThrowsException()
    {
        $this->setExpectedException('Exception');
        $this->type = new Split(1,34);
    }



}
