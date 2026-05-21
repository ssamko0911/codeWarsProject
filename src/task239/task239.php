<?php declare(strict_types=1);

// https://www.codewars.com/kata/570523c146edc287a50014b1/train/php

function number_joy(int $number): bool
{
    $sum = array_sum(
        array_map(
            static fn(string $s): int => (int)$s,
            str_split((string)$number)
        )
    );

    return ($sum * (int)(strrev((string)$sum))) === $number;
}
