<?php

namespace App;

class TennisMatch  
{
    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;


    public function score()
    {
        if($this->hasWinner() )
        {
            return 'Winner: '.$this->leader();
        }

        if($this->isDeuce())
        {
            return 'Deuce';
        }

        //otherwise provide a default
        return sprintf(
            "%s-%s",
            $this->pointsToTerm($this->playerOnePoints),
            $this->pointsToTerm($this->playerTwoPoints),

        );
      
    }

    public function pointToPlayerOne()
    {
        $this->playerOnePoints++;
    }

    public function pointToPlayerTwo()
    {
        $this->playerTwoPoints++;
    }
    
    protected function pointsToTerm($points)
    {
        switch($points){
            case 0:
                return 'Love';
            case 1:
                return 'Fifteen';
            case 2:
                return 'Thirty';
            case 3:
                return 'Forty';
        }
       
    }

    
    protected function hasWinner() : bool
    {
        if($this->playerOnePoints > 3 && $this->playerOnePoints >= $this->playerTwoPoints + 2)
        {
            return true;
        }
        
        if($this->playerTwoPoints > 3 && $this->playerTwoPoints >= $this->playerOnePoints + 2)
        {
            return true;
        }

        return false;

    }

    /**
     * 
     * @return string 
     */

     protected function leader() : string 
     {
        return  $this->playerOnePoints > $this->playerTwoPoints 
                ? "Player 1" 
                : "Player 2";
     }

     /**
     * 
     * @return bool 
     */
    protected function isDeuce() : bool
    {
        $canBeWon = $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3;
        return  $canBeWon && $this->playerOnePoints == $this->playerTwoPoints;

    }
}

?>
