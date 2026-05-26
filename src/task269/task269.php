<?php declare(strict_types=1);

// https://www.codewars.com/kata/52988f3f7edba9839c00037d/train/php

/**
 * @param scalar[] $array
 * @param callable $predicate
 * @return scalar[]
 */
function reject(array $array, callable $predicate): array
{
    $filtered = [];

    foreach ($array as $item) {
        if (!$predicate($item)) {
            $filtered[] = $item;
        }
    }

    return $filtered;
}
