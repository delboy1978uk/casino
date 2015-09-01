<?php

namespace Del\Casino\Game\Bet;

use Del\Casino\Game\Bet\Roulette as Bet;
use Del\Casino\Game\Bet\Type\Roulette\Colour as Colour;
use Del\Casino\Player;

class RouletteTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Bet
     */
    protected $bet;

    protected function _before()
    {
        $del = new Player('Del');
        $del->addChips(500);
        $this->bet = new Bet($del,new Colour(Colour::RED),100,2);
    }

    protected function _after()
    {
        unset($this->roulette);
    }


    public function testGetAmount()
    {
        $this->assertEquals(100,$this->bet->getAmount());
    }


    public function testGetPlayer()
    {
        $this->assertInstanceOf('Del\Casino\Player',$this->bet->getPlayer());
    }


    public function testGetType()
    {
        $this->assertInstanceOf('Del\Casino\Game\Bet\Type\Roulette\Colour',$this->bet->getType());
    }


    public function testGetOdds()
    {
        $this->assertTrue(is_numeric($this->bet->getOdds()));
    }


}
