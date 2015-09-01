<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 03:52
 */

namespace Del\Casino\Game\Bet;

use Del\Casino\Player;
use Del\Casino\Game\Bet\Type\TypeAbstract as BetType;

class Roulette extends BetAbstract
{
    /**
     * odds:
     * 'street':12
     * 'corner':9
     * 'threeline':12
     * 'doublestreet':6
     * 'dozen','column':3
     * 'half':2
     *
     * @param Player $player
     * @param BetType $type
     * @param $amount
     */
    public function __construct(Player &$player, BetType $type, $amount)
    {
        parent::__construct($player, $type, $amount);
        $this->setOdds($type->getOdds());
    }
}