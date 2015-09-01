<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 07:07
 */

namespace Del\Casino\Game\Bet\Type\Roulette;

use Del\Casino\Game\Bet\Type\TypeAbstract;


class Colour extends TypeAbstract
{
    const RED = 'red';
    const BLACK = 'black';
    const GREEN = 'green';


    /** @var array */
    private $colours = [
        0 => 'green',
        1 => 'red',
        2 => 'black',
        3 => 'red',
        4 => 'black',
        5 => 'red',
        6 => 'black',
        7 => 'red',
        8 => 'black',
        9 => 'red',
        10 => 'black',
        11 => 'black',
        12 => 'red',
        13 => 'black',
        14 => 'red',
        15 => 'black',
        16 => 'red',
        17 => 'black',
        18 => 'red',
        19 => 'red',
        20 => 'black',
        21 => 'red',
        22 => 'black',
        23 => 'red',
        24 => 'black',
        25 => 'red',
        26 => 'black',
        27 => 'red',
        28 => 'black',
        29 => 'black',
        30 => 'red',
        31 => 'black',
        32 => 'red',
        33 => 'black',
        34 => 'red',
        35 => 'black',
        36 => 'red',
    ];

    private $colour;

    public function __construct($colour)
    {
        $this->colour = $colour;
        $this->odds = 2;
    }

    public function processBet($num)
    {
        return $this->colours[$num] === $this->colour;
    }
}