<?php declare(strict_types=1);

// https://www.codewars.com/kata/576bb3c4b1abc497ec000065/train/php

/**
 * Note: ASCII strings are guaranteed as input.
 */
function compare(?string $strOne, ?string $strTwo): bool
{
    $filteredStrOne = filter($strOne);
    $filteredStrTwo = filter($strTwo);

    $sumStrOne = array_sum(
        array_map(
            static fn(string $str): int => ord($str),
            str_split(
                strtoupper($filteredStrOne)
            )
        )
    );

    $sumStrTwo = array_sum(
        array_map(
            static fn(string $str): int => ord($str),
            str_split(
                strtoupper($filteredStrTwo)
            )
        )
    );

    return $sumStrOne === $sumStrTwo;
}

function filter(?string $str): string
{
    return match (true) {
        null === $str => '',
        1 !== preg_match("/^[a-zA-Z]+$/", $str) => '',
        default => $str
    };
}
