<?php

namespace App;

class Game  
{
    /**
     * 
     * the number of frames in a game
     */
    const FRAMES_PER_GAME = 10;

    /**
     * 
     * All rolls for the game
     * 
     * @var array
    */
    protected array $rolls = [];

    /**
   * Roll the ball
   * 
   * @param int $pins
   * @return void
   */
    public function rolls(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= self::FRAMES_PER_GAME; $frame++) {
            // Handle 10th frame specially
            if ($frame == self::FRAMES_PER_GAME) {
                $score += $this->tenthFrameScore($roll);
                break;
            }

            // Strike
            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
                continue;
            }

            // Spare
            if ($this->isSpare($roll)) {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
                continue;
            }

            // Open frame
            $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
            $roll += 2;
        }

        return $score;
    }

    protected function tenthFrameScore(int $roll): int
    {
        $score = 0;
        
        // Strike in 10th frame
        if ($this->isStrike($roll)) {
            $score += 10;
            // Add next two rolls as bonus
            $score += $this->pinCount($roll + 1);
            $score += $this->pinCount($roll + 2);
        }
        // Spare in 10th frame  
        else if ($this->isTenthFrameSpare($roll)) {
            $score += 10;
            // Add next roll as bonus
            $score += $this->pinCount($roll + 2);
        }
        // Open frame in 10th
        else {
            $score += $this->pinCount($roll);
            $score += $this->pinCount($roll + 1);
        }

        return $score;
    }

    protected function isTenthFrameSpare(int $roll): bool
    {
        return ($this->pinCount($roll) + $this->pinCount($roll + 1)) == 10 &&
               $this->pinCount($roll) != 10;
    }
    /**
     * @param int $roll 
     * @return bool
     * 
    */
    protected function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) == 10;
    }

    /**
     * @param int $roll 
     * @return bool
     * 
    */
    protected function isSpare(int $roll): bool
    {
        return !$this->isStrike($roll) && 
               $this->defaultFrameScore($roll) == 10;
    }

    /**
     * @param int $roll 
     * @return mixed
     * 
    */
    protected function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }


    /**
     * @param int $roll 
     * @return int
     * 
    */
    protected function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    
    /**
     * @param int $roll 
     * @return int
     * 
    */
    protected function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll] ?? 0;
    }
}

?>
?>