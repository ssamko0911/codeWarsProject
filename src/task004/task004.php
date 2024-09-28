<?php

declare(strict_types=1);

//https://www.codewars.com/kata/558f9f51e85b46e9fa000025/train/php

function difference_of_squares(int $n): int {
    $squareSum = pow(array_sum(range(1, $n)), 2);

    $sumOfSquares = array_sum(array_map(function($element): int {
        return $element * $element;
    }, range(1, $n)));

    return abs($squareSum - $sumOfSquares);
}
