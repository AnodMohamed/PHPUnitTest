<?php

namespace App;

class TennisMatch  
{
    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;


    public function score()
    {
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

    

}

?>
