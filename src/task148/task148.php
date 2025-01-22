<?php

declare(strict_types = 1);

// https://leetcode.com/problems/single-number/

/**
 * @param int[] $nums
 * @return int
 */
function singleNumber(array $nums): int
{
    return array_search(1, array_count_values($nums));
}
