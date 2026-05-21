<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a512f6a80eba857280000fc/train/php

/**
 * @param int[] $array
 */
function NthSmallest(array $array, int $pos): int
{
    sort($array);

    return $array[$pos - 1]; // Your code here
}
