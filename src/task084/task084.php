<?php

declare(strict_types=1);

//https://www.codewars.com/kata/514b92a657cdc65150000006/php

const DIVISORS = [
    'three' => 3,
    'five' => 5,
    'both' => 15,
];


function solution($number): int
{
    if ($number < 0) {
        return 0;
    }

    $numbers = getNumbers($number);

    $sum = 0;

    foreach ($numbers as $number) {
        if (0 === $number % DIVISORS['both']) {
            $sum += $number;
            continue;
        }

        if (0 === $number % DIVISORS['five']) {
            $sum += $number;
        }

        if (0 === $number % DIVISORS['three']) {
            $sum += $number;
        }
    }

    return $sum;
}

/**
 * @param $limit
 * @return int[]
 */
function getNumbers($limit): array
{
    return range(1, $limit - 1);
}
