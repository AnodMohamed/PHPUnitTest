<?php

namespace App;

class StringCalculator  
{

   public function add(string $numbers)
    {
        $delimiter = ",|\n";

        if (! $numbers){
            return 0;
        }
        
        if (preg_match('/^\/\/(.)(\\\\n)/', $numbers, $matches)) {
            $customDelimiter = preg_quote($matches[1], '/');
            $delimiter = $customDelimiter . "|" . $delimiter;
            $numbers = substr($numbers, strlen($matches[0]));
        }
                
        $numbers = preg_split("/{$delimiter}/", $numbers);

        // Filter out empty strings and convert to integers
        $numbers = array_filter($numbers, function($number) {
            return $number !== '' && is_numeric($number);
        });
        
        $numbers = array_map('intval', $numbers);

        foreach($numbers as $number)
        {
            if($number < 0)
            {
                throw new \Exception('Negative number are disallowed...');
            }
        }

        $numbers = array_filter($numbers, function($number){
            return $number <= 1000;
        });

        return array_sum($numbers);
    }
    
}

?>
