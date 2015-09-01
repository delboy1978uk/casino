<?php
/**
 * User: delboy1978uk
 * Date: 01/09/15
 * Time: 01:13
 */

namespace Del\Casino\PlayingCards;

class Card
{
    /** @var string $suit */
    protected $suit;

    /** @var string $value */
    protected $value;

    /** @var string $suit_text */
    protected $suit_text;

    /** @var string $value_text */
    protected $value_text;

    /** @var bool $facedown */
    protected $facedown = false;


    public function __construct($suit, $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getAsText()
    {
        return $this->getValueAsText().' of '.$this->getSuitAsText();
    }

    /**
     * @return string
     */
    public function getSuitAsText()
    {
        $suits = [
            'H' => 'Hearts',
            'C' => 'Clubs',
            'D' => 'Diamonds',
            'S' => 'Spades'
        ];
        return $suits[$this->suit];
    }

    /**
     * @return string
     */
    public function getValueAsText()
    {
        $values = [
            'A' => 'Ace',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine',
            '10' => 'Ten',
            'J' => 'Jack',
            'Q' => 'Queen',
            'K' => 'King'
        ];
        return $values[$this->value];
    }

    /**
     * Generates HTML for the card
     * @param string $id
     * @return string
     */
    public function getHtml($id = null)
    {
        $html = '<div id="'.$id.'" class="playing-card card-'
            .strtolower($this->getValue())
            .strtolower($this->getSuit()).' ';
        if($this->facedown === true){$html .= 'playing-card-facedown ';}
        $html .= '"></div>';
        return $html;
    }

    /**
     * @return string
     */
    public function getJson()
    {
        $class = 'playing-card card-'.strtolower($this->getValue()).strtolower($this->getSuit()).' ';
        if($this->facedown === true){$class .= 'playing-card-facedown ';}
        $array = array(
            'suit' => $this->getSuit(),
            'value' => $this->getValue(),
            'suit_text' => $this->getSuitAsText(),
            'value_text' => $this->getValueAsText(),
            'facedown' => $this->facedown,
            'divclass' => $class
        );
        return json_encode($array);
    }

    /**
     * Flips the card face up or face down
     */
    public function flipCard()
    {
        $this->facedown = $this->facedown ? false : true;
    }

    /**
     * Flips the card face down
     */
    public function flipFaceDown()
    {
        $this->facedown = true;
    }

    /**
     * Flips the card face up
     */
    public function flipFaceUp()
    {
        $this->facedown = false;
    }

    /**
     * @return bool
     */
    public function isFaceDown()
    {
        return $this->facedown;
    }
}