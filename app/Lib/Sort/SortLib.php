<?php

namespace App\Lib\Sort;

use App\Lib\Sort\BubbleSorting;
use App\Lib\Sort\QuickSorting;


class SortLib
{
    /**
     * @var int
     */
    private static $SORT_METHOD_QUICK_SORT = 1;

    /**
     * @var int
     */
    private static $SORT_METHOD_BUBBLE_SORT = 2;

    /**
     * Intance of sorting method to be used
     *
     * @var \App\Lib\Sort\QuickSorting
     */
    private $sorting;


    /**
     * SortLib constructor.
     * @param $method
     */
    public function __construct($method)
    {
        // checks sorting method to be used
        switch ($method) {
            case ($method == self::$SORT_METHOD_MERGE_SORT) :
                $this->sorting = new BubbleSorting();
                break;
            case ($method == self::$SORT_METHOD_QUICK_SORT):
                $this->sorting = new QuickSorting();
                break;
        }
    }

    /**
     * Getting the sorted String
     *
     * @param $string
     * @return mixed
     */
    public function get_sorted_string($string)
    {
        // fail safe cleaning up strings and making all lower case
        $string = strtolower($this->clean_up_symbols($string));

        $arrayOfLetters = $this->convert_string_to_array($string);

        return $this->sorting->sort($arrayOfLetters);
    }

    /**
     * Get list of Sort Method for options
     *
     * @return array
     */
    public static function get_sort_methods()
    {
        return [
            [
                'label' => 'Quick Sort',
                'value' => self::$SORT_METHOD_QUICK_SORT
            ],
            [
                'label' => 'Bubble Sort',
                'value' => self::$SORT_METHOD_BUBBLE_SORT
            ]
        ];
    }

    /**
     * Removes special characters and numeric on the string
     *
     * @param $string
     * @return mixed
     */
    private function clean_up_symbols($string)
    {
        return preg_replace("/[^a-zA-Z]+/", "", $string);;
    }

    /**
     * @param $string
     *
     * @return array
     */
    private function convert_string_to_array($string)
    {
        return str_split($string);
    }

}