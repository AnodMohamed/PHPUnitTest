<?php

use App\Player;
use PHPUnit\Framework\TestCase;
use App\TennisMatch;

class TennisMatchTest extends TestCase
{
    /** 
     * @test
     * @dataProvider scores
    */
    public function test_scores_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch(
           $John = new Player('John'),
           $Jane = new Player( 'Jane'),
        );
        
        // Add points for player one
        for($i = 0; $i < $playerOnePoints; $i++){
            $John->score();
        }

        // Add points for player one
        for($i = 0; $i < $playerTwoPoints; $i++){
            $Jane->score();
        }
        
        
        $this->assertEquals($score, $match->score());
    }

    /**
     * Data provider for tennis scores
     * @return array
    */
    public static function scores()
    {
        return [
            [0, 0, 'Love-Love'],
            [1, 0, 'Fifteen-Love'],
            [1, 1, 'Fifteen-Fifteen'],
            [2, 0, 'Thirty-Love'],
            [3, 0, 'Forty-Love'],
            [2, 2, 'Thirty-Thirty'],
            [3, 3, 'Deuce'],
            [4, 4, 'Deuce'],
            [5, 5, 'Deuce'],
            [4, 3, 'Advantage: John'],
            [3, 4, 'Advantage: Jane'],
            [4, 0, 'Winner: John'],
            [0, 4, 'Winner: Jane'],

        ];
    }
        
 
   



}

?>
