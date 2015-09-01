<?php

namespace Del\Casino\Game\Turn;

use Del\Casino\Game\Roulette as Game;
use Del\Casino\Player;

class RouletteTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Roulette
     */
    protected $turn;

    protected function _before()
    {
        $del = new Player('Del');
        $del->addChips(500);
        $game = new Game();
        $game->addPlayer($del);
        $this->turn = new Roulette($del,$game);
    }

    protected function _after()
    {
        unset($this->roulette);
    }

    public function testBetRed()
    {
        $this->assertInstanceOf('Del\Casino\Game\Turn\Roulette',$this->turn->betRed(100));
    }

    public function testBetBlack()
    {
        $this->assertInstanceOf('Del\Casino\Game\Turn\Roulette',$this->turn->betBlack(100));
    }

    public function testBetGreen()
    {
        $this->assertInstanceOf('Del\Casino\Game\Turn\Roulette',$this->turn->betGreen(100));
    }

}
