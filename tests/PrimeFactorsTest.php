<?php

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase 
{

     /**
      * @test
     * @dataProvider factorsProvider
     */
    public function testFactors($number, $expected)
    {
        $factors = (new PrimeFactors())->generate($number);
        $this->assertEquals($expected, $factors);
    }

    public function factorsProvider()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [50, [2, 5, 5]],
        ];
    }
}

?>