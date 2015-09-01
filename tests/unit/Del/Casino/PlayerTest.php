<?php

namespace Del\Casino;

use Del\Casino\PlayingCards\Card;
use ReflectionClass;

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
        $this->player = new Player('Del');
    }

    protected function _after()
    {
        unset($this->player);
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
        $this->assertInstanceOf('Del\Casino\PlayingCards\Card',$this->player->removeCard('QH'));
        $this->assertEquals(2,count($this->player->getCards()));
        //try and remove non existant card
        $this->assertFalse($this->player->removeCard('JH'));
        $this->assertEquals(2,count($this->player->getCards()));

    }


    public function testFundsCheck()
    {
        $this->player->addChips(500);
        $this->assertFalse($this->invokeMethod($this->player,'fundsCheck',[600]));
        $this->assertTrue($this->invokeMethod($this->player,'fundsCheck',[400]));
    }


    /**
     * This method allows us to test protected and private methods without
     * having to go through everything using public methods
     *
     * @param object &$object
     * @param string $methodName
     * @param array  $parameters
     *
     * @return mixed could return anything!.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }
}
