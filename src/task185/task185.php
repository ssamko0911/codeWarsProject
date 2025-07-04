<?php declare(strict_types=1);

//https://www.codewars.com/kata/558c04ecda7fb8f48b000075/train/php

/**
 * @param array<int, int[]> $firstArray
 * @param array<int, int[]> $secondArray
 * @return bool
 */
function same(array $firstArray, array $secondArray): bool
{
    foreach ($firstArray as $array) {
        if (
            in_array($array, $secondArray, true) ||
            in_array(swapElements($array), $secondArray, true)
        ) {
            continue;
        } else {
            return false;
        }
    }

    return true;
}

/**
 * @param int[] $arr
 * @return int[]
 */
function swapElements(array $arr): array
{
    return [$arr[1], $arr[0]];
}
