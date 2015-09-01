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

    /** @var array */
    private $winners;

    public function __construct($num1,$num2)
    {
        if($num1 > $num2){
            $num = $num1;
            $num1 = $num2;
            $num2 = $num;
        }
        $this->validateSplit($num1,$num2);
        $this->odds = 18;
        $this->winners = [];
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
        $this->getWinningSplits($num);
        foreach($this->winners as $split){
            if($this->checkSplit($split)){
                return true;
            }
        }
        return false;
    }

    /**
     * @param $winning_split
     * @return bool
     */
    private function checkSplit($winning_split)
    {
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
        $this->winners = [];
        $row = $this->getRow($num);
        $col = $this->getCol($num);
        if($col !== 0){
            $col --;
        }
        $this->addSplit($row, $col);
        $col++;
        $this->addSplit($row, $col);
        return $this->winners;
    }


    private function addSplit($row,$col)
    {
        if($col == 11){
            return null;
        }
        $val1 = $this->rows[$row][$col];
        $val2 = $this->rows[$row][$col + 1];
        $this->winners[] = [$val1,$val2];
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