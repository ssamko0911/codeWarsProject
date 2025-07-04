<?php declare(strict_types=1);

//https://www.codewars.com/kata/57b6f5aadb5b3d0ae3000611/train/php

/**
 * @param array<int, int[]|string[]>|null $arrayOfArrays
 * @return int
 */
function getLengthOfMissingArray(?array $arrayOfArrays): int
{
    if (validate($arrayOfArrays)) {
        return 0;
    }

    $lengths = [];

    foreach ($arrayOfArrays as $item) {
        if (validate($item)) {
            return 0;
        }

        $lengths[] = count($item);
    }

    sort($lengths);

    return array_values(
        array_diff(
            range($lengths[0], $lengths[count($lengths) - 1]),
            $lengths)
    )[0];
}

/**
 * @param array<int, int[]|string[]>|null $array
 * @return bool
 */
function validate(?array $array): bool
{
    return null === $array || 0 === count($array);
}
