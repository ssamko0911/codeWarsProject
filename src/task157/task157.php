<?php

declare(strict_types=1);

//https://leetcode.com/problems/add-digits/

function addDigits(int $num): int
{
    while (!($num < 10)) {
        $digits = array_map(static function (int $digit): int {
            return (int)$digit;
        }, str_split((string)$num));

        $num = array_sum($digits);
    }

    return $num;
}
