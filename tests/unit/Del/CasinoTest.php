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
    protected $btc;

    protected function _before()
    {
        // create a fresh casino class before each test
        $this->btc = new Casino();
    }

    protected function _after()
    {
        // unset the casino class after each test
        unset($this->calc);
    }

    /**
     * Check tests are working
     */
    public function testBlah()
    {
	    $this->assertEquals('Ready to start building tests',$this->btc->blah());
    }


}
