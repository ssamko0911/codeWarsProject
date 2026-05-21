<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a91a7c5fd8c061367000002/train/php

/**
 * @param int[] $nums
 */
function minimumSteps(array $nums, int $value): int
{
    $stepCount = 0;
    $sum = 0;

    sort($nums, SORT_NUMERIC);

    foreach ($nums as $num) {
        $sum += $num;

        if ($sum >= $value) {
            break;
        }

        $stepCount++;
    }

    return $stepCount;
}
