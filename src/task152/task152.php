<?php

declare(strict_types=1);

//https://leetcode.com/problems/move-zeroes/

/**
 * @param int[] $nums
 */
function moveZeroes(array &$nums): void
{
    $counter = 0;
    $nonZeroes = [];

    foreach ($nums as $num) {
        if (0 !== $num) {
            $nonZeroes[] = $num;
        } else {
            $counter++;
        }
    }

    $nums = array_merge($nonZeroes, array_fill(0, $counter, 0));
}
