<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 00:57
 */

namespace Del\Casino;

use Del\Casino\PlayingCards\Shoe;
use Del\Casino\Banker;
use ArrayObject;

class CardTable extends Table
{
    /** @var Shoe $shoe */
    protected $shoe;

    /** @var \ArrayObject */
    protected $players;

    /** @var \Del\Casino\Banker */
    protected $banker;

    /** @var int */
    protected $pot;

    /**
     * @param Shoe $shoe
     * @param array $players
     */
    public function __construct(Shoe $shoe, array $players)
    {
        $this->setShoe($shoe);
        parent::__construct($players);
    }

    /**
     * @param Shoe $shoe
     */
    public function setShoe(Shoe $shoe)
    {
        $this->shoe = $shoe;
    }

    /**
     * @return Shoe
     */
    public function getShoe()
    {
        return $this->shoe;
    }
}