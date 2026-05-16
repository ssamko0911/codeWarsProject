<?php declare(strict_types=1);

// https://www.codewars.com/kata/583d10c03f02f41462000137/train/php

/**
 * @param int[] $array
 * @param array<int, int[]> $ranges
 */
function max_sum(array $array, array $ranges): int
{
    $max = PHP_INT_MIN;

    foreach ($ranges as $range) {
        $keys = range($range[0], $range[array_key_last($range)]);

        $sum = array_sum(
            array_map(
                static function ($key) use ($array): int {
                    return $array[$key];
                },
                $keys
            )
        );

        if ($sum > $max) {
            $max = $sum;
        }
    }

    return $max;
}
