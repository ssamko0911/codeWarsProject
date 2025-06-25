<?php declare(strict_types=1);

//https://www.codewars.com/kata/5966847f4025872c7d00015b/train/php

const EMPTY_STRING = 'n/a';
const MAP = [
    'zero' => 0,
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => 4,
    'five' => 5,
    'six' => 6,
    'seven' => 7,
    'eight' => 8,
    'nine' => 9,
];

function average_string(string $str): string
{
    if (0 === strlen($str)) {
        return EMPTY_STRING;
    }

    $numbersAsStrings = explode(' ', $str);

    if (!validate($numbersAsStrings)) {
        return EMPTY_STRING;
    }

    $numbers = array_map(
        static function (string $str): int {
            return MAP[$str];
        },
        $numbersAsStrings
    );

    $avg = (int) (array_sum($numbers) / count($numbers));

    return array_search($avg, MAP);
}

/**
 * @param string[] $numbersAsStrings
 * @return bool
 */
function validate(array $numbersAsStrings): bool
{
    foreach ($numbersAsStrings as $number) {
        if (!isset(MAP[$number])) {
            return false;
        }
    }

    return true;
}
