<?php

namespace Del;

class CasinoTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Casino
     */
    protected $casino;

    protected function _before()
    {
        // create a fresh casino class before each test
        $this->casino = new Casino();
    }

    protected function _after()
    {
        // unset the casino class after each test
        unset($this->casino);
    }

    /**
     * Check tests are working
     */
    public function testCreatePlayer()
    {
        $this->assertInstanceOf('Del\Casino\Player',$this->casino->createPlayer('Del',5000));
    }

    /**
     * Check tests are working
     */
    public function testGetRouletteTable()
    {
	    $this->assertInstanceOf('Del\Casino\Game\Roulette',$this->casino->getRouletteTable());
    }


}
