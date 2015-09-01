<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 07:16
 */

namespace Del\Casino\Game\Bet\Type;


abstract class TypeAbstract
{
    /** @var int */
    protected $odds;

    /**
     * @return int
     */
    public function getOdds()
    {
        return $this->odds;
    }

    /**
     * @param $result
     * @return bool
     */
    abstract public function processBet($result);
}