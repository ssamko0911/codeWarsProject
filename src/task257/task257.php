<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a523566b3bfa84c2e00010b/train/php

/**
 * @param int[] $array
 */
function minSum(array $array): int
{
    sort($array, SORT_NUMERIC);

    $minSum = 0;
    $middle = (int) (count($array) / 2);

    for ($i = 0; $i < $middle; $i++) {
        $minSum += $array[$i] * $array[array_key_last($array) - $i];
    }

    return $minSum;
}
