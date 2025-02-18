<?php

declare(strict_types=1);

// There's a lot of room for optimisation;

//https://leetcode.com/problems/search-insert-position/

/**
 * @param int[] $nums
 * @param int $target
 * @return int
 */
function searchInsert(array $nums, int $target): int
{
    $nums[] = $target;
    sort($nums, SORT_NUMERIC);

    return array_search($target, $nums);
}
