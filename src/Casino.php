<?php
/**
 * User: delboy1978uk
 * Date: 14/08/15
 * Time: 15:56
 */

namespace Del;

use Del\Casino\Player;
use Del\Casino\Game\Roulette;
use Exception;

class Casino
{
    /** @var array $players */
    protected $players;

    public function __construct()
    {
        $this->players = [];
    }

    /**
     * @param $name
     * @param $chips
     * @return Player
     */
    public function createPlayer($name,$chips)
    {
        $player = new Player($name);
        $player->addChips($chips);
        $this->players[] = &$player;
        return $player;
    }

    /**
     * @return bool
     */
    public function checkPlayerCount()
    {
        return count($this->players) > 0;
    }

    /**
     * @return Roulette
     * @throws \Exception
     */
    public function getRouletteTable()
    {
        if(!$this->checkPlayerCount())
        {
            throw new Exception('At least one Player object required. Use $casino->createPlayer($name,$chips) to add one.');
        }
        return new Roulette($this->players);
    }
}