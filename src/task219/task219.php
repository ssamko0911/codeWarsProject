<?php declare(strict_types=1);

//https://www.codewars.com/kata/58235a167a8cb37e1a0000db/train/php

/**
 * @param string[] $gloves
 * @return int
 */
function numberOfPairs(array $gloves): int
{
    $pairs = 0;

    foreach (array_count_values($gloves) as $oneColorGloves) {
        $pairs += (int)($oneColorGloves / 2);
    }

    return $pairs;
}
