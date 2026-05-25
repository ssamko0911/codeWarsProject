<?php declare(strict_types=1);

// https://www.codewars.com/kata/555624b601231dc7a400017a/train/php

function josephus_survivor(int $number, int $step): int
{
    $items = range(1, $number);
    $index = 0;

    while (1 < count($items)) {
        $index = (($index + $step) % count($items)) - 1;

        if ($index < 0) {
            $index = array_key_last($items);
            array_splice($items, $index, 1);
            $index = 0;
        } else {
            array_splice($items, $index, 1);
        }
    }

    if ([] === $items) {
        throw new LogicException('Expected one item has survived');
    }

    return $items[array_key_last($items)];
}

// REC APPROACH
/**
 * function josephus_survivor(int $n, int $k): int {
 * Source: https://en.wikipedia.org/wiki/Josephus_problem#The_general_case
 * (I couldn't come up with the formula myself :p)
 * return $n === 1 ? 1 : (josephus_survivor($n - 1, $k) + $k - 1) % $n + 1;
 * }
 */
