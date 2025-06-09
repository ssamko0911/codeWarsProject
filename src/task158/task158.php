<?php

declare(strict_types=1);

//https://leetcode.com/problems/add-binary/

function addBinary(string $a, string $b): string
{
    return base_convert((string)(bindec($a) + bindec($b)), 10, 2);
}

/**
 * @param string[] $birds
 * @return string[]
 */
function gooseFilter(array $birds): array {
    $geese = ["African", "Roman Tufted", "Toulouse", "Pilgrim", "Steinbacher"];

    return array_values(
        array_filter($birds, static function($bird) use ($geese): bool {
            return !in_array($bird, $geese);
        })
    );
}

function growingPlant(int $upSpeed, int $downSpeed, int $desiredHeight): int
{
    $currentHeight = $upSpeed;

    for ($i = 1; $currentHeight < $desiredHeight; $i++) {
        $currentHeight += $upSpeed - $downSpeed;
    }

    return $i;
}

echo growingPlant(100, 10, 910) . PHP_EOL;
echo growingPlant(10, 9, 4) . PHP_EOL;
echo growingPlant(5, 2, 5) . PHP_EOL;
echo growingPlant(5, 2, 6) . PHP_EOL;

/**
 * @param int[] $numbers
 */
function odd_or_even(array $numbers): string
{
    return 0 === array_sum($numbers) % 2 ? "even" : "odd";
}

function removeDuplicateWords(string $str): string
{
    return implode(' ',
        array_unique(
            explode(" ", $str)
        )
    );
}

function digits(int $number): int
{
    return strlen((string)($number));
}


function validatePin(string $pin): bool
{
    return 4 === strlen($pin) && is_int((int) $pin); // your code here
}

function isValidDigit(string $number): bool
{
    for ($i = 0; $i < strlen($number); $i++) {
        if (!in_array($number[$i], range(0, 9))) {
            return false;
        }
    }

    return true;
}

function isValidLength(string $number): bool
{
    return 4 === strlen($number) || 6 === strlen($number);
}

/**
 * @param int $givenValue
 * @param int[] $intArray
 * @return int[]
 */
function roundUp(int $givenValue, array $intArray): array
{
    $rounded = [];

    if (in_array($givenValue, $intArray)) {
        return [$givenValue];
    }

    if (!empty($intArray)) {
        $diff = array_map(
            static function (int $value) use ($givenValue): int {
                return abs ($value - $givenValue);
            },
            $intArray);

        $min = min($diff);

        $rounded = array_values(
            array_filter($intArray,
                static function (int $value) use ($min, $givenValue): bool {
                    return abs($value - $givenValue) === $min;
                }
            )
        );

        foreach ($intArray as $item) {
            if (abs($item - $givenValue) === $min) {
                $rounded[] = $item;
            }
        }
    }

    return $rounded;
}

roundUp(1, [-32, 12, 8, -10, -2, 4]);

echo abs(1 - 10) . PHP_EOL;

function count_developers(array $developers): int {
    $language = 'JavaScript';
    $continent = 'Europe';

    return count(
        array_filter($developers,
            static function (array $value) use ($language, $continent): bool {
                return $value['language'] === $language && $value['continent'] === $continent;
            }
        )
    );
}

/**
 * @param string $word
 * @return int[]
 */
function capitals(string $word): array
{
    $capitals = [];

    for ($i = 0; $i < strlen($word); $i++) {
        if (strtoupper($word[$i]) === $word[$i]) {
            $capitals[] = $word[$i];
        }
    }

    return $capitals;
};

/**
 * @param int[] $arr
 * @param int[] $mixedArr
 * @return int
 */
function findDeletedNumber(array $arr, array $mixedArr): int {
    sort($mixedArr);

    for ($i = 0; $i < count($arr); $i++) {
        if (!in_array($arr[$i], $mixedArr)) {
            return $arr[$i];
        }
    }

    return 0;
}

print_r(findDeletedNumber([1,2,3,4,5,6,7,8,9], [3,2,4,6,7,8,1,5]));