<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 03:53
 */

namespace Del\Casino\Game\Bet;

use Del\Casino\Player;
use Del\Casino\Game\Bet\Type\TypeAbstract as BetType;

abstract class BetAbstract
{

    /** @var Player */
    private $player;

    /** @var int  */
    private $amount;

    /** @var BetType */
    private $type;

    /** @var int $odds */
    private $odds;

    public function __construct(Player &$player, BetType $type, $amount)
    {
        $this->setPlayer($player);
        $this->setType($type);
        $this->setAmount($amount);
        $this->getPlayer()->removeChips($amount);
    }


    /**
     * @param $amount
     * @return $this
     */
    protected  function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param $odds
     * @return $this
     */
    protected  function setOdds($odds)
    {
        $this->odds = $odds;
        return $this;
    }

    /**
     * @return int
     */
    public function getOdds()
    {
        return $this->odds;
    }

    /**
     * @param BetType $type
     * @return $this
     */
    protected function setType(BetType $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return BetType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Player $player
     * @return $this
     */
    protected function setPlayer(Player &$player)
    {
        $this->player = $player;
        return $this;
    }

    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}