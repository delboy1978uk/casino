<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 07:07
 */

namespace Del\Casino\Game\Bet\Type\Roulette;

use Del\Casino\Game\Bet\Type\TypeAbstract;


class OddEven extends TypeAbstract
{
    const ODD = 'odd';
    const EVEN = 'even';

    private $odd_or_even;

    /**
     * @param string $odd_or_even odd or even
     */
    public function __construct($odd_or_even)
    {
        $this->odd_or_even = $odd_or_even;
        $this->odds = 2;
    }

    /**
     * @param $num
     * @return bool
     */
    public function processBet($num)
    {
        if($num == 0){
            return false;
        }
        $result = ($num % 2 == 0) ? $this::EVEN : $this::ODD;
        return ($result == $this->odd_or_even);
    }
}