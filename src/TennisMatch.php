<?php  
namespace App;  

class TennisMatch   
{     
    protected Player $playerOne;     
    protected Player $playerTwo;      
    
    public function __construct($playerOne, $playerTwo)     
    {         
        $this->playerOne = $playerOne;         
        $this->playerTwo = $playerTwo;      
    }     
    
    public function score()     
    {         
        if($this->hasWinner())         
        {             
            return 'Winner: '.$this->leader()->name;         
        }          
        
        // check for advantage           
        if($this->hasAdvantage())         
        {              
            return 'Advantage: '.$this->leader()->name;         
        }                  
        
        if($this->isDeuce())         
        {             
            return 'Deuce';         
        }          
        
        // otherwise provide a default         
        return sprintf(             
            "%s-%s", 
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm(),
        );            
    }      

    public function pointTo(Player $player)     
    {         
        $player->score();     
    }     
    

    
    protected function hasWinner() : bool     
    {      
        if(max([$this->playerOne->points, $this->playerTwo->points]) < 4)
        {
            return false;
        }   
        return abs( $this->playerOne->points - $this->playerTwo->points);
                       
    }       
    
    protected function leader() : Player        
    {         
        return  $this->playerOne->points > $this->playerTwo->points                  
            ? $this->playerOne                  
            : $this->playerTwo;      
    }      
    
    protected function isDeuce() : bool     
    {         
        return $this->canBeWon() && $this->playerOne->points == $this->playerTwo->points;      
    }      
    
    protected function hasAdvantage()
    {          
        if($this->canBeWon())         
        {             
            return ! $this->isDeuce();         
        }                  
        
        return false;      
    }      
    
    protected function canBeWon(): bool     
    {         
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;      
    } 
} 

?>