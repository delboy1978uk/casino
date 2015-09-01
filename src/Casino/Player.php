<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 00:54
 */

namespace Del\Casino;

use ArrayObject;
use Del\Casino\PlayingCards\Card;


class Player
{
    private $id;
    private $cards;
    private $chips;

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->cards = new ArrayObject();
        $this->chips = 0;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        $this->cards->append($card);
    }

    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Give it a value like AH for Ace of Hearts, 10D 10 of Diamonds etc
     * @param string $cardval
     * @return Card|bool
     */
    public function removeCard($cardval)
    {
        $count = count($this->cards);
        for($x = 0; $x < $count; $x ++)
        {
            if($this->cards[$x]->getValue().$this->cards[$x]->getSuit() == $cardval)
            {
                $card = $this->cards[$x];
                unset($this->cards[$x]);
                return $card;
            }
        }
        return false;
    }

    /**
     * adds amount to chip total
     * returns balance
     * @param $amount
     * @return int
     */
    public function addChips($amount)
    {
        $this->chips = $this->chips + $amount;
        return $this->chips;
    }

    /**
     * deducts amount from chip total
     * returns balance
     * @param $amount
     * @return int
     */
    public function removeChips($amount)
    {
        $this->chips = $this->chips - $amount;
        return $this->chips;
    }

    /**
     * returns the players chip total
     * @return int
     */
    public function getBalance()
    {
        return $this->chips;
    }

    /**
     * @param $amount
     * @return bool
     */
    protected function fundsCheck($amount)
    {
        return $amount < $this->getBalance();
    }
}