<?php

declare(strict_types = 1);

//https://leetcode.com/problems/remove-duplicates-from-sorted-array/description/

/**
 * @param int[] $nums
 * @return int
 */
function removeDuplicates(array &$nums): int
{
    $nums = array_values(array_unique($nums));

    return count($nums);
}
