<?php declare(strict_types=1);

// https://www.codewars.com/kata/57e1857d333d8e0f76002169/train/php

const CHANGE = [
    'penny' => 0.01,
    'nickel' => 0.05,
    'dime' => 0.10,
    'quarter' => 0.25,
    'dollar' => 1.00,
];

const LABEL = "$%.2f";

function changeCount(string $change): string
{
    return sprintf(
        LABEL,
        array_sum(
            array_map(
                static function (string $str): float {
                    return CHANGE[$str] ?? 0.0;
                },
                explode(' ', $change)
            )

        )
    );
}

