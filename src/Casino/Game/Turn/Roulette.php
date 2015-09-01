<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 05:47
 */

namespace Del\Casino\Game\Turn;

use Del\Casino\Game\Bet\Type\Roulette\Number;
use Del\Casino\Player;
use Del\Casino\Game\Roulette as Game;
use Del\Casino\Game\Bet\Roulette as Bet;
use Del\Casino\Game\Bet\Type\Roulette\Colour;
use Del\Casino\Game\Bet\Type\Roulette\OddEven;
use Del\Casino\Game\Bet\Type\Roulette\Split;

class Roulette
{
    /** @var Player $player */
    private $player;

    /** @var Game */
    private $game;

    /**
     * @param Player $player
     * @param Game $roulette
     */
    public function __construct(Player &$player, Game &$roulette)
    {
        $this->player = $player;
        $this->game = $roulette;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function betRed($amount)
    {
        $bet = new Bet($this->player,new Colour(Colour::RED),$amount);
        $this->game->addBet($bet);
        return $this;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function betBlack($amount)
    {
        $bet = new Bet($this->player,new Colour(Colour::BLACK),$amount);
        $this->game->addBet($bet);
        return $this;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function betGreen($amount)
    {
        $bet = new Bet($this->player,new Colour(Colour::GREEN),$amount);
        $this->game->addBet($bet);
        return $this;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function betOdd($amount)
    {
        $bet = new Bet($this->player,new OddEven(OddEven::ODD),$amount);
        $this->game->addBet($bet);
        return $this;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function betEven($amount)
    {
        $bet = new Bet($this->player,new OddEven(OddEven::EVEN),$amount);
        $this->game->addBet($bet);
        return $this;
    }

    /**
     * @param $num1
     * @param $num2
     * @param $amount
     * @return $this
     */
    public function betSplit($num1,$num2,$amount)
    {
        $bet = new Bet($this->player,new Split($num1,$num2),$amount);
        $this->game->addBet($bet);
        return $this;
    }

    /**
     * @param $num1
     * @param $num2
     * @param $amount
     * @return $this
     */
    public function betNumber($num,$amount)
    {
        $bet = new Bet($this->player,new Number($num),$amount);
        $this->game->addBet($bet);
        return $this;
    }
}