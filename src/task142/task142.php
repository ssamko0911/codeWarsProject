<?php

declare(strict_types = 1);

//https://leetcode.com/problems/remove-element/description/

/**
 * @param int[] $nums
 * @param int $val
 * @return int
 */
function removeElement(array &$nums, int $val): int
{
    $nums = array_values(array_filter($nums, static function (int $num) use ($val): bool {
        return $num !== $val;
    }));
    
    return count($nums);
}
