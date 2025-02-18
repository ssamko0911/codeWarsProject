<?php

declare(strict_types=1);

//https://leetcode.com/problems/majority-element/

/**
 * @param int[] $nums
 * @return int
 */
function majorityElement(array $nums): int
{
    $majorityThreshold = (int)(count($nums) / 2);

    $valuesCount = array_count_values($nums);

    $max = max(
                array_filter(
                    $valuesCount, static function ($value) use ($majorityThreshold): bool {
                        return $value > $majorityThreshold;
                    }
                )
            );

    return array_search($max, $valuesCount);
}
