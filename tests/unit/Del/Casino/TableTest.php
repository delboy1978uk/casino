<?php

namespace Del\Casino;


class TableTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Table
     */
    protected $table;

    protected function _before()
    {
        $players = [new Player('Del')];
        $this->table = new Table($players);
    }

    protected function _after()
    {
        unset($this->table);
    }

    public function testGetPlayers()
    {
        $this->assertInstanceOf('ArrayObject',$this->table->getPlayers());
    }

    public function testGetNumPlayers()
    {
        $this->assertEquals(1,$this->table->getNumPlayers());
    }

    public function testGetBanker()
    {
        $this->assertInstanceOf('Del\Casino\Banker',$this->table->getBanker());
    }

    public function testGetHistory()
    {
        $this->assertTrue(is_array($this->table->getHistory()));
    }

    public function testGetNextPlayer()
    {
        $this->table->addPlayer(new Player('Drunk Troublemaker'));
        $this->assertInstanceOf('Del\Casino\Player',$this->table->getNextPlayer());
        $this->assertInstanceOf('Del\Casino\Player',$this->table->getNextPlayer());
        $this->assertNull($this->table->getNextPlayer());
        $this->assertInstanceOf('Del\Casino\Player',$this->table->getNextPlayer());
        $this->assertInstanceOf('Del\Casino\Player',$this->table->getNextPlayer());
        $this->assertNull($this->table->getNextPlayer());
    }

    public function testRemovePlayer()
    {
        $this->table->addPlayer(new Player('Drunk Troublemaker'));
        $this->assertEquals(2,$this->table->getNumPlayers());
        $this->table->removePlayer('Drunk Troublemaker');
        $this->assertEquals(1,$this->table->getNumPlayers());
    }

    public function testGetAddAndRemoveFromPot()
    {
        $this->assertEquals(0,$this->table->getPotBalance());
        $this->table->addToPot(1000);
        $this->assertEquals(1000,$this->table->getPotBalance());
        $this->table->removeFromPot(200);
        $this->assertEquals(800,$this->table->getPotBalance());
    }


}
