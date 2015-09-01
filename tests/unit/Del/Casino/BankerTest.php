<?php

namespace Del\Casino;


class BankerTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Banker
     */
    protected $banker;

    protected function _before()
    {
        $this->banker = new Banker();
    }

    protected function _after()
    {
        unset($this->banker);
    }

    /**
     * Check tests are working
     */
    public function testGetID()
    {
        $this->assertEquals(0,$this->banker->getID());
    }


}
