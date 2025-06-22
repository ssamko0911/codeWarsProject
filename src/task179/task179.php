<?php declare(strict_types=1);

// https://www.codewars.com/kata/5276c18121e20900c0000235/train/php

/**
 * @param int[] $numbers
 * @return int
 */
function find_number(array $numbers): int
{
    if (0 === count($numbers)) {
        return 1;
    }

    sort($numbers);

    $arrayToCompare = range($numbers[0], $numbers[count($numbers) - 1]);
    $missing = array_diff($arrayToCompare, $numbers);

    if (0 !== count($missing)) {
        return reset($missing);
    }

    return $numbers[0] === 1 ? count($numbers) + 1 : $numbers[0] - 1;
}
