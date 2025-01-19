<?php

declare(strict_types=1);

//https://www.codewars.com/kata/526233aefd4764272800036f/train/php

/**
 * @param array<int, int[]> $operandOne
 * @param array<int, int[]> $operandTwo
 * @return array<int, int[]>
 */
function matrixAddition(array $operandOne, array $operandTwo): array {
    $sum = [];

    foreach($operandOne as $key => $value) {
        $sum[] = addArrays($operandTwo[$key], $value);
    }

    return $sum;
}

/**
 * @param int[] $operandOne
 * @param int[] $operandTwo
 * @return int[]
 */
function addArrays(array $operandOne, array $operandTwo): array
{
    $sum = [];

    foreach($operandOne as $key => $value) {
        $sum[$key] = $operandTwo[$key] + $value;
    }

    return $sum;
}
