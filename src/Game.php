<?php

namespace App;

class Game  
{
  const FRAMES_PER_GANE = 10;

  protected array $rolls = [];

  public function roll(int $pins)
  {
    $this->rolls[] = $pins;
  }

  public function score()
  {
    $score = 0;
    $roll = 0;

    foreach (range(1, self::FRAMES_PER_GANE) as $frame) {
        // strike
        if ($this->rolls[$roll] == 10) {
            $score += 10 + $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
            $roll += 1;
        }
        // spare
        elseif ($this->rolls[$roll] + $this->rolls[$roll + 1] == 10) {
            $score += 10 + $this->rolls[$roll + 2];
            $roll += 2;
        }
        // open frame
        else {
            $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
            $roll += 2;
        }
    }

    return $score;
  }

}

?>