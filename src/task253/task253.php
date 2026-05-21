<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a651865fd56cb55760000e0/train/php

/**
 * @param int[] $numbers
 * @return int[]
 */

function arrayLeaders(array $numbers): array
{
    $leaders = [];

    foreach ($numbers as $key => $value) {
        $rightSum = array_sum(
            array_slice(
                $numbers,
                $key === array_key_last($numbers) ? $key : $key + 1
            )
        );

        if ($value > $rightSum) {
            $leaders[] = $value;
        }
    }

    if (0 < $numbers[array_key_last($numbers)]) {
        $leaders[] = $numbers[array_key_last($numbers)];
    }

    return $leaders;
}
