<?php

declare(strict_types=1);

//https://www.codewars.com/kata/558298453b0435384e000101/train/php

/**
 * @param int $number
 * @return array<int, double[]>
 */
function squareProduct(int $number): array
{
    $productOperands = getProductOperandsAsArray($number);

    if ([] === $productOperands) {
        return [];
    }

    $pairs = getMatchingPairs($productOperands, $number);

    return array_map('unserialize',
        array_unique(
            array_map('serialize', sortNestedArrays($pairs))
        )
    );
}

/**
 * @param int $number
 * @return double[]
 */
function getProductOperandsAsArray(int $number): array
{
    $numbers = [];
    $range = range(1, $number);

    foreach ($range as $item) {
        $square = $number / ($item * $item);
        $value = sqrt($square);

        if (in_array($value, $range)) {
            $numbers[] = $value;
        }

    }

    return $numbers;
}

/**
 * @param double[] $productOperands
 * @param int $number
 * @return array<int, double[]>
 */
function getMatchingPairs(array $productOperands, int $number): array
{
    $pairs = [];

    $length = count($productOperands);

    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length; $j++) {
            if (
                (double) $number === ($productOperands[$i] * $productOperands[$i]) * ($productOperands[$j] * $productOperands[$j])
            ) {
                $pairs[] = [
                    $productOperands[$i], $productOperands[$j],
                ];
            }
        }
    }

    return $pairs;
}

/**
 * @param array<int, double[]> $numberPairs
 * @return array<int, double[]>
 */
function sortNestedArrays(array $numberPairs): array
{
    $sorted = [];

    foreach ($numberPairs as $pair) {
        sort($pair);
        $sorted[] = $pair;
    }

    return $sorted;
}
