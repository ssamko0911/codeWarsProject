<?php declare(strict_types = 1);

//https://www.codewars.com/kata/529e2e1f16cb0fcccb000a6b/train/php

/**
 * @param int $num
 * @param int $parts
 * @return int[]
 */
function split_integer(int $num, int $parts): array
{
    if ($num === 0) {
        return array_fill(0, $parts, 0);
    }

    $baseNumber = (int) ($num / $parts);
    $remainder = $num % $parts;

    $evenNumberGroups = array_fill(
        0,
        $parts,
        $baseNumber
    );

    for ($i = $parts - 1; $i >= $parts - $remainder; $i--) {
        $evenNumberGroups[$i]++;
    }

    return $evenNumberGroups;
}
