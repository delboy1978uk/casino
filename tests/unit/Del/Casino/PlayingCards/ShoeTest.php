<?php

namespace Del\Casino\PlayingCards;


class ShoeTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Shoe
     */
    protected $shoe;

    protected function _before()
    {
        // a two deck shoe
        $this->shoe = new Shoe(2);
    }

    protected function _after()
    {
        unset($this->shoe);
    }

    public function testDealCard()
    {
        $this->assertInstanceOf('Del\Casino\PlayingCards\Card',$this->shoe->dealCard());
    }

    public function testShuffleDeck()
    {
        $this->assertNull($this->shoe->shuffleDeck());
    }

    public function testDealing105CardsThrowsException()
    {
        $this->setExpectedException('Exception');
        for($x = 0; $x < 105; $x++)
        {
            $this->shoe->dealCard();
        }
    }

    public function testGetCardsRemaining()
    {
        $this->assertEquals(104,$this->shoe->getCardsRemaining());
        $this->shoe->dealCard();
        $this->assertEquals(103,$this->shoe->getCardsRemaining());
        $this->shoe->dealCard();
        $this->assertEquals(102,$this->shoe->getCardsRemaining());
    }

    public function testDiscardCard()
    {
        $card = $this->shoe->dealCard();
        $this->assertNull($this->shoe->discardCard($card));
    }

    public function testResetShoe()
    {
        $this->assertNull($this->shoe->resetShoe());
    }
}
