<?php
use PHPUnit\Framework\TestCase;
use App\TennisMatch;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
    function it_scores_tennis_match($playerOnePoints, $playerTwoPoints, $score)
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
    public  function scores()
    {
        return [
            [0, 0, 'Love-Love'],
            [1, 0, 'Fifteen-Love'],
            [1, 1, 'Fifteen-Fifteen'],
            [2, 0, 'Thirty-Love'],
            [3, 0, 'Forty-Love'],
        ];
    }
    
 
    // public function test_scores_2_to_0()
    // {
    //     $match = new TennisMatch();

    //     $match->pointToPlayerOne();
    //     $match->pointToPlayerTwo();

    //     $this->assertEquals('Thirty-Love', $match->score());
    // }


}

?>
