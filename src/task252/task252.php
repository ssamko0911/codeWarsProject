<?php declare(strict_types=1);

// https://www.codewars.com/kata/586ec0b8d098206cce001141/train/php

/**
 * @param array<int, int|string> $items
 * @return array<int, int|string>
 */
function inverse_slice(array $items, int $start, int $end): array
{
    $sliced = [];
    $excluded = range($start, $end - 1);

    foreach ($items as $key => $item) {
        if (!in_array($key, $excluded, true)) {
            $sliced[] = $item;
        }
    }

    return $sliced;
}
