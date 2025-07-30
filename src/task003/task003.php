<?php declare(strict_types=1);

//https://www.codewars.com/kata/5a55f04be6be383a50000187/train/php

function isSpecial(int $number): bool
{
    $specialDigits = [0, 1, 2, 3, 4, 5];

    foreach (str_split((string) $number) as $digit) {
        if (!in_array($digit, $specialDigits, true)) {
            return false;
        }
    }

    return true;
}
