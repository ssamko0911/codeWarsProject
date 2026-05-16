<?php declare(strict_types=1);

// https://www.codewars.com/kata/57f7796697d62fc93d0001b8/train/php

/**
 * @param int[] $numbers
 * @return int[]
 */
function trouble(array $numbers, int $target): array
{
    $updatedNumbers[] = $numbers[0];
    $length = count($numbers);

    for ($i = 1; $i < $length; $i++) {
        if ($updatedNumbers[array_key_last($updatedNumbers)] + $numbers[$i] !== $target) {
            $updatedNumbers[] = $numbers[$i];
        }
    }

    return $updatedNumbers;
}
