<?php declare(strict_types=1);

// https://www.codewars.com/kata/59b844528bcb7735560000a0/train/php

/**
 * @param int[] $array
 */
function isNice(array $array): bool
{
    if ([] === $array) {
        return false;
    }

    foreach ($array as $value) {
        if (
            !in_array($value + 1, $array, true) &&
            !in_array($value - 1, $array, true)
        ) {
            return false;
        }
    }

    return true;
}
