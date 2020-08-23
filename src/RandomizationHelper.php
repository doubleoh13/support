<?php

namespace DoubleOh13\Support;

class RandomizationHelper
{
    /**
     * Converts a number, like an ID column, into a string of seemingly random text to use as a slug.
     *
     * @param int $int
     * @return string
     */
    public static function intToSeeminglyRandomString(int $int)
    {
        $paddedString = str_pad((string)$int, 10, 0, STR_PAD_LEFT);
        $adjustedString = substr($paddedString, -2) . substr($paddedString, 0, -2);
        $newInt = (int)$adjustedString;
        $base34 = base_convert($newInt, 10, 34);
        return strtoupper(str_replace([0,1], ['y', 'z'], $base34));
    }

    /**
     * Converts that seemingly random string of text back into an integer.
     *
     * @param string $seeminglyRandomString
     * @return int
     */
    public static function seeminglyRandomStringToInt(string $seeminglyRandomString)
    {
        $base34 = strtolower(str_replace(['Y','Z'], [0,1], $seeminglyRandomString));
        $paddedString = str_pad((string)base_convert($base34, 34, 10), 10, 0, STR_PAD_LEFT);
        $originalString = substr($paddedString, 2) . substr($paddedString, 0, 2);

        return (int) $originalString;
    }
}