<?php

namespace Del\Casino\Game\Bet\Type\Roulette;

use Del\Casino\Game\Bet\Roulette as Bet;
use Del\Casino\Player;

class OddEvenTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var OddEven
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
        $this->type = new OddEven(OddEven::ODD);
        $bet = new Bet($this->player,$this->type,100,2);
        $this->assertFalse($bet->getType()->processBet(0));
        $this->assertTrue($bet->getType()->processBet(1));
        $this->assertFalse($bet->getType()->processBet(2));
        $this->assertTrue($bet->getType()->processBet(3));
    }



}
