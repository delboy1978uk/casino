<?php

namespace Del\Casino;

use Del\Casino\PlayingCards\Card;

class PlayerTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Player
     */
    protected $player;

    protected function _before()
    {
        // create a fresh casino class before each test
        $this->player = new Player('Del');
    }

    protected function _after()
    {
        // unset the casino class after each test
        unset($this->casino);
    }

    /**
     * Check tests are working
     */
    public function testGetID()
    {
        $this->assertEquals('Del',$this->player->getID());
    }



    /**
     * Check tests are working
     */
    public function testAddAndRemoveChips()
    {
        $this->player->addChips(500);
        $this->assertEquals(500,$this->player->getBalance());
        $this->player->removeChips(100);
        $this->assertEquals(400,$this->player->getBalance());
        $this->player->addChips(1000);
        $this->assertEquals(1400,$this->player->getBalance());
    }



    /**
     * Check tests are working
     */
    public function testAddAndRemoveAndGetCards()
    {
        $card = new Card('H','A');
        $this->player->addCard($card);
        $this->assertEquals(1,count($this->player->getCards()));
        $card = new Card('H','K');
        $this->player->addCard($card);
        $this->assertEquals(2,count($this->player->getCards()));
        $card = new Card('H','Q');
        $this->player->addCard($card);
        $this->assertEquals(3,count($this->player->getCards()));
        $this->player->removeCard('QH');
        $this->assertEquals(2,count($this->player->getCards()));
    }
}
