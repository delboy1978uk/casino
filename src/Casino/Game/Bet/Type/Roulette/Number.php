<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 07:07
 */

namespace Del\Casino\Game\Bet\Type\Roulette;

use Del\Casino\Game\Bet\Type\TypeAbstract;
use Exception;

class Number extends TypeAbstract
{

    /**
     * @var int
     */
    private $number;

    /**
     * @param $number
     * @throws Exception
     */
    public function __construct($number)
    {
        if($number < 0 || $number > 36)
        {
            throw new Exception('An integer required from 0 to 36');
        }
        $this->number = $number;
        $this->odds = 36;
    }

    /**
     * @param $num
     * @return bool
     */
    public function processBet($num)
    {
        return $this->number == $num;
    }
}