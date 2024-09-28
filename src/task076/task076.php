<?php

declare(strict_types=1);

//https://leetcode.com/problems/roman-to-integer/

const ROMAN_DICTIONARY = [
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1,
];

/**
 * @param string $str
 * @return int
 */
function romanToInt(string $str): int
{
    $converted = 0;

    foreach (ROMAN_DICTIONARY as $key => $value) {
        while (str_starts_with($str, $key)) {
            $converted += $value;
            $str = substr($str, strlen($key));
        }
    }

    return $converted;
}
