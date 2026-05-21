<?php declare(strict_types = 1);

// https://www.codewars.com/kata/588e2a1ad1140d31cb00008c/train/php

/**
 * @return array<int, int[]>
 */
function generatePairs(int $start, int $end): array {
    $pairs = [];
    $range = range($start, $end);
    $length = count($range);

    for ($i = 0; $i < $length; $i++) {
        for ($j = $i; $j < $length; $j++) {
            $pairs[] = [$range[$i], $range[$j]];
        }
    }

    return $pairs;
}
