<?php

namespace Del\Casino\PlayingCards;


class DeckTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    /**
     * @var Deck
     */
    protected $deck;

    protected function _before()
    {
        $this->deck = new Deck('S','A');
    }

    protected function _after()
    {
        unset($this->deck);
    }

    public function testGetCards()
    {
        $this->assertTrue(is_array($this->deck->getCards()));
        $this->assertTrue(count($this->deck->getCards()) == 52);
    }
}
