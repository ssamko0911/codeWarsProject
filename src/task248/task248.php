<?php declare(strict_types=1);

// https://www.codewars.com/kata/5864eb8039c5ab9cd400005c/train/php

/**
 * @param int[] $array
 */
function median(array $array): int|float
{
    sort($array);

    $length = count($array);
    $middle = (int)($length / 2);

    if (0 !== $length % 2) {
        return $array[$middle];
    }

    return ($array[$middle] + $array[$middle - 1]) / 2;
}
