<?php

declare(strict_types=1);

//https://www.codewars.com/kata/51b62bf6a9c58071c600001b/train/php

const ROMAN_DICTIONARY = [
    1000 => 'M',
    900 => 'CM',
    500 => 'D',
    400 => 'CD',
    100 => 'C',
    90 => 'XC',
    50 => 'L',
    40 => 'XL',
    10 => 'X',
    9 => 'IX',
    5 => 'V',
    4 => 'IV',
    1 => 'I',
];

function getRomanYear(int $number): string
{
    $roman = '';

    foreach (ROMAN_DICTIONARY as $key => $value) {
        while ($number >= $key) {
            $roman .= $value;
            $number -= $key;
        }
    }

    return $roman;
}
