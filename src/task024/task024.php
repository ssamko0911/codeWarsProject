<?php

declare(strict_types=1);

//https://www.codewars.com/kata/550498447451fbbd7600041c/train/php

/**
 * @param int[] $arrayNumbers
 * @param int[] $arraySquares
 * @return bool
 */
function compareArrays(array $arrayNumbers, array $arraySquares): bool
{
    $getSquareValues = array_map(function ($number) {
        return $number * $number;
    }, $arrayNumbers);

    sort($getSquareValues);
    sort($arraySquares);

    return $getSquareValues === $arraySquares;
}
