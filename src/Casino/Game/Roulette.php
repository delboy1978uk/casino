<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 00:52
 */

namespace Del\Casino\Game;

use Del\Casino\Table;
use Del\Casino\Game\Bet\Roulette as Bet;
use Del\Casino\Game\Turn\Roulette as Turn;

class Roulette extends Table
{
    /** @var array */
    private $bets = [];

    /** @var array */
    private $result = [
        'num' => null,
        'winners' => [],
        'losers' => [],
    ];

    /**
     * @return Turn
     */
    public function nextPlayersTurn()
    {
        $player = $this->getNextPlayer();
        $player = (is_null($player)) ? $this->getNextPlayer() : $player;
        return new Turn($player,$this);
    }


    /**
     * @param Bet $bet
     */
    public function addBet(Bet $bet)
    {
        $this->bets[]  = $bet;
    }

    /**
     * @return array
     */
    public function spinWheel()
    {
        $results['num'] = $num = (string) rand(0,36);
        $this->processBets($num);
        $this->payWinners();
        $this->payBanker();
        $this->resetTable();
        return $results;
    }

    private function processBets($num)
    {
        /** @param Bet $bet */
        foreach($this->bets as $bet)
        {
            $result = $this->processBet($bet,$num);
            $who = ($result === true) ? 'winners' : 'losers';
            $this->result[$who][] = $bet;
        }
    }


    private function processBet(Bet $bet, $num)
    {
        return $bet->getType()->processBet($num);
    }


    private function payWinners()
    {
        if(isset($this->result['winners'])){
            /** @var Bet $win */
            foreach($this->result['winners'] as $win)
            {
                $win->getPlayer()->addChips($win->getAmount() * $win->getOdds());
            }
        }
    }


    private function payBanker()
    {
        if(isset($this->result['losers'])){
            /** @var Bet $loss */
            foreach($this->result['losers'] as $loss)
            {
                $this->getBanker()->addChips($loss->getAmount());
            }
        }
    }


    private function resetTable()
    {
        $this->history[] = $this->result;
        $this->bets = [];
        $this->result = [];
        $this->iterator->rewind();
    }
}