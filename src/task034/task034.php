<?php

declare(strict_types=1);

//https://www.codewars.com/kata/585d7d5adb20cf33cb000235/train/php

/* Both solutions are valid, performance issue;

function findUnique(array $numbers): int|float
{
    $uniqueNumbers = [];
    $notUniqueNumbers = [];

    foreach ($numbers as $number) {
        if (!in_array($number, $uniqueNumbers)) {
            $uniqueNumbers[] = $number;
        } else {
            $notUniqueNumbers[] = $number;
        }
    }

    $result = array_filter($uniqueNumbers, function ($value) use ($notUniqueNumbers) {
       return  $value !== $notUniqueNumbers[0];
    });

    return current($result);
}
*/

//TODO: find an alternative and fast solution;

const UNIQUE_COUNT = 1;

/**
 * @param int|float[] $numbers
 * @return int|float[]
 */
function findUnique(array $numbers): int|float
{
    $uniqueNumbers = [];

    foreach ($numbers as $number) {
        checkNumber($number, $uniqueNumbers);
    }

    $uniqueAsString = array_search(UNIQUE_COUNT, $uniqueNumbers, true);

    return castString($uniqueAsString);
}

/**
 * @param int|float $number
 * @param array<string, int> $uniqueNumbers
 * @return void
 */
function checkNumber(int|float $number, array &$uniqueNumbers): void
{
    if (!array_key_exists(strval($number), $uniqueNumbers)) {
        addNumberAsUnique($number, $uniqueNumbers);
    } else {
        incrementValue($number, $uniqueNumbers);
    }
}

/**
 * @param int|float $number
 * @param array<string, int> $uniqueNumbers
 * @return void
 */
function addNumberAsUnique(int|float $number, array &$uniqueNumbers): void
{
    $key = strval($number);
    $uniqueNumbers[$key] = 1;
}

/**
 * @param int|float $number
 * @param array<string, int> $uniqueNumbers
 * @return void
 */
function incrementValue(int|float $number, array &$uniqueNumbers): void
{
    $key = strval($number);
    $uniqueNumbers[$key]++;
}

function castString(string|int $str): int|float
{
    if (is_string($str)) {
        return is_numeric($str) ? floatval($str) : intval($str);
    }

    return $str;
}
