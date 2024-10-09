<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5526fc09a1bbd946250002dc/train/php

/**
 * @param int[] $integers
 * @return int
 */
function find(array $integers): int
{
    if (getEventValuesCount($integers) > 1) {
        return current(
            array_filter($integers, function ($number) {
                return $number % 2 !== 0;
            })
        );
    } else {
        return current(
            array_filter($integers, function ($number) {
                return $number % 2 === 0;
            })
        );
    }
}

/**
 * @param int[] $numbers
 * @return int
 */
function getEventValuesCount(array $numbers): int
{
    return count(
        array_filter($numbers, function ($number) {
            return $number % 2 === 0;
        })
    );
}
