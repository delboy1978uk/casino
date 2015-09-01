<?php
/**
 * User: delboy1978uk
 * Date: 14/08/15
 * Time: 15:56
 */

namespace Del;

use Del\Casino\Player;
use Del\Casino\Game\Roulette;

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
        $this->players[] = $player;
        return $player;
    }

    /**
     * @return Roulette
     */
    public function getRouletteTable()
    {
        return new Roulette();
    }
}