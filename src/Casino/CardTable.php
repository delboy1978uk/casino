<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 00:57
 */

namespace Del\Casino;

use Del\Casino\PlayingCards\Shoe;

class CardTable extends Table
{
    /** @var Shoe $shoe */
    protected $shoe;

    /**
     * @param Shoe $shoe
     * @param array $players
     */
    public function __construct(Shoe $shoe, array &$players)
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