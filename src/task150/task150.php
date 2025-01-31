<?php

declare(strict_types = 1);

//https://leetcode.com/problems/contains-duplicate/

/**
 * @param int[] $nums
 * @return true
 */
function containsDuplicate(array $nums): true
{
    return count(array_unique($nums)) !== count($nums);
}
