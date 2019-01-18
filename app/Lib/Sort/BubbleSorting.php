<?php

namespace App\Lib\Sort;


class BubbleSorting implements SortInterface
{
    /**
     * Bubble sorting
     *
     * Reference https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-6.php
     *
     * @param $arrayOfLetters
     * @return mixed
     */
    public function sort($arrayOfLetters)
    {
        do
        {
            $swapped = false;
            for( $i = 0, $c = count( $arrayOfLetters ) - 1; $i < $c; $i++ )
            {
                if( $arrayOfLetters[$i] > $arrayOfLetters[$i + 1] )
                {
                    list( $arrayOfLetters[$i + 1], $arrayOfLetters[$i] ) =
                        array( $arrayOfLetters[$i], $arrayOfLetters[$i + 1] );
                    $swapped = true;
                }
            }
        }
        while( $swapped );

        return implode('', $arrayOfLetters);
    }

}