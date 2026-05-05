<?php declare(strict_types=1);

// https://www.codewars.com/kata/5558cc216a7a231ac9000022/train/php

/**
 * @param array<int|string> $array
 * @return array<int|string>
 */
function duplicates(array $array): array
{
    $uniqueValues = [];
    $duplicatedValues = [];

    foreach ($array as $value) {
        if (!in_array($value, $uniqueValues, true)) {
            $uniqueValues[] = $value;
        } else {
            $duplicatedValues[] = $value;
        }
    }

    return array_values(
        array_unique(
            $duplicatedValues
        )
    );
}
