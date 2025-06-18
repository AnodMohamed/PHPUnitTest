<?php

use PHPUnit\Framework\TestCase;
use App\RomanNumerals;

class RomanNumberalsTest extends TestCase
{
    /**
     * @test
     * @dataProvider checks
     */
    public function it_generates_the_roman_numeral_for_1($number, $numeral)
    {
        $this->assertEquals($numeral, RomanNumerals::generate($number));
    }

     /**
     * @test
     */
     public function it_connot_generates_the_roman_numeral_for_less_than_1()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

     /**
     * @test
     */
     public function it_connot_generates_the_roman_numeral_for_more_than_3999()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public static function checks()
    {
        return [
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1,

        ];
    }
}
