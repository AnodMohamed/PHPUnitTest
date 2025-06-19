<?php
use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
     /**
      * @test
     *
     */

    function it_scores_a_gutter_game_as_zero()
    {
        $game = new Game();

        foreach (range(1,20) as $roll)
        {
            $game->rolls(0);
        }

        $this->assertSame(0, $game->score());
    }

    /**
      * @test
     *
     */
    function it_scores_all_ones()
        {
        $game = new Game();

        foreach (range(1,20) as $roll)
        {
            $game->rolls(1);
        }

        $this->assertSame(20, $game->score());
    }

    /**
      * @test
     *
     */
    function it_awards_a_one_roll_bonus_for_every_spare()
        {
        $game = new Game();

        $game->rolls(5);

        $game->rolls(5);


        $game->rolls(8);

        foreach (range(1,17) as $roll)
        {
            $game->rolls(0);
        }

        $this->assertSame(26, $game->score());
    }

     /**
      * @test
     *
     */
    function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $game = new Game();

        $game->rolls(10); //strike

        $game->rolls(5);

        $game->rolls(2);


        foreach (range(1,16) as $roll)
        {
            $game->rolls(0);
        }

        $this->assertSame(24, $game->score());
    }

     /**
      * @test
     *
     */

    function a_spare_on_the_final_frame_grants_one_extra_balls()
    {
        $game = new Game();

        foreach (range(1,18) as $roll)
        {
            $game->rolls(0);
        }

        $game->rolls(5);
        $game->rolls(5);
        $game->rolls(5);

        $this->assertSame(15, $game->score());


    }

     /**
      * @test
     *
     */
    function a_spare_on_the_final_frame_grants_two_extra_balls()
    {
        $game = new Game();

        foreach (range(1,18) as $roll)
        {
            $game->rolls(0);
        }

        $game->rolls(10);
        $game->rolls(10);
        $game->rolls(10);

        $this->assertSame(30, $game->score());


    }

    /**
      * @test
     *
     */
    function it_scores_a_profect_game()
    {
        $game = new Game();

        foreach (range(1,12) as $roll)
        {
            $game->rolls(10);
        }

        $this->assertSame(300, $game->score());


    }
}
?>