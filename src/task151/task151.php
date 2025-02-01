<?php

declare(strict_types=1);

//https://leetcode.com/problems/reverse-string/

/**
 * @param int[] $stringAsArray
 */
function reverseString(array &$stringAsArray): void
{
    $reversed = array_reverse($stringAsArray);

    $stringAsArray = $reversed;
}
