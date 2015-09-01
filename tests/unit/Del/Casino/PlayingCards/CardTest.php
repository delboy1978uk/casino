<?php

namespace Del\Casino\PlayingCards;


class CardTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Card
     */
    protected $card;

    protected function _before()
    {
        $this->card = new Card('S','A');
    }

    protected function _after()
    {
        unset($this->card);
    }

    public function testGetAsText()
    {
        $this->assertEquals('Ace of Spades',$this->card->getAsText());
    }

    public function testGetSuitAsText()
    {
        $this->assertEquals('Spades',$this->card->getSuitAsText());
    }

    public function testGetValueAsText()
    {
        $this->assertEquals('Ace',$this->card->getValueAsText());
    }

    public function testGetSuit()
    {
        $this->assertEquals('S',$this->card->getSuit());
    }

    public function testGetValue()
    {
        $this->assertEquals('A',$this->card->getValue());
    }

    public function testFlippingCardFaceDownAndUpright()
    {
        $this->assertFalse($this->card->isFaceDown());
        $this->card->flipFaceDown();
        $this->assertTrue($this->card->isFaceDown());
        $this->card->flipFaceUp();
        $this->assertFalse($this->card->isFaceDown());
        $this->card->flipCard();
        $this->assertTrue($this->card->isFaceDown());
        $this->card->flipCard();
        $this->assertFalse($this->card->isFaceDown());
    }

    public function testGetHtml()
    {
        $this->assertTrue(is_string($this->card->getHtml()));
    }

    public function testGetJson()
    {
        $this->assertTrue(is_string($this->card->getJson()));
    }
}
