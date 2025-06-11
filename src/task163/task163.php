<?php declare(strict_types=1);

//https://www.codewars.com/kata/59b0492f7d3c9d7d4a0000bd/train/php

/**
 * @param array $numbers
 * @return bool
 */
function is_madhav_array(array $numbers): bool
{
    if (0 === count($numbers) || 1 === count($numbers)) {
        return false;
    }

    $offset = 0;
    $length = 1;
    $total = $numbers[$offset];

    while ($offset < count($numbers)) {
        $slice = array_slice($numbers, $offset, $length);

        if ($length > count($slice)) {
            return false;
        }

        $sum = array_sum($slice);

        if ($total !== $sum) {
            return false;
        }

        $offset += $length;
        $length++;
    }


    return true;
}
