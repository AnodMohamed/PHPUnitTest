<?php

namespace App;

class Player  
{
    public string $name;
    public int $points = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }

    public function toTerm()
    {
        switch($this->points){             
            case 0:                 
                return 'Love';             
            case 1:                 
                return 'Fifteen';             
            case 2:                 
                return 'Thirty';             
            case 3:                 
                return 'Forty';
            default:
                return 'Forty'; // For scores above 3
        }  
    }
}