<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 10:08
 */

namespace Del\Casino\Strategy;


class Fibonacci implements StrategyInterface
{
    /** @var array */
    protected $sequence = [0,1];

    /**
     * @param $levels
     * @return array
     */
    protected function sequence($levels)
    {
        for($x = 2; $x <= $levels; $x ++)
        {
            $this->sequence[$x] = $this->sequence[$x-1] + $this->sequence[$x-2];
        }
        return $this->sequence;
    }

    /**
     * @param $num
     * @return int
     */
    protected function getLevel($num)
    {
        $level = 2;
        while ($this->sequence($level)[$level] < $num)
        {
            $level ++;
        }
        $level --;
        return $level;
    }

    /**
     * @param $level
     * @return mixed
     */
    protected function getAmount($level)
    {
        return $this->sequence($level)[$level];
    }

    /**
     * @param $balance
     * @return mixed
     */
    public function getRecommendedBet($balance)
    {
        $level = $this->getLevel($balance);
        $amount = $this->getAmount($level - 2);
        return $amount;
    }
}