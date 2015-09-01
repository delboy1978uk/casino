<?php

namespace Del\Casino;

use Del\Casino\PlayingCards\Shoe;

class CardTableTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var CardTable
     */
    protected $table;

    protected function _before()
    {
        $players = [new Player('Del')];
        $shoe = new Shoe(1);
        $this->table = new CardTable($shoe,$players);
    }

    protected function _after()
    {
        unset($this->table);
    }

    public function testGetShoe()
    {
        $this->assertInstanceOf('Del\Casino\PlayingCards\Shoe',$this->table->getShoe());
    }


}
