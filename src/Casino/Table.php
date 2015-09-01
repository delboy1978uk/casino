<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 01:29
 */

namespace Del\Casino;

use Del\Casino\Player;
use Del\Casino\Banker;
use ArrayObject;


class Table
{

    /** @var \ArrayObject */
    protected $players;

    /** @var \Del\Casino\Banker */
    protected $banker;

    /** @var int */
    protected $pot;

    /**
     * @param array $players
     */
    public function __construct(array $players)
    {
        $this->players = new ArrayObject();
        foreach($players as $player)
        {
            $this->addPlayer($player);
        }
        $this->banker = new Banker();
        $this->pot = 0;
    }

    /**
     * Adds new Player
     * @param Player $player
     */
    public function addPlayer(Player $player)
    {
        $this->players->append($player);
    }

    /**
     * Deletes player
     * @param $id
     */
    public function removePlayer($id)
    {
        $x = 0;
        $i = $this->players->getIterator();
        while($i->valid())
        {
            if($i->current()->getID() == $id)
            {
                $i->offsetUnset($x);
            }
            $i->next();
            $x++;
        }
        $i->rewind();
    }

    /**
     * @return \ArrayObject
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @return Banker
     */
    public function getBanker()
    {
        return $this->banker;
    }

    public function getNumPlayers()
    {
        return $this->players->count();
    }

    /**
     * @param $amount
     * @return int
     */
    public function addToPot($amount)
    {
        $this->pot = $this->pot + $amount;
        return $this->pot;
    }

    /**
     * @param $amount
     * @return int
     */
    public function removeFromPot($amount)
    {
        $this->pot = $this->pot - $amount;
        return $this->pot;
    }

    /**
     * @return int
     */
    public function getPotBalance()
    {
        return $this->pot;
    }
}