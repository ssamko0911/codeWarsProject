<?php declare(strict_types=1);

//https://www.codewars.com/kata/561046a9f629a8aac000001d/train/php

/**
 * @param array<int|string> $firstArray
 * @param array<int|string> $secondArray
 * @return int
 */
function match_arrays(array $firstArray, array $secondArray): int {
    return count(array_intersect($firstArray, $secondArray));
}
