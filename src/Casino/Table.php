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
use ArrayIterator;


class Table
{

    /** @var \ArrayObject */
    protected $players;

    /** @var ArrayIterator */
    protected $iterator;

    /** @var \Del\Casino\Banker */
    protected $banker;

    /** @var int */
    protected $pot;

    /** @var array */
    protected $history = [];

    /**
     * @param array $players
     */
    public function __construct(array &$players = null)
    {
        $this->players = new ArrayObject();
        if($players)
        {
            foreach($players as $player)
            {
                $this->addPlayer($player);
            }
        }
        $this->banker = new Banker();
        $this->pot = 0;
    }

    /**
     * @return Player|null
     */
    public function getNextPlayer()
    {
        if($this->iterator->valid()){
            $player = $this->iterator->current();
            $this->iterator->next();
            return $player;
        }
        else
        {
            $this->iterator->rewind();
            return null;
        }
    }

    /**
     * Adds new Player
     * @param Player $player
     */
    public function addPlayer(Player &$player)
    {
        $this->players->append($player);
        $this->iterator = $this->players->getIterator();
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
        $this->iterator = $i;
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
        $this->pot = $this->pot - (int) $amount;
        return $this->pot;
    }

    /**
     * @return int
     */
    public function getPotBalance()
    {
        return $this->pot;
    }

    /**
     * @return array
     */
    public function getHistory()
    {
        return $this->history;
    }


}