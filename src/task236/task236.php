<?php declare(strict_types=1);

// https://www.codewars.com/kata/58ac59d21c9e1d7dc5000150/train/php

/**
 * @param int[] $array
 * @return array<int, int[]>
 */
function makeParts(array $array, int $chunkSize): array {
    if (1 > $chunkSize) {
        return [];
    }

    $chunks = [];
    $buffer = [];

    foreach ($array as $item) {
        $buffer[] = $item;

        if ($chunkSize === count($buffer)) {
            $chunks[] = $buffer;
            $buffer = [];
        }
    }

    if ([] !== $buffer) {
        $chunks[] = $buffer;
    }

    return $chunks;
}
