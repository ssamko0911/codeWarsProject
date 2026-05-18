<?php declare(strict_types=1);

// https://www.codewars.com/kata/596f6385e7cd727fff0000d6/train/php

/**
 * @param array<int, array<int|float>> $numbers
 * @return array<int|float>
 */
function avgArray(array $numbers): array
{
    $avg = [];
    $outerArrayLength = count($numbers);
    $innerArrayLength = count($numbers[0]);

    for ($i = 0; $i < $innerArrayLength; $i++) {
        $avg[] = array_sum(array_column($numbers, $i)) / $outerArrayLength;
    }

    return $avg;
}
