<?php

namespace App;

class StringCalculator  
{

    const MAX_NUMBER_ALLOWED =  1000 ;
    protected $delimiter = ",|\n";


    public function add(string $numbers)
    {
        // if (! $numbers){
        //     return 0;
        // }
        
       $numbers = $this->parseString($numbers);

       $this->disallowNegatives($numbers);

       $numbers = $this->ignoreGreaterThan800($numbers);

        return array_sum($numbers);
    }
    
    protected function disallowNegatives(array $numbers): void
    {
        foreach($numbers as $number)
        {
            if($number < 0)
            {
                throw new \Exception('Negative number are disallowed...');
            }
        }
    }

    

    protected function parseString(string $numbers)
    {
         if (preg_match('/^\/\/(.)(\\\\n)/', $numbers, $matches)) {
        $customDelimiter = preg_quote($matches[1], '/');
        $delimiter2 = $customDelimiter . "|" . $this->delimiter;
        $numbers = substr($numbers, strlen($matches[0]));
        }
                
        $numbers = preg_split("/{$delimiter2}/", $numbers);

        // Filter out empty strings and convert to integers
        $numbers = array_filter($numbers, function($number) {
            return $number !== '' && is_numeric($number);
        });
        
        $numbers = array_map('intval', $numbers);

        return $numbers;
    }

    /**
     * @param array $numbers
     * @return array 
     */
    protected function ignoreGreaterThan800(array $numbers): array
    {
        $numbers = array_filter($numbers, function($number){
            return $number <= self::MAX_NUMBER_ALLOWED; 
        });

        return $numbers;

    }
}

?>
