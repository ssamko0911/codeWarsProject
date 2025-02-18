<?php

declare(strict_types = 1);

//https://leetcode.com/problems/missing-number/

/**
 * @param int[] $nums
 */
function missingNumber(array $nums): int
{
    sort($nums);

    $missingNum = in_array(0, $nums) ? $nums[count($nums) - 1] + 1 : 0;

    for ($i = 0; $i < count($nums); $i++) {
        if ($i !== count($nums) - 1 && $nums[$i] + 1 !== $nums[$i + 1]) {
            $missingNum = $nums[$i] + 1;
        }
    }

    return $missingNum;
}
