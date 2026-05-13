<?php declare(strict_types = 1);

// https://www.codewars.com/kata/5a7893ef0025e9eb50000013/train/php

/**
 * @param int[] $nums
 * @return int
 */
function maxGap(array $nums): int
{
    $maxGap = 0;

    sort($nums, SORT_NUMERIC);

    $length = count($nums);

    for($i = 1; $i < $length; $i++) {
        $gap = abs($nums[$i] - $nums[$i - 1]);
        if ($gap > $maxGap) {
            $maxGap = $gap;
        }
    }

    return $maxGap;
}
