<?php
declare(strict_types=1);

//https://www.codewars.com/kata/5679aa472b8f57fb8c000047/php

/**
 * @param array $array
 * @return int
 */
function findEvenIndex(array $array): int
{
    for ($i = 0; $i < count($array); $i++) {
        $leftPart = getArrayPart($array, $i, true);
        $rightPart = getArrayPart($array, $i);

        if (array_sum($leftPart) === array_sum($rightPart)) {
            return $i;
        }
    }

    return -1;
}

/**
 * @param int[] $array
 * @param int $index
 * @param bool $isLeft
 * @return array
 */
function getArrayPart(array $array, int $index, bool $isLeft = false): array
{
    if ($isLeft && $index === 0) {
        return [];
    }

    if (!$isLeft && $index === count($array) - 1) {
        return [];
    }

    if ($isLeft) {
        return array_slice($array, 0, $index);
    } else {
        return array_slice($array, $index + 1);
    }
}
