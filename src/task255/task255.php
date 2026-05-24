<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a4138acf28b82aa43000117/train/php

/**
 * @param int[] $array
 */
function adjacentElementsProduct(array $array): int
{
    $maxProduct = PHP_INT_MIN;

    $length = count($array);
    for ($i = 1; $i < $length; $i++) {
        if ($array[$i - 1] * $array[$i] > $maxProduct) {
            $maxProduct = $array[$i - 1] * $array[$i];
        }
    }

    return $maxProduct;
}
