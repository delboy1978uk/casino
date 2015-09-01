<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 10:14
 */

namespace Del\Casino\Strategy;


interface StrategyInterface
{
    /**
     * @param int $balance
     * @return int
     */
    public function getRecommendedBet($balance);
}