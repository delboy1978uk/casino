<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 03:52
 */

namespace Del\Casino\Game\Bet;

use Del\Casino\Player;
use Del\Casino\Game\Bet\Type\TypeAbstract as BetType;
use Exception;

class Roulette extends BetAbstract
{
    public function __construct(Player &$player, BetType $type, $amount)
    {
        parent::__construct($player, $type, $amount);
        $this->setOdds($type->getOdds());
    }


//            case 'number':
//                $odds = 36;
//                break;

//                break;
//            case 'street':
//                $odds = 12;
//                break;
//            case 'corner':
//                $odds = 9;
//                break;
//            case 'threeline':
//                $odds = 12;
//                break;
//            case 'doublestreet':
//                $odds = 6;
//                break;
//            case 'dozen':
//            case 'column':
//                $odds = 3;
//                break;
//            case 'half':
//            case 'even':
//            case 'odd':
//                $odds = 2;
//                break;
//            default:
//                $odds = 2;
//                break;

}