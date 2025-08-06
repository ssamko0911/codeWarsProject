<?php declare(strict_types=1);

//https://www.codewars.com/kata/55031bba8cba40ada90011c4/train/php

const PATTERN = '/\d+/';
const EXP = 3;
const MAX_DIGIT_LENGTH = 3;
const LUCKY = 'Lucky';
const UNLUCKY = 'Unlucky';

function isSumOfCubes(string $string): string
{
    $numbers = splitNumbersFromString($string);
    $cubes = [];

    foreach ($numbers as $number) {
        $sumOfCubes = array_sum(
            array_map(static function (string $string): int {
                return pow((int)$string, EXP);
            }, str_split($number))
        );

        if ($sumOfCubes === (int)$number) {
            $cubes[] = (int)$number;
        }
    }

    if (count($cubes) === 0) {
        return UNLUCKY;
    }

    return implode(' ', $cubes).' '.array_sum($cubes).' '.LUCKY;
}

/**
 * @param string $string
 * @return string[]
 */
function splitNumbersFromString(string $string): array
{
    preg_match_all(PATTERN, $string, $matches);

    $numbers = [];

    foreach ($matches[0] as $numberAsString) {
        if (MAX_DIGIT_LENGTH < strlen($numberAsString)) {
            $chunks = str_split($numberAsString, MAX_DIGIT_LENGTH);
            $numbers = array_merge($numbers, $chunks);
        } else {
            $numbers[] = $numberAsString;
        }
    }

    return $numbers;
}
