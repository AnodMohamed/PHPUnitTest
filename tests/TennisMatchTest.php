<?php
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
        $match = new TennisMatch();
        
        // Add points for player one
        for($i = 0; $i < $playerOnePoints; $i++){
            $match->pointToPlayerOne();
        }

        // Add points for player one
        for($i = 0; $i < $playerTwoPoints; $i++){
            $match->pointToPlayerTwo();
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
            [4, 0, 'Winner: Player 1'],
            [0, 4, 'Winner: Player 2'],

        ];
    }
        
 
    public function test_scores_2_to_0()
    {
        $match = new TennisMatch();

        $match->pointToPlayerOne();
        $match->pointToPlayerOne(); // Second point

        $this->assertEquals('Thirty-Love', $match->score());
    }



}

?>
