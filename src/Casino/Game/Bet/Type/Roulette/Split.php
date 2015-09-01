<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 07:07
 */

namespace Del\Casino\Game\Bet\Type\Roulette;

use Del\Casino\Game\Bet\Type\TypeAbstract;
use Exception;


class Split extends TypeAbstract
{

    private $rows = [
        [3,6,9,12,15,18,21,24,27,30,33,36],
        [2,5,8,11,14,17,20,23,26,29,32,35],
        [1,4,7,10,13,16,19,22,25,28,31,34],
    ];

    /** @var array */
    private $split;

    public function __construct($num1,$num2)
    {
        if($num1 > $num2){
            $num = $num1;
            $num1 = $num2;
            $num2 = $num;
        }
        $this->validateSplit($num1,$num2);
        $this->odds = 18;
    }

    /**
     * @param $num1
     * @param $num2
     * @return bool
     * @throws \Exception
     */
    public function validateSplit($num1,$num2)
    {
        $row = $this->getRow($num1);
        $col = $this->getCol($num1);
        $col ++;
        if($this->rows[$row][$col]!= $num2){
            throw new Exception('not a valid split');
        }
        $this->split = [$num1,$num2];
        return true;
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
        $splits = $this->getWinningSplits($num);
        $win = false;
        foreach($splits as $split){
            if($this->checkSplit($split)){
                $win = true;
            }
        }
        return $win;
    }

    private function checkSplit($winning_split){
        if($this->split[0] == $winning_split[0] && $this->split[1] == $winning_split[1]){
            return true;
        }
        return false;
    }

    /**
     * @param $num
     * @return array
     */
    private function getWinningSplits($num)
    {
        $winners = [];
        $splits = $this->getSplitsForNumber($num);
        $winners[] = $splits[0];
        $winners[] = isset($splits[1]) ? $splits[1] : null;
        return $winners;
    }

    /**
     * @param $num
     * @return array
     */
    private function getSplitsForNumber($num)
    {
        $row = $this->getRow($num);
        $col = $this->getCol($num);
        $splits = [];
        if($col !== 0){
            $val1 = $this->rows[$row][$col-1];
            $val2 = $this->rows[$row][$col];
            $splits[] = [$val1,$val2];
        }
        if($col !== 11){
            $val1 = $this->rows[$row][$col];
            $val2 = $this->rows[$row][$col + 1];
            $splits[] = [$val1,$val2];
        }
        return $splits;
    }

    /**
     * @param $num
     * @return int|null
     */
    private function getCol($num)
    {
        $col = null;
        $row = $this->getRow($num);
        for($x = 0; $x < 12; $x ++){
            if($this->rows[$row][$x] == $num){
                $col = $x;
            }
        }
        return $col;
    }

    /**
     * @param $num
     * @return int
     */
    private function getRow($num)
    {
        $row = null;
        for($x = 0; $x < 3; $x ++)
        {
            if(in_array($num,$this->rows[$x]))
            {
                $row = $x;
            }
        }
        return $row;
    }
}