<?php

namespace App\Lib\Sort;


class QuickSorting implements SortInterface
{
    /**
     * @param $arrayOfLetters
     * @return string
     */
    public function sort($arrayOfLetters)
    {
        sort($arrayOfLetters, SORT_NATURAL | SORT_FLAG_CASE);
        return implode('', $arrayOfLetters);
    }
}